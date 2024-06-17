var usuarioLogado = localStorage.getItem('usuarioLogado');
 
function exibirMensagem() {
    if(!usuarioLogado) {
        localStorage.setItem('usuarioLogado', true);
    }
}
 
function playsound(audioname, loop) {
    let audio = new Audio(audioname);
    audio.loop = loop;
    audio.play();
}
 playsound("./audios/sample-1.ogg")
 
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