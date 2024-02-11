<?php
    include_once("../entitys/Order.php");
    include_once("../../infrastructure/Message.php");

    class OrderRepository implements OrderDAO {
        private $connection;
        private $url;
        private $message;

        public function __construct(PDO $connection, $url){
            $this -> connection = $connection;
            $this -> url = $url;
            $this -> message = new Message($url);
        }

        public function createOrder(Order $order){}
        public function updateOrder(Order $order){}

        public function findById($id){}
        public function findByEmail($email){}
    }