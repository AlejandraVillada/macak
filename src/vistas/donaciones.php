










































<style>
    .carta_general {

        background-color: rgb(255, 255, 255, 0.6);
        padding: 10px;
        height: 700px;
        color: white;
        border-radius: 15px;
        padding: 80px;

    }
</style>

<div class="container-fluid  justify-content-center d-flex mt-5">
    <div class="card carta_general  " style="background-color: rgba(205, 168, 134,0.8)">
        <div class=" justify-content-center d-flex">

            <!-- <img class="mt-5" src="public/img/logo.png" alt="" width="400"> -->
        </div>
        <div class="row m-1 justify-content-center d-flex" style="color: black !important;">
            <form id="datos" method="get">
                <div class="row text-center">
                    <h2>MACAK DONACIONES</h2>
                    <br>
                    <h6>Construyendo Familias</h6>
                </div>
                <div class="row">
                    <label for="">Numero de cedula</label>
                    <input class="form-control m-2" type="text" name="cedula" id="cedula" placeholder="Ingrese el numero su cedula de cuidadania" required>
                </div>
                <div class="row">
                    <label for="">Correo electronico</label>
                    <input class="form-control m-2" type="correo" name="correo" id="correo" placeholder="Ingrese su correo electronico" required>
                </div>
                <div class="row">
                    <label for="">Numero de cuenta</label>
                    <input class="form-control m-2" type="text" name="cuenta_origen" id="cuenta_origen" placeholder="Ingrese el numero de cuenta origen" required>
                </div>
                <div class="row">
                    <label for="">Fundacion</label>
                    <select name="id_fundacion" id="id_fundacion" class="form-control m-2">
                        <option value="default">Seleccione una fundacion</option>
                    </select>
                </div>
                <div class="row">
                    <label for="">Valor a donar</label>
                    <input class="form-control m-2" type="number" name="monto" id="monto" placeholder="Valor a donar" required>
                </div>
                <input type="hidden" name="accion" value="donar">
                <input type="hidden" name="id_usuario" value="1">
                <input type="hidden" name="estado_transaccion" value="1">
                <div class="row justify-content-center mt-3">
                    <button type="button" class="btn bg-secondary-plantilla donar" style="color: white !important;">Enviar Donacion</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $.ajax({
        type: "get",
        url: "src/controlador/controlador_fundaciones.php",
        data: { accion: 'listar' },
        dataType: "json"
    }).done(function(fundacion) {
        $.each(fundacion.data, function(index, value) {
            $("#id_fundacion").append("<option value='"+value.id+"'>"+value.nombre+"</option>")
        });

    });

    $(".donar").on("click", function() {
        var datos = $("#datos").serialize();
        console.log(datos);
        $.ajax({
            type: "get",
            url: "src/controlador/controlador_donaciones.php",
            data: datos,
            dataType: "json"
        }).done(function(donacion) {
            if (donacion.respuesta === "error") {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Transaccion erronea, por favor revise bien los datos diligenciados',
                })
            } else {
                Swal.fire(
                    'La donacion fue enviada',
                    'Muchas gracias por ayudarnos a seguir creciendo',
                    'success'
                )
                $("#cedula").val('');
                $("#correo").val('');
                $("#cuenta_origen").val('');
                $("#id_fundacion").val('default');
                $("#monto").val('');
            }
           
        });
    });
</script>



