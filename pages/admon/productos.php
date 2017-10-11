<?php
/**
 * Created by PhpStorm.
 * User: Fany
 * Date: 03/09/2016
 * Time: 19:21
 */

    session_start();
    if(!isset($_SESSION['rol']) and !isset($_GET['id'])){
        header('location:../../index.php');
    }