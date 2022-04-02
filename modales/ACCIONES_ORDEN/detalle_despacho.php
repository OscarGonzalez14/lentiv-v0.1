<!-- The Modal -->
<div class="modal" id="modal_detalle_despacho">
  <div class="modal-dialog" style="max-width: 80%">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" style="font-size: 14px">DETALLE DESPACHO</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">

      <div class="card card-primary card-outline" style="margin: 2px;">
      <form action="imprimir_detalle_despacho.php" method="post" target="_blank">
        <input type="hidden" name="correlativo_act" id="n_despacho_pdf"/>
        <button type="submit" class="btn btn-flat  float-right btn-default"><i class="fas fa-file-pdf" style="color:red"></i> Imprimir</button>
      </form>
       <table width="100%" class="table-hover table-bordered" id="data_detalle_despachos" data-order='[[ 0, "desc" ]]' style="margin: 3px">        
         <thead class="style_th bg-dark" style="color: white">
           <th>ID</th>
           <th>Cod. orden</th>
           <th>Paciente</th>
           <th>Optica</th>
           <th>Sucursal</th>
         </thead>
         <tbody class="style_th"></tbody>
       </table>
      </div>
      </div>
    </div>
  </div>
</div>