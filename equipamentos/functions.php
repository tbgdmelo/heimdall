<?php

require_once('../config.php');
require_once(DBAPI);

$equipamentos = null;
$equipamento = null;

/**
 *  Listagem de Equipamento
 */
function index() {
	global $equipamentos;
	$equipamentos = find_all('equipamentos');
}

/**
 *  Cadastro de Equipamento
 */
function add() {
  
  if (!empty($_POST['equipamento'])) {
    
    $equipamento = $_POST['equipamento'];
    save('equipamentos', $equipamento);
    header('location: index.php');
  }
}

//Enviando a imagem
//Sempre adicionar a foto já com o serial do equipamento
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
 *	Atualizacao/Edicao de Equipamento
 */
function edit() {
  if (isset($_GET['id'])) {

    $id = $_GET['id'];

    if (isset($_POST['equipamento'])) {

      $equipamento = $_POST['equipamento'];

      update_eqp('equipamentos', $id, $equipamento);
      header('location: index.php');
    } else {

      global $equipamento;
      $equipamento = find_eqp('equipamentos', $id);
    } 
  } else {
    header('location: index.php');
  }
}

/**
 *  Visualização de um Equipamento
 */
function view($id = null) {
  global $equipamento;
  $equipamento = find_eqp('equipamentos', $id);
}

/**
 *  Exclusão de um Equipamento
 */
function delete($id = null) {

  global $equipamento;
  $equipamento = remove_eqp('equipamentos', $id);

  header('location: index.php');
}

//Recebe o codigo do funcionário e delegar permissão para ele sair com o equipamento
function givePermission($id = null, $cod = null){
  $id_eqp = $id;
  $cod_funcionario = $cod; 
  addPermission($id_eqp,$cod_funcionario);
}