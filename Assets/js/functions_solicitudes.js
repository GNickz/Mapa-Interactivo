var tableSolicitudes;
document.addEventListener('DOMContentLoaded', function(){

    tableSolicitudes = $('#tableSolicitudes').dataTable(
        {
            "aProcessing": true,
            "aServerSide": true,
            "language":
            {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },

            "ajax":
            {
                "url":"/Proyecto-Residencia-Profesional-2/Solicitudes/getSolicitudes",
                "dataSrc":""
            },

            "columns":
            [
                {"data":"idpersona"},
                {"data":"nombrecompleto"},
                {"data":"municipio"},
                {"data":"email_usuario"},
                {"data":"status"},
                {"data":"options"}
            ],

            "responsive":"true",
            "bDestroy": true,
            "iDisplayLength": 10,
            "order":[[0,"asc"]]

        });

    let formSolicitud = document.querySelector("#formSolicitud");
    formSolicitud.onsubmit = function(e){
        e.preventDefault();

        let strNombreSolicitante = document.querySelector('#txtNombreSolicitante').value;
      
        let strEmailSolicitante = document.querySelector('#txtEmailSolicitante').value;
        let intMunicipioSolicitante = document.querySelector('#listMunicipioid').value;

        if(strNombreSolicitante == ''  || strEmailSolicitante == '' || intMunicipioSolicitante == '')
        {
            swal("Atencion", "Todos los campos son obligatorios.", "error");
            return false;
        }

        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = 'Solicitudes/setSolicitud';
        let formData = new FormData(formSolicitud);
        request.open("POST", ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    $('#modalFormSolicitud').modal("hide");
                    formSolicitud.reset();
                    swal("Solicitud", objData.msg, "success");
                    tableSolicitudes.api().ajax.reload();
                }else{
                    swal("Error", objData.msg, "error");
                }
            }
        }

    }

},false)



window.addEventListener('load', function (){
    fntMunicipiodelsolicitante();
    /*fntViewSolicitud();
    fntEditSolicitud();
    fntDelSolicitud();*/
}, false);




function fntMunicipiodelsolicitante()
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
                document.querySelector('#listMunicipioid').value = 1;
                $('#listMunicipioid').selectpicker('render');
            }
        }
    }
}




function fntViewSolicitud(idpersona){
   
            var idpersona = idpersona;
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = 'Solicitudes/getSolicitud/'+idpersona;
            request.open("GET",ajaxUrl,true);
            request.send();
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        var estadoSolicitud = objData.data.status == 1 ?
                        '<span class="badge badge-success">Activo</span>' :
                        '<span class="badge badge-danger">Inactivo</span>';
                        document.querySelector("#celNombre").innerHTML = objData.data.nombrecompleto;
                        document.querySelector("#celEmail").innerHTML = objData.data.email_usuario;
                        document.querySelector("#celMunicipio").innerHTML = objData.data.municipio;
                        document.querySelector("#celStatus").innerHTML = estadoSolicitud;

                        $('#modalViewSolicitud').modal('show');
                        }else{
                        swal("Error", objData.msg, "error");
                        }
                }
            }
}

function fntEditSolicitud(idpersona){

    

            document.querySelector('#titleModal').innerHTML = "Actualizar Solicitud";
            document.querySelector('#restriccion-campos').innerHTML = "";
            document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
            document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-success");
            document.querySelector('#btnText').innerHTML = "Actualizar";


            var idpersona = idpersona;
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = 'Solicitudes/getSolicitud/'+idpersona;
            request.open("GET",ajaxUrl,true);
            request.send();
            request.onreadystatechange = function(){

                if(request.readyState == 4 && request.status == 200){
                     objData = JSON.parse(request.responseText);

                    if(objData.status)
                    {
                        document.querySelector('#idSolicitud').value = objData.data.idpersona;
                        document.querySelector('#txtNombreSolicitante').value = objData.data.nombrecompleto;
                     
                        document.querySelector('#txtEmailSolicitante').value = objData.data.email_usuario;
                        document.querySelector("#listMunicipioid").value = objData.data.idmunicipio;
                        $('#listMunicipioid').selectpicker('render');

                          
                        if(objData.data.status == 1){
                            document.querySelector("#listStatus").value = 1;
                        }else{
                            document.querySelector("#listStatus").value = 2;
                        }
                        $('#listStatus').selectpicker('render');
                  
                    }
                }

                $('#modalFormSolicitud').modal('show');
                
            }
}

function fntDelSolicitud(idpersona){
    
            var idUsuario = idpersona;

            swal({
                title: "Eliminar Solicitud",
                text: "¿Realmente quiere eliminar esta Solicitud?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, Eliminar",
                cancelButtonText: "No, Cancelar",
                closeOnConfirm: false,
                closeOnCancel: true
            }, function(isConfirm){

                if(isConfirm)
                {
                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() :  new  ActiveXObject('Microsoft.XMLHTTP');
                    var ajaxUrl = 'Solicitudes/delSolicitud';
                    var strData = "idUsuario="+idUsuario;
                    request.open("POST",ajaxUrl,true);
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    request.send(strData);
                    request.onreadystatechange = function(){
                        if(request.readyState == 4 && request.status == 200){
                            var objData = JSON.parse(request.responseText);   
                            if(objData.status)
                            {
                                swal("Eliminar!", objData.msg, "success");
                                tableSolicitudes.api().ajax.reload(function(){
                                    fntMunicipiodelsolicitante();
                                    fntViewSolicitud();
                                    fntEditSolicitud();
                                    fntDelSolicitud();
                                });
                            }else
                            {
                                swal("¡Atencion!", objData , "error");
                            }
                        }
                    }
                }

            });
}


function openModal()
{
    document.querySelector('#idSolicitud').value = "";
    document.querySelector('.modal-header').classList.replace("headeUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva Solicitud";
    document.querySelector("#formSolicitud").reset();
    $('#modalFormSolicitud').modal('show');
}