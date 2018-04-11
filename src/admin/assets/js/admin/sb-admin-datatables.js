// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    "language": {
      "search": "Buscar:",
      "lengthMenu": "Exibir _MENU_ registros por página",
      "info": "Mostrando página _PAGE_ de _PAGES_",
      "paginate": {
        "previous": "Anterior",
        "next": "Próximo"
      }
    }
  });
});