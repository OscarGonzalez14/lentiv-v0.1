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
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="nueva_optica" style="border-radius:0px !important;">
    <div class="modal-dialog modal-lg" id="tanModal">
      <!-- cabecera de la modal-->
      <div class="modal-content" >
        <div class="modal-header" id="headModal" style="justify-content: space-between">
          <span><i class="fas fa-plus-square"></i><strong> CREAR OPTICA</strong></span>
          <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-row" autocomplete="on">
            <div class="form-group col-md-7">
              <label for="ex3">Nombre</label>
              <input type="text"  class="form-control" name="" placeholder="Nombre de optica" required="" id="nom_optica">
            </div>
            <div class="form-group col-md-5">
              <label for="ex3">Teléfono</label>
              <input type="text"  class="form-control" name="" placeholder="Teléfono de optica" required="" id="num_optica">
            </div>
          </div>
        </div>
        <input type="hidden" id='id_usuario' value="<?php echo $_SESSION['id_usuario']?>" >
        <!-- Modal footer -->
        <div class="modal-footer" style="margin-top:3px;">
          <button type="button" class="btn btn-primary btn-block" data-dismiss="modal" style="border-radius:0px" onClick="guardar_optica();"><i class="fas fa-save"></i> Guardar</button>
        </div>
      </div>
    </div>
  </div>
  </body>
  </html>

