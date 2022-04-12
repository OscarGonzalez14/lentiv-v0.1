<?php

require_once("../config/conexion.php");
//llamada al modelo categoria
require_once("../modelos/Ordenes.php");

$ordenes = new Ordenes();

switch ($_GET["op"]){

case 'crear_barcode':
	$datos = $ordenes->comprobar_existe_correlativo($_POST["codigo"]);
    if(is_array($datos) == true and count($datos)==0){
    	$ordenes->crea_barcode($_POST["codigo"]);
    	$variable = 'Exito';
    	echo json_encode(array("bla"=>$variable));

    }
break;

case 'sucursales_optica':

	$sucursales = $ordenes->get_sucursales_optica($_POST["optica"]);
	$options = "<option value='0'>Seleccionar sucursal...</option>";

	for($i=0; $i < sizeof($sucursales); $i++){
		$options.="<option value='".$sucursales[$i]["id_sucursal"]."'>".$sucursales[$i]["direccion"]."</option>";
	}

	echo $options;

	break;

case 'registrar_orden':

    date_default_timezone_set('America/El_Salvador'); 
    $fecha = date('m-Y');
    $date_validate = date("d-m-Y");
    $mes = date('m');
    $year = date('Y');
    $anio = substr($year, 2,5);
    $datos = $ordenes->get_correlativo_orden($fecha);
    $pac = $ordenes->comprobar_existe_ord_dig($_POST["paciente"],$_POST["id_sucursal"]);

////////OBTENEMOS EL CORRELATIVO //////
    if(is_array($datos)==true and count($datos)>0){
    foreach($datos as $row){
      $numero_orden = substr($row["codigo"],5,15)+1;
      $codigo = $mes.$anio."-".$numero_orden;
    }
    }else{
       $codigo = $mes.$anio.'-1';
    }
    if(is_array($pac)==true and count($pac)==0){
	$data_ord = $ordenes->comprobar_existe_correlativo($_POST["paciente"],$date_validate);
	if(is_array($data_ord) == true and count($data_ord)==0){		
		$ordenes->registrar_orden($codigo,$_POST['paciente'],$_POST['observaciones'],$_POST['usuario'],$_POST['id_sucursal'],$_POST["id_optica"],$_POST["tipo_orden"],$_POST["tipo_lente"],$_POST['odesferasf_orden'],$_POST['odcilindrosf_orden'],$_POST['odejesf_orden'],$_POST['oddicionf_orden'],$_POST['odprismaf_orden'],$_POST['oiesferasf_orden'],$_POST['oicilindrosf_orden'],$_POST['oiejesf_orden'],$_POST['oiadicionf_orden'],$_POST['oiprismaf_orden'],$_POST['modelo'],$_POST['marca'],$_POST['color'],$_POST['diseno'],$_POST['horizontal'],$_POST['diagonal'],$_POST['vertical'],$_POST['puente'],$_POST["od_dist_pupilar"],$_POST["od_altura_pupilar"],$_POST["od_altura_oblea"],$_POST["oi_dist_pupilar"],$_POST["oi_altura_pupilar"],$_POST["oi_altura_oblea"],$_POST["tratamiento_orden"],$_POST["contenedor"],$_POST["marca_trat"],$_POST["antirreflejante"],$_POST["categoria"],$_POST["precio"]);
	}
	}
	break;


case 'get_ordenes':
	$datos = $ordenes->get_ordenes_pendientes();
	$data = Array();
    $about = "about:blank";
    $print = "print_popup";
    $size = "width=600,height=500";

	foreach ($datos as $row) { 
	$sub_array = array();

	$estado = $row["estado"];

	if ($estado==0) {
		$status = 'Pendiente';
		$badge = 'warning';
		$icon = "fa-clock";
		$color = 'warning';
	}elseif($estado==1){
	    $status = 'Recibido';
		$badge = 'success';
		$icon = "fa-check-circle";
		$color = 'success';
	}

	if ($estado==0) {
		$func="generate_barcode_print";
	}elseif($estado==1){
		$func = "generate_barcode_print";
	}

  $sub_array[] = $row["id_orden"];
	$sub_array[] = $row["codigo"];
	$sub_array[] = $row["nombre"]." - ".$row["direccion"];
	$sub_array[] = strtoupper($row["paciente"]);
	$sub_array[] = '<span class="right badge badge-'.$color.'" style="font-size:12px"><i class=" fas '.$icon.'" style="color:'.$badge.'"></i> '.$status.'</span>';
	$sub_array[] = '<button type="button"  class="btn btn-sm bg-light" onClick="detOrdenes(\''.$row['codigo'].'\')"><i class="fa fa-eye" aria-hidden="true" style="color:blue"></i></button>';

	$sub_array[] = '<i class="fas fa-barcode" aria-hidden="true" style="color:black" onClick="'.$func.'(\''.$row["codigo"].'\',\''.$row["paciente"].'\','.$row["id_sucursal"].','.$row["id_optica"].')"></i>';
	$sub_array[] = '<button type="button" class="btn btn-xs bg-light"  onClick="ver_datos_orden(\''.$row["codigo"].'\')" data-target="#nueva_orden_lab" data-backdrop="static" data-keyboard="false"><i class="fa fa-edit" aria-hidden="true" style="color:green"></i></button>

	 <button type="button"  class="btn btn-xs bg-light"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i></button>

	 <form action="imprimir_orden_pdf.php" method="POST" target="_blank" style="display: inline-block">
	   <input type="hidden" name="codigo" value="'.$row["codigo"].'">
	 	<button class="btn btn-xs bg-light" type=submit><i class="far fa-file-pdf" aria-hidden="true" style="color:blue"></i></button>
	 </form>
	 '; 
                                                
    $data[] = $sub_array;
	}
	
	$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;


	case 'get_data_oden':
		$det_orden = $ordenes->get_data_orden($_POST["cod_orden_act"]);
		
		if (is_array($det_orden)==true and count($det_orden)>0) {
			
			foreach ($det_orden as $key) {
				$data["codigo"] = $key["codigo"];
				$data["paciente"] = $key["paciente"];
				$data["observaciones"] = $key["observaciones"];
				$data["tipo_lente"] = $key["tipo_lente"];
				$data["trat_orden"] = $key["trat_orden"];
				$data["optica"] = $key["optica"];
				$data["sucursal"] = $key["sucursal"];
				$data["id_optica"] = $key["id_optica"];
				$data["id_sucursal"] = $key["id_sucursal"];
			}

				echo json_encode($data);
			}else{
				echo json_encode("error");
			}
	break;

	case 'get_rxfinal_orden':
	$rx_orden = $ordenes->get_rxfinal_orden($_POST["cod_orden_act"]);

	if (is_array($rx_orden)==true and count($rx_orden)>0) {
			
		foreach ($rx_orden as $key) {

			$data["odesferas"] = $key["odesferas"];
			$data["odcindros"] = $key["odcindros"];
			$data["odeje"] = $key["odeje"];
			$data["odadicion"] = $key["odadicion"];
			$data["odprisma"] = $key["odprisma"];
			$data["oiesferas"] = $key["oiesferas"];
			$data["oicindros"] = $key["oicindros"];
			$data["oieje"] = $key["oieje"];
			$data["oiadicion"] = $key["oiadicion"];
			$data["oiprisma"] = $key["oiprisma"];

		}

		echo json_encode($data);
	}else{
		echo json_encode("error");
	}

	break;

	case 'get_altdist_oden':

	$dist_orden = $ordenes->get_altdist_orden($_POST["cod_orden_act"]);

	if (is_array($dist_orden)==true and count($dist_orden)>0) {
			
		foreach ($dist_orden as $key) {

			$data["od_dist_pupilar"] = $key["od_dist_pupilar"];
			$data["od_altura_pupilar"] = $key["od_altura_pupilar"];
			$data["od_altura_oblea"] = $key["od_altura_oblea"];
			$data["oi_dist_pupilar"] = $key["oi_dist_pupilar"];
			$data["oi_altura_pupilar"] = $key["oi_altura_pupilar"];
			$data["oi_altura_oblea"] = $key["oi_altura_oblea"];
	}

		echo json_encode($data);
	}else{
		echo json_encode("error");
	}

	break;

	case 'get_aros_orden':
		
	$aro = $ordenes->get_aros_orden($_POST["cod_orden_act"]);

	if (is_array($aro)==true and count($aro)>0) {			
		foreach ($aro as $key) {
			$data["modelo"] = $key["modelo"];
			$data["marca"] = $key["marca"];
			$data["color"] = $key["color"];
			$data["diseno"] = $key["diseno"];
			$data["horizontal"] = $key["horizontal"];
			$data["diagonal"] = $key["diagonal"];
		  $data["vertical"] = $key["vertical"];
			$data["puente"] = $key["puente"];
	}

		echo json_encode($data);
	}else{
		echo json_encode("error");
	}
	break;

	case 'get_tratamientos_orden':
		$tratamientos = $ordenes->get_tratamientos_orden($_POST["cod_orden_act"]);
		$trat_orden = array();
		if (is_array($tratamientos)==true and count($tratamientos)>0) {
			foreach ($tratamientos as $value) {
				array_push($trat_orden, $value['tratamiento']);
			}
		}
		echo json_encode($trat_orden);
		break;

///*****************GET DATOS ORDEN SHOW***************//
  case 'get_datos_orden':
		$det_orden = $ordenes->get_datos_orden($_POST["cod_orden_act"]);

		if (is_array($det_orden)==true and count($det_orden)>0) {
			
			foreach ($det_orden as $key) {
				$data["codigo"] = $key["codigo"];
				$data["paciente"] = $key["paciente"];
				$data["observaciones"] = $key["observaciones"];
				$data["tipo_lente"] = $key["tipo_lente"];
				$data["trat_orden"] = $key["trat_orden"];
				$data["optica"] = $key["optica"];
				$data["sucursal"] = $key["sucursal"];
				$data["id_optica"] = $key["id_optica"];
				$data["id_sucursal"] = $key["id_sucursal"];
			}
				echo json_encode($data);
			}else{
				echo json_encode("error");
			}
	break;
//******************* GET HISTORIAL DE ORDEN ******************//
case 'get_acciones_orden':
	$historial = $ordenes->getAccionesOrden($_POST["cod_orden_act"]);
	$data = Array();
	foreach ($historial as $k) {
		$sub_array["fecha_hora"] =  date("d-m-Y H:i:s", strtotime($k["fecha_hora"]));
		$sub_array["usuario"] = $k["nombre"]." - ".$k["codigo_emp"];
		$sub_array["accion"] = $k["accion"];
		$sub_array["observaciones"] = $k["observaciones"];
		$data[] = $sub_array;
	}
	echo json_encode($data);
	break;

//GET RXFINAL SHOW ORDEN//
case 'get_orden_rxfinal':
	$rx_orden = $ordenes->get_orden_rxfinal($_POST["cod_orden_act"]);

	if (is_array($rx_orden)==true and count($rx_orden)>0) {
			
		foreach ($rx_orden as $key) {

			$data["odesferas"] = $key["odesferas"];
			$data["odcindros"] = $key["odcindros"];
			$data["odeje"] = $key["odeje"];
			$data["odadicion"] = $key["odadicion"];
			$data["odprisma"] = $key["odprisma"];
			$data["oiesferas"] = $key["oiesferas"];
			$data["oicindros"] = $key["oicindros"];
			$data["oieje"] = $key["oieje"];
			$data["oiadicion"] = $key["oiadicion"];
			$data["oiprisma"] = $key["oiprisma"];

		}

		echo json_encode($data);
	}else{
		echo json_encode("error");
	}

	break;

//GET DATOS ALTURAS ORDEN SHOW//
case 'get_datos_alturas_orden':

	$dist_orden = $ordenes->get_alturas_orden($_POST["cod_orden_act"]);

	if (is_array($dist_orden)==true and count($dist_orden)>0) {
			
		foreach ($dist_orden as $key) {

			$data["od_dist_pupilar"] = $key["od_dist_pupilar"];
			$data["od_altura_pupilar"] = $key["od_altura_pupilar"];
			$data["od_altura_oblea"] = $key["od_altura_oblea"];
			$data["oi_dist_pupilar"] = $key["oi_dist_pupilar"];
			$data["oi_altura_pupilar"] = $key["oi_altura_pupilar"];
			$data["oi_altura_oblea"] = $key["oi_altura_oblea"];
	}

		echo json_encode($data);
	}else{
		echo json_encode("error");
	}

	break;

///SHOW DATA AROS//
case 'get_det_aros_orden':
		
	$aro = $ordenes->get_aros_orden($_POST["cod_orden_act"]);

	if (is_array($aro)==true and count($aro)>0) {			
		foreach ($aro as $key) {
			$data["modelo"] = $key["modelo"];
			$data["marca"] = $key["marca"];
			$data["color"] = $key["color"];
			$data["diseno"] = $key["diseno"];
			$data["horizontal"] = $key["horizontal"];
			$data["diagonal"] = $key["diagonal"];
		  $data["vertical"] = $key["vertical"];
			$data["puente"] = $key["puente"];
	}

		echo json_encode($data);
	}else{
		echo json_encode("error");
	}
	break;


}





















