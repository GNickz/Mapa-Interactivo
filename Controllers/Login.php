
<?php

    class Login extends Controllers{
        public function __construct()
        {
            
            //sessionStart();
            session_start();
            parent::__construct();
           
            
            
            
            if(isset($_SESSION['login']))
            {
                header('Location: dashboard');
            }
           
        }

        
        public function login()
        {
            $data['page_tag'] = "Login - Artesanos Puebla";
            $data['page_title'] = "Login";
            $data['page_name'] = "login";
            $data['page_functions_js'] = "functions_login.js";
            $this->views->getView($this,"login", $data);
        }

        //Metodo para iniciar sesion
        //Creacion del metodo loginUser solicitadoen functions_login.js #22
        public function loginUser(){
            /*dep($_POST);
            die();*/
            if($_POST){
                if(empty($_POST['txtEmail']) || empty($_POST['txtPassword'])){
                    $arrResponse = array('status' => false, 'msg' => 'Error de datos');
                }else{
                    $strUsuario = strtolower(strClean($_POST['txtEmail']));
                    $strPassword = hash("SHA256",$_POST['txtPassword']);
                    $requestUser = $this->model->loginUser($strUsuario, $strPassword);

                    if(empty($requestUser)){
                        $arrResponse = array('status' => false, 'msg' => 'El usuario o la contraseña es incorrecto.');
                    }else{
                        $arrData = $requestUser;
                        if($arrData['status'] == 1){
                            $_SESSION['idUser'] = $arrData['idpersona'];
                            $_SESSION['login'] = true;

                            $_SESSION['timeout'] = true;
                            $_SESSION['inicio'] = time();

                            $arrData = $this->model->sessionLogin($_SESSION['idUser']);

                            sessionUser($_SESSION['idUser']);
                            //$_SESSION['userData'] = $arrData;
                            
                            $arrResponse = array('status' => true, 'msg' => 'ok');
                        }else{
                            $arrResponse = array('status' => false, 'msg' => 'Este usuario esta inactivo. Por favor espere de 12 a 24 horas para que nuestros administradores verifiquen su información. Si han pasados más de 24 hora comuníquese al siguiente correo: dir_dsnegraajalpan@tecnm.mx');

                        }
                    }
                    
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        //Metodo para recuperar contraseña
        //Creacion del metodo resetPassword solicitado en functions.login.js #65
        public function resetPass(){

            error_reporting(0);

            if(empty($_POST['txtEmailReset'])){

               

                $arrResponse = array('status' => false, 'msg' => 'Error de datos.');
            }else{
                $token = token();
                $strEmail = strtolower(strClean($_POST['txtEmailReset']));
                $arrData = $this->model->getUserEmail($strEmail);

                if(empty($arrData)){
                    $arrResponse = array('status' => false, 'msg' => 'Usuario no existente.');
                }else{
                    $idpersona = $arrData['idpersona'];
                    $nombreUsuario = $arrData['nombrecompleto'];

                    $url_recovery = 'Login/confirmUser/'.$strEmail.'/'.$token;

                    $requestUpdate = $this->model->setTokenUser($idpersona,$token);


                    $dataUsuario = array('nombreUsuario' => $nombreUsuario,
                                         'email' => $strEmail,
                                         'asunto' => 'Recuperar contraseña - '.NOMBRE_REMITENTE,
                                         'url_recovery' => $url_recovery);
                        
                    

                    if($requestUpdate){

                        $sendEmail = sendEmail($dataUsuario,'email_cambioPassword');

                        if($sendEmail){
                            $arrResponse = array('status' => true,
                                                 'msg' => 'Se ha enviado un email a su cuenta de correo electronico para que pueda reestablecer su contraseña.');
                        }else{
                            $arrResponse = array('status' => false,
                                             'msg' => 'No es posible realizar el proceso, intente más tarde. =(');

                        }

                        
                    }else{
                        $arrResponse = array('status' => false,
                                             'msg' => 'No es posible realizar el proceso, intente más tarde. =(');
                    }

                }
            }
            //sleep(3);
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            die();
        }

        //Metodo para mostrar la vista de cambio de contraseña
        public function confirmUser(string $params){

            if(empty($params)){
                header('Location:/Proyecto-residencia-profesional-2');
            }else{
               $arrParams = explode(',',$params);

               $strEmail = strClean($arrParams[0]);
               $strToken = strClean($arrParams[1]);

               $arrResponse = $this->model->getUsuario($strEmail,$strToken);

               if(empty($arrResponse)){
                header('Location:/Proyecto-residencia-profesional-2');
               }else{
                
                $data['page_tag'] = "Cambiar contraseña";
                $data['page_name'] = "cambiar_contraseña";
                $data['page_title'] = "Cambiar contraseña";
                $data['email'] = $strEmail;
                $data['token'] =  $strToken;
                $data['idpersona'] = $arrResponse['idpersona'];
                $data['page_functions_js'] = "functions_login.js";
                $this->views->getView($this,"cambiar_password", $data);

               }

            }
            die();

        }

        //Creacion del metodo setPassword solicitado por functions_login.js # 126

        public function setPassword(){
            if(empty($_POST['idUsuario']) || empty($_POST['txtEmail']) || empty($_POST['txtToken']) || empty($_POST['txtPassword']) || empty($_POST['txtPasswordConfirm'])){

                $arrResponse = array('status' => false, 'msg' => 'Error de datos');

            }else{
                $intIdpersona = intval($_POST['idUsuario']);
                $strPassword = $_POST['txtPassword'];
                $strPasswordConfirm = $_POST['txtPasswordConfirm'];
                $strEmail = strClean($_POST['txtEmail']);
                $strToken = strClean($_POST['txtToken']);

                if($strPassword != $strPasswordConfirm){
                    $arrResponse = array('status' => false, 'msg' => 'Las contraseñas no coinciden, vuelva a intentarlo.');

                }else{
                    $arrResponseUser = $this->model->getUsuario($strEmail,$strToken);

                    if(empty($arrResponseUser)){
                    $arrResponse = array('status' => false, 'msg' => 'Error de datos.');
                    }else{
                        $strPassword = hash("SHA256",$strPassword);
                        $requestPass = $this->model->insertPassword($intIdpersona, $strPassword);

                        if($requestPass){
                            $arrResponse = array('status' => true, 'msg' => 'Contraseña actualizada correctamente.');
                        }else{
                            $arrResponse = array('status' => false, 'msg' => 'No es posible realizar este proceso, intente mas tarde.');
                        }
                    }
                }
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            die();

        }


    }
   

?>