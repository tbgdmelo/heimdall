<?php 
  require_once('functions.php'); 

  if (isset($_GET['cod'])){
    delete($_GET['cod']);
  } else {
    die("ERRO: Funcionário não definido.");
  }
?>