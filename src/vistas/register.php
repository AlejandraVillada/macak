<style>
.carta_general {
    background-repeat: no-repeat;
    background-color: rgb(255, 255, 255, 0.6);
    padding: 10px;
    height: 600px;
    color: white;
    border-radius: 15px;
    padding: 80px;
    display: flex;
    justify-content: center;

}

input {
    box-shadow: 6px 6px 30px #735041;
    /* background-color: ; */
}
</style>
<div class="container-fluid  justify-content-center d-flex mt-5">
    <div class="card carta_general  bg-primary-plantilla">
        <div class=" justify-content-center d-flex">

            <!-- <img class="mt-5" src="public/img/logo.png" alt="" width="400"> -->
        </div>
        <div class="row m-1 justify-content-center d-flex" style="color: black !important;">
            <form id="form_login" method="post">
                <div class="row text-center">
                    <h2>MACAK</h2>
                    <br>
                    <h6>Registro de Usuarios </h6>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <input type="radio" name="usertype" id="" value="">
                        <label for="">Fundaciones </label>
                    </div>
                    <div class="col">
                        <input type="radio" name="usertype" id="">
                        <label for="">Invitados </label>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <label for="">Nombre Completo</label>
                    <input type="text" class="form-control m-2" name="nombre_completo">
                </div>
                <div class="row">
                    <label for="">Dirección</label>
                    <input type="text" class="form-control m-2" name="direccion">
                </div>
                <div class="row">
                    <label for="">Usuario</label>
                    <input type="text" class="form-control m-2" name="usuario">
                </div>
                <div class="row">
                    <label for="">Contraseña</label>
                    <input type="text" class="form-control m-2" name="password">
                </div>

                <div class="row justify-content-center mt-3">
                    <input type="hidden" name="action" value="login">
                    <button type="submit" id="registro" class="btn  bg-secondary-plantilla"
                        style="color: white !important;">Ingresar</button>
                </div>
                <div class="d-flex justify-content-center row text-center   ">
                    <div class="row">
                        <span>
                            <a href="" style="color: white !important;">Iniciar Sesión</a>
                        </span>
                    </div>
                    <br>

                </div>
            </form>
        </div>
    </div>
</div>

<script src="">
$('form_login').submit(function(e) {
    e.preventDefault();

    var data = $(this).serialize();
    $.ajax({
        type: "get",
        url: "controlador/controlador_register.php",
        data: data,
        dataType: "json"
    }).done(function(resultado) {

       console.log(resultado);

    });

})
</script>