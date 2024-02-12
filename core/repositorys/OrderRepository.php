<?php
include_once(__DIR__ . '/../entitys/Order.php');

class OrderRepository implements OrderDAO
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function createOrder(Order $order)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO orders " .
                "(name,email,order_date,category,content,status) " .
                "VALUES (:name, :email, :order_date, :category, :content, :status)");

            $stmt->bindParam(":name", $order->getName());
            $stmt->bindParam(":email", $order->getEmail());
            $stmt->bindParam(":order_date", $order->getDate());
            $stmt->bindParam(":category", $order->getCategory());
            $stmt->bindParam(":content", $order->getContent());
            $stmt->bindParam(":status", $order->getStatus());

            $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function updateOrderStatus($orderId, $status)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE orders SET status = :status WHERE id = :id");

            $stmt->bindParam(":id", $orderId);
            $stmt->bindParam(":status", $status);

            $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function deleteOrder($orderId)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM orders WHERE id = :id");
            $stmt->bindParam(":id", $orderId);
            $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function fetchOrders()
    {
        $stmt = $this->connection->prepare("SELECT * FROM orders ORDER BY id DESC");

        $stmt->execute();

        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $orders;
    }

    public function findById($orderId){
        if ($orderId) {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE id = :id");

            $stmt->bindParam(":id", $orderId);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {

                $data = $stmt->fetch();
                $order = new Order();
                $order->arrayToObject($data);

                return $order;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
