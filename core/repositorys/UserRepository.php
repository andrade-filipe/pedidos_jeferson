<?php
    include_once("../entitys/User.php");

    class UserRepository implements UserDAO {
        public function createUser(User $user){}
        public function updateUser(User $user){}

        public function findById($id){}
        public function findByEmail($email){}
    }
?>