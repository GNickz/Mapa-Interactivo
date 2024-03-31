<?php

    require_once("Models/TMunicipio.php");

    require_once("Models/TCategoria.php");
    require_once("Models/TArtesania.php");
    

    class Home extends Controllers{
        use TMunicipio, TCategoria, TArtesania;

        public function __construct()
        {
            parent::__construct();
        }

        
        public function home()
        {
            
           //dep($this->getMunicipiosT(MUN_BANNER));
           
            
            $data['bannermunicipios'] = $this->getMunicipiosT(MUN_BANNER);
           // dep($data);

            $data['banner'] = $this->getCategoriasT(CAT_BANNER); 

            $data['artesanias'] = $this->getArtesaniasT();

            $this->views->getView($this,"home",$data);
        }

       



    }

?>