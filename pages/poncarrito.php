<?php
/**
 * Created by PhpStorm.
 * User: Fany
 * Date: 31/08/2016
 * Time: 9:35
 */


//se carga mediante Ajax
//matriz
  session_start();
    include '../vendor/autoload.php';
    use  Raccoon\goRSS\model\Productos as pro;
    $suma=0;
    if(isset($_GET['p'])) {
        $_SESSION['producto'][$_SESSION['contador']] = $_GET['p'];
        $_SESSION['contador']++;
    }
        echo "<table>";
        for($i =0; $i < ($_SESSION['contador']);$i++){

            $obj = new pro($_SESSION['producto'][$i]);
            $rows = $obj->getProductoById();
            echo "<meta charset='UTF-8'>";
            while($fila = $rows->fetch()){
                echo "<tr>
                    <td>".$fila['nombre']."</td>
                    <td>".$fila['precio']."</td>
                </tr>";
                $suma +=$fila['precio'];
            }

        }
        echo "<tr>
            <td>Subtotal</td>
            <td>".number_format($suma,2)."</td>
        </tr>";
        echo "</table>";



?>