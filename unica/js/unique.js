var usuarioLogado = localStorage.getItem('usuarioLogado');

function iniciar() {
    if(!usuarioLogado) {
        
        exibirImagem();

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

// function timer() {

// }

function tocarAudio(audioname, loop) {
    let audio = new Audio(audioname);
    audio.loop = loop;
    audio.play();
}
tocarAudio("./audio/01. God of War.mp3")

function getAudioTime() {

}

iniciar();
