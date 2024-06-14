const popup = document.getElementById("container-info");
const span = document.getElementsByClassName("close")[0];

window.onclick = function (event) {
    if (event.target == popup) {
        popup.style.display = "none";
    }
}

span.onclick = function () {
    popup.style.display = "none";
}


function abrirPopup(){

    popup.style.display = "block";
    
}    

