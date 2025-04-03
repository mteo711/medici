<?php
session_start();

$errore_otp = isset($_SESSION['errore_otp']) && $_SESSION['errore_otp'] === true;
unset($_SESSION['errore_otp']);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Schede di raccolta dei dati anamnestici</title>
    <link rel="stylesheet" href="/medici_github/bootstrapProgetto/css/bootstrap-italia.min.css">
    <link rel="stylesheet" href="/medici_github/css/stileprovamaio.css">
</head>

<body style="background-color: #FF98C9;">
    <div class="barra-verticale">
        
        <p style="color: white;">Autenticazione 2FA</p>
        <form action="verifica_otp.php" method="POST">
            
            <input class="form-control" placeholder="Codice" name="otp"   required>
            <button type="submit" class="btn btn-primary">Login</button><br/><br/>
        </form>
        <div class="alert alert-primary" role="alert">
           Inserisci il <b>codice</b> a 6 cifre che appare nell'applicazione! 

        </div>
        <div class="alert alert-primary" role="alert">
           Se hai problemi di accesso, prova a <b>rigenerare</b> il qrcode cliccando il pulsante qui sotto
        </div>
        <?php if ($errore_otp): ?>
            <div class="alert alert-danger" role="alert">
                Codice Errato! <b>Riprova.</b>
            </div>
        <?php endif; ?>
        <form action="rigeneraqrcode.php" method="POST">
        <button type="submit" class="btn btn-primary">Rigenera Qrcode</button><br/><br/>
        
        
        </form>        
    </div>

    <div class="container-content">
        <section id="login">
        <img src="../img/linorossi.png" alt="Logo">
     
        </section>
    </div>
</body>
</html>
