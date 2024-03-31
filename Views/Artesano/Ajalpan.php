
<!DOCTYPE html>
<html lang="en">
<head>

<!-- Alerta que emerge cuando se entra a la sección de cada uno de los municipios -->
	<script>
    document.addEventListener("DOMContentLoaded", function () {
        Swal.fire({
            title: "<strong style='color:darkorange'>" + 'Atención' + "</strong>",
            allowOutsideClick: false,
            iconColor: '#FF8000',
            icon: 'info',
            html:
                '</b>Si usted es artesano y no puede visualizar su información de contacto en la siguiente tabla, le sugerimos que verifique y actualice los datos de su perfil, esto lo podrá realizar accediendo a su cuenta <a href="http://localhost/Proyecto-Residencia-Profesional-2/login">aquí</a>, una vez ingresado al sistema diríjase al módulo perfil ubicado en la parte superior derecha de su pantalla y actualice sus datos.',
            showCloseButton: true,
            confirmButtonColor: '#00913f',
            focusConfirm: false,
            confirmButtonText:
                '<i class="fa fa-thumbs-up"></i> Entendido',
		});
    });
	</script>

	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Artesanos Puebla</title>

	<link rel="stylesheet" href="http://localhost/Proyecto-Residencia-Profesional-2/leaflet.css">
    
    <!--<link rel="stylesheet" href="http://localhost/Proyecto-Residencia-Profesional-2/Assets/estilos-home/header.css">-->
    <link rel="stylesheet" href="http://localhost/Proyecto-Residencia-Profesional-2/Assets/estilos-home/tabla_artesanos.css">

    <link rel="stylesheet" type="text/css" href="http://localhost/Proyecto-Residencia-Profesional-2/Assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/Proyecto-Residencia-Profesional-2/Assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/Proyecto-Residencia-Profesional-2/Assets/artesanias/css/main.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<link href="path/to/font-awesome/css/font-awesome.min.css">
	
    
	
	<link rel="stylesheet" type="text/css" href="http://Proyecto-Recidencia-Profecional-2/Assets/css/bootstrap-select.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="http://localhost/Proyecto-Residencia-Profesional-2/Assets/artesanias/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Proyecto-Residencia-Profesional-2/Assets/artesanias/fonts/linearicons-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Proyecto-Residencia-Profesional-2/Assets/artesanias/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Proyecto-Residencia-Profesional-2/Assets/artesanias/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	

</head>
<body>


