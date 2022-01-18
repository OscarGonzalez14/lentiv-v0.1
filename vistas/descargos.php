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
 <script src="../plugins/keymaster.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed" style='font-family: Helvetica, Arial, sans-serif;'>
<div class="wrapper">
<!-- top-bar -->
  <?php require_once('top_menu.php');?>
  <!-- /.top-bar -->

  <!-- Main Sidebar Container -->
  <?php require_once('side_bar.php');
    require_once('../modales/modal_descargo.php');
  ?>
  <!--End SideBar Container-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
      <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["id_usuario"];?>"/>
      <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["usuario"];?>"/>
      <button class="btn btn-info btn-sm btn-flat" data-toggle="modal" data-target="#modal_descargo" data-backdrop="static" data-keyboard="false"  id="new_desc" onClick="put_cursor_order();" style="border-radius: 3px;font-family: Helvetica, Arial, sans-serif;font-size: 14px;text-align: center"><i class="fas fa-sort" style="margin-top: 2px"> Nuevo Descargo</i></button>

      <div class="card card-dark card-outline" style="margin: 2px;">
       <table width="100%" class="table-hover table-bordered" id="datatable_desc_diarios" data-order='[[ 0, "desc" ]]'>        
         <thead class="style_th bg-dark" style="color: white">
           <th>Id</th>
           <th>#Orden</th>
           <th>Fecha</th>
           <th>Paciente</th>
           <th>Optica</th>
           <th>Ojo</th>
           <th>Lente</th>
           <th>Medidas</th>
           <th>Cod. Lente</th>
         </thead>
         <tbody class="style_th"></tbody>
       </table>
      </div>
      </div><!-- /.container-fluid -->


      <div class="col-md-12">
        <div class="card card-primary collapsed-card" style="border: solid 1px blue;">
          <div class="card-header">
              <h5 class="card-title" style="font-size: 16px;"> ORDENES DIGITADAS EN LABORATORIO</h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool bg-danger btn-xs" onClick="listar_ordenes();"><i class="fas fa-bell"></i><span>10 Pendientes</span></button>

                  <button type="button" class="btn btn-tool bg-warning btn-xs"><i class="fas fa-cog"></i><span>50 Proceso</span></button>
                  <button type="button" class="btn btn-tool btn-xs" data-card-widget="collapse" onClick="get_dataTableBase();"><i class="fas fa-plus"></i>
                  </button>
                <button type="button" class="btn btn-tool btn-xs" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
              </div>
          </div>
            <div class="card-body">
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
        </div>
      </div>

      <div class="col-md-12">
        <div class="card card-dark collapsed-card" style="border: solid 1px black;">
          <div class="card-header">
              <h5 class="card-title" style="font-size: 16px;"> ORDENES DIGITADAS ÓPTICA</h5>
                <div class="card-tools">

                  <button type="button" class="btn btn-tool bg-danger btn-xs" onClick="listar_ordenes();"><i class="fas fa-bell"></i><span>15</span> Pendientes</button>

                  <button type="button" class="btn btn-tool bg-warning btn-xs"><i class="fas fa-cog"></i><span>40 Proceso</span></button>

                  <button type="button" class="btn btn-tool btn-xs" data-card-widget="collapse" onClick="get_dataTableBase();"><i class="fas fa-plus"></i>
                  </button>
                <button type="button" class="btn btn-tool btn-xs" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
              </div>
          </div>
            <div class="card-body">
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
        </div>
      </div>


    </section>
    <!-- /.content -->

<!--=============MODAL CONFIRMA REPOSICION LENTE==============-->

<div class="modal fade" id="confirm-reposicion" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body">
        <div>          
          <h5 style="text-align: center;font-size: 15px"><i class="fas fa-exclamation-triangle" style="font-size:48px;color: #f0ad4e"></i><br>  <span style="font-size: 18px;">La orden ya posee un descargo. Desea reportar un lente dañado para descargar nuevamente?</span></h5>
        </div>

        <div style="align-items: center;">
          <input type="text" class="form-control" placeholder="Digitar codigo de autorización" id="codigoAutRep">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-block" onClick="reportarLenteRoto()">Aceptar</button>
      </div>
    </div>
  </div>
</div>


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
<script type="text/javascript" src="../js/productos.js"></script>
<script type="text/javascript" src="../js/stock.js"></script>
  </footer>
</div>
<script>

document.addEventListener('keydown',handleInputFocusTransfer);
function handleInputFocusTransfer(e){
  const focusableInputElements= document.querySelectorAll('.data_descargos');  
  const focusable= [...focusableInputElements]; 
  const index = focusable.indexOf(document.activeElement);
  let nextIndex = 0;
  if (e.keyCode === 38) {
    e.preventDefault();
    nextIndex= index > 0 ? index-1 : 0;
    focusableInputElements[nextIndex-1].focus();
    focusableInputElements[nextIndex-1].select();  

  }
  else if (e.keyCode === 40) {
    e.preventDefault();
    nextIndex= index+1 < focusable.length ? index+1 : index;
    focusableInputElements[nextIndex+1].focus();
    let ids = focusableInputElements[nextIndex+1].select();
  }else if(e.keyCode === 37){
    e.preventDefault();
    nextIndex= index > 0 ? index-1 : 0;
    focusableInputElements[nextIndex].focus();
    let ids = focusableInputElements[nextIndex].select();
  }else if(e.keyCode === 39){
    e.preventDefault();
    nextIndex= index+1 < focusable.length ? index+1 : index;
    focusableInputElements[nextIndex].focus();
    let ids = focusableInputElements[nextIndex].select();
  }
}
</script>
<!-- ./wrapper -->

</body>
</html>
 <?php } else{
echo "Acceso denegado";
  } ?>
