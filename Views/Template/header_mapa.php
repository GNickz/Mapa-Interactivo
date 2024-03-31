<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="icon" sizes="292x292" href="https://www.mexicodesconocido.com.mx/wp-content/uploads/2018/08/visita-puebla-cd.jpg">-->
    <title>Artesanos Puebla</title>

    <!--<link rel="stylesheet" href="header.css">-->

    <link rel="stylesheet" href="leaflet.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css"/>
    
    <script src="leaflet.js"></script>
    <link rel="stylesheet" href="Assets/estilos-home/posicion_mapa.css">
    <link rel="stylesheet" href="<?= media()?>/estilos-home/header.css">
    <link rel="stylesheet" href="Assets/estilos-home/presentacion.css">
    <link rel="stylesheet" href="<?= media()?>/estilos-home/mapa.css">
    <link rel="stylesheet" href="Assets/estilos-home/interfaz.css">
    <link rel="stylesheet" href="<?= media()?>/estilos-home/tabla_artesanos.css">
    <link rel="stylesheet" href="<?= media()?>/estilos-home/formregistro.css">

    <link rel="stylesheet" type="text/css" href="Assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">

    <link rel="stylesheet" href="<?= media()?>/estilos-home/informacion.css"><!--Informacion que aparece en la parte superior derecha del mapa cuando se pasa el mouse por un municipio-->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">-->
    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/bootstrap-select.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



</head>
<body>

    <header>
        <nav>
            <section class="contenedor nav">
                <div class="logo">
                <img src="<?= media()?>/images/puebla.png" alt="Artesanos en Puebla">
                <h1>Artesanos puebla</h1>
                </div>

                <div class="enlaces-header">
                    <a href="http://localhost/Proyecto-Residencia-Profesional-2" class="a">Inicio</a>
                    <a href="http://localhost/Proyecto-Residencia-Profesional-2/registro" class="a">Registro</a>
                    <a href="http://localhost/Proyecto-Residencia-Profesional-2/login" class="a">Inicio de Sesión</a>
                </div>
                <div class="desplegable">
                    <i class="fa fa-bars"></i>
                </div>
            </section>
        </nav>
    </header>
<!--
    <header class="header">

            <div class="Logo">
                <img src="<?= media()?>/images/puebla.png" alt="Artesanos en Puebla">
                <h1>Artesanos en puebla</h1>
  
            </div>


            <div class="button">
                <i class="fa fa-bars hamburgesa"></i>
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
<body>
