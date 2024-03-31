<?php
   // require_once("MunicipiosModel.php");
    class SolicitudesModel extends Mysql
    {
        private $intIdUsuario;

        private $strNombredelSolicitante;
        private $intMunicipiodelSolicitante;
        private $strEmaildelSolicitante;
        private $intStatusSolicitante;
        private $intTipoId;

        
     

        
        public function __construct()
        {          
            parent::__construct();
            //$this->objCategoria = new MunicipiosModel();
        }

        public function insertarSolicitud(string $nombre, string $email,int $municipio, int $tipoid, int $status){

            $this->strNombredelSolicitante = $nombre;
            $this->strEmaildelSolicitante = $email;
            $this->intMunicipiodelSolicitante = $municipio;
            $this->intTipoId = $tipoid;
            $this->intStatusSolicitante = $status;
            $return = 0;

            $sql = "SELECT * FROM persona WHERE email_usuario = '{$this->strEmaildelSolicitante}' ";

            $request = $this->select_all($sql);

            if(empty($request))
            {
                $query_insert = "INSERT INTO persona(
                    nombrecompleto,email_usuario,municipioid,rolid,status)
                                VALUES(?,?,?,?,?)";
                $arrData = array($this->strNombredelSolicitante,
                                 $this->strEmaildelSolicitante,
                                 $this->intMunicipiodelSolicitante,
                                 $this->intTipoId,
                                 $this->intStatusSolicitante,
                );
                $request_insert = $this->insert($query_insert,$arrData);
                $return = $request_insert;
            }else{
                $return = "exist";
            }
            return $return;

        }

        public function selectSolicitudes()
        {
            $sql = "SELECT p.idpersona,p.nombrecompleto,p.email_usuario,m.municipio,p.status
                    FROM persona p
                    INNER JOIN municipios m
                    ON p.municipioid = m.idmunicipio
                    WHERE p.status != 0 AND p.status = 2 ";
            $request = $this->select_all($sql);
            return $request;
        }


        public function selectSolicitud(int $idpersona)
        {
            $this->intIdUsuario = $idpersona;
            $sql = "SELECT p.idpersona,p.nombrecompleto,p.email_usuario,m.idmunicipio,m.municipio,p.status
                    FROM persona p
                    INNER JOIN municipios m
                    ON p.municipioid = m.idmunicipio
                    WHERE p.idpersona = $this->intIdUsuario";
                    //echo $sql;exit;
            $request = $this->select($sql);
            return $request;
                    
        }

        public function updateSolicitud(int $idUsuario, string $nombre, string $email, int $municipioid, int $tipoid, int $status)
        {
            $this->intIdUsuario = $idUsuario;
            $this->strNombredelSolicitante = $nombre;
            $this->strEmaildelSolicitante = $email;
            $this->intMunicipiodelSolicitante = $municipioid;
            $this->intTipoId = $tipoid;
            $this->intStatusSolicitante = $status;
            $return = 0;

            $sql = "SELECT * FROM persona WHERE (email_usuario = '{$this->strEmaildelSolicitante}' AND idpersona != $this->intIdUsuario)";
            $request = $this->select_all($sql);

            if(empty($request))
            {
                    $sql = "UPDATE persona SET nombrecompleto=?, email_usuario=?, municipioid=?, rolid=?, status=?
                    WHERE idpersona = $this->intIdUsuario";
                    $arrData = array(
                        $this->strNombredelSolicitante,
                        $this->strEmaildelSolicitante,
                        $this->intMunicipiodelSolicitante,
                        $this->intTipoId,
                        $this->intStatusSolicitante
                    );

                $request = $this->update($sql,$arrData);
                $return = $request;

            }else{
                $request = "exist";

            }
            return $return;

        }

        public function deleteUsuario(int $intIdpersona)
        {
            $this->intIdUsuario = $intIdpersona;
            $sql = "UPDATE persona SET status = ? WHERE idpersona = $this->intIdUsuario";
            $arrData = array(0);
            $request = $this->update($sql,$arrData);
            return $request;
        }



    }

/*
require_once("Libraries/Core/Mysql.php");
trait TSolicitud{
    private $con;

    private $intIdUsuario;
    
    private $strNombredelSolicitante;
    private $strEmaildelSolicitante;
    private $intMunicipiodelSolicitante;
    private $intStatusSolicitante;
    private $intTipoId;

    


    public function insertarSolicitud(string $nombre, string $email, int $municipio, int $tipoid, int $status)
    {
        $this->con = new Mysql();

        
        $this->strNombredelSolicitante = $nombre;
        $this->strEmaildelSolicitante = $email;
        $this->intMunicipiodelSolicitante = $municipio;
        $this->intTipoId = $tipoid;
        $this->intStatusSolicitante = $status;

      


        $return = 0;


        $sql = "SELECT * FROM persona WHERE
        email_usuario = '{$this->strEmaildelSolicitante}'";
        $request = $this->con->select_all($sql);

        if(empty($request))
        {
        $query_insert = "INSERT INTO persona(
        nombrecompleto,email_usuario,municipioid,rolid,status)
        VALUES(?,?,?,?,?)";

        $arrData = array(
        $this->strNombredelSolicitante,
        $this->strEmaildelSolicitante,
        $this->intMunicipiodelSolicitante,
        $this->intTipoId,
        $this->intStatusSolicitante,
        );

        $request_insert = $this->con->insert($query_insert,$arrData);
        $return = $request_insert;
        }else
        {
        $return = "exist";
        }
        return $return;
    }

}
*/

?>