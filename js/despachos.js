function init(){
	listado_general_despachos();
}

function listado_general_despachos(){
	tabla_ingresos = $('#data_despachos').DataTable({      
    "aProcessing": true,//Activamos el procesamiento del datatables
    "aServerSide": true,//Paginación y filtrado realizados por el servidor
    dom: 'Bfrtip',//Definimos los elementos del control de tabla
    buttons: [     
      'excelHtml5',
    ],

    "ajax":{
      url:"../ajax/despachos.php?op=listar_despachos_laboratorio",
      type : "POST",
      dataType : "json",       
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
      }}, //cerrando language
   });
}

function ver_detalle_despachos(n_despacho){
	$("#n_despacho_pdf").val(n_despacho);
	$("#modal_detalle_despacho").modal();
	tabla_ingresos = $('#data_detalle_despachos').DataTable({      
    "aProcessing": true,//Activamos el procesamiento del datatables
    "aServerSide": true,//Paginación y filtrado realizados por el servidor
    dom: 'Bfrtip',//Definimos los elementos del control de tabla
    buttons: [     
      'excelHtml5',
    ],
    "ajax":{
      url:"../ajax/despachos.php?op=listar_detalle_despacho",
      type : "POST",
      data : {n_despacho:n_despacho},
      dataType : "json",       
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
      }}, //cerrando language
   });
}

init();