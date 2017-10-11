<?php
/**
 * Created by PhpStorm.
 * User: Fany
 * Date: 05/09/2016
 * Time: 16:59
 */
    if(isset($_GET['u'])){
        header('location:admon/');
    }



   /* if(isset($_GET['view']) and file_exists('../app/src/controllers/'.strtolower($_GET['view']))){
        include '../app/src/controllers/'.strtolower($_GET['view']).'Controllers.php';

    }else{
        echo "error";
    }*/