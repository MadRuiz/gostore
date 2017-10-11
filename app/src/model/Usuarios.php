<?php
/**
 * Created by PhpStorm.
 * User: Fany
 * Date: 21/08/2016
 * Time: 21:22
 */

namespace Raccoon\goRSS\model;
use Raccoon\goRSS\model\Database as db;

class Usuarios
{
    public function __construct($user, $pas)
    {
        $this->user = $user;
        $this->pas = $pas;
    }

    public  function listar(){
        $con = db::conectar();
        $consulta = $con->prepare("SELECT * FROM clientes");
        $consulta->execute();
        return $consulta->fetchAll();

    }
    public function authentication()
    {
        try{
            $con = db::conectar();
            $sql = $con->prepare("SELECT * FROM usuarios WHERE user =? and pass= md5(?)");
            $sql->execute(array($this->user,$this->pas));


        }catch (\PDOException $e){
            echo "The user could not be added.<br>".$e->getMessage();
        }

        return $sql;//array

    }

    public function destruirSession(){

        session_destroy();
    }

}