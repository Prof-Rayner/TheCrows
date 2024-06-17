<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Home Corvo</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
        <link rel="stylesheet" href="./css/css-home/style.css">
        <meta charset="utf-8">
        <style>
            .imagemPerfil img {
                width: 150px;
                height: 150px;
                border-radius: 50%;
            }
        </style>
    </head>

    <body>
        <div class="imagem-fundo"></div>
        <div class="limitar">
            <section class="perfil-descricao">
                <div class="alinhando">
                    <div class="imagemPerfil">
                        <img id="profileImage" src="./api/getImage.php" alt="Sua imagem de perfil" class="img-perfil">
                    </div>
                    <div class="infos">
                        <div class="lista">
                            <ul class="descricao-perfil">
                                <div class="infos-coletados">
                                    <li><span>-/12</span></li>
                                    <li>coletados</li>
                                </div>
                                <div class="infos-coletados">
                                    <li><span>-</span></li>
                                    <li>rank</li>
                                </div>
                            </ul>
                        </div>
                        <div class="nome">
                            <p><span>Fulano</span></p>
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
        <script src="./js/profileImage.js"></script>
    </body>
</html>