<style>
    .carta_general {

        background-color: rgb(255, 255, 255, 0.6);
        padding: 10px;
        height: 500px;
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
            <form id="form_login" method="post">
                <div class="row text-center">
                    <h2>MACAK</h2>
                    <br>
                    <h6>Construyendo Familias</h6>
                </div>
                <div class="row">
                    <label for="">Usuario</label>
                    <input class="form-control m-2" type="text" name="user" id="user" placeholder="user" required>
                </div>
                <div class="row">
                    <label for="">Contraseña</label>

                    <input class="form-control m-2" type="password" name="password" id="password" placeholder="Contraseña" required>
                </div>
                <div class="row justify-content-center mt-3">
                    <input type="hidden" name="action" value="login">
                    <button type="submit" class="btn  bg-secondary-plantilla" style="color: white !important;">Ingresar</button>
                </div>
                <div class="d-flex justify-content-center  text-center   ">
                    <div class="row ">
                        <nav class="nav">
                            <ul class="navbar-nav ">
                                <li class="nav-item ">
                                    <a class="item nav-link listar " id="registro_a" href="src/vistas/register.php">Olvidaste tu contraseña?</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="item nav-link listar " id="registro" href="src/vistas/register.php">Registrate Aquí</a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="public/js/users.js"></script>

<script>
    $(document).ready(login);
    $('#registro').on('click', function(e) {
        e.preventDefault();
        var aID = 'src/vistas/register.php';
        $.post(aID, function(data) {
            if (aID != "#") {
                $("#contenido").html(data);
            }
        });
    })
    $('#olvido_contraseña').on('click', function(e) {
        e.preventDefault();
        var aID = 'src/vistas/register.php';
        $.post(aID, function(data) {
            if (aID != "#") {
                $("#contenido").html(data);
            }
        });
    })
</script>