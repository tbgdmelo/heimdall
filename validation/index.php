<?php require_once '../config.php'; ?>
<?php require_once DBAPI; ?>

<?php require_once ('functions.php');
    findLineF();
?>
<?php include('../inc/headervalidator.php'); ?>
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
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>HEIMDALL</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap.min.css">
    <style>
     label {
         padding-top: 50px;
         padding-bottom: 20px;
         padding-left: 50px;
         font-size: 25px;
    }
    input{
        font-size: 25px;
    }
    </style>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
</head>
<?php $db = open_database(); ?>

<h1>Controle de Saída de Equipamentos</h1>
<hr />

<?php if ($db) : ?>

<div class="row">
	<form class="form-group" action="find.php">
		<label>Código do Equipamento:</label>
		<input type="text" name="cod" autofocus="">
	</form>
</div>

<?php else : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>
<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>