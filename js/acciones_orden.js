document.querySelectorAll(".accion_orden_actual").forEach(i => i.addEventListener("click", e => {
  document.getElementById("form_actions").style.display = "none";
  items_accion = [];
  $("#items_orden_tallado_ingresos").html('');
  let accion = i.dataset.accion;
  if (accion=='despacho_de_laboratorio') {
    document.getElementById("tab-despacho").style.display = "flex";
  }
  document.getElementById("tipo_accion_act").value=accion;
  input_focus_clear_acc();
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
  let tipo_accion = document.getElementById("tipo_accion_act").value; 

  $.ajax({
      url:"../ajax/acciones_orden.php?op=get_data_oden",
      method:"POST",
      data : {cod_orden_act:cod_orden_act,tipo_accion:tipo_accion}, 
      cache:false,
      dataType:"json",
      success:function(data){
      console.log(data);
      let detalles = data.det_orden;    
      
      if(data.mensaje !="existe"){
        if(data.mensaje !="error"){
        /*Comprobamos que no exista codigo en arreglo items_accion*/  
        let codigo = detalles.codigo; 
        let indice = items_accion.findIndex((objeto, indice, items_accion) =>{return objeto.n_orden == codigo; });

        if(indice>=0){
            var y = document.getElementById("error_sound"); 
            y.play();
            alerts_productos("error","Orden ya existe en la lista!!");
            input_focus_clear_acc();
          }else{
            var x = document.getElementById("success_sound"); 
            x.play();
            let items_ingresos = {
            n_orden : detalles.codigo,
            paciente: detalles.paciente,
            optica: detalles.optica,
            sucursal : detalles.sucursal,
            observacion : "",
            }
            items_accion.push(items_ingresos);
            show_items();       
            $("#reg_accion_act").val("");
            $('#reg_accion_act').focus();  
          }          
        }else{
            var z = document.getElementById("error_sound"); 
            z.play();
            alerts_productos("error","Orden No existe");
            input_focus_clear_t();
        }
      }else{//fin !exist
        Swal.fire({
          title: 'Esta orden ha sido enviada anteriormente!',
          text: "DESEA REENVIAR?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Renviar!'
        }).then((result) => {
        if (result.isConfirmed) {            
          Swal.fire({
            title: 'MOTIVO REEENVIO',
            width: 685,
            html: `<textarea id="motivo" class="swal2-input" placeholder="Motivo" rows="2"></textarea>`,
            confirmButtonText: 'Confirmar',
            focusConfirm: false,
              preConfirm: () => {    
              let motivo = Swal.getPopup().querySelector('#motivo').value

              if (!motivo) {
                Swal.showValidationMessage(`Debe justificar accion`)
              }   
            }
            }).then((result) => {
              var x = document.getElementById("success_sound"); 
              let mot = document.getElementById("motivo").value;
              
              x.play();
              let items_ingresos = {
              n_orden : detalles.codigo,
              paciente: detalles.paciente,
              optica: detalles.optica,
              sucursal : detalles.sucursal,
              observacion : mot
              }
              items_accion.push(items_ingresos);
              show_items();       
              $("#reg_accion_act").val("");
              $('#reg_accion_act').focus(); 
              })          
            }//fin result
          })
      }//else exist
    }//Fin succes
    });//Fin Ajax
}


function registrarAccionesOrdenes(){

   console.log(`Este es el usuario`)
  
  let cant_items = items_accion.length;
  let tipo_accion = document.getElementById("tipo_accion_act").value;
  
  if (cant_items<1) {
    alerts_productos("warning", "Sin ordenes en la lista");
    $('#reg_accion_act').focus(); return false;
  }
  let id_usuario = $("#id_usuario").val();
  console.log(`Este es el usuario ${id_usuario}`)
  $.ajax({
  url:"../ajax/acciones_orden.php?op=registrar_acciones_ordenes",
  method: "POST",
  data: {'arrayItemsAccion':JSON.stringify(items_accion),'id_usuario':id_usuario,'tipo_accion':tipo_accion},
  cache:  false,
  dataType: 'json',
  success:function(data){     
    items_accion = [];
    if (data.msj=="ingreso_a_tallado"){
      $("#acciones_ordenes").modal("hide");
      alerts_productos("success", "Ordenes ingresadas a tallado");
      $("#data_despachos ").DataTable().ajax.reload();
    }else if(data.msj=='despacho_de_laboratorio'){
      document.getElementById("form_actions").style.display = "block";
      document.getElementById('correlativo_act').value = data.correlativo; 
      document.getElementById('form_actions').action = 'imprimir_detalle_despacho.php';
      //alert_general("Despacho No."+ data.correlativo +" registrado exitosamente",cant_items  + " Ordenes despachadas de laboratorio","success")      
      Swal.fire({
        title: 'Despacho No.<strong>'+ data.correlativo +'</strong>',
        icon: 'success',
        html: 'Registrado exitosamente, '+ cant_items  + ' Ordenes despachadas de laboratorio',
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: true,
        confirmButtonText:'<i class="fa fa-print"></i> Imprimir!',
      }).then((result) => {
        if (result.isConfirmed) {
          imprimir_despacho_pdf(data.correlativo)
        }
      })
      $("#data_despachos").DataTable().ajax.reload();
    }
  }  
 });//Fin Ajax
}

function imprimir_despacho_pdf(correlativo){
  let form = document.createElement("form");
  form.target = "_blank";
  form.method = "POST";
  form.action = "imprimir_detalle_despacho.php";
  form.id = 'imp_det_ord';
  
  let input = document.createElement("input");
  input.type = "hidden";
  input.name = "correlativo_act";
  input.value = correlativo;
  form.appendChild(input);
  document.body.appendChild(form);
  const formulario = document.getElementById("imp_det_ord");
  formulario.submit();
  document.body.removeChild(form);
}

function show_items(){

  $("#items_orden_tallado_ingresos").html('');
  
  let filas = "";
  let length_array = parseInt(items_accion.length)-1;
  for(let i=length_array;i>=0;i--){

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