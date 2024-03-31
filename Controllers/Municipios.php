<?php



    class Municipios extends Controllers{

        public function __construct()
        {
            parent::__construct();
        }

        
        public function Municipios()
        {
            $this->views->getView($this,"home");
        }


         //Prueva para extraer de la BD los municipios
         public function getSelectMunicipios()
         {
             $htmlOptions = "";
             $arrData = $this->model->selectMunicipios();
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

         






    }

?>