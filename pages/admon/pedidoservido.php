<?php
    include '../../vendor/autoload.php';
    use Raccoon\goRSS\model\Pedidos as p;
    if(empty($_GET['id'])){
        header('location: pedidos.php');
    }

    $objP = new p($_GET['id']);

    if( $objP->servirPedido()){
        header('location: pedidos.php');
    }