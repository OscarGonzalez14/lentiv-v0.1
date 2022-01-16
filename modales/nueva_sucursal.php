 <style>
   #headModal{
  background-color: black;
  color: white;
  text-align: center;
}

<?php
require_once("../modelos/Opticas.php");
$optica = new Opticas();
$opti=$optica->obtener_opticas();
 ?>

 </style>
 <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="../estilos/styles.css">
  </head>
  <body>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="nueva_sucursal_optica" style="border-radius:0px !important;">
    <div class="modal-dialog modal-lg" id="tanModal">
      <!-- cabecera de la modal-->
      <div class="modal-content" >
        <div class="modal-header" style="justify-content: space-between; background: black;color: white;">
          <span id="t_dinamico"><i class="fas fa-plus-square"></i><strong> CREAR SUCURSAL DE OPTICA</strong></span>
          <button type="button" class="close" id="cerrar" data-dismiss="modal" style="color:white;">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-row">
            <div class=" form-group col-sm-4 select2-purple">
              <label for="ex3">Sucursal</label>
              <select class="select2 form-control clear_input" id="id_optica" multiple="multiple" data-placeholder="Seleccionar optica" data-dropdown-css-class="select2-purple" style="width: 100%;height: ">              
                <option value="0">Seleccione Optica</option>
                <?php
                for ($i=0; $i < sizeof($opti); $i++) { ?>
                  <option value="<?php echo $opti[$i]["id_optica"]?>"><?php echo strtoupper($opti[$i]["nombre"]);?></option>
                <?php  } ?>              
              </select>               
            </div>
            <div class="form-group col-md-8">
              <label for="ex3">Nombre</label>
              <input type="text"  class="form-control clear_input" name="" placeholder="Nombre de sucursal" required="" id="nom_sucursal" onkeyup="mayus(this);" >
            </div>
            <div class="form-group col-md-7">
              <label for="ex3">Dirección</label>
              <input type="text"  class="form-control clear_input" name="" placeholder="Dirección" required="" id="dir_sucursal" onkeyup="mayus(this);" >
            </div>
            <div class="form-group col-md-5">
              <label for="ex3">Teléfono</label>
              <input type="text"  class="form-control clear_input" name="" placeholder="Teléfono de sucursal" required="" id="tel_sucursal">
            </div>
            <div class="form-group col-md-6">
              <label for="ex3">Correo</label>
              <input type="text"  class="form-control clear_input" name="" placeholder="Correo de sucursal" required="" id="correo_sucursal">
            </div>
            <div class="form-group col-md-6">
              <label for="ex3">Encargado</label>
              <input type="text"  class="form-control clear_input" name="" placeholder="Encargado de sucursal" required="" id="encargado_sucursal" onkeyup="mayus(this);" >
            </div>
          </div>
        </div>
        <input type="hidden" class="form-control" id='id_usuario' value="<?php echo $_SESSION['id_usuario']?>" >
        <input type="hidden" class="form-control clear_input" name="" id="id_sucursal" value="">
        <input type="text" class="form-control clear_input" id="codigo_suc" readonly="" style="background: white;border: 1px solid white;color:black;text-align:right;">
        <!-- Modal footer -->
        <div class="modal-footer btns_acciones" style="margin-top:3px;">
          <button type="button" class="btn btn-primary btn-block" data-dismiss="modal" id="guardar_suc" style="border-radius:0px" onClick="guardar_sucursal();"><i class="fas fa-save"></i> Guardar</button>
          <button type="button" class="btn btn-primary btn-block" data-dismiss="modal" id="editar_suc" style="border-radius:0px" onClick="guardar_sucursal();"><i class="fas fa-save"></i> Guardar cambios</button>
        </div>
      </div>
    </div>
  </div>
  </body>
  </html>

<script>
function mayus(e) {
    e.value = e.value.toUpperCase();
}

</script>