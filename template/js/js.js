    $(document).ready(inicio)


    function inicio() {

        $(".botoncompra").click(agregar)
        //$("#carrito").load("pages/poncarrito.php");
        $("#monto").load("pages/poncarritos.php");

    }
    function agregar() {
        //alert('hola');
       //$("#carrito").load("pages/poncarrito.php?p="+$(this).val());
        $("#monto").load("pages/poncarritos.php?p="+$(this).val());
       // $("#monto").load("pages/detallecarrito.php?p="+$(this).val());
         detalle();

    }

    function detalle(){
        $.ajax({

            url:   'pages/detallecarrito.php?p='+$(this).val(),
            type:  'post',
            beforeSend: function () {
               console.log('exito')
            },
            success:  function (response) {
                $("#resultado").html(response);
            }
        });
    }

    function destruir(){
        $('#destruirSession').click(destroysession());
        alert('hoa');
    }

    function destroysession(){
        $.ajax({

            url:   'pages/destruir.php',
            type:  'post',
            beforeSend: function (msg) {
                //$("#resultado").html("Procesando, espere por favor...");
                if(msg == 'destruirSession'){
                   window.location.href= '../index.php';
                }
            },
            success:  function (response) {
                console.log('fallo')
            }
        });
    }