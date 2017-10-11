<?php

session_start();
if(!isset($_SESSION['contador'])){
    $_SESSION['contador']=0;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="template/css/style.css">
    <link rel="stylesheet" href="template/css/bootstrap.min.css">
    <script type="text/javascript" src="template/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="template/js/jquery.js"></script>
    <script type="text/javascript" src="template/js/js.js"></script>

</head>
<body>
     <div id="contenedor">

    <a href="index.php" id="texto"><h1>goFanies Store</h1></a>
    <div id="contienecarrito" hidden>

        <div id="carrito" style="background:#ffa969">
            Carrito
        </div>

        <div id="info">
            <a href="pages/destruir.php">
                <button type="button" class="btn btn-warning">Vaciar Carrito</button></a>
            <a href="pages/confirmar.php"> <button type="button" class="btn btn-success">Confirmar Compra</button></a>
        </div>
        <br><br>

    </div>
