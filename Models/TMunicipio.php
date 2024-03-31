<?php
require_once("Libraries/Core/Mysql.php");

trait TMunicipio{
    public $can;

    public function getMunicipiosT(string $municipios){
        $this->can = new Mysql();
        $sql = "SELECT idmunicipio, municipio 
        FROM municipios 
        WHERE idmunicipio IN ($municipios)";
        $request = $this->can->select_all($sql);

        return $request;
    }
}

?>