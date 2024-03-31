<?php

require_once("Libraries/Core/Mysql.php");
trait TCategoria{
    private $con;

    public function getCategoriasT(string $categorias)
    {
        $this->con = new Mysql();
        $sql = "SELECT idtipoartesania, nombre, descripcion, portada, ruta
                FROM categoria_artesanias
                WHERE status != 2
                AND idtipoartesania
                IN ($categorias)";
        
        $request = $this->con->select_all($sql);
        if(count($request) > 0)
        {
            for ($c=0; $c < count($request) ; $c++)
            {
                $request[$c]['portada'] = 'Assets/images/uploads/'.$request[$c]['portada'];
            }
        }
        return $request;

    }
}




/*if(count($request) > 0){

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
}*/
?>