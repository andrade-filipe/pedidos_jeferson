<?php
    class Status {
        private $id;
        private $status;
        private $orderId;

        public function getId(){
            return $this -> id;
        }

        public function setId($id){
            $this -> id = $id;
        }

        public function getStatus(){
            return $this -> status;
        }

        public function setStatus($status){
            $this -> status = $status;
        }

        public function getOrderId(){
            return $this -> orderId;
        }

        public function setOrderId($orderId){
            $this -> orderId = $orderId;
        }
    }

    enum Status {
        case Novo;
        case Processamento;
        case Postado;
    }

    interface StatusDAO {
        public function findByOrderId($orderId);
    }