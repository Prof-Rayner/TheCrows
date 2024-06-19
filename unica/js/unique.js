var usuarioLogado = localStorage.getItem('usuarioLogado');

function iniciar() {
        if (!usuarioLogado) {

            
        
            exibirImagem();
            playsound();
    
            localStorage.setItem('usuarioLogado', true);
        }
    }
    
function playsound() {
    window.addEventListener('load', () => {
        audio = document.getElementById("audio")
        audio.setAttribute("autoplay", '""')
        setInterval(() => {
            audio.play()
        }, 100);
    });
}

function exibirImagem() {
    var img = new Image();

    img.src = './img/gow.jpg';

    img.addEventListener('load', function() {
        document.body.appendChild(img);
    });

    img.dispatchEvent(new Event('load'));
}


iniciar();
