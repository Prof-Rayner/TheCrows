document.addEventListener('DOMContentLoaded', function () {
    fetch('./api/getImage.php')
        .then(response => response.blob())
        .then(blob => {
            const url = URL.createObjectURL(blob);
            document.getElementById('profileImage').src = url;
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao carregar a imagem de perfil.');
        });
});
