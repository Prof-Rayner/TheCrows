let usuarioLogado = localStorage.getItem('usuarioLogado');

function iniciar() {
  if (!usuarioLogado) {
    document.getElementById("conteudo").style.display = "none";
    exibirVideo();
    playAudio();
    localStorage.setItem('usuarioLogado', true);
    verificar();
  }
};

function direcionar() {
  if(!tempoAudio()) {
    // continua
  }
}

function verificar() {
  if(usuarioLogado) {
    carregarConteudo();
  }
}

function carregarConteudo() {
  document.getElementById("conteudo").style.display = "inline";
}



function tempoAudio() {
  let x = document.getElementById("audio").duration;
  console.log(x);
}

function playAudio() {
  window.addEventListener('load', () => {
    audio = document.getElementById("audio")
    audio.setAttribute("autoplay", '""')
    setInterval(() => {
      audio.play()
    }, 100);
    tempoAudio();
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
