function init() {
	console.log('HHHHHHsss')
}
/*****************************************************************
**************************** CALCULO PRECIOS ORDENES *************
******************************************************************/
function verTipoLente(id){
  let val_check = document.getElementById(id).value;
  if (val_check=="Visión Sencilla"){
    document.getElementById("disenos_vs").style.display = "block";
    document.getElementById("bifocales").style.display = "none"
    document.getElementById("multifocales").style.display = "none"
  }else if(val_check=="Bifocal"){
    document.getElementById("disenos_vs").style.display = "none";
    document.getElementById("bifocales").style.display = "block"
    document.getElementById("multifocales").style.display = "none"
  }else if(val_check=="Multifocal"){
    document.getElementById("disenos_vs").style.display = "none";
    document.getElementById("bifocales").style.display = "none"
    document.getElementById("multifocales").style.display = "block"
  }  
}

var precio_venta = 0;
var categoria_orden = '';
////////// SELECCIONAR DISENOS VISION SENCILLA ////////////////////
function selectDisenoVs(id){
  precio_venta = 0;
  let val_diseno = document.getElementById(id).value;
  let items_tratamientos = document.getElementsByClassName('items_tratamientos');
  console.log(val_diseno)
  if(val_diseno != "TERMINADO AR BLUE UV"){
    document.getElementById("arblueuv").disabled = true;
    document.getElementById("arblueuv").checked = false;
    document.getElementById("arblack").disabled = false;
    document.getElementById("arblack").checked = false;  

  }else if(val_diseno == "TERMINADO AR BLUE UV"){
    document.getElementById("arblueuv").disabled = false;
    document.getElementById("arblueuv").checked = true;
    document.getElementById("arblack").disabled = true;
    document.getElementById("arblack").checked = false;
    validaRxValores();
  }
  if(val_diseno == "VS AURORA"){
  	document.getElementById("blanco").checked = false; 
    for(j=0;j<items_tratamientos.length;j++){
      let id_check = items_tratamientos[j].id;
      document.getElementById(id_check).checked = false;
      document.getElementById(id_check).disabled = false;
    }
    //operacionesVsAurora();
  }//.V/S AURORA
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
	    }
	  });
    }else{
    	operacionesArBlueUv();
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
    precio_venta = "16.95";
    setPrecioVenta(precio_venta);
}

function operacionesVsAurora(){
	precio_venta = 0;		
    
}

document.querySelectorAll(".items_tratamientos").forEach(i => i.addEventListener("click", e => {
	let marcaVs = $("input[type='radio'][name='checksvs']:checked").val();
	if (marcaVs=='VS AURORA') {
		peracionesVsAurora()
	}
}));

function setPrecioVenta(precio_venta){
  $("#p_venta_orden").val(precio_venta);
  document.getElementById('categoria_orden').innerHTML=categoria_orden;
}

init()