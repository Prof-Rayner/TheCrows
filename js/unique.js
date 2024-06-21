let usuarioLogado = localStorage.getItem('usuarioLogado');

function iniciar() {
  if (!usuarioLogado) {
    exibirTelaInicial();
    localStorage.setItem('usuarioLogado', true);
  } else {
    redirecionarParaLogin();
  }
}

function exibirTelaInicial() {
  document.getElementById("conteudo").style.display = "none";
  document.getElementById("gif").style.display = "block";

  let audio = document.getElementById("audio");
  audio.play();

  setTimeout(function () {
    audio.pause();
    audio.currentTime = 0;
    document.getElementById("gif").style.display = "none";
    redirecionarParaLogin(); 
  }, 14000);
}

function iniciar() {
  document.getElementById("conteudo").style.display = "none";
  document.getElementById("gif").style.display = "block";

  let audio = document.getElementById("audio");
  audio.play();
  audio.addEventListener('ended', function() {
      window.location.href = 'login.html'; 
  });
}

