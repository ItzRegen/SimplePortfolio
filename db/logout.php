<?php

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/classes/users.php');

$users = new Users();
$users->logout();