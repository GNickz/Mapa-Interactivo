<?php
require_once("Libraries/Core/Mysql.php");
trait TArtesania
{
    private $con;
    private $strCategoria;
    private $intIdcategoria;
    private $strArtesania;
    private $cant;
    private $option;

    private $strRuta;

    private $intIdArtesania;

    private $strArtesano;
    private $intIdartesano;

    public function getArtesaniasT()
    {
       
        $this->con = new Mysql();
        $sql = "SELECT a.idartesania,
                       a.codigo,
                       a.nombre_artesania,
                       a.descripcion,
                       a.categoriaid,
                       c.nombre as categoria,
                       a.ruta

                      
                       
                FROM artesanias a
                INNER JOIN categoria_artesanias c
               

        

                ON a.categoriaid = c.idtipoartesania

                WHERE a.status != 0
                
                AND c.status !=2";
        $request = $this->con->select_all($sql);

        if(count($request) > 0){

            for ($c=0; $c  < count($request) ; $c++){
                $intIdArtesania = $request[$c]['idartesania'];
                $sqlImg = "SELECT img
                        FROM imagen
                        WHERE artesaniaid = $intIdArtesania";
                    $arrImg = $this->con->select_all($sqlImg);
                    if(count($arrImg) > 0){
                        for ($i=0; $i < count($arrImg); $i++){
                            $arrImg[$i]['url_image'] = media().'/images/uploads/'.$arrImg[$i]['img'];
                        }

                    }
                    $request[$c]['images'] = $arrImg;
            }
        }
        return $request;
    }


    public function getArtesaniasCategoriaT(int $idcategoria, string $ruta)
    {
       $this->intIdcategoria = $idcategoria;
       //$this->strArtesano = $artesano;
       $this->strRuta = $ruta;
        $this->con = new Mysql();

        $sql_cat = "SELECT idtipoartesania, nombre From categoria_artesanias WHERE idtipoartesania  = '{$this->intIdcategoria}'";
        //$sql_artesano = "SELECT codigo FROM persona WHERE idpersona = '{$this->strArtesano}'";
        //$request = $this->con->select($sql_artesano);

        $request = $this->con->select($sql_cat);

        if(!empty($request)){

            $this->strCategoria = $request['nombre'];
            
            //$this->intIdartesno = $request['codigo'];

            $sql = "SELECT a.idartesania,
            a.codigo,
            a.nombre_artesania,
            a.descripcion,
            a.categoriaid,
            c.nombre as categoria,
            a.ruta,

            p.telefono

        
            FROM artesanias a
            INNER JOIN categoria_artesanias c
            INNER JOIN persona p
       

            
            ON a.categoriaid = c.idtipoartesania

            

            WHERE a.status != 0

           

            AND p.telefono !=0
            
            AND a.artesaniaartesanoid = p.idpersona            

            AND a.categoriaid = $this->intIdcategoria AND c.ruta = '{$this->strRuta}'";
            $request = $this->con->select_all($sql);

            if(count($request) > 0){

                for ($c=0; $c  < count($request) ; $c++){
                    $intIdArtesania = $request[$c]['idartesania'];
                    $sqlImg = "SELECT img
                            FROM imagen
                            WHERE artesaniaid = $intIdArtesania";
                        $arrImg = $this->con->select_all($sqlImg);
                        if(count($arrImg) > 0){
                            for ($i=0; $i < count($arrImg); $i++){
                                $arrImg[$i]['url_image'] = media().'/images/uploads/'.$arrImg[$i]['img'];
                            }

                        }
                    $request[$c]['images'] = $arrImg;
                }
            }

            $request = array('idtipoartesania' => $this->intIdcategoria,
                                'categoria' => $this->strCategoria,
                                'artesanias' => $request);

        }

        return $request;
    }


