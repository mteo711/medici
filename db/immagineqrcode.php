<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use BaconQrCode\Writer;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;

if (!isset($_SESSION['otp_secret']) || !isset($_SESSION['username'])) {
    die("Errore: informazioni OTP mancanti.");
}

$secret = $_SESSION['otp_secret'];
$username = $_SESSION['username'];

$otpauthUrl = 'otpauth://totp/' . $username . '?secret=' . $secret . '&issuer=Medici';

// Genera il QR code
$renderer = new ImageRenderer(
    new RendererStyle(200),
    new SvgImageBackEnd()
);
$writer = new Writer($renderer);

header('Content-Type: image/svg+xml'); // Imposta il tipo di contenuto come immagine
echo $writer->writeString($otpauthUrl);
exit();
