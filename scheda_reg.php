<!DOCTYPE html>
<html >
<?php
  session_start();
  require_once("db/utils.php");
  checksession();
  checkconnection();
    
  if(isset($_GET['scheda']))
    $scheda = $_GET['scheda'];
  else
    $scheda = 'madre';
  if(isset($_GET['tab']))
    $tab = $_GET['tab'];
  else
    $tab = '1';
  if(isset($_GET['tipo']))
    $tipo = $_GET['tipo'];
  else
    $tipo = 'none';
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
  <div class="tab" scroll="no">
    <?php
      include_once ('tab/'.$tipo.'/tab_'.$tipo.'_'.$scheda.'.php');
    ?>
   </div>  
   <nav>
    <div class="scheda">
      <button class="home" onclick="location.href='index_reg.php'">Home</button>
      <button class="logout" onclick="location.href='db/logout.php'">Logout</button>
      <p><?php echo 'ID: '. $_SESSION["id_caso"] ?></p>
      <p>Utente: <?php echo $_SESSION["nome_usr"]." ".$_SESSION["cognome_usr"]?></p>
      <p>Centro: <?php echo $_SESSION["regione"]?></p>
      <p><?php echo "" . date("d-m-Y"). " - "; ?> <span id="ora"></span></p>
    </div>
    
    <div>
      <?php
        include_once ('menu/menu_'.$tipo.'.php');
      ?>
    </div>
    
  </nav>

  <section >
    <?php
      include_once ('schede/'.$tipo.'/scheda_'.$scheda.'_'.$tipo.'_'.$tab.'.php');
    ?>
  </section>
    
    
    
  </body>
</html>
