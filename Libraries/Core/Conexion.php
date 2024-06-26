<?php

    class Conexion{
        
        private $conect;

        public function __construct(){
            $connetionString = "mysql:hos=".DB_HOST.";dbname=".DB_NAME.";.DB_CHARSET.";
            try{
                $this->conect = new PDO($connetionString, DB_USER, DB_PASSWORD);
                $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }catch (PDOException $e){
                $this->conect = 'Error de conexion';
                echo "Error:". $e->getMessage();

            }
        }

        public function conect()
        {
            return $this->conect;
        }
        
    }

?>