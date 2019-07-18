<?php
    require_once('functions.php');
    index();
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
<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Permissões Concedidas</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    </div>
	</div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php clear_messages(); ?>
<?php endif; ?>

<hr>

<table class="table table-hover">
<thead>
	<tr>
		<th>Funcionário</th>
		<th>Empresa</th>
		<th>Equipamento</th>
		<th>Serial</th>
		<th>Fabricante</th>
	</tr>
</thead>
<tbody>
<?php if ($relacoes) : ?>
<?php foreach ($relacoes as $relacao) : ?>
	<tr>
		<td><?php echo $relacao['func_nome']; ?> <?php echo $relacao['func_sobnm']; ?></td>
		<td><?php echo $relacao['func_emp']; ?></td>
		<td><?php echo $relacao['eqp_nome']; ?></td>
		<td><?php echo $relacao['eqp_serial']; ?></td>
		<td><?php echo $relacao['eqp_fab']; ?></td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>
<?php include(FOOTER_TEMPLATE); ?>