<style>
	
	body{
		font-family:'Times New Roma', Times, serif;
	}
	
	.contenedor{
		width: 90%;
		max-width: 1000px;
		margin: auto;
		overflow: hidden;
	}
	header::before{
		content:"";
		display:block;
		margin-bottom: 90px;
	}
	nav{
		width: 100%;
		height: 90px;
		background: #ffff;
		border-bottom: 1px solid transparent;
		box-shadow: 0 3px 4px #4B1616;
		position: fixed;
		top: 0;
		z-index: 100;
		/*transition: ease-in-out 0.50s;*/
	}
	.nav{
		display: flex;
		justify-content: space-between;
		height: 80px;
		width: 100%;
		align-items: center;
		padding: 0 40px;
    }
	.nav .logo{
		height: 80px;
	}
	.nav .logo img{
		height: 80%;
		object-fit: cover;
		vertical-align: bottom;
		margin: 3rem;
	}
	.nav .logo h1{
		margin: -1rem;
		font-size: 20px;
		color: #4B1616;
		font-family: 'Times New Roman', Times, serif;
	}
	.enlaces-header{
		font-weight: 300;
		transition: ease-in-out 0.50s;
	}
	.nav .enlaces-header a{
		color: #5d6678;
		text-decoration: none;
		margin-left: 30px;
		font-size: 20px;
		font-family: 'Times New Roman', Times, serif;
		
	}
	.nav .enlaces-header>a:hover{
		color: #4B1616;
	}
	.hamburger{
		width: 70px;
		height: 70px;
		color: #4B1616;
		display: none;
		text-align: center;
		z-index: 100;
		cursor: pointer;
		transition: color 0.5s ease-in;
		
    }

	.hamburger >i{
		font-size: 35px;
		line-height: 60px;
	}

	@media screen and (max-width: 840px){

    .contenido-header{
		flex-direction: column;
		justify-content: space-evenly;
		height: 720px;
	}


	.enlaces-header{
		position: fixed;
		background: #4B1616;
		background: -webkit-linear-gradient(to right, #4b16163e, #6a5c5c35);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to left, #4b1616, #474723);
		top:0;
		right:0;  
		width:100%;
		height: 100vh;
		display: flex;
		align-items: center;
		flex-direction: column;
		justify-content: space-evenly;
		clip-path: inset(0 0 0 100%);
	}

	.nav .menudos{
		-webkit-clip-path: inset(0 0 0 0);
		clip-path: inset(0 0 0 0);
	}
	
	.nav .enlaces-header a{
		color: white;
		border-color: 1px black;
		transition: color .5s ease-in;
	}
	.nav .enlaces-header>a:hover{
   		color: #DAA520;
	}
	.hamburger{
        display: block;
    }
	}
	@media screen and (max-width: 500px){

.contenido-header{
	flex-direction: column;
	justify-content: space-evenly;
	height: 720px;
}
.logo>h1{
	display: none;
}


.enlaces-header{
	position: fixed;
	background: #4B1616;
	background: -webkit-linear-gradient(to right, #4b16163e, #6a5c5c35);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to left, #4b1616, #474723);
	top:0;
	right:0;  
	width:100%;
	height: 100vh;
	display: flex;
	align-items: center;
	flex-direction: column;
	justify-content: space-evenly;
	clip-path: inset(0 0 0 100%);
}

.nav .menudos{
	-webkit-clip-path: inset(0 0 0 0);
	clip-path: inset(0 0 0 0);
}

.nav .enlaces-header a{
	color: white;
	border-color: 1px black;
	transition: color .5s ease-in;
}
.nav .enlaces-header>a:hover{
	   color: #DAA520;
}
.hamburger{
	display: block;
}
}
</style>


<header>
	<nav>
		<section class="contenedor nav" >
			<div class="logo">
				<img src="http://localhost/Proyecto-Residencia-Profesional-2/Assets/images/puebla.png" alt="">
				<h1>Artesanos Puebla</h1>
			</div>
			<div class="enlaces-header">
				<a href="http://localhost/Proyecto-Residencia-Profesional-2" class="a">Inicio</a>
				<a href="http://localhost/Proyecto-Residencia-Profesional-2/registro" class="a">Registro</a>
				<a href="http://localhost/Proyecto-Residencia-Profesional-2/login" class="a">Inicio de Sesión</a>
			</div>
			<div class="hamburger">
			<i class="fa fa-bars"></i>
			</div>
		</section>
	</nav>
</header>

<br>
<br>

<style>

.Contenedor-tabla-artesanos{
    width: 1700px;
    height: 1000px;
    margin: 0 auto;
    position: relative;
}
.table{
    position: absolute;
}
td{
	text-align:center;
}
@media (max-width: 1700px)
{
    .Contenedor-tabla-artesanos{
        width: 1600px;
    }
	.msg{
		font-size:1.5em;
		writing-mode: horizontal-tb;
		/*transform:rotate(0deg);*/
	}
}
@media (max-width: 1600px)
{
    .Contenedor-tabla-artesanos{
        width: 1500px;
    }
	
}
@media (max-width: 1500px)
{
    .Contenedor-tabla-artesanos{
        width: 1400px;
    }
}
@media (max-width: 1400px)
{
    .Contenedor-tabla-artesanos{
        width: 1300px;
    }
}
@media (max-width: 1300px)
{
    .Contenedor-tabla-artesanos{
        width: 1200px;
    }
	
}
@media (max-width: 1200px)
{
    .Contenedor-tabla-artesanos{
        width: 1100px;
    }
	
}
@media (max-width: 1100px)
{
    .Contenedor-tabla-artesanos{
        width: 1000px;
    }
	
}
@media (max-width: 1000px)
{
    .Contenedor-tabla-artesanos{
        width: 900px;
        overflow: scroll;
        scrollbar-color: rgba(75, 22, 22, 0.5) rgba(247, 0, 0, 0.05);
        scrollbar-width: auto;
    }
    .Contenedor-tabla-artesanos::-webkit-scrollbar{
        -webkit-appearance: none;
    }
    .table{
        max-width: 1000px;
    }
	.msg{
		font-size:1em;
	}
	td{
		writing-mode: sideways-lr;
		transform:rotate(360deg);
		height:250px;
	}
	.nombreArtesano{
		transform:translateX(25px);
		
	}
	.telefonoArtesano{
		transform:translateX(20px)
	}
	.facebookArtesano{
		transform:translateX(20px)
	}
	.twitterArtesano{
		transform:translateX(20px)
	}
	.instagramArtesano{
		transform:translateX(25px)
	}
	.sitiowebArtesano{
		transform:translateX(12px)
	}
	.domicilioArtesano{
		transform:translateX(45px)
	}
	.municipioArtesano{
		transform:translateX(20px)
	}
	.empresaArtesano{
		transform:translateX(20px)
	}
}
@media (max-width: 900px)
{
    .Contenedor-tabla-artesanos{
        width: 800px;
        overflow: scroll;
    }
    .table{
        max-width: 1000px;
    }
	.domicilioArtesano{
		transform:translateX(30px)
	}
	.municipioArtesano{
		transform:translateX(10px)
	}
	.municipioArtesano{
		transform:translateX(25px)
	}
	
}
@media (max-width: 800px)
{
    .Contenedor-tabla-artesanos{
        width: 700px;
        overflow: scroll;   
    } 
	th{
		font-size:15px;
	}
	p{
		display:none;
	}
	.nombreArtesano{
		transform:translateX(20px)
	}
	.telefonoArtesano{
		transform:translateX(10px)
	}
	.facebookArtesano{
		transform:translateX(15px)
	}
	.twitterArtesano{
		transform:translateX(15px)
	}
	.instagramArtesano{
		transform:translateX(15px)
	}
	.sitiowebArtesano{
		transform:translateX(15px)
	}
	.domicilioArtesano{
		transform:translateX(40px)
	}
	.municipioArtesano{
		transform:translateX(5px)
	}
	.empresaArtesano{
		transform:translateX(10px)
	}
	

}
@media (max-width: 700px)
{
    .Contenedor-tabla-artesanos{
        width: 650px;
        overflow: scroll;   
    }
    .table{
        max-width: 1000px;
    }   
	th{
		font-size:15px;
	}
	p{
		display:none;
	}
	.msg{
		font-size: .8em;
	}
	
	.nombreArtesano{
		transform:translateX(15px)
	}
	.telefonoArtesano{
		transform:translateX(5px)
	}
	.facebookArtesano{
		transform:translateX(6px)
	}
	.twitterArtesano{
		transform:translateX(6px)
	}
	.instagramArtesano{
		transform:translateX(6px)
	}
	.sitiowebArtesano{
		transform:translateX(12px)
	}
	.domicilioArtesano{
		transform:translateX(30px)
	}
	
	
}
@media (max-width: 600px)
{
    .Contenedor-tabla-artesanos{
        width: 550px;
        overflow: scroll;   
    }
    .table{
        max-width: 1000px;
    }   
	
	th{
		font-size:10px;
	}
	td{
		font-size:10px;
	}
	
}

@media (max-width: 500px)
{
    .Contenedor-tabla-artesanos{
        width: 450px;
        overflow: scroll;
    }
	.nombreArtesano{
		transform:translateX(5px)
	}
	.telefonoArtesano{
		transform:translateX(3px)
	}
	.facebookArtesano{
		transform:translateX(4px)
	}
	.twitterArtesano{
		transform:translateX(4px)
	}
	.instagramArtesano{
		transform:translateX(4px)
	}
	.sitiowebArtesano{
		transform:translateX(8px)
	}
	.domicilioArtesano{
		transform:translateX(20px)
	}
	
	
}
@media (max-width: 400px)
{
    .Contenedor-tabla-artesanos{
        width: 350px;
        overflow: scroll;
    }
	.nombreArtesano{
		transform:translateX(2px)
	}
	.telefonoArtesano{
		transform:translateX(1px)
	}
	.facebookArtesano{
		transform:translateX(2px)
	}
	.twitterArtesano{
		transform:translateX(2px)
	}
	.instagramArtesano{
		transform:translateX(2px)
	}
	.sitiowebArtesano{
		transform:translateX(3px)
	}
	.domicilioArtesano{
		transform:translateX(8px)
	}
	.msg{
		font-size:.5em;
	}
	.imgsinregistros{
		height:200px;
	}
}
@media (max-width: 350px)
{
    .Contenedor-tabla-artesanos{
        width: 325px;
        overflow: scroll;
    }
	.nombreArtesano{
		transform:translateX(-3px)
	}
	.telefonoArtesano{
		transform:translateX(-1px)
	}
	.facebookArtesano{
		transform:translateX(-2px)
	}
	.twitterArtesano{
		transform:translateX(-1px)
	}
	.instagramArtesano{
		transform:translateX(-1px)
	}
	.sitiowebArtesano{
		transform:translateX(-1px)
	}
	.domicilioArtesano{
		transform:translateX(1px)
	}
	.municipioArtesano{
		transform:translateX(-3px)
	}
	.empresaArtesano{
		transform:translateX(-3px)
	}
	.msg{
		font-size:.5em;
	}
	.imgsinregistros{
		height:200px;
	}
}
</style>

       
<?php
//linea siguiente a esta hace referencia a la base de datos que se utilizara en el proyecto ya desplegado
//$conexion = mysqli_connect("localhost","u644070604_ArtesanosPue","ArtesanosPuebla2023","u644070604_ArtePuebla");
$conexion = mysqli_connect("localhost","root","","arte");
?>



<div class="Contenedor-tabla-artesanos col">
    <table class="table tabla-artesanos">
        <thead class="table-light">
            <tr>
                <th class="Artesano" style="width:200px; text-align:center"><p>Artesano</p><i class="fa fa-user"></i></th>
                <th class="Telefono" style=" color: #4CAF50; width:100px; text-align:center; -webkit-text-stroke: .1px black;">
    			<p>Teléfono</p> <i class="fa fa-phone" style="color: #4CAF50; "></i>
				</th>
				<th class="Facebook" style="color:#1877f2; width:150px; text-align:center; -webkit-text-stroke: .1px black;">
                <p>Facebook</p> <i class="fa fa-facebook-f" style="color: #1877f2; "></i>
           		</th>
           		<th class="Twitter" style="color: #1da1f2; width:150px; text-align:center; -webkit-text-stroke: .1px black;">
                <p>Twitter</p> <i class="fa fa-twitter" style="color: #1da1f2;"></i>
            	</th>
            	<th class="Instagram" style="color: #bc2a8d; width:150px; text-align:center; -webkit-text-stroke: .1px black; ">
                <p>Instagram</p> <i class="fa fa-instagram" style="color: #bc2a8d;"></i>
           		</th>
				<th class="SitioWeb" style="color: #9b59b6; width:150px; text-align:center; -webkit-text-stroke: .1px black;">
    			<p>Sitio Web</p> <i class="fa fa-globe" style="color: #9b59b6;"></i>
				</th>
                <th class="Domicilio" style="color: #34495e; width:300px; text-align:center;">
    			<p>Domicilio</p> <i class="fa fa-home" style="color: #34495e;"></i>
				</th>
                <th class="Municipio" style="color: #e74c3c; width:100px; text-align:center; -webkit-text-stroke: .1px black;">
    			<p>Municipio</p> <i class="fa fa-map-marker" style="color: #e74c3c;"></i>
				</th>
                <th class="Empresa" style="color: #2c3e50; width:100px; text-align:center;">
    			<p>Empresa</p> <i class="fa fa-industry" style="color: #2c3e50;"></i>
				</th>

            </tr>
        </thead>

        <?php
        $sql = "SELECT
            p.nombrecompleto,
            p.telefono,
            p.facebook,
            p.twitter,
            p.instagram,
            p.sitio_web,
            p.domicilio,
            m.municipio,
            p.empresa 
        FROM persona p
        INNER JOIN municipios m ON p.municipioid = m.idmunicipio 
        WHERE p.rolid !=1 AND p.status !=0 AND p.municipioid =10 AND p.telefono !=0";

        $resultado = mysqli_query($conexion, $sql);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            while ($mostrar = mysqli_fetch_array($resultado)) {
                ?>
                <tbody>
                    <tr>
                        <td class="nombreArtesano"><?php echo $mostrar['nombrecompleto'] ?></td>
                        <td class="telefonoArtesano"><?php echo $mostrar['telefono'] ?></td>
                        <td class="facebookArtesano"><a href='http://www.facebook.com/<?php echo $mostrar['facebook'] ?>' target='_blank' style='color: #1877f2;'><?php echo $mostrar['facebook'] ?></a></td>
                        <td class="twitterArtesano"><a href='http://www.twitter.com/<?php echo $mostrar['twitter'] ?>' target='_blank' style='color: #1da1f2;'><?php echo $mostrar['twitter'] ?></a></td>
                        <td class="instagramArtesano"><a href='http://www.instagram.com/<?php echo $mostrar['instagram'] ?>' target='_blank' style='color: #bc2a8d;'> <?php echo $mostrar['instagram'] ?></a></td>
                        <td class="sitiowebArtesano"><a href='http://<?php echo $mostrar['sitio_web'] ?>' target='_blank'> <?php echo $mostrar['sitio_web'] ?> </a></td>
                        <td class="domicilioArtesano"><?php echo $mostrar['domicilio'] ?></td>
                        <td class="municipioArtesano"><?php echo $mostrar['municipio'] ?></td>
                        <td class="empresaArtesano"><?php echo $mostrar['empresa'] ?></td>
                    </tr>
                </tbody>
	
            <?php
            }
        } else {
			?>
			<thead>
				<tr>
					<td class="msg"colspan="9" style="text-align: center;">Lo sentimos, lamentablemente aún no existen registros de artesanos en este municipio.</td>
				</tr>
				
			</thead>
			<tbody>
				<tr>
					<th colspan="9" style="text-align: center;">
						<img src="http://localhost/Proyecto-Residencia-Profesional-2/images/Cerrado.png" alt="Imagen de artesanía" style="max-width: 100%; ">
					</th>
				</tr>
			</tbody>
			<?php
			//echo "Lo sentimos, lamentablemente aún no existen registros de artesanos en este municipio.<hr> <br> <br> <br>"; 
        }
        ?>
	</table>
</div>

<!--Script para el menu desplegable-->
<script>
	var enlacesHeader = document.querySelectorAll(".enlaces-header")[0];
	var semaforo = true;
	document.querySelectorAll(".hamburger")[0].addEventListener("click", function(){
		if(semaforo){
			document.querySelectorAll(".hamburger")[0].style.color ="#fff";
			semaforo = false;
		}else{
			document.querySelectorAll(".hamburger")[0].style.color ="#4B1616";
			semaforo = true;
		}
	enlacesHeader.classList.toggle("menudos")
	})
</script>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>






<footer class="bg3 p-t-75 p-b-32">
    <br>
        <br>    <br>    <br>
		<div class="container">
			<div class="row">

				<div class="col-sm-6 col-lg-4 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						CATEGORÍAS
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="http://localhost/Proyecto-Residencia-Profesional-2/tipo/categoria/1/alfareria" class="stext-107 cl7 hov-cl1 trans-04">
								Alfarería
							</a>
						</li>

						<li class="p-b-10">
							<a href="http://localhost/Proyecto-Residencia-Profesional-2/tipo/categoria/2/madera" class="stext-107 cl7 hov-cl1 trans-04">
								Madera
							</a>
						</li>

						<li class="p-b-10">
							<a href="http://localhost/Proyecto-Residencia-Profesional-2/tipo/categoria/3/palma" class="stext-107 cl7 hov-cl1 trans-04">
								Palma
							</a>
						</li>

						<li class="p-b-10">
							<a href="http://localhost/Proyecto-Residencia-Profesional-2/tipo/categoria/4/talavera" class="stext-107 cl7 hov-cl1 trans-04">
								Talavera
							</a>
						</li>

						<li class="p-b-10">
							<a href="http://localhost/Proyecto-Residencia-Profesional-2/tipo/categoria/5/textil" class="stext-107 cl7 hov-cl1 trans-04">
								Textil
							</a>
						</li>

						<li class="p-b-10">
							<a href="http://localhost/Proyecto-Residencia-Profesional-2/tipo/categoria/6/vidrio-soplado" class="stext-107 cl7 hov-cl1 trans-04">
								Vidrio Soplado
							</a>
						</li>
					</ul>

		
					<ul>
						<li class="p-b-10">
							<a href="http://localhost/Proyecto-Residencia-Profesional-2/tipo/categoria/7/juguetes" class="stext-107 cl7 hov-cl1 trans-04">
							    Juguetes
							</a>
						</li>
					 </ul>
				    

					
				</div>


				<div class="col-sm-6 col-lg-4 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Contacto
					</h4>

					<p class="stext-107 cl7 size-201">
						Cualquier duda presentarse en Av. Rafael Ávila Camacho Ote. 3509, Barrio la Fátima, 75910 Ajalpan, Pue.
						<br>
						ó comunicarse al 236 381 2162.
					</p>

					<div class="p-t-27">
						<a href="https://facebook.com/TecAjalpan" target="_blanck" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-4 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Nosotros
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<p style="color: white">dir_dsnegraajalpan@tecnm.mx</p>
						</div>
					</form>
				</div>

			</div>

			<div class="p-t-40">

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
			    <br>    <br>    <br>
		</div>
	</footer>


	
	
	
	
	
	<script src="http://localhost/Proyecto-Residencia-Profesional-2/municipios.js"></script>
    <script src="<?= media();?>/mapa.js"></script>
    <script src="<?= media();?>/seleccionmunicipios.js"></script>
    <script src="http://localhost/Proyecto-Residencia-Profesional-2/Assets/Artesanias/css/main.css"></script>

    
    <script src="<?= media();?>/alertaArtesanos.js"></script>

    <script src="http://localhost/Proyecto-Residencia-Profesional-2/Assets/js/fontawesome.js"></script>
	
    <script src="<?= media();?>/js/bootstrap.min.js"></script>
	<script src="http://localhost/Proyecto-Residencia-Profesional-2/Assets/artesanias/js/main.js"></script>

	<script src="leaflet.js"></script>
	<script src="<?= media();?>/js/fontawesome.js"></script>

	


	
	

	<?php
//footerMapa($data);
//footerArtesanias($data);
    ?>


	
    
	
</body>
</html>

