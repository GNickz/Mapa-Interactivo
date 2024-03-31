<?php

    class Usuarios extends Controllers{
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
            
            getPermisos(3);
        }

        
        public function Usuarios()
        {

            if(empty($_SESSION['permisosMod']['r'])){
                header("Location: dashboard");
            }


            $data['page_tag'] = "Usuarios";
            $data['page_title'] = "ADMINISTRAR <small>Usuarios</small>";
            $data['page_name'] = "usuarios";
            $data['page_functions_js'] = "functions_usuarios.js";
            $this->views->getView($this,"usuarios",$data);
        }

        public function setUsuario()
        {
            //dep($_POST);
            //dep($_FILES);
            //exit();
            {
                if(empty($_POST['txtUsuario']) || empty($_POST['txtNombre']) || empty($_POST['txtEmail']) || empty($_POST['txtTelefono']) || empty($_POST['txtFacebook'])
                || empty($_POST['txtDomicilio']) || empty($_POST['listMunicipioid']) || empty($_POST['listRolid']) || empty($_POST['listStatus']))
                {
                    $arrResponse = array ("status" => false, "msg" => 'Datos incorrectos.');
                }else{
                    
                    $idUsuario = intval($_POST['idUsuario']);
                    
                    $strUsuario = strClean($_POST['txtUsuario']);
                    $strNombre = ucwords(strClean($_POST['txtNombre']));
                    $strEmail = strtolower(strClean($_POST['txtEmail']));

                    $intTelefono = intval(strClean($_POST['txtTelefono']));
                    $strFacebook = strClean($_POST['txtFacebook']);
                    $strTwitter = strClean($_POST['txtTwitter']);
                    $strInstagram = strClean($_POST['txtInstagram']);
                    $strSitioWeb = strClean($_POST['txtSitioWeb']);
                    $strDomicilio = strClean($_POST['txtDomicilio']);
                    $strEmpresa = strClean($_POST['txtEmpresa']);
                    $intMunicipio = intval(strClean($_POST['listMunicipioid']));

                    $intTipoId = intval(strClean($_POST['listRolid']));
                    $intStatus = intval(strClean($_POST['listStatus']));

                    $request_user = "";

               
                    

                    if($idUsuario == 0)
                    {
                        $option = 1;
                        $strPassword = empty($_POST['txtPassword']) ? hash("SHA256",passGenerator()) : hash("SHA256",$_POST['txtPassword']);
                        
                        if($_SESSION['permisosMod']['w']){
    
                            $request_user = $this->model->insertUsuario($strUsuario,
                                                                    $strNombre,
                                                                    $strEmail,
                                                                    $strPassword,
                                                                    $intTelefono,
                                                                    $strFacebook,
                                                                    $strTwitter,
                                                                    $strInstagram,
                                                                    $strSitioWeb,
                                                                    $strDomicilio,
                                                                    $strEmpresa,
                                                                    $intMunicipio,
                                                                    $intTipoId,
                                                                    $intStatus );
                         }
                    }else
                    {
                        $option = 2;
                        $strPassword = empty($_POST['txtPassword']) ? "" : hash("SHA256",$_POST['txtPassword']);

                        if($_SESSION['permisosMod']['u']){
                            $request_user = $this->model->updateUsuario($idUsuario,
                                                                    $strUsuario,
                                                                    $strNombre,
                                                                    $strEmail,
                                                                    $strPassword,
                                                                    $intTelefono,
                                                                    $strFacebook,
                                                                    $strTwitter,
                                                                    $strInstagram,
                                                                    $strSitioWeb,
                                                                    $strDomicilio,
                                                                    $strEmpresa,
                                                                    $intMunicipio,
                                                                    $intTipoId,
                                                                    $intStatus );
                        }
                    }

                    if($request_user > 0)
                    {
                        if($option == 1)
                        {
                            $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                        }else
                        {
                            $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
                        }
                       
                    }else if($request_user == 'exist')
                    {
                        $arrResponse = array('status' => false, 'msg' => '¡Atencion! el email o el usuario ya existe, ingrese otro.');
                    }else
                    {
                        $arrResponse = array("status" => false, 'msg' => 'No es posible almacenar los datos.');
                    }
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        public function getUsuarios()
        {
            if($_SESSION['permisosMod']['r']){
            $arrData = $this->model->selectUsuarios();
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

                        $btnView = '<button class="btn btn-warning btn-sm btnViewUsuario" onClick="fntViewUsuario('.$arrData[$i]['idpersona'].')" title="Ver usuario"> <i class="far fa-eye"></i> </button>';

                    }

                    if($_SESSION['permisosMod']['u']){

                        if(($_SESSION['idUser'] == 1 and $_SESSION['userData']['idrol'] == 1) ||
                        ($_SESSION['userData']['idrol'] == 1 and $arrData[$i]['idrol'] != 1) ){
                            
                            $btnEdit = '<button class="btn btn-info btn-sm btnEditUsuario" onClick="fntEditUsuario(this,'.$arrData[$i]['idpersona'].')" title="Editar usuario"> <i class="fas fa-pencil-alt"></i> </button>';

                        }else{

                            $btnEdit = '<button class="btn btn-info btn-sm" title="Editar usuario" disabled ><i class="fas fa-pencil-alt"></i> </button>';

                        }
                    }

                    if($_SESSION['permisosMod']['d']){

                        if(($_SESSION['idUser'] == 1 and $_SESSION['userData']['idrol'] == 1) ||
                        ($_SESSION['userData']['idrol'] == 1 and $arrData[$i]['idrol'] != 1) and
                        ($_SESSION['userData']['idpersona'] != $arrData[$i]['idpersona']))
                        {

                            $btnDelete = '<button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelUsuario('.$arrData[$i]['idpersona'].')" title="Eliminar usuario"> <i class="far fa-trash-alt"></i> </button>';

                        }else{

                            $btnDelete = '<button class="btn btn-danger btn-sm btnDelUsuario" title="Eliminar usuario" disabled> <i class="far fa-trash-alt"></i> </button>';

                        }

                    }

                    $arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
                }
                echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
            }
            die();
        }


        public function getUsuario($idpersona)
        {
            if($_SESSION['permisosMod']['r']){
                $idusuario = intval($idpersona);
                if($idusuario > 0)
                {
                    $arrData = $this->model->selectUsuario($idusuario);
                    if(empty($arrData))
                    {
                        $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                    }else
                    {
                        $arrResponse = array('status' => true, 'data' => $arrData);
                    }
                    echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);   
                }
            }
            die();

        }

        //Creacion del metodo btnDelUsuario delUsuario solicitado en function_usuarios.js en #305
        public function delUsuario()
        {
            if($_POST){

                if($_SESSION['permisosMod']['d']){

                    $intIdpersona = intval($_POST['idUsuario']);
                    $requestDelete = $this->model->deleteUsuario($intIdpersona);
                    if($requestDelete)
                    {
                        $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el ususario con exito.');
                    }else
                    {
                        $arrResponse = array('status' => false, 'msg' => '¡Ups! Ha ocurrido un error al intentar elminiar este usuario.');
                    }
                    echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
                }
            }
            die();
        }


        //Creacion del metodo para ver la vista perfil de usuarios
        public function perfil()
        {
            $data['page_tag'] = "Perfil";
            $data['page_title'] = "Perfil de usuario";
            $data['page_name'] = "perfil";
            $data['page_functions_js'] = "functions_usuarios.js";
            $this->views->getView($this,"perfil",$data);

        }


        //Creacion del metodo putPerfil solicitado por functions_usuario.js #143
        public function putPerfil(){
            if($_POST)
            {
                if(empty($_POST['txtUsuario']) || empty($_POST['txtNombre']) || empty($_POST['txtTelefono']) || empty($_POST['txtFacebook'])
                || empty($_POST['txtDomicilio']) || empty($_POST['listMunicipioid']) )
                    {
                       
                        $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');

                    }else
                    {
                        $idUsuario = $_SESSION['idUser'];
                        $strUsuario = strClean($_POST['txtUsuario']);
                        $strNombre = strClean($_POST['txtNombre']);
                        $intTelefono = intval(strClean($_POST['txtTelefono']));
                        $strFacebook = strClean($_POST['txtFacebook']);
                        $strTwitter = strClean($_POST['txtTwitter']);
                        $strInstagram = strClean($_POST['txtInstagram']);
                        $strSitioWeb = strClean($_POST['txtSitioWeb']);
                        $strDomicilio = strClean($_POST['txtDomicilio']);
                        $strEmpresa = strClean($_POST['txtEmpresa']);
                        $intMunicipio = intval(strClean($_POST['listMunicipioid']));
                        $strPassword = "";
                        /*dep($_POST);
                        die();*/

                        if(!empty($_POST['txtPassword']))
                        {
                            $strPassword = hash("SHA256",$_POST['txtPassword']);
                        }

                        $request_user = $this->model->updatePerfil($idUsuario,
                                                                  $strUsuario,
                                                                  $strNombre,
                                                                  $intTelefono,
                                                                  $strFacebook,
                                                                  $strTwitter,
                                                                  $strInstagram,
                                                                  $strSitioWeb,
                                                                  $strDomicilio,
                                                                  $strEmpresa,
                                                                  $intMunicipio,
                                                                  $strPassword);
                        
                        if($request_user)
                        {
                            sessionUser($_SESSION['idUser']);
                            $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados de manera correcta.');
                        }else{
                            $arrResponse = array("status" => false, "msg" => "No fue posible almacenar los datos.");
                        }
                    }
                    echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }
    }
?>