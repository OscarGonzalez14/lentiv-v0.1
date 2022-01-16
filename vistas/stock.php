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
 require_once('../modelos/Productos.php');
 require_once('../modales/warehouseIncome/modalIngresosTerm.php');
 require_once('../modales/new_barcode_lentes.php');
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

  .filas:hover {
    background-color: lightyellow;
  }

</style>

  <script src="../js/xlsx.full.min.js"></script>
  <script src="../js/FileSaver.min.js"></script>
  <script src="../js/tableexport.min.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed" style='font-family: Helvetica, Arial, sans-serif;'>
<div class="wrapper">
<!-- top-bar -->
  <?php 
  require_once("../modelos/Pruebas.php");
  $productos = new Productos();  
  require_once('top_menu.php')?>

  <?php require_once('side_bar.php');   
  ?>
  <div class="content-wrapper">
    <section class="content">
      <div class="row" style="margin-top: 5px">

          <div class="col-md-12" id="sphgreen" style="">
            <div class="card card-dark collapsed-card">
              <div class="card-header">
                <h5 class="card-title" style="font-size: 14px">LENTE TERMINADO SPH GREEN ESSILOR</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" onClick="get_dataTableTerm('1','sphgreenessilor');"><i class="fas fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                  <button type="button" class="btn btn-tool" id="btnExportar"><i class="fas fa-download"></i>
                  </button>
                  class="fas fa-3x fa-sync-alt"
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="">
              <!--Aqui iran las tablas de cada seccion-->
              <table width="100%" class="table-bordered" style="text-align: center" id="tablessilor">
              <thead class="style_th bg-dark" style="color: white">
                <th>Sph\Cil</th>
                <th>0.00</th>
                <th>-0.25</th>
                <th>-0.50</th>
                <th>-0.75</th>
                <th>-1.00</th>
                <th>-1.25</th>
                <th>-1.50</th>
                <th>-1.75</th>
                <th>-2.00</th>
                <th>-2.25</th>
                <th>-2.05</th>
                <th>-2.75</th>
                <th>-3.00</th>
                <th>-3.25</th>
                <th>-3.50</th>
                <th>-3.75</th>
                <th>-4.00</th>
              </thead>
                <tbody id="sphgreenessilor">                  
                </tbody>
              </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-12" style="">
            <div class="card card-primary collapsed-card">
              <div class="card-header">
                <h5 class="card-title" style="font-size: 14px">TERMINADO SPH BLUE CAPTURE ESSILOR</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" onClick="get_dataTableTerm('2','sphbluecapessilor');"><i class="fas fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
                  <button type="button" class="btn btn-tool"><i class="fas fa-download"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
              <table  width="100%" class="table-bordered" style="text-align: center">
              <thead class="style_th bg-dark" style="color: white">
                <th>Sph\Cil</th>
                <th>0.00</th>
                <th>-0.25</th>
                <th>-0.50</th>
                <th>-0.75</th>
                <th>-1.00</th>
                <th>-1.25</th>
                <th>-1.50</th>
                <th>-1.75</th>
                <th>-2.00</th>
                <th>-2.25</th>
                <th>-2.05</th>
                <th>-2.75</th>
                <th>-3.00</th>
                <th>-3.25</th>
                <th>-3.50</th>
                <th>-3.75</th>
                <th>-4.00</th>
                <tbody id="sphbluecapessilor"></tbody>
              </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-6" style="">
            <div class="card card-primary collapsed-card">
              <div class="card-header">
                <h5 class="card-title" style="font-size: 14px">TERMINADO SPH BLUE CAPTURE ESSILOR</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>

                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                The body of the card # 2
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

      </div><!-- /.container-fluid -->
    </section>



    
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
<script type="text/javascript" src="../js/productos.js"></script>
<script type="text/javascript" src="../js/stock.js"></script>


<script>  
  function openWin() {
    var divText = document.getElementById("sphgreen").outerHTML;
    var myWindow = window.open('', '', 'width=600,height=800');
    var doc = myWindow.document;
    doc.open();
    doc.write(divText);
    doc.close();
}
</script>
<script>
//Make the DIV element draggagle:
//dragElement(document.getElementById("sphgreen"));

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    /* if present, the header is where you move the DIV from:*/
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    /* otherwise, move the DIV from anywhere inside the DIV:*/
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
</script>
</footer>
</div>

<!-- ./wrapper -->

</body>
</html>
 <?php } else{
echo "Acceso denegado";
  } ?>


