/*$('.ver_registrocompleto').click(function(e){

    e.preventDefault();
    var datos = $(this).attr('registrocompleto', 'municipio', 'direccion');
    var municipio = $(this).attr('municipio');
    var artesania = $(this).attr('artesania');

    var imagen = $(this).attr('img');


    var categoria = $(this).attr('categoria')
    var artesano = $(this).attr('artesano');
    var descripcion = $(this).attr('descripcion');
    var telefono = $(this).attr('telefono');
    var direccion = $(this).attr('direccion');
    var empresa = $(this).attr('empresa');
    var correo = $(this).attr('correo');
    var redes = $(this).attr('redes');
    var pagina = $(this).attr('pagina');
    

    Swal.fire({
        html:'Información General'+ '<br></br>'+
        '<a>Nombre del municipio:</a>'+ '<br></br>' + municipio + '<br></br>'+
        '<a>Nombre de la artesania:</a>' +'<br>' + artesania + '<br></br>'+
        '<a>Imagen ilustrativa:</a>' +'<br></br>' + '<img>' + imagen + '</img>' + '<br></br>'+
        '<a>Tipo de artesania:</a>' +'<br></br>' + categoria + '<br></br>'+
        '<a>Nombre del artesano:</a>' +'<br></br>' + artesano + '<br></br>'+
        '<a>Breve descripción:</a>' +'<br></br>' + descripcion + '<br></br>'+
        'Contacto' +'<br></br>' +
        '<a>Numero telefonico:</a>' +'<br></br>' + telefono + '<br></br>'+
        '<a>Direccion de domicilio:</a>' +'<br></br>' + direccion + '<br></br>'+
        '<a>Nombre de empresa:</a>' +'<br></br>' + empresa + '<br></br>'+
        '<a>Correo electronico:</a>' +'<br></br>' + correo + '<br></br>'+
        '<a>Redes Sociales:</a>' +'<br></br>' + redes  + '<br></br>'+
        '<p>Sitio Web</p>' + '<a href="'+ pagina+'" target="_blank"> '+pagina+'</a>',
        
        showCloseButton: true,
        showConfirmButton:true,
        confirmButtonText:'Cerrar',
        confirmButtonColor: 'red',
        
    })
});*/




	Swal.fire({title:"<strong style='color:darkorange'>" + 'Atención' + "</strong>",
	allowOutsideClick:false,
	iconColor:'#FF8000',
	icon: 'info',
	html:
	'</b>Si usted es artesano y no puede visualizar su información de contacto en la siguiente tabla, le sugerimos que verifique y actualice los datos de su perfil, esto lo podrá realizar accediendo a su cuenta <a href="http://localhost/Proyecto-Residencia-Profesional-2/login">aquí</a>, una vez ingresado al sistema diríjace al módulo perfil ubicado en el parte superior derecha de su pantalla y actualice sus datos.',
	showCloseButton: true,
	confirmButtonColor:'#00913f',
	focusConfirm: false, 
	confirmButtonText:
	'<i class="fa fa-thumbs-up"></i> Entendido',
    })
