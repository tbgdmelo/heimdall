<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>HEIMDALL</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap.min.css">
    <style>
        body {
            padding-top: 50px;
            padding-bottom: 20px;
        }
    </style>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="<?php echo BASEURL; ?>dashboard.php" class="navbar-brand"><img src="<?php echo BASEURL; ?>image/logo_tlc.png" alt="Logo Tellescom"/></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">          
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Funcionários <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo BASEURL; ?>funcionarios">Gerenciar Funcionários</a></li>
                    <li><a href="<?php echo BASEURL; ?>funcionarios/add.php">Novo Funcionário</a></li>
                </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav">          
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Equipamentos <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo BASEURL; ?>equipamentos">Gerenciar Equipamentos</a></li>
                    <li><a href="<?php echo BASEURL; ?>equipamentos/add.php">Novo Equipamento</a></li>
                </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav">          
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Permissões <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo BASEURL; ?>permissions">Gerenciar Permissões</a></li>
                </ul>
            </li>
          </ul>

            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Relatórios <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo BASEURL; ?>report/imprimir.php?periodo=diario">Gerar Relatório Diário</a></li>
                        <li><a href="<?php echo BASEURL; ?>report/imprimir.php?periodo=semanal">Gerar Relatório Semanal</a></li>
                        <li><a href="<?php echo BASEURL; ?>report/imprimir.php?periodo=mensal">Gerar Relatório Mensal</a></li>
                    </ul>
                </li>
            </ul>

        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <main class="container">