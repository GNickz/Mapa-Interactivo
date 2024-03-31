<?php
    require_once("Models/TRegistro.php");
    require_once("Models/LoginModel.php");

class Registro extends Controllers{
    use TRegistro;
    public $login;
    public function __construct()
    {
        
        //sessionStart();
        //session_start();
        parent::__construct();
        session_start();
        $this->login = new LoginModel();
       
        
        
        
        /*if(isset($_SESSION['login']))
        {
            header('Location: dashboard');
        }*/
       
    }

    
    public function registro()
    {
        $data['page_tag'] = "Registro - Artesanos Puebla";
        $data['page_title'] = "Registro";
        $data['page_name'] = "Registro";
        $data['page_functions_js'] = "functions_registro.js";
        $this->views->getView($this,"registro",$data);
    }


    public function getSelectMunicipiosRegistro()
         {
             $htmlOptions = "";
             $arrData = $this->model->selectRegistroMunicipios();
             if(count($arrData) > 0 )
             {
                for ($i=0; $i < count($arrData); $i++)
                {
                    $htmlOptions .= '<option value="'.$arrData[$i]['idmunicipio'].'">'.$arrData[$i]['municipio'].'</option>';
                }
             }
             echo $htmlOptions;
             die();
         }





        public function registroartesano()
        {
           
             {
                 if(empty($_POST['txtNombre']) || empty($_POST['txtEmailArtesano']) || empty($_POST['listMunicipioRegistroid']) || empty($_POST['txtPasswordArtesano']) || empty($_POST['g-recaptcha-response']))
                 {
                     $arrResponse = array ("status" => false, "msg" => 'Datos incorrectos.');
                     //dep($arrResponse);
                     //exit;
                   
                 }else{

                    
                     

                   


                     $strNombre = ucwords(strClean($_POST['txtNombre']));

                     $strEmail = strtolower(strClean($_POST['txtEmailArtesano']));
 
                     $intMunicipio = intval(strClean($_POST['listMunicipioRegistroid']));
 
                     $strPassword = strtolower(strClean($_POST['txtPasswordArtesano']));

                     $intTipoId = 2;

                     $intStatus = 2;
 
                     $request_user = "";

                     $captcha = $_POST['g-recaptcha-response'];

                     $secret = '6LdbGkYlAAAAAJ92sjja_ogarc0i7j7_0121R7Hi';

                     $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");

                     //var_dump($response);

                     $arr = json_decode($response, TRUE);
                     if($arr['success']){

                     }else{
                        $arr = array("status" => false, 'msg' => 'Espere a que el capcha se reincie para poder volver a verificarlo.');
                     }

        
                     $option = 1;
                     $strPassword = empty($_POST['txtPasswordArtesano']) ? hash("SHA256",passGenerator()) : hash("SHA256",$_POST['txtPasswordArtesano']);
                     $strPasswordEncript = hash("sha256", $strPassword);
 
                         $request_user = $this->insertArtesano($strNombre,
                                                               $strEmail,
                                                               $strPassword,
                                                               $intMunicipio,
                                                               $intTipoId,
                                                               $intStatus
                                                              );
                     if($request_user > 0)
                     {

                       $arrResponse = array('status' => true, 'msg' => 'Sus datos han sido registrados exitosamente. Por favor espere a que nuestros administradores verifiquen su información para que pueda acceder al sistema esto podria demorar de 12 a 24 horas.
                       Al momento de que pueda inciar sesion dirijase a la sección perfil ubicada en la parte superior derecha de su monitor  y actualice su información personal y de contacto.');
                        /*dep($arrResponse);
                        exit;*/
                        

                       $nombreArtesano = $strNombre;
                        $dataArtesano = array('nombreArtesano' => $nombreArtesano,
                                              'email' => $strEmail,
                                              'password' => 'Bienvenido Artesanos Puebla');

                        $_SESSION['idUser'] = $request_user;
                        $_SESSION['login'] = true;
                  
                                              $this->login->sessionLogin($request_user);

                        //sendEmail($dataArtesano,'email_bienvenida');
                        
                       
                        
                     }else if($request_user == 'exist')
                     {
                         $arrResponse = array('status' => false, 'msg' => '¡Atención! el email ya existe, por favor ingrese otro.');
                     }else
                     {
                         $arrResponse = array("status" => false, 'msg' => 'No es posible almacenar los datos.');
                     }



                 }
                 echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
             }
             die();
        }

}

?>