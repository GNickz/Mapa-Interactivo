<?php

    class MunicipiosModel extends Mysql
    {
        public function __construct()
        {          
            parent::__construct();
        }

        public function selectMunicipios()
        {
            //EXTRAE LOS DATOS DE LOS MUNICIPIOS  DE LA BASE DE DATOS
            $sql = "SELECT * FROM municipios WHERE idmunicipio != 0";
            $request = $this->select_all($sql);
            return $request;
        }




    }


?>