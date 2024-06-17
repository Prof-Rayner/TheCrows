<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Imagem</title>
    <link rel="stylesheet" href="./css/uploadimg.css">
</head>
<body>
    <div class="container">
        <h2>Upload de Imagem</h2>
        <form action="./api/upload_images.php" method="post" enctype="multipart/form-data">
            <label for="imagem">Selecione uma imagem:</label>
            <input type="file" id="imagem" name="imagem" accept="image/*">
            <br><br>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
