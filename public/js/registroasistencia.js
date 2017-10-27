$(document).ready(function() {
    $('#btn-consultar').on('submit', function (e) {
        e.preventDefault();
        var fechainicio = $('#fechainicio').val();
        var fechafin = $('#fechafin').val();
        var host= window.location.hostname;
        
        $.ajax({
            type: "GET",
            url: host + '/mostraracordeon',
            data: {fechainicio: fechainicio, fechafin: fechafin},
            success: function( response ) {
                console.log(response);
            },
            error: function(response){
                console.log(response);
            }
        });
    });
});