<?php
require_once("Libraries/Core/Mysql.php");
trait TArtesano
{
    private $con;
    private $strMunicipio;
    private $intIdmunicipio;
    



    public function getArtesanosMunicipioT(string $municipio){
        $this->strMunicipio = $municipio;
        $this->con = new Mysql();

        

        $sql_mun = "SELECT idmunicipio FROM municipios WHERE municipio = '{$this->strMunicipio}'";
        $request = $this->con->select($sql_mun);

        if(!empty($request)){

            $this->intIdmunicipio = $request['idmunicipio'];
            $sql = "SELECT p.nombrecompleto,
            p.telefono,
            p.facebook,
            p.twitter,
            p.instagram,
            p.sitio_web,
            p.domicilio,
            p.empresa,
            m.municipio
            FROM persona p 
            INNER JOIN municipios m 
            ON p.municipioid = m.idmunicipio 
            AND p.rolid != 1 AND p.status != 2 AND p.telefono !=0 AND p.status !=0
            WHERE p.municipioid = '{$this->intIdmunicipio}'";
             $request = $this->con->select_all($sql);

        }
        return $request;
    }
}
?>