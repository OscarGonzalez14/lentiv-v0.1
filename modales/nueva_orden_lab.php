 <div class="modal fade" id="nueva_orden_lab" style="text-transform: uppercase;">
        <div class="modal-dialog modal-xl" style="max-width: 95%">
          <div class="modal-content">
            <div class="modal-header bg-dark">
              <h4 class="modal-title" style="font-size: 15px">ORDEN DE PRODUCCION &nbsp;&nbsp;<span id="correlativo_op"></span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"><!--START MODAL BODY-->
            <form action="barcode_orden_print.php" method="POST" target="print_popup" onsubmit="window.open('about:blank','print_popup','width=600,height=500');">  
            <div class="eight datos-generales">
              <strong><h1>DATOS GENERALES</h1></strong>
              <div class="form-row" style="margin-top: 1px"><!--./Inicio Form row-->

              <div class="form-group col-sm-5">
                <label for="inlineFormInputGroup">Paciente</label>
                <input type="text" class="form-control clear_orden_i" id="paciente_orden" name="paciente_orden" autocomplete='off'>
              </div>

                <div class="form-group col-sm-3">
                  <label for="inputPassword4">Óptica</label>
                  <select class="form-control clear_orden_i" id="optica_orden" name="optica_orden" required>
                  <option value="0">Seleccionar optica...</option>
                      <?php
                        for($i=0; $i<sizeof($suc);$i++){?>
                              <option value="<?php echo $suc[$i]["id_optica"]?>"><?php echo $suc[$i]["nombre"];?></option>
                             <?php
                           }
                        ?>
                  </select>
                </div>

                <div class="form-group col-sm-4">
                  <label for="inputPassword4">Sucursal</label>
                  <select class="form-control clear_orden_i" id="optica_sucursal" name="optica_sucursal" required>                 
                  </select>
                </div>  

              </div><!--./Fin Form row-->
            </div><!--./*********Fin datos-generales************-->

            <div class="eight"style="align-items: center">
              <strong><h1 style="color:#034f84">TIPO LENTE</h1></strong>
              <div class="row">
                  <div class="col-sm-4" class="d-flex justify-content-center" style="display:flex;justify-content: center;margin-top:0px;">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input checkit" type="radio" id="lentevs" value="Visión Sencilla" name="tipo_lente" onClick='valida_adicion();'>
                      <label class="form-check-label" for="inlineCheckbox2" id="">Visión Sencilla</label>
                    </div>
                  </div>
                  <div class="col-sm-4" style="display:flex;justify-content: center;margin-top:0px;">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input checkit" type="radio" id="lentebf" value="Bifocal" name="tipo_lente" onClick='valida_adicion();'>
                      <label class="form-check-label" for="inlineCheckbox2" id="">Bifocal</label>
                    </div>
                  </div>
                  <div class="col-sm-4" style="display:flex;justify-content: center;margin-top:0px;">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input checkit" type="radio" id="lentemulti" value="Multifocal" name="tipo_lente" onClick='valida_adicion();'>
                      <label class="form-check-label" for="inlineCheckbox2" id="">Multifocal</label>
                    </div>
                  </div>
              </div>
            </div>
            <!--################ RX final + medidas #############-->
            <div class="eight">
              <strong><h1 style="color: #034f84">GRADUACIÓN(Rx Final) Y MEDIDAS</h1></strong>
              <div class="row">
                <div class="col-sm-6">    
                  <table style="margin:0px;width:100%">
                    <thead class="thead-light" style="color: black;font-family: Helvetica, Arial, sans-serif;font-size: 11px;text-align: center;background: #f8f8f8">
                      <tr>
                        <th style="text-align:center">OJO</th>
                        <th style="text-align:center">ESFERAS</th>
                        <th style="text-align:center">CILIDROS</th>
                        <th style="text-align:center">EJE</th>      
                        <th style="text-align:center">ADICION</th>
                       <th style="text-align:center">PRISMA</th>        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>OD</td>
                        <td> <input type="text" class="form-control clear_orden_i"  id="odesferasf_orden"  style="text-align: center"></td>
                        <td> <input type="text" class="form-control clear_orden_i"  id="odcilindrosf_orden"  style="text-align: center"></td>
                        <td> <input type="text" class="form-control clear_orden_i"  id="odejesf_orden"  style="text-align: center"></td>             
                       <td> <input type="text" class="form-control clear_orden_i"  id="oddicionf_orden"  style="text-align: center"></td>
                        <td> <input type="text" class="form-control clear_orden_i"  id="odprismaf_orden"  style="text-align: center"></td>                
                      </tr>
                      <tr>
                        <td>OI</td>
                        <td> <input type="text" class="form-control clear_orden_i"  id="oiesferasf_orden"   style="text-align: center"></td>
                        <td> <input type="text" class="form-control clear_orden_i"  id="oicolindrosf_orden"   style="text-align: center"></td>
                        <td> <input type="text" class="form-control clear_orden_i"  id="oiejesf_orden"   style="text-align: center"></td>              
                        <td> <input type="text" class="form-control clear_orden_i"  id="oiadicionf_orden"  style="text-align: center"></td>
                        <td> <input type="text" class="form-control clear_orden_i"  id="oiprismaf_orden"  style="text-align: center"></td>     
                      </tr>
                    </tbody>
                  </table>
                  </div>

                  <div class="col-sm-6" style="margin-left: 0px">
                      <table width="100%">
                      <thead class="thead-light" style="color: black;font-family: Helvetica, Arial, sans-serif;font-size: 11px;text-align: center;background: #f8f8f8">
                        <th colspan="5" style="width: 5%"></th>
                        <th colspan="5" style="width: 5%;text-align: center">DISTANCIA PUPILAR</th>
                        <th colspan="5" style="width: 5%;text-align: center">ALTURA PUPILAR</th>
                        <th colspan="5" style="width: 5%;text-align: center">Altura oblea</th>
                      </thead>
                      <tr>
                        <td colspan="5" style="text-align:right;">OD</td>
                        <td colspan="5"><input style="text-align: center"  id="dip_od" class="form-control clear_orden_i"></td>
                        <td colspan="5"><input style="text-align: center"  id="ap_od" class="form-control clear_orden_i"></td>
                        <td colspan="5"><input style="text-align: center"  id="ao_od" class="form-control clear_orden_i"></td>
                      </tr>
                      <tr>
                        <td colspan="5" style="text-align:right;">OI</td>
                        <td colspan="5"><input style="text-align: center"  id="dip_oi" class="form-control clear_orden_i"></td>
                        <td colspan="5"><input style="text-align: center"  id="ap_oi" class="form-control clear_orden_i"></td>
                        <td colspan="5"><input style="text-align: center"  id="ao_oi" class="form-control clear_orden_i"></td>
                      </tr>
                      </table>
                  </div>
              </div>
            </div>
<!--################ FIN rx final + medidas #############-->
          <div class="row tratamientos" id="tratamientos_section">

            <div class="col-sm-5 antirrflejantes">

                <div class="eight" style="align-items: center">
                  <h1>ANTIRREFLEJANTE</h1>
                  <div class="d-flex justify-content-center">

                    <div class="form-check form-check-inline">
                      <input class="form-check-input items_tratamientos checkit" type="checkbox" id="arbluecap" value="Blue Cap" name='chk_tratamientos'  onClick='status_checks_tratamientos(this.id);'>
                      <label class="form-check-label" for="inlineCheckbox1" id="lbl_arbluecap">Blue Cap</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input items_tratamientos checkit" type="checkbox" id="arnouv" value="No Uv" name='chk_tratamientos' onClick='status_checks_tratamientos(this.id);'>
                      <label class="form-check-label" for="inlineCheckbox2" id="lbl_arnouv">No UV</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input items_tratamientos checkit" type="checkbox" id="arsh" value="ARSH" name='chk_tratamientos' onClick='status_checks_tratamientos(this.id);'>
                      <label class="form-check-label" for="inlineCheckbox3" id="lbl_arsh">ARSH</label>
                    </div>
                  </div>

                </div>

            </div><!--antirrflejantes-->

            <div class="col-sm-2">
            <div class="eight">
              <h1>BLANCO</h1>
                  <div class="d-flex justify-content-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input items_tratamientos checkit" type="checkbox" id="blanco" value="Blanco" name='chk_tratamientos' onClick='status_checks_tratamientos(this.id);'>
                        <label class="form-check-label" for="inlineCheckbox2" id="lbl_blanco"></label>
                    </div>
                  </div>
            </div>
          </div>

          <div class="col-sm-5">
              <div class="eight">
                <h1>PHOTOSENSIBLE</h1>
                    <div class="d-flex justify-content-center">
                      <div class="form-check form-check-inline">
                          <input class="form-check-input items_tratamientos" type="checkbox" id="photocromphoto" value="Photocrom" name='chk_tratamientos' onClick='status_checks_tratamientos(this.id);'>
                        <label class="form-check-label" for="inlineCheckbox1">Photocrom</label>
                      </div>

                      <div class="form-check form-check-inline ">
                          <input class="form-check-input items_tratamientos checkit" type="checkbox" id="transitionphoto" value="Transitions" name='chk_tratamientos' onClick='status_checks_tratamientos(this.id);'>
                          <label class="form-check-label" for="inlineCheckbox2" id="lbl_transitionphoto">Transitions</label>
                      </div>
                    </div>
              </div>
            </div>
   
          </div> <!--Fin tratamientos-->

          <div class="row">
              <div class="col-sm-11" style="margin: 30px;">
                <div class="input-group" style="margin: auto;">
                  <div class="input-group-prepend bg-light">
                    <span class="input-group-text bg-info">
                      <input type="checkbox" class="form-check-input check_trat" id="chk_trat" value="PPrR" onClick="chk_otros_tratamientos()">
                      <label class="form-check-label" for="inlineCheckbox1">Otro tratamiento</label>
                    </span>
                  </div>
                    <input type="text" class="form-control" id="otros_trat">
                </div>
            </div> 
          </div>

        <!--Tratamientos de multifocal-->
          <div class="eight"style="align-items: center">

              <strong><h1 style="color:#034f84">MARCAS DE MULTIFOCAL</h1></strong>
              <div class="row">
                  <div class="col-sm-3" class="d-flex justify-content-center" style="display:flex;justify-content: center;margin-top:0px;">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input checkit" type="radio" id="Alena" value="Alena" name="tratamiento_multifocal">
                      <label class="form-check-label" for="inlineCheckbox2" id="">Alena</label>
                    </div>
                  </div>
                  <div class="col-sm-3" style="display:flex;justify-content: center;margin-top:0px;">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input checkit" type="radio" id="Aurora4D" value="Aurora 4D" name="tratamiento_multifocal">
                      <label class="form-check-label" for="inlineCheckbox2" id="">Aurora 4D</label>
                    </div>
                  </div>
                  <div class="col-sm-3" style="display:flex;justify-content: center;margin-top:0px;">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input checkit" type="radio" id="Aurora_a_clear" value="Aurora A Claar" name="tratamiento_multifocal">
                      <label class="form-check-label" for="inlineCheckbox2" id="">Aurora A Clear</label>
                    </div>
                  </div>
                  <div class="col-sm-3" style="display:flex;justify-content: center;margin-top:0px;">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input checkit" type="radio" id="Gemini" value="Gemini" name="tratamiento_multifocal">
                      <label class="form-check-label" for="inlineCheckbox2" id="">Gemini</label>
                    </div>
                  </div>
              </div>
            </div>

          <div class="eight">
            <h1>ARO</h1>

            <div class="form-row align-items-center row" style="margin: 4px">

              <div class="form-group col-sm-3">
                <label for="">Marca</label>
                <input type="text" class="form-control clear_orden_i" id="marca_aro_orden">
              </div>

              <div class="form-group col-sm-3">
                <label for="">Modelo</label>
                <input type="text" class="form-control clear_orden_i" id="modelo_aro_orden">
              </div>

              <div class="form-group col-sm-3">
                <label for="">Color</label>
                <input type="text" class="form-control clear_orden_i" id="color_aro_orden">
              </div>

              <div class="form-group col-sm-3">
                  <label for="">Diseño</label>
                  <select class="form-control clear_orden_i" id="diseno_aro_orden">
                  <option value="Cerrado">Cerrado</option>
                  <option value="Semia-aereo">Semia-aereo</option>
                  <option value="Areo">Areo</option>                 
                  </select>
                </div>
              </div>

            <table style="margin:0px;width:100%">
              <thead class="thead-light" style="color: black;font-family: Helvetica, Arial, sans-serif;text-align: center;background: #f8f8f8">
                <tr>
                  <th  colspan="25" style="text-align:center;width:25%">HORIZONTAL</th>
                  <th  colspan="25" style="text-align:center;width:25%">DIAGONAL</th>
                  <th  colspan="25" style="text-align:center;width:25%">VERTICAL</th>
                  <th  colspan="25" style="text-align:center;width:25%">PUENTE</th>        
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="25" style="width: 25%"> <input type="text" class="form-control clear_orden_i" placeholder="---" id="med_a"></td>
                  <td colspan="25" style="width: 25%"> <input type="text" class="form-control clear_orden_i" placeholder="---" id="med_b"></td>
                  <td colspan="25" style="width: 25%"> <input type="text" class="form-control clear_orden_i" placeholder="---" id="med_c"></td>     
                  <td colspan="25" style="width: 25%"> <input type="text" class="form-control clear_orden_i" placeholder="---" id="med_d"></td>              
                </tr>
              </tbody>  
            </table>

            <div class="form-group col-sm-12">
              <label for="">Observaciones</label>
              <input type="text" class="form-control clear_orden_i" id="observaciones_orden">
            </div>
            
         </div> 
          <input type="hidden" id="codigoOrden" name="codigoOrden">
        </form>
          </div><!--/END MODAL BODY-->
            <div class="modal-footer justify-content-between">            
              <button type="button" class="btn btn-primary btn-block" onClick='saveOrder();'>Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->