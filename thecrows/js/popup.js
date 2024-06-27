const modal = document.getElementById('modalDica');
const nomeTitulo = document.getElementById('nomeTitulo');
const descricao = document.getElementById('descricao');
const cadeado = document.getElementById('cadeado');

modal.addEventListener('click', () => {
    modal.classList.toggle('oculto');
});


function openModal(id){
    let corvo = window.ListaCorvos[id-1]
    if (corvo['registrado'] == 1){
        cadeado.classList.add('oculto');
    }else{
        cadeado.classList.remove('oculto');
    }
    nomeTitulo.innerHTML = corvo['nome'];
    descricao.innerHTML = corvo['dica'];
    modal.classList.toggle('oculto');
}