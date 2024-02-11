<?php
    include_once("../../infrastructure/global.php");
    include_once("../../infrastructure/database.php");
    include_once("../../infrastructure/Message.php");
    include_once("../repositorys/OrderRepository.php");

    $message = new Message();

    $orderRepository = new OrderRepository($db_connection);

    $order = new Order();

    $type = filter_input(INPUT_POST, "type");

    if($type === "order"){
        $name = filter_input(INPUT_POST, "name");
        $email = filter_input(INPUT_POST, "email");
        $category = filter_input(INPUT_POST, "category");
        $content = filter_input(INPUT_POST, "content");
        $date = filter_input(INPUT_POST, "date");

        if($order -> verifyCategory($category)){
            $order -> setName($name);
            $order -> setEmail($email);
            $order -> setCategory($category);
            $order -> setContent($content);
            $order -> setDate($date);

            $orderRepository -> createOrder($order);
        } else {
            $message -> setMessage("Escolha pelomenos uma categoria", "error");
        }
    }