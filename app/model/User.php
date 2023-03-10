<?php

    class User {
        private $id;
        private $name;
        private $email;
        private $password;

        public function build_user($data){
           $this->setName($data['name']);
           $this->setEmail($data['email']);
           $this->setPassword($data['password']);
           $this->setId(array_key_exists("id", $data) ? $data['id'] : '');
        }

        public function create_session(){
            $_SESSION['user_id'] = $this->getId();
            $_SESSION['user_name'] = $this->getId();
            $_SESSION['user_email'] = $this->getId();
        }

        public function destroy_session(){
           unset($_SESSION['user_id']);
           unset($_SESSION['user_name']);
           unset($_SESSION['user_email']);

           session_destroy();
        }

        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        public function getName()
        {
                return $this->name;
        }

        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        public function getEmail()
        {
                return $this->email;
        }

        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        public function getPassword()
        {
                return $this->password;
        }

        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }
    }
?>