<?php
require_once("../config/conexion.php");
require_once("../modelos/Despachos.php");

$despacho = new Despachos();

switch ($_GET["op"]) {

	case 'listar_despachos_laboratorio':

	   $datos = $despacho->getDespachos();
       $data = Array();

        foreach ($datos as $row) {
       		$sub_array = array();
       		$sub_array[] = $row["id_despacho"];  
			$sub_array[] = $row["n_despacho"];
			$sub_array[] =  date("d-m-Y", strtotime($row["fecha"]))." ".$row["hora"];   
			$sub_array[] = $row["codigo_emp"]."-".$row["usuario"];
			$sub_array[] = $row["mensajero"];  
			$sub_array[] = $row["cant_ordenes"]." ordenes";  
			$sub_array[] = '<button type="button"  class="btn btn-sm bg-light" onClick="ver_detalle_despachos(\''.$row['n_despacho'].'\')"><i class="fa fa-eye" aria-hidden="true" style="color:blue"></i></button>';
			$data[] = $sub_array;
		}

	    $results = array(
	      "sEcho"=>1, //Información para el datatables
	      "iTotalRecords"=>count($data), //enviamos el total registros al datatable
	      "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
	      "aaData"=>$data);
	    echo json_encode($results); 

		
		break;


	case 'listar_detalle_despacho':

	   $datos = $despacho->getDetalleDespacho($_POST["n_despacho"]);
       $data = Array();

        foreach ($datos as $row) {
       		$sub_array = array();
       		$sub_array[] = $row["id_detalle_despacho"];  
			$sub_array[] = $row["cod_orden"];
			$sub_array[] = $row["paciente"];
			$sub_array[] = $row["optica"];  
			$sub_array[] = $row["sucursal"];  
			$data[] = $sub_array;
		}

	    $results = array(
	      "sEcho"=>1, //Información para el datatables
	      "iTotalRecords"=>count($data), //enviamos el total registros al datatable
	      "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
	      "aaData"=>$data);
	    echo json_encode($results);
	     		
	break;

}
	

	