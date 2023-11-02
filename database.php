<?php

    class database 
    {
        public $server = 'localhost';
        public $user = 'hjalum89_maxi';
        public $pass = 'HjAluminio123';
        public $bdn = 'hjalum89_Maxi';
        public $conn;
        
        public function __construct()
        {
            try{
            $this->conn = new PDO('mysql:host='.$this->server.'; dbname='.$this->bdn, $this->user, $this->pass);
            } catch(PDOException $e){
                echo "Error $e";
            }
        }
    }

?>