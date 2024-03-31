
<!-- Modal -->
<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
              <form id="formUsuario" name="formUsuario" class="form-horizontal">
                    <input type="hidden" id="idUsuario" name="idUsuario" value="">
                    <p class="text-danger" id="restriccion-campos">¡Los campos con que contegan * son obligatorios.!</p>
                    <br>

                    <p class="text-primary">Informacion de usuario</p>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtUsuario">Usuario *</label>
                            <input type="text" class="form-control valid validNumberText" id="txtUsuario" name="txtUsuario" placeholder="Cree un usuario" required="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtNombre">Nombre *</label>
                            <input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" placeholder="Nombre completo" required="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="txtEmail">Email *</label>
                            <input type="email" class="form-control valid validEmail" id="txtEmail" name="txtEmail" required="">
                        </div>
                    </div>

                    <br>
                    <p class="text-primary">Informacion de contacto</p>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtTelefono">Telefono *</label>
                            <input type="text" class="form-control valid userNumber" maxlength="10"  onkeypress="return controlTag(event);" id="txtTelefono" maxlenght="10" name="txtTelefono" required="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="txtFacebook">Facebook *</label>
                            <input type="text" class="form-control" id="txtFacebook" name="txtFacebook" required="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtTwitter">Twitter</label>
                            <input type="text" class="form-control" id="txtTwitter" name="txtTwitter" >
                        </div>

                        <div class="form-group col-md-6">
                            <label for="txtInstagram">Instagram</label>
                            <input type="text" class="form-control" id="txtInstagram" name="txtInstagram">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtSitioWeb">Sitio Web</label>
                            <input type="text" class="form-control" id="txtSitioWeb" name="txtSitioWeb">
                        </div>
                    </div>

                    <br>
                    <p class="text-primary">Direcciones</p>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtDomicilio">Domicilio *</label>
                            <input type="text" class="form-control" id="txtDomicilio"  name="txtDomicilio" placeholder="Direccion de domicilio" required="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="txtEmpresa">Empresa</label>
                            <input type="text" class="form-control" id="txtEmpresa" placeholder="nombre de la empresa" name="txtEmpresa">
                        </div>
                    </div>

                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                                <label for="listMunicipioid">Municipio *</label>
                                <select class="form-control" data-live-search="true" id="listMunicipioid" name="listMunicipioid" required="">
                                </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="listRolid">Tipo de usuario *</label>
                            <select class="form-control" data-live-search="true" id="listRolid" name="listRolid" required=""> 
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="listStatus">Status</label>
                            <select class="form-control selectpicker" id="listStatus" name="listStatus" required="">
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtPassword">Contraseña</label>
                            <input type="password" class="form-control"  id="txtPassword" name="txtPassword">
                        </div>
                    </div>


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
<div class="modal fade" id="modalViewUser" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>Usuario:</td>
                        <td id="celUsuario">dddd</td>
                    </tr>

                    <tr>
                        <td>Nombre:</td>
                        <td id="celNombre">dddd</td>
                    </tr>

                    <tr>
                        <td>Email (Usuario):</td>
                        <td id="celEmail">dddd</td>
                    </tr>

                    <tr>
                        <td>Telefono:</td>
                        <td id="celTelefono">dddd</td>
                    </tr>

                    <tr>
                        <td>Facebook:</td>
                        <td id="celFacebook">dddd</td>
                    </tr>

                    
                    <tr>
                        <td>Twitter:</td>
                        <td id="celTwitter">dddd</td>
                    </tr>

                    <tr>
                        <td>Instagram:</td>
                        <td id="celInstagram">dddd</td>
                    </tr>

                    <tr>
                        <td>Sitio Web:</td>
                        <td id="celSitioWeb">dddd</td>
                    </tr>

                    <tr>
                        <td>Domicilio:</td>
                        <td id="celDomicilio">dddd</td>
                    </tr>

                    <tr>
                        <td>Empresa:</td>
                        <td id="celEmpresa">dddd</td>
                    </tr>

                    <tr>
                        <td>Municipio:</td>
                        <td id="celMunicipio">dddd</td>
                    </tr>

                    <tr>
                        <td>Tipo Usuario:</td>
                        <td id="celTipoUsuario">dddd</td>
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



