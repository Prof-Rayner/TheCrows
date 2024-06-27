document.addEventListener("DOMContentLoaded", function () {

    const nomeDoCorvo = document.getElementById("nomeDoCorvo");
    const foto = document.getElementById("fotoCorvo");
    const aviso = document.getElementById("aviso");
    const texto = document.getElementById("texto");


    function registroSucesso($id, $nome){
        nomeDoCorvo.textContent = $nome;
        $id = crow.corvo.id;
        foto.setAttribute("src", `./assets/imagens/corvo${$id}.png`);
        aviso.textContent = "PARABENS";
        // executar confetes
        var script = document.createElement('script');
        script.src = './js/confetes.js';
        document.body.appendChild(script);
    }
    
    function jaRegistrado($id, $nome){
        nomeDoCorvo.textContent = "Corvo ja coletado";
        $id = crow.corvo.id;
        foto.setAttribute("src", `./assets/imagens/corvo${$id}.png`);
        aviso.textContent = `Corvo ${$nome} já capturado, `;
        texto.textContent = "Esse corvo já foi destruido, continue procurando os demais.";
    }

    function corvoNaoEncontrado(){
        nomeDoCorvo.textContent = "Corvo Não Existe!";
        foto.setAttribute("src", "./assets/imagens/corvoNaoEncontrado.png");
        aviso.textContent = "CUIDADO";
        texto.textContent = "Não faça isso, pois pode acabar comendo só pipoca!";
    }

    if (crow.registro){
        registroSucesso(crow.corvo.id, crow.corvo.name);
    }else{
        if (crow.corvo){
            jaRegistrado(crow.corvo.id, crow.corvo.name);
        }else{
            corvoNaoEncontrado();
        }
    }

    setTimeout(function() {
        window.location.href = 'index.php';
    }, 4000);

});
