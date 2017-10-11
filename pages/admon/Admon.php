<?php
session_start();
if(!isset($_SESSION['rol'])){
   header('location:../../index.php');
}
include_once '../../app/src/core.php';
include '../../vendor/autoload.php';


include (TEMPLATE_DIR .'estructura/head.php');
include (TEMPLATE_DIR .'estructura/nav.php');



include (TEMPLATE_DIR.'estructura/footer.php');





