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
    <link rel="stylesheet" href="./css/snowFlake.css">
    <script defer src="./js/snowFlake.js"></script>
    <link rel="stylesheet" href="./css/uploadimg.css">
    <style>
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .button-container form {
            flex: 1;
            margin-right: 5px;
        }

        .button-container form button {
            width: 100%;
        }
    </style>

</head>
    <div>
    </form>
    <form action="./uploadImg.php" method="GET">
        <button type="submit" class="btn btn-primary w-100">upload img</button>
    </form>
    <form action="./api/getImg.php" method="GET">
        <button type="submit" class="btn btn-primary w-100">get imagem</button>
    </form>
    <form action="./api/getPerfil.php" method="GET">
        <button type="submit" class="btn btn-primary w-100">get perfil</button>
    </form>
    <form action="./index.php" method="GET">
        <button type="submit" class="btn btn-primary w-100">Index</button>
    </form>
    <form action="./api/register.php" method="GET">
        <button type="submit" class="btn btn-primary w-100">register</button>
    <form action="./db/Database.php" method="GET">
        <button type="submit" class="btn btn-primary w-100">Database</button>
    </form>
    </div>


</body>

</html>