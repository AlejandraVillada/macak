$(' li a.listar').on('click', function(e) {
    e.preventDefault();
    // $('#contenido li ').on('click', function(e) {
    //     e.preventDefault();
    // });
    var aID = $(this).attr('href');
    console.log(aID);
    $.post(aID, function(data) {
        if (aID != "#") {
            $("#contenido").html(data);
        }
    });
});

$("#barra_lateral").mCustomScrollbar({
    theme: "minimal",
    axis: 'y'
});
$(".principal").mCustomScrollbar({
    theme: "minimal"
});

$('#barra_collapse').on('click', function() {
    $('#barra_lateral').toggleClass('active');
    $('#barra_superior').toggleClass('active');
    $('#contenido').toggleClass('active');

    // close dropdowns
    $('.collapse.in').toggleClass('in');
    // and also adjust aria-expanded attributes we use for the open/closed arrows
    // in our CSS
    $('a[aria-expanded=true]').attr('aria-expanded', 'false');

});

$('#formCrearAnimales').submit(function(e) {
    console.log('Animales');
    e.preventDefault();
    var datos = new FormData(this);
    $.ajax({
        type: "post",
        url: "Controlador/controlador_Animales.php",
        // url: "../../../Controlador/controlador_clientes.php",
        data: datos,
        contentType: false,
        processData: false,
        dataType: "json"
    }).done(function(resultado) {
        // console.log(resultado==);
        if (resultado == 1) {
            swal({
                position: 'center',
                type: 'success',
                title: 'El cliente fue grabado con éxito',
                showConfirmButton: false,
                timer: 1200
            })
            document.getElementById('formCrearCliente').reset();
            $('.modal').hide();
            $('.modal-backdrop').hide();
        } else {
            swal({
                position: 'center',
                type: 'error',
                title: 'Ocurrió un error al grabar',
                showConfirmButton: false,
                timer: 1500
            });

        }
    });
})





! function(n, o, e) {
    "use strict";
    e(".modal").appendTo("body"), e("#onshowbtn").on("click", function() {
        e("#onshow").on("show.bs.modal", function() {
            alert("onShow event fired.")
        })
    }), e("#onshownbtn").on("click", function() {
        e("#onshown").on("shown.bs.modal", function() {
            alert("onShown event fired.")
        })
    }), e("#onhidebtn").on("click", function() {
        e("#onhide").on("hide.bs.modal", function() {
            alert("onHide event fired.")
        })
    }), e("#onhiddenbtn").on("click", function() {
        e("#onhidden").on("hidden.bs.modal", function() {
            alert("onHidden event fired.")
        })
    })
}(window, document, jQuery);