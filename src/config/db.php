<?php
    class db{
        private $host = 'localhost';
        private $user = 'root';
        private $pass = '';
        private $name = 'api-fer';

        public function connect(){
            $str = "mysql:host=$this->host;dbname=$this->name";
            $connection = new PDO($str, $this->user, $this->pass);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        }
    }
?>