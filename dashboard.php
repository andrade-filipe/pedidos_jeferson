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
        $orderObj = new Order();
        $orderObj -> arrayToObject($order);

        $status = $statusRepository -> findByOrderId($orderObj -> getId());
        $strStatus = $status["status"];

        $model = new OrderModel();
        $model -> buildOrderModel($orderObj,$strStatus);

        if($strStatus == "novo"){
            $newOrders[] = $model;
        } else if ($strStatus  == "processamento"){
            $processingOrders[] = $model;
        } else if ($strStatus  == "postado"){
            $postedOrders[] = $model;
        }
    }
?>
    <div class="container">
        <div class="row text-center">
            <div class="dashboard-section new-section col d-flex justify-content-center align-items-center">
                <h2>Novos</h2>
                <?php foreach($newOrders as $order): ?>
                <?php endforeach; ?>
            </div>
            <div class="dashboard-section processing-section col d-flex justify-content-center align-items-center">
                <h2>Processamento</h2>
                <?php foreach($processingOrders as $order): ?>
                <?php endforeach; ?>
            </div>
            <div class="dashboard-section posted-section col d-flex justify-content-center align-items-center">
                <h2>Postados</h2>
                <?php foreach($postedOrders as $order): ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php
    include_once("application/templates/close.php");
?>