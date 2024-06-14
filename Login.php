<?php
    include_once './api/login.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['loginEmail']) && isset($_POST['loginPassword'])) {
            login($_POST['loginEmail'], $_POST['loginPassword']);
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/login.css">
    <script defer src="./js/login.js"></script>
    <!-- Snow Flake -->
    <link rel="stylesheet" href="./css/snowFlake.css">
    <script defer src="./js/snowFlake.js"></script>
</head>

    <div class="container">
        <div class="btn">
            <div class="slider"></div>
            <button class="login">Entrar</button>
            <button class="signup">Cadastrar</button>
        </div>

        <div class="form-section">
            <!-- Form de Login --> 
            <form id="loginForm" method="POST">
                <div class="inputWithIcon">
                    <input type="email" id="loginEmail" name="loginEmail" class="form-control" placeholder="Digite seu E-mail" required>
                    <i class="bi bi-envelope-fill"></i>
                </div>
                <div class="inputWithIcon">
                    <input type="password" id="loginPassword" name="loginPassword" class="form-control" placeholder="Digite sua Senha" required>
                    <i class="bi bi-lock-fill"></i>
                </div>
                <div class="divCheck">
                    <input type="checkbox" id="rememberMe" name="rememberMe">
                    <span>Lembrar Senha?</span>
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>

            <!-- Form de Cadastro -->
            <form action="./api/cadastro.php" id="registerForm" method="POST" class="d-none">
                <div class="inputWithIcon">
                    <input type="text" id="signName" name="Nome" class="form-control" placeholder="Digite seu Nome" required>
                    <i class="bi bi-person-fill"></i>
                </div>
                <div class="inputWithIcon">
                    <input type="email" id="signEmail" name="Email" class="form-control" placeholder="Digite seu E-mail" required>
                    <i class="bi bi-envelope-fill"></i>
                </div>
                <div class="inputWithIcon">
                    <input type="password" id="signPassword" name="Senha" class="form-control" placeholder="Digite sua Senha" required>
                    <i class="bi bi-lock-fill"></i>
                </div>
                <div class="inputWithIcon">
                    <input type="password" id="signPassword2" name="ConfirmarSenha" class="form-control" placeholder="Confirme sua Senha" required>
                    <i class="bi bi-lock-fill"></i>
                </div>
                <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
            </form>
        </div>
    </div>
</body>

</html>
