<?php
 headerAdmin($data);
 getModal('modalSolicitudes', $data)
?>


<!--<div id="contentAjax"></div>-->

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-bell "></i> <?= $data['page_title'] ?>
                <?php if($_SESSION['permisosMod']['w']){ ?>
                <button class="btn btn-primary" type="button" onclick="openModal();" > <i class="fas fa-plus-circle"></i> Nuevo</button>
                <?php } ?>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>/solicitudes"><?= $data['page_title'] ?></a></li>
        </ul>
    </div>
    <!--<div class="row">
        <div class="col-md-12">
            <div class="title">
                <div class="tile-body">Solicitudes de acceso</div>
            </div>
        </div>
    </div>-->

    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableSolicitudes">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre Completo</th>
                      <th>Municipio</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>666</td>
                        <td>Jose Juan Jimenez Juarez</td>
                        <td>Tehuacan</td>
                        <td>josejuanjimenezjuarez@gmail.com</td>
                        <td>Activo</td>
                        <td></td>

                    </tr>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>

  

</main>
<?php footerAdmin($data);?>

  