
<!-- Modal -->
<div class="modal fade" id="modalFormSolicitud" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nueva Solicitud</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
              <form id="formSolicitud" name="formSolicitud" class="form-horizontal">
                    <input type="hidden" id="idSolicitud" name="idSolicitud" value="">
                    <p class="text-danger"  id="restriccion-campos">¡Todos los campos con * son obligatorios!</p>
                    <br>
                    <hr class=" border-bottom border-danger">
                    <p class="text-primary">Informacion de la solicitud</p>

                   

                    <div class="form-row">
                        <div class="form-group col-md-6">
                                <label for="txtNombreSolicitante">Nombre *</label>
                                <input type="text" class="form-control valid validText" id="txtNombreSolicitante" name="txtNombreSolicitante" placeholder="Nombre completo" required="" readonly>
                        </div>
                        
                        <div class="form-group col-md-6">
                                <label for="listMunicipioid">Municipio *</label>
                                <select class="form-control" data-live-search="true" id="listMunicipioid" name="listMunicipioid" required="" readonly>
                                </select>
                        </div>

                    </div>

                    <div class="form-row">
                
                        <div class="form-group col-md-6">
                            <label for="txtEmailSolicitante">Email *</label>
                            <input type="email" class="form-control valid validEmail" id="txtEmailSolicitante" name="txtEmailSolicitante" required="" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="listStatus">Status</label>
                            <select class="form-control selectpicker" id="listStatus" name="listStatus" required="">
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <hr class=" border-bottom border-danger">
                    <div class="tile-footer">
                        <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> <span id="btnText">Guardar</span> </button>&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                    </div>
              </form>   
           
            
        </div>
    </div>
</div>
</div>







<!-- Modal -->
<div class="modal fade" id="modalViewSolicitud" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos de la Solicitud</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
            <table class="table table-bordered">
                <tbody>

                    <tr>
                        <td>Nombre:</td>
                        <td id="celNombre">dddd</td>
                    </tr>

                    <tr>
                        <td>Municipio:</td>
                        <td id="celMunicipio">dddd</td>
                    </tr>

                    <tr>
                        <td>Email (Usuario):</td>
                        <td id="celEmail">dddd</td>
                    </tr>

                    <tr>
                        <td>Estado:</td>
                        <td id="celStatus">dddd</td>
                    </tr>

                </tbody>
            </table>  
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>

    </div>
</div>
</div>



