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
  $sql = new banco02();
  echo json_encode( $sql->select("select * from tb_usuarios") );
//$rua = $sql-> select("SELECT * FROM tb_usuarios");
//echo json_encode($rua);
?>
