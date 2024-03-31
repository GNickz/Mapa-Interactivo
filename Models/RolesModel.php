<?php

    class RolesModel extends Mysql
    {

        //Definicion de las propiedades que tendra un rol
        public $intIdrol;
        public $strRol;
        public $strDescripcion;
        public $intStatus;



        public function __construct()
        {          
            parent::__construct();
        }

        //Creacion del metodo selectRoles solicitado en Roles.php
        public function selectRoles()
        {
            $whereAdmin = "";
            if($_SESSION['idUser'] != 1)
            {
                $whereAdmin = " and idrol != 1";
            }
            //EXTRAESR LOS DATOS DE ROLES DE LA BASE DE DATOS
            $sql = "SELECT * FROM roles WHERE status != 0" .$whereAdmin;
            $request = $this->select_all($sql);
            return $request;
        }

        //Creacion del m etodo selectRol solicitado en Roles.php # 49
        public function selectRol(int $idrol)
        {
            //Busqueda del rol
            $this->intIdrol = $idrol;
            $sql = "SELECT * FROM roles WHERE idrol = $this->intIdrol";
            $request = $this->select($sql);
            return $request;

        }

        //Creacion de metodo insertRol Solicitado en Roles.php #49
        public function insertRol(string $rol, string $descripcion, int $status)
        {
            $return = "";
            $this->strRol = $rol;
            $this->strDescripcion = $descripcion;
            $this->intStatus = $status;

            $sql = "SELECT * FROM roles WHERE nombrerol = '{$this->strRol}'";
            $request = $this->select_all($sql);

            if(empty($request))
            {
                $query_insert = "INSERT INTO roles(nombrerol,descripcion,status) VALUES (?,?,?)";
                $arrData = array($this->strRol,$this->strDescripcion,$this->intStatus);
                $request_insert = $this->insert($query_insert,$arrData);
                $return = $request_insert;
            }else
            {
                $return = "exist";
            }
            return $return;
        }

        //Creacion del metodo updateRol solicitado en Roles.php #80
        public function updateRol(int $idrol, string $rol, string $descripcion, int $status)
        {
            $this->intIdrol = $idrol;
            $this->strRol = $rol;
            $this->strDescripcion = $descripcion;
            $this->intStatus = $status;

            $sql = "SELECT * FROM roles WHERE nombrerol = '$this->strRol' AND idrol != $this->intIdrol";
            $request = $this->select_all($sql);

            if(empty($request))
            {
                $sql = "UPDATE roles SET nombrerol = ?, descripcion = ?, status = ? WHERE idrol = $this->intIdrol";
                $arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
                $request = $this->update($sql,$arrData);
            }else
            {
                $request = "exist";
            }
            return $request;
        }

        //Creacion del metodo deleleRol solicitado en Roles.php #112

        public function deleleRol(int $idrol)
        {
            $this->intIdrol = $idrol;
            $sql = "SELECT * FROM persona WHERE rolid = $this->intIdrol ";
            $request = $this->select_all($sql);
            if(empty($request))
            {
                $sql = "UPDATE roles SET status = ? WHERE idrol = $this->intIdrol";
                $arrData = array(0);
                $request = $this->update($sql,$arrData);
                if($request)
                {
                    $request = 'ok';
                }else
                {
                    $request = 'error';
                }

            }else
            {
                $request = 'exist';
            }
            return $request;
        }

    }


?>