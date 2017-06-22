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
    //seleciona um usuario com id especifico
    public function loadUsuarioById($id){
      $mysql = new banco02();
      $resultado = $mysql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID ", array(
        ":ID"=> $id
      )); // ALTERADO
        if(isset($resultado[0])){
  //        $row = $resultado[0];

          $this-> setData( $resultado[0]);
        }

      }
      //seleciona todos os usuarios
      public static function listUsuario(){
        $lista = new banco02();
        return $lista -> select("SELECT * FROM tb_usuarios ORDER BY desclogin");
      }
      // procura usuario por pedaço/integral do login
      public static function procurar($busca){
        $lista = new banco02();
        $valor = '%'.$busca.'%';
  //      echo $valor;
        return $lista -> select("SELECT * FROM tb_usuarios WHERE desclogin LIKE :BUSCA ", array(
          ':BUSCA'=> "%".$valor."%"
        ));
      }
      //verifica login e senha do usuario
      public function login($login,$senha){
        $mysql = new banco02();
        $resultado = $mysql-> select("SELECT * FROM tb_usuarios WHERE desclogin= :LOGIN AND descsenha= :SENHA", array(
          ':LOGIN'=>$login,
          ':SENHA'=>$senha
        ));
        print_r($resultado);
        if(count($resultado)>0){
      //    print_r($resultado);
      //      $row = $resultado[0];
            $this-> setData( $resultado[0]);

        }else{
          throw new Exception("    --->  usuario ou senha errada  <---     ");
        }
      }
      //inclusão do codigo p evitar redundancia
      public function setData($data){

        $this->setIdusuario($data['idusuario']);
        $this->setDesclogin($data['desclogin']);
        $this->setDescsenha($data['descsenha']);
        //$this->setDatacadastro(new DateTime($data['datacadastro']));
        $this->setDatacadastro(new DateTime($data['datacadastro']));
      }
      //adiciona um login e senha
      public function insert(){
        $mysql = new banco02();
        $resultado = $mysql -> select("CALL sp_usuarios_insert (:LOGIN,:SENHA)",array(
          ':LOGIN'=> $this->getDesclogin(),
          ':SENHA'=> $this->getDescsenha()
        ));
        if(count($resultado)>0){
          $this->setData($resultado[0]);
        }
      }
      //novo usuario já com parametros
      public function __construct($login="",$senha=""){
        $this->setDesclogin($login);
        $this->setDescsenha($senha);
      }
      //alterar o usuario no DB
      public function update($login, $senha){
        $this ->setDescsenha($senha);
        $this-> setDesclogin($login);

        $usuario = new banco02();
        $usuario->query("UPDATE tb_usuarios SET desclogin=:LOGIN and descsenha=:SENHA where idusuario=:ID", ARRAY(
          ":LOGIN"=>$this->getDesclogin(),
          ":SENHA"=>$this->getDescsenha(),
          ":ID"=>$this->getIdusuario()
        ));


      }
      //imprimi usuario apos loadUsuarioById atraves de um echo no usuario
      public function __toString(){
        return json_encode(array(
            $this->getIdusuario(),
            $this->getDesclogin(),
            $this->getDescsenha(),
            $this->getDatacadastro()->format("d-m-y H:i:s")
        ));

      }


  }
?>
