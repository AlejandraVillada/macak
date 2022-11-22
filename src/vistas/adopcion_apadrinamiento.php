<style>
        .barra_navegacion {
            
            background-color: rgba(var(--bs-back-primary)) !important;
            position:absolute;
            width:20%;
            height: 448px;
        }

        .carta_fundaciones {
            background-color: rgba(var(--bs-back-primary)) !important;
        }
    </style>

    <!-- <section>
        <div class="barra_navegacion">

        </div>
    </section> -->

    <!-- Cartas de fundaciones -->
    <section class="adopcion">
        <div class="titulo text-center mt-5"><b>ADOPCION Y APADRINAMIENTO</b></div>
        <hr>
            <div id="adopcion_apadrinamiento" class="row">
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
                        <a href="src/vistas/donaciones.php" type="button" class="btn btn-primary">Ir a donar</a>
                    </div>
                    </div>
                </div>
            </div>       
        </div>
    </section>

    <script src="public/js/adopcion_apadrinamiento.js"></script>
    <script>
        $(document).ready(adopcion_apadrinamiento);
    </script>
