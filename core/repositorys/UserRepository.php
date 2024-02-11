<?php
    include_once("../entitys/User.php");
    include_once("../../infrastructure/Message.php");

    class UserRepository implements UserDAO {
        private $connection;
        private $url;
        private $message;

        public function __construct(PDO $connection, $url){
            $this -> connection = $connection;
            $this -> url = $url;
            $this -> message = new Message($url);
        }

        public function createUser(User $user){}
        public function updateUser(User $user){}

        public function findById($id){}
        public function findByEmail($email){}
    }