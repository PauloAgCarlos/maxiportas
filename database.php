<?php

    class database 
    {
        public $server = 'localhost';
        public $user = 'root';
        public $pass = '';
        public $bdn = 'maxportas';
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