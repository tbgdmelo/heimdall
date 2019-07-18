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
			<h2>Equipamentos</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Novo Equipamento</a>
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
		<th>ID</th>
		<th>Nome</th>
		<th>Serial</th>
		<th>Fabricante</th>
		<th>Modelo</th>
		<th>Cor</th>
	</tr>
</thead>
<tbody>
<?php if ($equipamentos) : ?>
<?php foreach ($equipamentos as $equipamento) : ?>
	<tr>
		<td><?php echo $equipamento['id']; ?></td>
		<td><?php echo $equipamento['nome_eqp']; ?></td>
		<td><?php echo $equipamento['serial_eqp']; ?></td>
		<td><?php echo $equipamento['fabricante']; ?></td>
		<td><?php echo $equipamento['modelo']; ?></td>
		<td><?php echo $equipamento['cor']; ?></td>
		<td class="actions text-right">
			<a href="give.php?id=<?php echo $equipamento['id']; ?>" class="btn btn-sm btn-info"><i class="fa fa-link"></i> Delegar</a>
			<a href="view.php?id=<?php echo $equipamento['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?id=<?php echo $equipamento['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal-eqp" data-equipamento="<?php echo $equipamento['id']; ?>">
				<i class="fa fa-trash"></i> Excluir
			</a>
		</td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>

<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>