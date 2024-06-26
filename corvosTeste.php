<!DOCTYPE html>
<html lang="pt-br">

<head>
    <script src="./js/render/three.min.js"></script>
    <script src="./js/render/GPUComputationRenderer.js"></script>
    <script defer src="./js/corvos.js"></script>
</head>
<body>

</body>

<!-- shader for bird's position -->
    <script id="fragmentShaderPosition" type="x-shader/x-fragment">
        uniform float time;
        uniform float delta;

        void main()	{

            vec2 uv = gl_FragCoord.xy / resolution.xy;
            vec4 tmpPos = texture2D( texturePosition, uv );
            vec3 position = tmpPos.xyz;
            vec3 velocity = texture2D( textureVelocity, uv ).xyz;

            float phase = tmpPos.w;

            phase = mod( ( phase + delta +
                length( velocity.xz ) * delta * 3. +
                max( velocity.y, 0.0 ) * delta * 6. ), 62.83 );

            gl_FragColor = vec4( position + velocity * delta * 15. , phase );
        }
    </script>

    <!-- shader for bird's velocity -->
    <script id="fragmentShaderVelocity" type="x-shader/x-fragment">
        uniform float time;
        uniform float testing;
        uniform float delta; // about 0.016
        uniform float seperationDistance; // 20
        uniform float alignmentDistance; // 40
        uniform float cohesionDistance; //
        uniform float freedomFactor;
        uniform vec3 predator;

        const float width = resolution.x;
        const float height = resolution.y;

        const float PI = 3.141592653589793;
        const float PI_2 = PI *0.5;
        // const float VISION = PI * 0.55;

        float zoneRadius = 4.0;
        float zoneRadiusSquared = 16.0;

        float separationThresh = 0.45;
        float alignmentThresh = 0.65;
    

        const float UPPER_BOUNDS = BOUNDS;
        const float LOWER_BOUNDS = -UPPER_BOUNDS;

        const float SPEED_LIMIT = 1000.0;

        float rand(vec2 co){
            return fract(sin(dot(co.xy ,vec2(12.9898,78.233))) * 43758.5453);
        }

        void main() {

            zoneRadius = seperationDistance + alignmentDistance + cohesionDistance;
            separationThresh = seperationDistance / zoneRadius;
            alignmentThresh = ( seperationDistance + alignmentDistance ) / zoneRadius;
            zoneRadiusSquared = zoneRadius * zoneRadius;


            vec2 uv = gl_FragCoord.xy / resolution.xy;
            vec3 birdPosition, birdVelocity;

            vec3 selfPosition = texture2D( texturePosition, uv ).xyz;
            vec3 selfVelocity = texture2D( textureVelocity, uv ).xyz;

            float dist;
            vec3 dir; // direction
            float distSquared;

            float seperationSquared = seperationDistance * seperationDistance;
            float cohesionSquared = cohesionDistance * cohesionDistance;

            float f;
            float percent;

            vec3 velocity = selfVelocity;

            float limit = SPEED_LIMIT;

            dir = predator * UPPER_BOUNDS - selfPosition;
            dir.z = 0.;
            // dir.z *= 0.6;
            dist = length( dir );
            distSquared = dist * dist;

            float preyRadius = 150.0;
            float preyRadiusSq = preyRadius * preyRadius;


            // move birds away from predator
            if (dist < preyRadius) {

                f = ( distSquared / preyRadiusSq - 1.0 ) * delta * 100.;
                velocity += normalize( dir ) * f;
                limit += 5.0;
            }


            // if (testing == 0.0) {}
            // if ( rand( uv + time ) < freedomFactor ) {}


            // Attract flocks to the center
            vec3 central = vec3( 0., 0., 0. );
            dir = selfPosition - central;
            dist = length( dir );

            dir.y *= 2.5;
            velocity -= normalize( dir ) * delta * 5.;

            for (float y=0.0;y<height;y++) {
                for (float x=0.0;x<width;x++) {

                    vec2 ref = vec2( x + 0.5, y + 0.5 ) / resolution.xy;
                    birdPosition = texture2D( texturePosition, ref ).xyz;

                    dir = birdPosition - selfPosition;
                    dist = length(dir);

                    if (dist < 0.0001) continue;

                    distSquared = dist * dist;

                    if (distSquared > zoneRadiusSquared ) continue;

                    percent = distSquared / zoneRadiusSquared;

                    if ( percent < separationThresh ) { // low

                        // Separation - Move apart for comfort
                        f = (separationThresh / percent - 1.0) * delta;
                        velocity -= normalize(dir) * f;

                    } else if ( percent < alignmentThresh ) { // high

                        // Alignment - fly the same direction
                        float threshDelta = alignmentThresh - separationThresh;
                        float adjustedPercent = ( percent - separationThresh ) / threshDelta;

                        birdVelocity = texture2D( textureVelocity, ref ).xyz;

                        f = ( 0.5 - cos( adjustedPercent * PI_2 ) * 0.5 + 0.5 ) * delta;
                        velocity += normalize(birdVelocity) * f;

                    } else {

                        // Attraction / Cohesion - move closer
                        float threshDelta = 1.0 - alignmentThresh;
                        float adjustedPercent = ( percent - alignmentThresh ) / threshDelta;

                        f = ( 0.5 - ( cos( adjustedPercent * PI_2 ) * -0.5 + 0.5 ) ) * delta;

                        velocity += normalize(dir) * f;

                    }

                }

            }

            // this make tends to fly around than down or up
            // if (velocity.y > 0.) velocity.y *= (1. - 0.2 * delta);

            // Speed Limits
            if ( length( velocity ) > limit ) {
                velocity = normalize( velocity ) * limit;
            }
            gl_FragColor = vec4( velocity, 1.0 );
        }
    </script>

    <script type="x-shader/x-vertex" id="birdVS">
        attribute vec2 reference;
        attribute float frameId;

        uniform sampler2D texturePosition;
        uniform sampler2D textureVelocity;

        varying vec2 vUV;
        varying mat2 vUVRot;
        varying float vFrameId;

        uniform float time;

        void main() {
            vec3 pos = texture2D( texturePosition, reference ).xyz;
            vec3 vel = normalize( texture2D( textureVelocity, reference ).xyz );

            vec4 mvPos = modelViewMatrix * vec4( pos, 1.0 );

            gl_PointSize = 20.0 * ( 800.0 / -mvPos.z );

            vUV = vec2( vel.x * 0.5 + 0.5, vel.y * 0.5 + 0.5 );
            vUV = floor( vUV * 11.0 ) / 11.0 + 0.5 / 11.0;
            // TODO: better movement later
            vUVRot = mat2( 1, 0, 0, 1 );

            vFrameId = floor( mod( frameId + time * 0.5, 9.0 ) );
            gl_Position = projectionMatrix * mvPos;
        }
    </script>

    <!-- bird geometry shader -->
    <script type="x-shader/x-fragment" id="birdFS">
        uniform sampler2D texturesBird[ 9 ];
        varying vec2 vUV;
        varying mat2 vUVRot;
        varying float vFrameId;

        uniform vec3 color;
        void main() {
            vec2 uv = 0.9 * vec2( 1.0 / 11.0 ) * ( gl_PointCoord - 0.5 ) * vUVRot + vUV;
            int id = int( vFrameId );
            vec4 col;
            if ( id == 0 ) { col = texture2D( texturesBird[ 0 ], uv ); }
            else if ( id == 1 ) { col = texture2D( texturesBird[ 1 ], uv ); }
            else if ( id == 2 ) { col = texture2D( texturesBird[ 2 ], uv ); }
            else if ( id == 3 ) { col = texture2D( texturesBird[ 3 ], uv ); }
            else if ( id == 4 ) { col = texture2D( texturesBird[ 4 ], uv ); }
            else if ( id == 5 ) { col = texture2D( texturesBird[ 5 ], uv ); }
            else if ( id == 6 ) { col = texture2D( texturesBird[ 6 ], uv ); }
            else if ( id == 7 ) { col = texture2D( texturesBird[ 7 ], uv ); }
            else if ( id == 8 ) { col = texture2D( texturesBird[ 8 ], uv ); }
            gl_FragColor = col;
        }
    </script>
</html>