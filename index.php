<?php
session_start();

$errore_login = isset($_SESSION['errore_login']) && $_SESSION['errore_login'] === true;
unset($_SESSION['errore_login']);
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
        
        <p style="color: white;">LOGIN</p>
        

        <form action="db/login.php" method="POST">        
            
            
            <input class="form-control" placeholder="Username" name="username" tabindex="1"  required>
            <input class="form-control" placeholder="Password" type="password" name="password" tabindex="2"  required>
            <button type="submit" class="btn btn-primary">Login</button><br/><br/>
            <button class="menu_att" disabled>Statistiche</button>
        </form>
        


        <div class="alert alert-primary" role="alert">
            Per poter accedere contattare gli <b>amministratori</b> della piattaforma
        </div>
        <div class="alert alert-primary" role="alert">
        L'accesso è legato ad una autenticazione a due fattori utilizzando <b>GoogleAuthenticator</b>. <br> Scarica l'applicazione sul tuo smartphone e completa i passaggi
        </div>
        
        <?php if ($errore_login): ?>
            <div class="alert alert-danger" role="alert">
                Credenziali errate! <b>Riprova</b>
            </div>
        <?php endif; ?>
    </div>      
    </div>  

    <div class="container-content">
        <section id="login">
            <img src="img/linorossi.png" alt="Logo">        
        </section>
    </div>
</body>
</html>

