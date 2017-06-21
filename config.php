<?php
spl_autoload_register(function($nomeClasse){
$caminho = $nomeClasse.".php";
    if(file_exists($caminho)){
      require_once("$caminho");
    }
});
 ?>
