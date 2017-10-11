<?php
//session_start();

include  '../vendor/autoload.php';
include '../app/src/core.php';
use Raccoon\goRSS\model\Productos;
use Raccoon\goRSS\overall\MasterTemplate as tamplate;
$objOverall = new tamplate();
$objOverall->link('Detalle Productos',TEMPLATEG_DIR);

use  Raccoon\goRSS\model\Productos as pro;
$suma=0;
if(isset($_GET['p'])) {
    $_SESSION['producto'][$_SESSION['contador']] = $_GET['p'];
    $_SESSION['contador']++;
}

?>

    <div class="panel panel-default">
        <div class="panel-body">
            <h8>Subtotal</h8>&nbsp;$ <?=number_format($_SESSION['sumar'],2)?>
        </div>
        <div class="panel-footer">
            <a href="confirmar.php" class="btn btn-success" role="button">Confirmar</a>&nbsp;
            <a href="destruir.php" class="btn btn-warning " role="button">Cancelar</a>
        </div>
    </div>


<?php
echo "<table id='detallecompra' class='table table-bordered'>
         <thead>
               <tr>
                   <th>Productos</th>
                   <th>Precio</th>
                   <th>Acciones</th>
                </tr>
       </thead>
";

for($i =0; $i < ($_SESSION['contador']);$i++){

    $obj = new pro($_SESSION['producto'][$i]);
    $rows = $obj->getProductoById();

    echo "<tbody>";
    while($fila = $rows->fetch()){
        echo "<tr>
                    <td>".$fila['nombre']."</td>
                    <td>".$fila['precio']."</td>
                    <td><a href=''><span class='glyphicon glyphicon-remove' ></span></a>
                   <a href=''><span class='glyphicon glyphicon-plus' ></span></a></td>

                </tr>";
        $suma +=$fila['precio'];
    }

}

//echo "
//        <tr>
//            <td class='active'>Subtotal</td>
//            <td class='active'>".number_format($suma,2)."</td>";
//echo    "     <td class='active'><a href=''>Vaciar</a>&nbsp<a href=''>Confirmar</a></td>
//        </tr>
        echo " </tbody>";
echo "</table>";


?>
