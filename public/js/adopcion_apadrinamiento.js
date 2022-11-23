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
                if(value.estado == 'publicado'){
                    $("#adopcion_apadrinamiento").append("<div class='card carta_fundaciones m-3 col-4' style='width: 18 rem; position: relative; left: 30 px;'><img src='"+value.URL_imagen+"' class='card-img-top' alt='...' style='border-radius: 100 % ; width:200 px; height:150 px; position:relative; left:35 px; top: 15 px;'><div class='card-body'><h5 class='card-title'>" + value.nombre + "</h5><button type='button' class='btn bg-secondary-plantilla vermas' data-bs-toggle='modal' data-bs-target='#detalle_mascota' data-codigo='"+value.id+"' >Ver Mas</button></div></div>")
                }
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

                $(".modal-footer").append("<a href='index.php' type='button' class='btn btn-primary'>Ir a donar</a><button type='button' data-codigo='"+mascota.codigo+"' class='btn btn-primary validar_adoptar'>Enviar a validacion para adoptar</button>");
                $("#id_fundacion").val(mascota.id_fundacion);
                $("#id_mascota").val(mascota.codigo);
            }
           
        });

        $(".adopcion").on("click", "button.cerrar_pet", function() {
            $("#nombre_mascota").empty();
            $("#contenido_modal").empty();
            $(".modal-footer").empty();
        });
        
    });

    $(".adopcion").on("click", "button.validar_adoptar", function() {
        var datos = $("#datos").serialize();
        var codigo = $(this).data("codigo");
        console.log(datos);
        $.ajax({
            type: "get",
            url: "src/controlador/controlador_solicitud.php",
            data: datos,
            dataType: "json"
        }).done(function(solicitud) {
            if (solicitud.respuesta === "correcto") {
                $.ajax({
                    type: "get",
                    url: "src/controlador/controlador_adopcion_apadrinamiento.php",
                    data: { codigo: codigo, accion: 'cambiar_estado' },
                    dataType: "json"
                }).done(function(aa) {
                    console.log(aa.respuesta);
            
                    if (aa.respuesta == 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'El mascota enviada a validar correctamente',
                        })
                    } else if (aa.respuesta == 1) {
                        Swal.fire(
                            'La solicitud fue enviada',
                            'Espere a la aprobacion segun los protocolos de la fundacion de albergue',
                            'success'
                        )
                    }
            
                });
            }
           
        });


    });

   

    
   
}