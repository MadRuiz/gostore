<?php

    namespace Raccoon\goRSS\model;

   // include "../../../vendor/autoload.php";
    use Raccoon\goRSS\model\Database as db;
    use PDO;
/**
 * Created by PhpStorm.
 * User: Fany
 * Date: 17/08/2016
 * Time: 10:27
 */


class Clientes
{


    private $user;
    private $pas;

    /**
     * Clientes constructor.
     * @param $user
     * @param $pas
     */
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
    public function add()
    {
        $con = db::conectar();
        $sql = $con->prepare("Call addCliente(?,?)");
        $res = $sql->execute(array("usuario"=>$this->user,"contrasena"=>$this->pas));

        return $res;//boleano

    }

    public function authentication()
    {
        $con = db::conectar();
        $sql = $con->prepare("Call Autenticacion(?,?)");
        $sql->execute(array($this->user,$this->pas));

        return $sql;//array

    }
    public function destruirSession(){

        session_destroy();
    }



}


  /* $clientes = new Clientes();
   $res =  $clientes->listar();

    foreach($res as $rows){
        print_r($rows);
    }*/