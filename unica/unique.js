var usuarioLogado = localStorage.getItem('usuarioLogado');

function exibirMensagem() {
    if(!usuarioLogado) {
        
        exibirImagem()

        localStorage.setItem('usuarioLogado', true);
    }
}



function exibirImagem() {
    var img = new Image();

    img.src = './img/gow.jpg';

    img.addEventListener('load', function() {
        document.body.appendChild(img);
    });

    img.dispatchEvent(new Event('load'));
}

function timer() {

}

function tocarAudio() {
    const audio = new Audio();
    audio.src = document.querySelector('#audio').src;

    audio.play();
}

function getAudioTime() {
    const audio = document.getElementById('audio');
    console.log(`Duração do áudio: ${audioDuration} segundos`);

    audio.addEventListener('ended', () => {
        const audioDuration = Math.floor(audio.duration);
    });

}

exibirMensagem();
getAudioTime();