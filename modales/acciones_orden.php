<!-- The Modal -->
  <div class="modal" id="acciones_ordenes">    
    <div class="modal-dialog" style="max-width: 75%">
      <div class="modal-content">      
        <!-- Modal Header -->
        <div class="modal-header" style="background: #162e41;color: white">
          <h4 class="modal-title" style="font-size: 14px;"><b>REGISTRO DE ORDENES<span id="correlativo_accion_act"></span></b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>        
        <!-- Modal body -->
        <div class="modal-body">

        <!--*****************TABLERO DE ACCIONES POR MODULO*******************************-->  

        <div class="tab-despacho row" id="tab-despacho" style="display: none">

          <div class="col-sm-2">
            <button type="button" class="btn btn-default float-left btn-sm " onClick="Despacho Manual();" style='margin: 3px'><i class="far fa-keyboard" style="color: #0275d8;"></i> Desp. Manual</button>
          </div>
          
          <div class="col-sm-5">
            <input type="text" class="form-control form-control-sm" placeholder="MENSAJERO" style="margin-bottom: 0px i !important">
          </div>
          
          <div class="col-sm-5">
             <button type="button" class="btn btn-default float-right btn-sm " onClick="registrarAccionesOrdenes();" style='margin: 3px'><i class=" fas fa-file-export" style="color: #0275d8"></i> Registrar</button>
          </div>

        </div>
        <!--*****************TABLERO DE ACCIONES POR MODULO*******************************-->  


        
        <form action="" method="post" target="_blank" id="form_actions" style="display: none">
          <input type="hidden" name="correlativo_act" id="correlativo_act"/>
          <button type="submit" class="btn btn-flat  float-right"><i class="fas fa-file-pdf" style="color:red"></i> Imprimir</button>
        </form>
        <input type="search" class="form-control" id="reg_accion_act" onchange="registrar_accion_act()">
          

          <table class="table-hover table-bordered" style="font-family: Helvetica, Arial, sans-serif;max-width: 100%;text-align: left;margin-top: 5px !important" width="100%">
          <thead style="font-family: Helvetica, Arial, sans-serif;width: 100%;text-align: center;font-size: 12px;" class="bg-dark">
            <th>#</th>
            <th>#Orden</th>
            <th>Paciente</th>
            <th>Optica</th>
            <th>Detalles</th>
            <th>Eliminar</th>
          </thead>
          <tbody id="items_orden_tallado_ingresos" style="font-size: 12px"></tbody>
        </table>
        </div> 
        <input type="hidden" id="tipo_accion_act">
        <audio id="success_sound"><source src="../Beep.mp3" type="audio/mp3"></audio>
        <audio id="error_sound"><source src="../error-beep.wav" type="audio/wav"></audio> 
      </div>
    </div>
  </div>
  
