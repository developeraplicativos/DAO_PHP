<?php
require_once('config.php');

$edita = new usuario();

$edita->loadUsuarioById(3);
$edita->delete();
echo $edita;


?>
