function register() {

    $('#form_registrar').submit(function(e) {
        e.preventDefault();

        var data = $(this).serialize();
        // console.log(data);
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
                    console.log(resultado)
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