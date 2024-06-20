let usuarioLogado = localStorage.getItem('usuarioLogado');

function iniciar() {
  if (!usuarioLogado) {
    document.getElementById("conteudo").style.opacity = "0";
    exibirVideo();
    playAudio();

    localStorage.setItem('usuarioLogado', true);
    verificar();
  }
};

function verificar() {
  if(usuarioLogado) {
    carregarConteudo();
  }
}

function carregarConteudo() {
  document.getElementById("conteudo").style.opacity = "1";
}


function playAudio() {
  window.addEventListener('load', () => {
    audio = document.getElementById("audio")
    audio.setAttribute("autoplay", '""')
    setInterval(() => {
      audio.play()
    }, 100);
  });
};

function exibirVideo() {
  var gif = new Image();

  gif.src = 'midia/intro.gif';

  gif.addEventListener('load', function () {
    document.body.appendChild(gif);
  });

  gif.dispatchEvent(new Event('load'));
}

iniciar();
