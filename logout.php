<?php
    include_once './api/sessao.php';
    logout();
    header("Refresh: 1; URL=index");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/default.css">
    <title>Logout</title>
    
    <!-- Logout -->
    <link rel="stylesheet" href="./css/logout.css">
    
    <!-- Snow Flake -->
    <link rel="stylesheet" href="./css/snowFlake.css">
    <script defer src="./js/snowFlake.js"></script>
</head>

<body>
    <div class="backgroundImage"></div>
    
    <div id="container" class="container">
        <h1>ADEUS GAROTO!</h1>
    </div>
    
</body>
</html>