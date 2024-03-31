<?php

    require_once("Models/TCategoria.php");
    require_once("Models/TArtesania.php");

    class Tipo extends Controllers{
        use TCategoria, TArtesania;
        public function __construct()
        {
            parent::__construct();
        }

        
        public function tipo()
        {
            $data['artesanias'] = $this->getArtesaniasT();
            $this->views->getView($this,"home",$data);

        }

        
        public function categoria($params){
            if(empty($params)){
                header("Location:".base_url());
            }else{

                /*echo $params;
                exit;*/

                $arrParams = explode(",",$params);
                $idcategoria = intval($arrParams[0]);
                $ruta = strClean($arrParams[1]);
                $infoCategoria = $this->getArtesaniasCategoriaT($idcategoria, $ruta);
                /*dep($infoCategoria);
                exit;*/
                /*dep($arrParams);
                exit;*/

                $categoria = strClean($params);

                //dep($this->getArtesaniasCategoriaT($categoria));
                $data['page_tag'] = $categoria;
                $data['page_title'] = $infoCategoria['categoria'];
                $data['page_name'] = "categoria";
                $data['artesanias'] =  $infoCategoria['artesanias'];
                $this->views->getView($this,"categoria",$data);
            }
        }



        public function artesania($params){
            if(empty($params)){
                header("Location:".base_url());
            }else{

                $arrParams = explode(",",$params);
                $idartesania = intval($arrParams[0]);
                $ruta = strClean($arrParams[1]);
                $infoArtesania  = $this->getArtesaniaT($idartesania, $ruta);
                if(empty($infoArtesania)){
                    header("Location:".base_url());
                }

                /*dep($infoArtesania) ;
                exit;*/

                //$artesania = strClean($params);
            
                //$arrArtesania = $this->getArtesaniaT($artesania);

                //dep($this->getArtesaniaT($artesania));
                 
                //dep($this->getArtesanoT($artesania));

                $data['page_tag'] = $infoArtesania['nombre_artesania'];
                $data['page_title'] = $infoArtesania['nombre_artesania'];
                $data['page_name'] = "artesania";
                $data['artesania'] =  $infoArtesania;
                $data['artesanias'] = $this->getArtesaniasRandom($infoArtesania['categoriaid'],8,"r");
                $this->views->getView($this,"artesania",$data);
            }

        }
      

        

        
    }

?>