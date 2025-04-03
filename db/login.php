<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
include_once("databases.php");
include_once("utenti.php");


$name = $_POST['username'];
$pass = $_POST['password'];
$obj = new utenti();
$records = $obj->fetchRecord(array("username" => $name, 'password' => $pass));

if (!$records) {
    $_SESSION['errore_login'] = true;
    header('Location: ../index.php');
    exit;
} else {
    $_SESSION["nome_usr"] = $records['nome'];
    $_SESSION["cognome_usr"] = $records['cognome'];
    $_SESSION["centri_id"] = $records["centri_id"];
    $_SESSION["username"] = $records["username"];
    $_SESSION['regionale'] = $records['regionale'];

    // Preleva il secret OTP dal database (se presente)
    $otpSecret = $obj->fetchOTP($name);

    if (empty($otpSecret)) {
        // Genera un nuovo secret OTP
        $g = new GoogleAuthenticator();
        $secret = $g->generateSecret();

        // Salva il nuovo secret nel database
        $_SESSION['otp_secret'] = $secret;
        $saveSuccess = $obj->saveSecret($name, $secret);

        // Reindirizza alla pagina di generazione del QR Code
        header('Location: qrcode.php');
        exit;
    } else {
        $_SESSION['otp_secret'] = $otpSecret;
        header('Location: otp.php');
        exit();
        
    }
}

exit();

?>
