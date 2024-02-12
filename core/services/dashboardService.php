<?php
include_once("../../infrastructure/global.php");
include_once("../../infrastructure/database.php");
include_once("../../infrastructure/Message.php");
include_once("../repositorys/OrderRepository.php");

$message = new Message();

$orderRepository = new OrderRepository($db_connection);

if ($_POST["cancel"]) {
    cancelProcess($_POST["cancel"], $orderRepository);
} else if ($_POST["accept"]) {
    acceptProcess($_POST["accept"], $orderRepository);
} else if ($_POST["post"]) {
    postProcess($_POST["post"], $orderRepository);
} else if ($_POST["delete"]) {
    deleteProcess($_POST["delete"], $orderRepository);
} else if ($_POST["back"]) {
    backProcess($_POST["back"], $orderRepository);
} else {
    $message->setMessage("Processo não identificado", "error");
}

function cancelProcess($orderId, OrderRepository $orderRepository)
{
    $orderRepository->deleteOrder($orderId);
    header("Location: " . "../../dashboard.php");
    //TODO: mandar email assincrono pro cliente avisando cancelamento
}

function acceptProcess($orderId, OrderRepository $orderRepository)
{
    $orderRepository->updateOrderStatus($orderId, "processamento");
    header("Location: " . "../../dashboard.php");
    //TODO: mandar email assincrono pro cliente avisando processamento
}

function postProcess($orderId, OrderRepository $orderRepository)
{
    $orderRepository->updateOrderStatus($orderId, "postado");
    header("Location: " . "../../dashboard.php");
    //TODO: mandar email assincrono pro cliente avisando post
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
