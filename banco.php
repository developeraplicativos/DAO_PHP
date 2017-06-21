<?php
//class banco extends PDO{
class banco{
  private $conn;
  public function __construct(){
    $this->conn = new PDO("mysql:dbname=dbphp7;host=localhost","root","");
    $quer = $this->conn->prepare("SELECT * FROM tb_usuarios");
    $quer->execute();

    $resultado = $quer->fetchALL(PDO::FETCH_ASSOC);
    foreach ($resultado as $linha) {
      foreach ($linha as $key => $value) {
        echo $key."  ".$value." </br>";
      }
        echo "----------------------------------------   </br>";
    }

  }
//  public function select(){

//  }
}
/*
private $conn;
public function __construct(){
  $this -> conn = new PDO("mysql:dbname=dbphp7;host=localhost","root","");
  echo "connected";
}
public function setParams($stmt,$params = array()){
  foreach ($params as $key => $value) {
    $this->setParam($key,$value);
  }
}
public function setParam($stmt,$key,$value){
  $stmt->binbParam($key,$value);
}
public function query($rawQuery,$params = array()){
  $stmt = $this -> conn -> prepare($rawQuery);
  $this-> setParams($stmt,$params);
  return $stmt->execute();
}
public function select($rawQuery,$params=array()){
  $stmt = $this->query($rawQuery,$params);
//  return $stmt-> fetchALL(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

}
*/
?>
