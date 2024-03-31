<?php

    require_once("Models/TMunicipio.php");

    require_once("Models/TCategoria.php");
    require_once("Models/TArtesania.php");

    require_once("Models/Tartesano.php");
    

    class Artesano extends Controllers{
        use TArtesano; //TCategoria, TArtesania;

        public function __construct()
        {
            parent::__construct();
        }

        
        public function artesano()
        {
           //dep($this->getMunicipiosT(MUN_BANNER));
            //$data['bannermunicipios'] = $this->getMunicipiosT(MUN_BANNER);
           // dep($data);
            //$data['banner'] = $this->getCategoriasT(CAT_BANNER); 
            //$data['artesanias'] = $this->getArtesaniasT();
            $data['page_name'] = "artesanos";
            //$data['artesanos'] = $this->getArtesanosT();

            $this->views->getView($this,"home",$data);
        }



        public function municipio($params)
        {
            if(empty($params)){
                header("Location:".base_url());
            }else{

                $municipio = strClean($params);

                //dep($this->getArtesanosMunicipioT($municipio));


                $data['page_title'] = $municipio;
                $data['page_name'] = "municipio";
                $data['artesanos'] = $this->getArtesanosMunicipioT($municipio);
                $this->views->getView($this,"municipio",$data);
            }

            

        }

       



    }

?>