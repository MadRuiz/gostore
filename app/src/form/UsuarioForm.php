<?php
/**
 * Created by PhpStorm.
 * User: Fany
 * Date: 03/09/2016
 * Time: 19:44
 */

namespace Raccoon\goRSS\form;


class UsuarioForm
{

    public static function auntenciacion($action)
    {
        echo "
    <div class='row'>
      <div class='col-lg-12'>
        <form class='form-horizontal'  method='post' action='$action'>
           <h2 class='form-signin-heading'>Bienvenido</h2>
                <div class='form-group'>

                    <div class='col-sm-4 col-sm-offset-4' >
                        <input type='text' id='inputEmail' name='user' class='form-control' placeholder='Usuario' required autofocus>
                    </div>
                </div>
                <div class='form-group'>

                    <div class='col-sm-4 col-sm-offset-4'>
                        <input type='password' id='inputPassword' name='pass' class='form-control' placeholder='Contraseña' required>
                    </div>
                </div>
                <div class='col-sm-4 col-sm-offset-4'>
                    <button class='btn btn-lg btn-primary btn-block'  name='validar' type='submit'>Iniciar</button>
                </div>
                <div class='col-sm-4 col-sm-offset-4'>

                </div>
        </form>
      </div>
    </div>

        ";
    }

}


