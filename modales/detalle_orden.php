  <!-- The Modal -->
  <div class="modal fade" id="detalle_orden" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 90%">
      <div class="modal-content">
        <!-- Modal body -->
      <div class="modal-header" style="background: #162e41;color: white">
        <h5 id="det_pac_orden" class="modal-title w-100 text-center position-absolute" style="text-transform: uppercase;"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <table width="100%" style="margin-top:0px;">
            <tr>
              <th colspan="10"><img src="../dist/img/lenti_logo.png" width="85" height="65"/></th>
              <th colspan="70" style="text-align: center;margin-top: 0px;color:#0088b6;font-size:14px;font-family: Helvetica, Arial, sans-serif;"><b>ORDEN DE PRODUCCIÓN</b></th>
              <th colspan="20" style="text-align: right;"><strong>No. ORDEN</strong><br><strong style="color:red;"><span id="det_cod_orden"></strong></th>
            </tr>
          </table>
          <br>
 
          <table class="table-bordered shadow-sm p-3 mb-2 bg-white rounded" width="100%" style="text-align: center;"><!--Info sucursal-->
            <tr class="bg-dark">
              <td colspan="50" style="width: 50%">Óptica</td>
              <td colspan="50" style="width: 50%">Sucursal</td>
            </tr>
            <tr>
              <td id="det_orden_optica" style="font-weight: bold;width: 50%" colspan="50"></td>
              <td id="suc_orden_optica" style="font-weight: bold;width: 50%" colspan="50"></td>
            </tr>   
          </table>

          <table class="table-bordered shadow-sm p-3 mb-2 bg-white rounded" width="100%" style="text-align: center;"><!--Info sucursal-->
            <tr class="bg-dark">
              <td colspan="25" style="width: 25%">Tipo Lente</td>
              <td colspan="25" style="width: 25%">Marca</td>
              <td colspan="50" style="width: 50%">Tratamientos</td>
            </tr>
            <tr>
              <td colspan="25" id="det_lente_ord" style="font-weight: bold;width: 25%"></td>
              <td colspan="25" id="det_marca_lente_ord" style="font-weight: bold;width: 25%"></td>
              <td colspan="50" id="det_trats_lente_ordx" style="font-weight: bold;width: 50%"></td>
            </tr>   
          </table>

          <table class="table-bordered shadow p-3 mb-2 bg-white rounded" width="100%" style="text-align: center;"><!--Info sucursal-->
            <tr>
              <td colspan="50" style="width: 50%">
                <table width="100%">
                  <tr>
                      <th colspan="100" style="background-color:#D8D8D8;"><span class="subt">GRADUACIÓN (RX FINAL)</span></th> 
                  </tr>
                  <tr>
                     <th colspan="10">OJO</th>
                     <th colspan="18">ESFERAS</th>
                     <th colspan="18">CILINDROS</th>
                     <th colspan="18">EJE</th>
                     <th colspan="18">ADICIÓN</th>
                     <th colspan="18">PRISMA</th>
                  </tr>
                  <tr>
                     <td colspan="10"><strong>OD</strong></td>
                     <td colspan="18" id="det_esfera_od"></td>
                     <td colspan="18" id="det_cil_od"></td>
                     <td colspan="18" id="det_eje_od"></td>
                     <td colspan="18" id="det_add_od"></td>
                     <td colspan="18" id="det_prisma_od"></td>
                  </tr>
                  <tr>
                     <td colspan="10"><strong>OI</strong></td>
                     <td colspan="18" id="det_esfera_oi"></td>
                     <td colspan="18" id="det_cil_oi"></td>
                     <td colspan="18" id="det_eje_oi"></td>
                     <td colspan="18" id="det_add_oi"></td>
                     <td colspan="18" id="det_prisma_oi"></td>
                  </tr>
                </table>
              </td>
              <td colspan="50" style="width: 50%">
                <table width="100%">
                  <tr>
                   <th colspan="70" style="background-color:#D8D8D8;"><span class="subt">MEDIDAS</span></th> 
                    </tr>
                     <tr>
                       <th colspan="10">OJO</th>
                       <th colspan="20">DIST. PUPILAR</th>
                       <th colspan="20">ALT. PUPILAR</th>
                       <th colspan="20">ALT. OBLEA</th>
                     </tr>
                     <tr>
                       <td colspan="10"><strong>OD</strong></td>
                       <td colspan="20" id="det_dist_pup_od"></td>
                       <td colspan="20" id="det_alt_pup_od"></td>
                       <td colspan="20" id="det_alt_oblea_od"></td>
                     </tr>
                     <tr>
                       <td colspan="10"><strong>OI</strong></td>
                       <td colspan="20" id="det_dist_pup_oi"></td>
                       <td colspan="20" id="det_alt_pup_oi"></td>
                       <td colspan="20" id="det_alt_oblea_oi"></td>
                     </tr>
                  </table>
              </td>
            </tr>
          </table>

          <table width="100%" style="margin-top:15px;text-align: center" class="shadow p-3 mb-2 bg-white rounded">
            <tr>
              <td>
                <table width="100%" class="table-bordered">
                   <tr>
                    <th colspan="100" style="background-color:#D8D8D8; margin-top: 15px;"><span>ESPECIFICACIONES DE ARO</span></th> 
                   </tr>
                    <tr>
                      <td colspan="23" style="width: 23%"><strong>MARCA</strong></td>
                      <td colspan="9" style="width: 9%"><strong>MODELO</strong></td>
                      <td colspan="9" style="width: 9%"><strong>COLOR</strong></td>
                      <td colspan="9" style="width: 9%"><strong>DISEÑO</strong></td>
                      <td colspan="13" style="width: 13%"><strong>HORIZONT.</strong></td>
                      <td colspan="13" style="width: 13%"><strong>DIAGONAL</strong></td>
                      <td colspan="12" style="width: 12%"><strong>VERTICAL</strong></td>
                      <td colspan="12" style="width: 12%"><strong>PUENTE</strong></td>
                    </tr>
                    <tr>
                      <td colspan="23" id="marca_det_ord" style="width: 23%"></td>
                      <td colspan="9" id="modelo_det_ord" style="width: 9%"></td>
                      <td colspan="9" id="color_det_ord" style="width: 9%"></td>
                      <td colspan="9" id="dis_det_ord" style="width: 9%"></td>
                      <td colspan="13" id="hor_det_ord" style="width: 13%"></td>
                      <td colspan="13" id="diag_det_orden" style="width: 13%"></td>
                      <td colspan="12" id="vert_det_ord" style="width: 12%"></td>
                      <td colspan="12" id="puente_det_ord" style="width: 12%"></td>
                   </tr>
                </table>
              </td>
            </tr>
           </table>
          <br>
          <div class="eight">
          <h1>HISTORIAL</h1>
            <table width="100%" class="table-hover table-bordered display nowrap">
              <tr style="text-align: center;font-size: 12px;background: #162e41;color: white;margin-top: 5px">
                <td colspan="15" class="ord_1" style="width:10%">Fecha</td>
                <td colspan="25" class="ord_1" style="width:25%">Usuario</td>
                <td colspan="25" class="ord_1" style="width:25%">Acción</td>
                <td colspan="35" class="ord_1" style="width:35%">Observaciones</td>
              </tr>
             
              <tbody id="historial_orden_detalles" class="ord_2" style="text-align: center;font-size: 13px;"></tbody>
            </table>
          </div>     

        </div><!--FIN BODY-->
      </div>
    </div>
  </div>
  
