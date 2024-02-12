<?php
include_once(__DIR__ . '/../entitys/User.php');

class UserRepository implements UserDAO
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function updateUserToken($userId, $token)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE users SET token = :token WHERE id = :id");

            $stmt->bindParam(":id", $userId);
            $stmt->bindParam(":token", $token);

            $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function findByEmail($email)
    {
        if ($email != "") {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = :email");

            $stmt->bindParam(":email", $email);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {

                $data = $stmt->fetch();
                $user = new User();
                $user->arrayToUser($data);

                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function findByToken($token)
    {
        if ($token != "") {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE token = :token");

            $stmt->bindParam(":token", $token);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {

                $data = $stmt->fetch();
                $user = new User();
                $user->arrayToUser($data);

                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function authenticateUser($email, $password)
    {
        $user = $this->findByEmail($email);

        if ($user) {
            if ($password === $user->getPassword()) {
                $token = $user->generateToken();

                $user->setToken($token);

                $this->updateUserToken($user->getId(), $token);

                return true;
            }
        }
    }

    public function verifyToken()
    {
        if (!empty($_SESSION["token"])) {
            $token = $_SESSION["token"];
            $user = $this->findByToken($token);

            if ($user) {
                return $user;
            } else {
                header("Location: " . "../../login.php");
            }
        }
    }

    public function destroyToken()
    {
        $_SESSION["token"] = "";

        header("Location: " . "../../index.php");
    }
}
