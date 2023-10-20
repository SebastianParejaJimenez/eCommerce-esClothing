$(document).ready(function() {
    // Create a DataTable object
    var dataTable = $('#listado').DataTable({
        // Set the language to Spanish
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando _START_ a _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 a 0 de 0 en total registros",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primera",
                "previous": "Anterior",
                "next": "Siguiente",
                "last": "Última"
            }
        },
        lengthMenu: [
            [6, 10, 15, -1],
            [6, 10, 15, "Mostrar todos"]
        ],
    });
});
