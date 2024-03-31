let tableCategorias;
let rowTable = "";
document.addEventListener('DOMContentLoaded',function(){

    tableCategorias = $('#tableCategorias').dataTable(
        {
            "aProcessing": true,
            "aServerSide": true,
            "language":
            {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },

            "ajax":
            {
                //"url":"/Proyecto-Residencia-Profesional-2/Categorias/getCategorias",
                "url": " "+base_url+"/Categorias/getCategorias",
                "dataSrc":""
            },

            "columns":
            [
                {"data":"idtipoartesania"},
                {"data":"nombre"},
                {"data":"descripcion"},
                {"data":"status"},
                {"data":"options"}
            ],

            "responsive":"true",
            "bDestroy": true,
            "iDisplayLength": 10,
            "order":[[0,"asesc"]]

        });

    if(document.querySelector("#foto")){
        let foto = document.querySelector("#foto");
        foto.onchange = function(e) {
            let uploadFoto = document.querySelector("#foto").value;
            let fileimg = document.querySelector("#foto").files;
            let nav = window.URL || window.webkitURL;
            let contactAlert = document.querySelector('#form_alert');
            if(uploadFoto !=''){
                let type = fileimg[0].type;
                let name = fileimg[0].name;
                if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png'){
                    contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';
                    if(document.querySelector('#img')){
                        document.querySelector('#img').remove();
                    }
                    document.querySelector('.delPhoto').classList.add("notBlock");
                    foto.value="";
                    return false;
                }else{  
                        contactAlert.innerHTML='';
                        if(document.querySelector('#img')){
                            document.querySelector('#img').remove();
                        }
                        document.querySelector('.delPhoto').classList.remove("notBlock");
                        let objeto_url = nav.createObjectURL(this.files[0]);
                        document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src="+objeto_url+">";
                    }
            }else{
                alert("No selecciono foto");
                if(document.querySelector('#img')){
                    document.querySelector('#img').remove();
                }
            }
        }
    }
    
    if(document.querySelector(".delPhoto")){
        let delPhoto = document.querySelector(".delPhoto");
        delPhoto.onclick = function(e) {
            document.querySelector("#foto_remove").value=1;
            removePhoto();
        }
    }

      //Scrip para la Creacion de un Nuevo Registro de Categorias
      let formCategoria = document.querySelector("#formCategoria");
      formCategoria.onsubmit = function(e)
      {
          e.preventDefault();

          //let intIdCategoria = document.querySelector('#idCategoria').value;

          let strNombre = document.querySelector('#txtNombre').value;
          let strDescripcion = document.querySelector('#txtDescripcion').value;
          let intStatus = document.querySelector('#listStatus').value;
          if(strNombre == '' || strDescripcion == '' || intStatus == '')
          {
              swal("Atención", "Todos los  campos son obligatorios.", "error");
              return false;
          }
          let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
          let ajaxUrl = base_url+'/Categorias/setCategoria';
          let formData = new FormData(formCategoria);
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
                        tableCategorias.api().ajax.reload();
                    }else{

                        htmlStatus = intStatus == 1 ?
                            '<span class="badge badge-success">Activo</span>':
                            '<span class="badge badge-danger">Inactivo</span>';
                        rowTable.cells[1].textContent = strNombre;
                        rowTable.cells[2].textContent = strDescripcion;
                        rowTable.cells[3].innerHTML = htmlStatus;
                        rowTable = "";
                    }
                    
                      $('#modalFormCategorias').modal("hide");
                      formCategoria.reset();
                      swal("Categoria", objData.msg, "success");
                      removePhoto();
                      //tableCategorias.api().ajax.reload(); 
                  }else
                  {
                      swal("Error", objData.msg, "error");
                  }
              }
          }
      }

}, false)


//Funcion para poder ver los registro de categorias
function fntViewInfo(idcategoria)
{
    
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = 'Categorias/getCategoria/'+idcategoria;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                let estado = objData.data.status == 1 ?
                '<span class="badge badge-success">Activo</span>' :
                '<span class="badge badge-danger">Inactivo</span>';

                document.querySelector("#celId").innerHTML = objData.data.idtipoartesania;
                document.querySelector("#celNombre").innerHTML = objData.data.nombre;
                document.querySelector("#celDescripcion").innerHTML = objData.data.descripcion;
                document.querySelector("#celEstado").innerHTML = estado;
                document.querySelector("#imgCategoria").innerHTML = '<img src='+objData.data.url_portada+'></img>';
                            
                $('#modalViewCategoria').modal('show');
            }else{
                swal("Error", objData.msg, "error");
            }
        }
    }
}

//Funcion para poder actualizar los registros de categorias
function fntEditInfo(element, idcategoria){

    rowTable = element.parentNode.parentNode.parentNode;
    //console.log(rowTable);
    
    document.querySelector('#titleModal').innerHTML = "Actualizar Categoria";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = 'Categorias/getCategoria/'+idcategoria;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){ 
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#idCategoria").value = objData.data.idtipoartesania;
                document.querySelector("#txtNombre").value = objData.data.nombre;
                document.querySelector("#txtDescripcion").value = objData.data.descripcion;
                document.querySelector("#foto_actual").value = objData.data.portada;
                document.querySelector("#foto_remove").value= 0;

                if(objData.data.status == 1)
                {
                    document.querySelector("#listStatus").value = 1;
                }else
                {
                    document.querySelector("#listStatus").value = 2;
                }
                $('#listStatus').selectpicker('render');

                if(document.querySelector('#img'))
                {
                    document.querySelector('#img').src = objData.data.url_portada;
                }else
                {
                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src="+objData.data.url_portada+"></img>";
                }

                if(objData.data.portada == 'portada_artesania.png')
                {
                    document.querySelector('.delPhoto').classList.add("notBlock");
                }else
                {
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                }
               
                $('#modalFormCategorias').modal('show');
               
            }else{
                swal("Error", objData.msg, "error");
            }
        }
    }
}

//Funcion para eliminar el registro de una categoria
function fntDelInfo(idcategoria)
{
            swal({
                title: "Eliminar Categoria",
                text: "¿Realmente quiere eliminar esta categoria?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, Eliminar",
                cancelButtonText: "No, Cancelar",
                closeOnConfirm: false,
                closeOnCancel: true
            }, function(isConfirm){

                if(isConfirm)
                {
                    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() :  new  ActiveXObject('Microsoft.XMLHTTP');
                    let ajaxUrl = 'Categorias/delCategoria/';
                    let strData = "idCategoria="+idcategoria;
                    request.open("POST",ajaxUrl,true);
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    request.send(strData);
                    request.onreadystatechange = function(){
                        if(request.readyState == 4 && request.status == 200){
                            let objData = JSON.parse(request.responseText);   
                            if(objData.status)
                            {
                                swal("Eliminar!", objData.msg, "success");
                                tableCategorias.api().ajax.reload();
                            }else
                            {
                                swal("¡Atencion!", objData , "error");
                            }
                        }
                    }
                }

            });
            
/*     });
   });
*/
}


function removePhoto(){
    document.querySelector('#foto').value ="";
    document.querySelector('.delPhoto').classList.add("notBlock");
    if(document.querySelector('#img'))
    {
        document.querySelector('#img').remove();
    }
    
}


function openModal(){
    
    rowTable = "";
    document.querySelector('#idCategoria').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva Categoria";
    document.querySelector('#formCategoria').reset();
    $('#modalFormCategorias').modal('show');
    removePhoto();
}