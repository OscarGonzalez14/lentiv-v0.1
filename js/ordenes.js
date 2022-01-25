function init(){
 listar_ordenes();
}

function alerts(icono, titulo){
  Swal.fire({
    position: 'top-center',
    icon: icono,
    title: titulo,
    showConfirmButton: true,
    timer: 1500
  });
}


function ocultar_btn_print_rec_ini(){
  //document.getElementById("btn_print_recibos").style.display = "none";
}

/////////////// SELECCIONAR SUCURSAL //////////
$(document).ready(function(){
  $("#optica_orden").change(function () {         
    $("#optica_orden option:selected").each(function () {
     let optica = $(this).val();
     $.post('../ajax/ordenes.php?op=sucursales_optica',{optica:optica}, function(data){
      $("#optica_sucursal").html(data);
    });            
   });
  })
});

/////////validar ingreso de adicion////////////
function valida_adicion(){
  let vs_check = $("#lentevs").is(":checked");
  if(vs_check == true){
    document.getElementById('oddicionf_orden').readOnly = true;
    document.getElementById('oiadicionf_orden').readOnly = true;
    document.getElementById('oddicionf_orden').value = "";
    document.getElementById('oiadicionf_orden').value = "";
  }else{
    document.getElementById('oddicionf_orden').readOnly = false;
    document.getElementById('oiadicionf_orden').readOnly = false;
  }

  let lentebf_chk = $("#lentebf").is(":checked");

  if (lentebf_chk==true) {
    document.getElementById('ap_od').readOnly = true;
    document.getElementById('ap_oi').readOnly = true;
  }else{
    document.getElementById('ap_od').readOnly = false;
    document.getElementById('ap_oi').readOnly = false;
  }

  let lentemulti_chk = $("#lentemulti").is(":checked");

  if (lentemulti_chk==true) {
    document.getElementById('ao_od').readOnly = true;
    document.getElementById('ao_oi').readOnly = true;
  }else{
    document.getElementById('ao_od').readOnly = false;
    document.getElementById('ao_oi').readOnly = false;
  }
}

function status_checks_tratamientos(identificador){

  let checkbox = document.getElementById(identificador);
  let check_state = checkbox.checked;
  //console.log(identificador+' * '+ check_state)
  
  if (check_state==true && identificador=='photocromphoto') {
    $("#transitionphoto").attr("disabled", true);    
    $("#blanco").attr("disabled", true);  
  }else if(check_state==false && identificador=='photocromphoto'){    
    $("#transitionphoto").removeAttr("disabled");
    $("#blanco").removeAttr("disabled");
  }

  if(check_state==true && identificador=='transitionphoto') {
    $("#photocromphoto").attr("disabled", true);    
    $("#blanco").attr("disabled", true);  
  }else if(check_state==false && identificador=='transitionphoto'){    
    $("#photocromphoto").removeAttr("disabled");
    $("#blanco").removeAttr("disabled");
  }

  if(check_state==true && identificador=='blanco') {
    $("#transitionphoto").attr("disabled", true);    
    $("#photocromphoto").attr("disabled", true);  
  }else if(check_state==false && identificador=='blanco'){    
    $("#transitionphoto").removeAttr("disabled");
    $("#photocromphoto").removeAttr("disabled");
  }

}

//////////EJECUTAR ORDEN GUARDAR SPACE KEY ////
function space_guardar_orden(event){
  tecla = event.keyCode; 
  if(tecla==13)
  {
   create_barcode_interno();
 }
}

function create_barcode(){  

  let codigo = $('#codigoOrden').val();

  $.ajax({
    url:"../ajax/ordenes.php?op=crear_barcode",
    method:"POST",
    data:{codigo:codigo},
    cache: false,
    dataType:"json",
    error:function(data){
      setTimeout("guardar_orden();",1500);  
    },
    success:function(data){
      console.log(data)
    }
  });///fin ajax
}

