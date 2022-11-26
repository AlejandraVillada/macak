<style>
    h2 {
        color: white;
        font-family: 'Permanent Marker', cursive;
    }

    h5 {
        color: white;
        font-family: 'Fredoka One', cursive;
    }

    h4 {
        color: #735041;
        font-family: 'Fredoka One', cursive;
    }
</style>

<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

<div class=" row titulo text-center mt-5 d-flex justify-content-center">
        <div class=" bg-primary-plantilla " style="border-radius: 70px 10px; background-color:#273751 ;width: 300px; height:50px; text-align:center; vertical-align:middle;">
            <b>
                <h5 class="text-white mt-2">ADOPCIÓN</h5>
            </b>
        </div>
    </div>
<hr>

<div class = "slider bg-primary-plantilla">
    <div class="text-center">
        <h2 class="text-white container">
            ¡Con tu aporte nos ayudas a salvar más peluditos!
        </h2>
    </div>
</div>

<div class = "fl-row-content-wrap mt-4"><img src="public/img/perros.png" ></div>

<div class="text-center container-lg mt-4">
	<p>
        <span style="font-size: 20px;">
            Te invitamos a ser parte de esta gran familia en donde podras apoyar a las fundaciones que tenemos para tí, para que conjuntamente podamos seguir construyendo una vida más justa y digna para estos peluditos.
        </span>
    </p>   
</div>

<div class = "slider bg-primary-plantilla">
    <div class="text-center">
        <h2 class="text-white container">
            Tipo de donaciones
        </h2>
    </div>
</div>
<div class = "fl-row-content-wrap mt-4"><img src="public/img/Donacion.png" ></div>
<section>

    <div class="row justify-content-around">
        <div class="col-3 m-3">
           <h4>En especie</h4>
        </div>
        <div class="col-3 m-3">
            <h4>En Dinero</h4>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="col-3 text-center container">
            <p>
                <span style="font-size: 16px;">
                    Alimento concentrado para perros y gatos (adultos y cachorros), 
                    medicinas, elementos de aseo, arena para gatos, juguetes, camas, casas, entre otros.
                            (Proximanente, esperalo!!!)
                </span>
            </p>   
        </div>
        <div class="col-3 text-center container">
            <p>
                <span style="font-size: 16px;">
                    Puede ser por el valor que desees, por medio de una consignación a la fundación que
                    eligas.
                </span>
            </p>   
        </div>
    </div>
</section>
<div class = "fl-row-content-wrap mt-4"><img src="public/img/Donaciones.png" ></div>


<style>
    .carta_general {

        background-color: rgb(255, 255, 255, 0.6);
        padding: 10px;
        height: 700px;
        color: white;
        border-radius: 15px;
        padding: 80px;

    }
</style>

<div class="container-fluid  justify-content-center d-flex mt-5">
    <div class="card carta_general  " style="background-color: rgba(205, 168, 134,0.8)">
        <div class=" justify-content-center d-flex">

            <!-- <img class="mt-5" src="public/img/logo.png" alt="" width="400"> -->
        </div>
        <div class="row m-1 justify-content-center d-flex" style="color: black !important;">
            <form id="datos" method="get">
                <div class="row text-center">
                    <h2>MACAK DONACIONES</h2>
                    <br>
                    <h6>Construyendo Familias</h6>
                </div>
                <div class="row">
                    <label for="">Numero de cedula</label>
                    <input class="form-control m-2" type="text" name="cedula" id="cedula" placeholder="Ingrese el numero su cedula de cuidadania" required>
                </div>
                <div class="row">
                    <label for="">Correo electronico</label>
                    <input class="form-control m-2" type="correo" name="correo" id="correo" placeholder="Ingrese su correo electronico" required>
                </div>
                <div class="row">
                    <label for="">Numero de cuenta</label>
                    <input class="form-control m-2" type="text" name="cuenta_origen" id="cuenta_origen" placeholder="Ingrese el numero de cuenta origen" required>
                </div>
                <div class="row">
                    <label for="">Fundacion</label>
                    <select name="id_fundacion" id="id_fundacion" class="form-control m-2">
                        <option value="default">Seleccione una fundacion</option>
                    </select>
                </div>
                <div class="row">
                    <label for="">Valor a donar</label>
                    <input class="form-control m-2" type="number" name="monto" id="monto" placeholder="Valor a donar" required>
                </div>
                <input type="hidden" name="accion" value="donar">
                <input type="hidden" name="id_usuario" value="1">
                <input type="hidden" name="estado_transaccion" value="1">
                <div class="row justify-content-center mt-3">
                    <button type="button" class="btn bg-secondary-plantilla donar" style="color: white !important;">Enviar Donacion</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $.ajax({
        type: "get",
        url: "src/controlador/controlador_fundaciones.php",
        data: { accion: 'listar' },
        dataType: "json"
    }).done(function(fundacion) {
        $.each(fundacion.data, function(index, value) {
            $("#id_fundacion").append("<option value='"+value.id+"'>"+value.nombre+"</option>")
        });

    });

    $(".donar").on("click", function() {
        var datos = $("#datos").serialize();
        console.log(datos);
        $.ajax({
            type: "get",
            url: "src/controlador/controlador_donaciones.php",
            data: datos,
            dataType: "json"
        }).done(function(donacion) {
            if (donacion.respuesta === "error") {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Transaccion erronea, por favor revise bien los datos diligenciados',
                })
            } else {
                Swal.fire(
                    'La donacion fue enviada',
                    'Muchas gracias por ayudarnos a seguir creciendo',
                    'success'
                )
                $("#cedula").val('');
                $("#correo").val('');
                $("#cuenta_origen").val('');
                $("#id_fundacion").val('default');
                $("#monto").val('');
            }
           
        });
    });
</script>



