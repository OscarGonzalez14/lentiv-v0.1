<style>
  .add_order:active {
  background-color: yellow;
}
</style>
<!-- Modal -->
<div class="modal fade" id="modal_descargo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 91%">
    <div class="modal-content">
      <div class="modal-header">
      <div class="form-row"><!--INPUTS-->

      <div class="col-sm-3">
        <label> Cod. Orden</label>
          <div class="input-group">
          <input type="text" class="form-control clear_orden_i data_descargos" id="cod_orden_current" placeholder="codigo orden scan" onchange="get_dets_orden()" autocomplete="off">
          <div class="input-group-append edit_field_desc" name="cod_orden_current" onClick="clearDataOrdenDesc()">
            <span class="input-group-text bg-danger"><i class="fas fa-times-circle"> </i></span>
          </div>             
        </div>
      </div>

      <div class="col-sm-4">
        <label> OD Lente</label>
          <div class="input-group">
          <input type="text" class="form-control clear_orden_i" id="cod_lente_inv" placeholder="Lente OD" onchange="valida_tipo_lente('derecho')" autocomplete="off">
          <div class="input-group-append edit_field_desc" name="cod_lente_inv">
            <span class="input-group-text bg-info"><i class="fas fa-edit"> </i></span>
          </div>             
        </div>
      </div>

      <div class="col-sm-4">
        <label>OI Lente</label>
          <div class="input-group">
          <input type="text" class="form-control clear_orden_i" id="cod_lente_oi" placeholder="Lente OI" onchange="valida_tipo_lente('izquierdo')" autocomplete="off">
          <div class="input-group-append edit_field_desc" name="cod_lente_oi">
            <span class="input-group-text bg-info"><i class="fas fa-edit"> </i></span>
          </div>             
        </div>
      </div>
    
    <div class="col-sm-1">
      <label style="color: white">Agr.</label>
    <button class="btn btn-primary add_order"  style="border-radius: 3px;font-family: Helvetica, Arial, sans-serif;font-size: 14px;text-align: center" onClick="agregarDescargo()"><i class="fas fa-plus" style="margin-top: 2px" id="add_ord"></i></button>
  </div>
    </div><!--FIN INPUTS-->

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div><!--HEADER-->

    <div class="modal-body">

        <div class="card card-solid">
        <div class="card-body pb-0">
        <div class="row d-flex align-items-between" style="display: flex;flex-wrap: wrap;align-content: space-between;">

            <div class="col-12 col-sm-12 col-md-7"><!--Inicio Item-->
              <div class="card" style="border: solid 2px #5bc0de">
                <div class="card-footer" style="border-bottom: solid 1px #0275d8;" id="block_header">
                  <div class="text-left" style="font-size: 16px;font-weight: bold;">
                    <i class="fas fa-file-alt"></i> Orden: <span id="cod_det_orden_descargo" class="data_orden_desc"></span>
                      &nbsp;&nbsp;&nbsp;
                    <i class="fas fa-user"></i> Paciente: <span id="pac_orden_desc" class="data_orden_desc"></span>
                  </div>
                </div>
                <div class="card-body pt-0"> <!--INICIO CONTENIDO DETALLE ORDEN-->
                <table class="table table-hover table-responsive" style="font-family: Helvetica, Arial, sans-serif;width: 100%;text-align: left;font-size: 14px" width="100">
                    <tr>
                       <td scope="col"><b>Óptica: </b><span id="optica_orden_suc" class="data_orden_desc"></span></td>
                       <td scope="col"><b>Sucursal: </b><span id="sucursal_optica_orden" class="data_orden_desc"></span></td>
                       <td scope="col"><b>Tipo Lente:</b> <span id="tipo_lente_ord" class="data_orden_desc"></span></td>
                      </tr>                 

                  </table>
                  
                  <div class="row">
                    <div class="col-sm-12">
                      
                    <table class="table-hover table-bordered" style="font-family: Helvetica, Arial, sans-serif;max-width: 100%;text-align: left;margin-top: 0px !important" width="100%">
                    <h5 style="font-family: Helvetica, Arial, sans-serif;width: 100%;text-align: center;font-size: 13px;padding: 1px;border-top-left-radius: 4px;border-top-right-radius: 4px;margin-bottom: 0px" class="bg-info">RX FINAL</h5>                     
                      <thead style="font-family: Helvetica, Arial, sans-serif;width: 100%;text-align: center;font-size: 10px;" class="bg-dark">
                        <th>OJO</th>
                        <th>ESFERAS</th>
                        <th>CILINDROS</th>
                        <th>EJE</th>
                        <th>ADICION</th>
                        <th>PRISMA</th>
                      </thead>
                      <tr style="text-align: center;font-size: 12px">
                        <td class="bg-dark">OD</td>
                        <td><span id="esf_od" class="data_orden_desc"></span></td>
                        <td><span id="cil_od" class="data_orden_desc"></span></td>
                        <td><span id="eje_od" class="data_orden_desc"></span></td>
                        <td><span id="adi_od" class="data_orden_desc"></span></td>
                        <td><span id="pri_od" class="data_orden_desc"></span></td>
                      </tr>

                      <tr style="text-align: center;font-size: 12px">
                        <td class="bg-dark">OI</td>
                        <td><span id="esf_oi" class="data_orden_desc"></span></td>
                        <td><span id="cil_oi" class="data_orden_desc"></span></td>
                        <td><span id="eje_oi" class="data_orden_desc"></span></td>
                        <td><span id="adi_oi" class="data_orden_desc"></span></td>
                        <td><span id="pri_oi" class="data_orden_desc"></span></td>
                      </tr>

                    </table>

                    <table class="table-hover table-bordered" style="font-family: Helvetica, Arial, sans-serif;max-width: 100%;text-align: left;margin-top: 0px !important" width="100%">
                    <h5 style="font-family: Helvetica, Arial, sans-serif;width: 100%;text-align: center;font-size: 13px;padding: 1px;margin-bottom: 0px" class="bg-info">DISTANCIA Y ALTURAS</h5>                     
                      <thead style="font-family: Helvetica, Arial, sans-serif;width: 100%;text-align: center;font-size: 10px;" class="bg-dark">
                        <th>OJO</th>
                        <th>DIST. PUPILAR</th>
                        <th>ALT. PUPILAR</th>
                        <th>ALT. DE OBLEA</th>
                      </thead>

                      <tr style="text-align: center;font-size: 12px">
                        <td class="bg-dark">OD</td>
                        <td><span id="od_dip" class="data_orden_desc"></span></td>
                        <td><span id="od_ap" class="data_orden_desc"></span></td>
                        <td><span id="od_ao" class="data_orden_desc"></span></td>
                      </tr>

                      <tr style="text-align: center;font-size: 12px">
                        <td class="bg-dark">OI</td>
                        <td><span id="oi_dip" class="data_orden_desc"></span></td>
                        <td><span id="oi_ap" class="data_orden_desc"></span></td>
                        <td><span id="oi_ao" class="data_orden_desc"></span></td>
                      </tr>
                    </table>

                    <table class="table-hover table-bordered" style="font-family: Helvetica, Arial, sans-serif;max-width: 100%;text-align: left;margin-top: 0px !important" width="100%">
                    <h5 style="font-family: Helvetica, Arial, sans-serif;width: 100%;text-align: center;font-size: 13px;padding: 1px;margin-bottom: 0px" class="bg-info">ARO ORDEN</h5>                     
                      <tr style="font-family: Helvetica, Arial, sans-serif;width: 100%;text-align: center;font-size: 10px;" class="bg-dark">
                        <td>MODELO</td>
                        <td>MARCA</td>
                        <td>COLOR</td>
                        <td>DISEÑO</td>
                        <td>HORIZONTAL</td>
                        <td>DIAGONAL</td>
                        <td>VERTICAL</td>
                        <td>PUENTE</td>
                      </tr>
                      <tr style="text-align: center;font-size: 12px">
                        <td><span id="mod_aro_orden" class="data_orden_desc"></span></td>
                        <td><span id="marca_aro_orden" class="data_orden_desc"></span></td>
                        <td><span id="color_aro_orden" class="data_orden_desc"></span></td>
                        <td><span id="dis_aro_orden" class="data_orden_desc"></span></td>
                        <td><span id="hor_aro_orden" class="data_orden_desc"></span></td>
                        <td><span id="diagonal_aro_orden" class="data_orden_desc"></span></td>
                        <td><span id="vertical_aro_orden" class="data_orden_desc"></span></td>
                        <td><span id="puente_aro_orden" class="data_orden_desc"></span></td>
                      </tr>
                    </table>

                    <div class="row form-group">
                      <div class="col-sm-12">
                        <b>Observaciones:</b> <span id="obs_orden" class="data_orden_desc"></span>
                      </div>
                    </div>

                    </div>

                  </div>
 

                </div><!--INICIO CONTENIDO DETALLE ORDEN-->
              </div>
            </div><!--Inicio Item-->

            <div class="col-12 col-sm-12 col-md-5"><!--Inicio Item-->
              <div class="card bg-light" style="border: solid 2px #0275d8">
                <div class="card-footer" style="border-bottom: solid 1px #5bc0de;">
                  <div class="text-left">
                      <a href="#" class="btn btn-sm btn-dark">
                      <i class="fas fa-glasses"></i> Lentes
                    </a>
                  </div>
                </div>
                <div class="card-body pt-0">
                  <!--SECCION OJO DERECHO--->
                  <h5 id="encabezado_od" style="font-family: Helvetica, Arial, sans-serif;width: 100%;text-align: center;font-size: 13px;padding: 1px;margin-top: 5px;color: white"></h5>

                  <div id="data_desc_derecho" style="border:solid #112438 2px;margin-top: 0px"></div><br>
                   <!--SECCION OJO IZQUIERDO--->              
                  <div id="data_desc_izq" style="border:solid #0275d8 2px;margin-top: 0px"></div>                 
                </div>
              </div>
            </div><!--Inicio Item-->
        </div>
        </div>
        </div>
        <input type="hidden" id="id_optica_desc">
        <input type="hidden" id="id_sucursal_desc">
      <audio id="error_sound_desc"><source src="../error-beep.wav" type="audio/wav"></audio>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-block" style="background: #112438;color: white;border-radius: 0px" onClick="registrarDescargo();">REGISTRAR DESCARGO</button>
      </div>-->
    </div>
  </div>
</div>