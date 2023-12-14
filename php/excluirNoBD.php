<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Notícia</title>

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

        .message {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            margin-bottom: 20px;
        }

        .home-button,
        .admin-button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
            margin: 0 10px;
        }

        .admin-button {
            background-color: #28a745;
        }

        .home-button:hover,
        .admin-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="message">
        <?php
            include("comm.php");

            $sql = "DELETE FROM noticia WHERE id = " . $_GET['id'];

            if (mysqli_query($conn, $sql)) {
                echo "Notícia deletada com sucesso";
            } else {
                echo "Erro: " . mysqli_error($conn);
            }

            mysqli_close($conn);
        ?>
    </div>

    <a class="home-button" href="../index.php">Início</a>
    <a class="admin-button" href="area.php">Área Administrativa</a>
</body>

</html>
