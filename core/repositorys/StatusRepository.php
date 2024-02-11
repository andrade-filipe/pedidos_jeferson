<?php
    include_once("../entitys/Status.php");
    include_once("../../infrastructure/Message.php");

    class StatusRepository implements StatusDAO {
        private $connection;
        private $url;
        private $message;

        public function __construct(PDO $connection, $url){
            $this -> connection = $connection;
            $this -> url = $url;
            $this -> message = new Message($url);
        }

        public function findByOrderId($orderId){}
    }