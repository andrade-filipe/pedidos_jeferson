<?php
    include_once("application/templates/header.php");
    include_once("core/repositorys/OrderRepository.php");
    include_once("core/repositorys/StatusRepository.php");

    $orderRepository = new OrderRepository($connection);
    $statusRepository = new StatusRepository($connection);

    $orders = $orderRepository -> fetchOrders();
?>
<div class="container ">
    <div class="row text-center">
        <div class="dashboard-section new-section | col d-flex justify-content-center align-items-center">
            <h2>Novos</h2>
        </div>
        <div class="dashboard-section processing-section | col d-flex justify-content-center align-items-center">
            <h2>Processamento</h2>
        </div>
        <div class="dashboard-section posted-section | col d-flex justify-content-center align-items-center">
            <h2>Postados</h2>
        </div>
    </div>
</div>
<?php
    include_once("application/templates/close.php");
?>