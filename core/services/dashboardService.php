<?php

use PHPMailer\PHPMailer\PHPMailer;

include_once("../../infrastructure/global.php");
include_once("../../infrastructure/database.php");
include_once("../../infrastructure/Message.php");
include_once("../repositorys/OrderRepository.php");
require_once("../../infrastructure/mail.php");

$orderRepository = new OrderRepository($db_connection);

if (!empty($_POST["cancel"])) {
    cancelProcess($_POST["cancel"], $_POST["email"], $orderRepository, $mail, $message);
} else if (!empty($_POST["accept"])) {
    acceptProcess($_POST["accept"], $_POST["email"], $orderRepository, $mail, $message);
} else if (!empty($_POST["post"])) {
    postProcess($_POST["post"], $_POST["email"], $orderRepository, $mail, $message);
} else if (!empty($_POST["delete"])) {
    deleteProcess($_POST["delete"], $orderRepository, $message);
} else if (!empty($_POST["back"])) {
    backProcess($_POST["back"], $orderRepository, $message);
} else {
    $message->setMessage("Processo não identificado", "error");
}

function cancelProcess(
    $orderId, $orderEmail,
    OrderRepository $orderRepository,
    PHPMailer $mail,
    Message $message) {
    try {
        $mail->setFrom($mail->Username, 'Filipe Andrade');
        // Define o destinatário
        $mail->addAddress($orderEmail, 'Destinatário');
        // Conteúdo da mensagem
        $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
        $mail->Subject = 'Seu Pedido Foi Cancelado';
        $mail->Body    = 'Este é o corpo da mensagem <b>Olá em negrito!</b>';
        $mail->AltBody = 'Este é o corpo da mensagem para clientes de e-mail que não reconhecem HTML';
        // Enviar
        $mail->send();

        $orderRepository->deleteOrder($orderId);
    } catch (Exception $e) {
        $message->setMessage("Erro no envio de email", "error");
    }

    header("Location: " . "../../dashboard.php");
}

function acceptProcess(
    $orderId, $orderEmail,
    OrderRepository $orderRepository,
    PHPMailer $mail,
    Message $message) {
    try {
        $mail->setFrom($mail->Username, 'Filipe Andrade');
        // Define o destinatário
        $mail->addAddress($orderEmail, 'Destinatário');
        // Conteúdo da mensagem
        $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
        $mail->Subject = 'Seu Pedido Foi Aprovado';
        $mail->Body    = 'Este é o corpo da mensagem <b>Olá em negrito!</b>';
        $mail->AltBody = 'Este é o corpo da mensagem para clientes de e-mail que não reconhecem HTML';
        // Enviar
        $mail->send();

        $orderRepository->updateOrderStatus($orderId, "processamento");
    } catch (Exception $e) {
        $message->setMessage("Erro no envio de email", "error");
    }

    header("Location: " . "../../dashboard.php");
}

function postProcess(
    $orderId, $orderEmail,
    OrderRepository $orderRepository,
    PHPMailer $mail,
    Message $message) {
    try {
        $mail->setFrom($mail->Username, 'Filipe Andrade');
        // Define o destinatário
        $mail->addAddress($orderEmail, 'Destinatário');
        // Conteúdo da mensagem
        $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
        $mail->Subject = 'Seu Pedido Foi Postado';
        $mail->Body    = 'Este é o corpo da mensagem <b>Olá em negrito!</b>';
        $mail->AltBody = 'Este é o corpo da mensagem para clientes de e-mail que não reconhecem HTML';
        // Enviar
        $mail->send();

        $orderRepository->updateOrderStatus($orderId, "postado");
    } catch (Exception $e) {
        $message->setMessage("Erro no envio de email", "error");
    }

    header("Location: " . "../../dashboard.php");
}

function deleteProcess($orderId, OrderRepository $orderRepository)
{
    $orderRepository->deleteOrder($orderId);
    header("Location: " . "../../dashboard.php");
}

function backProcess($orderId, OrderRepository $orderRepository)
{
    $orderRepository->updateOrderStatus($orderId, "processamento");
    header("Location: " . "../../dashboard.php");
}
