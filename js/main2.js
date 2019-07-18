/**
 * Passa os dados do equipamento para o Modal, e atualiza o link para exclusão
 */
$('#delete-modal-eqp').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data('equipamento');
  
  var modal = $(this);
  modal.find('.modal-title').text('Excluir Equipamento #' + id);
  modal.find('#confirm').attr('href', 'delete.php?id=' + id);
})