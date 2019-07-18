<?php 
	require_once('functions.php'); 
	view($_GET['cod']);
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

<h2>Funcionário <?php echo $funcionario['nome'] . " " . $funcionario['sobrenome']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>


<dl class="dl-horizontal">

	<dt>Cód.:</dt>
	<dd><?php echo $funcionario['cod']; ?></dd>

	<dt>Nome:</dt>
	<dd><?php echo $funcionario['nome']; ?></dd>

	<dt>Sobrenome:</dt>
	<dd><?php echo $funcionario['sobrenome']; ?></dd>

	<dt>Telefone:</dt>
	<dd><?php echo $funcionario['telefone']; ?></dd>
</dl>

<dl class="dl-horizontal">
	<dt>Empresa:</dt>
	<dd><?php echo $funcionario['empresa']; ?></dd>

	<dt>Setor:</dt>
	<dd><?php echo $funcionario['setor']; ?></dd>

	<dt>Função:</dt>
	<dd><?php echo $funcionario['funcao']; ?></dd>
</dl>
<p id="foto"><?php 
	$caminho = FUNC_FT.$funcionario['nome'] . '.png';
	echo "<img src='$caminho' width='250' height='250'>";?>		 
</p>

<style>
	#foto{
		float: right;
		position: relative;
		bottom: 180px;
		right: 300px;
	}
</style>

<div cod="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?cod=<?php echo $funcionario['cod']; ?>" class="btn btn-primary">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>


<?php include(FOOTER_TEMPLATE); ?>

