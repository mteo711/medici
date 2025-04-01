<!DOCTYPE html>
<html >
<?php
session_start();
require_once("db/utils.php");
checksession();
checkconnection();

if(isset($_GET['messaggio']))
    $messaggio = $_GET['messaggio'];
else
    $messaggio = '';
    
if(isset($_GET['menu']))
    $menu = $_GET['menu'];
else
    $menu = 'home';
if(isset($_GET['usr']))
    $usr = $_GET['usr'];

?>
<SCRIPT LANGUAGE="JavaScript">
function HeureCheckEJS()
  {
  krucial = new Date;
  heure = krucial.getHours();
  min = krucial.getMinutes();
  sec = krucial.getSeconds();
  jour = krucial.getDate();
  mois = krucial.getMonth()+1;
  annee = krucial.getFullYear();
  if (sec < 10)
    sec0 = "0";
  else
    sec0 = "";
  if (min < 10)
    min0 = "0";
  else
    min0 = "";
  if (heure < 10)
    heure0 = "0";
  else
    heure0 = "";
  DinaHeure = heure0 + heure + ":" + min0 + min + ":" + sec0 + sec;
  which = DinaHeure
  if (document.getElementById){
    document.getElementById("ora").innerHTML=which;
  }
  setTimeout("HeureCheckEJS()", 1000)
  }
window.onload = HeureCheckEJS;
</SCRIPT>
<head>
    <meta charset="UTF-8">
    <title>Schede di raccolta dei dati anamnestici</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
<nav>
    <div class="scheda">
        <?php
            require_once("db/utils.php");
            getRegione();
        ?>
        <button class="home" onclick="location.href='index_reg.php'">Home</button>
        <button class="logout" onclick="location.href='db/logout.php'">Logout</button>
        <p>Utente: <?php echo $_SESSION["nome_usr"]." ".$_SESSION["cognome_usr"]?></p>
        <p>Centro: <?php echo $_SESSION["regione"]?></p>
        <p><?php echo "" . date("d-m-Y"). " - "; ?> <span id="ora"></span></p>
    </div>
    <div>
      <button class="menu" onclick="location.href='index_reg.php?menu=crea'">Crea Scheda</button>
      <button class="menu" onclick="location.href='index_reg.php?menu=concluse'">Schede Concluse</button>
      <button class="menu" onclick="location.href='index_reg.php?menu=aperte'">Schede Aperte</button>
      <button class="menu" onclick="location.href='index_reg.php?menu=profilo_reg'">Profilo</button>
    </div>
 </nav>

<section id="index">
    <?php
    if($messaggio == "errore"){
        echo "<div class='diverror'>Errore nell'invio della scheda. Assicurarsi che tutti i campi obbligatori siano stati inseriti.</div>";
    }
    else if($messaggio == "ok"){
        echo "<div class='divok'>La scheda è stata inviata correttamente al centro nazionale.</div>";
    }
    if($messaggio == "nodelete"){
        echo "<div class='diverror'>Non puoi cancellare la scheda perchè non sei il creatore oppure si sono riscontrati degli errori durante la cancellazione.</div>";
    }
    else if($messaggio == "okdelete"){
        echo "<div class='divok'>La scheda è stata cancellata correttamente dalla banca dati.</div>";
    }
    else{
        
    }
    include_once ('schede/scheda_'.$menu.'.php');
    ?>
</section>



</body>
</html>
