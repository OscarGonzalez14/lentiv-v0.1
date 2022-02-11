<?php 
require_once("../config/conexion.php");
if(isset($_SESSION["usuario"])){

  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <?php 
    require_once("links_plugin.php"); 
    require_once('../modales/nuevo_usuario.php');

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

      <?php require_once('top_menu.php');?><!-- top-bar -->
      <?php require_once('side_bar.php');?><!--Contenido de la barra lateral -->

      <div class="content-wrapper">
        <section class="content">
          <div class="container-fluid">
            <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION['id_usuario']?>"/>
            <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["usuario"];?>"/>
            <div class="card-body" style="margin-top: 0px solid red;color: black !important">

              <a data-toggle="modal" data-target="#nuevo_usuario" onClick="get_codigo_usuario();" data-backdrop="static" data-keyboard="false" id="nuevo_usuario" class="btn btn-app nuevo_user" style="color: black;border: solid #0275d8 1px;"> 
                <i class="fas fa-user-plus" style="color: black;"></i>NUEVO USUARIO
              </a>
            </div>    

            <div class="card card-outline" style="margin: 2px;">
              <h5 style="text-align: center; font-size: 14px" align="center" class="bg-lightblue">USUARIOS DE LENTI</h5>
              <table width="100%" class="table-hover table-bordered" id="datatable_usuarios" data-order='[[ 0, "desc" ]]'>        
               <thead class="style_th bg-dark" style="color: white">
                 <th>Id</th>
                 <th>Código</th>
                 <th>Usuario</th>
                 <th>Nombre</th>
                 <th>Dirección</th>
                 <th>Correo</th>
                 <th>Fecha ingreso</th>
                 <th>Acciones</th>
               </thead>
               <tbody class="style_th"></tbody>
             </table>
           </div>
         </div><!-- /.container-fluid -->
       </section><!-- /.content -->
     </div>

   </div><!-- /.content-wrapper -->
   <footer class="main-footer">
    <strong>2021 Lenti || <b>Version</b> 1.0</strong>
    &nbsp;All rights reserved.
    <div class="float-right d-none d-sm-inline-block">      
    </div>
    <?php 
    require_once("links_js.php");
    ?>
    <?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s");?>
    <input type="hidden" id="fecha" value="<?php echo $hoy;?>">
    <script type="text/javascript" src='../js/usuarios.js'></script>
	   <script type="text/javascript" src='../js/bootbox.min.js'></script>
	   <script type="text/javascript" src='../js/cleave.js'></script>

  </footer>
</div>

<!-- ./wrapper -->

</body>
</html>
<?php } else{
  echo "Acceso denegado";
} ?>


