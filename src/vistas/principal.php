<style>
#contenido {
    max-width: fit-content;
    padding: 10px;
}

#contenido.active {
    max-width: fit-content;
}
</style>
<div class="p-3 ">
    <div class="row  m-0">
        <div class="col ">
            <div type="button" class="card card-light mt-2" data-toggle="modal" data-target="#modal_cliente"
                style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-dark">Clientes</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Agregar cliente</h6>
                    <div class="justify-content-center d-flex">
                        <img src="../public/img/team.png" alt="">
                    </div>

                </div>
            </div>
        </div>
        <?php  if (!isset($_SESSION)) {
    session_start();
} if( $_SESSION['Tipo_usuario']==1){ ?>
        <div class="col ">
            <div class="card card-light mt-2" data-toggle="modal" data-target="#modal_usuario" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-dark">Usuarios</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Agregar Usuario</h6>
                    <div class="justify-content-center d-flex">
                        <img src="../public/img/teamwork.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="col ">
            <li class="list-unstyled p-0 m-0">
                <a href="vistas/reportes/reporte_1.php" class="listar nav-link align-middle px-0 m-0">
                    <div class="card card-light" data-toggle="modal" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-dark">Reportes</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Ver Reportes</h6>
                            <div class="justify-content-center d-flex">
                                <img src="../public/img/increase.png" alt="">
                            </div>
                        </div>
                    </div>
                </a>
            </li>
        </div>

        <div class="col m-1">

            <div class="card card-light mt-2" data-toggle="modal" data-target="#modal_cliente_compra"
                style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-dark">Registrar Compra Cliente</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Agregar compra</h6>
                    <div class="justify-content-center d-flex">
                        <img src="../public/img/pago_efectivo.png" alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">

    </div>
</div>