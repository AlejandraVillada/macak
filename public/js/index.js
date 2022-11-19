$(' li a.listar').on('click', function(e) {
    e.preventDefault();
    // $('#contenido li ').on('click', function(e) {
    //     e.preventDefault();
    // });
    var aID = $(this).attr('href');

    const el = document.querySelectorAll('.activar_boton');

    for (var i = 0; i < el.length; i++) {
        el[i].classList.remove("active");
    }


    // el.classList.remove('active');
    $(this).addClass('active');

    // console.log(aID);
    $.post(aID, function(data) {
        if (aID != "#") {
            $("#contenido").html(data);
        }
    });
});