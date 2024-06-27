<?php
    include_once './api/sessao.php';
    validarSessao();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/default.css">
    <title>Home</title>
    
    <!-- INDEX -->
    <link rel="stylesheet" href="./css/home.css">
    <script defer src="./js/popup.js"></script>
    <script defer src="./js/perfil.js"></script>
    
    <!-- Snow Flake -->
    <link rel="stylesheet" href="./css/snowFlake.css">
    <script defer src="./js/snowFlake.js"></script>
</head>

<body>
    <div class="backgroundImage"></div>
    
    <main class="container">
    
        <div class="profile"> <!-- Perfil -->
            <div>
                <div class="picture"> <!-- Foto de perfil -->
                    <img id="profileImage" src="./assets/imagens/perfil/perfil0.jpg">
                </div>

                <div class="profile-user"><!-- Elementos de captura dos corvos | Botões de Pagina Admin e Logout -->
                    <div class="scoreBoard"> 
                        <div>
                            <h1> <span id="corvosColetados">0</span></h1>
                            <span>COLETADOS</span>
                        </div>
                        <div>
                            <h1> <span id="corvosTotais">12</span></h1>
                            <span>TOTAL</span>
                        </div>
                        <div>
                            <h1> <span id="rank">?</span></h1>
                            <span>RANK</span>
                        </div>
                    </div>
                    
                    <div class="profile-buttons">
                        <a href="admin.php"><button>RANKING</button></a>
                        <a href="logout.php"><button>SAIR</button></a>
                    </div>
                </div>
            </div>

            <div> <!-- Nome do Usuário -->
                <h1 id="username">Nome</h1>
            </div>
        </div>

        <div class="feed">
            <div class="feedItem">
                <div class="feedLine"></div>
                <h2>Corvos</h2>
            </div>
        </div>

        <div id="gallery" class="gallery">
        </div>

    </main>

    <div id='modalDica' class='modal oculto'>
        <div class='conteudo'>
            <h1 id='nomeTitulo'>Nome do Corvo</h1>
            <div class='gallery-item'>
                <img src="./assets/imagens/corvo1.jpg" alt="item-Corvo">
                <h1 id='cadeado' class='info oculto bi bi-lock-fill'></h1>
            </div>
            <div>
                <h1>DICA</h1>
                <h3 id='descricao'> Aqui vai ficar o texto com a dica
                    ou uma charada de onde pode estar esse corvo
                </h3>
            </div>
        </div>
    </div>

</body>
</html>
