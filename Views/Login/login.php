<!--<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ITSSNA">
    <meta name="theme-color" content="#09688">

    
    <!-- Main CSS
    <link rel="stylesheet" type="text/css" href="Assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/style.css">

    <link rel="stylesheet" href="Assets/estilos-home/header.css">

   

 
    <title><?php $data['page_tag'];?></title>
  </head>
  <body>

  <header class="header">

    <div class="Logo">
        <img src="<?= media()?>/images/puebla.png" alt="Artesanos en Puebla">
        <h1>Artesanos en puebla</h1>
    </div>

    <div class="button">
        <i class="fas fa-bars"></i>
    </div>


    <nav class="nav">

    <ul class="ul">
        <li class="li"> 
            <a href="http://localhost/Proyecto-Residencia-Profesional-2" class="a">Inicio</a>
        </li>

        <li class="li">
            <a href="http://localhost/Proyecto-Residencia-Profesional-2/registro" class="a">Registro</a>
        </li>

        <li class="li">
            <a href="http://localhost/Proyecto-Residencia-Profesional-2/login" class="a">Inicio de Sesión</a>
        </li>

    </ul>


    </nav>
</header>

-->
    <!--<section class="material-half-bg">
      <div class="cover"></div>
    </section>-->

    <?php

headerMapa($data);
headerArtesanias($data);
	
/*if(!empty($_POST)){
    $captcha = $_POST['g_recaptcha-response'];

    $secret = '6LdbGkYlAAAAAJ92sjja_ogarc0i7j7_0121R7Hi';

    if(!$captcha){
        //swal('Por favor verifique el captcha', "error");
        echo "Por favor verifique el captcha";
    }

}*/
?>

    <section class="login-content">
      <div class="logo">
        <h1>Artesanos Puebla</h1>
      </div>

      <div class="login-box">

        <div id="divLoading">
          <div><img src="Assets/images/Loading3.svg" alt="Loading"></div>
        </div>

        <form class="login-form" name="formLogin" id="formLogin" action="">

          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>INICIAR SESIÓN</h3>

          <div class="form-group">
            <label class="control-label">USUARIO</label>
            <input id="txtEmail" name="txtEmail" class="form-control" type="email" placeholder="Email" autofocus>
          </div>

          <div class="form-group">
            <label class="control-label">CONTRASEÑA</label>
            <input id="txtPassword" name="txtPassword" class="form-control" type="password" placeholder="Contraseña">
          </div>

          <div class="form-group">
            <div class="utility">
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">¿Olvidaste tu contraseña?</a></p>
            </div>
          </div>

          <div id="alertLogin" class="text-center"></div>

          <div class="form-group btn-container">
            <button type="submit" class="btn btn-primary btn-block"> <i class="fas fa-sing-in-alt"></i> INICIAR SESIÓN</button>
          </div>

        </form>

        <!--FORMULARIO PARA RECUPERAR CONTRASEÑA-->
        <form id="formResetPass"name="formResetPass" class="forget-form" action="">

          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>¿Olvidaste tu contraseña?</h3>

          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input id="txtEmailReset" name="txtEmailReset" class="form-control" type="email" placeholder="Email">
          </div>

          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>Recuperar</button>
          </div>

          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Volver al Login</a></p>
            <br></br>
          </div>

        </form>

      </div>
    </section>

    <?php

footerMapa($data);
footerArtesanias($data);
footerAdmin($data);
	

?>

<!--   
    <script>
        const base_url = "<?= base_url(); ?>";
    </script>
    <!-- Essential javascripts for application to work
    <script src="Assets/js/jquery-3.3.1.min.js"></script>
    <script src="Assets/js/popper.min.js"></script>
    <script src="Assets/js/bootstrap.min.js"></script>
    <script src="Assets/js/fontawesome.js"></script>
    <script src="Assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top
    <script src="Assets/js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="Assets/js/plugins/sweetalert.min.js"></script>
    <script src="Assets/js/<?= $data['page_functions_js'];?>"></script>

      
    <script src="<?= media();?>/js/menu_desplegable.js"></script>

  </body>
</html>

-->