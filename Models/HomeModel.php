<?php
   // require_once("MunicipiosModel.php");
    class HomeModel extends Mysql
    {
        private $objCategoria;
        public function __construct()
        {          
            parent::__construct();
            //$this->objCategoria = new MunicipiosModel();
        }

        public function getMunicipios(){
           // return $this->objCategoria->selectMunicipios();

        }
    }


?>