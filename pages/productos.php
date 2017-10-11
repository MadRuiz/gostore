<?php
/**
 * Created by PhpStorm.
 * User: Fany
 * Date: 29/08/2016
 * Time: 16:53
 *****  NOTA:
 *PDO::fetch() Devuelve una sola fila de un conjunto de resultados e imita mysql_fetch_array()
 * PDO::fetchAll()devuelve una matriz asociativa de todos los resultados de la consulta (una matriz 2-D).
*/
include  '../vendor/autoload.php';
include '../app/src/core.php';
use Raccoon\goRSS\model\Productos;
use Raccoon\goRSS\overall\MasterTemplate as tamplate;
$objOverall = new tamplate();
$objOverall->link('Productos',TEMPLATEG_DIR);




$obj = new Productos($_GET['id']);
  $filas = $obj->getAllById();
 while($fila = $filas->fetch()){

?>
    <article>
        <?php
        $filaimg = $obj->getAllImgByProducto();
        while($fila2 = $filaimg->fetch()){
            ?>

            <img src="../template/imgprod/<?=$fila2['imagen']?>" width="100px"  alt="">
        <?php
         }
     ?>
        <h3><?=$fila['nombre']?></h3>
        <p>Descripcion: <?=$fila['descripcion']?></p>
        <p>Precio: <?=$fila['precio']?></p>
        <a href="#"><button>Mas Informacion...</button></a>
        <button value="<?=$fila['idProducto']?>" class="comprarahora">Comprar Ahora</button>

    </article>

 <?php
    }//fin while1




 ?>


