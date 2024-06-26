
<!-- Modal -->
<div class="modal fade" id="modalFormPerfil" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header headerUpdate">
        <h5 class="modal-title" id="titleModal">Actualizar Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
              <form id="formPerfil" name="formPerfil" class="form-horizontal">
                    <!--<input type="hidden" id="idUsuario" name="idUsuario" value="">-->
                    <p class="text-black">Los campos con que contegan (<span class="required">*</span>) son obligatorios.</p>
                    <br>

                    <p class="text-primary">Informacion de usuario</p>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtUsuario">Usuario <span class="required">*</span></label>
                            <input type="text" class="form-control valid validNumberText" id="txtUsuario" name="txtUsuario" value="<?= $_SESSION['userData']['usuario']; ?>" required="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtNombre">Nombre <span class="required">*</span></label>
                            <input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" value="<?= $_SESSION['userData']['nombrecompleto']; ?>" required="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="txtEmail">Email </label>
                            <input type="email" class="form-control valid validEmail" id="txtEmail" name="txtEmail" value="<?= $_SESSION['userData']['email_usuario']; ?>" required="" readonly disabled >
                        </div>
                    </div>

                    <br>
                    <p class="text-primary">Informacion de contacto</p>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtTelefono">Telefono <span class="required">*</span></label>
                            <input type="text" class="form-control valid userNumber" maxlength="10"  onkeypress="return controlTag(event);" id="txtTelefono" maxlenght="10" name="txtTelefono" value="<?= $_SESSION['userData']['telefono']; ?>" required="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="txtFacebook">Facebook <span class="required">*</span></label>
                            <input type="text" class="form-control" id="txtFacebook" name="txtFacebook" value="<?= $_SESSION['userData']['facebook']; ?>" required="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtTwitter">Twitter</label>
                            <input type="text" class="form-control" id="txtTwitter" name="txtTwitter" value="<?= $_SESSION['userData']['twitter']; ?>" >
                        </div>

                        <div class="form-group col-md-6">
                            <label for="txtInstagram">Instagram</label>
                            <input type="text" class="form-control" id="txtInstagram" name="txtInstagram" value="<?= $_SESSION['userData']['instagram']; ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtSitioWeb">Sitio Web</label>
                            <input type="text" class="form-control" id="txtSitioWeb" name="txtSitioWeb" value="<?= $_SESSION['userData']['sitio_web']; ?>">
                        </div>
                    </div>

                    <br>
                    <p class="text-primary">Direcciones</p>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtDomicilio">Domicilio <span class="required">*</span></label>
                            <input type="text" class="form-control" id="txtDomicilio"  name="txtDomicilio" value="<?= $_SESSION['userData']['domicilio']; ?>" required="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="txtEmpresa">Empresa</label>
                            <input type="text" class="form-control" id="txtEmpresa" placeholder="nombre de la empresa" name="txtEmpresa" value="<?= $_SESSION['userData']['empresa']; ?>">
                        </div>
                    </div>

                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                                <label for="listMunicipioid">Municipio <span class="required">*</span></label>
                                <select class="form-control" data-live-search="true" id="listMunicipioid" name="listMunicipioid" value="<?= $_SESSION['userData']['municipioid']; ?>" required="" >
                                </select>
                        </div>
                    </div>


                    


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtPassword">Contraseña</label>
                            <input type="password" class="form-control"  id="txtPassword" name="txtPassword">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="txtPasswordConfirm">Confirmar Contraseña</label>
                            <input type="password" class="form-control"  id="txtPasswordConfirm" name="txtPasswordConfirm">
                        </div>
                    </div>


                    <div class="tile-footer">
                        <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> <span id="btnText">Actualizar</span> </button>&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                    </div>
              </form>   
           
            
        </div>
    </div>
</div>
</div>






