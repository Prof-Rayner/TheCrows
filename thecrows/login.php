<?php
    include_once './api/sessao.php';

    if(isset($_SESSION['error'])) {
        $erro = $_SESSION['error'];
        echo "<div class='alert'> $erro </div>";
        unset($_SESSION['error']);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/default.css">
    <title>Login</title>

    <!-- LOGIN -->
    <link rel="stylesheet" href="./css/login.css">
    <script defer src="./js/login.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: "Poppins", sans-serif;
        }
    </style>
    
    <!-- Snow Flake -->
    <link rel="stylesheet" href="./css/snowFlake.css">
    <script defer src="./js/snowFlake.js"></script>
</head>

<body>
    <div class="backgroundImage"></div>
    
    <div class="container">
        <div class="btn">
            <div class="slider"></div>
            <button class="login">Entrar</button>
            <button class="signup">Cadastrar</button>
        </div>

        <div class="form-section">

            <!-- Form de Login -->
            <form action="./api/loginAccess.php" id="loginForm" method="POST">
                <div class="inputWithIcon">
                    <input type="email" id="loginEmail" name="loginEmail" placeholder="Digite seu E-mail" required>
                    <i class="bi bi-envelope-fill"></i>
                </div>

                <div class="inputWithIcon">
                    <input type="password" id="loginPassword" name="loginPassword" class="password" placeholder="Digite sua Senha" required>
                    <i class="bi bi-lock-fill"></i>
                </div>

                <div class="divCheck">
                    <input type="checkbox" id="rememberMe" name="rememberMe">
                    <span>Lembrar Senha?</span>
                </div>

                <button type="submit" name="Login">Entrar</button>
            </form>
                

            <!-- Form de Cadastro -->
            <form action="./api/register.php" id="registerForm" method="POST">
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
                <button type="submit" name="Cadastro" >Cadastrar</button>
            </form>
        </div>
    </div>

</body>
</html>