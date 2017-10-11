<?php
/**
 * Created by PhpStorm.
 * User: Fany
 * Date: 30/08/2016
 * Time: 19:48
 */

namespace Raccoon\goRSS\model;
use Raccoon\goRSS\model\Database as db;

class Pedidos
{
    private $id;
    private $cliente;
    private $fecha;
    private $estado;

    /**
     * Pedidos constructor.
     * @param $id
     */
    public function __construct($id= null,$cliente = null,$fecha = null , $estado = null)
    {
        $this->id = $id;
        $this->cliente = $cliente;
        $this->fecha = $fecha;
        $this->estado = $estado;
    }

    public  function add(){
         $con = db::conectar();

         $sql = $con->prepare("CALL addPedido(?)");
         $res = $sql->execute(array($this->id));

         return $res;
    }

    public function getPedidoByCliente($cliente)//el ultimo pedido y agrupado
    {
        $con = db::conectar();
        $sql = $con->prepare("CALL getPedidoByCliente(?)");
        $sql->execute(array($cliente));

            return $sql;

    }

    public function listAllPedidosByCliente()
    {
        $con = db::conectar();
        $query = $con->prepare("SELECT * FROM listPedidosCliente");
        $query->execute();

        return $query->fetchAll();
    }

    public function servirPedido()
    {
        $con = db::conectar();
        $query = $con->prepare('CALL pedidoServido(?)');
        $res = $query->execute(array($this->id));

        return $res;
    }

    public function cancelarPedido()
    {
        $con = db::conectar();
        $query = $con->prepare('CALL cancelarPedido(?)');
        $res = $query->execute(array($this->id));

        return $res;
    }
}