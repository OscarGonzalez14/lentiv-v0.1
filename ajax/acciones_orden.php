<?php
require_once("../config/conexion.php");

switch ($_GET["op"]) {
	case 'registrar_acciones_ordenes':
	    $tipo_accion = $_POST["tipo_accion"];

	    if ($tipo_accion=="ingreso_a_tallado") {
	    	require_once("../modelos/Tallado.php");
			$tallado = new Tallado();
		    $tallado->registrarIngresoTallado();
		    
	    }elseif ($tipo_accion=="despacho_de_laboratorio") {
	    	require_once("../modelos/Despachos.php");
			$desp = new Despachos();
			$desp->registrarDespachoLab();
	    }

	break;
	
}