let tableUsuarios;
let rowTable = "";

document.addEventListener('DOMContentLoaded', function()
{

    tableUsuarios = $('#tableUsuarios').dataTable(
        {
            "aProcessing": true,
            "aServerSide": true,
            "language":
            {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },

            "ajax":
            {
                "url":"/Proyecto-Residencia-Profesional-2/Usuarios/getUsuarios",
                "dataSrc":""
            },

            "columns":
            [
                {"data":"idpersona"},
                {"data":"nombrecompleto"},
                {"data":"email_usuario"},
                {"data":"telefono"},
                {"data":"municipio"},
                {"data":"nombrerol"},
                {"data":"status"},
                {"data":"options"}
            ],

            "responsive":"true",
            "bDestroy": true,
            "iDisplayLength": 10,
            "order":[[0,"desc"]]

        });


    if(document.querySelector("#formUsuario")){
        let formUsuario = document.querySelector("#formUsuario");
        formUsuario.onsubmit = function(e)
        {
            e.preventDefault();
            let strUsuario = document.querySelector('#txtUsuario').value;
            let strNombre = document.querySelector('#txtNombre').value;
            let strEmail = document.querySelector('#txtEmail').value;

            let intTelefono = document.querySelector('#txtTelefono').value;
            let strFacebook = document.querySelector('#txtFacebook').value;
            let strTwitter = document.querySelector('#txtTwitter').value;
            let strInstagram = document.querySelector('#txtInstagram').value;
            let strSitioWeb = document.querySelector('#txtSitioWeb').value;
            let strDomicilio = document.querySelector('#txtDomicilio').value;
            let strEmpresa = document.querySelector('#txtEmpresa').value;
            let intMunicipio = document.querySelector('#listMunicipioid').value;

            let intTipousuario = document.querySelector('#listRolid').value;
            let strPassword = document.querySelector('#txtPassword').value;

            let intStatus = document.querySelector('#listStatus').value;

            if(strUsuario == '' || strNombre == '' || strEmail == '' || intTelefono == '' || strFacebook == ''
            || strDomicilio == '' || intMunicipio == '' || intTipousuario == '' )
            {
                swal("Atencion", "Los campos que contengan * son obligatorios.", "error");
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
            let ajaxUrl = base_url+'/Usuarios/setUsuario';
            let formData = new FormData(formUsuario);
            request.open("POST",ajaxUrl,true);
            request.send(formData);

            request.onreadystatechange = function()
            {
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        if(rowTable == ""){
                            tableUsuarios.api().ajax.reload();
                        }else{
                            htmlStatus = intStatus == 1 ?
                            '<span class="badge badge-success">Activo</span>':
                            '<span class="badge badge-danger">Inactivo</span>';
                            rowTable.cells[1].textContent = strNombre;
                            rowTable.cells[2].textContent = strEmail;
                            rowTable.cells[3].textContent = intTelefono;
                            rowTable.cells[4].textContent = document.querySelector("#listMunicipioid").selectedOptions[0].text;
                            rowTable.cells[5].textContent = document.querySelector("#listRolid").selectedOptions[0].text;
                            rowTable.cells[6].innerHTML = htmlStatus;

                        }
                        $('#modalFormUsuario').modal("hide");
                        formUsuario.reset();
                        swal("Usuarios", objData.msg ,"success");
                        
                    }else
                    {
                        swal("Error", objData.msg, "error");
                    }
                }
            }

        }
    }
    
    //Metodo Para Actualizar el Perfil
    if(document.querySelector("#formPerfil")){
        let formPerfil = document.querySelector("#formPerfil");
        formPerfil.onsubmit = function(e)
        {
            e.preventDefault();
            let strUsuario = document.querySelector('#txtUsuario').value;
            let strNombre = document.querySelector('#txtNombre').value;
          
            let intTelefono = document.querySelector('#txtTelefono').value;
            let strFacebook = document.querySelector('#txtFacebook').value;
            let strTwitter = document.querySelector('#txtTwitter').value;
            let strInstagram = document.querySelector('#txtInstagram').value;
            let strSitioWeb = document.querySelector('#txtSitioWeb').value;
            let strDomicilio = document.querySelector('#txtDomicilio').value;
            let strEmpresa = document.querySelector('#txtEmpresa').value;
            let intMunicipio = document.querySelector('#listMunicipioid').value;
         
           
            let strPassword = document.querySelector('#txtPassword').value;
            let strPasswordConfirm = document.querySelector('#txtPasswordConfirm').value;


            if(strUsuario == '' || strNombre == '' ||  intTelefono == '' || strFacebook == ''
            || strDomicilio == '' || intMunicipio == '' )
            {
                swal("Atencion", "Los campos que contengan * son obligatorios.", "error");
                return false;
            }

            if(strPassword != "" || strPasswordConfirm != "")
            {
                if( strPassword != strPasswordConfirm)
                {
                    swal("Atención", "Las contraseñas no coinciden, vuelve a intentarlo.", "info");
                    return false;
                }
                if(strPassword.length < 5)
                {
                    swal("Atención", "La contraseña debe tener como minimo 5 caracteres." , "info");
                    return false;
                }
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
            let ajaxUrl = base_url+'/Usuarios/putPerfil';
            let formData = new FormData(formPerfil);
            request.open("POST",ajaxUrl,true);
            request.send(formData);

            request.onreadystatechange = function(){
                if(request.readyState != 4 ) return; 
                if(request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        
                        $('#modalFormPerfi').modal("hide");
                        swal({
                            title: "",
                            text: objData.msg,
                            type: "success",
                            confirmButtonText: "Aceptar",
                            closeOnConfirm: false,
                        }, function(isConfirm) {
                            if (isConfirm){
                                location.reload();
                            }
                        });
                    }else
                    {
                        swal("Error", objData.msg, "error");
                    }
                }
            }
        }
    }  
}, false);



