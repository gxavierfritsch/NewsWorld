<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include("comm.php");

    session_start();

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];


    $sql = "SELECT usuario, senha FROM login 
        WHERE `usuario` = '$usuario' AND `senha`= '$senha'";

    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha'] = $senha;
        header('location:/NewsWorld-main/php/area.php');
    } else {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('location:/NewsWorld-main/php/form_login.php');

    }

    mysqli_close($conn);
    ?>

</body>

</html>