<?php

    class UserDAO {
        private PDO $conn;

        public function __construct()
        {
            $db = new Database();
            $this->conn = $db->connection();
        }

        public function verify_user($email, $password){
            $stmt = $this->conn->prepare("SELECT * FROM USERS WHERE email = :email");
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                $data = $stmt->fetch();
                if(password_verify($password, $data['password'])){
                    return $data;
                }
            }

            return false;
        }

        public function email_already_exists($email){
            $stmt = $this->conn->prepare("SELECT * FROM USERS WHERE email = :email");
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            if($stmt->fetch()){
                return true;
            }
            
            return false;
        }

        public function create_user(User $user){
           $stmt = $this->conn->prepare("INSERT INTO USERS(name, email, password) VALUES (:name, :email, :password)");
           $stmt->bindValue(":name", $user->getName());
           $stmt->bindValue(":email", $user->getEmail());
           $stmt->bindValue(":password", $user->getPassword());
           
           try{
                $stmt->execute();
                return true;
           }
           catch(PDOException $e){
                echo $e;
                return false;
           }
        }
    }

?>