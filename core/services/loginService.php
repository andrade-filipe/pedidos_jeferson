<?php
    include_once("../../infrastructure/global.php");
    include_once("../../infrastructure/database.php");
    include_once("../../infrastructure/Message.php");
    include_once("../repositorys/UserRepository.php");

    $message = new Message();

    $userRepository = new UserRepository($db_connection);

    $type = filter_input(INPUT_POST, "type");

    if($type === "login"){
        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");

        if($userRepository -> authenticateUser($email, $password)){
            header("Location: " . "../../dashboard.php");
        } else {
            $message -> setMessage("Email ou Senha Incorretos", "error");
        }
    }else {
        $message -> setMessage("Informações Inválidas", "error");
    }
