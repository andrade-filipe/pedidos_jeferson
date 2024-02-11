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

        public function createOrder(Order $order){
            $stmt = $this -> connection -> prepare("INSERT INTO orders " .
            "(name,email,order_date,category,content) " .
            "VALUES (:name, :email, :order_date, :category, :content)");

            $stmt -> bindParam(":name", $order -> getName());
            $stmt -> bindParam(":email", $order -> getEmail());
            $stmt -> bindParam(":order_date", $order -> getDate());
            $stmt -> bindParam(":category", $order -> getCategory());
            $stmt -> bindParam(":content", $order -> getContent());

            $stmt -> execute();
        }

        public function updateOrder(Order $order){}

        public function findById($id){}
        public function findByEmail($email){}
    }