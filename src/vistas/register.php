<style>
.carta {
    background-repeat: no-repeat;
    background-color: rgb(255, 255, 255, 0.6);
    padding: 10px;
    height: 500px;
    color: white;
    border-radius: 15px;
    padding: 80px;
    display: flex;
    justify-content: center;

}
</style>
<div class="container-fluid  justify-content-center d-flex mt-5">
    <div class="card carta  bg-primary-plantilla">
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
                <div class="row">
                    <label for="">Usuario</label>
                    <input class="form-control m-2" type="text" name="usuario" id="usuario" placeholder="Usuario"
                        required>
                </div>
                <div class="row">
                    <label for="">Contraseña</label>

                    <input class="form-control m-2" type="password" name="password" id="password"
                        placeholder="Contraseña" required>
                </div>
                <div class="row justify-content-center mt-3">
                    <input type="hidden" name="action" value="login">
                    <button type="submit" class="btn  bg-secondary-plantilla"
                        style="color: white !important;">Ingresar</button>
                </div>
                <div class="d-flex justify-content-center row text-center   ">
                    <div class="row">
                        <span>
                            <a href="" style="color: white !important;">Olvidaste tu contraseña?</a>
                        </span>
                    </div>
                    <br>
                    <div class="row">
                        <span>
                            <a href="" style="color: white !important;">Registrate Aquí</a>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>