//window.onkeydown= space_guardar_orden;
/***********************************************************
/////////////////////  GUARDAR ORDEN ///////////////////////
/***********************************************************/
function saveOrder(){
 document.getElementById('print_etiqueta').style.display="none";
 $("#contenedor").modal("show");
 $('#contenedor').on('shown.bs.modal', function() {
  $('#contenedor_orden').focus();
});
} 
var tratamientos = [];
$(document).on('click', '.items_tratamientos', function(){    
    let id_chk = $(this).attr("id");
    let value = $(this).attr("value");
    let checkbox = document.getElementById(id_chk);
    let check_state = checkbox.checked; 
    
    if (check_state) {
      tratamientos.push(value);
    }else{
     let indice = tratamientos.indexOf(value);
     if (indice > -1) {tratamientos.splice(indice,1)}
    }
    

});


function guardar_orden(){

  let contenedor = $("#contenedor_orden").val();
  if(contenedor==""){
    alerts("error","La orden debe ser asignada a un contenedor");
    return false;
  }

  let paciente = $("#paciente_orden").val();
  let observaciones = $("#observaciones_orden").val();
  let usuario = $("#id_usuario").val();
  let id_sucursal = $("#optica_sucursal").val();
  let id_optica = $("#optica_orden").val();
  let tipo_orden = "Laboratorio";
  let lentevs = $("#lentevs").val();
  let lentebf = $("#lentebf").val();
  let lentemulti = $("#lentemulti").val();
  // rx_orden
  let odesferasf_orden = $("#odesferasf_orden").val();
  let odcilindrosf_orden = $("#odcilindrosf_orden").val();
  let odejesf_orden = $("#odejesf_orden").val();
  let oddicionf_orden = $("#oddicionf_orden").val();
  let odprismaf_orden = $("#odprismaf_orden").val();
  let oiesferasf_orden = $("#oiesferasf_orden").val();
  let oicilindrosf_orden = $("#oicolindrosf_orden").val();
  let oiejesf_orden = $("#oiejesf_orden").val();
  let oiadicionf_orden = $("#oiadicionf_orden").val();
  let oiprismaf_orden = $("#oiprismaf_orden").val();
  // aros  
  let modelo = $("#modelo_aro_orden").val();
  let marca = $("#marca_aro_orden").val();
  let color = $("#color_aro_orden").val();
  let diseno = $("#diseno_aro_orden").val();
  let horizontal = $("#med_a").val();
  let diagonal = $("#med_b").val();
  let vertical = $("#med_c").val();
  let puente = $("#med_d").val();
  // alturas orden 
  let od_dist_pupilar = $("#dip_od").val();
  let od_altura_pupilar = $("#ap_od").val();
  let od_altura_oblea = $("#ao_od").val();
  let oi_dist_pupilar = $("#dip_oi").val();
  let oi_altura_pupilar = $("#ap_oi").val();
  let oi_altura_oblea = $("#ao_oi").val();
  let tipo_lente = $("input[type='radio'][name='tipo_lente']:checked").val();  
  if (tipo_lente==undefined || tipo_lente==null) {
    alerts('error','Debe seleccionar Lente');return false;
  }
  let trat_multifocal = '';
  let trat_mult = $("input[type='radio'][name='tratamiento_multifocal']:checked").val();

  if(trat_mult!=undefined || trat_mult!=null){

    trat_multifocal = trat_mult;
  }else{
    trat_multifocal = '';
  }

  $.ajax({
    url:"../ajax/ordenes.php?op=registrar_orden",
    method:"POST",
    data:{'arrayTratamientos':JSON.stringify(tratamientos),'paciente':paciente,'observaciones':observaciones,'usuario':usuario,'id_sucursal':id_sucursal,
    'id_optica':id_optica,'tipo_orden':tipo_orden,'tipo_lente':tipo_lente,
    'odesferasf_orden':odesferasf_orden,'odcilindrosf_orden':odcilindrosf_orden,'odejesf_orden':odejesf_orden,'oddicionf_orden':oddicionf_orden,
    'odprismaf_orden':odprismaf_orden,'oiesferasf_orden':oiesferasf_orden,'oicilindrosf_orden':oicilindrosf_orden,'oiejesf_orden':oiejesf_orden,
    'oiadicionf_orden':oiadicionf_orden,'oiprismaf_orden':oiprismaf_orden,
    'modelo':modelo,'marca':marca,'color':color,'diseno':diseno,'horizontal':horizontal,'diagonal':diagonal,'vertical':vertical,'puente':puente,
    'od_dist_pupilar':od_dist_pupilar,'od_altura_pupilar':od_altura_pupilar,'od_altura_oblea':od_altura_oblea,'oi_dist_pupilar':oi_dist_pupilar,
    'oi_altura_pupilar':oi_altura_pupilar,'oi_altura_oblea':oi_altura_oblea,'trat_multifocal':trat_multifocal,'contenedor':contenedor},
    cache: false,
    dataType:"json",
    error:function(x,y,z){
      console.log(x);
      console.log(y);
      console.log(z);
    },

    success:function(data){
      console.log("Codigoo"+data);
      if (data !='error') {
       let codigo = data;
       Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: 'Orden creada exitosamente',
        showConfirmButton: true,
        timer: 2500
      });
      //////  GENERAR CODIGO DE BARRAS ///////
      document.getElementById('print_etiqueta').style.display="block";
      document.getElementById('reg_orden').style.display="none";
      $("#datatable_ordenes").DataTable().ajax.reload();
      $("#numero_etiqueta").val(data);   

    }else{
      Swal.fire({
        position: 'top-center',
        icon: 'error',
        title: 'Orden ya ha sido digitada',
        showConfirmButton: true,
        timer: 2500
      })
    }     
  }
  });//////FIN AJAX

}

