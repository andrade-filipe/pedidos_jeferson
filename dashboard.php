<?php
    include_once("application/templates/header.php");
    include_once("application/models/OrderModel.php");
    include_once("core/entitys/Order.php");
    include_once("core/entitys/Status.php");
    include_once("core/repositorys/OrderRepository.php");
    include_once("core/repositorys/StatusRepository.php");

    $orderRepository = new OrderRepository($connection);
    $statusRepository = new StatusRepository($connection);

    $orders = $orderRepository->fetchOrders();

    $newOrders = [];
    $processingOrders = [];
    $postedOrders = [];

    foreach($orders as $order){
        $status = $statusRepository -> findByOrderId($order["id"]);
        $strStatus = $status["status"];

        $orderObj = new Order();
        $orderObj -> arrayToObject($order);

        if($strStatus == "novo"){
            $model = new OrderModel();
            $model -> buildOrderModel($orderObj,$strStatus);
            $newOrders[] = $model;
        } else if ($strStatus  == "processamento"){
            $model = new OrderModel();
            $model -> buildOrderModel($orderObj, $strStatus);
            $processingOrders[] = $model;
        } else if ($strStatus  == "postado"){
            $model = new OrderModel();
            $model -> buildOrderModel($orderObj, $strStatus);
            $postedOrders[] = $model;
        }
    }
?>
    <div class="container">
        <div class="row text-center">
            <div class="dashboard-section new-section col d-flex justify-content-center align-items-center">
                <h2>Novos</h2>
                <?php foreach($newOrders as $order): ?>
                    <p><?= $order -> getName() ?></p>
                <?php endforeach; ?>
            </div>
            <div class="dashboard-section processing-section col d-flex justify-content-center align-items-center">
                <h2>Processamento</h2>
                <?php foreach($processingOrders as $order): ?>
                    <h1><?= $order -> getName() ?></h1>
                <?php endforeach; ?>
            </div>
            <div class="dashboard-section posted-section col d-flex justify-content-center align-items-center">
                <h2>Postados</h2>
                <?php foreach($postedOrders as $order): ?>
                    <h1><?= $order -> getName() ?></h1>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php
    include_once("application/templates/close.php");
?>