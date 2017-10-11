<?php
/**
 * Created by PhpStorm.
 * User: Fany
 * Date: 08/09/2016
 * Time: 23:21
 */

namespace Raccoon\goRSS\form;


class ClientesForm
{
    public static function add($action)
    {
        ?>
        <div class="row">
            <div class="col-lg-12">
                <form class="form-horizontal" action="<?=$action?>" method="post">
                    <h2 class="form-signin-heading">Nuevo Cliente</h2>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-4">
                            <input type="text" id="inputEmail" name="nombre" class="form-control" placeholder="Nombre" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-4">
                            <input type="text" id="inputEmail" name="apellidos" class="form-control" placeholder="Apellidos" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="sr-only">Correo Electronico</label>
                        <div class="col-sm-4 col-sm-offset-4">
                            <input type="email" id="inputPassword" name="correo" class="form-control" placeholder="Contraseña" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-4">
                            <input type="text" id="inputEmail" name="direccion" class="form-control" placeholder="Direccion" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-4">
                            <input type="text" id="inputEmail" name="pais" class="form-control" placeholder="Pais" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-4">
                            <input type="text" id="inputEmail" name="user" class="form-control" placeholder="Usuario" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-4">
                            <input type="text" id="inputEmail" name="pass" class="form-control" placeholder="Clave" required autofocus>
                        </div>
                    </div>
                    <div class="col-sm-4 col-sm-offset-4">
                        <button class="btn btn-lg btn-primary btn-block" name="guardar" type="submit">Guardar</button>
                    </div>
                </form>
            </div>

        </div>

        <?php
    }
}