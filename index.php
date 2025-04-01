<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Schede di raccolta dei dati anamnestici</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body style="background-color: #FF98C9;">

<nav>
    <div class="scheda">
        <p>LOGIN</p>
        <form style="background-color: transparent; border: none; border-radius: 0px;" action="db/login.php" method="POST">
            <input placeholder="username" name="username" tabindex="1" style="width: 100%;">
            <input placeholder="password" type="password" name="password" tabindex="2" style="width: 100%;">
            <input placeholder="OTP" tabindex="3" style="width: 100%;">
            <button type="submit" class="submitbtn">Login</button><br/><br/>
            <button class="menu_att" disabled>Statistiche </button>
        </form>
    </div>
    </nav>
<section id="login" >
    <img src="img/linorossi.png" style="margin-left: 22%;">    

</section>



</body>
</html>
