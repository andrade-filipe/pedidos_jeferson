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
            <div class="dashboard-section new-section col">
                <h2 class="dashboard-title">Novos</h2>
                <div class="order-card-grid">
                <?php foreach($newOrders as $order): ?>
                    <div class="order-card order-card--new">
                        <p class="order-item"><?= $order -> getName() ?></p>
                        <p class="order-item"><?= $order -> getEmail() ?></p>
                        <p class="order-item"><?= $order -> getDate() ?></p>
                        <p class="order-item"><?= $order -> getCategory() ?></p>
                        <p class="order-item"><?= $order -> getContent() ?></p>
                        <p class="order-item"><?= $order -> getStatus() ?></p>
                        <div class="order-buttons">
                            <button class="btn btn-outline-danger order-btn"><i class="fa-solid fa-xmark"></i></button>
                            <button class="btn btn-outline-success order-btn"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
            <div class="dashboard-section processing-section col">
                <h2 class="dashboard-title">Processamento</h2>
                <div class="order-card-grid">
                <?php foreach($processingOrders as $order): ?>
                    <div class="order-card order-card--process">
                        <p class="order-item"><?= $order -> getName() ?></p>
                        <p class="order-item"><?= $order -> getEmail() ?></p>
                        <p class="order-item"><?= $order -> getDate() ?></p>
                        <p class="order-item"><?= $order -> getCategory() ?></p>
                        <p class="order-item"><?= $order -> getContent() ?></p>
                        <p class="order-item"><?= $order -> getStatus() ?></p>
                        <div class="order-buttons">
                            <button class="btn btn-outline-danger order-btn"><i class="fa-solid fa-xmark"></i></button>
                            <button class="btn btn-outline-success order-btn"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
            <div class="dashboard-section posted-section col">
                <h2 class="dashboard-title">Postados</h2>
                <div class="order-card-grid">
                <?php foreach($postedOrders as $order): ?>
                    <div class="order-card order-card--posted">
                        <p class="order-item"><?= $order -> getName() ?></p>
                        <p class="order-item"><?= $order -> getEmail() ?></p>
                        <p class="order-item"><?= $order -> getDate() ?></p>
                        <p class="order-item"><?= $order -> getCategory() ?></p>
                        <p class="order-item"><?= $order -> getContent() ?></p>
                        <p class="order-item"><?= $order -> getStatus() ?></p>
                        <div class="order-buttons">
                            <button class="btn btn-outline-danger order-btn"><i class="fa-solid fa-trash"></i></button>
                            <button class="btn btn-outline-warning order-btn"><i class="fa-solid fa-arrow-left"></i></button>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php
    include_once("application/templates/close.php");
?>