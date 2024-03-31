document.write(`<script src="${base_url}/Assets/js/plugins/JsBarcode.all.min.js"></script>`);
let tableArtesanias;
let rowTable = "";

tableArtesanias = $('#tableArtesanias').dataTable(
    {
        "aProcessing": true,
        "aServerSide": true,
        "language":
        {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },

        "ajax":
        {
            "url":"/Proyecto-Residencia-Profesional-2/Artesanias/getArtesanias",
            //"url": " "+base_url+"/Artesanias/getArtesanias",
            "dataSrc":""
        },

        "columns":
        [
            {"data":"idartesania"},
            {"data":"codigo"},
            {"data":"nombre_artesania"},
            {"data":"descripcion"},
            {"data":"status"},
            {"data":"options"}
        ],

        "columnDefs": 
        [
            { 'className': "textCenter", "targets": [1]},
            { 'className': "textCenter", "targets": [2]},
            { 'className': "textCenter", "targets": [4]}
        ],

        "responsive":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"asesc"]]

    });

window.addEventListener('load', function()
{
   

    if(document.querySelector('#formArtesanias'))
    {
        let formArtesanias = document.querySelector('#formArtesanias');
        formArtesanias.onsubmit = function(e)
        {
            e.preventDefault();
            
            let strNombre = document.querySelector('#txtNombre').value;
            let intCodigo = document.querySelector('#txtCodigo').value;
            let strDescripcion = document.querySelector('#txtDescripcion').value;
            let intCategoria = document.querySelector('#listCategoria').value;

            let intStatus = document.querySelector('#listStatus').value;

            if(strNombre == '' || intCodigo == '' || strDescripcion == '' || intCategoria == '')
            {
                swal("Atención", "Revise los campos que sean obligatorios", "error");
                return false; 
            }
            if(intCodigo.length < 3){
                swal("Atención", "El código deben ser mayor a 3 dígitos aleatorios", "error");
                return false;
            }

            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = 'Artesanias/setArtesania';
            let formData = new FormData(formArtesanias);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function()
            {
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("", objData.msg, "success");
                        document.querySelector("#idArtesania").value = objData.idartesania;
                        document.querySelector("#containerGallery").classList.remove("notblock");

                        if(rowTable == ""){
                            tableArtesanias.api().ajax.reload();
                        }else{
                            htmlStatus = intStatus == 1 ?
                            '<span class="badge badge-success">Activo</span>' :
                            '<span class="badge badge-danger">Inactivo</span>';
                            
                            rowTable.cells[1].textContent = intCodigo;
                            rowTable.cells[2].textContent = strNombre;
                            rowTable.cells[3].textContent = strDescripcion;
                            rowTable.cells[4].innerHTML = htmlStatus;
                            rowTable = "";
                        }
                       

                    }else{
                        swal("error", objData.msg, "error");
                    }

                }
                return false;
            }
        }

    }


    if(document.querySelector(".btnAddImage")){
        let btnAddImage =  document.querySelector(".btnAddImage");
        btnAddImage.onclick = function(e){
         let key = Date.now();
         //alert(key);
         let newElement = document.createElement("div");
         newElement.id = "div"+key;
         newElement.innerHTML = `
            <div class="prevImage"></div>
            <input type="file" name="foto" id="img${key}" class="inputUploadfile">
            <label for="img${key}" class="btnUploadfile"><i class="fas fa-upload"></i></label>
            <button class="btnDeleteImage notblock" type="button" onclick="fntDelItem('#div${key}')"><i class="fas fa-trash-alt"></i></button>`;
        document.querySelector("#containerImages").appendChild(newElement);
        document.querySelector("#div"+key+" .btnUploadfile").click();
        fntInputFile();
        }
     }

    fntInputFile();
    fntCategorias();
}, false);


