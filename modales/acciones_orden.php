<style>
  .acts{
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
  border-radius: 2px;
  margin-left: 1px;
  font-size: 12px
}

.acts:hover {background-color: #e7e7e7;}

</style>
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
        <?php
          require_once('../modelos/Despachos.php');
          $dsp = new Despachos();
          $mensajero = $dsp->get_mensajeros();
        ?>
        <div class="tab-despacho row" id="tab-despacho" style="display: none">

          <div class="col-sm-2">
            <button type="button" class="btn btn-default float-left btn-sm " onClick="Despacho Manual();" style='margin: 3px'><i class="far fa-keyboard" style="color: #0275d8;"></i> Desp. Manual</button>
          </div>
          
          <div class="col-sm-5 select2-purple">
          <select class="select2 form-control" id="user_mensajero" multiple="multiple" data-placeholder="Seleccionar mensajero" data-dropdown-css-class="select2-purple" style="width: 100%;height: ">              
            <option class="opt-msj" value="0">Seleccionar mensajero</option>
            <?php
            for ($i=0; $i < sizeof($mensajero); $i++) { ?>
            <option class="opt-msj" value="<?php echo $mensajero[$i]["codigo_emp"]." ".$mensajero[$i]["nombre"];?>"><?php echo strtoupper($mensajero[$i]["codigo_emp"]." ".$mensajero[$i]["nombre"]);?></option>
            <?php  } ?>              
            </select>
          </div>
          
          <div class="col-sm-5">
             <button type="button" class="btn btn-default float-right btn-sm " onClick="registrarAccionesOrdenes();" style='margin: 3px'><i class=" fas fa-file-export" style="color: #0275d8"></i> Registrar</button>
          </div>

        </div>
        <!--*****************TABLERO DE ACCIONES POR MODULO*******************************-->         
        <form action="" method="post" target="_blank" id="form_actions" style="display: none">
          <input type="hidden" name="correlativo_act" id="correlativo_act"/>
          <button type="button" class="btn btn-flat float-right acts btn-sm" style="cursor: pointer;" onClick="newAction();"><i class="fas fa-plus" style="color:blue"></i> Nuevo</button>
          <button type="submit" class="btn btn-flat  float-right acts btn-sm" id="print_action"><i class="fas fa-file-pdf" style="color:red"></i> Imprimir</button>
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
  
