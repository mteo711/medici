<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
include_once("databases.php");
include_once("utenti.php");

use Sonata\GoogleAuthenticator\GoogleAuthenticator;

$otp = $_POST['otp'] ?? '';
$username = $_SESSION["username"] ?? '';

// Recupera il secret dalla sessione
$secret = $_SESSION['otp_secret'] ?? null; 
$g = new GoogleAuthenticator();
$isValidOtp = $g->checkCode($secret, $otp);

if ($isValidOtp) {
    // Impostazione del tipo di utente
    if ($_SESSION['regionale'] == 'Y') {
        $_SESSION["tipo_usr"] = 'reg';
        $redirectUrl = '../index_reg.php?usr=reg';
    } elseif ($_SESSION['regionale'] == 'N') {
        $_SESSION["tipo_usr"] = 'naz';
        $redirectUrl = '../index_naz.php?usr=naz';
    } else {
        $redirectUrl = '../index.php';
    }

    header("Location: $redirectUrl");
    exit();
} else {
    // OTP errato, reindirizza con un parametro per indicare l'errore
    $_SESSION['errore_otp'] = true;
    header('Location: otp.php');
    exit();
}
?>
