<?php
    class User {
        private $id;
        private $email;
        private $password;
        private $token;

        public function buildUser($email, $password, $token){
            $this -> setEmail($email);
            $this -> setPassword($password);
            $this -> setToken($token);
        }

        public function arrayToUser($data){
            $this -> setId($data["id"]);
            $this -> setEmail($data["email"]);
            $this -> setPassword($data["password"]);
            $this -> setToken($data["token"]);

            return $this;
        }

        public function getId(){
            return $this -> id;
        }

        public function setId($id){
            $this -> id = $id;
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
        public function findByToken($token);

        public function authenticateUser($email, $password);

        public function verifyToken($protected = false);
        public function setTokenToSession($token, $redirect = true);
        public function destroyToken();
        public function changePassword(User $user);
    }