<div class="card-body m-0 p-0">
    <!-- <div class="card-body"> -->
    <form id="formCrearAnimales" enctype="multipart/form-data" >

        <div class="row">
            <div class="form-group col">
                <label for="name">Nombre Animal</label>
                <input placeholder="Nombre completo del Animal" type="text" class="form-control" name="name"
                    id="name" required>
            </div>
            <div class="form-group  col">
                <label for="edad">Edad</label>

                <input type="text" class="form-control" name="edad">
            </div>

        </div>

        <div class="row">

            <div class="form-group  col">
                <label for="IdCuidad">Tipo</label>
                <select name="tipo" id="tipo" class="form-control" required>
                    <option value="" selected disabled>Seleccione el tipo de Animal</option>
                    <option value="Perro">Perro</option>
                    <option value="Gato">Gato</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            <div class="form-group col">
                <label for="raza">Raza Animal</label>
                <input placeholder="Nombre completo del Animal" type="text" class="form-control" name="raza" id="raza"
                    required>
            </div>
        </div>
        <div class="row">
            <div class="form-group  col">
                <label for="edad">Imagen</label>
                <input type="file" class="form-control" name="url_img[]">
            </div>
            <div class="form-group  col">
                <label for="edad">Estado Inicial</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="" selected disabled>Seleccione el estado de Animal</option>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                    <option value="3">En proceso</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group  col">
                <label for="IdCuidad">Descripción</label>

                <textarea name="descripcion" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
        </div>




        <div class="form-group  justify-content-end d-flex ">
            <button type="submit" id="crear_Animal" class="btn btn-primary mr-1" data-toggle="tooltip"> Ingresar
                Animal</button>
            <button id="cerrar" type="button" class="ml-1 btn btn-danger" data-dismiss="modal"
                data-toggle="tooltip">Regresar</button>
            <!-- <a href="../Animals/view_Animals.php" id="cerrar" class="btn btn-danger"
                        data-toggle="tooltip">Regresar</a> -->
        </div>

        <input type="hidden" id="nuevo" value="nuevo" name="action" />

    </form>
    <!-- </div> -->
</div>

<!-- 
<script src="./public/js/Animal.js"></script>


<script>
// $('#usuarios').DataTable();
$(document).ready(crear);
</script> -->