 <div class="modal fade" id="nueva_orden_lab" style="text-transform: uppercase;">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" style="max-width: 85%">
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
                        <td> <input type="text" class="form-control clear_orden_i esf_cil"  id="odesferasf_orden"  style="text-align: center"></td>
                        <td> <input type="text" class="form-control clear_orden_i esf_cil"  id="odcilindrosf_orden"  style="text-align: center"></td>
                        <td> <input type="text" class="form-control clear_orden_i"  id="odejesf_orden"  style="text-align: center"></td>             
                       <td> <input type="text" class="form-control clear_orden_i"  id="oddicionf_orden"  style="text-align: center"></td>
                        <td> <input type="text" class="form-control clear_orden_i"  id="odprismaf_orden"  style="text-align: center"></td>                
                      </tr>
                      <tr>
                        <td>OI</td>
                        <td> <input type="text" class="form-control clear_orden_i esf_cil"  id="oiesferasf_orden"   style="text-align: center"></td>
                        <td> <input type="text" class="form-control clear_orden_i esf_cil"  id="oicolindrosf_orden"   style="text-align: center"></td>
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

            <div class="eight"style="align-items: center">
              <strong><h1 style="color:#034f84">TIPO LENTE</h1></strong>
              <div class="row">
                  <div class="col-sm-4" class="d-flex justify-content-center" style="display:flex;justify-content: center;margin-top:0px;">
                    <div class="form-check form-check-inline icheck-primary d-inline">
                      <input class="form-check-input tipos_lentes check_clear" type="radio" id="lentevs" value="Visión Sencilla" name="tipo_lente" onClick='verTipoLente(this.id);' style="width: 30px;height: 30px;">
                      <label class="form-check-label" for="lentevs" id="">Visión Sencilla</label>
                    </div>
                  </div>
                  <div class="col-sm-4" style="display:flex;justify-content: center;margin-top:0px;">
                    <div class="form-check form-check-inline icheck-primary d-inline">
                      <input class="form-check-input tipos_lentes check_clear" type="radio" id="lentebf" value="Bifocal" name="tipo_lente" onClick='verTipoLente(this.id);'>
                      <label class="form-check-label" for="lentebf" id="">Bifocal</label>
                    </div>
                  </div>
                  <div class="col-sm-4" style="display:flex;justify-content: center;margin-top:0px;">
                    <div class="form-check form-check-inline icheck-primary d-inline">
                      <input class="form-check-input tipos_lentes check_clear" type="radio" id="lentemulti" value="Multifocal" name="tipo_lente" onClick='verTipoLente(this.id);'>
                      <label class="form-check-label" for="lentemulti" id="">Multifocal</label>
                    </div>
                  </div>
              </div>
            </div>
          <!--################## DISENOS DE LENTES ######################-->
          <?php
              require_once '../modelos/Productos.php';
              $productos = new Productos();
          ?>
          <div class="row disenosvs" id="disenos_vs" style="display: none;">
            <div class="col-sm-12 antirrflejantes">
                <div class="eight" style="align-items: center;background: #F0F7F7;">
                  <h1 style="color:#084B4F">DISEÑOS VISIÓN SENCILLA</h1>
                  <?php
                  $tipo_lente = "Vision sencilla";
                  $checks = $productos->get_disenos_lentes($tipo_lente); ?> 
                  <div class="d-flex justify-content-center">
                  <?php  foreach ($checks as $key) { ?>                  
                  <div class="form-check form-check-inline">
                    <input class="form-check-input check_clear input-vs" type="radio" id="<?php echo "disvs".$key["id_dis_lente"];?>" value="<?php echo $key["nombre_diseno"];?>" name='checksvs'  onClick='selectDisenoVs(this.id);'>
                    <label class="form-check-label" for="<?php echo "disvs".$key["id_dis_lente"];?>" id="lbl_arbluecap"><?php echo $key["nombre_diseno"]; ?></label>
                  </div>
                <?php   }
                  ?>
                </div>
                </div>
            </div>
          </div>

          <div class="row disenosvs" id="bifocales" style="display: none;">
            <div class="col-sm-12 antirrflejantes">
                <div class="eight" style="align-items: center;background:#F9F4F7;">
                  <h1 style="color:#30081E ">DISEÑOS BIFOCAL</h1>
                  <?php
                  $tipo_lente = "Bifocal";
                  $checks = $productos->get_disenos_lentes($tipo_lente); ?> 
                  <div class="d-flex justify-content-center">
                  <?php  foreach ($checks as $key) { ?>                  
                  <div class="form-check form-check-inline">
                    <input class="form-check-input check_clear input-bf" type="radio" id="<?php echo "disvs".$key["id_dis_lente"];?>" value="<?php echo $key["nombre_diseno"];?>" name='checksvs'  onClick='status_checks_tratamientos(this.id);'>
                    <label class="form-check-label" for="<?php echo "disvs".$key["id_dis_lente"];?>" id="lbl_arbluecap"><?php echo $key["nombre_diseno"]; ?></label>
                  </div>
                <?php   }
                  ?>
                </div>
                </div>
            </div>
          </div>

           <div class="row disenosvs" id="multifocales" style="display:none">
            <div class="col-sm-12 antirrflejantes">
                <div class="eight" style="align-items: center;background:#EAECEE;">
                  <h1 style="color:#17202A">DISEÑOS MULTIFOCAL</h1>
                  <?php
                  $tipo_lente = "Multifocal";
                  $checks = $productos->get_disenos_lentes($tipo_lente); ?> 
                  <div class="d-flex justify-content-center">
                  <?php  foreach ($checks as $key) { ?>                  
                  <div class="form-check form-check-inline">
                    <input class="form-check-input check_clear input-mf" type="radio" id="<?php echo "disvs".$key["id_dis_lente"];?>" value="<?php echo $key["nombre_diseno"];?>" name='checksvs'>
                    <label class="form-check-label" for="inlineCheckbox1" id="lbl_arbluecap"><?php echo $key["nombre_diseno"]; ?></label>
                  </div>
                <?php   }
                  ?>
                </div>
                </div>
            </div>
          </div>          

         <!--################## TRATAMIENTOS ######################-->
          <div class="row tratamientos" id="tratamientos_section">
            <div class="col-sm-2">
            <div class="eight">
              <h1>BLUE UV</h1>
                  <div class="d-flex justify-content-center">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input items_tratamientos checks check_clear" type="checkbox" id="blanco" value="Blanco" name='chk_tratamientos'  data-element="blanco" onclick="getSelectItemThat(this.id)">
                      <label class="form-check-label" for="blanco" id="lbl_blanco"></label>
                    </div>
                  </div>
            </div>
          </div>

          <div class="col-sm-5">
              <div class="eight">
                <h1>PHOTOSENSIBLE</h1>
                    <div class="d-flex justify-content-center">
                      <div class="form-check form-check-inline">
                          <input class="form-check-input items_tratamientos checks check_clear" type="checkbox" id="fotochroma" value="FOTOCHROMA" name='chk_tratamientos'  data-element="fotochroma" onclick="getSelectItemThat(this.id)">
                        <label class="form-check-label" for="fotochroma">FOTOCHROMA</label>
                      </div>

                      <div class="form-check form-check-inline">
                          <input class="form-check-input items_tratamientos checks check_clear" type="checkbox" id="transition" value="TRANSITION" name='chk_tratamientos' data-element="transition" onclick="getSelectItemThat(this.id)">
                          <label class="form-check-label" for="transition" id="lbl_transitionphoto">TRANSITION</label>
                      </div>
                    </div>
              </div>
            </div>

            <div class="col-sm-5 antirrflejantes">
                <div class="eight" style="align-items: center">
                  <h1>ANTIRREFLEJANTE</h1>
                  <div class="d-flex justify-content-center">

                    <div class="form-check form-check-inline ">
                      <input class="form-check-input checks check_clear" type="radio" id="arblueuv" value="Ar Blue UV" name='chk_antiR' data-element="0">
                      <label class="form-check-label" for="arblueuv" id="lbl_arbluecap">TERMINADO AR BLUE UV</label>
                    </div>

                    <div class="custom-control custom-switch custom-switch-off-light custom-switch-on-dark">
                      <input type="checkbox" class="custom-control-input  checks check_clear" id="arblack" value="AR BLACK DIAMOND" name='chk_antiR' onclick='calculaPrecioAr()'; style="background-color: gray !important; color: gray imop !important">
                      <label class="custom-control-label" for="arblack">AR BLACK DIAMOND</label>
                    </div>
                  </div>

                </div>

            </div><!--antirrflejantes-->
   
          </div> <!--Fin tratamientos-->

        <!--################ FIN rx final + medidas #############-->
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
                  <td colspan="25" style="width: 25%"><input type="text" class="form-control clear_orden_i" placeholder="---" id="med_a"></td>
                  <td colspan="25" style="width: 25%"><input type="text" class="form-control clear_orden_i" placeholder="---" id="med_b"></td>
                  <td colspan="25" style="width: 25%"><input type="text" class="form-control clear_orden_i" placeholder="---" id="med_c"></td>     
                  <td colspan="25" style="width: 25%"><input type="text" class="form-control clear_orden_i" placeholder="---" id="med_d"></td>              
                </tr>
              </tbody>  
            </table>

            <div class="form-group col-sm-12">
              <label for="">Observaciones</label>
              <input type="text" class="form-control clear_orden_i" id="observaciones_orden">
            </div>
            
         </div>
         <!--<span ></span> -->
         <input type="hidden" id="p_venta_trat" readonly="" value="0" class="clear_orden_i">
         <input type="hidden" name="" id="p_venta_final" class="clear_orden_i">
         <input type="hidden" name="" id="cat_orden" class="clear_orden_i">
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