<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
<title>Galeria de Imagens</title>
</head>
<body>
<h1>Galeria de Imagens</h1>
<?php

    include("com.php");

    // Consulta as imagens armazenadas na base de dados MySQL
    $sql = "SELECT * FROM imagens";
    $result = mysqli_query($con, $sql);

    // Exibe as imagens em uma galeria
    echo "<div style='display: flex; flex-wrap: wrap;'>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div style='margin: 10px;'>";
        echo "<img src='" . $row["caminho"] . "' alt='" . $row["nome"] . "' style='max-width: 200px;'>";
        echo "<p>" . $row["nome"] . "</p>";
        echo "</div>";
    }
    echo "</div>";

    mysqli_close($con);
    ?>

    <a href="form_upload.php">Voltar</a>

</body>
</html>