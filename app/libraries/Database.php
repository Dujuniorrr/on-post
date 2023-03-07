<?php

    class Database{

        private $dsn = "pgsql:host=localhost;port=5432;dbname=ON_POST";
        private $user = "postgres";
        private $password = "12345678";
        private PDO $conn;
        
        public function __construct(){
            $options = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];

            try {
                $this->conn = new PDO($this->dsn, $this->user, $this->password);
            } catch (PDOException $e) {
               print 'ERROR!' . $e->getMessage() . "</br>";
            }
          
        }
    }

?>