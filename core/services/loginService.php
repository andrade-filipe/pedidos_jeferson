<?php
    include_once("../../infrastructure/global.php");
    include_once("../../infrastructure/database.php");
    include_once("../../infrastructure/Message.php");
    include_once("../repositorys/UserRepository.php");

    $message = new Message();

    $userRepository = new UserRepository($db_connection);

    $type = filter_input(INPUT_POST, "type");

    if($type === "login"){}
