<!-- Modal -->
<div class="modal fade" id="modal_lentes_rotos" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 65%">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-sync-alt"></i> REPORTAR LENTE ROTO - REPORTE # <span id="corr_lente_roto"></span><span></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <div class="row">

        <div class="col-sm-5">
          <div class="eight" style="align-items: center">
          <h1>TIPO RESPONSABLE</h1>
          <div style="display: flex;justify-content: center;align-content: center;">
           <div class="form-check-inline">
              <input class="tipo_responsable" type="radio" id="resp_operario" value="operario" name='resps' onClick='selectTipoResp(this.id);'>
                <label class="form-check-label" for="inlineCheckbox1"> OPERARIO</label>
              </div>

              <div class="form-check-inline ">
                  <input class="tipo_responsable" type="radio" id="resp_lente" value="maquina" name='resps' onClick='selectTipoResp(this.id);'>
                  <label class="form-check-label" for="inlineCheckbox2" id="lbl_transitionphoto"> MAQUINA</label>
              </div>
          </div>    
          </div>
        </div>

        <div class="col-sm-7">
          <div class="eight" style="align-items: center">
            <h1>RESPONSABLE</h1>
                 <div class="col-sm-12 select2-purple">
                 <select class="select2 form-control" id="responsables" multiple="multiple" data-placeholder="Seleccionar responsable" data-dropdown-css-class="select2-purple" style="width: 100%;height: ">            
                </select>              
            </div>
            </div>
          </div>

      </div>    


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-block"><i class="fas fa-save"></i> REGISTRAR</button>
      </div>
    </div>
  </div>
</div>