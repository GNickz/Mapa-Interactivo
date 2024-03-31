<?php

    class Roles extends Controllers{
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
            
            getPermisos(2);
        }

        
        public function Roles()
        {
            if(empty($_SESSION['permisosMod']['r'])){
                header("Location: dashboard");
            }

            $data['page_tag'] = "Roles Usuario";
            $data['page_name'] = "rol_usuario";
            $data['page_title'] = "Roles Usuario <small>Administrar roles</small>";
            $data['page_functions_js'] = "functions_roles.js";
            $this->views->getView($this,"roles",$data);
        }


        //Creacion del metodo para la extraccion de los roles de la base de datos
        public function getRoles()
        {
            if($_SESSION['permisosMod']['r']){
                $arrData = $this->model->selectRoles();
                $btnView = '';
                $btnEdit = '';
                $btnDelete = '';

                for ($i=0; $i < count($arrData); $i++)
                {

                    if($arrData[$i]['status'] == 1)
                    {
                        $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
                    }else
                    {
                        $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
                    }


                    if($_SESSION['permisosMod']['u']){

                        $btnView = '<button class="btn btn-warning btn-sm btnPermisosRol" onClick="fntPermisos('.$arrData[$i]['idrol'].')" title="Permisos"> <i class="fas fa-key"></i> </button>';

                        $btnEdit = '<button class="btn btn-info btn-sm btnEditRol" onClick="fntEditRol('.$arrData[$i]['idrol'].')" title="Editar"> <i class="fas fa-pencil-alt"></i> </button>';

                    }

                    if($_SESSION['permisosMod']['d']){

                        $btnDelete = '<button class="btn btn-danger btn-sm btnDelRol" onClick="fntDelRol('.$arrData[$i]['idrol'].')" title="Eliminar"> <i class="far fa-trash-alt"></i> </button>';

                    }

                    $arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
                }
                echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        public function getSelectRoles()
        {
            $htmlOptions = "";
            $arrData = $this->model->selectRoles();
            if(count($arrData) > 0)
            {
                for($i=0; $i < count($arrData); $i++)
                {
                    if($arrData[$i]['status'] == 1 )
                    {
                    $htmlOptions .= '<option value="'.$arrData[$i]['idrol'].'">'.$arrData[$i]['nombrerol'].'</option>';
                    }
                }
            }
            echo $htmlOptions;
            die();
        }

        //Metodo para extraer un rol y poder actualizarlo
        public function getRol(int $idrol)
        {
            if($_SESSION['permisosMod']['r']){
                $intIdrol = intval(strClean($idrol));
                if($intIdrol > 0)
                {
                    $arrData = $this->model->selectRol($intIdrol);
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


        //Creacion del metodo setRol que sirve para crear un nuevo rol
        public function setRol()
        {
            if($_SESSION['permisosMod']['w']){

                $intIdrol = intval($_POST['idRol']);
                $strRol = strClean($_POST['txtNombre']);
                $strDescripcion = strClean($_POST['txtDescripcion']);
                $intStatus = intval($_POST['listStatus']);

                if($intIdrol == 0)
                {
                    //Crear
                    $request_rol = $this->model->insertRol($strRol, $strDescripcion, $intStatus);
                    $option = 1;
                }else
                {
                    //Actualizar
                    $request_rol = $this->model->updateRol($intIdrol, $strRol, $strDescripcion, $intStatus);
                    $option = 2;
                }

                if($request_rol > 0)
                {
                    if($option == 1)
                    {
                        $arrResponse = array('status' => true, 'msg' => 'Datos Guardados correctamente.');
                    }else
                    {
                        $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
                    }
    

                }else if($request_rol == 'exist')
                {
                    $arrResponse = array('status' => false, 'msg' => '¡Atención! El Rol ya existe.');
                }else
                {
                    $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        //Creacion del metodo delRol solicitado por function_roles.js #185
        public function delRol()
        {
            if($_POST){

                if($_SESSION['permisosMod']['d']){

                    $intIdrol = intval($_POST['idrol']);
                    $requestDelete = $this->model->deleleRol($intIdrol);
                    if($requestDelete == 'ok')
                    {
                        $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Rol.');
                    }else if($requestDelete == "exist"){
                        $arrResponse = array('status' => false, 'msg' => 'No es posible elminar un Rol asociado a usuarios.');
                    }else
                    {
                        $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Rol.');
                    }
                    echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
                }
            }
            die();
        }

       

        

    }

?>