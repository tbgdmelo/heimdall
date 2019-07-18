<?php
  require_once('../inc/database.php');
  require_once('../config.php');
  $id = $_POST["id_eqp"];
  $cod = $_POST["id_func"];
  $database = open_database();
  $sql = "INSERT INTO relacao (id_eqp, id_fun) VALUES ('$id','$cod')";
  try {
    $database->query($sql);

    $_SESSION['message'] = 'Registro cadastrado com sucesso.';
    $_SESSION['type'] = 'success';
  
  } catch (Exception $e) { 
  
    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  } 

  close_database($database);

  $url = '../equipamentos/';
    echo'<META HTTP-EQUIV = Refresh CONTENT = "0; URL='.$url.'">';

?>