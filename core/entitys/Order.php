<?php
    class Order {
        private $id;
        private $name;
        private $email;
        private $orderDate;
        private $category;
        private $content;

        public function getId(){
            return $this -> id;
        }

        public function setId($id){
            $this -> id = $id;
        }

        public function getName(){
            return $this -> name;
        }

        public function setName($name){
            $this -> name = $name;
        }

        public function getEmail(){
            return $this -> email;
        }

        public function setEmail($email){
            $this -> email = $email;
        }

        public function getOrderDate(){
            return $this -> orderDate;
        }

        public function setOrderDate($orderDate){
            $this -> orderDate = $orderDate;
        }

        public function getCategory(){
            return $this -> category;
        }

        public function setCategory($category){
            $this -> category = $category;
        }

        public function getContent(){
            return $this -> content;
        }

        public function setContent($content){
            $this -> content = $content;
        }
    }

    interface OrderDAO {
        public function createOrder(Order $order);
        public function updateOrder(Order $order);

        public function findById($id);
        public function findByEmail($email);
    }