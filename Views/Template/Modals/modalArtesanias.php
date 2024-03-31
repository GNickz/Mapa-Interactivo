
<!-- Modal -->
<div class="modal fade" id="modalFormArtesanias" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nueva Artesania</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <form id="formArtesanias" name="formArtesanias" class="form-horizontal">
              
              <input type="hidden" id="idArtesania" name="idArtesania" value="">
              <input type="hidden" id="userData" name="userData" value="<? echo $intartesano;?>">
              
              
              <!--<input type="hidden" id="foto_actual" name="foto_actual" value="">
              <input type="hidden" id="foto_remove" name="foto_remove" value="0">-->

                <p class="text-primary">Los campos con <span class="required">*</span> son obligatorios.</p>

                <div class="row">

                    <div class="col-md-8">
                        
                        <div class="form-group">
                        <label class="control-label">Nombre Artesania <span class="required">*</span></label>
                        <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre de la artesania" required="">
                        </div>
                        
                        <div class="form-group">
                            <label for="txtDescripcion">Descripción Artesania<span class="required">*</span></label>
                            <textarea class="form-control valid validText" name="txtDescripcion" id="txtDescripcion" cols="30" rows="10" placeholder="Breve descripcion"  maxlength="500" required=""></textarea>
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Código ¡Introdusca 5 numeros aleatorios!<span class="required">*</span></label>
                            <input class="form-control" id="txtCodigo" name="txtCodigo" type="text" placeholder="Código de barra" required="">
                            <br>
                            <div id="divBarCode" class="notblock textCenter">
                                <div id="printCode">
                                    <svg id="barcode"></svg> 
                                </div>
                                <button class="btn btn-success btn-sm" type="button" onClick="fntPrintBarcode('#printCode')"><i class="fas fa-print"></i> Imprimir</button>
                            </div>
                        </div>



                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="listCategoria">Categoría <span class="required">*</span></label>
                                <select class="form-control" data-live-search="true" name="listCategoria" id="listCategoria" required="" ></select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleSelect1">Estado <span class="required"></span> </label>
                                <select class="form-control selectpicker" id="listStatus" name="listStatus">
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                                </select>
                            </div>  
                        </div>
                        
                        <br></br>
                        <br></br>
                        <br></br>
                        <br></br>
                        <br></br>
                        <br>
                     

                        <div class="row">
                            <div class="form-group col-md-6">
                                <button id="btnActionForm" class="btn btn-primary btn-lg btn-block" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> <span id="btnText">Guardar</span> </button>
                            </div>

                            <div class="form-group col-md-6">
                                <button class="btn btn-danger btn-lg btn-block" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                            </div>
                        </div>

                       

                    </div>

                    </div>

                    <div class="advertencia-artesanias"> 
                        <p class="a-a-p1">¡Atención!</p>
                        <p class="a-a-p2">No cierre esta ventana emergente hasta haber ingresado sus imágenes.</p>
                        <p class="a-a-p2">Una vez haya completado todos los campos de la parte superior presione el botón "Guardar".</p>
                        <p class="a-a-p2">Al presionar el botón “Guardar” podrá ingresar sus imágenes en la parte inferior de esta ventana emergente una vez agregadas presione el botón “Cerrar” para concluir con el registro de la artesanía.</p>
                    </div>
                    
                   
                </div>

                    <div class="tile-footer">
                        <div class="form-group col-md-12">
                            <div id="containerGallery">
                                <span>Agregar Imagenes de (440 x 545)</span>
                                <button class="btnAddImage btn btn-info btn-sm" type="button">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <hr>
                            <div id="containerImages">
                            
                                <!--<div id="div24">
                                    <div class="prevImage">
                                        <img src="Assets/images/uploads/portada_artesania.png" >
                                    </div>
                                    <input type="file" name="foto" id="img1" class="inputUploadfile">
                                    <label for="img1" class="btnUploadfile"><i class="fas fa-upload"></i></label>
                                    <button class="btnDeleteImage" type="button" onclick="fntDelItem('div24')"><i class="fas fa-trash-alt"></i></button>
                                </div>

                                <div id="div24">
                                    <div class="prevImage">
                                        <img class="loading" src="Assets/images/loading.svg" >
                                    </div>
                                    <input type="file" name="foto" id="img1" class="inputUploadfile">
                                    <label for="img1" class="btnUploadfile"><i class="fas fa-upload"></i></label>
                                    <button class="btnDeleteImage" type="button" onclick="fntDelItem('div24')"><i class="fas fa-trash-alt"></i></button>
                                </div>-->


                            </div>

                        </div>
                    
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalViewArtesania" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos de la artesania</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>Codigo:</td>
                        <td id="celCodigo"></td>
                    </tr>

                    <tr>
                        <td>Nombre:</td>
                        <td id="celNombre"></td>
                    </tr>

                    <tr>
                        <td>Descripcion:</td>
                        <td id="celDescripcion"></td>
                    </tr>

                    <tr>
                        <td>Tipo de artesania:</td>
                        <td id="celCategoria"></td>
                    </tr>

                    <tr>
                        <td>Status:</td>
                        <td id="celStatus"></td>
                    </tr>

                    <tr>
                        <td>Fotos:</td>
                        <td id="celFotos"></td>
                    </tr>


                  
                   
                    

                </tbody>
            </table>  
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
</div>