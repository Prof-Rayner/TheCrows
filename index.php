<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Home Corvo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="./css/css-home/style.css">
</head>

<body>
    <div class="imagem-fundo"></div>
    <div class="limitar">
        <section class="perfil-descricao">
            <div class="alinhando">
                <div class="imagemPerfil">
                    <img id="profileImage" src="./assets/imagens/img-perfil/default.jpg" alt="Sua imagem de perfil" class="img-perfil">
                </div>
                <div class="infos">
                    <div class="lista">
                        <ul class="descricao-perfil">
                            <li>
                                <div class="infos-coletados">
                                    <!-- Número de corvos coletados -->
                                    <span>coletados</span><span id="corvosColetados">-</span>
                                    <span>Total</span><span id="corvosTotais">-</span>
                                </div>
                            </li>
                            <li>
                                <div class="infos-coletados">
                                    <!-- Rank do usuário -->
                                    <span id="rank">-</span>
                                    <span>rank</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="nome">
                        <!-- Nome de usuário -->
                        <p><span id="username">-</span></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="feed">
            <div style="max-width: 100%;">
                <div class="line-feed">
                    <div aba="publicacoes" class="single-line-name">
                        <div style="display: block;" class="line-marcacao"></div>
                        <p style="font-weight: bold;">Corvos</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="cards">
            <div class="center">
                <div class="card">
                    <img src="./assets/imagens/img-Home/CorvoGrid.jpg" alt="Imagem de um corvo" class="publicacao-single">
                </div>
                <div class="card">
                    <img src="./assets/imagens/img-Home/CorvoGrid.jpg" alt="Imagem de um corvo" class="publicacao-single">
                </div>
                <div class="card">
                    <img src="./assets/imagens/img-Home/CorvoGrid.jpg" alt="Imagem de um corvo" class="publicacao-single">
                </div>
                <div class="card">
                    <img src="./assets/imagens/img-Home/CorvoGrid.jpg" alt="Imagem de um corvo" class="publicacao-single">
                </div>
                <div class="card">
                    <img src="./assets/imagens/img-Home/CorvoGrid.jpg" alt="Imagem de um corvo" class="publicacao-single">
                </div>
                <div class="card">
                    <img src="./assets/imagens/img-Home/CorvoGrid.jpg" alt="Imagem de um corvo" class="publicacao-single">
                </div>
                <div class="card">
                    <img src="./assets/imagens/img-Home/CorvoGrid.jpg" alt="Imagem de um corvo" class="publicacao-single">
                </div>
                <div class="card">
                    <img src="./assets/imagens/img-Home/CorvoGrid.jpg" alt="Imagem de um corvo" class="publicacao-single">
                </div>
                <div class="card">
                    <img src="./assets/imagens/img-Home/CorvoGrid.jpg" alt="Imagem de um corvo" class="publicacao-single">
                </div>
                <div class="card">
                    <img src="./assets/imagens/img-Home/CorvoGrid.jpg" alt="Imagem de um corvo" class="publicacao-single">
                </div>
                <div class="card">
                    <img src="./assets/imagens/img-Home/CorvoGrid.jpg" alt="Imagem de um corvo" class="publicacao-single">
                </div>
                <div class="card">
                    <img src="./assets/imagens/img-Home/CorvoGrid.jpg" alt="Imagem de um corvo" class="publicacao-single">
                </div>
            </div>
        </section>
    </div>
    <script src="./js/profileScript.js" defer></script>
</body>

</html>