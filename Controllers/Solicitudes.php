<?php
   /* require_once("Models/TSolicitud.php");
    require_once("Models/LoginModel.php");*/
    class Solicitudes extends Controllers{
        //use TSolicitud;
        public function __construct()
        {
            sessionStart();
            parent::__construct();
            //session_start();
            session_regenerate_id(true);
            if(empty($_SESSION['login']))
            {
                header('Location: login');
            }
            
            getPermisos(6);
            
        }

        public function Solicitudes()
        {
            if(empty($_SESSION['permisosMod']['r'])){
                header("Location: dashboard");
            }
    


            $data['page_tag'] = "Solicitudes de ingreso";
            $data['page_name'] = "Artesanos Puebla";
            $data['page_title'] = "Ver solicitudes <small>registradas</small>";
            $data['page_functions_js'] = "functions_solicitudes.js";
            $this->views->getView($this,"solicitudes",$data);
        }

        public function setSolicitud(){
            if($_POST){
                //dep($_POST);
                //die();
                //echo $_POST['txtNombreSolicitante'];
                if(empty($_POST['txtNombreSolicitante']) || empty($_POST['txtEmailSolicitante']) || empty($_POST['listMunicipioid']) || empty($_POST['listStatus']) )
                {
                    $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
                }else{


                    
                    $idUsuario = intval($_POST['idSolicitud']);

                    $strNombredelSolicitante = ucwords(strClean($_POST['txtNombreSolicitante']));
                    $strEmaildelSolicitante = strtolower(strClean($_POST['txtEmailSolicitante']));
                    $intMunicipiodelSolicitante = intval(strClean($_POST['listMunicipioid']));
                    $intStatusSolicitante = intval(strClean($_POST['listStatus']));

                    $intTipoId = 2;
                    
                    $option = 1;
                    if($idUsuario == 0)
                    {
                        
                    $request_user = $this->model->insertarSolicitud($strNombredelSolicitante,
                                                                    $strEmaildelSolicitante,
                                                                    $intMunicipiodelSolicitante,
                                                                    $intTipoId,
                                                                    $intStatusSolicitante);

                    }else{
                    $option = 2;
                    
                    $request_user = $this->model->updateSolicitud($idUsuario,
                                                                  $strNombredelSolicitante,
                                                                  $strEmaildelSolicitante,
                                                                  $intMunicipiodelSolicitante,
                                                                  $intTipoId,
                                                                  $intStatusSolicitante);

                    }

                   


                    
                    if($request_user > 0)
                    {
                        if($option == 1)
                        {
                            $arrResponse = array('status' => true, 'msg' => 'Solicitud guardada correctamente.');

                        }else{
                            $arrResponse = array('status' => true, 'msg' => 'Solicitud Actualizada correctamente.');
                        }
                       
                    }else if($request_user == 'exist'){
                        $arrResponse = array('status' => false, 'msg' => '¡Atencion este email ya existe, ingrese otro.');
                    }else{
                        $arrResponse = array("status" => false, "msg" => 'No fue posible almacenar los datos.');
                    }

                }

                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
                
            }
            die();
            
        }

        public function getSolicitudes()
        {
            $arrData = $this->model->selectSolicitudes();
            //dep($arrData);
           //die();
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
                        $btnView = '<button class="btn btn-info btn-sm btnViewSolicitud" onClick="fntViewSolicitud('.$arrData[$i]['idpersona'].')" title="Ver Solicitud"> <i class="far fa-eye"></i> </button>';
                    }

                    if($_SESSION['permisosMod']['u']){
                        $btnEdit = '<button class="btn btn-success btn-sm btnEditSolicitud" onClick="fntEditSolicitud('.$arrData[$i]['idpersona'].')" title="Editar Solicitud"> <i class="fas fa-pencil-alt"></i> </button>';
                    }

                    if($_SESSION['permisosMod']['d']){
                        $btnDelete = '<button class="btn btn-danger btn-sm btnDelSolicitud" onClick="fntDelSolicitud('.$arrData[$i]['idpersona'].')" title="Eliminar Solicitud"> <i class="far fa-trash-alt"></i> </button>';
                    }

                    $arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';

                }
                echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
                die();

        }

        public function getSolicitud(int $idpersona){
            $idusuario = intval($idpersona);
            if($idusuario > 0)
            {
                $arrData = $this->model->selectSolicitud($idusuario);
                if(empty($arrData))
                {
                    $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                }else{
                    $arrResponse = array('status' => true, 'data' => $arrData);
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }


        public function delSolicitud()
        {
            if($_POST){
                $intIdpersona = intval($_POST['idUsuario']);
                $requestDelete = $this->model->deleteUsuario($intIdpersona);
                if($requestDelete)
                {
                    $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la Solicitud');

                }else{
                    $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la Solicitud');
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }


    }

?>