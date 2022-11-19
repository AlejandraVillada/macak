function adopcion_apadrinamiento() {

    $.ajax({
        type: "get",
        url: "src/controlador/controlador_adopcion_apadrinamiento.php",
        data: { accion: 'listar' },
        dataType: "json"
    }).done(function(aa) {
        console.log(aa);
        // $("#IdSede").append("<option value='" + value.IdSede + "'>" + value.NombreSede + "</option>");
        $.each(aa.data, function(index, value) {
            $("#adopcion_apadrinamiento").append("<div class='card carta_fundaciones' style='width: 18 rem; position: relative; left: 30 px;>'<img src='public/img/perritos1.jpg' class='card-img-top' alt='...' style='border-radius: 100 % ; width:200 px; height:150 px; position:relative; left:35 px; top: 15 px;'><div class='card-body'><h5 class='card-title'>" + value.nombre + "</h5><p class='card-text'>" + value.descripcion + "</p><a href='#' class ='btn bg-secondary-plantilla '>Ver mas</a></div></div>")
        });

    });


}