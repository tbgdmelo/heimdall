<?php
    require_once('functions.php');
    findLine($_GET['cod']);
    findLineF();
    registerExit($_GET['cod']);
    findFuncc($_GET['cod']);
?>
<?php include('../inc/headervalidator.php'); ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>HEIMDALL</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/find.css">
    <style>
        body{
            padding-top: 50px;
            padding-bottom: 20px;
            padding-left: 50px;
        }
    </style>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
</head>

<?php if (!empty($_SESSION['message'])) : ?>
    <div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<h2>Permissão</h2>
<hr>

<?php
require_once('../equipamentos/functions.php');
    view($_GET['cod']); //VIEW DO EQUIPAMENTO
?>

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

<div id="box-equipamento">
    <h2>Equipamento:</h2>
    <h3><?php echo $equipamento['nome_eqp']; ?></h3>

    <?php if (!empty($_SESSION['message'])) : ?>
        <div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
    <?php endif; ?>

    <dl class="dl-horizontal">

        <dt>ID:</dt>
        <dd><?php echo $equipamento['id']; ?></dd>

        <dt>Serial:</dt>
        <dd><?php echo $equipamento['serial_eqp']; ?></dd>

        <dt>Fabricante:</dt>
        <dd><?php echo $equipamento['fabricante']; ?></dd>

        <dt>Modelo:</dt>
        <dd><?php echo $equipamento['modelo']; ?></dd>

        <dt>Cor:</dt>
        <dd><?php echo $equipamento['cor']; ?></dd>
    </dl>
</div>

<p id="foto"><?php
    $caminho = EQP_FT.$equipamento['id'] . '.png';
    echo "<img src='$caminho' width='250' height='250'>";?>
</p>

<div id="actions" class="row">
    <div class="col-md-12">
        <a href="index.php" class="btn btn-default">Voltar</a>
    </div>
</div>

<div id="box-funcionario">
    <h2>Responsável:</h2>
    <h3><?php echo $responsavel['nome'] . " " . $responsavel['sobrenome']; ?></h3>

    <dl class="dl-horizontal">

        <dt>Cód.:</dt>
        <dd><?php echo $responsavel['cod']; ?></dd>

        <dt>Nome:</dt>
        <dd><?php echo $responsavel['nome']; ?></dd>

        <dt>Sobrenome:</dt>
        <dd><?php echo $responsavel['sobrenome']; ?></dd>

        <dt>Telefone:</dt>
        <dd><?php echo $responsavel['telefone']; ?></dd>

        <dt>Empresa:</dt>
        <dd><?php echo $responsavel['empresa']; ?></dd>

        <dt>Setor:</dt>
        <dd><?php echo $responsavel['setor']; ?></dd>

        <dt>Função:</dt>
        <dd><?php echo $responsavel['funcao']; ?></dd>
    </dl>
</div>

<p id="foto-fun"><?php
    $caminho = FUNC_FT.$responsavel['nome'] . '.png';
    echo "<img src='$caminho' width='250' height='250'>";?>
</p>

<?php include(FOOTER_TEMPLATE); ?>
