<?php
    class OrderModel {
        public $id;
        public $name;
        public $email;
        public $date;
        public $category;
        public $content;
        public $status;

        public function buildOrderModel(Order $order, $status){
            $model = new OrderModel();

            $model -> setId($order -> getId());
            $model -> setName($order -> getName());
            $model -> setEmail($order -> getEmail());
            $model -> setDate($order -> getDate());
            $model -> setCategory($order -> getCategory());
            $model -> setContent($order -> getContent());
            $model -> setStatus($status);

            return $model;
        }

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

        public function getDate(){
            return $this -> date;
        }

        public function setDate($date){
            $this -> date = $date;
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

        public function getStatus(){
            return $this -> status;
        }

        public function setStatus($status){
            $this -> status = $status;
        }
    }