<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artesanos Puebla-Registro</title>
    
        <!--Main CSS
   <link rel="stylesheet" type="text/css" href="<?= media();?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/style.css">

    <link rel="stylesheet" href="Assets/estilos-home/header.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    
   

 
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

<?php

headerMapa($data);
headerArtesanias($data)
	
?>


<div class="formulario-registro">
    <form id="formRegister" method="POST">
        <div class="row">
            <div class="col col-md-12 form-group">
            <label for="txtNombre">Nombre Completo</label>
            <input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" required="">
            </div>
        </div>

        <div class="row">
            <div class="col col-md-12 form-group">
                <label for="listMunicipioRegistroid">Municipio</label>
                <select class="form-control" data-live-search="true" id="listMunicipioRegistroid" name="listMunicipioRegistroid" required="">
                </select>
                <small id="emailHelp" class="form-text text-muted">¡Importante! Debe seleccionar el municipio donde resida el artesano.</small>
            </div>
        </div>

        <div class="row">
            <div class="col col-md-12 form-group">
            <label for="txtEmailArtesano">Email</label>
            <input type="email" class="form-control valid validEmail" id="txtEmailArtesano" name="txtEmailArtesano" placeholder="ejemplo@mail.com" required="">
            <small id="emailHelp" class="form-text text-muted">¡Importante! Debe de tener acceso al email ingresado.</small>
            </div>
        </div>

        <div class="row">
            <div class="col col-md-12 form-group">
                <label for="txtPasswordArtesano">Contraseña</label>
                <input type="password" class="form-control"  id="txtPasswordArtesano" name="txtPasswordArtesano">
            </div>
        </div>


            <div class="row">
                <div class="col col-md-12 form-group">
                    <div class="g-recaptcha"  data-sitekey="6LdbGkYlAAAAAD-PTdgxVhfQtoqiLhBibAaP9MAf"></div>
                </div>
            </div>
        <br>

        <div class="row">
            <div class="col col-md-12 boton-registrar form-group">
                <button type="submit" class="btn btn-success boton-registrar">Registrate</button>
            </div>
        </div> 
    </form>
</div>



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

    <script type="text/javascript" src="<?= media(); ?>/js/plugins/bootstrap-select.min.js"></script>

    <script src="<?= media() ?>/js/functions_admin.js"></script>

    <script src="Assets/js/<?= $data['page_functions_js'];?>"></script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

      
    <script src="<?= media();?>/js/menu_desplegable.js"></script>

    
</body>
</html>
                        -->