let usuarioLogado = localStorage.getItem('usuarioLogado');
const signup = document.querySelector(".signup");
const login = document.querySelector(".login");
const slider = document.querySelector(".slider");
const formSection = document.querySelector(".form-section");

signup.addEventListener("click", () => {
	slider.classList.add("moveslider");
	formSection.classList.add("form-section-move");
});

login.addEventListener("click", () => {
	slider.classList.remove("moveslider");
	formSection.classList.remove("form-section-move");
});


function iniciar() {
  if (!usuarioLogado) {
    exibirTelaInicial(14400); 
    localStorage.setItem('usuarioLogado', true);
  }
}

function exibirTela() {
  exibirTelaInicial(14400);
}

function exibirTelaInicial(duration) {
  const conteudo = document.getElementById("conteudo");
  const gif = document.getElementById("gif");
  const audio = document.getElementById("audio");

  conteudo.style.display = "none";
  gif.style.display = "block";

  audio.play();

  audio.currentTime = 0;
  audio.play();
  setTimeout(() => {
    audio.pause();
    audio.currentTime = 0;
    gif.style.display = "none";
  }, duration);
}


const startButton = document.querySelector("#conteudo button");
if (startButton) {
  startButton.addEventListener("click", exibirTela);
}
window.onload = iniciar;
