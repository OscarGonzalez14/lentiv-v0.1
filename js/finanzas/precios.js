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

    document.getElementById("p_venta_trat").value = 16.95;
    setPrecioVenta();
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

document.querySelectorAll(".items_tratamientos").forEach(i => i.addEventListener("click", e => {
	let tratamientos = document.getElementsByClassName('items_tratamientos');
	//let tratamiento = $("input[type='checkbox'][name='chk_tratamientos']:checked").id;
	//console.log(tratamiento);
	contador = 0;
	checkbox_selected ='';
	for(i=0;i<tratamientos.length;i++){
        let id_element = tratamientos[i].id;
        let checkbox = document.getElementById(id_element);
        let check_state = checkbox.checked;
        if (check_state) {
           contador++;
           checkbox_selected = id_element;
        }      
	}

	if (contador==0) {
		for(i=0;i<tratamientos.length;i++){
			let id_element = tratamientos[i].id;
			document.getElementById(id_element).checked = false;	
		}
	$("#p_venta_trat").val(0);
	setPrecioVenta();
	}else if(contador==1){
		document.getElementById(checkbox_selected).checked = true;
	    setPrecioVenta();
	}else if(contador>1){
		for(i=0;i<tratamientos.length;i++){
			let id_element = tratamientos[i].id;
			document.getElementById(id_element).checked = false;	
		}
	operacionesVsAurora()
	}
    console.log(contador)
	precio_venta = 0;
	let marcaVs = $("input[type='radio'][name='checksvs']:checked").val();
	if(marcaVs==undefined){Toast.fire({icon: 'warning',title: 'Marca lente no seleccionada.'})}
	if (marcaVs=='VS AURORA') {
		operacionesVsAurora();
	}
}));

var precioAr = 0;
function setPrecioVenta(){
  let precio_venta = $("#p_venta_trat").val();
  precio_venta = parseFloat(precio_venta);
  let checkbox = document.getElementById('arblack');
  let check_state = checkbox.checked; 
  check_state ? precioAr = 33.90 : precioAr = 0;
  precioAr = parseFloat(precioAr);
  precio_venta = parseFloat(precio_venta.toFixed(2))+parseFloat(precioAr.toFixed(2));
  document.getElementById('p_venta_final').innerHTML=precio_venta;

}


function calculaPrecioAr(){	
	setPrecioVenta();
}

init()