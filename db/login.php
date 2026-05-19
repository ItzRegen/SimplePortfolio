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
    return header('Location: http://localhost/SimplePortfolio/admin/dashboard.php');
} catch (Exception $e) {
    header('Location: ../login.php?error=1');
    exit();
}