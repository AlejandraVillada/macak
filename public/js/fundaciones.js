function fundaciones() {

    $.ajax({
        type: "get",
        url: "src/controlador/controlador_fundaciones.php",
        data: { accion: 'listar' },
        dataType: "json"
    }).done(function(fundacion) {
        console.log(fundacion);
        // $("#IdSede").append("<option value='" + value.IdSede + "'>" + value.NombreSede + "</option>");
        $.each(fundacion.data, function(index, value) {
            $("#fundacion").append("<div class='card carta_fundaciones m-3 col-4' style='width: 18 rem; position: relative; left: 30 px;'><img src='"+value.URL_imagen+"' class='card-img-top' alt='...' style='border-radius: 100 % ; width:200 px; height:150 px; position:relative; left:35 px; top: 15 px;'><div class='card-body'><h5 class='card-title'>" + value.nombre + "</h5><button type='button' class='btn bg-secondary-plantilla vermas' data-bs-toggle='modal' data-bs-target='#detalle_fundacion' data-codigo='"+value.id+"' >Ver Mas</button></div></div>")
        });

    });

    $(".fundaciones").on("click", "button.vermas", function() {
        var codigo = $(this).data("codigo");
        $.ajax({
            type: "get",
            url: "src/controlador/controlador_fundaciones.php",
            // url: "../../../Controlador/controlador_empleados.php",
            data: { codigo: codigo, accion: 'consultar' },
            dataType: "json"
        }).done(function(fundacion) {
            if (fundacion.respuesta === "no existe") {
                swal({
                    type: 'error',
                    title: '¡Error!',
                    text: '¡La Fundacion No Existe!'
                })
            } else {
                $("#nombre_fundacion").text(fundacion.nombre);
                $("#contenido_modal").append("<p>Descripcion : "+fundacion.descripcion+"</p><img src='"+fundacion.url_imagen+"' alt=''><p>Direccion: "+fundacion.direccion+"</p><p>Telefono : "+fundacion.telefono+"</p><p>Numero de cuenta: "+fundacion.numero_cuenta+"</p><p>Tipo de cuenta: "+fundacion.tipo_cuenta+"</p>");
            }
        });

        $(".fundaciones").on("click", "button.cerrar_fundacion", function() {
            $("#nombre_fundacion").empty();
            $("#contenido_modal").empty();
        });

        $(".fundaciones").on("click", "button.donar", function(e) {
            e.preventDefault();
            var aID = 'src/vistas/donaciones.php';
            $.get(aID, function(data) {
                if (aID != "#") {
                    $("#contenido").html(data);
                    $(".irdonar").addClass("active");
                    $(".irfundaciones").removeClass("active");
                }
            });
        });
        $(".fundaciones").on("click", "button.adoptar", function(e) {
            e.preventDefault();
            var aID = 'src/vistas/adopcion_apadrinamiento.php';
            $.get(aID, function(data) {
                if (aID != "#") {
                    $("#contenido").html(data);
                    $(".iradopcion").addClass("active");
                    $(".irfundaciones").removeClass("active");
                }
            });
        });
    
        
    });


}