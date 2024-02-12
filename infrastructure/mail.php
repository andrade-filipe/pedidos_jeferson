<?php
    include("Message.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'path/to/PHPMailer/src/Exception.php';
    require 'path/to/PHPMailer/src/PHPMailer.php';
    require 'path/to/PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);
    $message = new Message();

    try{
        $mail->isSMTP();        //Devine o uso de SMTP no envio
        $mail->SMTPAuth = true; //Habilita a autenticação SMTP
        $mail->Username   = 'dev.filipeandrade@gmail.com';
        $mail->Password   = 'kyyf kpek gqsv oism';
        // Criptografia do envio SSL também é aceito
        $mail->SMTPSecure = 'tls';
        // Informações específicadas pelo Google
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
    } catch (Exception $e){
        $message -> setMessage("Erro no envio de Email", "error");
    }
