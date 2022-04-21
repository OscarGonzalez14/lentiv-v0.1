var Toast = Swal.mixin({
  toast: true,
  position: 'top-center',
  showConfirmButton: false,
  timer: 2000
});

function init() {
  console.log('HHHHHHsss')
}
/*****************************************************************
**************************** CALCULO PRECIOS ORDENES *************
******************************************************************/
function verTipoLente(id){

  let chk_vs = document.getElementsByClassName('input-vs');
  let chk_bf = document.getElementsByClassName('input-bf');
  let chk_mf = document.getElementsByClassName('input-mf');   
  let val_check = document.getElementById(id).value;

  if (val_check=="Visión Sencilla"){
    document.getElementById("disenos_vs").style.display = "block";
    document.getElementById("bifocales").style.display = "none";
    document.getElementById("multifocales").style.display = "none";

    for(j=0;j<chk_bf.length;j++){
      let id_check = chk_bf[j].id;
      document.getElementById(id_check).checked = false;
      document.getElementById(id_check).disabled = false;
    }

    for(i=0;i<chk_mf.length;i++){
      let id_check = chk_mf[i].id;
      document.getElementById(id_check).checked = false;
      document.getElementById(id_check).disabled = false;
    }

    let check_box = document.getElementsByClassName("items_tratamientos");
    for(k=0;k<check_box.length;k++){
      let id_check = check_box[k].id;
      document.getElementById(id_check).disabled = false;
      document.getElementById(id_check).checked = false;
    }

  }else if(val_check=="Bifocal"){
    document.getElementById("cat_orden").value = "Proceso";
    document.getElementById("disenos_vs").style.display = "none";
    document.getElementById("bifocales").style.display = "block";
    document.getElementById("multifocales").style.display = "none";    

    for(j=0;j<chk_vs.length;j++){
      let id_check = chk_vs[j].id;
      document.getElementById(id_check).checked = false;
      document.getElementById(id_check).disabled = false;
    }

    for(i=0;i<chk_mf.length;i++){
      let id_check = chk_mf[i].id;
      document.getElementById(id_check).checked = false;
      document.getElementById(id_check).disabled = false;
    }

    let check_box = document.getElementsByClassName("items_tratamientos");
    for(k=0;k<check_box.length;k++){
      let id_check = check_box[k].id;
      document.getElementById(id_check).disabled = false;
      document.getElementById(id_check).checked = false;
    }
    document.getElementById("arblueuv").checked = false;
    document.getElementById("arblueuv").disabled = true;

    document.getElementById("transition").checked = false;
    document.getElementById("transition").disabled = true;

  }else if(val_check == "Multifocal"){
    document.getElementById("cat_orden").value = "Proceso";
    document.getElementById("disenos_vs").style.display = "none";
    document.getElementById("bifocales").style.display = "none";
    document.getElementById("multifocales").style.display = "block";

    document.getElementById("arblueuv").disabled = true;
    document.getElementById("arblueuv").checked = false;

    for(j=0;j<chk_bf.length;j++){
      let id_check = chk_bf[j].id;
      document.getElementById(id_check).checked = false;
      document.getElementById(id_check).disabled = false;
    }

    for(i=0;i<chk_vs.length;i++){
      let id_check = chk_vs[i].id;
      document.getElementById(id_check).checked = false;
      document.getElementById(id_check).disabled = false;
    }

    let check_box = document.getElementsByClassName("items_tratamientos");
    for(k=0;k<check_box.length;k++){
      let id_check = check_box[k].id;
      document.getElementById(id_check).disabled = false;
      document.getElementById(id_check).checked = false;
    }
    operacionesMultifocal();
  }

  $("#p_venta_trat").val(0);
    setPrecioVenta();  
}

//////////////////// CALCULA PRECIOS MULTIFOCALES POR CLASE //////////

document.querySelectorAll(".input-mf").forEach(i => i.addEventListener("click", e => {
  operacionesMultifocal();
}));


