<style>
    .barra_navegacion {

        background-color: rgba(var(--bs-back-primary)) !important;
        position: absolute;
        width: 20%;
        height: 448px;
    }

    .carta_fundaciones {
        background-color: rgba(var(--bs-back-primary)) !important;
    }

    .profile-card-4 {
        max-width: 300px;
        background-color: #FFF;
        border-radius: 5px;
        box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        position: relative;
        margin: 10px auto;
        cursor: pointer;
    }

    .profile-card-4 img {
        transition: all 0.25s linear;
    }

    .profile-card-4 .profile-content {
        position: relative;
        padding: 15px;
        background-color: #FFF;
    }

    .profile-card-4 .profile-name {
        font-weight: bold;
        position: absolute;
        left: 0px;
        right: 0px;
        top: -70px;
        color: #FFF;
        font-size: 17px;
    }

    .profile-card-4 .profile-name p {
        font-weight: 600;
        font-size: 13px;
        letter-spacing: 1.5px;
    }

    .profile-card-4 .profile-description {
        color: #777;
        font-size: 12px;
        padding: 10px;
    }

    .profile-card-4 .profile-overview {
        padding: 15px 0px;
    }

    .profile-card-4 .profile-overview p {
        font-size: 10px;
        font-weight: 600;
        color: #777;
    }

    .profile-card-4 .profile-overview h4 {
        color: #273751;
        font-weight: bold;
    }

    .profile-card-4 .profile-content::before {
        content: "";
        position: absolute;
        height: 20px;
        top: -10px;
        left: 0px;
        right: 0px;
        background-color: #FFF;
        z-index: 0;
        transform: skewY(3deg);
    }

    .profile-card-4:hover img {
        transform: rotate(5deg) scale(1.1, 1.1);
        filter: brightness(110%);
    }
</style>

<!-- <section>
        <div class="barra_navegacion">

        </div>
    </section> -->

<!-- Cartas de fundaciones -->
<section class="adopcion">
    <div class=" row titulo text-center mt-5 d-flex justify-content-center">
        <div class=" bg-primary-plantilla " style="border-radius: 70px 10px; background-color:#273751 ;width: 500px; height:50px; text-align:center; vertical-align:middle;">
            <b>
                <h5 class="text-white mt-2">ADOPCION Y APADRINAMIENTO</h5>
            </b>
        </div>
    </div>

    <hr>
    <div class="container">
        <div id="adopcion_apadrinamiento" class="row  text-center">
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="detalle_mascota" tabindex="-1" aria-labelledby="detalle_mascota" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nombre_mascota"></h5>
                    <button type="button" class="btn-close cerrar_pet" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="contenido_modal">

                    </div>
                </div>
                <div class="modal-footer">


                </div>
                <div class="formulario_solicitudes">
                    <form id="datos">
                        <input type="hidden" name="id_user" id="id_user" value="1">
                        <input type="hidden" name="id_fundacion" id="id_fundacion">
                        <input type="hidden" name="id_mascota" id="id_mascota">
                        <input type="hidden" name="estado" id="estado" value="0">
                        <input type="hidden" name="accion" id="accion" value="guardar_solicitud">
                    </form>
                </div>
            </div>
        </div>
    </div>


</section>

<script src="public/js/adopcion_apadrinamiento.js"></script>
<script>
    $(document).ready(adopcion_apadrinamiento);
</script>