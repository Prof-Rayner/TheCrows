// Função para criar os flocos de neve
function createSnowFlake() {
    const snowFlake = document.createElement('div');

    snowFlake.classList.add('snowflake');
    snowFlake.innerText = '❆';
    snowFlake.style.left = (Math.random() * window.innerWidth *1.5) + 170 + 'px';

    snowFlake.style.animationDuration = Math.random() * 3 + 2 + 's';

    document.body.appendChild(snowFlake);

    setTimeout(() => {
        snowFlake.remove();
    }, 5000);
}
setInterval(createSnowFlake, 100);