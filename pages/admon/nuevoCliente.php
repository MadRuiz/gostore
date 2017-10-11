<?php
include '../../vendor/autoload.php';
include '../../app/src/core.php';
use Raccoon\goRSS\form\UsuarioForm as form;
use Raccoon\goRSS\model\Usuarios as user;
use Raccoon\goRSS\overall\MasterTemplate as tamplate;
$objOverall = new tamplate();
$objOverall->link('Productos',TEMPLATE_DIR);