<?php

require_once('../config.php');
require_once(DBAPI);

$funcionarios = null;
$funcionario = null;

/**
 *  Listagem de Funcionario
 */
function index() {
	global $funcionarios;
	$funcionarios = find_all('funcionarios');
}

/**
 *  Cadastro de Funcionario
 */
function add() {
  
  if (!empty($_POST['funcionario'])) {
    
    $funcionario = $_POST['funcionario'];
    save('funcionarios', $funcionario);
    header('location: index.php');
  }
}

//Enviando a imagem
//Sempre adicionar a foto já com o nome do colaborador
//NÃO CONSEGUI PEGAR O NOME INSERIDO NO FORM :,(
function addImg($caminho = null){
  if(isset($_FILES['pic'])){
    $ext = strtolower(substr($_FILES['pic']['name'], -4));
    $new_name =  $_FILES['pic']['name'];
    $dir = $caminho;
    move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name);
  }
}
/**
 *	Atualizacao/Edicao de Funcionario
 */
function edit() {
  if (isset($_GET['cod'])) {

    $cod = $_GET['cod'];

    if (isset($_POST['funcionario'])) {

      $funcionario = $_POST['funcionario'];

      update('funcionarios', $cod, $funcionario);
      header('location: index.php');
    } else {

      global $funcionario;
      $funcionario = find('funcionarios', $cod);
    } 
  } else {
    header('location: index.php');
  }
}

/**
 *  Visualização de um Funcionario
 */
function view($cod = null) {
  global $funcionario;
  $funcionario = find('funcionarios', $cod);
}

/**
 *  Exclusão de um Funcionario
 */
function delete($cod = null) {

  global $funcionario;
  $funcionario = remove('funcionarios', $cod);

  header('location: index.php');
}