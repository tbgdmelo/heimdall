/**
 * Passa os dados do funcionario para o Modal, e atualiza o link para exclusão
 */
$('#delete-modal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var cod = button.data('funcionario');
  
  var modal = $(this);
  modal.find('.modal-title').text('Excluir Funcionario #' + cod);
  modal.find('#confirm').attr('href', 'delete.php?cod=' + cod);
})
