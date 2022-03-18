function initTallados(){
  listarIngresosTallado();
    $(".modal-header").on("mousedown", function(mousedownEvt) {
    let $draggable = $(this);
    let x = mousedownEvt.pageX - $draggable.offset().left,
        y = mousedownEvt.pageY - $draggable.offset().top;
    $("body").on("mousemove.draggable", function(mousemoveEvt) {
    $draggable.closest(".modal-dialog").offset({
    "left": mousemoveEvt.pageX - x,
      "top": mousemoveEvt.pageY - y
    });
    });
    $("body").one("mouseup", function() {
      $("body").off("mousemove.draggable");
    });
    $draggable.closest(".modal").one("bs.modal.hide", function() {
        $("body").off("mousemove.draggable");
    });
  });
}


function alerts_tallado(icono, titulo){
    Swal.fire({
        position: 'top-center',
        icon: icono,
        title: titulo,
        showConfirmButton: true,
        timer: 2500
    });
}


function listarIngresosTallado(){
  tabla_ingresos = $('#data_ingresos_tallado').DataTable({      
    "aProcessing": true,//Activamos el procesamiento del datatables
    "aServerSide": true,//Paginación y filtrado realizados por el servidor
    dom: 'Bfrtip',//Definimos los elementos del control de tabla
    buttons: [     
      'excelHtml5',
    ],

    "ajax":{
      url:"../ajax/tallados.php?op=listar_ingresostallado",
      type : "POST",
      dataType : "json",
      //data:{},           
      error: function(e){
      console.log(e.responseText);
    },           
    },

        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 25,//Por cada 10 registros hace una paginación
          "order": [[ 0, "desc" ]],//Ordenar (columna,orden)
          "language": { 
          "sProcessing":     "Procesando...",       
          "sLengthMenu":     "Mostrar _MENU_ registros",       
          "sZeroRecords":    "No se encontraron resultados",       
          "sEmptyTable":     "Ningún dato disponible en esta tabla",       
          "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",       
          "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",       
          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",    
          "sInfoPostFix":    "",       
          "sSearch":         "Buscar:",       
          "sUrl":            "",       
          "sInfoThousands":  ",",       
          "sLoadingRecords": "Cargando...",       
          "oPaginate": {       
              "sFirst":    "Primero",       
              "sLast":     "Último",       
              "sNext":     "Siguiente",       
              "sPrevious": "Anterior"       
          },
       
          "oAria": {       
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",       
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
       
          }

         }, //cerrando language

          //"scrollX": true

    });
}

initTallados()

