<?php
include_once("../../infrastructure/global.php");
include_once("../../infrastructure/database.php");
include_once("../../infrastructure/Message.php");
include_once("../repositorys/OrderRepository.php");
include_once("../entitys/Mail.php");
require_once("../../infrastructure/mail.php");

$message = new Message();

$orderRepository = new OrderRepository($db_connection);

if ($_POST["cancel"]) {
    cancelProcess($_POST["cancel"], $orderRepository, $mail);
} else if ($_POST["accept"]) {
    acceptProcess($_POST["accept"], $orderRepository, $mail);
} else if ($_POST["post"]) {
    postProcess($_POST["post"], $orderRepository, $mail);
} else if ($_POST["delete"]) {
    deleteProcess($_POST["delete"], $orderRepository);
} else if ($_POST["back"]) {
    backProcess($_POST["back"], $orderRepository);
} else {
    $message->setMessage("Processo não identificado", "error");
}

function cancelProcess($orderId, OrderRepository $orderRepository, $mail){
    $orderRepository->deleteOrder($orderId);
    $order = $orderRepository -> findById($orderId);
    $to = $order -> getEmail();

    // Define o remetente
    $mail->setFrom('dev.filipeandrade@gmail.com', 'Filipe Andrade');
    // Define o destinatário
    $mail->addAddress($to, 'Destinatário');
    // Conteúdo da mensagem
    $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
    $mail->Subject = 'Seu Pedido Foi Cancelado';
    $mail->Body    = 'Este é o corpo da mensagem <b>Olá em negrito!</b>';
    $mail->AltBody = 'Este é o corpo da mensagem para clientes de e-mail que não reconhecem HTML';
    // Enviar
    $mail->send();

    header("Location: " . "../../dashboard.php");
}

function acceptProcess($orderId, OrderRepository $orderRepository, $mail){
    $orderRepository->updateOrderStatus($orderId, "processamento");
    $order = $orderRepository -> findById($orderId);

    $to = $order -> getEmail();

    // Define o remetente
    $mail->setFrom('dev.filipeandrade@gmail.com', 'Filipe Andrade');
    // Define o destinatário
    $mail->addAddress($to, 'Destinatário');
    // Conteúdo da mensagem
    $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
    $mail->Subject = 'Seu Pedido Foi Aprovado';
    $mail->Body    = 'Este é o corpo da mensagem <b>Olá em negrito!</b>';
    $mail->AltBody = 'Este é o corpo da mensagem para clientes de e-mail que não reconhecem HTML';
    // Enviar
    $mail->send();

    header("Location: " . "../../dashboard.php");
}

function postProcess($orderId, OrderRepository $orderRepository, $mail){
    $orderRepository->updateOrderStatus($orderId, "postado");
    $order = $orderRepository -> findById($orderId);
    $to = $order -> getEmail();

    // Define o remetente
    $mail->setFrom('dev.filipeandrade@gmail.com', 'Filipe Andrade');
    // Define o destinatário
    $mail->addAddress($to, 'Destinatário');
    // Conteúdo da mensagem
    $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
    $mail->Subject = 'Seu Pedido Foi Postado';
    $mail->Body    = 'Este é o corpo da mensagem <b>Olá em negrito!</b>';
    $mail->AltBody = 'Este é o corpo da mensagem para clientes de e-mail que não reconhecem HTML';
    // Enviar
    $mail->send();

    header("Location: " . "../../dashboard.php");
}

function deleteProcess($orderId, OrderRepository $orderRepository){
    $orderRepository->deleteOrder($orderId);
    header("Location: " . "../../dashboard.php");
}

function backProcess($orderId, OrderRepository $orderRepository){
    $orderRepository->updateOrderStatus($orderId, "processamento");
    header("Location: " . "../../dashboard.php");
}
