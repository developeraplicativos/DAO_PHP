<?php
spl_autoload_register(function($nomeClasse){
$caminho = "class".DIRECTORY_SEPARATOR.$nomeClasse.".php";
    if(file_exists($caminho)){
      require_once("$caminho");
    }
});
 ?>
