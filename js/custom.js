var usuarioLogado = localStorage.getItem('usuarioLogado');

function display_image(src, width, height, alt) {
    var a = document.createElement("img");
    a.src = src;
    a.width = width;
    a.height = height;
    a.alt = alt;
    document.body.appendChild(a);
}
display_image('2806185_0.jpg',
    276,
    110,
    './img/2806185_0.jpg');

var sound = new Howl({
    src: ['sound.webm', 'sound.ogg']
});

var audio = new Audio('sample-1.ogg');
audio.play();