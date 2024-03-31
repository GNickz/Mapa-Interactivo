   <!-- Sidebar menu-->
   <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media();?>/images/avatar.png" alt="Avatar administrador">
        <div>
          <p class="app-sidebar__user-name"><?= $_SESSION['userData']['nombrecompleto']; ?></p>
          <p class="app-sidebar__user-designation"><?= $_SESSION['userData']['nombrerol']; ?></p>
        </div>
      </div>
      <ul class="app-menu">

        <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>

        <li><a class="app-menu__item" href="<?=base_url(); ?>/dashboard">
          <i class="app-menu__icon fa fa-dashboard"></i>
          <span class="app-menu__label">Dashboard</span></a>
        </li>

        <?php } ?>


        <?php if(!empty($_SESSION['permisos'][2]['r'])){ ?>

        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-user-check"></i>
              <span class="app-menu__label">Administrar Roles</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">

            <li>
              <a class="treeview-item" href="<?= base_url(); ?>/roles">
                <i class="icon fa fa-address-card"></i>Ver Roles de Usuarios
              </a>
            </li>
        
          </ul>
        </li>

        <?php } ?>


        <?php if(!empty($_SESSION['permisos'][3]['r'])){ ?>
          
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-user-plus"></i>
              <span class="app-menu__label">Administrar Usuarios</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
          </a>

          <ul class="treeview-menu">
          
            <li>
              <a class="treeview-item" href="<?= base_url(); ?>/usuarios">
                <i class="app-menu__icon fa fa-address-card"></i>Ver Registros de Usuarios
              </a>
            </li>
          </ul>

        </li>

        <?php } ?>

        

        <?php if(!empty($_SESSION['permisos'][6]['r'])){ ?>
          
          <li>
          <a class="app-menu__item" href="<?= base_url(); ?>/Solicitudes">
            <i class="app-menu__icon fa fa-bell"></i>
            <span class="app-menu__labe">Solicitudes</span>
          </a>
        </li>
  
          <?php } ?>      

        


       <!-- <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-hammer"></i>
              <span class="app-menu__label">Artesanos</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">-->
          <?php if(!empty($_SESSION['permisos'][4]['r'])){ ?>    
        <li>
          <a class="app-menu__item" href="<?= base_url(); ?>/categorias">
          <i class="app-menu__icon fa fa-folder-open"></i> 
          <span class="app-menu__labe">Tipos de artesanias</span>
             
          </a>
        </li>
        <?php } ?>

        <?php if(!empty($_SESSION['permisos'][5]['r'])){ ?>    
        <li>
          <a class="app-menu__item" href="<?= base_url(); ?>/artesanias">
          <i class="app-menu__icon fa fa-images"></i>Artesanias
                
          </a>
        </li>
        <?php } ?>

      
         <!-- </ul>
        </li>-->

        <li>
          <a class="app-menu__item" href="<?= base_url(); ?>/logout">
            <i class="app-menu__icon fa fa-sign-out"></i>
            <span class="app-menu__labe">Cerrar Sesión</span>
          </a>
        </li>

        
      </ul>
    </aside>