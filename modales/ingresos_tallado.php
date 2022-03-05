<!-- The Modal -->
  <div class="modal" id="ing_tallado">    
    <div class="modal-dialog" style="max-width: 75%">
      <div class="modal-content">      
        <!-- Modal Header -->
        <div class="modal-header" style="background: #162e41;color: white">
          <h4 class="modal-title" style="font-size: 14px;"><b>REGISTRO DE ORDENES<span id="n_ing_tallado"></span></b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>        
        <!-- Modal body -->
        <div class="modal-body">
          <input type="text" class="form-control" id="reg_intreso_tallado" onchange="registrar_ingreso_tallado()">
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
        <audio id="success_sound"><source src="../Beep.mp3" type="audio/mp3"></audio>
        <audio id="error_sound"><source src="../error-beep.wav" type="audio/wav"></audio> 
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-block" onClick="registrarIngresoTallado();">Registar ingreso </button>
        </div>
        
      </div>
    </div>
  </div>
  
