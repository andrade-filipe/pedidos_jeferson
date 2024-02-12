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
        public function findByEmail($email){
            if($email != ""){
                $stmt = $this -> connection -> prepare("SELECT * FROM users WHERE email = :email");

                $stmt -> bindParam(":email", $email);

                $stmt -> execute();

                if($stmt -> rowCount() > 0){

                    $data = $stmt -> fetch();
                    $user = new User();
                    $user -> arrayToUser($data);

                    return $user;

                }else {
                    return false;
                }
            } else {
                return false;
            }
        }
        public function findByToken($token){}

        public function authenticateUser($email, $password){
            $user = $this -> findByEmail($email);
        }

        public function verifyToken($protected = false){}
        public function setTokenToSession($token, $redirect = true){}
        public function destroyToken(){}
        public function changePassword(User $user){}
    }