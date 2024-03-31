<?php

    class UsuariosModel extends Mysql
    {

        private $intIdUsuario;
        private $strUsuario;
        private $strNombre;
        private $strEmail;
        private $strPassword;

        private $intTelefono;
        private $strFacebook;
        private $strTwitter;
        private $strInstagram;
        private $strSitioWeb;
        private $strDomicilio;
        private $strEmpresa;
        private $intMunicipio;

        private $strToken;
        private $intTipoId;
        private $intStatus;

    
        public function __construct()
        {          
            parent::__construct();
        }

        public function insertUsuario(string $usuario, string $nombre, string $email, string $password, int $telefono, string $facebook,
                                      string $twitter, string $instagram, string $sitioweb, string $domicilio, string $empresa,
                                      int $municipio, int $tipoid, int $status)
        {
            $this->strUsuario = $usuario;
            $this->strNombre = $nombre;
            $this->strEmail = $email;
            $this->strPassword = $password;

            $this->intTelefono = $telefono;
            $this->strFacebook = $facebook;
            $this->strTwitter = $twitter;
            $this->strInstagram = $instagram;
            $this->strSitioWeb = $sitioweb;
            $this->strDomicilio = $domicilio;
            $this->strEmpresa = $empresa;
            $this->intMunicipio = $municipio;

            $this->intTipoId = $tipoid;
            $this->intStatus = $status;
            $return = 0;

            
            $sql = "SELECT * FROM persona WHERE
                    email_usuario = '{$this->strEmail}' or usuario = '{$this->strUsuario}'";
            $request = $this->select_all($sql);

            if(empty($request))
            {
                $query_insert = "INSERT INTO persona(
                    usuario,nombrecompleto,email_usuario,contraseña,telefono,facebook,twitter,instagram,sitio_web,domicilio,empresa,municipioid,rolid,status)
                                    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

                $arrData = array($this->strUsuario,
                                 $this->strNombre,
                                 $this->strEmail,
                                 $this->strPassword,

                                 $this->intTelefono,
                                 $this->strFacebook,
                                 $this->strTwitter,
                                 $this->strInstagram,
                                 $this->strSitioWeb,
                                 $this->strDomicilio,
                                 $this->strEmpresa,
                                 $this->intMunicipio,

                                 $this->intTipoId,
                                 $this->intStatus);

                $request_insert = $this->insert($query_insert,$arrData);
                $return = $request_insert;
            }else
            {
                $return = "exist";
            }
            return $return;
        }

        //Metodo para mostrar los usuarios almacenados en la DB a la datatable de usuarios
        public function selectUsuarios()
        {
            $whereAdmin = "";
            if($_SESSION['idUser'] != 1)
            {
                $whereAdmin = " and p.idpersona != 1";
            }

            $sql = "SELECT p.idpersona,
                           p.usuario,
                           p.nombrecompleto,
                           p.email_usuario,
                           p.telefono,
                           p.facebook,
                           p.twitter,
                           p.instagram,
                           p.sitio_web,
                           p.domicilio,
                           p.empresa,
                           m.municipio, 
                           p.status,
                           r.idrol,
                           r.nombrerol
            FROM persona p
            INNER JOIN municipios m
            ON p.municipioid = m.idmunicipio
            INNER JOIN roles r
            ON p.rolid = r.idrol
            WHERE p.status != 0 " .$whereAdmin;

            $request = $this->select_all($sql);
            return $request;
        }
        

        public function selectUsuario(int $idpersona)
        {
            $this->intIdUsuario = $idpersona;
            $sql = "SELECT p.idpersona,
                           p.usuario,
                           p.nombrecompleto,
                           p.email_usuario,
                           p.telefono,
                           p.facebook,
                           p.twitter,
                           p.instagram,
                           p.sitio_web,
                           p.domicilio,
                           p.empresa,
                           m.idmunicipio,
                           m.municipio, 
                           r.idrol,
                           r.nombrerol,
                           p.status
            FROM persona p
            INNER JOIN municipios m
            ON p.municipioid = m.idmunicipio
            INNER JOIN roles r
            ON p.rolid = r.idrol
            WHERE p.idpersona = $this->intIdUsuario";

            $request = $this->select($sql);
            return $request;
        }


        public function updateUsuario(int $idUsuario, string $usuario, string $nombre, string $email, string $password, int $telefono,
                                      string $facebook, string $twitter, string $instagram, string $sitioweb, string $domicilio, string $empresa,
                                      int $municipio, int $tipoid, int $status)
        {
            $this->intIdUsuario = $idUsuario;
            $this->strUsuario = $usuario;
            $this->strNombre = $nombre;
            $this->strEmail = $email;

            $this->intTelefono = $telefono;
            $this->strFacebook = $facebook;
            $this->strTwitter = $twitter;
            $this->strInstagram = $instagram;
            $this->strSitioWeb = $sitioweb;
            $this->strDomicilio = $domicilio;
            $this->strEmpresa = $empresa;
            $this->intMunicipio = $municipio;


            $this->strPassword = $password;
            $this->intTipoId = $tipoid;
            $this->intStatus = $status;

            $sql = "SELECT * FROM persona WHERE (email_usuario = '{$this->strEmail}' AND idpersona != $this->intIdUsuario)
                                                OR (usuario = '{$this->strUsuario}' AND idpersona != $this->intIdUsuario)";
            $request = $this->select_all($sql);
            
            if(empty($request))
            {
                if($this->strPassword != "")
                {
                    $sql = "UPDATE persona SET usuario=?, nombrecompleto=?, email_usuario=?, contraseña=?, telefono=?, facebook=?,
                                               twitter=?, instagram=?, sitio_web=?, domicilio=?, empresa=?, municipioid=?, rolid=?, status=?
                            WHERE idpersona = $this->intIdUsuario";

                            $arrData = array($this->strUsuario,
                                             $this->strNombre,
                                             $this->strEmail,
                                             $this->strPassword,

                                             $this->intTelefono,
                                             $this->strFacebook,
                                             $this->strTwitter,
                                             $this->strInstagram,
                                             $this->strSitioWeb,
                                             $this->strDomicilio,
                                             $this->strEmpresa,
                                             $this->intMunicipio,

                                             $this->intTipoId,
                                             $this->intStatus);
                }else
                {
                    $sql = "UPDATE persona SET usuario=?, nombrecompleto=?, email_usuario=?, telefono=?, facebook=?, twitter=?,
                                                          instagram=?, sitio_web=?, domicilio=?, empresa=?, municipioid=?, rolid=?, status=?
                            WHERE idpersona = $this->intIdUsuario";
                            $arrData = array($this->strUsuario,
                                             $this->strNombre,
                                             $this->strEmail,

                                             $this->intTelefono,
                                             $this->strFacebook,
                                             $this->strTwitter,
                                             $this->strInstagram,
                                             $this->strSitioWeb,
                                             $this->strDomicilio,
                                             $this->strEmpresa,
                                             $this->intMunicipio,

                                             $this->intTipoId,
                                             $this->intStatus);
                }
                $request = $this->update($sql,$arrData);

            }else
            {
                $request = "exist";
            }
            return $request;

        }

        //Creacion del metodo deleteUsuario solicitado en Usuario.php en #161
        public function deleteUsuario(int $intIdpersona)
        {
            $this->intIdUsuario = $intIdpersona;
            $sql = "UPDATE persona SET status = ? WHERE idpersona = $this->intIdUsuario";
            $arrData = array(0);
            $request = $this->update($sql,$arrData);
            return $request;

        }


        //Creacion de metodo updatePerfil solicitado en Usuarios.php # 269
        public function updatePerfil(int $idUsuario, string $usuario, string $nombre, int $telefono, string $facebook, string $twitter, 
                                     string $instagram, string $sitioweb, string $domicilio, string $empresa, int $municipio, string $password){

            $this->IntIdUsuario = $idUsuario;
            $this->strUsuario = $usuario;
            $this->strNombre = $nombre;
            $this->intTelefono = $telefono;
            $this->strFacebook = $facebook;
            $this->strTwitter = $twitter;
            $this->strInstagram = $instagram;
            $this->strSitioWeb = $sitioweb;
            $this->strDomicilio = $domicilio;
            $this->strEmpresa = $empresa;
            $this->intMunicipio = $municipio;
            $this->strPassword = $password;

            if($this->strPassword != "")
            {
                $sql = "UPDATE persona SET usuario=?, nombrecompleto=?, telefono=?, facebook=?, 
                                           twitter=?, instagram=?, sitio_web=?, domicilio=?, 
                                           empresa=?, municipioid=?, contraseña=?
                        WHERE idpersona = $this->IntIdUsuario ";
                $arrData = array($this->strUsuario,
                                 $this->strNombre,
                                 $this->intTelefono,
                                 $this->strFacebook,
                                 $this->strTwitter,
                                 $this->strInstagram,
                                 $this->strSitioWeb,
                                 $this->strDomicilio,
                                 $this->strEmpresa,
                                 $this->intMunicipio,
                                 $this->strPassword,
                                 );
            }else
            {
                $sql = "UPDATE persona SET usuario=?, nombrecompleto=?, telefono=?, facebook=?, 
                                           twitter=?, instagram=?, sitio_web=?, domicilio=?, 
                                           empresa=?, municipioid=?
                        WHERE idpersona = $this->IntIdUsuario ";
                $arrData = array($this->strUsuario,
                                 $this->strNombre,
                                 $this->intTelefono,
                                 $this->strFacebook,
                                 $this->strTwitter,
                                 $this->strInstagram,
                                 $this->strSitioWeb,
                                 $this->strDomicilio,
                                 $this->strEmpresa,
                                 $this->intMunicipio);
            }
            $request = $this->update($sql,$arrData);
            return $request;
        }
    }

?>