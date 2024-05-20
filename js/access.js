var formSignin = document.querySelector('#entrar')
var formSignup = document.querySelector('#cadastrar')
var btnColor = document.querySelector('.btnColor')

document.querySelector('#btnEntrar')
  .addEventListener('click', () => {
    formSignin.style.left = "25px"
    formSignup.style.left = "450px"
    btnColor.style.left = "0px"
})

document.querySelector('#btnCadastrar')
  .addEventListener('click', () => {
    formSignin.style.left = "-450px"
    formSignup.style.left = "25px"
    btnColor.style.left = "110px"
})



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