<?php 
  require_once('functions.php'); 
  add();
  addImg(FUNC_FT);
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

<h2>Novo Funcionário</h2>

<form action="add.php" method="post" enctype="multipart/form-data">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-3">
      <label for="name">Nome:</label>
      <input type="text" class="form-control" name="funcionario['nome']" autofocus="" placeholder="Primeiro Nome">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Sobrenome:</label>
      <input type="text" class="form-control" name="funcionario['sobrenome']" placeholder="Sobrenome">
    </div>

    <div class="form-group col-md-3">
      <label for="campo3">Telefone:</label>
      <input type="text" class="form-control phone-mask" placeholder="Ex.:(00) 00000-0000" name="funcionario['telefone']">
    </div>
  </div>
  
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">Empresa:</label>
      <input type="text" class="form-control" name="funcionario['empresa']" placeholder="Nome da Empresa do Funcionário">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Setor:</label>
      <input type="text" class="form-control" name="funcionario['setor']" placeholder="Setor do Funcionário">
    </div>
    
    <div class="form-group col-md-3">
      <label for="campo3">Função:</label>
      <input type="text" class="form-control" name="funcionario['funcao']" placeholder="Função do Funcionário">
    </div>
  </div>
  
  <div class="row">
    <div class="form-group col-md-4">
      <label for="conteudo">Enviar imagem:</label>
      <input id="fileupload" type="file" name="pic" accept="image/png" class="form-control">
      <small>Envie a imagem com o nome do funcionário com todas as letras minúsculas!</small>
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