<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processar Alteração</title>

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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $titulo = $_POST['titulo'];
            $categoria = $_POST['categoria'];
            $texto = $_POST['texto'];

            // Verifica se a imagem foi enviada
            if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
                $target_dir = "upload/";
                $target_file = $target_dir . date("YmdHis") . "." . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    // Atualiza os dados na tabela 'noticia'
                    $sql = "UPDATE noticia SET titulo = ?, categoria = ?, texto = ?, nome = ?, caminho = ? WHERE id = ?";
                    $stmt = mysqli_prepare($conn, $sql);

                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, "sssssi", $titulo, $categoria, $texto, $_FILES["image"]["name"], $target_file, $id);
                        mysqli_stmt_execute($stmt);

                        // Verifica se a atualização foi bem-sucedida
                        if (mysqli_stmt_affected_rows($stmt) > 0) {
                            echo "Notícia atualizada com sucesso!";
                        } else {
                            echo "Nenhuma alteração realizada. Verifique se o ID da notícia é válido.";
                        }

                        mysqli_stmt_close($stmt);
                    } else {
                        echo "Erro na preparação da consulta: " . mysqli_error($conn);
                    }
                } else {
                    echo "Falha ao mover o novo arquivo para o diretório de destino.";
                }
            } else {
                echo "Erro no upload da imagem.";
            }
        } else {
            echo "Método de requisição inválido.";
        }

        mysqli_close($conn);
        ?>
    </div>

    <a class="home-button" href="../index.php">Início</a>
    <a class="admin-button" href="area.php">Área Administrativa</a>
</body>

</html>
