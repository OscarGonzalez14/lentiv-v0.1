<?php
require_once("../config/conexion.php");
require_once("../modelos/Opticas.php");

$optica = new Opticas();

switch ($_GET["op"]) {

  case 'guardar_optica':
  $datos=$optica->valida_existencia_optica($_POST["nom_optica"],$_POST["num_optica"]);
  if(is_array($datos)==true and count($datos)==0){
      $optica->guardar_optica($_POST["nom_optica"],$_POST["num_optica"],$_POST["id_usuario"]);
      $messages[]="ok";
  }else{
    $errors[]="error";
}
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
//fin mensaje error
break;

///LISTAR OPTICAS REGISTRADAS
case "listar_sucursales_optica":
$datos=$optica->get_sucursales_opticas();
        //Vamos a declarar un array
$data= Array();

foreach($datos as $row)
{
    $sub_array = array();
    $sub_array[] = $row["codigo"];
    $sub_array[] = $row["nombre"];
    $sub_array[] = $row["nombre_sucursal"];
    $sub_array[] = $row["telefono"];
    $sub_array[] = $row["direccion"];
    $sub_array[] = '<button type="button" id="'.$row["id_sucursal"].'" class="btn btn-edit btn-sm editar_sucursal  bg-light" style="text-align:center" onClick="show_datos_sucursal('.$row["id_sucursal"].',\''.$row["codigo"].'\');" data-toggle="modal" data-target="#nueva_sucursal_optica" data-backdrop="static" data-keyboard="false"><i class="fa fa-edit" aria-hidden="true" style="color:#006600"></i></button>

    <button type="button"  class="btn btn-sm bg-light" onClick="eliminar_sucursal('.$row["id_sucursal"].')"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i></button>';

    $data[] = $sub_array;
}

$results = array(
         "sEcho"=>1, //Información para el datatables
         "iTotalRecords"=>count($data), //enviamos el total registros al datatable
         "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
         "aaData"=>$data);
echo json_encode($results);

break;

//GET CODIGO SUCURSAL
case "get_correlativo_sucursal":
$datos= $optica->get_correlativo_sucursal();

if(is_array($datos)==true and count($datos)>0){
  foreach($datos as $row){                  
    $codigo=$row["codigo"];
    $cod=(substr($codigo,3,11))+1;
    $output["correlativo"]="SL"."-".$cod;
  }             
}else{
  $output["correlativo"]="SL"."-1";
}

echo json_encode($output);

break;


//GUARDAR SUCURSAL
case 'guardar_sucursal':
  $datos=$optica->valida_existencia_sucursal($_POST["codigo"]);
  if(is_array($datos)==true and count($datos)==0){
    $optica->guardar_sucursal($_POST["nom_sucursal"],$_POST["direccion"],$_POST["telefono"],$_POST["correo"],$_POST["encargado"],$_POST["codigo"],$_POST["id_optica"],$_POST["usuario"]);
      $messages[]="creado";
  }else{
    $optica->editar_sucursal($_POST["nom_sucursal"],$_POST["direccion"],$_POST["telefono"],$_POST["correo"],$_POST["encargado"],$_POST["codigo"],$_POST["id_optica"],$_POST["usuario"],$_POST["id_sucursal"]);

    $messages[]="editado";
}
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
//fin mensaje error
break;

///MOSTRAR INFORMACION DE SUCURSAL
  case 'show_datos_sucursal':    
    $datos=$optica->show_datos_sucursal($_POST["id_sucursal"],$_POST["codigo"]);
      foreach($datos as $row){
      $output["id_optica"] = $row["id_optica"];
      $output["nombre_sucursal"] = $row["nombre_sucursal"];
      $output["direccion"] = $row["direccion"];
      $output["telefono"] = $row["telefono"];
      $output["correo"] = $row["correo"];
      $output["encargado"] = $row["encargado"];
      $output["id_sucursal"] = $row["id_sucursal"];
      $output["codigo"] = $row["codigo"];
      $output["id_usuario"] = $row["id_usuario"];
      }
    echo json_encode($output);
  break;

  //ELIMINAR SUCURSAL. SÓLO SI NO EXISTE UNA ORDEN ASOCIADA A ELLA.
case "eliminar_sucursal":

  $datos=$optica->valida_sucursal_orden($_POST["id_sucursal"]);

  if (is_array($datos)==true and count($datos)==0 ){ //Si existe orden(no eliminar)
    $optica->eliminar_sucursal($_POST["id_sucursal"]);
    $messages[]="ok";
  }else{
    $errors[]="existe";
  }
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
//fin 
  break;


}//FIN