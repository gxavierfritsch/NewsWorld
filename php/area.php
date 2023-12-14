<?php
include("comm.php");

session_start();

if (!isset($_SESSION['usuario']) || !isset($_SESSION['senha'])) {
    header('location:/NewsWorld-main/php/form_login.php');
}

$logado = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Restrita - News World</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        .container {
            margin-top: 20px;
        }

        h1 {
            color: #333;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            margin: 0 10px;
            padding: 10px 20px;
            border: 2px solid #007BFF;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            display: inline-block;
            margin-top: 20px;
        }

        a:hover {
            background-color: #007BFF;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Área Restrita - News World</h1>
        <p>Bem-vindo, <?php echo $logado; ?>!</p>
        <a href="cadastro.html">Cadastrar Novo Post</a>
        <a href="alterar.php">Editar Posts</a>
        <br><br>
        <a href="../index.php">Sair</a>
    </div>
</body>

</html>
