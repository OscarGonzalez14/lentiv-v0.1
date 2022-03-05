<?php 
require_once("../config/conexion.php");
if(isset($_SESSION["usuario"])){
$cat_admin = $_SESSION["categoria"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
<?php require_once("links_plugin.php"); 
 require_once('../modelos/Ordenes.php');
 require_once('../modales/detalle_orden.php');
 $ordenes = new Ordenes();
 $suc = $ordenes->get_opticas(); 
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
  <?php require_once('side_bar.php');
    require_once('../modales/nueva_orden_lab.php');
  ?>
  <!--End SideBar Container-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
      <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION['id_usuario']?>"/>
      <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["usuario"];?>"/>
     <div class="card-body" style="margin-top: 0px solid red;color: black !important">

        <a data-toggle="modal" data-target="#nueva_orden_lab" data-backdrop="static" data-keyboard="false" onClick='get_numero_orden();' id="new_order" class="btn btn-app" style="color: black;border: solid #0275d8 1px;">
          <span class="badge bg-warning" id="alert_creadas_ord"></span>
          <i class="fas fa-file-prescription" style="color: green"></i> NUEVA ORDEN
        </a>

        <a href="ordenes_enviadas.php" class="btn btn-app" style="color: black;border: solid #5bc0de 1px;">
          <span class="badge bg-danger" id="alert_enviadas_ord">0</span>
          <i class="fas fa-bell" style="color: #f0ad4e"></i> PENDIENTES
        </a>

        <a href="ordenes_enviadas.php" class="btn btn-app" style="color: black;border: solid #5bc0de 1px;">
          <span class="badge bg-success" id="alert_enviadas_ord">0</span>
          <i class="fas fa-clipboard-list" style="color: #0275d8"></i> TODAS
        </a>
        
    </div>    

    <div class="card card-dark card-outline" style="margin: 2px;">
      <h5 style="text-align: center; font-size: 14px" align="center" class="bg-info">ORDENES DIGITADAS-LABORATORIO</h5>
       <table width="100%" class="table-hover table-bordered" id="datatable_ordenes" data-order='[[ 0, "desc" ]]'>        
         <thead class="style_th bg-dark" style="color: white">
           <th>Id</th>
           <th>Código</th>
           <th>Óptica</th>
           <th>Paciente</th>
           <th>Estado</th>
           <th>Detalles</th>
           <th>Viñeta</th>
           <th>Aciones</th>
         </thead>
         <tbody class="style_th"></tbody>
       </table>
      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



  <div class="modal fade" id="contenedor">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
      <div class="modal-body">
        <div class="dropdown-divider"></div>
          <label for=""># Contenedor</label>
          <input type="text" class="form-control clear_orden_i is-error" id="contenedor_orden">
        </div><!--./Modal body-->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-block" onClick='guardar_orden();' id="reg_orden"><i class="fas fa-save"></i> Guardar Orden</button>
          <button type="button" class="btn btn-dark btn-block" onClick='printEtiqueta();' id="print_etiqueta"><i class="fas fa-barcode"></i> Imprimir etiqueta</button>
        </div>
        <input type="hidden" id="numero_etiqueta">    
    </div><!--./Modal content-->
  </div>
  </div><!--Fin Modal-->
  <!-- /.modal-dialog -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>2021 Lenti || <b>Version</b> 1.0</strong>
     &nbsp;All rights reserved.
    <div class="float-right d-none d-sm-inline-block">      
    </div>
    <?php 
require_once("links_js.php");
?>
<script type="text/javascript" src="../js/ordenes.js"></script>
<script type="text/javascript" src="../js/finanzas/precios.js"></script>
  </footer>
</div>

<!-- ./wrapper -->

</body>
</html>
 <?php } else{
echo "Acceso denegado";
  } ?>


