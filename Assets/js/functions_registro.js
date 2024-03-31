document.addEventListener('DOMContentLoaded', function(){

    
    if(document.querySelector("#formRegister")){
        let formRegister = document.querySelector("#formRegister");
        formRegister.onsubmit = function(e)
        {
            e.preventDefault();
           
            let strNombre = document.querySelector('#txtNombre').value;

            let strEmail = document.querySelector('#txtEmailArtesano').value;

            let intMunicipio = document.querySelector('#listMunicipioRegistroid').value;

            let strPassword = document.querySelector('#txtPasswordArtesano').value;

            let intcaptcha = document.querySelector('.g-recaptcha-response').value;



            


            if(strNombre == '' || strEmail == '' || intMunicipio == '' || strPassword == '' || intcaptcha == '' )
            {
                swal("Atención", "Los campos y el recaptcha son obligatorios." + " Por favor verifique que haya completado todo el formulario y vuelva a intentarlo.", "error");
                return false;
            }

            let elementsValid = document.getElementsByClassName("valid");
            for (let i=0; i < elementsValid.length; i++){
                if(elementsValid[i].classList.contains('is-invalid'))
                {
                    swal("¡Atención!", "Por favor verifique los campos en rojo", "error");
                    return false;
                }
            }

            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Registro/registroartesano';
            let formData = new FormData(formRegister);
            request.open("POST",ajaxUrl,true);
            request.send(formData);

            request.onreadystatechange = function()
            {
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal({allowOutsideClick:false, title:'¡Registro exitoso!', text: 'En hora buena sus datos han sido registrados exitosamente. Por favor espere a que nuestros administradores verifiquen su información para que pueda hacer uso del sistema, esto podrá demorar de 12 a 24 horas. Al momento de que pueda iniciar sesión le sugerimos que actualice sus datos personales y de contacto esto lo podrá realizar ingresando a la sección perfil ubicada en la parte superior derecha de su pantalla.'+
                        "<br>" 
                        +'Presione OK para cerrar esta ventana.', type:'success'},function(){
                        location.reload();
                        });
                       
                       //window.location.reload(false);
                       
                      
                      
                       
                    }else
                    {
                        swal("Error", objData.msg, "error");
                    }
                }
            }

        }
    }
})



window.addEventListener('load', function(){
    fntMunicipiosRegistro();
}, false);



function fntMunicipiosRegistro(){
    var ajaxUrl = base_url+'/Registro/getSelectMunicipiosRegistro';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            document.querySelector('#listMunicipioRegistroid').innerHTML = request.responseText;
            document.querySelector('#listMunicipioRegistroid').value = 1;
            $('#listMunicipioRegistroid').selectpicker('render');
        }
    }

}