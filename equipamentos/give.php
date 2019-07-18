<?php 
	require_once('functions.php');
	view($_GET['id']);
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
<h2>Permissão de Saída</h2>

<form action="free.php" method="post">
	<hr />
	<div class="row">
		<div class="form-group col-md-3">
			<label for="name">ID do Equipamento:</label>
      		<input type="text" name="id_eqp" class="form-control" value="<?php echo $equipamento['id']; ?>">
			<label for="codigo">Código do Funcionário</label>
			<input type="text" class="form-control" name="id_func" autofocus="">
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