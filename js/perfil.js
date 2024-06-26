document.addEventListener("DOMContentLoaded", function () {

    async function fetchPerfilData() {
        try {
            const response = await fetch("./api/getPerfil");
            if (!response.ok) {
                throw new Error('Erro ao carregar as informações do perfil.');
            }
            const data = await response.json();
            updatePerfilData(data);
        } catch (error) {
            console.log('erro perfil .php');
            handleFetchError(error);
        }
    }


    function updatePerfilData(data) {
        updateElementText("username", data.username);
        updateElementAttribute("profileImage", "src", `./assets/imagens/perfil/perfil${data.foto}.jpg`);
        updateElementText("corvosColetados", data.numCorvosColetados);
        updateElementText("corvosTotais", data.numCorvosTotais);
        updateElementText("rank", data.rank);
        removeRanking(data.usertype);
        popularHOME(data.listaDeCorvos);
        window.ListaCorvos = data.listaDeCorvos;
    }


    // async function fetchProfileImage() {
    //     try {
    //         const response = await fetch("./api/getImg.php");
    //         if (!response.ok) {
    //             throw new Error('Erro ao carregar a imagem de perfil.');
    //         }
    //         const blob = await response.blob();
    //         const url = URL.createObjectURL(blob);
    //         updateElementAttribute("profileImage", "src", url);
    //     } catch (error) {
    //         handleFetchError(error);
    //     }
    // }

    function removeRanking(usertype){
        const btnRanking = document.getElementById("btnRanking");
        if (usertype == 2){
            btnRanking.remove();
        }
    }

    // JEFF
    function popularHOME(array){
        const galeria = document.getElementById("gallery");
        array.forEach(element => {
            let id = 1;
            let display = element.registrado == 1 ? "info oculto" : "info";
            galeria.innerHTML += `
            <div class='gallery-item' onclick='openModal(${element.id})'>
                <img src='./assets/imagens/corvo${id}.jpg' alt='item-Corvo'>
                <h1 class='${display} bi bi-lock-fill'></h1>
            </div>
            `;
        });
    }


    function updateElementText(id, text) {
        const element = document.getElementById(id);
        if (element) {
            element.textContent = text;
        }
    }


    function updateElementAttribute(id, attribute, value) {
        const element = document.getElementById(id);
        if (element) {
            element.setAttribute(attribute, value);
        }
    }


    function handleFetchError(error) {
        console.log('Erro de requisição:', error);
        alert('Erro ao carregar os dados do perfil.');
    }

    
    Promise.all([fetchPerfilData()])
        .then(() => {
            console.log("Perfil carregado com sucesso.");
        })
        .catch(error => {
            console.error("Erro ao carregar perfil completo:", error);
            alert("Erro ao carregar o perfil completo.");
        });
});
