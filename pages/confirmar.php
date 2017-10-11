<?php
/**
 * Created by PhpStorm.
 * User: Fany
 * Date: 31/08/2016
 * Time: 10:26
 */
include  '../vendor/autoload.php';
include '../app/src/core.php';
use Raccoon\goRSS\model\Productos;
use Raccoon\goRSS\overall\MasterTemplate as tamplate;
$objOverall = new tamplate();
$objOverall->link('Productos',TEMPLATEG_DIR);

 echo '<meta charset="UTF-8">';
?>

    <div class="row">
        <div class="col-lg-12">
            <form class="form-horizontal" action="login.php" method="post">
                <h2 class="form-signin-heading">Bienvenido</h2>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Usuario</label>
                    <div class="col-sm-4 col-sm-offset-4">
                        <input type="text" id="inputEmail" name="user" class="form-control" placeholder="Usuario" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Contraseña</label>
                    <div class="col-sm-4 col-sm-offset-4">
                        <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Contraseña" required>
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-4">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                </div>
                <div class="col-sm-4 col-sm-offset-4">
                    <a href="">No tiens Cuenta?</a>
                </div>
            </form>
        </div>

    </div>





<?php
        include TEMPLATEG_DIR.'estructura/footer.php';
?>