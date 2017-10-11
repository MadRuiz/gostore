<?php

include '../../vendor/autoload.php';
include '../../app/src/core.php';
 use Raccoon\goRSS\form\UsuarioForm as form;
 use Raccoon\goRSS\model\Usuarios as user;
use Raccoon\goRSS\overall\MasterTemplate as tamplate;
$objOverall = new tamplate();
$objOverall->link('Productos',TEMPLATE_DIR);
 if(isset($_POST['validar'])){//si envio datos
  $objUser = new user($_POST['user'],$_POST['pass']);
   $contador = 0;
  $filas =$objUser->authentication();

    while($fila = $filas->fetch()){
     $_SESSION['admin'] = $fila['user'];
     $_SESSION['rol'] = $fila['rol'];
     $contador++;
    }


   if($contador>0){
    echo "si";

       header('location: Admon.php');
      }else{
        echo"<div class='alert alert-danger'>El Usuario No Existe , Redirigiendo en 5 segundos...</div>";
        echo "<br>
              <script>
                       function redireccionarPagina() {
                      window.location = '../../index.php';
                          }
                  setTimeout('redireccionarPagina()', 5000);
              </script>

                          ";
     }


   }else{
    //echo "no";
   }





form::auntenciacion('index.php');






?>