if(document.querySelector("#txtCodigo")){
    let inputCodigo = document.querySelector("#txtCodigo");
    inputCodigo.onkeyup = function() {
        if(inputCodigo.value.length >= 3){
            document.querySelector('#divBarCode').classList.remove("notblock");
            fntBarcode();
       }else{
            document.querySelector('#divBarCode').classList.add("notblock");
       }
    };
}


function fntInputFile(){
    let inputUploadfile = document.querySelectorAll(".inputUploadfile");
    inputUploadfile.forEach(function(inputUploadfile) {
        inputUploadfile.addEventListener('change', function(){
            let idArtesania = document.querySelector("#idArtesania").value;
            let parentId = this.parentNode.getAttribute("id");
            let idFile = this.getAttribute("id");            
            let uploadFoto = document.querySelector("#"+idFile).value;
            let fileimg = document.querySelector("#"+idFile).files;
            let prevImg = document.querySelector("#"+parentId+" .prevImage");
            let nav = window.URL || window.webkitURL;
            if(uploadFoto !=''){
                let type = fileimg[0].type;
                let name = fileimg[0].name;
                if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png'){
                    prevImg.innerHTML = "Archivo no válido";
                    uploadFoto.value = "";
                    return false;
                }else{
                    let objeto_url = nav.createObjectURL(this.files[0]);
                    prevImg.innerHTML = `<img class="loading" src="${base_url}/Assets/images/loading.svg" >`;

                    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    let ajaxUrl = 'Artesanias/setImage'; 
                    let formData = new FormData();
                    formData.append('idartesania',idArtesania);
                    formData.append("foto", this.files[0]);
                    request.open("POST",ajaxUrl,true);
                    request.send(formData);
                    request.onreadystatechange = function(){
                        if(request.readyState != 4) return;
                        if(request.status == 200){
                            let objData = JSON.parse(request.responseText);
                            if(objData.status){
                                prevImg.innerHTML = `<img src="${objeto_url}">`;
                                document.querySelector("#"+parentId+" .btnDeleteImage").setAttribute("imgname",objData.imgname);
                                document.querySelector("#"+parentId+" .btnUploadfile").classList.add("notblock");
                                document.querySelector("#"+parentId+" .btnDeleteImage").classList.remove("notblock");
                            }else{
                                swal("Error", objData.msg, "error");
                            }
                            
                        }
                    }

                }
            }

        });
    });
}

function fntDelItem(element){
    let nameImg = document.querySelector(element+' .btnDeleteImage').getAttribute("imgname");

    let idArtesania = document.querySelector("#idArtesania").value;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = 'Artesanias/delFile';

    let formData = new FormData();
    formData.append('idartesania',idArtesania);
    formData.append("file",nameImg);
    request.open("POST",ajaxUrl,true);
    request.send(formData);

    request.onreadystatechange = function(){
        if(request.readyState != 4) return;
        if(request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                let itemRemove = document.querySelector(element);
                itemRemove.parentNode.removeChild(itemRemove);     
            }else{
                swal("", objData.msg , "error");
            }

        }

    }

    

}


function fntViewInfo(idArtesania){

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = 'Artesanias/getArtesania/'+idArtesania;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                let htmlImage = "";
                let objArtesania = objData.data;
                var estadoArtesania = objArtesania.status == 1 ?
                '<span class="badge badge-success">Activo</span>':
                '<span class="badge badge-danger">Inactivo</span>';

                document.querySelector("#celCodigo").innerHTML = objArtesania.codigo;
                document.querySelector("#celNombre").innerHTML = objArtesania.nombre_artesania;
                document.querySelector("#celDescripcion").innerHTML = objArtesania.descripcion;
                document.querySelector("#celCategoria").innerHTML = objArtesania.categoria;
                document.querySelector("#celStatus").innerHTML = estadoArtesania;

                if(objArtesania.images.length > 0){
                    let objArtesanias = objArtesania.images;
                    for(let p = 0; p < objArtesanias.length; p++){
                        htmlImage +=`<img src="${objArtesanias[p].url_image}"></img>`;
                    }
                }
                document.querySelector("#celFotos").innerHTML = htmlImage;
                $('#modalViewArtesania').modal('show');
            }else{
                swal("Error", objData.msg, "error");

            }

        }
    }



    
}


