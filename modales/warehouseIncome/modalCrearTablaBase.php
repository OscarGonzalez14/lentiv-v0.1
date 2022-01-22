<!-- The Modal -->
<div class="modal" id="newTableBaseVs">
  <div class="modal-dialog" style="max-width: 80%;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header shadow-sm p-3 mb-2" style="background: #162e41">
        <h4 class="modal-title stilot3" style="font-size: 16px;color: white">CREAR TABLA VS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-row shadow p-3 mb-2 bg-white">

          <div class="col-sm-6" class="autocomplete">
            <label for="">Nombre tabla</label>
            <input type="text" class="form-control" id="name_tabla_tb">
          </div>

          <div class="form-group col-sm-3">
            <label>Marca</label>
            <select class="form-control" id="marca_base_tb">
              <option value="0">Seleccionar tabla...</option>
              <option value="Essilor">Essilor</option>
              <option value="Divel">Divel</option>
            </select>
          </div>
          
          <div class="form-group col-sm-3">
            <label>Tipo base</label>
            <select class="form-control" id="tipo_base_tb">
              <option value="0">Seleccionar tipo...</option>
              <option value="vs">VS</option>
              <option value="bf">Flaptop</option>
            </select>
          </div>

        </div>

      </div>      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-block btn-primary" style="color: white;font-weight: bold" onClick="creaNuevaTablaBase()"><i class="fas fa-plus"></i> Crear</button>
      </div>

    </div>
  </div>
</div>