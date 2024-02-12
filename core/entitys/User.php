<?php
class User
{
    private $id;
    private $email;
    private $password;
    private $token;

    public function buildUser($email, $password, $token)
    {
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setToken($token);
    }

    public function arrayToUser($data)
    {
        $this->setId($data["id"]);
        $this->setEmail($data["email"]);
        $this->setPassword($data["password"]);
        $this->setToken($data["token"]);

        return $this;
    }

    public function generateToken()
    {
        return bin2hex(random_bytes(50));
    }

    public function generatePassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function setTokenToSession($token)
    {
        $_SESSION["token"] = $token;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
        $this->setTokenToSession($token);
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}

interface UserDAO
{   public function updateUserToken($userId, $token);
    public function findByEmail($email);
    public function findByToken($token);

    public function authenticateUser($email, $password);

    public function verifyToken();
    public function destroyToken();
}
