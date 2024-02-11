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
            $this -> setId($order -> getId());
            $this -> setName($order -> getName());
            $this -> setEmail($order -> getEmail());
            $this -> setDate($order -> getDate());
            $this -> setCategory($order -> getCategory());
            $this -> setContent($order -> getContent());
            $this -> setStatus($status);

            return $this;
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