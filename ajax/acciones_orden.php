<?php
require_once("../config/conexion.php");
require_once("../modelos/Tallado.php");
$tallado = new Tallado();

require_once("../modelos/Despachos.php");
$desp = new Despachos();

require_once("../modelos/Ordenes.php");
$ordenes = new Ordenes();

switch ($_GET["op"]) {
	case 'registrar_acciones_ordenes':
	    $tipo_accion = $_POST["tipo_accion"];
	    if ($tipo_accion=="ingreso_a_tallado") {	    	
		    $tallado->registrarIngresoTallado();		    
	    }elseif ($tipo_accion=="despacho_de_laboratorio") {  	
            $desp->registrarDespachoLab();
	    }
	break;

    case 'get_data_oden':

        $tipo_accion = $_POST["tipo_accion"];
        $auth = '';
        if ($tipo_accion == "despacho_de_laboratorio") {
        	$valida_acc = $desp->existe_codigo_despacho($_POST["cod_orden_act"]);            
        }
        count($valida_acc)==0 ? $auth = true : $auth = false;
        if($auth){
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
        }else{
        	echo json_encode("Exist");
        }		

	break;

	
}