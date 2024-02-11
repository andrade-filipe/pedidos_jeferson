<?php
    include_once("../../infrastructure/global.php");
    include_once("../../infrastructure/database.php");
    include_once("../../infrastructure/Message.php");
    include_once("../repositorys/OrderRepository.php");

    $message = new Message($BASE_URL);

    $orderRepository = new OrderRepository($db_connection, $BASE_URL);

    $order = new Order();

    $type = filter_input(INPUT_POST, "type");

    if($type === "order"){
        $name = filter_input(INPUT_POST, "name");
        $email = filter_input(INPUT_POST, "email");
        $categories = $_POST["categories"];
        $content = filter_input(INPUT_POST, "content");
        $date = filter_input(INPUT_POST, "date");

        if($order -> verifyCategories($categories)){
            $order -> setName($name);
            $order -> setEmail($email);
            $order -> setCategories($categories);
            $order -> setContent($content);
            $order -> setDate($date);
        }
    }