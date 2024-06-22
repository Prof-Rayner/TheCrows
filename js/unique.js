let usuarioLogado = localStorage.getItem('usuarioLogado');

function iniciar() {
  if (!usuarioLogado) {
    exibirTelaInicial(14400); 
    localStorage.setItem('usuarioLogado', true);
  }
}

function exibirTela() {
  exibirTelaInicial(14400);
}

function exibirTelaInicial(duration) {
  const conteudo = document.getElementById("conteudo");
  const gif = document.getElementById("gif");
  const audio = document.getElementById("audio");

  conteudo.style.display = "none";
  gif.style.display = "block";

  audio.play();

  audio.currentTime = 0;
  audio.play();
  setTimeout(() => {
    audio.pause();
    audio.currentTime = 0;
    gif.style.display = "none";
    redirecionarParaLogin();
  }, duration);
}

function redirecionarParaLogin() {
  window.location.href = 'login.html';
}
document.querySelector("#conteudo button").addEventListener("click", exibirTela);
window.onload = iniciar;
