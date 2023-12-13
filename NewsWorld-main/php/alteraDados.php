<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Notícia</title>

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

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        h1 {
            color: #333;
        }

        label {
            display: block;
            margin-top: 10px;
            margin-bottom: 5px;
            text-align: left;
        }

        input,
        textarea,
        select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button,
        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        a {
            text-decoration: none;
            color: inherit;
            font-weight: bold;
        }

        button a {
            color: #fff;
        }

        button:hover {
            background-color: #0056b3;
        }

        input[type="file"] {
            margin-top: 10px;
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .delete-link {
            color: #dc3545;
        }

        .delete-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Editar Notícia</h1>

    <?php
    include("comm.php");
    $id = $_GET['id'];

    $sql = "SELECT * FROM noticia WHERE id = " . $_GET['id'];
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Registro não encontrado.";
        exit;
    }
    ?>

    <form action="/NewsWorld-main/php/alteraNoBanco.php?id=<?php echo $id ?>" method="post"
        enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label for="titulo">TÍTULO</label>
        <input type="text" name="titulo" value="<?php echo $row['titulo']; ?>" required>

        <label for="categoria">Escolha uma categoria:</label>
        <select name="categoria" id="categoria">
            <option value="mundo" <?php echo ($row['categoria'] === 'mundo') ? 'selected' : ''; ?>>Mundo</option>
            <option value="brasil" <?php echo ($row['categoria'] === 'brasil') ? 'selected' : ''; ?>>Brasil</option>
            <option value="politica" <?php echo ($row['categoria'] === 'politica') ? 'selected' : ''; ?>>Política</option>
            <option value="economia" <?php echo ($row['categoria'] === 'economia') ? 'selected' : ''; ?>>Economia</option>
            <option value="ciencia" <?php echo ($row['categoria'] === 'ciencia') ? 'selected' : ''; ?>>Ciencia</option>
            <option value="saude" <?php echo ($row['categoria'] === 'saude') ? 'selected' : ''; ?>>Saude</option>
            <option value="esportes" <?php echo ($row['categoria'] === 'esportes') ? 'selected' : ''; ?>>Esportes</option>
            <option value="arte" <?php echo ($row['categoria'] === 'arte') ? 'selected' : ''; ?>>Arte</option>
            <option value="musica" <?php echo ($row['categoria'] === 'musica') ? 'selected' : ''; ?>>Musica</option>
            <option value="culinaria" <?php echo ($row['categoria'] === 'culinaria') ? 'selected' : ''; ?>>Culinaria</option>
            <option value="ferias" <?php echo ($row['categoria'] === 'ferias') ? 'selected' : ''; ?>>Ferias</option>
            <option value="jogos" <?php echo ($row['categoria'] === 'jogos') ? 'selected' : ''; ?>>Jogos</option>
        </select>

        <label for="texto">TEXTO:</label>
        <textarea name="texto" cols="40" rows="8" required><?php echo $row['texto']; ?></textarea>

        <input type="file" name="image">

        <div class="options">
            <button type="submit">Salvar Alterações</button>
            <a href="area.php">Voltar</a>
        </div>
    </form>

    <div>
        <a href="excluirNoBD.php?id=<?php echo $row['id']; ?>" class="delete-link">Excluir Notícia</a>
    </div>

    <?php
    mysqli_close($conn);
    ?>

</body>

</html>
