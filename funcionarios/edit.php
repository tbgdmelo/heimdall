<?php 
  require_once('functions.php'); 
  edit();
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

<h2>Atualizar Dados do Funcionário</h2>

<form action="edit.php?cod=<?php echo $funcionario['cod']; ?>" method="post">
  <hr />
  <div class="row">
    <div class="form-group col-md-3">
      <label for="name">Nome:</label>
      <input type="text" class="form-control" name="funcionario['nome']" value="<?php echo $funcionario['nome']; ?>">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Sobrenome:</label>
      <input type="text" class="form-control" name="funcionario['sobrenome']" value="<?php echo $funcionario['sobrenome']; ?>">
    </div>

    <div class="form-group col-md-3">
      <label for="campo3">Telefone:</label>
      <input type="text" class="form-control" name="funcionario['telefone']" value="<?php echo $funcionario['telefone']; ?>">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">Empresa:</label>
      <input type="text" class="form-control" name="funcionario['empresa']" value="<?php echo $funcionario['empresa']; ?>">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Setor:</label>
      <input type="text" class="form-control" name="funcionario['setor']" value="<?php echo $funcionario['setor']; ?>">
    </div>

    <div class="form-group col-md-3">
      <label for="campo3">Função:</label>
      <input type="text" class="form-control" name="funcionario['funcao']" value="<?php echo $funcionario['funcao']; ?>">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-4">
      <label for="conteudo">Enviar imagem:</label>
      <input id="fileupload" type="file" name="pic" accept="image/*" class="form-control">
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