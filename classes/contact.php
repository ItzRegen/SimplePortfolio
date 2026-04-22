<?php

namespace form;

require_once('../db/config.php');

use PDO;
use PDOException;

class Contact {

    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $config = DATABASE;

        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );

        try {
            $this->conn = new PDO(
                'mysql:host=' . $config['HOST'] . ';dbname=' . $config['DBNAME'] . ';port=' . $config['PORT'],
                $config['USER_NAME'],
                $config['PASSWORD'],
                $options
            );
        } catch (PDOException $e) {
            die("Chyba pripojenia: " . $e->getMessage());
        }
    }

    public function saveMessage($meno, $email, $sprava) {

        $sql = "INSERT INTO form (name, email, message)
                VALUE ('" . $meno . "', '" . $email . "', '" . $sprava . "')";

        $statement = $this->conn->prepare($sql);

        try {
            $insert = $statement->execute();
            header("Location: http://localhost/SimplePortfolio/thank-you.php");
            http_response_code(200);
            return $insert;

        } catch (\Exception $exception) {
            return http_response_code(404);
        }
    }

    public function __destruct() {
        $this->conn = null;
    }
}