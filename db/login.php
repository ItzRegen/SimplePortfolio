<?php

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/classes/users.php');

$email    = $_POST['email'];
$password = $_POST['password'];

if (empty($email) || empty($password)) {
    die('Chyba: Všetky polia sú povinné!');
}

try {
    $users = new Users();
    $users->login($email, $password);
    return header('Location: http://localhost/SimplePortfolio/dashboard.php');
} catch (Exception $e) {
    http_response_code(404);
    echo("Chyba: " . $e->getMessage());
}