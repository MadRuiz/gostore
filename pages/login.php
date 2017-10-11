<?php
 include '../app/src/core.php';
 include '../vendor/autoload.php';

 use Raccoon\goRSS\model\Clientes as user;
 use Raccoon\goRSS\model\Productos as prod;
 use Raccoon\goRSS\model\Pedidos as p;
 use Raccoon\goRSS\model\LineasPedido as linep;
use Raccoon\goRSS\overall\MasterTemplate as tamplate;
$objOverall = new tamplate();
$objOverall->link('Confirmar',TEMPLATEG_DIR);


    $contador = 0;
    $obj =  new user($_POST['user'],$_POST['pass']);
    $filas = $obj->authentication();

     while($fila = $filas->fetch()){
        $contador++;
         $_SESSION['usuario'] = $fila['idCliente'];
     }
    if($contador >0){//usuario existe
       $objP = new p($_SESSION['usuario']);

        if($objP->add()){//insertar pedido

          $filasPedidos = $objP->getPedidoByCliente($_SESSION['usuario']);//obtener id de cliente insertado en PEDIDOS ANTERIORMENTE
           while($filaP = $filasPedidos->fetch()){
               $_SESSION['idpedido'] = $filaP['idPedido'];

           }
            //echo "producto".$_SESSION['producto'];
            for($i = 0; $i < $_SESSION['contador'];$i++){


                $line = new linep(null,$_SESSION['idpedido'],$_SESSION['producto'][$i],$_SESSION['contador']);

                if($line->add()){}//si se inserta en lineasP restar en existencias de productos
                    $objprod = new prod($_SESSION['producto'][$i]);
                    $filasprodus = $objprod->getProductoById();
                    while($filasProductos = $filasprodus->fetch()){
                       $existencias = $filasProductos['existencias'];

                    //descontar
                        $objPro = new prod($_SESSION['producto'][$i],null,null,null,null,$existencias);
                        $objPro->discount();
                }
            }


        }


        echo "<br>
                    Tu pedido se ha realizado correctamente. Redirigiendo en 5 segundos...";
                    $obj->destruirSession();
               echo     "  <script>
                     function redireccionarPagina() {
                    window.location = '../index.php';
                        }
                setTimeout('redireccionarPagina()', 5000);
                    </script>

                        ";


    }else{
        echo "<h3 style='color: red' >El Usuario No Existe</h3>";
        echo "<br>";
//        $obj->destruirSession();
        echo     "  <script>
                     function redireccionarPagina() {
                    window.location = 'confirmar.php';
                        }
                setTimeout('redireccionarPagina()', 5000);
                    </script>

                        ";
    }

include '../template/estructura/footer.php';