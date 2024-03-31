<?php

    class ArtesaniasModel extends Mysql
    {
        private $intartesano;

        private $intIdArtesania;
        private $strNombre;
        private $strDescripcion;
        private $intCodigo;
        private $intCategoriaId;
        private $intStatus;

        private $strRuta;

        private $strImagen;

        private $whereArtesano;


        public function __construct()
        {          
            parent::__construct();
        }

        public function selectArtesanias()
        {
            $whereArtesano = $_SESSION['userData']['idpersona'];
            $sql = "SELECT a.idartesania,
                           a.artesaniaartesanoid,
                           a.codigo,
                           a.nombre_artesania,
                           a.descripcion,
                           a.categoriaid,
                           c.nombre as categoria,
                           a.status      
                    FROM artesanias a
                    INNER JOIN categoria_artesanias c
                    ON a.categoriaid = c.idtipoartesania
                    INNER JOIN persona p
                    ON a.artesaniaartesanoid = p.idpersona
                    WHERE a.status != 0 AND p.idpersona = '{$whereArtesano}'";
            $request = $this->select_all($sql);
            return $request;
        }


        public function insertArtesania(int $artesano, string $nombre, string $descripcion, int $codigo, int $categoriaid, string $ruta, int $status)
        {   
            $this->intartesano = $artesano;

            $this->strNombre = $nombre;
            $this->strDescripcion = $descripcion;
            $this->intCodigo = $codigo;
            $this->intCategoriaId = $categoriaid;
            $this->strRuta = $ruta;
            $this->intStatus = $status;
            $return = 0;

            $sql = "SELECT * FROM artesanias WHERE codigo = '{$this->intCodigo}'";
            $request = $this->select_all($sql);
            if(empty($request))
            {
                $query_insert = "INSERT INTO artesanias (categoriaid,
                                                      artesaniaartesanoid,
                                                      codigo,
                                                      nombre_artesania,
                                                      descripcion,
                                                      ruta,
                                                      status)
                                                      /*SELECT p.idpersona FROM persona p INNER JOIN artesanias a ON artesaniaartesanoid = '{$this->intartesano}';*/
                                VALUES(?,?,?,?,?,?,?)";
                
                $arrData = array($this->intCategoriaId,

                                $this->intartesano,

                                 $this->intCodigo,
                                 $this->strNombre,
                                 $this->strDescripcion,
                                 $this->strRuta,
                                 $this->intStatus);
                $request_insert = $this->insert($query_insert,$arrData);
                $return = $request_insert;
            }else{
                $return = "exist";
            }
            return $return;
        }

        public function updateArtesania(int $intartesano, int $idartesania, string $nombre, string $descripcion, int $codigo, int $categoriaid, string $ruta, int $status)
        { 
            $this->intIdArtesania = $idartesania;
            $this->strNombre = $nombre;
            $this->strDescripcion = $descripcion;
            $this->intCodigo = $codigo;
            $this->intCategoriaId = $categoriaid;
            $this->strRuta = $ruta;
            $this->intStatus = $status;
            $return = 0;

            $sql = "SELECT * FROM artesanias WHERE codigo = '{$this->intCodigo}' AND idartesania != $this->intIdArtesania";
            $request = $this->select_all($sql);
            if(empty($request))
            {
                $sql = "UPDATE artesanias
                        SET categoriaid=?,
                            codigo=?,
                            nombre_artesania=?,
                            descripcion=?,
                            ruta=?,
                            status=?
                        WHERE idartesania = $this->intIdArtesania ";

                $arrData = array($this->intCategoriaId,
                                 $this->intCodigo,
                                 $this->strNombre,
                                 $this->strDescripcion,
                                 $this->strRuta,
                                 $this->intStatus);


                $request = $this->update($sql,$arrData);
                $return = $request;
            }else{
                $return = "exist";
            }
            return $return;
        }





        public function selectArtesania(int $idartesania)
        {
            $this->intIdArtesania = $idartesania;
            $sql = "SELECT a.idartesania,
                           a.codigo,
                           a.nombre_artesania,
                           a.descripcion,
                           a.categoriaid,
                           c.nombre as categoria,
                           a.status
                    
                    FROM artesanias a
                    INNER JOIN categoria_artesanias c
                    ON a.categoriaid = c.idtipoartesania
                    WHERE idartesania = $this->intIdArtesania";
            $request = $this->select($sql);
            return $request;
        }



        public function insertImage(int $idartesania, string $imagen)
        {
            $this->intIdArtesania = $idartesania;
            $this->strImagen = $imagen;
            
            $query_insert = "INSERT INTO imagen(artesaniaid,img) VALUES(?,?)";
            $arrData = array($this->intIdArtesania,
                             $this->strImagen);
            $request_insert =$this->insert($query_insert,$arrData);
            return $request_insert;
        }


        
        public function selectImages(int $idartesania)
        {
            $this->intIdArtesania = $idartesania;
            $sql = "SELECT artesaniaid,img
                    FROM imagen
                    WHERE artesaniaid = $this->intIdArtesania";
            $request = $this->select_all($sql);
            return $request;
        }


        public function deleteImage(int $idartesania, string $imagen)
        {
            $this->intIdArtesania = $idartesania;
            $this->strImagen = $imagen;
            
            $query = "DELETE FROM imagen
                      WHERE artesaniaid = $this->intIdArtesania
                      AND img = '{$this->strImagen}'";

            $request_delete = $this->delete($query);
            return $request_delete;

        }


        public function deleteArtesania(int $intIdartesania)
        {
            $this->intIdArtesania = $intIdartesania;
            $sql = "UPDATE artesanias SET status = ? WHERE idartesania = $this->intIdArtesania ";
            $arrData = array(0);
            $request = $this->update($sql,$arrData);
            return $request;

        }

        


        
    }


?>