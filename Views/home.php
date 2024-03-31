
<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" sizes="292x292" href="https://www.mexicodesconocido.com.mx/wp-content/uploads/2018/08/visita-puebla-cd.jpg">
    <title>Artesanos en Puebla</title>

    <link rel="stylesheet" href="header.css">

    <link rel="stylesheet" href="leaflet.css">
    <script src="leaflet.js"></script>
    <link rel="stylesheet" href="Assets/estilos-home/index.css">
    <link rel="stylesheet" href="Assets/estilos-home/header.css">
    <link rel="stylesheet" href="Assets/estilos-home/presentacion.css">
    <link rel="stylesheet" href="Assets/estilos-home/mapa.css">
    <link rel="stylesheet" href="Assets/estilos-home/interfaz.css">
    <link rel="stylesheet" href="Assets/estilos-home/informacion.css">  /*Informacion que aparece en la parte superior derecha del mapa cuando se pasa el mouse por un municipio*/
    
</head>
<body>

    <header class="Contenedor-header">
        <nav class="Navegador">
            <div class="Logo">
                <img src="Assets/artesanias/images/puebla.png" alt="">
                <h1>Artesanos en puebla</h1>
            </div>
            <ul class="Menu-nav">
                <li>
                    <a href="home">Inicio</a>
                </li>

                <li>
                    <a href="home.php">Registrate</a>
                </li>

                <li>
                    <a href="login">Iniciar Sesion</a>
                </li>

            </ul>
        </nav>
    </header>   -->
    
   



<?php
    headerMapa($data);
	headerArtesanias($data);

    $arrBannermun = ($data['bannermunicipios']);
    //dep($arrBannermun);

    $arrBanner = ($data['banner']);
    $arrArtesanias = ($data['artesanias']);
    //dep($data);
    //dep($arrBanner);
    //dep($arrArtesanias);


?>