////////// SELECCIONAR DISENOS VISION SENCILLA ////////////////////
function selectDisenoVs(id){
  let val_diseno = document.getElementById(id).value;
  let items_tratamientos = document.getElementsByClassName('items_tratamientos');
  console.log(val_diseno)
  if(val_diseno != "TERMINADO AR BLUE UV"){
    document.getElementById("arblueuv").disabled = true;
    document.getElementById("arblueuv").checked = false;
    document.getElementById("arblack").disabled = false;
    document.getElementById("arblack").checked = false;
    document.getElementById("cat_orden").value = "Proceso";
  }else if(val_diseno == "TERMINADO AR BLUE UV"){
    document.getElementById("arblueuv").disabled = false;
    document.getElementById("arblueuv").checked = true;
    document.getElementById("arblack").disabled = true;
    document.getElementById("blanco").disabled = true;
    document.getElementById("arblack").checked = false;
    document.getElementById("fotochroma").checked = false;
    document.getElementById("transition").checked = false;
    validaRxValores();
  }
  if(val_diseno == "VS AURORA" || val_diseno=='Aurora alto indice 1.67' ||val_diseno=='Aurora alto indice 1.67'){
    document.getElementById("blanco").checked = false; 
    for(j=0;j<items_tratamientos.length;j++){
      let id_check = items_tratamientos[j].id;
      document.getElementById(id_check).checked = false;
      document.getElementById(id_check).disabled = false;
    }//operacionesVsAurora();
  }//.V/S AURORA"arblueuv").checked = false;
  if(val_diseno == 'Aurora alto indice 1.67' || val_diseno == 'Aurora serena ocupacional'){

    document.getElementById("arblueuv").checked = true;
    document.getElementById("blanco").checked = true;
    document.getElementById("blanco").disabled = true;

    document.getElementById("fotochroma").checked = false;
    document.getElementById("fotochroma").disabled = true;
    document.getElementById("transition").checked = false;
    document.getElementById("transition").disabled = true;

    $("#p_venta_trat").val(56.50);
    setPrecioVenta();
  }
}

////////////////////  SELECCIONAR DISENOS VS (Se dispara al editar campos de vs)   ///////////////
$(document).on('click', '.esf_cil', function(){ 
  document.getElementById("disvs1").checked = false;
});

function validaRxValores(){

    let esfera_od = $("#odesferasf_orden").val()
    let cilindro_od = $("#odcilindrosf_orden").val();
    let esfera_oi = $("#oiesferasf_orden").val();
    let cilindro_oi = $("#oicolindrosf_orden").val();

    if (((esfera_od >2 || esfera_od < -4) || (cilindro_od > 0 || cilindro_od < -3)) || ((esfera_oi >2 || esfera_oi < -4) || (cilindro_oi > 0 || cilindro_oi < -3)) ){
      document.getElementById("disvs1").checked = false;
      Swal.fire({
      title: '<strong>Rangos en Rx no disponible para diseño terminado</u></strong>',
      icon: 'warning',
      html:
        '<b>Solo se permiten los siguentes rangos</b>,<br>' +
        '<span>Esf. +2.00 a -4.00 y Cil. 0.00 a -3.00</span>',
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false
      });

      let checks = document.getElementsByClassName("cheks");
      for(j=0;j<checks.length;j++){
      let id_check = checks[j].id;
      document.getElementById(id_check).checked = false;
      document.getElementById(id_check).disabled= false;
    } 
    $("#p_venta_trat").val(0);
    setPrecioVenta();
      return false;
    }else if(esfera_od == '' || cilindro_od == '' || esfera_oi == '' || cilindro_oi == ''){
    Swal.fire({
      title: 'Existen campos vacios de cilindros o esferas',
      text: "",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Ok'
      }).then((result) => {
      if (result.isConfirmed){
         operacionesArBlueUv();
         document.getElementById("cat_orden").value = "Terminado";
      }
    });
    }else{
      operacionesArBlueUv();
      document.getElementById("cat_orden").value = "Terminado";
    } 
}

function operacionesArBlueUv(){
   
    document.getElementById("arblueuv").disabled= false;
    document.getElementById("arblueuv").checked = false;
    document.getElementById("arblack").disabled= false;
    document.getElementById("arblack").checked = false;
    document.getElementById("arblueuv").checked = true;
    document.getElementById("blanco").checked = true;
    document.getElementById("arblack").disabled= true;
    document.getElementById("fotochroma").disabled= true;
    document.getElementById("transition").disabled= true;

    document.getElementById("p_venta_trat").value = 16.95;
    setPrecioVenta();
}


function getSelectItemThat(id) {
    console.log(id);
    contador=0;
    let tratamientos = document.getElementsByClassName('items_tratamientos');

    for(i=0;i<tratamientos.length;i++){
      let id_element = tratamientos[i].id;
      let checkbox = document.getElementById(id_element);
      let check_state = checkbox.checked;
      if (check_state) {
           contador++;
           checkbox_selected = id_element;
      }      
    }
    if(contador>0){
      for(i=0;i<tratamientos.length;i++){
        let id_element = tratamientos[i].id;
        document.getElementById(id_element).checked = false;  
      }
    
    document.getElementById(id).checked = true;
  }else{
    document.getElementById("p_venta_trat").value = 0;
    setPrecioVenta();
  }
      
    getTrats(id)
}


function getTrats(id){

  let marcaVs = $("input[type='radio'][name='checksvs']:checked").val(); 
  let tratamiento = $("input[type='checkbox'][name='chk_tratamientos']:checked").val();
  if(marcaVs==undefined){
    Toast.fire({icon: 'warning',title: 'Marca lente no seleccionada.'});
    document.getElementById(id).checked = false;
    return false;    
  } 
  console.log(marcaVs)
  if (marcaVs=='VS AURORA') {
    operacionesVsAurora();
  }else if(marcaVs=='Alena' || marcaVs=='Aurora'  || marcaVs=='A CLEAR'  || marcaVs=='GEMINI'){
    operacionesMultifocal();
  }else if(marcaVs=='BIFOCAL 1.56' || marcaVs=='Invisible Blue UV'){
   operacionesBifocal();
  }
}

