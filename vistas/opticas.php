<?php 
require_once("../config/conexion.php");
if(isset($_SESSION["usuario"])){
$cat_admin = $_SESSION["categoria"];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
<?php require_once("links_plugin.php");
 require_once('../modales/nueva_optica.php');
 require_once('../modales/nueva_sucursal.php');
 ?>
<style>
  .buttons-excel{
      background-color: green !important;
      margin: 2px;
      max-width: 150px;
  }
</style>

</head>
<body class="hold-transition sidebar-mini layout-fixed" style='font-family: Helvetica, Arial, sans-serif;'>
	<div class="wrapper">
<!-- top-bar -->
  <?php require_once('top_menu.php');?>
  <!-- /.top-bar -->

  <!-- Main Sidebar Container -->
  <?php require_once('side_bar.php');?>
  <!--End SideBar Container-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
      <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION['codigo_emp']?>"/>
      <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["usuario"];?>"/>
     <div class="card-body" style="margin-top: 0px solid red;color: black !important">

        <a data-toggle="modal" data-target="#nueva_optica" data-backdrop="static" data-keyboard="false" id="nueva_optica" class="btn btn-app" style="color: black;border: solid #0275d8 1px;">
          <i class="fas fa-eye" style="color:green"></i> REGISTRAR OPTICA
        </a>

        <a data-toggle="modal" data-target="#nueva_sucursal_optica" onClick="get_correlativo_sucursal();" data-backdrop="static" data-keyboard="false" id="nueva_sucursal" class="btn btn-app" style="color: black;border: solid #0275d8 1px;">
          <i class="fas fa-folder-plus" style="color:#08088A"></i> AGREGAR SUCURSAL
        </a>
    </div> 
      <div class="card card-dark card-outline" style="margin: 2px;">
        <h5 style="text-align: center; font-size: 14px" align="center" class="bg-info">SUCURSALES OPTICAS </h5>
       <table width="100%"  style="text-align:center;" class="table-hover table-bordered" id="dt_sucursales_opti" data-order='[[ 0, "desc" ]]' style="max-height:2px;">        
         <thead class="style_th bg-dark" style="color: white">
           <th style="text-align:center;width:10%;">Código</th>
           <th style="text-align:center;width:20%;">Óptica</th>
           <th style="text-align:center;width:20%;">Sucursal</th>
           <th style="text-align:center;width:10%;">Teléfono</th>
           <th style="text-align:center;width:30%;">Dirección</th>
           <th style="text-align:center;width:10%;">Acciones</th>
         </thead>
         <tbody></tbody>
       </table>
      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



  <footer class="main-footer">
    <strong>2021 Lenti || <b>Version</b> 1.0</strong>
     &nbsp;All rights reserved.
    <div class="float-right d-none d-sm-inline-block">      
    </div>
    <?php 
require_once("links_js.php");
?>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $(".select2").select2({
    maximumSelectionLength: 1
});
      })
</script>
<script type="text/javascript" src='../js/opticas.js'></script>
<script type="text/javascript" src='../js/bootbox.min.js'></script>
<script type="text/javascript" src='../js/cleave.js'></script>

  </footer>
  </div> <!--fin content wrapper-->
</body>
</html>
 <?php } else{
echo "Acceso denegado";
  } ?>