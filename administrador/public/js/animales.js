var dt;

function consultar() {
    console.log('entra consulta animales');
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

    dt = $('#animales').DataTable({
        "ajax": "controlador/controlador_animales.php?action=reporte_animales",
        "dom": 'Bfrtip',
        "scrollY": "250px",
        "scrollX": true,
        paging: false,
        "scrollCollapse": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        // searchbuilder: true,
        "buttons": [{
                extend: 'excelHtml5',
                text: '<i class="btn btn-success fas fa-file-excel "></i> ',
                titleAttr: 'Exportar a Excel',
                title: 'animales'
            },

        ],
        "columns": [
            // { "data": "Id_animales" },
            {
                "data": "id",
                'render': function(data) {
                    return '<button class="btn btn-info actualizar" data-toggle="modal" data-target="#modal_act_animales" data-codigo="' + data + '"> <i class="text-white fa-solid fa-circle-plus"></i></button>'
                }
            },
            { "data": "nombre" },
            {
                "data": "descripcion",
                'render': function(data) {
                    return '<textarea class="form-control" > ' + data + '</textarea>'
                }
            },
            { "data": "edad" },
            { "data": "tipo" },
            { "data": "raza" },
            { "data": "URL_imagen" },
            { "data": "estado" },
            { "data": "activo" },

        ]
    });




    $('#animales').on('click', 'button.actualizar', function(event) {
        // event.preventDefault();
        var codigo = $(this).data("codigo");
        $.ajax({
            type: "post",
            url: "controlador/controlador_animales.php",
            data: { codigo: codigo, action: 'consultar_animales' },
            dataType: "json"
        }).done(function(respuesta) {
            $("#id_act").val(respuesta.resultado.id);
            $("#name_act").val(respuesta.resultado.nombre);
            $("#descripcion_act").val(respuesta.resultado.descripcion);
            $("#tipo_act").val(respuesta.resultado.tipo);
            $("#edad_act").val(respuesta.resultado.edad);
            $("#raza_act").val(respuesta.resultado.raza);
            $("#estado_act").val(respuesta.resultado.activo);


        });
        dt.ajax.reload()

    })


    $("#editado3").on('click', 'button#actualizar_animales', function(e) {
        e.preventDefault();
        var datos = $('#formActualizarAnimales').serialize()
        console.log(datos)
        $.ajax({
            type: "post",
            url: "Controlador/controlador_animales.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
            // console.log(resultado==);
            if (resultado == 1) {
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'La mascota fue actualizada con éxito',
                    showConfirmButton: false,
                    timer: 1200
                })
                document.getElementById('formActualizarAnimales').reset();
                // $('#modal_act_animales').modal('hide');
                $('.modal').hide();
                $('.modal-backdrop').hide();
                dt.ajax.reload();

            } else {
                swal({
                    position: 'center',
                    type: 'error',
                    title: 'Ocurrió un error al actualizar ',
                    showConfirmButton: false,
                    timer: 1500
                });

            }
            dt.ajax.reload()

        });

    })





}