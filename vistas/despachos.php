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
 require_once('../modales/acciones_orden.php');
 require_once('../modales/detalle_orden.php');
 require_once('../modales/ACCIONES_ORDEN/detalle_despacho.php');
?>
<style>

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
    <button data-accion="despacho_de_laboratorio" class="accion_orden_actual" data-toggle="modal" data-target="#acciones_ordenes" data-backdrop="static" data-keyboard="false" id="ingresos_t"><i class="fas fa-shipping-fast" style="margin-top: 2px; color: #293946"> NUEVO DESPACHO</i></button> <br>
    
  <input type="hidden" id="id_usuario" value="<?php echo $_SESSION["id_usuario"]; ?>">
      <div class="card card-primary card-outline" style="margin: 2px;">
       <table width="100%" class="table-hover table-bordered" id="data_despachos" data-order='[[ 0, "desc" ]]' style="margin: 3px">        
         <thead class="style_th bg-dark" style="color: white">
           <th>Id</th>
           <th>#Codigo desp.</th>
           <th>Fecha</th>
           <th>Hecho por</th>
           <th>Mensajero</th>
           <th>Cantidad</th>
           <th>Detalle</th>
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
<script type="text/javascript" src="../js/despachos.js"></script>
<script type="text/javascript" src="../js/ordenes.js"></script>
<script type="text/javascript" src="../js/acciones_orden.js"></script>

<script>
    function EnterEventDesp() {

    if (event.keyCode == 13) {
      event.preventDefault();
      let cant_items = items_accion.length; 
      console.log(cant_items);
      if (cant_items > 0) {
        Swal.fire({
        title: '<strong>Confirmar despacho</strong>',
        icon: 'info',
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: true,
        confirmButtonText:'<i class="fas fa-shipping-fast"></i> Despachar!',
      }).then((result) => {
        if (result.isConfirmed) {
          registrarAccionesOrdenes();
        }
      })
      }else{
        alerts_productos("warning", "Sin ordenes en la lista");
        $('#reg_accion_act').focus(); return false;
      }
    }

    }///Fin funcion

    window.onkeydown = EnterEventDesp;
</script>

</footer>
</div>

<!-- ./wrapper -->

</body>
</html>
 <?php } else{
echo "Acceso denegado";
  } ?>
