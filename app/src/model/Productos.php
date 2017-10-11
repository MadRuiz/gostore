<?php


namespace  Raccoon\goRSS\model;
//include "../../../vendor/autoload.php";

use Raccoon\goRSS\model\Database as db;
/**
 * Created by PhpStorm.
 * User: Fany
 * Date: 17/08/2016
 * Time: 10:28
 */
class Productos
{
    private $idProducto;
    private $nombre;
    private $descripcion;
    private $precio;
    private $peso;
    private $existencias;
    private $estado;
    private static $getAll = "";
    /**
     * Productos constructor.
     * @param $idProducto
     * @param $nombre
     * @param $descripcion
     * @param $precio
     * @param $peso
     * @param $existencias
     */
    public function __construct($idProducto=null, $nombre=null, $descripcion=null, $precio=null, $peso=null, $existencias=null)
    {
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->peso = $peso;
        $this->existencias = $existencias;
    }

    public function getAll(){//index
        $con = db::conectar();
        $query = $con->prepare("CALL getAllPro()");
        $query->execute();
        return $query->fetchAll();

    }public function getAllById(){
        $con = db::conectar();
        $query = $con->prepare("CALL getAllProdById(?)");
        $query->execute(array($this->idProducto));
        return $query;
        //Devuelve una sola fila de un conjunto de resultados e imita mysql_fetch_array()
        //PDO::fetchAll()devuelve una matriz asociativa de todos los resultados de la consulta (una matriz 2-D).
    }

    public function add()
    {
        $con = db::conectar();
        $sql = $con->prepare("Call addProducto(?,?,?,?,?,?,?)");
        $res = $sql->execute(array("nombre"=>$this->nombre,"descripcion"=>$this->descripcion,"precio"=>$this->precio,"peso"=>$this->peso,"existencias"=>$this->existencias));

        return $res;//boleano

    }

    public function discount()
    {
        $con = db::conectar();
        $mdb = $con->prepare('CALL descontarStock(?,?)');
        $res = $mdb->execute(array($this->idProducto,$this->existencias));
        return $res;

    }

    public function getImgProductById($id){//index lmitado
    $con = db::conectar();
    $query = $con->prepare("CALL getProductImagenById(?)");
    $query->execute(array($id));
    $res = $query->fetchAll();
    return $res;

    }
    public function getAllImgByProducto(){//index lmitado
        $con = db::conectar();
        $query = $con->prepare("CALL getAllImgByProducto(?)");
        $query->execute(array($this->idProducto));

        return $query;

    }

    public function getImgProdById(){
        $con = db::conectar();
        $query = $con->prepare("CALL getProductImagenById(?)");
        $query->execute(array($this->idProducto));
       // $res = $query->fetchAll();
        return $query;

    }

    public function getProductoById(){
        $con = db::conectar();
        $query = $con->prepare("CALL getProductById(?)");
        $query->execute(array($this->idProducto));
        // $res = $query->fetchAll();
        return $query;

    }

    public function getProdAndImage(){//innger join
        $con = db::conectar();
        $query = $con->prepare("CALL getProdAndImage(?)");
        $query->execute(array($this->idProducto));
       // $res = $query->fetchAll();
        return $query;

    }


    public function getAllImgProduct(){
        $con = db::conectar();
        $query = $con->prepare("SELECT * FROM getallproductimagen");
        $query->execute();
        $res = $query->fetchAll();
        return $res;

    }

}

/*
$obj = new Productos(1);
$rows = $obj->getProductoById();

print_r($rows->fetch());*/