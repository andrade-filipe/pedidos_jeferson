<?php
include_once("../../infrastructure/global.php");
include_once("../../infrastructure/database.php");
include_once("../../infrastructure/Message.php");
include_once("../repositorys/OrderRepository.php");

$message = new Message();

$orderRepository = new OrderRepository($db_connection);

$type = filter_input(INPUT_POST, "type");

if ($type === "order") {
    $order = new Order();

    $name = filter_input(INPUT_POST, "name");
    $email = filter_input(INPUT_POST, "email");
    $category = filter_input(INPUT_POST, "category");
    $content = filter_input(INPUT_POST, "content");
    $date = filter_input(INPUT_POST, "date");

    if ($order->verifyCategory($category)) {
        $order->buildOrder($name, $email, $category, $content, $date);

        $orderRepository->createOrder($order);

        $message->setMessage("Ordem Criada", "success");
    } else {
        $message->setMessage("Escolha pelomenos uma categoria", "error");
    }
}
