<?php
//class banco extends PDO{
class banco02{
  private $conn;
  public function __construct(){
    $this->conn = new PDO("mysql:dbname=dbphp7;host=localhost","root","");

  }

  public function select($selecao,$parametros= array()){
    $result = $this-> query($selecao,$parametros);
    $resultado = $result ->fetchALL(PDO::FETCH_ASSOC);
    return $resultado;
  }

  public function query($selecao,$parametros= array()){
    $quer = $this->conn->prepare($selecao);
    $this -> setParams($quer,$parametros);
    $quer -> execute();
    return $quer;
  }

  public function setParams($quer,$parametros= array()){
//        echo "setps </br>";
    foreach ($parametros as $key => $value) {
      $this->setCadaParametro($quer,$key,$value);
    }
  }
  public function setCadaParametro($quer,$key,$value){
//      echo "setcp </br>";
    $quer -> bindParam($key,$value);
  }

}
?>
