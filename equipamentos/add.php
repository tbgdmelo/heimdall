<?php 
  require_once('functions.php'); 
  add();
  addImg(EQP_FT);
?>

<?php include(HEADER_TEMPLATE); ?>
    <head>
        <?php
        session_start();
        if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
        {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('location:index.php');
        }

        $logado = $_SESSION['login'];
        ?>
    </head>
<h2>Novo Equipamento</h2>

<form action="add.php" method="post" enctype="multipart/form-data">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-3">
      <label for="name">Nome:</label>
      <input type="text" class="form-control" name="equipamento['nome_eqp']" autofocus="" placeholder="Nome do Equipamento">
    </div>

    <div class="form-group col-md-3">
      <label for="name">Serial:</label>
      <input type="text" class="form-control" name="equipamento['serial_eqp']" placeholder="Nº Serial">
    </div>

      <div class="form-group col-md-3">
          <label for="name">Nº Etiqueta:</label>
          <input type="text" class="form-control" name="equipamento['serial_eqp']" placeholder="Nº Etiqueta">
      </div>
  </div>
  
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo2">Fabricante:</label>
      <input type="text" class="form-control" name="equipamento['fabricante']" placeholder="Nome do Fabricante">
    </div>

    <div class="form-group col-md-3">
      <label for="campo3">Modelo:</label>
      <input type="text" class="form-control" name="equipamento['modelo']" placeholder="Modelo do Equipamento">
    </div>

    <div class="form-group col-md-3">
      <label for="campo1">Cor:</label>
      <input type="text" class="form-control" name="equipamento['cor']" placeholder="Cor Predominante">
    </div>
  </div>
  
  <div class="row">
    <div class="form-group col-md-4">
      <label for="conteudo">Enviar imagem:</label>
      <input id="fileupload" type="file" name="pic" accept="image/png" class="form-control">
      <small>Envie a imagem renomeado com o serial do equipamento, com todas as letras minúsculas!</small>
    </div>
  </div>

  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>