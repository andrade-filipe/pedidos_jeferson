<?php
class Order
{
    private $id;
    private $name;
    private $email;
    private $date;
    private $category;
    private $content;
    private $status;

    public function verifyCategory($category)
    {
        if ($category != "") {
            return true;
        }
        return false;
    }

    public function buildOrder($name, $email, $category, $content, $date)
    {
        $this->setName($name);
        $this->setEmail($email);
        $this->setCategory($category);
        $this->setContent($content);
        $this->setDate($date);
        $this->setStatus("novo");

        return $this;
    }

    public function arrayToObject($orderArr)
    {
        $this->setId($orderArr["id"]);
        $this->setName($orderArr["name"]);
        $this->setEmail($orderArr["email"]);
        $this->setDate($orderArr["order_date"]);
        $this->setCategory($orderArr["category"]);
        $this->setContent($orderArr["content"]);
        $this->setStatus($orderArr["status"]);

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }


    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}

interface OrderDAO
{
    public function createOrder(Order $order);
    public function updateOrderStatus($orderId, $status);
    public function deleteOrder($orderId);

    public function findById($id);
    public function findByEmail($email);

    public function fetchOrders();
}