    public function getArtesaniaT(int $idartesania, string $ruta)
    {
       
        $this->con = new Mysql();
        $this->intIdArtesania = $idartesania;
        $this->strRuta = $ruta;
        $sql = "SELECT a.idartesania,
                       a.codigo,
                       a.nombre_artesania,
                       a.descripcion,
                       a.categoriaid,
                       c.nombre as categoria,
                       

                     
                       
                       a.ruta,

                       p.nombrecompleto,
                       p.email_usuario,
                       
                       p.telefono,
                       p.facebook,
                       p.twitter,
                       p.instagram,
                       p.sitio_web,
                       p.domicilio,
                       p.empresa,
                       m.municipio

                       
                       
                FROM artesanias a
                INNER JOIN categoria_artesanias c

                INNER JOIN persona p
                
                INNER JOIN municipios m
                
              
                ON a.categoriaid = c.idtipoartesania

                WHERE a.status != 0  AND c.status !=2 AND a.idartesania = '{$this->intIdArtesania}' AND a.ruta = '{$this->strRuta}' AND
                a.artesaniaartesanoid = p.idpersona AND p.municipioid = m.idmunicipio";
        $request = $this->con->select($sql);
        

        if(!empty($request) ){

            
                $intIdArtesania = $request['idartesania'];
                $sqlImg = "SELECT img
                                        
                        FROM imagen i
                        
                        WHERE artesaniaid = $intIdArtesania";
                    $arrImg = $this->con->select_all($sqlImg);
                    if(count($arrImg) > 0){
                        for ($i=0; $i < count($arrImg); $i++){
                            $arrImg[$i]['url_image'] = media().'/images/uploads/'.$arrImg[$i]['img'];
                        }

                    }else{
                        $arrImg[0]['url_image'] = media().'/images/uploads/product.png';
                    }
                    $request['images'] = $arrImg;
            
        }else if(!empty($request)){

            $intIdartesanias = $request['idartesania'];
            $sqlartesano = "SELECT nombrecompleto
                            FROM persona
                            WHERE artesaniaid = $intIdartesanias";

        }
        
        return $request;
        
    }



    /*public function getArtesanoT(string $artesano)
    {
       
        $this->con = new Mysql();
        $this->strArtesano = $artesano;
            $sql = "SELECT nombrecompleto,
            telefono,
            facebook,
            twitter,
            instagram
            FROM persona
            WHERE status != 0";
        $request = $this->con->select($sql);
        return $request;
    }*/


    public function getArtesaniasRandom(int $idcategoria, int $cant, string $option)
    {
        $this->intIdcategoria = $idcategoria;
        $this->cant = $cant;
        $this->option = $option;

        if($option == "r"){
            $this->option = " RAND() ";
        }else if($option == "a"){
            $this->option = " idartesania ASC ";
        }else{
            $this->option = " idartesania DESC ";
        }

        $this->con = new Mysql();
            $sql = "SELECT a.idartesania,
            a.codigo,
            a.nombre_artesania,
            a.descripcion,
            a.categoriaid,
            c.nombre as categoria,
            a.ruta,

            p.telefono
            FROM artesanias a
            INNER JOIN categoria_artesanias c
            
            INNER JOIN persona p

            ON a.categoriaid = c.idtipoartesania
            WHERE a.status != 0

            AND c.status !=2
            AND p.telefono !=0
            
            AND a.artesaniaartesanoid = p.idpersona
            AND a.categoriaid = $this->intIdcategoria
            ORDER BY $this->option LIMIT $this->cant ";

            $request = $this->con->select_all($sql);

            if(count($request) > 0){

                for ($c=0; $c  < count($request) ; $c++){
                    $intIdArtesania = $request[$c]['idartesania'];
                    $sqlImg = "SELECT img
                            FROM imagen
                            WHERE artesaniaid = $intIdArtesania";
                        $arrImg = $this->con->select_all($sqlImg);
                        if(count($arrImg) > 0){
                            for ($i=0; $i < count($arrImg); $i++){
                                $arrImg[$i]['url_image'] = media().'/images/uploads/'.$arrImg[$i]['img'];
                            }

                        }
                    $request[$c]['images'] = $arrImg;
                }
            }

        return $request;
    }

   
       
    
}

?>