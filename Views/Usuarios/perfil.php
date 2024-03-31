<?php
headerAdmin($data);
getModal('modalPerfil',$data);
?>
<main class="app-content">
      <div class="row user">
        <div class="col-md-12">
          <div class="profile">
            <div class="info"><img class="user-img" src="<?= media();?>/images/avatar.png">
              <h4><?= $_SESSION['userData']['nombrecompleto'] ?></h4>
              <p><?= $_SESSION['userData']['nombrerol'] ?></p>
            </div>
            <div class="cover-image"></div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
              <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Datos personales</a></li>
            </ul>
            </ul>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane active" id="user-timeline">
              <div class="timeline-post">
                <div class="post-media">
                  <div class="content">
                    <h5> DATOS PERSONALES
                    <button class="btn btn-sm btn-info" type="button" onclick="openModalPerfil();"><i class="fas fa-pencil-alt" aria-hidden="true"></i></button>
                    </h5>
                  </div>
                </div>

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td style="width:150px;">Usuario</td>
                            <td id="celUsuario"><?= $_SESSION['userData']['usuario'];?></td>
                        </tr>
                        <tr>
                            <td >Nombre Completo</td>
                            <td id="celNombre"><?= $_SESSION['userData']['nombrecompleto'];?></td>
                        </tr>
                        <tr>
                            <td>Email (usuario)</td>
                            <td id="celEmail"><?= $_SESSION['userData']['email_usuario'];?></td>
                        </tr>
                        <tr>
                            <td>Telefono</td>
                            <td id="celTelefono"><?= $_SESSION['userData']['telefono'];?></td>
                        </tr>
                        <tr>
                            <td>Facebook</td>
                            <td id="celFacebook"><?= $_SESSION['userData']['facebook'];?></td>
                        </tr>
                        <tr>
                            <td>Twitter</td>
                            <td id="celTwitter"><?= $_SESSION['userData']['twitter'];?></td>
                        </tr>
                        <tr>
                            <td>Instagram</td>
                            <td id="celInstagram"><?= $_SESSION['userData']['instagram'];?></td>
                        </tr>
                        <tr>
                            <td>Sitio Web</td>
                            <td id="celSitioWeb"><?= $_SESSION['userData']['sitio_web'];?></td>
                        </tr>
                        <tr>
                            <td>Domicilio</td>
                            <td id="celDomicilio"><?= $_SESSION['userData']['domicilio'];?></td>
                        </tr>
                        <tr>
                            <td>Empresa</td>
                            <td id="celEmpresa"><?= $_SESSION['userData']['empresa'];?></td>
                        </tr>
                        <tr>
                            <td>Municipio</td>
                            <td id="celMunicipio"><?= $_SESSION['userData']['municipio'];?></td>
                        </tr>
                      

                    </tbody>
                </table>
               
<!--              </div>
            </div>
            <div class="tab-pane fade" id="user-settings">
              <div class="tile user-settings">
                <h4 class="line-head">Settings</h4>
                <form>
                  <div class="row mb-4">
                    <div class="col-md-4">
                      <label>First Name</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="col-md-4">
                      <label>Last Name</label>
                      <input class="form-control" type="text">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 mb-4">
                      <label>Email</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Mobile No</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Office Phone</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Home Phone</label>
                      <input class="form-control" type="text">
                    </div>
                  </div>


                  <div class="row mb-10">
                    <div class="col-md-12">
                      <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                    </div>
                  </div>
                </form>
-->

              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

<?php footerAdmin($data); ?>

