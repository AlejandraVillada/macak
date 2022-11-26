<style>
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

<!-- Cartas de fundaciones -->
<section class="fundaciones">
    <div class=" row titulo text-center mt-5 d-flex justify-content-center">
        <div class=" bg-primary-plantilla " style="border-radius: 70px 10px; background-color:#273751 ;width: 500px; height:50px; text-align:center; vertical-align:middle;">
            <b>
                <h5 class="mt-2">FUNDACIONES ASOCIADAS A MACAK</h5>
            </b>
        </div>
    </div>
    <hr>
    <!-- <div class="container" id="fundacion_prueba">
        <article class="postcard dark blue">
            <a class="postcard__img_link" href="#">
                <img class="postcard__img" src="https://picsum.photos/1000/1000" alt="Image Title" />
            </a>
            <div class="postcard__text">
                <h1 class="postcard__title blue"><a href="#">Fundación</a></h1>
                <div class="postcard__subtitle small">
                    <time datetime="2020-05-25 12:00:00">
                        <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                    </time>
                </div>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
                <ul class="postcard__tagbox">
                    <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                    <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                    <li class="tag__item play blue">
                        <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                    </li>
                </ul>
            </div>
        </article>
    </div> -->
    <div class="container">
        <div id="fundacion" class="row  text-center">
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade " id="detalle_fundacion" tabindex="-1" aria-labelledby="detalle_fundacion" aria-hidden="true">
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
                    <button type="button" class="btn btn-primary donar" data-bs-dismiss="modal">Ir a donar</button>
                    <button type="button" class="btn btn-primary adoptar" data-bs-dismiss="modal">Ir a
                        adoptar</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="public/js/fundaciones.js"></script>
<script>
    $(document).ready(fundaciones);
</script>