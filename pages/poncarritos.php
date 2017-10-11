<?php
session_start();
include '../vendor/autoload.php';
use  Raccoon\goRSS\model\Productos as pro;
$suma=0;
$contar =0;
if(isset($_GET['p'])) {
    $_SESSION['producto'][$_SESSION['contador']] = $_GET['p'];
    $_SESSION['contador']++;
}

    for($i =0; $i < ($_SESSION['contador']);$i++){

        $obj = new pro($_SESSION['producto'][$i]);
        $rows = $obj->getProductoById();
        while($fila = $rows->fetch()){

            $suma +=$fila['precio'];
        }

    }
    echo "".number_format($suma,2)."";
$_SESSION['sumar'] = $suma;
//echo "Prod :".$_SESSION['contador'];

?>
