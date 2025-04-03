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
        <div id="qrcode-container">
    <script>
    fetch('immagineqrcode.php')
        .then(response => response.text()) 
        .then(svg => {
            document.getElementById('qrcode-container').innerHTML = svg;
        })
        .catch(error => console.error('Errore nel caricamento del QR code:', error));
</script>

    </div>
        <form action="verifica_otp.php" method="POST">
            
            
            <input class="form-control" placeholder="Codice" name="otp"   required>
            <button type="submit" class="btn btn-primary">Login</button><br/><br/>
        </form>
        <div class="alert alert-primary" role="alert">
           Inquadra il <b>qrcode</b> utilizzando l'app di <b> Google Authenticator</b> e inserisci il codice

        </div>
        <div class="alert alert-primary" role="alert">
           Se hai problemi di accesso, prova a <b>rigenerare</b> il qrcode cliccando il pulsante qui sotto
        </div>
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
