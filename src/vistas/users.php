<?php session_start();?>
<style>
    .carta_general {
        background-repeat: no-repeat;
        background-color: rgb(255, 255, 255, 0.2);
        /* margin: 20px; */
        color: white;
        padding-left: 80px;
        padding-right: 80px;
        border-radius: 15px;
        padding-top: 15px;
        padding-bottom: 15px;
        display: flex;
        justify-content: center;

    }

    input {
        box-shadow: 6px 6px 30px #735041;
        /* background-color: ; */
    }
</style>
<div class="container-fluid  justify-content-center d-flex mt-5">
    <div class="card carta_general  " style="background-color: rgba(205, 168, 134,0.8)">
        <div class=" justify-content-center d-flex">

            <!-- <img class="mt-5" src="public/img/logo.png" alt="" width="400"> -->
        </div>
        <div class="row m-1 justify-content-center d-flex" style="color: black !important;">
            <form id="form_actualizar" method="POST">
                <div class="row text-center">
                    <h2>MACAK</h2>
                    <br>
                    <h6>Perfil de Usuario </h6>
                </div>
                <hr>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="">Nombre Completo</label>
                        <input type="text" required class="form-control m-2" name="name" readonly value="<?= $_SESSION['name']?>">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="">Dirección</label>
                        <input type="text" required class="form-control m-2" name="direccion" value="<?=$_SESSION['direccion'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="">Usuario</label>
                        <input type="text" required class="form-control m-2" name="username" readonly value="<?=$_SESSION['username'] ?>">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="">Contraseña</label>
                        <input type="password" required class="form-control m-2" name="password" value="<?=$_SESSION['pass'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="">email</label>
                        <input type="text" required class="form-control m-2" name="email" readonly value="<?=$_SESSION['email'] ?>">
                        <input type="hidden" required class="form-control m-2" name="id_usuario" readonly value="<?=$_SESSION['id_usuario'] ?>">
                    </div>
                   
                </div>
                <div class="row justify-content-center mt-3">
                    <input type="hidden" name="action" value="act_user">
                    <input type="submit" value="Actualizar Datos" class="btn  bg-secondary-plantilla text-white text-bold">

                </div>
                
            </form>
        </div>
    </div>
</div>

<script src="public/js/users.js"></script>
<script>
    $(document).ready(users);
</script>