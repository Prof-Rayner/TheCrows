let usuarioLogado = localStorage.getItem('usuarioLogado');

function iniciar() {
  if (!usuarioLogado) {



    exibirVideo();
    playAudio();

    localStorage.setItem('usuarioLogado', true);
  }
};

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
