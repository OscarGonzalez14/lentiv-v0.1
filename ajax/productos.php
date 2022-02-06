<?php

require_once("../config/conexion.php");
//llamada al modelo categoria
require_once("../modelos/Productos.php");

$productos = new Productos();

switch ($_GET["op"]){

  case 'verificar_existe_codigo':
    $codigo = $productos->verificarExisteCodigo($_POST["new_code"]);
    break;

	case 'get_data_item_ingreso':
	$id_item = $_POST["id_item"];
	$data = $productos->get_data_item_ingreso($_POST["id_item"]);
    if(is_array($data)==true and count($data)>0){
		foreach ($data as $v) {
			$output["marca"] = $v["marca"];
      $output["diseno"] = $v["diseno"];
      $output["esfera"] = substr($v["esfera"],0,-1);
      $output["cilindro"] = substr($v["cilindro"],0,-1);
      $output["id_terminado"] = $v["id_terminado"];
      $output["codigo"] = $v["codigo"];
      $output["stock"] = $v["stock"];
		}
	echo json_encode($output);
    }
    break;

    case 'update_stock_terminados':
    	$productos->update_stock_terminados($_POST["id_terminado"],$_POST["new_stock"]);
    	$messages[]='ok';
    	if (isset($messages)){
     ?>
       <?php
         foreach ($messages as $message) {
             echo json_encode($message);
           }
         ?>
   <?php
 }
    //mensaje error
      if (isset($errors)){

   ?>

         <?php
           foreach ($errors as $error) {
               echo json_encode($error);
             }
           ?>
   <?php
   }
   ///fin mensaje error
  break;
	
  case 'set_code_bar_ini':
    $valida = $productos->valida_existe_barcode($_POST["new_code"],$_POST["id_terminado_term"]);
    //$codigo = $productos->valida_existe_cod_lente($_POST["id_terminado_term"]);
    if (is_array($valida)==true and count($valida)==0) {
      $productos->insert_codigo_lente($_POST["new_code"],$_POST["id_terminado_term"]);
      $messages[]='exito';
     }else{
      $errors[]="error";
     }
     if (isset($messages)){ ?>
        <?php foreach ($messages as $message) { echo json_encode($message);}?>
       <?php
      }
    //mensaje error
      if (isset($errors)){?>
         <?php foreach ($errors as $error) { echo json_encode($error);}
      ?>
     <?php }
    break;

    case 'get_tipo_lente':
      $tipo_lente = $productos->valida_tipo_lente($_POST["codigo_lente"]);

      if (is_array($tipo_lente)==true and count($tipo_lente)>0) {
        foreach ($tipo_lente as $key) {
           $data["codigo"]=$key["codigo"];
           $data["tipo_lente"]=$key["tipo_lente"];
        }
        echo json_encode($data);
      }else{
        echo json_encode("errorx");
      }

      break;

    case 'get_info_terminado':
    
    $data = $productos->getInfoTerminado($_POST["codigo"]);

    if (is_array($data)==true and count($data)>0) {
      foreach ($data as $key) {
        $output["marca"]=$key["marca"];
        $output["diseno"]=$key["diseno"];
        $output["esfera"]=$key["esfera"];
        $output["cilindro"]=$key["cilindro"];
        $output["codigo"]=$key["codigo"];
        $output["tipo_lente"] = "Terminado";
    }
     echo json_encode($output);
    }
    break;

/*-------------GET CODIGO DE BARRAS LENTES SIN CODIGO DE FABRICA----*/
case "get_codigo_barra":
  date_default_timezone_set('America/El_Salvador'); $now = date("mY");
  $tipo_lente = $_POST['tipo_lente'];
  $tipo_lente == 'Terminado' ? $tl = '01': $tl = '02';
  $datos = $productos->getCodigoBarra($tipo_lente);

  if(is_array($datos)==true and count($datos)>0){
    foreach($datos as $row){
      $numero_orden = substr($row["codigo"],8,15)+1;
      $output["codigolente"] = $tl.$now.$numero_orden;
    }  

  }else{
        $output["codigolente"] = $tl.$now.'1';
  }
  echo json_encode($output);

break;

case 'registrar_codigo':
  $productos->registrarCodigo($_POST['codigo'],$_POST['tipo_lente'],$_POST['identificador']);
  break;

/* --------------------------  GET DATA BASE SIN ADICION --------------------*/

 case 'get_info_base':
   $data = $productos->getInfoBases($_POST["codigo"]);
   if (is_array($data)==true and count($data)>0) {
      foreach ($data as $key) {
        $output["marca"]=$key["marca"];
        $output["diseno"]=$key["diseno"];
        $output["base"]=$key["base"];        
        $output["codigo"]=$key["codigo"];
        $output["tipo_lente"] = "Base";
        $output["stock"] = $key["stock"];
    }
  }
    echo json_encode($output);
  break;

/* -------------------------GET DATA BASE FLAPTOP ----------------------------*/

  case 'get_info_base_flaptop':
   $data = $productos->getInfoBasesFlatop($_POST["codigo"]);
   if (is_array($data)==true and count($data)>0) {
      foreach ($data as $key) {
        $output["marca"]=$key["marca"];
        $output["diseno"]=$key["diseno"];
        $output["base"]=$key["base"];
        $output["adicion"]=$key["adicion"];        
        $output["codigo"]=$key["codigo"];
        $output["tipo_lente"] = "Base Flaptop";
        $output["stock"] = $key["stock"];
        $output["ojo"] = strtolower($key["ojo"]);
    }
  }
  
  echo json_encode($output);

  break;

  case 'get_correlativo_lentes_rotos':

    date_default_timezone_set('America/El_Salvador'); 
    $mes = date("Ym");
    $mes_corr = date("Y-m");

    $n_reporte=$productos->getCorrelativoLentesRotos($mes_corr);

    if(is_array($n_reporte)==true and count($n_reporte)>0){
      foreach($n_reporte as $row){
        $codigo =$row["n_reporte"];
        $cod = (substr($codigo,6,11))+1;
        $output["correlativo"] = "R".date("my",strtotime($mes))."-".$cod;
      }
    }else{
        $output["correlativo"] = "R".date("my",strtotime($mes))."-1";
      }
    echo json_encode($output);
    break;


  case 'get_operarios':

  $operarios = $productos->getOperarios();
  $data = Array();
  foreach ($operarios as $k) {
    $sub_array["usuario"] = $k["nombres"];
    $sub_array["codigo_emp"] = $k["codigo_emp"];
    $data[] = $sub_array;
  }
  echo json_encode($data);
  
    break;


/////////////////REGISTRAR LENTE ROTO ///////////
  case 'registrar_lente_roto':
  $validar_codigo = $productos->validarExisteCorrelativoLr($_POST["correlativo_lr"]);
      if (is_array($validar_codigo)==true and count($validar_codigo)==0) {
        $productos->registrarLentesRotos();
        $message = "Ok";    
      }else{
        $message = "Error";
      }
  echo json_encode($message);
  break;

  case 'listar_lentes_rotos':
  $datos = $productos->listarLentesRotos();
  $data = Array();
  foreach ($datos as $row) { 
  $sub_array = array();

  $sub_array[] = $row["id_detalle_lr"];  
  $sub_array[] = $row["fecha"]." ".$row["hora"];  
  $sub_array[] = $row["reponsable"];
  $sub_array[] = $row["usuario"];   
  $sub_array[] = $row["codigo_lente"];
  $sub_array[] = $row["especificaciones"];
  $sub_array[] = $row["razon"];
  $data[] = $sub_array;
  }
  
  $results = array(
      "sEcho"=>1, //Información para el datatables
      "iTotalRecords"=>count($data), //enviamos el total registros al datatable
      "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
      "aaData"=>$data);
    echo json_encode($results);

    break;

}///Fin Switch

//date("d-m-Y",strtotime($row["fecha_vencimiento"]));