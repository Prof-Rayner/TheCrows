
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












// const nome = document.getElementById('user');
// const nome_error = document.getElementById('nome_error');
// const email01 = document.getElementById('email_01');
// const email_error = document.querySelector('email_error');
// const senha_01 = document.getElementById('senha_01');
// const senha_error_2 = document.getElementById('password_error_2');

// const email02 = document.getElementById('email_02');
// const senha_02 = document.getElementById('senha_02');
// const confirmar_senha = document.getElementById("confirma_senha");

// var formSignin = document.querySelector('#entrar')
// var formSignup = document.querySelector('#cadastrar')
// var btnColor = document.querySelector('.btnColor')


// document.querySelector('#btnEntrar')
// 	.addEventListener('click', () => {
// 		formSignin.style.left = "25px"
// 		formSignup.style.left = "450px"
// 		btnColor.style.left = "0px"
// 	})

// document.querySelector('#btnCadastrar')
// 	.addEventListener('click', () => {
// 		formSignin.style.left = "-450px"
// 		formSignup.style.left = "25px"
// 		btnColor.style.left = "110px"
// 	})




// nome.addEventListener('input', () => {
// 	if (nome.value.length < 3) {
// 		nome_error.textContent = 'Nome invalido';
// 	} else {
// 		nome_error.textContent = ''
// 	}
// });



// // email02.addEventListener('input', () =>{
// //       var exclude=/[^@-.w]|^[_@.-]|[._-]{2}|[@.]{2}|(@)[^@]*1/;
// //       var check=/@[w-]+./;
// //       var checkend=/.[a-zA-Z]{2,3}$/;
// //       if(((email02.search(exclude) != -1)||(email.search(check)) == -1)||(email.search(checkend) == -1)){email_error.textContent = 'Email inválido, por favor rescreva ou tente novamente!';

// //       } else {email_error.textContent = '';

// //       }


// // });

// senha_02.addEventListener('input', () => {
// 	if (senha_02.value.length < 8) {
// 		senha_error_2.textContent = 'Senha muito curta';
// 	} else {
// 		senha_error_2.textContent = ''
// 	}
// });

// confirmar_senha.addEventListener('input', () => {
// 	if (senha02.value !== confirmar_senha.value) {
// 		senha_error_confirm.textContent = 'As senhas não coincidem.';

// 	} else {
// 		senha_error_confirm.textContent = ''
// 	}

// });