window.addEventListener('load', function()
{
    fntRolesUsuario();
    fntMunicipio();
    //fntViewUsuario();
   // fntEditUsuario();
    //fntDelUsuario();
}, false);


function fntRolesUsuario()
{
    if(document.querySelector("#listRolid")){
        let ajaxUrl = base_url+'/Roles/getSelectRoles';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listRolid').innerHTML = request.responseText;
                
                $('#listRolid').selectpicker('render');
            }
        }
    }
}

//Prueba para ver si el select de municipios desplega los municipios de la DB
function fntMunicipio()
{
    if(document.querySelector("#listMunicipioid")){
        let ajaxUrl = base_url+'/Municipios/getSelectMunicipios';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listMunicipioid').innerHTML = request.responseText;
                document.querySelector('#listMunicipioid').value = 0;
                $('#listMunicipioid').selectpicker('render');
            }
        }
    }
}

function fntViewUsuario(idpersona)
{
    /*let btnViewUsuario = document.querySelectorAll(".btnViewUsuario");
    btnViewUsuario.forEach(function(btnViewUsuario)
    {
        btnViewUsuario.addEventListener('click',function()
        {*/
            //let idpersona = idpersona;//this.getAttribute("us");
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Usuarios/getUsuario/'+idpersona;
            request.open("GET",ajaxUrl,true);
            request.send();
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);

                    if(objData.status)
                    {
                        let estadoUsuario = objData.data.status == 1 ?
                        '<span class="badge badge-success">Activo</span>' :
                        '<span class="badge badge-danger">Inactivo</span>';

                        document.querySelector("#celUsuario").innerHTML = objData.data.usuario;
                        document.querySelector("#celNombre").innerHTML = objData.data.nombrecompleto;
                        document.querySelector("#celEmail").innerHTML = objData.data.email_usuario;
                        document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
                        document.querySelector("#celFacebook").innerHTML = objData.data.facebook;
                        document.querySelector("#celTwitter").innerHTML = objData.data.twitter;
                        document.querySelector("#celInstagram").innerHTML = objData.data.instagram;
                        document.querySelector("#celSitioWeb").innerHTML = objData.data.sitio_web;
                        document.querySelector("#celDomicilio").innerHTML = objData.data.domicilio;
                        document.querySelector("#celEmpresa").innerHTML = objData.data.empresa;
                        document.querySelector("#celMunicipio").innerHTML = objData.data.municipio;
                        document.querySelector("#celTipoUsuario").innerHTML = objData.data.nombrerol;
                        document.querySelector("#celStatus").innerHTML = estadoUsuario;
                        $('#modalViewUser').modal('show');
                    }else{
                        swal("Error", objData.msg, "error");
                    }
                }
            }
        /*});
    });*/


}


