<?php
    include_once("../../infrastructure/global.php");
    include_once("../../infrastructure/database.php");
    include_once("../../infrastructure/Message.php");
    include_once("../repositorys/UserRepository.php");

    $message = new Message($BASE_URL);

    $userRepository = new UserRepository($db_connection, $BASE_URL);

    $type = filter_input(INPUT_POST, "type");

    if($type === "order"){
        $name = filter_input(INPUT_POST, "name");
        $email = filter_input(INPUT_POST, "email");
        $categories = $_POST["categories"];
        $content = filter_input(INPUT_POST, "content");
        $date = filter_input(INPUT_POST, "date");
    }

    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    print_r($categories);
    echo "<br>";
    echo $content;
    echo "<br>";
    echo $date;
?>