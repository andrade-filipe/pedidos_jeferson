<?php
    include_once("../../infrastructure/Message.php");
    class Mail {
        private $SENDER = "filipeandrade.work@gmail.com";

        private $to;
        private $subject;
        private $message;
        private $headers;

        public function __construct($to, $subject, $message){
            $this -> to = $to;
            $this -> subject = $subject;
            $this -> message = $message;
            $this -> headers = "From: " . $this -> SENDER;
        }

        public function sendMail(){
            $success = mail($this -> to, $this -> subject, $this -> message, $this -> headers);

            $message = new Message();
            if($success){
                $message -> setMessage("Email enviado com sucesso", "success");
            } else {
                $message -> setMessage("Email não foi enviado", "error");
            }
        }

        public function getTo(){
            return $this -> to;
        }

        public function setTo($to){
            $this -> to = $to;
        }

        public function getSubject(){
            return $this -> subject;
        }

        public function setSubject($subject){
            $this -> subject = $subject;
        }

        public function getMessage(){
            return $this -> message;
        }

        public function setMessage($message){
            $this -> message = $message;
        }
    }