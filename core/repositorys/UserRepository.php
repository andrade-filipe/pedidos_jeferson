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
    }