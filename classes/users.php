<?php

if (!defined('__ROOT__')) {
    define('__ROOT__', dirname(dirname(__FILE__)));
}
require_once(__ROOT__.'/classes/Database.php');

class Users extends Database {

    protected $connection;

    public function __construct() {
        $this->connect();
        $this->connection = $this->getConnection();
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $email);
        $statement->execute();
        $user = $statement->fetch();

        if (!$user) {
            throw new Exception("Požívateľ s daným menom neexistuje.");
        }
        $storedPassword = $user['password'];

        if (!password_verify($password, $storedPassword)) {
            throw new Exception("Nesprávne heslo.");
        }
        session_start();
        $_SESSION['user_id'] = $user['ID'];
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: http://localhost/SimplePortfolio/index.php');
        exit();
    }

    public function getAll() {
        $sql = "SELECT * FROM users";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function updatePassword($id, $password) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = ? WHERE ID = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $hashed);
        $statement->bindParam(2, $id);
        $statement->execute();
    }
}