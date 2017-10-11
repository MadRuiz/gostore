<?php
/**
 * Created by PhpStorm.
 * User: Fany
 * Date: 31/08/2016
 * Time: 14:42
 */

namespace Raccoon\goRSS\model;
use Raccoon\goRSS\model\Database as db;


class LineasPedido extends Pedidos
{
    private $id;
    private $pedido;
    private $producto;
    private $unidades;

    /**
     * LineasPedido constructor.
     * @param $id
     * @param $pedido
     * @param $producto
     * @param $unidades
     */
    public function __construct($id = null, $pedido = null, $producto = null, $unidades = null)
    {
        $this->id = $id;
        $this->pedido = $pedido;
        $this->producto = $producto;
        $this->unidades = $unidades;
    }

    public function add()
    {
      $con = db::conectar();
        $query = $con->prepare("Call addLineaPedido(?,?,?)");
        $res = $query->execute(array($this->pedido,$this->producto,$this->unidades));

        return $res;
    }


}