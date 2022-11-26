</div>

<div class="mt-5">
    <div class="bg-secondary-plantilla  p-1" style=" min-height: 250px">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-12 pt-4  pr-4 d-flex-justify-content-center">
                <div class="row p-1 ">
                    <div class="col d-flex justify-content-end"><img src="public/img/facebook.png" alt=""></div>
                    <div class="col d-flex justify-content-start"><img src="public/img/logotipo-de-instagram.png" alt=""></div>
                </div>
                <div class="row p-1">
                    <div class="col d-flex justify-content-end"><img src="public/img/whatsapp.png" alt=""></div>
                    <div class="col d-flex justify-content-start"><img src="public/img/signo-de-twitter.png" alt=""></div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">b</div>
            <div class="col-lg-4 col-md-6 col-sm-12 m-0 p-0 pt-2  d-flex justify-content-end">
                <img src="public/img/logo.png" alt="" style="width: 220px ; border-radius:150px;">
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="public/js/index.js"></script>
<script>
    $.ajax({
        type: "get",
        url: "src/controlador/controlador_adopcion_apadrinamiento.php",
        data: { accion: 'listar_home' },
        dataType: "json"
    }).done(function(aa) {
        console.log(aa);
        $.each(aa.data, function(index, value) {
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
        });
    });
</script>
</body>

</html>