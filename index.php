<?php
/*
require_once('config.php');
$mosca = new banco();

require_once('config.php');
$sql = new banco();
$rua = $sql-> select("SELECT * FROM tb_usuarios");
echo json_encode($rua);
*/
require_once('config.php');
//  $sql = new banco02();
//  echo json_encode( $sql->select("select * from tb_usuarios") );
//$rua = $sql-> select("SELECT * FROM tb_usuarios");
//echo json_encode($rua);
//
  $us = new usuario();
  $us->login("claudio","quatro4");
  echo $us;
//  $procura = new usuario();
//  $parada = $procura -> procurar("ped");

//echo json_encode(usuario::listUsuario());
//echo $us;
//echo json_encode(usuario::listUsuario());
?>
