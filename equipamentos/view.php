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
<h2>Equipamento <?php echo $equipamento['id']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">

	<dt>ID:</dt>
	<dd><?php echo $equipamento['id']; ?></dd>

</dl>

<dl class="dl-horizontal">
	<dt>Nome:</dt>
	<dd><?php echo $equipamento['nome_eqp']; ?></dd>

	<dt>Serial:</dt>
	<dd><?php echo $equipamento['serial_eqp']; ?></dd>

	<dt>Fabricante:</dt>
	<dd><?php echo $equipamento['fabricante']; ?></dd>

	<dt>Modelo:</dt>
	<dd><?php echo $equipamento['modelo']; ?></dd>

	<dt>Cor:</dt>
	<dd><?php echo $equipamento['cor']; ?></dd>
</dl>

<p id="foto"><?php 
	$caminho = EQP_FT.$equipamento['id'] . '.png';
	echo "<img src='$caminho' width='250' height='250'>";?>		 
</p>

<style>
	#foto{
		float: right;
		position: relative;
		bottom: 150px;
		right: 300px;
	}
</style>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $equipamento['id']; ?>" class="btn btn-primary">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>