function validar_est_orden(){
  alerts("error", "La orden debe ser recibida")
}

function printEtiqueta(){
  let n_etiqueta = $("#numero_etiqueta").val();
  let paciente = $("#paciente_orden").val();
  let id_sucursal = $("#optica_sucursal").val();
  let id_optica = $("#optica_orden").val();
  $("#contenedor").modal('hide');
  $("#nueva_orden_lab").modal('hide');
  generate_barcode_print(n_etiqueta,paciente,id_sucursal,id_optica)
}


function generate_barcode_print(codigo,paciente,id_sucursal,id_optica){

  var form = document.createElement("form");
  form.target = "print_popup";
  form.method = "POST";
  form.action = "barcode_orden_print.php";
  
  var input = document.createElement("input");
  input.type = "hidden";
  input.name = "paciente";
  input.value = paciente;
  form.appendChild(input);

  var input = document.createElement("input");
  input.type = "hidden";
  input.name = "codigo";
  input.value = codigo;
  form.appendChild(input);

  var input = document.createElement("input");
  input.type = "hidden";
  input.name = "id_optica";
  input.value = id_optica;
  form.appendChild(input);

  var input = document.createElement("input");
  input.type = "hidden";
  input.name = "id_sucursal";
  input.value = id_sucursal;
  form.appendChild(input);

  let alto = (parseInt(window.innerHeight) / 4);
  let ancho = (parseInt(window.innerWidth) / 4);
  let x = parseInt((screen.width - ancho) / 2);
  let y = parseInt((screen.height - alto) / 2);

    document.body.appendChild(form);//"width=600,height=500"
    window.open("about:blank","print_popup",`
      width=${ancho}
      height=${alto}
      top=${y}
      left=${x}`);
    form.submit();
    document.body.removeChild(form);

  }



  function listar_ordenes(){
    $("#datatable_ordenes").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      dom: 'frti',
      //"buttons": [ "excel"],
      "searching": true,
      "ajax":
      {
        url: '../ajax/ordenes.php?op=get_ordenes',
        type : "post",
        dataType : "json",        
        error: function(e){
          console.log(e.responseText);  
        }
      },
      "language": {
        "sSearch": "Buscar:"
      }
    }).buttons().container().appendTo('#datatable_ordenes_wrapper .col-md-6:eq(0)');

  }
///////////////LIMPIAR CAMPOS NUEVA ORDEN LAB//////////
$(document).on('click', '#new_order', function(){
    tratamientos = [];
    document.getElementById("reg_orden").style.display = "block";
    let element = document.getElementsByClassName("clear_orden_i");
    for(i=0;i<element.length;i++){
      let id_element = element[i].id;
      document.getElementById(id_element).value = "";
   }

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
/////////////////////////////UNCHECKED RADIO //////////
  let check_box = document.getElementsByClassName("checkit");
   for(j=0;j<check_box.length;j++){
    let id_check = check_box[j].id;
    document.getElementById(id_check).checked = false;
  }

});

////////////////ocultar input OTROS TRATAMIENTOS
$(document).on('click', '.new_order_class', function(){
  document.getElementById("otros_trat").style.display = "none";
});

