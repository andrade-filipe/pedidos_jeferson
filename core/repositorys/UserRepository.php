<?php
    include_once("../entitys/User.php");
    include_once("../../infrastructure/Message.php");

    class UserRepository implements UserDAO {
        private $connection;
        private $message;

        public function __construct(PDO $connection){
            $this -> connection = $connection;
            $this -> message = new Message();
        }

        public function createUser(User $user){}
        public function updateUser(User $user){}

        public function findById($id){}
        public function findByEmail($email){}
        public function findByToken($token){}

        public function authenticateUser($email, $password){
            return true;
        }

        public function verifyToken($protected = false){}
        public function setTokenToSession($token, $redirect = true){}
        public function destroyToken(){}
        public function changePassword(User $user){}
    }