function operacionesVsAurora(){

  let tratamiento = $("input[type='checkbox'][name='chk_tratamientos']:checked").val();

  switch(tratamiento){
    case "Blanco":
        document.getElementById("p_venta_trat").value = 23;
        setPrecioVenta();
      break;    
    case "FOTOCHROMA":
        document.getElementById("p_venta_trat").value = 39.50;
        setPrecioVenta();
      break;

    case "TRANSITION":
        document.getElementById("p_venta_trat").value = 67.50;
        setPrecioVenta();
      break;  
  }//Fin switch
    
}

function operacionesBifocal(){
  let marcaVs = $("input[type='radio'][name='checksvs']:checked").val(); 
  let tratamiento = $("input[type='checkbox'][name='chk_tratamientos']:checked").val();
  console.log(marcaVs+"*"+tratamiento)
  if (marcaVs=="BIFOCAL 1.56") {
      switch(tratamiento){
         case "Blanco":
        document.getElementById("p_venta_trat").value = 18;
        setPrecioVenta();
        break;

        case "FOTOCHROMA":
        document.getElementById("p_venta_trat").value = 42;
        setPrecioVenta();
        break;
      }
  }else if(marcaVs=="Invisible Blue UV"){
    switch(tratamiento){
         case "Blanco":
        document.getElementById("p_venta_trat").value = 42;
        setPrecioVenta();
        break;

        case "FOTOCHROMA":
        document.getElementById("p_venta_trat").value = 55;
        setPrecioVenta();
        break;
      }

  }
}

function operacionesMultifocal(){
  let marcaVs = $("input[type='radio'][name='checksvs']:checked").val(); 
  let tratamiento = $("input[type='checkbox'][name='chk_tratamientos']:checked").val();
  console.log()
  if(marcaVs==='Alena'){
    switch(tratamiento){
      case "Blanco":
        document.getElementById("p_venta_trat").value = 85.50;
        setPrecioVenta();
        break;

      case "FOTOCHROMA":
        document.getElementById("p_venta_trat").value = 91.50;
        setPrecioVenta();
        break;

      case "TRANSITION":
        document.getElementById("p_venta_trat").value = 122.50;
        setPrecioVenta();
        break; 
    }
  }else if(marcaVs==='Aurora'){
    switch(tratamiento){
      case "Blanco":
        document.getElementById("p_venta_trat").value = 65.75;
        setPrecioVenta();
        break;

      case "FOTOCHROMA":
        document.getElementById("p_venta_trat").value = 78.50;
        setPrecioVenta();
        break;

      case "TRANSITION":
        document.getElementById("p_venta_trat").value = 110.00;
        setPrecioVenta();
        break; 
    }
  }else if(marcaVs==='A CLEAR'){
    switch(tratamiento){
      case "Blanco":
        document.getElementById("p_venta_trat").value = 44.75;
        setPrecioVenta();
        break;

      case "FOTOCHROMA":
        document.getElementById("p_venta_trat").value = 66.00;
        setPrecioVenta();
        break;

      case "TRANSITION":
        document.getElementById("p_venta_trat").value = 98.50;
        setPrecioVenta();
        break; 
    }
  }else if(marcaVs==='GEMINI'){
    switch(tratamiento){
      case "Blanco":
        document.getElementById("p_venta_trat").value = 32.50;
        setPrecioVenta();
        break;

      case "FOTOCHROMA":
        document.getElementById("p_venta_trat").value = 49.50;
        setPrecioVenta();
        break;

      case "TRANSITION":
        document.getElementById("p_venta_trat").value = 92.50;
        setPrecioVenta();
        break; 
    }
  }
  
    
}
  
var precioAr = 0;
function setPrecioVenta(){

  let precio_venta = $("#p_venta_trat").val();
  precio_venta = parseFloat(precio_venta);
  let checkbox = document.getElementById('arblack');
  let check_state = checkbox.checked; 
  check_state ? precioAr = 33.90 : precioAr = 0;
  precioAr = parseFloat(precioAr);
  precio_venta = parseFloat(precio_venta.toFixed(2))+parseFloat(precioAr.toFixed(2));
  document.getElementById('p_venta_final').value = precio_venta.toFixed(2);

}

function calculaPrecioAr(){ 
  
  let marcaVs = $("input[type='radio'][name='checksvs']:checked").val();
  if(marcaVs==undefined){
    Toast.fire({icon: 'warning',title: 'Marca lente no seleccionada.'});
    document.getElementById("arblack").checked = false;
    return false;
  } 
    
  console.log(marcaVs)
  setPrecioVenta();
}

init()