<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<link rel="stylesheet" href="leaflet-geocoder-ban.css">

    <style>
        

        .leaflet-popup-content img{
            width: 100%;
            margin: 10px auto;
        }

        .leaflet-popup-content {
            width: 250px;
            height: 400px;
            margin: 0 auto;
            padding: 15px;
            overflow: auto;
            scrollbar-color: rgba(0, 0, 0, .3) rgba(0, 0, 0, 0);
            scrollbar-width: thin;
            
        }

        .leaflet-popup-content::-webkit-scrollbar {
        -webkit-appearance: none;
        }

        .leaflet-popup-content-wrapper{
            
            border-top-right-radius: 40px 0;
            border-bottom-right-radius: 40px 0;
            box-shadow: 1px 5px 20px 10px #000;
            
            
        }

        .leaflet-container a{
           text-decoration: none;
           color: black;
        }

        .leaflet-container a:hover{
            color: white;
        }

        .leaflet-container a.leaflet-popup-close-button{
            color: red;
        }

        .leaflet-container a.leaflet-popup-close-button:hover {
	    color: blue;
	    }

        

        .btn-outline-info{
            width: 200px;
            display:block;
            margin: 0 auto;
        }

        .btn-outline-success {
            width: 200px;
            display:block;
            margin: 0 auto;
        }

        .btn-outline-info a{
            font-size: small;
            
        }

        .btn-outline-success a {
            font-size: small;
        }


        .leaflet-popup-content p{
            text-align: justify;
            margin-bottom: -15px;
        }

        .leaflet-popup-content h1{
            text-align: center;
        }

        .fa-map-marker{
            color: green;
            margin: auto 45%;
            font-size: 40px;
        }
        
        .fa.fa-times{
            color: red;  
            margin: auto 45%;
            font-size: 40px;
            
            /*font-size: 40px;*/
        }

        /*.leaflet-popup-content .ajalpan{
            color: red;
        }*/
        
    </style>

    <section class="Contenedor-mapa">

        <div class="Contenido-mapa" >
 
            <div class="mapa" id="mapa" ></div>
        </div>

    </section>


        
  
    <!-- Banner Municipios -->
    <!--
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
        <div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Municipios
				</h3>
			</div>
			<hr><hr>
            <div class="sec-banner bg0 p-t-80 p-b-50">
                <div class="container">
                    <div class="row">
                        
                        <?php
                        for ($m=0; $m < count($arrBannermun) ; $m++) { 
                    
                        
                        ?>
                         
                        
                        <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                        
                         
                        
                        
                            <div class="block1 wrap-pic-w">
                                <img src="images/PUE.png" alt="<?php $arrBannermun[$m]['municipio']?>">

                                <a href="<?= '/Proyecto-Residencia-Profesional-2'.'/artesano/municipio/'.$arrBannermun[$m]['municipio']?>" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                                    <div class="block1-txt-child1 flex-col-l">
                                        <span class="block1-name ltext-102 trans-04 p-b-8">
                                            <?= $arrBannermun[$m]['municipio']?>
                                        </span>

                                    </div>

                                    <div class="block1-txt-child2 p-b-4 trans-05">
                                        <div class="block1-link stext-101 cl0 trans-09">
                                            IR AL MUNICIPIO
                                            
                                        </div>
                                    </div>
                                </a>
                            </div>
                            

                        </div>
                    

                        <?php
                        }
                        ?>
                    
                    
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->



    
    <section class="Contenedor-municipios">
        <div class="Contenido-municipios">
            <div class="Municipios">
                <h3>Seleccione un Municipio</h3>
                <select data-live-search="true" class="Select_municipios" id="municipios">
                    <option value="19.11315,-97.94433">Acajete</option>
                    <option value="20.12510,-97.21327">Acateno</option>
                    <option  value="18.20351, -98.04956" value="17.96638, -98.22046">Acatlán</option>
                    <option value="19.03397, -97.77225">Acatzingo</option>
                    <option value="18.76678, -98.71240">Acteopan</option>
                    <option value="20.00537, -97.85785">Ahuacatlán</option>
                    <option value="18.57215, -98.25715">Ahuatlán</option>
                    <option value="20.04615, -98.16483">Ahuazotepec</option>
                    <option value="18.21173, -98.22226">Ahuehuetitla</option>
                    <option value="18.38045, -97.26096">Ajalpan</option>
                    <option value="18.00330, -98.54834">Albino Zertuche</option>
                    <option value="19.09658, -97.52749">Aljojuca</option>
                    <option value="18.37255, -97.29815">Altepexi</option>
                    <option value="20.04777, -97.79734">Amixtlán</option>
                    <option value="19.04213, -98.04696">Amozoc</option>
                    <option value="19.79949, -97.93858">Aquixtlan</option>
                    <option value="19.83726, -97.45785">Atempan</option>
                    <option value="18.39879, -97.73651">Atexcal</option>
                    <option value="18.91285, -98.43223">Atlixco</option>
                    <option value="18.82104, -97.91300">Atoyatempan</option>
                    <option value="18.54534, -98.55303">Atzala</option>
                    <option value="18.82201, -98.58465">Atzitzihuacan</option>
                    <option value="18.89688, -97.32598">Atzitzintla</option>
                    <option value="18.18815, -98.38951">Axutla</option>
                    <option value="20.09764, -97.40982">Ayotoxco de Guerrero</option>
                    <option value="19.10595, -98.46881">Calpan</option>
                    <option value="18.18214, -97.47962">Caltepec</option>
                    <option value="20.03761, -97.75802">Camocuautla</option>
                    <option value="20.06350, -97.60781">Caxhuacan</option>
                    <option value="20.06027, -97.73081">Coatepec</option>
                    <option value="18.61420, -98.16664">Coatzingo</option>
                    <option value="18.19151, -98.81002">Cohetzala</option>
                    <option value="18.78048, -98.71938">Cohuecan</option>
                    <option value="19.11245, -98.30363">Coronango</option>
                    <option value="18.26732, -97.14996">Coxcatlán</option>
                    <option value="18.28274, -96.98831">Coyomeapan</option>
                    <option value="18.42646, -97.86812">Coyotepec</option>
                    <option value="18.91916, -97.82596">Cuapiaxtla de Madero</option>
                    <option value="19.91299, -97.79980">Cuautempan</option>
                    <option value="18.95426, -98.01780">Cuautinchán</option>
                    <option value="19.08407, -98.26634">Cuautlancingo</option>
                    <option value="18.47968, -98.18691">Cuayuca de Andrade</option>
                    <option value="20.01751, -97.52377">Cuetzalan del Progreso</option>
                    <option value="19.60233, -97.62127">Cuyoaco</option>
                    <option value="18.98253, -97.44862">Chalchicomula de Sesma</option>
                    <option value="18.62569, -97.40532">Chapulco</option>
                    <option value="18.27821, -98.58977">Chiautla</option>
                    <option value="19.20321, -98.46922">Chiautzingo</option>
                    <option value="20.09400, -97.93906">Chiconcuautla</option>
                    <option value="19.19911, -97.06675">Chichiquila</option>
                    <option value="18.51923, -98.57605">Chietla</option>
                    <option value="18.64556, -98.07538">Chigmecatitlán</option>
                    <option value="19.83837, -98.03150">Chignahuapan</option>
                    <option value="19.81309, -97.39062">Chignautla</option>
                    <option value="17.97139, -97.86151">Chila</option>
                    <option value="18.10891, -98.48438">Chila de la Sal</option>
                    <option value="20.23859, -98.21181">Honey</option>
                    <option value="19.25333, -97.18478">Chilchotla</option>
                    <option value="18.20754, -98.26088">Chinantla</option>
                    <option value="19.14245, -98.45206">Domingo Arenas</option>
                    <option value="18.49931, -96.95527">Eloxochitlán</option>
                    <option value="18.64168, -98.37172">Epatlán</option>
                    <option value="18.86055, -97.37610">Esperanza</option>
                    <option value="20.69807, -97.82483">Francisco Z. Mena</option>
                    <option value="19.03074, -97.66801">General Felipe Ángeles</option>
                    <option value="18.08914, -98.12100">Guadalupe</option>
                    <option value="19.28746, -97.34415">Guadalupe Victoria</option>
                    <option value="20.12129, -97.74379">Hermenegildo Galeana</option>
                    <option value="18.76829, -98.54253">Huaquechula</option>
                    <option value="18.67962, -98.04508">Huatlatlauca</option>
                    <option value="20.17626, -98.06291">Huauchinango</option>
                    <option value="20.10445, -97.62470">Huehuetla</option>
                    <option value="18.36990, -98.68333">Huehuetlán el Chico</option>
                    <option value="19.15872, -98.41318">Huejotzingo</option>
                    <option value="19.89341, -97.44376">Hueyapan</option>
                    <option value="19.94014, -97.28868">Hueytamalco</option>
                    <option value="20.02630, -97.69685">Hueytlalpan</option>
                    <option value="19.94589, -97.71251">Huitzilan de Serdán</option>
                    <option value="18.76793, -97.88193">Huitziltepec</option>
                    <option value="20.01323, -97.62448">Atlequizayan</option>
                    <option value="18.03133, -98.69828">Ixcamilpa de Guerrero</option>
                    <option value="18.45887, -97.83123">Ixcaquixtla</option>
                    <option value="19.62232, -97.81516">Ixtacamaxtitlán</option>
                    <option value="20.02427, -97.64565">Ixtepec</option>
                    <option value="18.59951, -98.46860">Izúcar de Matamoros</option>
                    <option value="20.47754, -97.94275">Jalpan</option>
                    <option value="18.32068, -98.84131">Jolalpan</option>
                    <option value="20.03015, -97.57494">Jonotla</option>
                    <option value="20.16266, -97.69266">Jopala</option>
                    <option value="19.11152, -98.32769">Juan C. Bonilla</option>
                    <option value="20.21224, -98.00633">Juan Galindo</option>
                    <option value="18.53103, -97.73847">Juan N. Méndez</option>
                    <option value="19.29289, -97.28668">Lafragua</option>
                    <option value="19.46899, -97.68579">Libres</option>
                    <option value="18.75904, -98.10205">La Magdalena Tlatlauquitepec</option>
                    <option value="19.11282, -97.70190">Mazapiltepec de Juárez</option>
                    <option value="18.90471, -97.89623">Mixtla</option>
                    <option value="18.73810, -97.91081">Molcaxac</option>
                    <option value="18.73720, -97.42185">Cañada Morelos</option>
                    <option value="20.23136, -98.10803">Naupan</option>
                    <option value="19.96070, -97.60378">Nauzontla</option>
                    <option value="19.05151, -98.42880">Nealtican</option>
                    <option value="18.61288, -97.30554">Nicolás Bravo</option>
                    <option value="19.21864, -97.82289">Nopalucan</option>
                    <option value="19.55269, -97.64768">Ocotepec</option>
                    <option value="18.97158, -98.29878">Ocoyucan</option>
                    <option value="20.10101, -97.68387">Olintla</option>
                    <option value="19.37642, -97.61880">Oriental</option>
                    <option value="20.27690, -98.14941">Pahuatlán</option>
                    <option value="18.83570, -97.54915">Palmar de Bravo</option>
                    <option value="20.52001, -97.93837">Pantepec</option>
                    <option value="18.08313, -97.91752">Petlalcingo</option>
                    <option value="18.19934, -98.25233">Piaxtla</option>
                    <option value="19.04105, -98.20438">Puebla</option>
                    <option value="18.95611, -97.65639">Quecholac</option>
                    <option value="19.25358, -97.13689">Quimixtlán</option>
                    <option value="19.22335, -97.80137">Rafael Lara Grajales</option>
                    <option value="18.94459, -97.80611">Los Reyes de Juárez</option>
                    <option value="19.05932, -98.29341">San Andrés Cholula</option>
                    <option value="18.50594, -97.29161">San Antonio Cañada</option>
                    <option value="18.81173, -98.33102">San Diego la Mesa Tochimiltzingo</option>
                    <option value="19.23691, -98.50251">San Felipe Teotlalcingo</option>
                    <option value="20.09124, -97.79645">San Felipe Tepatlán</option>
                    <option value="18.32662, -97.34681">San Gabriel Chilac</option>
                    <option value="19.01973, -98.34425">San Gregorio Atzompa</option>
                    <option value="19.01058, -98.40656">San Jerónimo Tecuanipan</option>
                    <option value="18.22257, -97.91051">San Jerónimo Xayacatlán</option>
                    <option value="19.23919, -97.76735">San José Chiapa</option>
                    <option value="18.29136, -97.28989">San José Miahuatlán</option>
                    <option value="19.08552, -97.53948">San Juan Atenco</option>
                    <option value="18.74570, -98.02526">San Juan Atzompa</option>
                    <option value="19.28799, -98.43542">San Martín Texmelucan</option>
                    <option value="18.65119, -98.34487">San Martín Totoltepec</option>
                    <option value="19.32328, -98.49818">San Matías Tlalancaleca</option>
                    <option value="18.00187, -97.77444">San Miguel Ixitlán</option>
                    <option value="19.16676, -98.30974">San Miguel Xoxtla</option>
                    <option value="19.16333, -97.55255">San Nicolás Buenos Aires</option>
                    <option value="19.07092, -98.48686">San Nicolás de los Ranchos</option>
                    <option value="18.12366, -98.08604">San Pablo Anicano</option>
                    <option value="19.07144, -98.31699">San Pedro Cholula</option>
                    <option value="18.11694, -98.07769">San Pedro Yeloixtlahuaca</option>
                    <option value="19.13053, -97.63886">San Salvador el Seco</option>
                    <option value="19.26856, -98.51687">San Salvador el Verde</option>
                    <option value="18.91494, -97.77722">San Salvador Huixcolotla</option>
                    <option value="18.40519, -96.85126">San Sebastián Tlacotepec</option>
                    <option value="18.61611, -98.08094">Santa Catarina Tlaltempan</option>
                    <option value="18.41289, -98.01593">Santa Inés Ahuatempan</option>
                    <option value="18.99575, -98.38036">Santa Isabel Cholula</option>
                    <option value="18.54819, -97.44351">Santiago Miahuatlán</option>
                    <option value="18.74013, -98.16845">Huehuetlán el Grande</option>
                    <option value="18.89108, -97.86730">Santo Tomás Hueyotlipan</option>
                    <option value="19.12404, -97.71782">Soltepec</option>
                    <option value="18.90218, -97.97443">Tecali de Herrera</option>
                    <option value="18.88183, -97.73305">Tecamachalco</option>
                    <option value="18.10799, -98.31328">Tecomatlán</option>
                    <option value="18.46656, -97.40057">Tehuacán</option>
                    <option value="18.33396, -98.27370">Tehuitzingo</option>
                    <option value="20.17158, -97.40572">Tenampulco</option>
                    <option value="18.71481, -98.26450">Teopantlán</option>
                    <option value="18.46995, -98.77834">Teotlalco</option>
                    <option value="18.55399, -97.56052">Tepanco de López</option>
                    <option value="20.00475, -97.79717">Tepango de Rodríguez</option>
                    <option value="19.07785, -97.97296">Tepatlaxco de Hidalgo</option>
                    <option value="18.97361, -97.90326">Tepeaca</option>
                    <option value="18.73598, -98.62968">Tepemaxalco</option>
                    <option value="18.72067, -98.44717">Tepeojuma</option>
                    <option value="19.96691, -97.84199">Tepetzintla</option>
                    <option value="18.64397, -98.68976">Tepexco</option>
                    <option value="18.58409, -97.93035">Tepexi de Rodríguez</option>
                    <option value="19.48842, -97.49043">Tepeyahualco</option>
                    <option value="18.81318, -97.87752">Tepeyahualco de Cuauhtémoc</option>
                    <option value="19.81570, -97.80685">Tetela de Ocampo</option>
                    <option value="19.85772, -97.45575">Teteles de Avila Castillo</option>
                    <option value="19.81600, -97.35752">Teziutlán</option>
                    <option value="18.97210, -98.44952">Tianguismanalco</option>
                    <option value="18.59185, -98.55602">Tilapa</option>
                    <option value="18.68209, -97.64975">Tlacotepec de Benito Juárez</option>
                    <option value="20.32728, -98.07197">Tlacuilotepec</option>
                    <option value="19.11332, -97.42066">Tlachichuca</option>
                    <option value="19.33424, -98.58346">Tlahuapan</option>
                    <option value="19.17088, -98.34046">Tlaltenango</option>
                    <option value="18.86324, -97.88713">Tlanepantla</option>
                    <option value="20.13612, -97.92118">Tlaola</option>
                    <option value="20.12260, -97.85062">Tlapacoya</option>
                    <option value="18.69565, -98.53325">Tlapanalá</option>
                    <option value="19.85219, -97.49469">Tlatlauquitepec</option>
                    <option value="20.42131, -98.02839">Tlaxco</option>
                    <option value="18.89102, -98.57251">Tochimilco</option>
                    <option value="18.83696, -97.82223">Tochtepec</option>
                    <option value="18.22389, -97.85513">Totoltepec de Guerrero</option>
                    <option value="18.04695, -98.44359">Tulcingo</option>
                    <option value="20.06571, -97.57631">Tuzamapan de Galeana</option>
                    <option value="18.83918, -98.04691">Tzicatlacoyan</option>
                    <option value="20.50817, -97.67163">Venustiano Carranza</option>
                    <option value="19.05823, -97.81808">Vicente Guerrero</option>
                    <option value="18.23821, -97.97456">Xayacatlán de Bravo</option>
                    <option value="20.27822, -97.96418">Xicotepec</option>
                    <option value="18.05878, -98.52558">Xicotlán</option>
                    <option value="19.72675, -97.36823">Xiutetelco</option>
                    <option value="19.82077, -97.65985">Xochiapulco</option>
                    <option value="18.65040, -98.34015">Xochiltepec</option>
                    <option value="19.96899, -97.62926">Xochitlán de Vicente Suárez</option>
                    <option value="18.70156, -97.78507">Xochitlán Todos Santos</option>
                    <option value="19.86981, -97.46518">Yaonáhuac</option>
                    <option value="18.79401, -97.66176">Yehualtepec</option>
                    <option value="18.59278, -98.06371">Zacapala</option>
                    <option value="19.87759, -97.58893">Zacapoaxtla</option>
                    <option value="19.93500, -97.96074">Zacatlán</option>
                    <option value="18.32874, -97.47439">Zapotitlán</option>
                    <option value="20.00165, -97.71486">Zapotitlán de Méndez</option>
                    <option value="19.77187, -97.55624">Zaragoza</option>
                    <option value="19.71881, -97.67212">Zautla</option>
                    <option value="20.25211, -97.88720">Zihuateutla</option>
                    <option value="18.33447, -97.24630">Zinacatepec</option>
                    <option value="19.97910, -97.72549">Zongozotla</option>
                    <option value="20.00597, -97.59780">Zoquiapan</option>
                    <option value="18.33817, -97.00996">Zoquitlán</option>
                </select> 
            </div>
            

            <div class="Info-municipios">
                <h3>Municipios de Puebla</h3>
                <p>El estado de Puebla es una de las 32 entidades federativas de la Republica Méxicana. Se encuentra dividido por 217 municipios. A pesar de su poco territorio es el segundo estado del país por número de ayuntamientos, siendo superado por Oaxaca, compuesto por 570 de ellos.
                </p>
            </div>
        </div>
    </section>

	<br></br>
	<br></br>
	<br></br>

    


	<!--Categorias-->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Categorías
				</h3>
			</div>
			<hr><hr>
			<!-- Banner -->
			<div class="sec-banner bg0 p-t-80 p-b-50">
				<div class="container">
					<div class="row">
						<?php
						for ( $j=0; $j < count($arrBanner); $j++){
                            $ruta = $arrBanner[$j]['ruta'];

						?>
						<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
							<!-- Block1 -->
							<div class="block1 wrap-pic-w">
								<img src="<?= $arrBanner[$j]['portada'] ?>" alt="<?= $arrBanner[$j]['nombre'] ?>">
								<a href="<?= base_url().'/tipo/categoria/'.$arrBanner[$j]['idtipoartesania'].'/'.$ruta; ?>" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
									<div class="block1-txt-child1 flex-col-l">
									<span class="block1-name ltext-102 trans-04 p-b-8">
									<?= $arrBanner[$j]['nombre'] ?>
									</span>
									<span class="block1-info stext-102 trans-04">
									<?= $arrBanner[$j]['descripcion'] ?>
									</span>
									</div>
									<div class="block1-txt-child2 p-b-4 trans-05">
									<div class="block1-link stext-101 cl0 trans-09">
									Ver artesanias
									</div>
									</div>
								</a>
							</div>
						</div>
						<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>


    <section class="Contenedor-presentacion">
        <div class="PresentacionIndex">
            <img src="images/puebla.png" alt="">
            <div class="TextoPresentacion">
                <h3>Puebla</h3>
                <p>Puebla es uno de los treinta y un estados que, junto con la Ciudad de México, conforman México. El territorio poblano tiene una superficie de 34.251 km², por lo que es el vigésimo primer estado
                    más extenso del país. Tambien el el quinto estado más poblado del país con una población estimada de 6,168,883 habitantes. El estado de Puebla ha sido de gran importancia en la historia de México.
                    Dentro de él se han hallado los restos más antiguos del cultivo de maíz y camote en la region de Tehuacán. Fuel el escenario de ciudades prehispánicas tan importantes como Cantona y Cholula. Ademas de llegar a ser la segunda ciudad mas importante de la Nueva España.</p>
            </div>
        </div>

    </section>


	


	<!-- Product -->
    <!--
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Artesanias
				</h3>
			</div>

			<hr><hr>

			<div class="row isotope-grid">
                <-?php
                    for ($p=0; $p < count($arrArtesanias) ; $p++){
                        if(count($arrArtesanias[$p]['images']) > 0){
                            $portada = $arrArtesanias[$p]['images'][0]['url_image'];
                        }else{
                            $portada = 'Assets/images/uploads/product.png';
                        }
                ?>

				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<!--<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="<-?= $portada ?>" alt="<-?= $arrArtesanias[$p]['nombre_artesania'] ?>">

							<a href="<-?= 'http://localhost/Proyecto-Residencia-Profesional-2/tipo/artesania/'.$arrArtesanias[$p]['nombre_artesania']; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Ver artesania
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="<-?= 'http://localhost/Proyecto-Residencia-Profesional-2/tipo/artesania/'.$arrArtesanias[$p]['nombre_artesania']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<-?= $arrArtesanias[$p]['nombre_artesania']; ?>
								</a>

								
							</div>

						</div>
					</div>
				</div>

                <-?php
                 }
                ?>

			</div>

		</div>
	</section>
                -->
    

    <!-- Related Products -->
    
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">

        <div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Artesanías
				</h3>
			</div>

			<hr><hr>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">

                <?php
                if(!empty($arrArtesanias)){
                    for ($p=0; $p < count($arrArtesanias); $p++) {
                        $ruta = $arrArtesanias[$p]['ruta'];
                        if(count($arrArtesanias[$p]['images']) > 0 ){
                            $portada = $arrArtesanias[$p]['images'][0]['url_image'];
                        }else{
                            $portada = media().'/images/uploads/product.png';
                        }
                ?>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="<?= $portada; ?>" alt="<-?= $arrArtesanias[$p]['nombre_artesania'] ?>">

                                <a href="<?= 'http://localhost/Proyecto-Residencia-Profesional-2/tipo/artesania/'.$arrArtesanias[$p]['idartesania'].'/'.$ruta; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
                                    Ver artesania
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="<?= 'http://localhost/Proyecto-Residencia-Profesional-2/tipo/artesania/'.$arrArtesanias[$p]['idartesania'].'/'.$ruta; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        <?= $arrArtesanias[$p]['nombre_artesania'] ?>
                                    </a>
                                </div> 
                            </div>
                        </div>
                    </div>
                
                <?php
                    }
                }				
                ?>

                </div>
            </div>
        </div>
    </section>
            
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    
    <script src="leaflet-geocoder-ban.min.js"></script>

	
<?php
    footerMapa($data);
	footerArtesanias($data);
?>

	






    <!--<footer>

    </footer>
<script src="municipios.js"></script>
<script src="mapa.js"></script>
<script src="seleccionmunicipios.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetAlert.js"></script>


    
</body>
</html>-->