function chk_otros_tratamientos(){
 var isChecked = document.getElementById('chk_trat').checked;
 if (isChecked) {
  document.getElementById("otros_trat").style.display = "block";
  document.getElementById("tratamientos_section").style.display = "none";
}else{
  document.getElementById("otros_trat").style.display = "none";
  document.getElementById("tratamientos_section").style.display = "flex";
}
}

$(document).on('click', '.ident', function(){
  let id_item = $(this).attr("id");
  alert(id_item)
});
var det_orden = []
function get_dets_orden(){
  let cod_orden_act = $("#cod_orden_current").val();
    /////////GET DATA ORDEN /////////////
    $.ajax({
      url:"../ajax/ordenes.php?op=get_data_oden",
      method:"POST",
      data : {cod_orden_act:cod_orden_act},
      cache:false,
      dataType:"json",
      success:function(data){
        if(data != 'error'){
        $("#cod_det_orden_descargo").html(data.codigo);
        $("#pac_orden_desc").html(data.paciente);
        $("#optica_orden_suc").html(data.optica);
        $("#sucursal_optica_orden").html(data.sucursal);
        $("#tipo_lente_ord").html(data.tipo_lente);
        $("#trat_multi_orden").html(data.trat_orden);
        $("#obs_orden").val(data.observaciones);
        $("#id_optica_desc").val(data.id_optica);
        $("#id_sucursal_desc").val(data.id_sucursal);

        document.getElementById("cod_orden_current").readOnly = true
        $('#cod_lente_inv').val("");
        $('#cod_lente_inv').focus();

      }else{
        alerts_productos("error","Orden no existe!!"); 
        $('#cod_orden_current').val("");       
        $('#cod_orden_current').focus();
        var z = document.getElementById("error_sound_desc"); 
        z.play();
        return false;
      }
      }
    });
/*============   editar capos de descargo   ===========*/
$(document).on('click', '.edit_field_desc', function(){    
    let id_campo = $(this).attr("name"); 
    document.getElementById(id_campo).readOnly = false;   
});
/////////////////  GET DATA RX FINAL  ////////////////

  $.ajax({
    url:"../ajax/ordenes.php?op=get_rxfinal_orden",
    method:"POST",
    data : {cod_orden_act:cod_orden_act},
    cache:false,
    dataType:"json",
    success:function(data){
     console.log(data);
     $("#esf_od").html(data.odesferas);
     $("#cil_od").html(data.odcindros);
     $("#eje_od").html(data.odeje);
     $("#adi_od").html(data.odadicion);
     $("#pri_od").html(data.odprisma);

     $("#esf_oi").html(data.oiesferas);
     $("#cil_oi").html(data.oicindros);
     $("#eje_oi").html(data.oieje);
     $("#adi_oi").html(data.oiadicion);
     $("#pri_oi").html(data.oiprisma);
   }
 });

  /////////// GET DATA ALTURA PUPILAR /////
  $.ajax({
    url:"../ajax/ordenes.php?op=get_altdist_oden",
    method:"POST",
    data : {cod_orden_act:cod_orden_act},
    cache:false,
    dataType:"json",
    success:function(data){
     $("#od_dip").html(data.od_dist_pupilar);
     $("#od_ap").html(data.od_altura_pupilar);
     $("#od_ao").html(data.od_altura_oblea);
     $("#oi_dip").html(data.oi_dist_pupilar);
     $("#oi_ap").html(data.oi_altura_pupilar);
     $("#oi_ao").html(data.oi_altura_oblea);

   }
 });
  /////////////////////  GET DATA AROS ORDEN ////
  $.ajax({
    url:"../ajax/ordenes.php?op=get_aros_orden",
    method:"POST",
    data : {cod_orden_act:cod_orden_act},
    cache:false,
    dataType:"json",
    success:function(data){
      $("#mod_aro_orden").html(data.modelo);
      $("#marca_aro_orden").html(data.marca);
      $("#color_aro_orden").html(data.color);
      $("#dis_aro_orden").html(data.diseno);
      $("#hor_aro_orden").html(data.horizontal);
      $("#diagonal_aro_orden").html(data.diagonal);
      $("#vertical_aro_orden").html(data.vertical);
      $("#puente_aro_orden").html(data.puente);

    }
  });
  
}
var history_order = [];
function detOrdenes(cod_orden_act){
  console.log('Funciona');
  $("#detalle_orden").modal('show');
  $.ajax({
    url:"../ajax/ordenes.php?op=get_data_oden",
    method:"POST",
    data : {cod_orden_act:cod_orden_act},
    cache:false,
    dataType:"json",
    success:function(data){

      $("#det_cod_orden").html(data.codigo);
      $("#det_pac_orden").html(data.paciente);
      $("#det_orden_optica").html(data.optica);
      $("#suc_orden_optica").html(data.sucursal);
      $("#det_lente_ord").html(data.tipo_lente);
      $("#det_trats_lente_ord").html(data.trat_orden);
      $("#obs_orden").val(data.observaciones);
      $("#det_marca_lente_ord").html(data.trat_orden);
    }
});

  /////////////////GET DATA RX FINAL   

  $.ajax({
    url:"../ajax/ordenes.php?op=get_orden_rxfinal",
    method:"POST",
    data : {cod_orden_act:cod_orden_act},
    cache:false,
    dataType:"json",
    success:function(data){

     $("#det_esfera_od").html(data.odesferas);
     $("#det_cil_od").html(data.odcindros);
     $("#det_eje_od").html(data.odeje);
     $("#det_add_od").html(data.odadicion);
     $("#det_prisma_od").html(data.odprisma);

     $("#det_esfera_oi").html(data.oiesferas);
     $("#det_cil_oi").html(data.oicindros);
     $("#det_eje_oi").html(data.oieje);
     $("#det_add_oi").html(data.oiadicion);
     $("#det_prisma_oi").html(data.oiprisma);

   }
 });

/////////////////// GET TRATAMIENTOS ORDEN ///////
  $.ajax({
    url:"../ajax/ordenes.php?op=get_tratamientos_orden",
    method:"POST",
    data : {cod_orden_act:cod_orden_act},
    cache:false,
    dataType:"json",
    success:function(data){
      let trats = data.toString();     
      $("#det_trats_lente_ordx").html(trats);
      }
  });
/////////// GET DATA ALTURA PUPILAR /////
  $.ajax({
    url:"../ajax/ordenes.php?op=get_altdist_oden",
    method:"POST",
    data : {cod_orden_act:cod_orden_act},
    cache:false,
    dataType:"json",
    success:function(data){
     $("#det_dist_pup_od").html(data.od_dist_pupilar);
     $("#det_alt_pup_od").html(data.od_altura_pupilar);
     $("#det_alt_oblea_od").html(data.od_altura_oblea);
     $("#det_dist_pup_oi").html(data.oi_dist_pupilar);
     $("#det_alt_pup_oi").html(data.oi_altura_pupilar);
     $("#det_alt_oblea_oi").html(data.oi_altura_oblea);

   }
 });
  /////////////////////  GET DATA AROS ORDEN ////
  $.ajax({
    url:"../ajax/ordenes.php?op=get_aros_orden",
    method:"POST",
    data : {cod_orden_act:cod_orden_act},
    cache:false,
    dataType:"json",
    success:function(data){
      $("#marca_det_ord").html(data.modelo);
      $("#modelo_det_ord").html(data.marca);
      $("#color_det_ord").html(data.color);
      $("#dis_det_ord").html(data.diseno);
      $("#hor_det_ord").html(data.horizontal);
      $("#diag_det_orden").html(data.diagonal);
      $("#vert_det_ord").html(data.vertical);
      $("#puente_det_ord").html(data.puente);
    }
  });

  /* GET ACIONES DE ORDEN */

  $.ajax({
    url:"../ajax/ordenes.php?op=get_acciones_orden",
    method:"POST",
    data : {cod_orden_act:cod_orden_act},
    cache:false,
    dataType:"json",
    success:function(data){
      $("#historial_orden_detalles").html("");
      let filas = '';
      for(var i=0; i<data.length; i++){
        filas = filas + "<tr id='fila"+i+"'>"+
        "<td colspan='15' style='width:15%''>"+data[i].fecha_hora+"</td>"+
        "<td colspan='25' style='width:25%''>"+data[i].usuario+"</td>"+
        "<td colspan='35' style='width:35%''>"+data[i].accion+"</td>"+
        "<td colspan='25' style='width:25%''>"+data[i].observaciones+"</td>"+
        "</tr>";
      }
      $("#historial_orden_detalles").html(filas);    
  }
  });
  
}