function fntEditInfo(element, idArtesania){
    rowTable = element.parentNode.parentNode.parentNode;
   // console.log(rowTable);
    document.querySelector('#titleModal').innerHTML = "Actualizar Artesania"
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = 'Artesanias/getArtesania/'+idArtesania;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                let htmlImage = "";
                let objArtesania = objData.data;
                //console.log(objArtesania);

                document.querySelector("#idArtesania").value = objArtesania.idartesania;
                document.querySelector("#txtNombre").value = objArtesania.nombre_artesania;
                document.querySelector("#txtDescripcion").value = objArtesania.descripcion;
                document.querySelector("#txtCodigo").value = objArtesania.codigo;
                document.querySelector("#listCategoria").value = objArtesania.categoriaid;
                document.querySelector("#listStatus").value = objArtesania.status;

                $('#listCategoria').selectpicker('render');
                $('#listStatus').selectpicker('render');

                fntBarcode();

                if(objArtesania.images.length > 0){
                    let objArtesanias = objArtesania.images;
                    for(let p = 0; p < objArtesanias.length; p++){
                        let key = Date.now()+p;
                        htmlImage +=`<div id="div${key}">
                                        <div class="prevImage">
                                            <img src="${objArtesanias[p].url_image}"></img>
                                        </div>
                                        <button type="button" class="btnDeleteImage" onclick="fntDelItem('#div${key}')" imgname="${objArtesanias[p].img}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>`;
                    }
                }
                document.querySelector("#containerImages").innerHTML = htmlImage;

                document.querySelector("#divBarCode").classList.remove("notblock");

                $('#modalFormArtesanias').modal('show');
               

              
            }else{
                swal("Error", objData.msg, "error");

            }

        }
    }

   

}


function fntDelInfo(idArtesania)
{
            swal({
                title: "Eliminar Artesania",
                text: "¿Realmente quiere eliminar esta artesania?",
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
                    let ajaxUrl = 'Artesanias/delArtesania/';
                    let strData = "idArtesania="+idArtesania;
                    request.open("POST",ajaxUrl,true);
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    request.send(strData);
                    request.onreadystatechange = function(){
                        if(request.readyState == 4 && request.status == 200){
                            let objData = JSON.parse(request.responseText);   
                            if(objData.status)
                            {
                                swal("Eliminar!", objData.msg, "success");
                                tableArtesanias.api().ajax.reload();
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




function fntCategorias()
{
    if(document.querySelector('#listCategoria'))
    {
        let ajaxUrl = 'Categorias/getSelectCategorias';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET", ajaxUrl,true);
        request.send();
        request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listCategoria').innerHTML = request.responseText;
                document.querySelector('#listCategoria').value = 0;
                $('#listCategoria').selectpicker('render');
            }
        }

    }

}


function fntBarcode(){
    let codigo = document.querySelector("#txtCodigo").value;
    JsBarcode("#barcode", codigo);
}

function fntPrintBarcode(area){
    let elemntArea = document.querySelector(area);
    let vprint = window.open(' ', 'popimpr', 'height=400,width=600');
    vprint.document.write(elemntArea.innerHTML );
    vprint.document.close();
    vprint.print();
    vprint.close();
}


function openModal(){

    rowTable = "";
    document.querySelector('#idArtesania').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva Artesania";
    document.querySelector('#formArtesanias').reset();

    
    document.querySelector("#divBarCode").classList.add("notblock");
    document.querySelector("#containerGallery").classList.add("notblock");
    document.querySelector("#containerImages").innerHTML = "";
    $('#modalFormArtesanias').modal('show');
    
}