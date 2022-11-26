<?php
$_SESSION['title'] = 'MACAK| Home ';
// include_once('templates/header.php');


?>
<style>
    .body {
        align-items: center;
        background: #E3E3E3;
        display: flex;
        height: 100vh;
        justify-content: center;
    }

    @-webkit-keyframes scroll {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(calc(-250px * 5));
        }
    }

    @keyframes scroll {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(calc(-250px * 5));
        }
    }

    .slider {
        background: white;
        box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.125);
        height: 250px;
        margin: auto;
        overflow: hidden;
        position: relative;
        width: auto;
    }

    .slider::before,
    .slider::after {
        background: linear-gradient(to right, white 0%, rgba(255, 255, 255, 0) 100%);
        content: "";
        height: 250px;
        position: absolute;
        width: 200px;
        z-index: 2;
    }

    .slider::after {
        right: 0;
        top: 0;
        transform: rotateZ(180deg);
    }

    .slider::before {
        left: 0;
        top: 0;
    }

    .slider .slide-track {
        -webkit-animation: scroll 20s linear infinite;
        animation: scroll 20s linear infinite;
        display: flex;
        width: calc(250px * 5);
    }

    .slider .slide {
        height: 250px;
        width: 300px;
    }
</style>
<section>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="public/img/Macak_Carrusel1.gif" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="public/img/Macak_Carrusel2.gif" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="public/img/Macak_Carrusel3.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<section class=" ">
    <div class="slider bg-primary-plantilla">
        <div class="slide-track">
            <div class="slide m-3 text-center">
                <img src="public/img/Fundacion_Yo_Amo_Animales.jpg" alt="" style="width: 200px ; border-radius:150px;">
            </div>
            <div class="slide m-3 text-center">
                <img src="public/img/Fundacion_Tepa.png" alt="" style="width: 200px ; border-radius:150px;">
            </div>
            <div class="slide m-3 text-center">
                <img src="public/img/Fundacion_Unidad_Animal.png" alt="" style="width: 200px ; border-radius:150px;">
            </div>
            <div class="slide m-3 text-center">
                <img src="public/img/Pazanimal_Huella_De_Vida.jpg" alt="" style="width: 200px ; border-radius:150px;">
            </div>
            <div class="slide m-3 text-center">
                <img src="public/img/Fundacion_Paraiso_Animal.png" alt="" style="width: 200px ; border-radius:150px; background-color:white;">
            </div>
            <div class="slide m-3 text-center">
                <img src="public/img/Fundacion_Razas_unicas.png" alt="" style="width: 200px ; border-radius:150px;">
            </div>
            <div class="slide m-3 text-center">
                <img src="public/img/Fundacion_Yo_Amo_Animales.jpg" alt="" style="width: 200px ; border-radius:150px;">
            </div>
            <div class="slide m-3 text-center">
                <img src="public/img/Fundacion_Tepa.png" alt="" style="width: 200px ; border-radius:150px;">
            </div>
            <div class="slide m-3 text-center">
                <img src="public/img/Fundacion_Unidad_Animal.png" alt="" style="width: 200px ; border-radius:150px;">
            </div>
            <div class="slide m-3 text-center">
                <img src="public/img/Pazanimal_Huella_De_Vida.jpg" alt="" style="width: 200px ; border-radius:150px;">
            </div>
            <div class="slide m-3 text-center">
                <img src="public/img/Fundacion_Paraiso_Animal.png" alt="" style="width: 200px ; border-radius:150px; background-color:white;">
            </div>
            <div class="slide m-3 text-center">
                <img src="public/img/Fundacion_Razas_unicas.png" alt="" style="width: 200px ; border-radius:150px;">
            </div>

        </div>
    </div>
</section>



<!-- <section>
    <div class=" bg-primary-plantilla">
        <div class="row m-2 p-3">
            <div class="col">
                <div class=" bg-primary-plantilla  ">
                    <div class="row d-flex justify-content-center">
                        <img src="public/img/Fundacion_Yo_Amo_Animales.jpg" alt="" style="width: 200px ; border-radius:150px;">

                    </div>
                    <div class="row d-flex justify-content-center">
                        Descripcion
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="bg-primary-plantilla ">
                    <div class="row d-flex justify-content-center">
                        <img src="public/img/Fundacion_Tepa.png" alt="" style="width: 200px ; border-radius:150px;">

                    </div>
                    <div class="row d-flex justify-content-center">
                        Descripción
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="bg-primary-plantilla ">
                    <div class="row d-flex justify-content-center">
                        <img src="public/img/Fundacion_Unidad_Animal.png" alt="" style="width: 200px ; border-radius:150px;">

                    </div>
                    <div class="row d-flex justify-content-center">
                        Descripción
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="bg-primary-plantilla ">
                    <div class="row d-flex justify-content-center">
                        <img src="public/img/Pazanimal_Huella_De_Vida.jpg" alt="" style="width: 200px ; height:200px; border-radius:50px;">

                    </div>
                    <div class="row d-flex justify-content-center">
                        Descripción
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<div class="row d-flex text-center justify-content-center">

    <h3>Mascotas</h3>
</div>


<div class="container">
    <div id="mascotas" class="row  text-center">
    </div>
</div>

<script>
    $.ajax({
        type: "get",
        url: "src/controlador/controlador_adopcion_apadrinamiento.php",
        data: {
            accion: 'listar_home'
        },
        dataType: "json"
    }).done(function(aa) {
        console.log(aa);
        $.each(aa.data, function(index, value) {
            if (value.estado == 'publicado') {
                var URL_imagen;
                if (value.URL_imagen == '') {
                    URL_imagen = 'public/img/logo.png';
                } else {
                    URL_imagen = 'public/img/animales/' + value.URL_imagen;
                }
                $("#mascotas").append(
                    '<div class="profile-card-4 text-center col-lg-3 p-0">' +
                    ' <img src="' + URL_imagen + '" class="img img-responsive" style="height:280px; width:auto;">' +
                    '    <div class="profile-content bg-primary-plantilla">' +
                    '        <div class="profile-description text-black">' +
                    '            <h5>' + value.nombre + '</h5>' +
                    '            <span>' + value.descripcion + '</span>' +
                    '        </div>' +
                    '        <div class="row">' +
                    '            <div class="col-xs-4">' +
                    '                <div class="profile-overview">' +
                    // '                <button type="button" class="btn bg-secondary-plantilla vermas text-white" data-bs-toggle="modal" data-bs-target="#detalle_fundacion" data-codigo="' + value.id + '">Ver Más</button>' +
                    '                </div>' +
                    '            </div>' +
                    '        </div>' +
                    '    </div>' +
                    '</div>'
                );

                // $("#mascotas").append("<div class='col-lg-12 col-sm-10 col-md-10 d-flex justify-content-center'><div class='col-lg-3 col-sm-10 col-md-10 m-2'><div class='row'><img src='" + value.URL_imagen + "' style='width: 200px;' alt='' srcset=''></div><div class='row'><h4>" + value.nombre + "</h4></div><div class='row'>" + value.descripcion + "</div></div></div>")
            }
        });
    });
</script>