/////VER DATOS DE UNA ORDEN /////
function ver_datos_orden(cod_orden_act){

  $("#nueva_orden_lab").modal('show');

  $.ajax({
    url:"../ajax/ordenes.php?op=get_datos_orden",
    method:"POST",
    data : {cod_orden_act:cod_orden_act},
    cache:false,
    dataType:"json",
    success:function(data){
      
      let lente = data.tipo_lente;
      if (lente == "Visión Sencilla"){
        document.getElementById("lentevs").checked=true;
      }else if(lente == "Bifocal"){
        document.getElementById("lentebf").checked=true;
      }else if(lente == "Multifocal"){
        document.getElementById("lentemulti").checked=true;
      }
      
  let base = data.trat_orden;
      if (base == "Alena"){
        document.getElementById("Alena").checked=true;
      }else if(base == "Aurora4D"){
        document.getElementById("Aurora 4D").checked=true;
      }else if(base == "Aurora A Claar"){
        document.getElementById("Aurora_a_clear").checked=true;
      }else if(base == "Gemini"){
        document.getElementById("Gemini").checked=true;
      }
      $("#correlativo_op").html(data.codigo);
      $("#paciente_orden").val(data.paciente);
      $("#optica_orden").val(data.id_optica);
      $("#optica_sucursal").val(data.id_sucursal);


      let items_orden = {
        codigo : data.codigo,
        paciente :data.paciente,
        id_optica: data.id_optica,
        id_sucursal: data.id_sucursal
      } 
      det_orden.push(items_orden);
    }
  });
  /////////////////GET DATA RX FINAL   

  $.ajax({
    url:"../ajax/ordenes.php?op=get_orden_rxfinal",
    method:"POST",
    data : {cod_orden_act:cod_orden_act},
    cache:false,
    dataType:"json",
    success:function(data){
     $("#odesferasf_orden").val(data.odesferas);
     $("#odcilindrosf_orden").val(data.odcindros);
     $("#odejesf_orden").val(data.odeje);
     $("#oddicionf_orden").val(data.odadicion);
     $("#odprismaf_orden").val(data.odprisma);

     $("#oiesferasf_orden").val(data.oiesferas);
     $("#oicolindrosf_orden").val(data.oicindros);
     $("#oiejesf_orden").val(data.oieje);
     $("#oiadicionf_orden").val(data.oiadicion);
     $("#oiprismaf_orden").val(data.oiprisma);

   }
 });

  /////////// GET DATA ALTURA PUPILAR /////
  $.ajax({
    url:"../ajax/ordenes.php?op=get_datos_alturas_orden",
    method:"POST",
    data : {cod_orden_act:cod_orden_act},
    cache:false,
    dataType:"json",
    success:function(data){
     $("#dip_od").val(data.od_dist_pupilar);
     $("#ap_od").val(data.od_altura_pupilar);
     $("#ao_od").val(data.od_altura_oblea);
     $("#dip_oi").val(data.oi_dist_pupilar);
     $("#ap_oi").val(data.oi_altura_pupilar);
     $("#ao_oi").val(data.oi_altura_oblea);

   }
 });
  /////////////////////  GET DATA AROS ORDEN ////
  $.ajax({
    url:"../ajax/ordenes.php?op=get_det_aros_orden",
    method:"POST",
    data : {cod_orden_act:cod_orden_act},
    cache:false,
    dataType:"json",
    success:function(data){
      $("#modelo_aro_orden").val(data.modelo);
      $("#marca_aro_orden").val(data.marca);
      $("#color_aro_orden").val(data.color);
      $("#diseno_aro_orden").val(data.diseno);
      $("#med_a").val(data.horizontal);
      $("#med_b").val(data.diagonal);
      $("#med_c").val(data.vertical);
      $("#med_d").val(data.puente);

    }
  });
  //////////////////GET DATA TRATAMIENTOS/////

}

function clearDataOrdenDesc(){
  $("#cod_orden_current").val("");
  $('#cod_orden_current').focus();

  let items_data_orden_desc = document.getElementsByClassName("data_orden_desc");
  for (var i = 0; i < items_data_orden_desc.length; i++) {
    items_data_orden_desc[i].innerHTML="";
  }
  
  $("#id_optica_desc").val("");
  $("#id_sucursal_desc").val("");
}


init();