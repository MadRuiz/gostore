<?php
/**
 * Created by PhpStorm.
 * User: Fany
 * Date: 07/09/2016
 * Time: 10:53
 */

namespace Raccoon\goRSS\overall;

session_start();
if(!isset($_SESSION['contador'])){
    $_SESSION['contador']=0;
}

class MasterTemplate
{

    public function link($title='Productos',$ruta)
    {
        $tit ='';
        ($title)?$tit = $title:$tit ="goFanies Store";
        ?>

        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title><?=$tit?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

                       <link rel="stylesheet" href="<?=$ruta?>css/style.css">
                       <link rel="stylesheet" href="<?=$ruta?>css/bootstrap.min.css">
                       <script type="text/javascript" src="<?=$ruta?>js/bootstrap.min.js"></script>
                       <script type="text/javascript" src="<?=$ruta?>js/jquery.js"></script>
                       <script type="text/javascript" src="<?=$ruta?>js/js.js"></script>

        </head>
        <body>
        <div id="contenedor">

            <a href="index.php" id="texto"><h1>goFanies Store</h1></a>


<?php
    }


}