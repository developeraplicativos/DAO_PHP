<?php
require_once('config.php');

$edita = new usuario();

$edita->loadUsuarioById(7);
$edita->update("daniel","maltazar");
echo $edita;


?>
