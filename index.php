<?php
include 'vendor/autoload.php';
include 'app/src/core.php';
/**
 * Created by PhpStorm.
 * User: Fany
 * Date: 22/08/2016
 * Time: 19:15
 */
if(isset($_GET['views'])){
    if(file_exists('pages/admon/'.strtolower($_GET['views'])).'.php'){

        header('location:pages/admon/');
    }

}
include 'template/estructura/header.php';
include 'template/estructura/navgeneral.php';
 use Raccoon\goRSS\model\Productos as pro;





?>
    <article>
        <div class="row">
                    <?php

                    $obj = new pro();
                    $rows = $obj->getAll();

                    foreach($rows as $row){
                    $filas = $obj->getImgProductById($row['idProducto']);
                    foreach ($filas as $fila) {
                        # code...
                        ?>
            <div class="col-sm-6 col-md-4">
                 <div class="thumbnail">
                        <img src="template/imgprod/<?= $fila['imagen'] ?>" height="100px" width="100px" alt="">
                        <?php
                    }
                    ?>
                    <div class="caption">
                        <h3><?= $row['nombre'] ?></h3>

                        <p>Descripcion: <?= $row['descripcion'] ?></p>

                        <p>Precio:$ <?= $row['precio'] ?></p>

                        <p>
                            <a href="./pages/productos.php?id=<?= $row['idProducto'] ?>" class="btn btn-primary"
                               role="button">Mas Informacion...</a>
                            <button value="<?= $row['idProducto'] ?>" class="botoncompra btn btn-default">Comprar
                            </button>
                        </p>
                    </div>
                </div>
            </div>
            <?php
                        }
            ?>
        </div>
    </article>


<?php
    include 'template/estructura/footer.php';
?>