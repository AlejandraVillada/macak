$('#sidebar  a.lista1').on('click', function(e) {
    e.preventDefault();

    var aID = $(this).attr('href');
    // console.log(aID);
    $.post(aID, function(data) {
        if (aID != "#") {
            $(".principal").html(data);
        }
    });
});

$('#editado').on('click', 'button#grabar', function(e) {
    e.preventDefault();

    console.log('holdcdfv')
})