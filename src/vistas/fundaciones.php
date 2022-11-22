
    <style>
        .carta_fundaciones {
            
            background-color: rgba(var(--bs-back-primary)) !important;
        }
    </style>

    <!-- Cartas de fundaciones -->
    <section class="fundaciones">
        <div class="titulo text-center mt-5"><b>FUNDACIONES ASOCIADAS A MACAK</b></div>
        <hr>
        <div id="fundacion" class="row">
            <!-- Modal -->
            <div class="modal fade" id="detalle_fundacion" tabindex="-1" aria-labelledby="detalle_fundacion" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="nombre_fundacion"></h5>
                        <button type="button" class="btn-close cerrar_fundacion" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="contenido_modal">
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="src/vistas/donaciones.php" type="button" class="btn btn-primary">Ir a donar</a>
                        <a href="src/vistas/adopcion_apadrinamiento.php" type="button" class="btn btn-primary">Ir a adoptar</a>
                    </div>
                    </div>
                </div>
        </div>
    </section>

    <script src="public/js/fundaciones.js"></script>
    <script>
        $(document).ready(fundaciones);
    </script>
