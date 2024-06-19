document.addEventListener("DOMContentLoaded", function () {

    async function fetchPerfilData() {
        try {
            const response = await fetch("./api/getPerfil.php");
            if (!response.ok) {
                throw new Error('Erro ao carregar as informações do perfil.');
            }
            const data = await response.json();
            updatePerfilData(data);
        } catch (error) {
            handleFetchError(error);
        }
    }

    function updatePerfilData(data) {
        updateElementText("corvosColetados", data.numCorvosColetados);
        updateElementText("corvosTotais", data.numCorvosTotais);
        updateElementText("username", data.username);
        updateElementText("rank", data.rank);
    }

    async function fetchProfileImage() {
        try {
            const response = await fetch("./api/getImg.php");
            if (!response.ok) {
                throw new Error('Erro ao carregar a imagem de perfil.');
            }
            const blob = await response.blob();
            const url = URL.createObjectURL(blob);
            updateElementAttribute("profileImage", "src", url);
        } catch (error) {
            handleFetchError(error);
        }
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
        console.error('Erro de requisição:', error);
        alert('Erro ao carregar os dados do perfil.');
    }

    Promise.all([fetchProfileImage(), fetchPerfilData()])
        .then(() => {
            console.log("Perfil carregado com sucesso.");
        })
        .catch(error => {
            console.error("Erro ao carregar perfil completo:", error);
            alert("Erro ao carregar o perfil completo.");
        });
});
