let snow;

window.onload = creatSnow();

function creatSnow() {
	snow = document.createElement('div');
	snow.classList.add('snow');
	document.body.appendChild(snow);
	for (let i = 0; i < 20; i++) {
		setTimeout(() => {
			createSnowFlake();
		}, 250*i);
	}
}


// Função para criar os flocos de neve
function createSnowFlake() {
	let flake = document.createElement('a');
	flake.classList.add('flake');
	flake.innerText = "❄";
	flake.style.left = (Math.random() * (window.innerWidth * 2)) + 'px';
	flake.style.animationDuration = Math.random() * 3 + 2 + 's';
	snow.appendChild(flake);
}
