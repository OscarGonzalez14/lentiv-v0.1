<?php
require_once("../config/conexion.php");
require_once("../modelos/Tallado.php");

$tallado = new Tallado();

switch ($_GET["op"]) {

	case 'get_correlativo_ingreso':
		$correlativo = $tallado->getCorrelativoIngresoT();
		if (is_array($correlativo)==true and count($correlativo)>0) {
			foreach($correlativo as $row){                  
			    $codigo=$row["correlativo_ingreso"];
			    $cod=(substr($codigo,3,11))+1;
	            $output["correlativo"]="IT-".$cod;
            }
        }else{
            	$output["correlativo"]="IT-1";
        } 

		echo json_encode($output);
		break;

	    case 'listar_ingresostallado':
		    $datos = $tallado->listarIngresosTallado();
            $data = Array();

            foreach ($datos as $row) { 
	            $sub_array = array();
				$sub_array[] = $row["id_ingreso"];  
				$sub_array[] = $row["correlativo_ingreso"];
				$sub_array[] = $row["codigo_orden"];  
				$sub_array[] = $row["codigo_emp"]."*".$row["usuario"];
				$sub_array[] =  date("d-m-Y", strtotime($row["fecha"]))." ".$row["hora"];   
				$sub_array[] = $row["paciente"];
 
				$sub_array[] = $row["nombre"];
				$sub_array[] = $row["tipo_lente"];   
	            $sub_array[] = '<button type="button"  class="btn btn-sm bg-light" onClick="detOrdenes(\''.$row['codigo_orden'].'\')"><i class="fa fa-eye" aria-hidden="true" style="color:blue"></i></button>';
				$data[] = $sub_array;
			}
			  
			$results = array(
		      "sEcho"=>1, //Información para el datatables
		      "iTotalRecords"=>count($data), //enviamos el total registros al datatable
		      "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
		      "aaData"=>$data);
		    echo json_encode($results);
		break;	

}/*Fin switch*/

