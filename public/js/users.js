function register() {

    $('.fundacion').fadeOut();

    $('#registrar_fundacion').on('click', function(e) {
        $('.fundacion').fadeIn();
        $('.lblinfo_fun').fadeIn();
        $('.fundacion').removeAttr('required');

        $('.fundacion').attr('required', 'true');

    })
    $('#registrar_cliente').on('click', function(e) {
        $('.fundacion').fadeOut();
        $('.lblinfo_fun').fadeOut();

        $('.fundacion').removeAttr('required');
        // $('.fundacion').attr('required', 'false');

    })

    $('#form_registrar').submit(function(e) {
        e.preventDefault();

        var data = new FormData(this);
        // console.log(data);
        $.ajax({
            type: "post",
            url: "src/controlador/controlador_register.php",
            data: data,
            contentType: false,
            processData: false,
            dataType: "json"
        }).done(function(resultado) {

            if (resultado.data == -1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'El usuario no fue creado correctamente',
                })
            } else if (resultado.data.error == 1) {

                Swal.fire(
                        'Usuario Existente',
                        'El nombre de usuario o email ya se encuentran en el sistema',
                        'question'
                    )
                    // alert('El nombre de usuario o email ya se encuentran en el sistema');
            } else {
                Swal.fire(
                        'Bienvenid@',
                        'El usuario fue creado correctamente',
                        'success'
                    )
                    // alert('');
            }
            // console.log(resultado);

        });

    })


}
$('#sesion_iniciada').on('click', function(e) {

    $('#sesion_iniciada').fadeOut();

    $('#sesion_iniciada').fadeIn();
})

function login() {

    $('#form_login').submit(function(e) {
        e.preventDefault();

        var data = $(this).serialize();
        // console.log(data);
        $.ajax({
            type: "post",
            url: "src/controlador/controlador_login.php",
            data: data,
            dataType: "json"
        }).done(function(resultado) {

            if (resultado.respuesta == 'existe') {
                Swal.fire(
                    'Bienvenid@',
                    '',
                    'success'
                )


                $.post('src/vistas/home.php', function(data) {
                    if ('src/vistas/home.php' != "#") {
                        $("#contenido").html(data);
                    }
                });

                $('#iniciar_sesion').fadeOut();
                $('#registrarse').fadeOut();
                $('#sesion_iniciada').fadeIn();
                $('#cerrar_sesion_btn').fadeIn();



                if (resultado.user_type == '3') {
                    // console.log(resultado)
                    $('#iniciar_administrador_fundaciones').fadeOut();

                    $('#iniciar_administrador_fundaciones').fadeIn();
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Datos erroneos...',
                    text: 'Verifique sus datos de acceso',
                })
            }
            // console.log(resultado);

        });

    })


}

function users() {
    $('#form_actualizar').submit(function(e) {
        e.preventDefault();

        var data = $(this).serialize();

        $.ajax({
            type: "post",
            url: "src/controlador/controlador_register.php",
            data: data,
            dataType: "json"
        }).done(function(resultado) {

            if (resultado.data == -1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'El usuario no fue actualizado correctamente',
                })
            } else {
                Swal.fire(
                        'Actualizado!',
                        'El usuario fue actualizado correctamente',
                        'success'
                    )
                    // alert('');
            }
            // console.log(resultado);

        });

    })


    $.ajax({
        type: "get",
        url: "src/controlador/controlador_adopcion_apadrinamiento.php",
        data: { accion: 'listar_solicitudes' },
        dataType: "json"
    }).done(function(fundacion) {
        console.log(fundacion);
        // $("#IdSede").append("<option value='" + value.IdSede + "'>" + value.NombreSede + "</option>");
        $.each(fundacion.data, function(index, value) {
            // console.log(fundacion)
            $("#solicitudes").append(
                '<div class="profile-card-4 text-center col-lg-6 p-0"><b>Nombre Mascota:</b> ' + value.nombre_mascota + '<b> Nombre Fundación </b>' + value.nombre_fundacion + '</div>'
            );
            // $("#fundacion").append("<div class='card carta_fundaciones m-3 col-4' style='width: 18 rem; position: relative; left: 30 px;'><img src='" + value.URL_imagen + "' class='card-img-top' alt='...' style='border-radius: 100 % ; width:200 px; height:150 px; position:relative; left:35 px; top: 15 px;'><div class='card-body'><h5 class='card-title'>" + value.nombre + "</h5><button type='button' class='btn bg-secondary-plantilla vermas' data-bs-toggle='modal' data-bs-target='#detalle_fundacion' data-codigo='" + value.id + "' >Ver Mas</button></div></div>")
        });

    });


}