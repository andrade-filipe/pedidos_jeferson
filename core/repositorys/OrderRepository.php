<?php
    include_once("../entitys/Order.php");

    class OrderRepository implements OrderDAO {
        public function createOrder(Order $order){}
        public function updateOrder(Order $order){}

        public function findById($id){}
        public function findByEmail($email){}
    }

?>