function fntEditUsuario(element,idpersona)
{
    /*let btnEditUsuario = document.querySelectorAll(".btnEditUsuario");
    btnEditUsuario.forEach(function(btnEditUsuario)
    {
        btnEditUsuario.addEventListener('click',function()
        {*/
            rowTable = element.parentNode.parentNode.parentNode;

            document.querySelector('#titleModal').innerHTML = "Actualizar Usuario";
            document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
            document.querySelector('#restriccion-campos').innerHTML = "Para poder actualizar los datos los campos con * son obligatorios";
            document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
            document.querySelector('#btnText').innerHTML = "Actualizar";




            //let idpersona = idpersona; //this.getAttribute("us");
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Usuarios/getUsuario/'+idpersona;
            request.open("GET",ajaxUrl,true);
            request.send();
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        document.querySelector('#idUsuario').value = objData.data.idpersona;
                        document.querySelector('#txtUsuario').value = objData.data.usuario;
                        document.querySelector('#txtNombre').value = objData.data.nombrecompleto;
                        document.querySelector('#txtEmail').value = objData.data.email_usuario;
                        document.querySelector('#txtTelefono').value = objData.data.telefono;
                        document.querySelector('#txtFacebook').value = objData.data.facebook;
                        document.querySelector('#txtTwitter').value = objData.data.twitter;
                        document.querySelector('#txtInstagram').value = objData.data.instagram;
                        document.querySelector('#txtSitioWeb').value = objData.data.sitio_web;
                        document.querySelector('#txtDomicilio').value = objData.data.domicilio;
                        document.querySelector('#txtEmpresa').value = objData.data.empresa;
                        document.querySelector('#listMunicipioid').value = objData.data.idmunicipio;
                        $('#listMunicipioid').selectpicker('render');
                        document.querySelector('#listRolid').value = objData.data.idrol;
                        $('#listRolid').selectpicker('render');
                        
                        if(objData.data.status == 1){
                            document.querySelector("#listStatus").value = 1;
                        }else{
                            document.querySelector("#listStatus").value = 2;
                        }
                        $('#listStatus').selectpicker('render');
                    }
                }

                $('#modalFormUsuario').modal('show');
            }
/*        });
    });*/
}

function fntDelUsuario(idpersona)
{
    /*let btnDelUsuario = document.querySelectorAll(".btnDelUsuario");
    btnDelUsuario.forEach(function(btnDelUsuario)
    {
        btnDelUsuario.addEventListener('click', function()
        {*/
            //let idUsuario = idpersona;  //this.getAttribute("us");
            swal({
                title: "Eliminar Usuario",
                text: "¿Realmente quiere eliminar este Usuario",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, Eliminar",
                cancelButtonText: "No, Cancelar",
                closeOnConfirm: false,
                closeOnCancel: true
            }, function(isConfirm) {

                if(isConfirm)
                {
                    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() :  new  ActiveXObject('Microsoft.XMLHTTP');
                    let ajaxUrl = base_url+'/Usuarios/delUsuario/';
                    let strData = "idUsuario="+idpersona;
                    request.open("POST",ajaxUrl,true);
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    request.send(strData);
                    request.onreadystatechange = function(){
                        if(request.readyState == 4 && request.status == 200){
                            let objData = JSON.parse(request.responseText);
                            if(objData.status)
                            {
                                swal("Eliminar!", objData.msg, "success");
                                tableUsuarios.api().ajax.reload();
                                /*tableUsuarios.api().ajax.reload(function(){
                                    fntRolesUsuario();
                                    fntMunicipio();
                                    fntViewUsuario();
                                    fntDelUsuario();
                                    fntViewUsuario();
                                    fntEditUsuario();
                                    
                                    
                                });*/
                            }else{
                                swal("¡Atencion!", objData , "error");
                            }
                        }
                    }
                }

            });
            
/*        });
    });*/

}




function openModal(){
    
    rowTable = "";
    document.querySelector('#idUsuario').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";
    document.querySelector('#formUsuario').reset();
    $('#modalFormUsuario').modal('show');
}

function openModalPerfil(){
    $('#modalFormPerfil').modal('show');
}