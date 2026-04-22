<?php

require_once('../classes/contact.php');

use form\Contact;

$meno = $_POST['meno'];
$email = $_POST['email'];
$sprava = $_POST['sprava'];

if (empty($meno) || empty($email) || empty($sprava)) {
    die('Chyba: Všetky polia sú povinné!');
}

$kontakt = new Contact();
$ulozene = $kontakt->saveMessage($meno, $email, $sprava);

if ($ulozene) {
    header('Location: http://localhost/SimplePortfolio/thank-you.php');
} else {
    die('Chyba pri odosielaní správy do databázy!');
    http_response_code(404);
}