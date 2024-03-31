<?php

class Categorias extends Controllers{
    public function __construct()
    {
        sessionStart();
        parent::__construct();
        session_regenerate_id(true);
        
        
        if(empty($_SESSION['login']))
        {
            header('Location: login');
        }
        
        getPermisos(4);
    }

    
    public function Categorias()
    {

        if(empty($_SESSION['permisosMod']['r'])){
            header("Location: dashboard");
        }


        $data['page_tag'] = "Categorias";
        $data['page_title'] = "ADMINISTRAR <small>Tipos de artesanias</small>";
        $data['page_name'] = "categorias";
        $data['page_functions_js'] = "functions_categorias.js";
        $this->views->getView($this,"categorias",$data);
    }

    //Creacion del metodo setCategoria solicitado en functions_categorias.js #63
    public function setCategoria()
    {
        /*dep($_POST);
        dep($_FILES);
        exit();*/

        if($_POST)
        {
            if(empty($_POST['txtNombre']) || empty($_POST['txtDescripcion']) || empty($_POST['listStatus']))
                {
                    $arrResponse = array("status" => false, "msg" => 'Datos incorrectos');
                }else
                {
                    $intIdcategoria = intval($_POST['idCategoria']);
                    $strCategoria = strClean($_POST['txtNombre']);
                    $strDescripcion = strClean($_POST['txtDescripcion']);
                    $intStatus = intval($_POST['listStatus']);

                    $ruta = strtolower(clear_cadena($strCategoria));
                    $ruta = str_replace(" ","-",$ruta);

                    $foto          = $_FILES['foto'];
                    $nombre_foto   = $foto['name'];
                    $type          = $foto['type'];
                    $url_temp      = $foto['tmp_name'];
                    $imgPortada  = 'portada_artesania.png';
                    $request_categoria = "";

                    if($nombre_foto != '')
                    {
                        $imgPortada = 'img_'.md5(date('d-m-Y H:m:s')).'.jpg';
                    }

                    if($intIdcategoria == 0)
                    {
                        //Crear
                        if($_SESSION['permisosMod']['w'])
                        {
                            $request_categoria = $this->model->insertCategoria($strCategoria, $strDescripcion, $imgPortada, $ruta, $intStatus);
                            $option = 1;
                        }
                    }else
                    {
                        //Actualizar
                        if($_SESSION['permisosMod']['u'])
                        {
                            if($nombre_foto == '')
                            {
                                if($_POST['foto_actual'] != 'portada_artesania.png' && $_POST['foto_remove'] == 0 )
                                {
                                    $imgPortada = $_POST['foto_actual'];
                                }
                            }
                            $request_categoria = $this->model->updateCategoria($intIdcategoria, $strCategoria, $strDescripcion, $imgPortada, $ruta, $intStatus);
                            $option = 2;
                        }
                    }

                    if($request_categoria > 0)
                    {
                        if($option == 1)
                        {
                            $arrResponse = array('status' => true, 'msg' => 'Datos Guardados correctamente.');
                            if($nombre_foto != ''){ uploadImage($foto,$imgPortada);}
                        }else
                        {
                            $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
                            if($nombre_foto != ''){ uploadImage($foto,$imgPortada);}

                            if(($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'portada_artesania.png')
                            || ($nombre_foto != '' && $_POST['foto_actual'] != 'portada_artesania.png')){
                                deleteFile($_POST['foto_actual']);
                            }
                        }
        
        
                    }else if($request_categoria == 'exist')
                    {
                        $arrResponse = array('status' => false, 'msg' => '¡Atención! la Categoria ya existe.');
                    }else
                    {
                        $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
                    }


                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);

        }
        //if($_SESSION['permisosMod']['w']){}
        die();
    }

     //Creacion del metodo para la extraccion de las caategorias de la base de datos
     public function getCategorias()
     {
        if($_SESSION['permisosMod']['r'])
        {
            $arrData = $this->model->selectCategorias();
             /*dep($arrData);
             exit();*/

             for ($i=0; $i < count($arrData); $i++)
             {
                 $btnView = '';
                 $btnEdit = '';
                 $btnDelete = '';

                 if($arrData[$i]['status'] == 1)
                 {
                     $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
                 }else
                 {
                     $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
                 }


                 if($_SESSION['permisosMod']['r']){

                    $btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['idtipoartesania'].')" title="Ver categoría"><i class="far fa-eye"></i></button>';

                 }

                 if($_SESSION['permisosMod']['u']){

                    $btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['idtipoartesania'].')" title="Editar categoría"><i class="fas fa-pencil-alt"></i></button>';

                 }

                 if($_SESSION['permisosMod']['d']){

                    $btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idtipoartesania'].')" title="Eliminar categoría"><i class="far fa-trash-alt"></i></button>';

                 }

                 $arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
             }
             echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        }
        die();
     }


      //Metodo para extraer un rol y poder ver su informacion contenida
      public function getCategoria($idcategoria)
      {
        if($_SESSION['permisosMod']['r'])
        {
            $intIdcategoria = intval($idcategoria);
            if($intIdcategoria > 0)
            {
                $arrData = $this->model->selectCategoria($intIdcategoria);
                //dep($arrData);exit();
                if(empty($arrData))
                {
                    $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                }else
                {
                    $arrData ['url_portada'] = 'http://localhost/Proyecto-Residencia-Profesional-2/Assets/images/uploads/'.$arrData['portada'];
                    $arrResponse = array('status' => true, 'data' => $arrData);
                }
                //dep($arrData);exit;
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
        }
        die();
      }

      //Metodo delCategorias que eliminar las categorias solicitado en functions_categorias.js #234
      public function delCategoria()
        {
            if($_POST){
                if($_SESSION['permisosMod']['d'])
                {
                    $intIdcategoria = intval($_POST['idCategoria']);
                    $requestDelete = $this->model->deleteCategoria($intIdcategoria);
                    if($requestDelete == 'ok')
                    {
                        $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la Categoria.');
                    }else if($requestDelete == "exist"){
                        $arrResponse = array('status' => false, 'msg' => 'No es posible elminar una Categoria con artesanias asociadas');
                    }else
                    {
                        $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la Categoria.');
                    }
                    echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
                }
            }
            die();
        }


        //Metodo getSelectCategorias solicitado por functions_artesanias.js # 11
        public function getSelectCategorias()
        {
            $htmlOptions = "";
            $arrData = $this->model->selectCategorias();
            if(count($arrData) > 0 )
            {
                for ($i=0; $i < count($arrData); $i++)
                {
                    if($arrData[$i]['status'] == 1)
                    {
                        $htmlOptions .= '<option value="'.$arrData[$i]['idtipoartesania'].'">'.$arrData[$i]['nombre'].'</option>';
                    }
                }

            }
            echo $htmlOptions;
            die();
        }





}

?>