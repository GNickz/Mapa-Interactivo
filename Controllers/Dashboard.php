<?php

    class Dashboard extends Controllers{
        public function __construct()
        {   
            sessionStart();
            //session_start();
            //sessionStart();
            parent::__construct();
            
            
            session_regenerate_id(true);
            if(empty($_SESSION['login']))
            {
                header('Location: login');
            }

            getPermisos(1);

            
        }

        public function dashboard()
        {
            $this->views->getView($this,"dashboard");
        }
    }

?>