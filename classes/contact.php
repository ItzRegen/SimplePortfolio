<?php

require_once('../classes/database.php');

class Contact extends Database {

    protected $connection;

    public function __construct() {
        $this->connect();
        $this->connection = $this->getConnection();
    }

    public function saveMessage($meno, $email, $sprava) {

        $sql = "INSERT INTO form (name, email, message)
                VALUE ('" . $meno . "', '" . $email . "', '" . $sprava . "')";

        $statement = $this->connection->prepare($sql);

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
        $this->connection = null;
    }
}