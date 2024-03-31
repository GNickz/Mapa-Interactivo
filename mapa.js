var mapa = L.map('mapa',{
    center: [19.26, -97.7],
    
    zoom: 8,
    maxZoom:15,
    minZoom: 8
    
});



/*L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
	attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ, TomTom, Intermap, iPC, USGS, FAO, NPS, NRCAN, GeoBase, Kadaster NL, Ordnance Survey, Esri Japan, METI, Esri China (Hong Kong), and the GIS User Community'
*/

L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
	attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'

/*
L.tileLayer('https://basemap.nationalmap.gov/arcgis/rest/services/USGSImageryOnly/MapServer/tile/{z}/{y}/{x}', {
	attribution: 'Tiles courtesy of the <a href="https://usgs.gov/">U.S. Geological Survey</a>',
*/
/*
L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Terrain_Base/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles &copy; Esri &mdash; Source: USGS, Esri, TANA, DeLorme, and NPS',
*/
/*
L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Physical_Map/MapServer/tile/{z}/{y}/{x}', {
	attribution: 'Tiles &copy; Esri &mdash; Source: US National Park Service',
 */
/*    L.tileLayer('https://map1.vis.earthdata.nasa.gov/wmts-webmerc/VIIRS_CityLights_2012/default/{time}/{tilematrixset}{maxZoom}/{z}/{y}/{x}.{format}', {
	attribution: 'Imagery provided by services from the Global Imagery Browse Services (GIBS), operated by the NASA/GSFC/Earth Science Data and Information System (<a href="https://earthdata.nasa.gov">ESDIS</a>) with funding provided by NASA/HQ.',
	bounds: [[-85.0511287776, -179.999999975], [85.0511287776, 179.999999975]],
	minZoom: 1,
	maxZoom: 8,
	format: 'jpg',
	time: '',
	tilematrixset: 'GoogleMapsCompatible_Level'*/

   
}).addTo(mapa);





/*Municipios que se desplegan */

function desplegable(){
    div = getElementById('municipios')
}

document.getElementById('municipios').addEventListener('change', function(e){
    let coordenadas = e.target.value.split(",");
    mapa.flyTo(coordenadas, 11);
}); 





//estilos de la forma del mapa como color de fondo y contorno
function style(feature){
    return{
        color: 'gold',
        opacity: 1,
        weight: 1.2,
        fillOpacity: 0.01
    };
}





//el color cambiara cuando el usuario pase el mouse sobre un municipio


function highlightFeature(e) {

    var layer = e.target;

    layer.setStyle({
        color: 'red',
        fillOpacity: 0.5
        
    });

    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
        layer.bringToFront();
    }

    informacion.update(layer.feature.properties);

}

// funciones cuando pasamos el mouse sobre los municipios del mapa

function resetHighlight(e){
    geojson.resetStyle(e.target);
    informacion.update();
}

var geojson;


function zoomToFeature(e) {
    mapa.fitBounds(e.target.getBounds());
}

function onEachFeature(feature, layer) {
    layer.on({
        mouseover: highlightFeature,
        mouseout: resetHighlight,
        click: zoomToFeature
    });
}

geojson = L.geoJson(statesData,{
    style:style,
    onEachFeature: onEachFeature,
}).addTo(mapa);


//Geolocalizacion

mapa.locate({setView: true, maxZoom:8});

function onLocationFound(e) {
    var radius = e.accuracy;

    L.marker(e.latlng).addTo(mapa)
        .bindPopup(
        " <img src='Assets/images/uploads/bienvenido.png'>"+
        "<p>Saludos, esta es una ventana emergente la cual se encuentra presente en cada uno de los iconos color verde, como el que se muestras a continuación:</p>" +
        "<br></br>"+ 
        "<i class='fa fa-map-marker'></i>"+
        "<p>Estos estarán disponibles sobre cada uno de los municipios presentes en el mapa interactivo, al presionar cualquier icono este hara emerger una  nueva ventana parecida a esta, la cual contendrá toda la información necesaria del municipio seleccionado, como de igual manera la función para visualizar los registros de datos de cada uno de los artesanos dados de alta en dicho municipio.</p>"+
        "<br></br>"+
        "<hr></hr>"+
        "<p>Para cerrar esta ventana puedes precionar el icono de color rojo:</p>"+
        "<br></br>"+
        "<i class='fa fa-times'></i>"+
        "<p>que se encuentra en la esquina superior derecha de esta ventana o bien puedes precionar en cualquier otra parte del mapa fuera de esta ventana para cerrala.</p>"+
        "<br></br>"
        ).openPopup();

    L.circle(e.latlng, radius).addTo(mapa);
}

mapa.on('locationfound', onLocationFound);



// Informacion superior derecha
var informacion = L.control();

informacion.onAdd = function (mapa){
    this._div = L.DomUtil.create('div', 'informacion');
    this.update();
    return this._div;
};

informacion.update = function (props){
    this._div.innerHTML ='<h4></h4>' + (props ?
        "<img src='images/marker-icon.png'>" + '<h3>' + props.name +'<br></br>'  +  '<h5>' + 'Número' +'<br>' + '<h4>' +props.Clave_de_municipio + '<br></br>': 'Seleccione Municipio a explorar');
};

informacion.addTo(mapa);



L.Control.geocoder().addTo(mapa);

