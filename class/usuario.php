<?php
  class usuario{
    private $idusuario;
    private $desclogin;
    private $descsenha;
    private $datacadastro;
//---------------------------------------------idusuario
    public function setIdusuario($novoValor){
      $this->idusuario = $novoValor;
    }
    public function getIdusuario(){
      return $this->idusuario;
    }
//---------------------------------------------desclogin
    public function setDesclogin($novoValor){
      $this->desclogin = $novoValor;
    }
    public function getDesclogin(){
      return $this->desclogin;
    }
//---------------------------------------------descsenha
    public function setDescsenha($novoValor){
      $this->descsenha = $novoValor;
    }
    public function getDescsenha(){
      return $this->descsenha;
    }
//---------------------------------------------datacadastro
    public function setDatacadastro($novoValor){
      $this->datacadastro = $novoValor;
    }
    public function getDatacadastro(){
      return $this->datacadastro;
    }

    public function loadUsuarioById($id){
      $mysql = new banco02();
      $resultado = $mysql->select("SELECT * FROM tb_usuarios WHERE idusuario = 2 " ); // ALTERADO
        if(isset($resultado[0])){
          $row = $resultado[0];

          $this->setIdusuario($row['idusuario']);
          $this->setDesclogin($row['desclogin']);
          $this->setDescsenha($row['descsenha']);
          $this->setDatacadastro(new DateTime($row['datacadastro']));
        }

      }
      public function __toString(){
        return json_encode(array(
            $this->getIdusuario(),
            $this->getDesclogin(),
            $this->getDescsenha(),
            $this->getDatacadastro()->format("d/m/s H:i:s")
        ));

      }


  }
?>
