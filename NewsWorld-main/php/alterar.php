<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Notícias</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .noticia {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color: #0056b3;
        }

        hr {
            border: 1px solid #ddd;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h1>Alterar Notícias Cadastradas</h1>

    <?php
    include("comm.php");

    $sql = "SELECT id, titulo, texto, categoria, cliques, caminho, nome FROM noticia ORDER BY id desc";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='noticia'>";
            echo "Identificador: " . $row["id"] . "<br>" .
                "Titulo: " . $row["titulo"] . "<br>" .
                "Categoria: " . $row["categoria"] . "<br>" .
                "Numero de Cliques: " . $row["cliques"] . "<br>" .
                "Texto: " . $row["texto"] . "<br>" .
                "<img src='" . $row["caminho"] . "' alt='" . $row["nome"] . "' >" . "<br>";

            echo "<a href='alteraDados.php?id={$row['id']}'>Alterar Notícia</a><br>";
            echo "</div><hr>";
        }
    } else {
        echo "0 resultados";
    }

    mysqli_close($conn);
    ?>

</body>

</html>
