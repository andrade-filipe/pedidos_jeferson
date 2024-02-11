<?php
    include_once("../entitys/Status.php");
    include_once("../../infrastructure/Message.php");

    class StatusRepository implements StatusDAO {
        private $connection;
        private $message;

        public function __construct(PDO $connection){
            $this -> connection = $connection;
            $this -> message = new Message();
        }

        public function findByOrderId($orderId){}
    }