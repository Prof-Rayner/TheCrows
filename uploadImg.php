<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Imagem</title>
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

<body>
    <div class="button-container">
        <form action="./login.php" method="GET">
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <form action="./index.php" method="GET">
            <button type="submit" class="btn btn-primary">Home</button>
        </form>
        <form action="./admin.php" method="GET">
            <button type="submit" class="btn btn-primary">Admin</button>
        </form>
    </div>
    <div class="container">
        <h2>Upload de Imagem</h2>
        <form action="./api/uploadImg.php" method="post" enctype="multipart/form-data">
            <label for="imagem">Selecione uma imagem:</label>
            <input type="file" id="imagem" name="imagem" accept="image/*">
            <br><br>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>

</html>