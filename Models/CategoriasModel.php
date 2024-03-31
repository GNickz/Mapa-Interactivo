<?php

    class CategoriasModel extends Mysql
    {
        public $intIdcategoria;
        public $strCategoria;
        public $strDescripcion;
        public $strPortada;

        public $strRuta;

        public $intStatus;

        public function __construct()
        {          
            parent::__construct();
        }

        //Creacion de metodo insertCategoria Solicitado en Categorias.php #67
        public function insertCategoria(string $nombre, string $descripcion, string $portada, string $ruta, int $status)
        {
            $return = "0";
            $this->strCategoria = $nombre;
            $this->strDescripcion = $descripcion;
            $this->strPortada = $portada;
            $this->strRuta = $ruta;
            $this->intStatus = $status;

            $sql = "SELECT * FROM categoria_artesanias WHERE nombre = '{$this->strCategoria}'";
            $request = $this->select_all($sql);

            if(empty($request))
            {
                $query_insert = "INSERT INTO categoria_artesanias(nombre,descripcion,portada,ruta,status) VALUES (?,?,?,?,?)";
                $arrData = array($this->strCategoria,
                                 $this->strDescripcion,
                                 $this->strPortada,
                                 $this->strRuta,
                                 $this->intStatus);
                $request_insert = $this->insert($query_insert,$arrData);
                $return = $request_insert;
            }else
            {
                $return = "exist";
            }
            return $return;
        }

        //Funcion para mostrar todos las categorias solicitado en Categorias.php #109
        public function selectCategorias()
        {
            //EXTRAESR LOS DATOS DE ROLES DE LA BASE DE DATOS
            $sql = "SELECT * FROM categoria_artesanias
                    WHERE status != 0";
            $request = $this->select_all($sql);
            return $request;
        }

        //Funcion selectCategoria que sirve para extraer los datos de un registro y poder mostrarlo solicitado en Categorias.php #160
        public function selectCategoria(int $idcategoria)
        {
            $this->intIdcategoria = $idcategoria;
            $sql = "SELECT * FROM categoria_artesanias
                    wHERE idtipoartesania = $this->intIdcategoria";
            $request = $this->select($sql);
            return $request;
        }

        //Creacion del metodo updateCategoria solicitado por Categorias.php #80
        public function updateCategoria(int $idcategoria, string $nombre, string $descripcion, string $portada, string $ruta, int $status){
            $this->intIdcategoria = $idcategoria;
            $this->strCategoria = $nombre;
            $this->strDescripcion = $descripcion;
            $this->strPortada = $portada;
            $this->strRuta = $ruta;
            $this->intStatus = $status;

            $sql = "SELECT * FROM categoria_artesanias WHERE nombre = '{$this->strCategoria}' AND  	idtipoartesania =! $this->intIdcategoria";
            $request = $this->select_all($sql);

            if(empty($request))
            {
                $sql = "UPDATE categoria_artesanias SET nombre = ?, descripcion = ?, portada = ?, ruta = ?, status = ?  WHERE idtipoartesania = $this->intIdcategoria";
                $arrData = array($this->strCategoria,
                                 $this->strDescripcion,
                                 $this->strPortada,
                                 $this->strRuta,
                                 $this->intStatus);
                $request = $this->update($sql,$arrData);
            }else
            {
                $request = "exist";
            }
            return $request;
        }

        //Creacion del metodo deleteCaategoria solicitado por Categorias.php #196
        public function deleteCategoria(int $idcategoria)
        {
            $this->intIdcategoria = $idcategoria;
            $sql = "SELECT * FROM artesanias WHERE categoriaid = $this->intIdcategoria ";
            $request = $this->select_all($sql);
            if(empty($request))
            {
                $sql = "UPDATE categoria_artesanias SET status = ? WHERE idtipoartesania = $this->intIdcategoria";
                $arrData = array(0);
                $request = $this->update($sql,$arrData);
                if($request)
                {
                    $request = 'ok';
                }else
                {
                    $request = 'error';
                }

            }else
            {
                $request = 'exist';
            }
            return $request;
        }









    }


?>