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


// --------------------------------------------------------------------------------------- INTRO


const intro = document.getElementById("intro");
const conteudo = document.getElementById("conteudo");
const btnIntro = document.getElementById("btnIntro");
const audio = document.getElementById("audio");
const gif = document.getElementById("gif");
let usuarioLogado = localStorage.getItem('usuarioLogado');

btnIntro.addEventListener("click", () => {
  exibirTelaInicial(14400);
});

function iniciar() {
  if (!usuarioLogado) {
    console.log('iniciar');
    localStorage.setItem('usuarioLogado', true);
  } else {
    intro.remove();
  }
}

function exibirTelaInicial(duration) {
  conteudo.style.display = "none";
  gif.style.display = "block";

  audio.play();

  audio.currentTime = 0;
  audio.play();

  setTimeout(() => {
    audio.pause();
    intro.remove();
    audio.currentTime = 0;
  }, duration);
}

iniciar();
