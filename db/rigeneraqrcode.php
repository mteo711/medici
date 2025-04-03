<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
include_once("databases.php");
include_once("utenti.php");

use Sonata\GoogleAuthenticator\GoogleAuthenticator;
use BaconQrCode\Writer;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;

// Recupera le informazioni dell'utente dalla sessione
$name = $_SESSION['username']; // username già salvato nella sessione
$obj = new utenti();
$records = $obj->fetchRecord(array("username" => $name));

// Verifica che il record dell'utente esista
if (!$records) {
    echo "<script>
        alert('Utente non trovato!');
        window.location.href = '../index.php';
    </script>";
} else {
   
    $g = new GoogleAuthenticator();
    $secret = $g->generateSecret();

    // Crea l'URL per il QR code
    $otpauthUrl = 'otpauth://totp/' . $records['username'] . '?secret=' . $secret . '&issuer=Medici';

    // Genera il QR code
    $renderer = new ImageRenderer(
        new RendererStyle(200),
        new SvgImageBackEnd()
    );
    $writer = new Writer($renderer);
    $qrCode = $writer->writeString($otpauthUrl);

    // Salva il nuovo secret nel database, sovrascrivendo qualsiasi valore esistente
    $_SESSION['otp_secret'] = $secret;
    $saveSuccess = $obj->saveSecret($name, $secret);

    // Mostra il QR code
    header('Location: qrcode.php');
}

exit();
?>
