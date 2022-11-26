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

            var URL_imagen;
            if (value.URL_imagen == '') {
                URL_imagen = 'public/img/logo.png';
            } else {
                URL_imagen = 'public/img/animales/' + value.URL_imagen;
            }
            if (value.estado == 'publicado') {
                $('#adopcion_apadrinamiento').append(
                        '<div class="profile-card-4 text-center col-lg-6 p-0">' +
                        ' <img src="' + URL_imagen + '" class="img img-responsive" style="height:280px; width:auto;">' +
                        '    <div class="profile-content bg-primary-plantilla">' +
                        '        <div class="profile-description text-black">' +
                        '            <h5>' + value.nombre + '</h5>' +
                        '        </div>' +
                        '        <div class="row">' +
                        '            <div class="col-xs-4">' +
                        '                <div class="profile-overview">' +
                        '                <button type="button" class="btn bg-secondary-plantilla text-white vermas" data-bs-toggle="modal" data-bs-target="#detalle_mascota" data-codigo="' + value.id + '" >Ver Más</button>' +
                        '                </div>' +
                        '            </div>' +
                        '        </div>' +
                        '    </div>' +
                        '</div>'
                    )
                    // $("#adopcion_apadrinamiento").append("<div class='card carta_fundaciones m-3 col-4' style='width: 18 rem; position: relative; left: 30 px;'><img src='"+value.URL_imagen+"' class='card-img-top' alt='...' style='border-radius: 100 % ; width:200 px; height:150 px; position:relative; left:35 px; top: 15 px;'><div class='card-body'><h5 class='card-title'>" + value.nombre + "</h5><button type='button' class='btn bg-secondary-plantilla vermas' data-bs-toggle='modal' data-bs-target='#detalle_mascota' data-codigo='"+value.id+"' >Ver Mas</button></div></div>")
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
                $("#contenido_modal").append("<p>Descripcion : " + mascota.descripcion + "</p><img src='" + mascota.url_imagen + "' alt=''><p>Raza: " + mascota.raza + "</p><p>Tipo Mascota: " + mascota.tipo + "</p><p>Edad: " + mascota.edad + "</p>");
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
                        $("#contenido_modal").append("<p>Fundacion de Albergue : " + fundacion.nombre + "</p>");
                    }
                });

                $(".modal-footer").append("<button type='button' class='btn btn-primary donar cafe_claro' data-bs-dismiss='modal'>Ir a donar</button><button type='button' data-codigo='" + mascota.codigo + "' class='btn btn-primary validar_adoptar cafe_claro'>Enviar a validacion para adoptar</button>");
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

    $(".adopcion").on("click", "button.donar", function(e) {
        e.preventDefault();
        var aID = 'src/vistas/donaciones.php';
        $.get(aID, function(data) {
            if (aID != "#") {
                $("#contenido").html(data);
                $(".irdonar").addClass("active");
                $(".iradopcion").removeClass("active");
            }
        });
    });



}