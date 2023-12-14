
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Notícia</title>

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
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        h2 {
            color: #333;
        }

        a {
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

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include("comm.php");

        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
        $categoria = $_POST['categoria'];

        if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
            $target_dir = "upload/";
            $target_file = $target_dir . date("YmdHis") . "." . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO noticia (titulo, categoria, texto, nome, caminho) VALUES ('$titulo', '$categoria', '$texto', '" . $_FILES["image"]["name"] . "', '" . $target_file . "')  ";
                if (mysqli_query($conn, $sql)) {
                    echo "A imagem foi enviada e armazenada com sucesso.";
                }
            }
        }
        mysqli_close($conn);
        ?>
    </div>

    <a href="../index.php">Início</a>
    <a href="area.php">Área Administrativa</a>
</body>

</html>

