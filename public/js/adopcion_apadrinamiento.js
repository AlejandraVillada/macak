function adopcion_apadrinamiento() {
    

    $.ajax({
        type: "get",
        url: "src/controlador/controlador_adopcion_apadrinamiento.php",
        data: { accion: 'listar' },
        dataType: "json"
    }).done(function(aa) {
        // console.log(aa);
        // $("#IdSede").append("<option value='" + value.IdSede + "'>" + value.NombreSede + "</option>");
        $.each(aa.data, function(index, value) {
            $("#adopcion_apadrinamiento").append("<div class='card carta_fundaciones m-3 col-4' style='width: 18 rem; position: relative; left: 30 px;'><img src='"+value.URL_imagen+"' class='card-img-top' alt='...' style='border-radius: 100 % ; width:200 px; height:150 px; position:relative; left:35 px; top: 15 px;'><div class='card-body'><h5 class='card-title'>" + value.nombre + "</h5><button type='button' class='btn bg-secondary-plantilla vermas' data-bs-toggle='modal' data-bs-target='#detalle_mascota' data-codigo='"+value.id+"' >Ver Mas</button></div></div>")
        });

    });

    $(".adopcion").on("click", "button.vermas", function() {
        var codigo = $(this).data("codigo");
        $.ajax({
            type: "get",
            url: "src/controlador/controlador_adopcion_apadrinamiento.php",
            // url: "../../../Controlador/controlador_empleados.php",
            data: { codigo: codigo, accion: 'consultar' },
            dataType: "json"
        }).done(function(mascota) {
            if (mascota.respuesta === "no existe") {
                swal({
                    type: 'error',
                    title: '¡Error!',
                    text: '¡La Mascota No Existe!'
                })
            } else {
                console.log(mascota);
                $("#nombre_mascota").text(mascota.nombre);
                $("#contenido_modal").append("<p>Descripcion : "+mascota.descripcion+"</p><img src='"+mascota.url_imagen+"' alt=''><p>Raza: "+mascota.raza+"</p><p>Tipo Mascota: "+mascota.tipo+"</p><p>Edad: "+mascota.edad+"</p>");
                $.ajax({
                    type: "get",
                    url: "src/controlador/controlador_fundaciones.php",
                    data: { codigo: mascota.id_fundacion, accion: 'consultar' },
                    dataType: "json"
                }).done(function(fundacion) {
                    if (fundacion.respuesta === "no existe") {
                        swal({
                            type: 'error',
                            title: '¡Error!',
                            text: '¡La fundacion No Existe!'
                        })
                    } else {
                       $("#contenido_modal").append("<p>Fundacion de Albergue : "+fundacion.nombre+"</p>");
                    }
                });
            }
           
        });

        $(".adopcion").on("click", "button.cerrar_pet", function() {
            $("#nombre_mascota").empty();
            $("#contenido_modal").empty();
        });
        
    });

   
}