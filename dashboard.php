<?php
    include_once("application/templates/header.php");
    include_once("core/entitys/Order.php");
    include_once("core/repositorys/OrderRepository.php");
    include_once("core/entitys/User.php");
    include_once("core/repositorys/UserRepository.php");

    $orderRepository = new OrderRepository($connection);

    $orders = $orderRepository->fetchOrders();

    $newOrders = [];
    $processingOrders = [];
    $postedOrders = [];

    foreach($orders as $order){
        $orderObj = new Order();
        $orderObj -> arrayToObject($order);

        if($orderObj -> getStatus() == "novo"){
            $newOrders[] = $orderObj;
        } else if ($orderObj -> getStatus()  == "processamento"){
            $processingOrders[] = $orderObj;
        } else if ($orderObj -> getStatus()  == "postado"){
            $postedOrders[] = $orderObj;
        }
    }

    $userRepository = new UserRepository($db_connection);
    $user = $userRepository -> verifyToken();
?>
    <div class="container">
        <form action="core/services/logout.php" class="logout d-flex justify-content-end">
            <button name="accept" type="submit" value="logout" class="btn btn-outline-secondary logout-btn">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </button>
        </form>
        <div class="row text-center">
            <div class="dashboard-section new-section col">
                <h2 class="dashboard-title">Novos</h2>
                <div class="order-card-grid">
                <?php foreach($newOrders as $order): ?>
                    <div class="order-card order-card--new">
                        <div class="order-info-container">
                            <p class="order-item"><span class="bold">Nome: <br> </span><?= $order -> getName() ?></p>
                            <p class="order-item"><span class="bold">Email: <br> </span>  <?= $order -> getEmail() ?></p>
                        </div>
                        <div class="order-info-container">
                            <p class="order-item"><span class="bold">Data: <br> </span><?= date("d/m/y", strtotime($order -> getDate())) ?></p>
                            <p class="order-item"><span class="bold">Categoria: <br> </span><?= $order -> getCategory() ?></p>
                        </div>
                        <div class="order-info-container">
                            <p class="order-item"><span class="bold">Conteúdo: <br> </span><?= $order -> getContent() ?></p>
                        </div>
                        <form action="core/services/dashboardService.php" method="POST" class="order-buttons order-info-container">
                            <button name="cancel" type="submit" value="<?= $order -> getId()?>" class="btn btn-outline-danger order-btn">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                            <button name="accept" type="submit" value="<?= $order -> getId()?>" class="btn btn-outline-success order-btn">
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
            <div class="dashboard-section processing-section col">
                <h2 class="dashboard-title">Processamento</h2>
                <div class="order-card-grid">
                <?php foreach($processingOrders as $order): ?>
                    <div class="order-card order-card--process">
                    <div class="order-info-container">
                            <p class="order-item"><span class="bold">Nome: <br> </span><?= $order -> getName() ?></p>
                            <p class="order-item"><span class="bold">Email: <br> </span>  <?= $order -> getEmail() ?></p>
                        </div>
                        <div class="order-info-container">
                            <p class="order-item"><span class="bold">Data: <br> </span><?= date("d/m/y", strtotime($order -> getDate())) ?></p>
                            <p class="order-item"><span class="bold">Categoria: <br> </span><?= $order -> getCategory() ?></p>
                        </div>
                        <div class="order-info-container">
                            <p class="order-item"><span class="bold">Conteúdo: <br> </span><?= $order -> getContent() ?></p>
                        </div>
                        <form action="core/services/dashboardService.php" method="POST" class="order-buttons order-info-container">
                            <button name="cancel" type="submit" value="<?= $order -> getId()?>" class="btn btn-outline-danger order-btn"><i class="fa-solid fa-xmark"></i></button>
                            <button name="post" type="submit" value="<?= $order -> getId()?>" class="btn btn-outline-success order-btn"><i class="fa-solid fa-arrow-right"></i></button>
                        </form>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
            <div class="dashboard-section posted-section col">
                <h2 class="dashboard-title">Postados</h2>
                <div class="order-card-grid">
                <?php foreach($postedOrders as $order): ?>
                    <div class="order-card order-card--posted">
                        <div class="order-info-container">
                            <p class="order-item"><span class="bold">Nome: <br> </span><?= $order -> getName() ?></p>
                            <p class="order-item"><span class="bold">Email: <br> </span>  <?= $order -> getEmail() ?></p>
                        </div>
                        <div class="order-info-container">
                            <p class="order-item"><span class="bold">Data: <br> </span><?= date("d/m/y", strtotime($order -> getDate())) ?></p>
                            <p class="order-item"><span class="bold">Categoria: <br> </span><?= $order -> getCategory() ?></p>
                        </div>
                        <div class="order-info-container">
                            <p class="order-item"><span class="bold">Conteúdo: <br> </span><?= $order -> getContent() ?></p>
                        </div>
                        <form action="core/services/dashboardService.php" method="POST" class="order-buttons order-info-container">
                            <button name="delete" type="submit" value="<?= $order -> getId() ?>" class="btn btn-outline-danger order-btn"><i class="fa-solid fa-trash"></i></button>
                            <button name="back" type="submit" value="<?= $order -> getId() ?>" class="btn btn-outline-warning order-btn"><i class="fa-solid fa-arrow-left"></i></button>
                        </form>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php
    include_once("application/templates/close.php");
?>