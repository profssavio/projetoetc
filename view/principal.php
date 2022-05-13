<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../lib/bootstrap-5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../lib/bootstrap-5.1.3/css/bootstrap.min.css">
    <script src="../lib/bootstrap-5.1.3/js/bootstrap.min.js"></script>
    <title></title>
</head>

<body>
    <?php
    session_start();
    if ( !isset( $_SESSION["usuario"] ) ) {
        header( "Location: ../index.php" );
    }
    echo "Usuario logado: {$_SESSION["usuario"]}";
    ?>



</body>

</html>