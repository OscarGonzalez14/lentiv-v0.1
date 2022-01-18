<?php 
require_once("../config/conexion.php");
if(isset($_SESSION["usuario"])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
<?php require_once("links_plugin.php"); 
 require_once('../modales/ingresos_tallado.php');
 require_once('../modales/detalle_orden.php');
?>
<style>
  .buttons-excel{
      background-color: green !important;
      margin: 2px;
      max-width: 150px;
  }

  .stilot1{
    border: 1px solid black;
    padding: 5px;
    font-size: 12px;
    font-family: Helvetica, Arial, sans-serif;
    border-collapse: collapse;
    text-align: center;
  }

  .stilot2{
    border: 1px solid black;
    text-align: center;
    font-size: 11px;
    font-family: Helvetica, Arial, sans-serif;
  }

  .stilot3{
    text-align: center;
    font-size: 11px;
    font-family: Helvetica, Arial, sans-serif;
  }

  #table2 {
    border-collapse: collapse;
  }

  .fila:hover {
    background-color: lightyellow;
  }
</style>

</head>
<body class="hold-transition sidebar-mini layout-fixed" style='font-family: Helvetica, Arial, sans-serif;'>
<div class="wrapper">
<!-- top-bar -->
  <?php 
  require_once('top_menu.php')?>  
    <?php require_once('side_bar.php');
  ?>
  
  <div class="content-wrapper">       
    <button class="btn btn-info btn-sm btn-flat new_order_class" data-toggle="modal" data-target="#ing_tallado" data-backdrop="static" data-keyboard="false" id="ingresos_t" onClick="input_focus_clear();" style="border-radius: 2px;font-family: Helvetica, Arial, sans-serif;font-size: 14px;text-align: center;margin-top: 5px;margin-left: 4px"><i class="fas fa-sort" style="margin-top: 2px"> Nuevo ingreso</i></button>
    
  <input type="hidden" id="id_usuario" value="<?php echo $_SESSION["id_usuario"]; ?>">
      <div class="card card-primary card-outline" style="margin: 2px;">
       <table width="100%" class="table-hover table-bordered" id="data_ingresos_tallado" data-order='[[ 0, "desc" ]]'>        
         <thead class="style_th bg-dark" style="color: white">
           <th>Id</th>
           <th>#Ingreso</th>
           <th>#Orden</th>
           <th>Usuario</th>
           <th>Fecha ing.</th>
           <th>Paciente</th>
           <th>Optica</th>  
           <th>Lente</th>
           <th>Detalles</th>
         </thead>
         <tbody class="style_th"></tbody>
       </table>
      </div>
  </div><!--./content-wrapper-->

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong> Lenti || <b>Version</b> 1.0</strong>
     &nbsp;All rights reserved.
    <div class="float-right d-none d-sm-inline-block">      
    </div>
    <?php 

  require_once("links_js.php");
?>
<script type="text/javascript" src="../js/productos.js"></script>
<script type="text/javascript" src="../js/tallado.js"></script>
<script type="text/javascript" src="../js/ordenes.js"></script>

  </footer>
</div>

<!-- ./wrapper -->

</body>
</html>
 <?php } else{
echo "Acceso denegado";
  } ?>
