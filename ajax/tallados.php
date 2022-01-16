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

	case 'registrar_ingreso_tallado':
	    $correlativo = $tallado->verificaExisteCorrelativo($_POST["correlativo_ing"]);
	    if (is_array($correlativo)==true and count($correlativo)==0) {
	    	$tallado->registrarIngresoTallado();
	    	$mensaje = "Register";
	    }else{
	    	$mensaje = "Exist";
	    }
		echo json_encode($mensaje);
		break;

}