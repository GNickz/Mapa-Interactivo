<?php

require_once("Libraries/Core/Mysql.php");
trait TRegistro{
    private $con;

    private $intIdUsuario;
    
    private $strNombre;
    private $strEmail;
    private $strPassword;

    private $intMunicipio;

    private $strToken;
    private $intTipoId;

    private $intStatus;


    public function insertArtesano(string $nombre, string $email, string $password, int $municipio, int $tipoid, int $status)
    {
        $this->con = new Mysql();

        
        $this->strNombre = $nombre;
        $this->strEmail = $email;
        $this->strPassword = $password;

        $this->intMunicipio = $municipio;

        $this->intTipoId = $tipoid;

        $this->intStatus = $status;

        $return = 0;


        $sql = "SELECT * FROM persona WHERE
        email_usuario = '{$this->strEmail}'";
        $request = $this->con->select_all($sql);

        if(empty($request))
        {
        $query_insert = "INSERT INTO persona(
        nombrecompleto,email_usuario,contraseña,municipioid,rolid,status)
        VALUES(?,?,?,?,?,?)";

        $arrData = array(
        $this->strNombre,
        $this->strEmail,
        $this->strPassword,

        $this->intMunicipio,

        $this->intTipoId,

        $this->intStatus,
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

