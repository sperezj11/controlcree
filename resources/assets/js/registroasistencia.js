$(document).ready(function() {
    $('#btn-consultar').on('submit', function (e) {
        e.preventDefault();
        var fechainicio = $('#title').val();
        var fechafin = $('#body').val();
        var host= window.location.hostname;
        
        $.ajax({
            type: "POST",
            url: host + '/mostraracordeon',
            data: {fechainicio: fechainicio, fechafin: fechafin},
            success: function( response ) {
                console.log(response);
            }
        });
    });

      $('#tabla').DataTable();
});