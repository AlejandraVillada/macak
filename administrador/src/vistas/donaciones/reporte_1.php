<div class="justify-content-center d-flex">
    <div class="card card-light text-black m-5 " style="position: relative; ">
        <div class="card-header bg-dark justify-content-center d-flex row mt-0">
            <div class="col">
                <h4 class="card-title text-white">Generar Reportes</h4>
            </div>
    
        </div>
        <!-- Button trigger modal -->
    
        <div class="card-body">
            <table id="cliente_cumple" class="table table-light table-hover" style="width:100%">
                <thead class="table-dark">
                    <tr>
                        <th>Documento Identidad</th>
                        <th>Nombre Completo</th>
                        <th>sexo</th>
                        <th>Correo</th>
                        <th>Ciudad</th>
                        <th>Teléfono</th>
                        <th>Celular</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Próximo Cumpleaños</th>
                        <th>Tratamiento datos </th>
                        <th>Estado</th>
                    </tr>
                </thead>
    
    
            </table>
        </div>
    </div>
</div>



<script src="../public/js/cliente.js"></script>


<script>
// $('#usuarios').DataTable();
$(document).ready(consultar_cumple);
</script>