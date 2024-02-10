<?php
    class User {
        private $id;
        private $email;
        private $password;
        private $token;

        public function getId(){
            return $this -> id;
        }

        public function getEmail(){
            return $this -> email;
        }

        public function setEmail($email){
            $this -> email = $email;
        }

        public function getToken(){
            return $this -> token;
        }

        public function setToken($token){
            $this -> token = $token;
        }

        public function getPassword(){
            return $this -> password;
        }

        public function setPassword($password){
            $this -> password = $password;
        }
    }

    interface UserDAO {
        public function createUser(User $user);
        public function updateUser(User $user);

        public function findById($id);
        public function findByEmail($email);
    }
?>