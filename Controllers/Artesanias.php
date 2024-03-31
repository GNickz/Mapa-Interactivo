<?php


class Artesanias extends Controllers{
    public function __construct()
    {
        sessionStart();
        parent::__construct();
        session_regenerate_id(true);
        
        
        if(empty($_SESSION['login']))
        {
            header('Location: login');
        }
        
        getPermisos(5);
    }

    
    public function Artesanias()
    {

        if(empty($_SESSION['permisosMod']['r'])){
            header("Location: dashboard");
        }


        $data['page_tag'] = "Artesanias";
        $data['page_title'] = "ADMINISTRAR <small>artesanias</small>";
        $data['page_name'] = "artesanias";
        $data['page_functions_js'] = "functions_artesanias.js";
       
        $this->views->getView($this,"artesanias",$data);
    }



    public function getArtesanias()
    {
       if($_SESSION['permisosMod']['r'])
       {
           $arrData = $this->model->selectArtesanias();
            /*dep($arrData);
            exit();*/

            for ($i=0; $i < count($arrData); $i++)
            {
                $btnView = '';
                $btnEdit = '';
                $btnDelete = '';

                $whereArtesano = $_SESSION['userData']['idpersona'];

                if($arrData[$i]['status'] == 1)
                {
                    $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
                }else
                {
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
                }


                if($_SESSION['permisosMod']['r']){

                   $btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['idartesania'].')" title="Ver artesania"><i class="far fa-eye"></i></button>';

                }

                if($_SESSION['permisosMod']['u']){

                   $btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['idartesania'].')" title="Editar artesania"><i class="fas fa-pencil-alt"></i></button>';

                }

                if($_SESSION['permisosMod']['d']){

                   $btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idartesania'].')" title="Eliminar artesania"><i class="far fa-trash-alt"></i></button>';

                }

                $arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
            }
            echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        }
       die();
    }


    //Creacion del metodo setCategoria solicitado en functions_artesanias.js #62
    public function setArtesania()
    {
      /*dep($_POST);
        dep($_FILES);
        exit();*/

        if($_POST)
        {
            if(empty($_POST['txtNombre']) || empty($_POST['txtCodigo']) || empty($_POST['txtDescripcion']) || empty($_POST['listCategoria'])  || empty($_POST['listStatus']))
                {
                    $arrResponse = array("status" => false, "msg" => 'Datos incorrectos');
                   
                }else
                {
                    $intartesano = $_SESSION['userData']['idpersona'];


                    $idArtesania = intval($_POST['idArtesania']);
                    $strNombre = strClean($_POST['txtNombre']);
                    $strDescripcion = strClean($_POST['txtDescripcion']);
                    $strCodigo = strClean($_POST['txtCodigo']);
                    $intCategoriaId = intval($_POST['listCategoria']);
                    $intStatus = intval($_POST['listStatus']);
                    $request_artesania = "";
                    $request_nomartesania = "";

                    

                    $ruta = strtolower(clear_cadena($strNombre));
                    $ruta = str_replace(" ","-",$ruta);

                    

                    if($idArtesania == 0)
                    {
                        $option = 1;
                        if($_SESSION['permisosMod']['w']){    
                            $request_artesania = $this->model->insertArtesania($intartesano,$strNombre,
                                                                            $strDescripcion,
                                                                            $strCodigo,
                                                                            $intCategoriaId,
                                                                            $ruta,
                                                                            $intStatus);
                        }
                    }else
                    {
                        $option = 2;
                        if($_SESSION['permisosMod']['u']){    
                            $request_artesania = $this->model->updateArtesania($intartesano,$idArtesania,
                                                                            $strNombre,
                                                                            $strDescripcion,
                                                                            $strCodigo,
                                                                            $intCategoriaId,
                                                                            $ruta,
                                                                            $intStatus);
                        }
                    }

                    if($request_artesania > 0){
                        if($option == 1)
                        {
                            $arrResponse = array('status' => true, 'idartesania' => $request_artesania, 'msg' => 'Datos guardados correctamente.');

                        }else
                        {
                            $arrResponse = array('status' => true, 'idartesania' => $idArtesania, 'msg' => 'Datos actulizados correctamente.');

                        }

                    }else if($request_artesania == 'exist')
                    {
                        $arrResponse = array('status' => false, 'msg' => '¡Atención! el Codigo insertado ya existen. Por favor ingrese 3 numero de forma aleatoria.');

                    }else
                    {
                        $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
                    }

                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);

        }
        //if($_SESSION['permisosMod']['w']){}
        die();
    }

    public function getArtesania($idartesania)
    {
        if($_SESSION['permisosMod']['r'])
        {
            $idartesania = intval($idartesania);
            if($idartesania > 0){
                $arrData = $this->model->selectArtesania($idartesania);
                if(empty($arrData)){
                    $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                }else{
                    $arrImg = $this->model->selectImages($idartesania);
                    //dep($arrImg);
                    if(count($arrImg)> 0){
                        for ($i=0; $i < count($arrImg); $i++){
                            $arrImg[$i]['url_image'] = media().'/images/uploads/'.$arrImg[$i]['img'];
                        }
                    }
                    $arrData['images'] = $arrImg;
                    $arrResponse = array('status' => true, 'data' => $arrData);
                }
                //dep($arrResponse);
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            
            }
        }
        die();

    }


    public function setImage(){
        /*dep($_POST);
        dep($_FILES);
        die();*/

        if($_POST){
            if(empty($_POST['idartesania'])){
                $arrResponse = array('status' => false, 'msg' => 'Error de carga.');
            }else{
                $idArtesania = intval($_POST['idartesania']);
                $foto = $_FILES['foto'];
                $imgNombre = 'pro_'.md5(date('d-m-Y H:m:s')).'.jpg';
                $request_image = $this->model->insertImage($idArtesania,$imgNombre);

                if($request_image){
                    $uploadImage = uploadImage($foto,$imgNombre);
                    $arrResponse = array('status' => true, 'imgname' => $imgNombre, 'msg' => 'Archivo cargado exitosamente.');
                }else{
                    $arrResponse = array('status' => false, 'msg' => 'Error de carga.');
                }
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();

    }

    public function delFile(){
        if($_POST){
            if(empty($_POST['idartesania']) || empty($_POST['file'])){
                $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
            }else{
                $idArtesania = intval($_POST['idartesania']);
                $imgNombre = strClean($_POST['file']);
                $request_image = $this->model->deleteImage($idArtesania,$imgNombre);

                if($request_image){
                    $deleteFile = deleteFile($imgNombre);
                    $arrResponse = array('status' => true, 'msg' => 'Archivo eliminado.');
                }else{
                    $arrResponse = array('status' => false, 'msg' => 'Error al intentar eliminar el archivo.');
                }
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();

    }

    public function delArtesania(){

        if($_POST){
            if($_SESSION['permisosMod']['d']){    
            
                    $intIdartesania = intval($_POST['idArtesania']);
                    $requestDelete = $this->model->deleteArtesania($intIdartesania);

                    if($requestDelete)
                    {
                        $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la artesania.');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'Error al intentar eliminar esta artesania.');
                    }
                    echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
        }
        die();
    }





   




}


?>