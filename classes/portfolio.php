<?php

if (!defined('__ROOT__')) {
    define('__ROOT__', dirname(dirname(__FILE__)));
}
require_once(__ROOT__.'/classes/database.php');

class Portfolio extends Database {

    protected $connection;

    public function __construct() {
        $this->connect();
        $this->connection = $this->getConnection();
    }

    public function getAll() {
        $sql = "SELECT * FROM portfolio";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function getById($id) {
        $sql = "SELECT * FROM portfolio WHERE ID = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        return $statement->fetch();
    }

    public function create($title, $description, $image, $url) {
        $sql = "INSERT INTO portfolio (title, description, image, url) VALUES (?, ?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $title);
        $statement->bindParam(2, $description);
        $statement->bindParam(3, $image);
        $statement->bindParam(4, $url);
        $statement->execute();
    }

    public function update($id, $title, $description, $image, $url) {
        $sql = "UPDATE portfolio SET title = ?, description = ?, image = ?, url = ? WHERE ID = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $title);
        $statement->bindParam(2, $description);
        $statement->bindParam(3, $image);
        $statement->bindParam(4, $url);
        $statement->bindParam(5, $id);
        $statement->execute();
    }

    public function delete($id) {
        $projekt = $this->getById($id);
    
        if ($projekt && $projekt['image']) {
            $imagePath = __ROOT__ . '/uploads/' . $projekt['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $sql = "DELETE FROM portfolio WHERE ID = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
    }
}