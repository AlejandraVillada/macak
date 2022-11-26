<?php include_once __DIR__ . '/../templates/header.php' ?>
<?php include_once __DIR__ . '/utils/sessiones.php';
if (!isset($_SESSION)) {
    session_start();
}

?>
<div class="principal" style="position: relative;">

    <!-- Sidebar -->
    <nav id="barra_lateral" class="fixed-top" style=" z-index: index 1;">
        <div class="barra_lateral-header " style="height:80px;">
            <h3>Menú Principal</h3>
            <strong>
                Menú
            </strong>
        </div>
        <ul class="list-unstyled components ml-2">
            <li><a href="vistas/principal.php" class="listar"> <span><i class="fas fa-home"></i></span> Inicio</a></li>
            <li><a href="vistas/animales/consultar.php" class="listar"> <span><i class="fas fa-paw"></i></span>
                    Animales</a></li>
            <!-- <li><a href="vistas/donaciones/reporte_1.php" class="listar"> <span><i class="fas fa-hand-holding-usd"></i></span>
                    Donaciones</a></li> -->

            <hr style="background-color: #FBB204;">
            <li><a href="../../index.php"> <span><i class="fas fa-sign-out-alt"></i></span> Volver al Home</a></li>
            <li><a href="../../index.php?cerrar_sesion=true"> <span><i class="fas fa-sign-out-alt"></i></span> Cerrar
                    Sesión</a></li>
        </ul>


    </nav>

    <!-- Page Content -->
    <div id="contenido_pagina" style="position: relative; margin-top:80px">
        <nav class="navbar navbar-expand-lg  fixed-top " id="barra_superior" style="height: 80px;">
            <div class="row justify-content-center d-flex" style="min-width: 80%;">
                <div class="col-2">

                    <button type="button" id="barra_collapse" class="btn btn-secondary">

                        <span><i class="fas fa-bars"></i></span>
                    </button>

                </div>
                <div class="col-8"> <span>
                        <!-- <img src="../public/img/<?= $_SESSION['URL_imagen'] ?>" class="d-inline-block align-top ml-5" width="200"> -->
<h3>MACAK | Admin Fundación <?= $_SESSION['name'] ?></h3>
                    </span>
                </div>
                <div class="col-1 " id="us_contenido">
                    <!-- <ul class="list-unstyled components ml-2"> -->
                    <div class="dropdown">

                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                            <img src="../public/img/profile.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <div class="m-3">
                                <span class="d-none d-sm-inline mx-1 "><strong>Usuario : </strong></span>
                                <span class="d-none d-sm-inline mx-1 "><?= $_SESSION['username']; ?> </span>
                                <hr>
                                <span class="d-none d-sm-inline mx-1 "><strong>Nombre <br> </strong></span>
                                <span class="d-none d-sm-inline mx-1 "><?= $_SESSION['name']; ?> </span>

                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-1"> <button type="button" id="barra_collapse" class="btn btn-secondary " style="float: inline-end !important;">
                        <a href="../../index.php?cerrar_sesion=true"><span><i class="fas fa-sign-out-alt"></i></span></a>
                    </button>
                </div>
            </div>

        </nav>
        <div class="container" id="contenido">
            <?php include_once __DIR__ . '/vistas/principal.php'; ?>

        </div>
    </div>


</div>
<?php include_once __DIR__ . '/../templates/footer.php' ?>


<div class="container">
    <!-- Modal -->
    <div class="modal fade " id="modal_animales" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modal_animalesLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-scrollable">
            <div class="modal-content bg-light text-dark ">
                <div class="modal-header  cafe_claro ">
                    <h5 class="modal-title" id="modal_animalesLabel">Crear animales</h5>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
                <div class="modal-body" id="editado">
                    <?php include_once __DIR__ . '/vistas/animales/crear.php'; ?>
                </div>
                <!-- <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Guardar animales</button>
                </div> -->
            </div>
        </div>
    </div>
</div>


<script src="../public/js/main.js"></script>


<script>
    $(document).ready(main);
</script>