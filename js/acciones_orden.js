document.querySelectorAll(".accion_orden_actual").forEach(i => i.addEventListener("click", e => {
  let accion = i.dataset.accion;
  document.getElementById("tipo_accion_act").value=accion;
  input_focus_clear();
}));

function input_focus_clear_acc(){
    $("#reg_accion_act").val("");
    $('#acciones_ordenes').on('shown.bs.modal', function() {
    $('#reg_accion_act').focus();
  });
}


var items_accion = [];

function registrar_accion_act(){

  let cod_orden_act = $("#reg_accion_act").val();

  $.ajax({
      url:"../ajax/ordenes.php?op=get_data_oden",
      method:"POST",
      data : {cod_orden_act:cod_orden_act},
      cache:false,
      dataType:"json",
      success:function(data){
      if(data !="error"){
        let codigo = data.codigo; 
        let indice = items_accion.findIndex((objeto, indice, items_accion) =>{
        return objeto.n_orden == codigo;
        });

        if(indice>=0){
            var y = document.getElementById("error_sound"); 
            y.play();
            alerts_productos("error","Orden ya existe en la lista!!");
            input_focus_clear_acc();
          }else{
            var x = document.getElementById("success_sound"); 
            x.play();
            let items_ingresos = {
            n_orden : data.codigo,
            paciente: data.paciente,
            optica: data.optica
            }
            items_accion.push(items_ingresos);
            show_items();       
            input_focus_clear_acc();  
          }          
        }else{
            var z = document.getElementById("error_sound"); 
            z.play();
            alerts_productos("error","Orden No existe");
            input_focus_clear_t();
        }
      }
    });
}


function registrarAccionesOrdenes(){

  let cant_items = items_accion.length;
  let tipo_accion = document.getElementById("tipo_accion_act").value;
  if (cant_items<1) {
    alerts_productos("warning", "Lista de ingresos vacia");
    $('#reg_accion_act').focus(); return false;
  }
  let id_usuario = $("#id_usuario").val();
  $.ajax({
  url:"../ajax/acciones_orden.php?op=registrar_acciones_ordenes",
  method: "POST",
  data: {'arrayItemsAccion':JSON.stringify(items_accion),'id_usuario':id_usuario,'tipo_accion':tipo_accion},
  cache:  false,
  success:function(data){
    console.log(data)
    if (data=="ingreso_a_tallado"){
      $("#acciones_ordenes").modal("hide");
      alerts_productos("success", "Ordenes ingresadas a tallado");
      $("#data_ingresos_tallado").DataTable().ajax.reload();
    }
  }  
 });//Fin Ajax
}


function show_items(){

  $("#items_orden_tallado_ingresos").html('');

  let filas = "";
  for(let i=0;i<items_accion.length;i++){
    filas = filas +    
    "<tr style='text-align:center' id='item_t"+i+"'>"+
    "<td>"+(i+1)+"</td>"+
    "<td>"+items_accion[i].n_orden+"</td>"+
    "<td>"+items_accion[i].paciente+"</td>"+
    "<td>"+items_accion[i].optica+"</td>"+
    "<td>"+"<button type='button'  class='btn btn-sm bg-light' onClick='detOrdenes("+'"'+items_accion[i].n_orden+'"'+")'><i class='fa fa-eye' aria-hidden='true' style='color:blue'></i></button>"+"</td>"+
    "<td>"+"<button type='button'  class='btn btn-sm bg-light' onClick='eliminarItemTallado("+i+")'><i class='fa fa-times-circle' aria-hidden='true' style='color:red'></i></button>"+"</td>"+
    "</tr>";
  }

  $("#items_orden_tallado_ingresos").html(filas);
}

function eliminarItemTallado(index) {
  $("#item_t" + index).remove();
  drop_index(index);
}

function drop_index(position_element){
  items_accion.splice(position_element, 1);
  $('#reg_accion_act').focus();
}