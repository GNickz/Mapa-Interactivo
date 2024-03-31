<?php

    class LoginModel extends Mysql
    {
        private $intIdUsuario;
        private $strUsuario;
        private $strPassword;
        private $strToken;

        public function __construct()
        {          
            parent::__construct();
        }

        //Creacion de metodo loginUser solicitado por Login.php #28
        public function loginUser(string $usuario, string $password)
        {
            $this->strUsuario = $usuario;
            $this->strPassword = $password;
            $sql = "SELECT idpersona,status FROM persona WHERE
                    email_usuario = '$this->strUsuario' and
                    contraseña = '$this->strPassword' and
                    status !=0 ";
            $request = $this->select($sql);
            return $request;
        }

        // Metodo sessionLogin() solicitado en Login.php #42
        public function sessionLogin(int $iduser){
            $this->intIdUsuario = $iduser;

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
                           m.idmunicipio,m.municipio,
                           t.idtipoartesania,t.nombre,t.descripcion,t.status,t.portada,
                           a.nombre_artesania,a.descripcion,a.imagen,
                           r.idrol,r.nombrerol,
                           p.status
                    FROM persona p
                    INNER JOIN municipios m
                    ON p.municipioid = m.idmunicipio
                    
                    INNER JOIN categoria_artesanias t
                    ON p.tipoartesaniaid = t.idtipoartesania

                    INNER JOIN artesanias a
                    ON p.artesaniaid = a.idartesania
                    
                    INNER JOIN roles r
                    ON p.rolid = r.idrol
                    
                    WHERE p.idpersona = $this->intIdUsuario";

            $request = $this->select($sql);
            $_SESSION['userData'] = $request;
            return $request;
        }

        //Creacion del metodo getUseEmail Solicitado en Login.php #68
        public function getUserEmail(string $strEmail){
            $this->strUsuario = $strEmail;
            $sql = "SELECT idpersona,
                           nombrecompleto,
                           status

                    FROM   persona

                    WHERE  email_usuario = '$this->strUsuario' and
                           status = 1";

            $request = $this->select($sql);
            return $request;
        }

        //Creacion del metodo setTokenUser solicitado en Login.php #78
        public function setTokenUser(int $idpersona, string $token){
            $this->intIdUsuario = $idpersona;
            $this->strToken = $token;
            $sql = "UPDATE persona SET token = ? WHERE idpersona = $this->intIdUsuario";
            $arrData = array($this->strToken);
            $request = $this->update($sql,$arrData);
            return $request;

        }

        //Creacion de metodo getUsuario solicitado en Login.php #104
        public function getUsuario(string $email, string $token){
            $this->strUsuario = $email;
            $this->strToken = $token;
            $sql = "SELECT idpersona FROM persona WHERE
                    email_usuario = '$this->strUsuario' and
                    token = '$this->strToken' and
                    status = 1 ";
            $request = $this->select($sql);
            return $request; 

        }

        //Creacion del metodo insertPassword solicitado en Login.php #150
        public function insertPassword(int $idPersona, string $password){
            $this->intIdUsuario = $idPersona;
            $this->strPassword = $password;
            $sql = "UPDATE persona SET contraseña = ?, token = ? WHERE idpersona = $this->intIdUsuario";
            $arrData = array($this->strPassword,"");
            $request = $this->update($sql,$arrData);
            return $request;

        }



        

    }


?>