<?php
/**
 * Created by PhpStorm.
 * User: Fany
 * Date: 03/09/2016
 * Time: 19:22
 */
    session_start();
    if(!isset($_SESSION['rol'])){
        header('location:../../index.php');
    }
    include '../../vendor/autoload.php';
    use Raccoon\goRSS\model\Pedidos as p;
    include '../../template/estructura/head.php';
    include '../../template/estructura/nav.php';

    ?>
<div class="table-responsive">
<table class="table table-striped" >
       <thead>
               <tr>
                   <th hidden></th>
                   <th>Nombre</th>
                   <th>Apellido</th>
                   <th>fecha</th>
                   <th>estado</th>
                   <th colspan="3">Acciones</th>

                </tr>
       </thead>
    <tbody>
              <?php
                    $objPe = new p();
              $filas =   $objPe->listAllPedidosByCliente();
              foreach($filas as $fila){


              ?>
              <tr>
                  <td hidden><?=$fila['idpedido']?></td>
                  <td><?=$fila['nombre']?></td>
                  <td><?=$fila['apellidos']?></td>
                  <td><?=$fila['fecha']?></td>
                  <?php
                  switch($fila['estado']){
                      case 0:
                          echo "<td class='bg-danger'>No enviado</td>";
                          break;
                      case 1:
                          echo "<td class='bg-success' '>Enviado</td>";
                          break;
                      case 2:
                          echo "<td class='bg-warning'>Anulado</td>";
                          break;
                  }
                  ?>
                  <td><a href="gestionar.php?id=<?=$fila["idpedido"]?>" class="btn btn-primary " role="button">Gestionar</a></td>
                  <td><a href="pedidoservido.php?id=<?=$fila["idpedido"]?>" class="btn btn-success " role="button">Pedido Servido</a></td>
                  <td><a href="calcelarpedido.php?id=<?=$fila["idpedido"]?>" class="btn btn-warning " role="button">Cancelar Pedido</a></td>
              </tr>
    <?php
    }
    ?>
      </tbody>
</table>
</div>

    <?php
            include '../../template/estructura/footer.php';
    ?>
