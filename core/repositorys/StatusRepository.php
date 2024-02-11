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

        public function findByOrderId($orderId){
            $stmt = $this -> connection -> prepare("SELECT status FROM status WHERE orders_id = :orders_id");

            $stmt -> bindParam(":orders_id", $orderId);

            $stmt -> execute();

            $status = $stmt -> fetch();

            return $status;
        }

        public function fetchStatus(){
            $stmt = $this -> connection -> prepare("SELECT * FROM status");

            $stmt -> execute();

            $status = $stmt -> fetchAll();

            return $status;
        }
    }