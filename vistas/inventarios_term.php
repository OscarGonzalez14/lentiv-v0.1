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

</head>
<body class="hold-transition sidebar-mini layout-fixed" style='font-family: Helvetica, Arial, sans-serif;'>
<div class="wrapper">
<!-- top-bar -->
  <?php 
  require_once("../modelos/Pruebas.php");
  $productos = new Productos();
  $data = $productos->get_data_ar_green_term();
  require_once('top_menu.php')?>

  <?php require_once('side_bar.php');   
  ?>
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        
      <div class="card card-dark card-outline" style="margin: 2px;">
        <h5 style="text-align: center;background:#034f84;color:white;font-family: Helvetica, Arial, sans-serif;font-size: 16px;">LENTE TERMINADO SPH GREEN, LENTES POR PARES</h5>
       <table width="100%" class="table-bordered table-striped" id="datatable_ordenes">
         <thead class="style_th bg-dark" style="color: white">
           <th></th>
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
         <tbody class="style_th"></tbody>
         <?php
         $esfera =1;
         $cilindros = 0;
         $count_rows =0;
         $columns = Array();
         $measures = Array();
         $colum_cil ='2.00';
         $cil_row='';
         foreach ($data as $key) {
          $esfera = substr($key["esfera"], 0,-1);
          $cilindro = substr($key["cilindro"], 0,-1);
          $row = "
            <td class='stilot1 item_ingreso' id='".$key["id_terminado"]."' data-toggle='tooltip' title='Esfera: ".$esfera." * Cilindro: ".$cilindro."'>".$key["stock"]."</td>      
          ";
          array_push($measures, $row);
         }

         for ($i=0;$i<count($measures);$i++){
                if ($colum_cil>0) {
                  $cil_row="+".number_format($colum_cil,2,".",",");
                }else{
                  $cil_row=number_format($colum_cil,2,".",",");
                }
                if($count_rows==0){
                  array_push($columns,"<tr class='fila'>"."<td style='text-align:center;font-size:11px' class='bg-info'><b>".$cil_row."</b></td>");
                }

              $count_rows ++;
              array_push($columns, $measures[$i]);
              if ($count_rows==17) {
                array_push($columns, "</tr>");
                $count_rows=0;
                $colum_cil = $colum_cil-0.25;
             }
          }

          for($j=0;$j<count($columns);$j++){
           echo $columns[$j];
          }
    require_once("../vistas/links_js.php");
    ?>
  </table>
      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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
  </footer>
</div>

<!-- ./wrapper -->

</body>
</html>
 <?php } else{
echo "Acceso denegado";
  } ?>


