<style></style>
<div class="card card-light text-black m-5" style="position: relative; ">
    <div class="card-header bg-dark justify-content-center d-flex row mt-0">
        <div class="col">
            <h4 class="card-title text-white">Consultar animales</h4>
        </div>
        <div class="justify-content-end d-flex text-right col">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_animales">
                Agregar Animal
            </button>
        </div>
    </div>
    <!-- Button trigger modal -->

    <div class="card-body">
        <table id="animales" class="table table-light table-hover" style="width:100%">
            <thead class="table-dark">
                <tr>
                <th>Gestión</th>
                <th>nombre</th>
                <th>descripcion</th>
                <th>edad</th>
                <th>tipo</th>
                <th>raza</th>
                <th>URL_imagen</th>
                <th>estado</th>
                <th>activo</th>

                </tr>
            </thead>


        </table>
    </div>
</div>



<div class="container">


    <!-- Modal -->
    <div class="modal fade " id="modal_act_animales" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="modal_act_animalesLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_act_animalesLabel">Actualizar animales</h5>
                    <button type="button" class="btn btn-secodary" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> </button>
                </div>
                <div class="modal-body p-0 m-0" id="editado3">
                    <?php include_once __DIR__.'/modificar.php';?>

                </div>
                <!-- <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar animales</button>
            </div> -->
            </div>
        </div>
    </div>
</div>

<script src="../public/js/animales.js"></script>


<script>
// $('#usuarios').DataTable();
$(document).ready(consultar);
</script>