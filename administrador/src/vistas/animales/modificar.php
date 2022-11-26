<div class="card-body">
    <!-- <div class="card-body"> -->
    <form id="formActualizarAnimales">

        <div class="row">
            <div class="form-group col">
                <label for="name">Nombre Animal</label>
                <input placeholder="Nombre completo del Animal" type="text" class="form-control" name="name" id="name_act" required>
            </div>
            <div class="form-group  col">
                <label for="edad">Edad</label>

                <input type="text" class="form-control" name="edad" id="edad_act">
            </div>

        </div>

        <div class="row">

            <div class="form-group  col">
                <label for="IdCuidad">Tipo</label>
                <select name="tipo" id="tipo_act" class="form-control" required>
                    <option value="" selected disabled>Seleccione el tipo de Animal</option>
                    <option value="Perro">Perro</option>
                    <option value="Gato">Gato</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            <div class="form-group col">
                <label for="raza">Raza Animal</label>
                <input placeholder="Raza del Animal" id="raza_act" type="text" class="form-control" name="raza" id="raza_act" required>
            </div>
        </div>
        <div class="row">
           
            <div class="form-group  col">
                <label for="edad">Estado Inicial</label>
                <select name="estado" id="estado_act" class="form-control" required>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                    <option value="3">En proceso</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group  col">
                <label for="IdCuidad">Descripción</label>

                <textarea name="descripcion" class="form-control" id="descripcion_act" cols="30" rows="10"></textarea>
            </div>
        </div>




        <div class="form-group mt-1 justify-content-end d-flex">
            <button type="submit" id="actualizar_animales" class="btn btn-primary mr-1" data-toggle="tooltip">Actualizar
                Animales</button>
            <button id="cerrar" type="button" class="btn btn-danger ml-1" data-dismiss="modal" data-toggle="tooltip">Regresar</button>
            <!-- <a href="../Animales/view_Animales.php" id="cerrar" class="btn btn-danger"
                        data-toggle="tooltip">Regresar</a> -->
        </div>

        <input type="hidden" id="modificar" value="modificar" name="action" />
        <input type="hidden" id="id_act" name="id" />

    </form>
    <!-- </div> -->
</div>


<!-- <script src="../public/js/Animales.js"></script> -->


<script>
    // $('#usuarios').DataTable();
    // $(document).ready(actualizar);
</script>