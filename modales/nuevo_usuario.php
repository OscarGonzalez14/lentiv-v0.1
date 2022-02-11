 
<?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s");?>
 <style>
   #headModal{
  background-color: black;
  color: white;
  text-align: center;
}

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
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="nuevo_usuario" style="border-radius:0px !important;">
    <div class="modal-dialog modal-lg" id="tanModal">
      <!-- cabecera de la modal-->
      <div class="modal-content" >
        <div class="modal-header" id="headModal" style="justify-content: space-between">
          <span id="titulo"><i class="fas fa-plus-square"></i><strong> NUEVO USUARIO</strong></span>
          <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-row" autocomplete="on">
            <div class="form-group col-md-9">
              <label for="ex3">Nombre</label>
              <input type="text"  class="form-control" name="" placeholder="Nombre completo" required="" id="nombre" onkeyup="mayus(this);">
            </div>
            <div class="form-group col-md-3">
              <label for="ex3">Teléfono</label>
              <input type="text" class="form-control" name="" placeholder="Teléfono" required="" id="telefono" required pattern='^[0-9]+'>
            </div>
            <div class="form-group col-md-6">
              <label for="ex3">Dirección</label>
              <input type="text"  class="form-control" name="" placeholder="Dirección" required="" id="direccion" onkeyup="mayus(this);">
            </div>
            <div class="form-group col-md-6">
              <label for="ex3">Correo</label>
              <input type="text"  class="form-control" name="" placeholder="Correo electrónico" required="" id="correo">
            </div>
            <div class="form-group col-md-4">
              <label for="ex3">Departamento</label>
              <select class="form-control" name="" id="depto" required="">
                <option value="Recepcion">Recepción</option>
                <option value="Bodega">Bodega</option>
                <option value="Digitado">Digitado</option>
                <option value="Bloqueo">Bloqueo</option>
                <option value="Generado">Generado</option>
                <option value="Pulido">Pulido</option>
                <option value="Coauting">Coauting</option>
                <option value="AR">AR</option>
                <option value="Montaje">Montaje</option>
                <option value="Control Calidad">Control Calidad</option>
                <option value="Facturacion">Facturación</option>
                <option value="Mensajeria">Mensajería</option>
              </select>
            </div>         
            <div class="form-group col-md-4">
              <label for="ex3">DUI</label>
              <input type="text"  class="form-control" name="" placeholder="Número DUI" required="" id="dui">
            </div>
            <div class="form-group col-md-4">
              <label for="ex3">NIT</label>
              <input type="text"  class="form-control" name="" placeholder="Número NIT" required="" id="nit">
            </div>
            <div class="form-group col-md-3">
              <label for="ex3">Usuario</label>
              <input type="text"  class="form-control" name="" placeholder="Usuario" required="" id="usuario">
            </div>
            <div class="form-group col-md-3">
              <label for="ex3">Contraseña</label>
              <input type="text"  class="form-control" name="" placeholder="Contraseña" required="" id="pass">
            </div>
            <div class="form-group col-md-3">
              <label for="ex3">Nick</label>
              <input type="text"  class="form-control" name="" placeholder="1nombre 1apellido" required="" id="nick" onkeyup="mayus(this);">
            </div>
            <div class="form-group col-md-3">
              <label for="ex3">ISSS</label>
              <input type="text"  class="form-control" name="" placeholder="Número ISSS" required="" id="isss">
            </div>
            <div class="form-group col-md-3">
              <label for="ex3">AFP</label>
              <input type="text"  class="form-control" name="" placeholder="Número AFP" required="" id="afp">
            </div>
            <div class="form-group col-md-3">
              <label for="ex3">Cuenta Bancaria</label>
              <input type="text"  class="form-control" name="" placeholder="Número cuenta" required="" id="cuenta">
            </div>
          </div>
        </div>

        <input type="text" id="estado" value='1'>
        <input type="text" id="id_usuario" value="<?php echo $_SESSION['id_usuario']?>" >
        <input type="text" id="id_user" name="">
        <input type="text" id="fecha" value="<?php echo $hoy;?>">
        <input type="text" class="form-control clear_input" id="codigo_user" readonly="" style="background: white;border: 1px solid white;color:black;text-align:right;">
        <!-- Modal footer -->

        <div class="modal-footer" style="margin-top:3px;">
          <button type="button" class="btn btn-primary btn-block" data-dismiss="modal" style="border-radius:0px" id="guardar_usuario" onClick="guardar_usuario();"><i class="fas fa-save"></i> Guardar</button>

          <button type="button" class="btn btn-primary btn-block" data-dismiss="modal" style="border-radius:0px" id="editar_usuario" onClick="guardar_usuario();"><i class="fas fa-save"></i> Guardar Cambios</button>
        </div>
      </div>
    </div>
  </div>
  </body>
  </html>

