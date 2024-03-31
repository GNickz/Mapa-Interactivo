<?php

    class RegistroModel extends Mysql
    {
        public function __construct()
        {          
            parent::__construct();
        }

        public function selectRegistroMunicipios()
        {
            //EXTRAESR LOS DATOS DE ROLES DE LA BASE DE DATOS
            $sql = "SELECT * FROM municipios WHERE idmunicipio != 0";
            $request = $this->select_all($sql);
            return $request;
        }




    }


?>