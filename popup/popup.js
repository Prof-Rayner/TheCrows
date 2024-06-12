// function toggle() {
//     const popup = document.getElementById('popup');
//     popup.classList.toggle('activate')
// }

function criarPopup(id){
    const popupNota = document.querySelector(id);
    const container = popupNota.querySelector(".container");
    const fecharbtn = popupNota.querySelector(".fecharbtn");

    function abrirPopup(){
        popupNota.classList.add("active");
    }

    function fecharPopup(){
        popupNota.classList.remove("active");
    }
    container.addEventListener("click", fecharPopup);
    fecharbtn.addEventListener("click", fecharPopup);
    return abrirPopup;
}

const popup = criarPopup("#popup");
document.querySelector("#abrir-popup").addEventListener("click", popup);