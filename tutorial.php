<!DOCTYPE html>
<html >
<?php
session_start();
require_once("db/utils.php");
checksession();
checkconnection();

?>
<head>
    <meta charset="UTF-8">
    <title>Schede di raccolta dei dati anamnestici</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/slidorion.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="js/gallery/jquery.easing.js"></script>
    <script src="js/gallery/jquery.slidorion.min.js"></script>
</head>
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
    
//$(document).ready(function(){
//	$('#slidorion').slidorion();
//});

    
$(document).ready(function(){
	$('#slidorion').slidorion({
		speed: 1000,
		interval: 10000000,
		effect: 'slideLeft'
	});
});
</SCRIPT>
<body>
<nav>
    <div class="scheda">
        
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
    <h1 align="center">Tutorial</h1>
<form>

</form>
    <br/>
    <div id="slidorion" class="slidorion">
    <div class="slider">
        <div class="slide"><img src="img/creascheda.png" style="width:100%;"/></div>
        <div class="slide"><img src="img/interfaccia.png" style="width:100%;"/></div>
        <div class="slide"><img src="img/salvare.png" style="width:100%;"/></div>
        <div class="slide"><img src="img/schedeaperte.png" style="width:100%;"/></div>
        <div class="slide"><img src="img/schedeconcluse.png" style="width:100%;"/></div>
    </div>

    <div class="accordion">
        <div class="header">Crea Scheda</div>
        <div class="content">Per creare una nuova scheda cliccare su "Crea scheda" nel menu laterale. <br/> Tutti i campi devono essere compilati. L'<b>id del caso</b> viene creato automaticamente. Il campo <b>altre informazioni utili</b> può non essere compilato. Serve a fornire ulteriori informazioni che possano aiutare chi compila la scheda al riconoscimento del caso. Per ultimo va selezionata la <b>tipologia del caso</b>. Le tipologie possibili sono <i>Scheda "Morte improvvisa infantile" (entro il 1° anno di vita) - SUID/SIDS</i> e <i>Scheda "Morte inaspettata del feto" (dopo la 25a settimana di gestazione)</i>.</div>
        <div class="header">Compilare una scheda</div>
        <div class="content">L'interfaccia di inserimento si compone di 3 parti: il <b>menu laterale</b>, il <b>tab menu</b> in cima alla scheda e la <b>scheda di inserimento</b>. Il menu laterale permette di muoversi tra le schede. I pulsanti del menu laterale hanno colori diversi. Nel caso in cui fossero di colore <b>rosso</b> significa che non sono stati inseriti tutti i campi obbligatori all'interno di quelle schede. Nel caso lo sfondo fosse <b>verde</b> tutti i campi obbligatori sono stati inseriti correttamente. Sfondo <b>blu</b> invece ci indica che siamo all'interno di quell'area. <br/> Il tab menu permette di muoversi all'interno della scheda. Anche i pulsanti del tab menu hanno colori diversi, ognuno con un significato: <b>sfondo blu e scritta bianca</b>, indica che sto compilando quella scheda (nella foto sono in Apparato Cardiovascolare); <b>sfondo bianco e scritta nera</b>, indica che non è ancora stato inserito niente all'interno di quella scheda. In questo caso il pulsante è disabilitato; <b>sfondo bianco e scritta rossa</b>, non sono stai inseriti ancora tutti i campi obbligatori; <b>sfondo bianco e scritta verde</b>, tutti i campi obbligatori sono stati inseriti. Il sistema aiuta l'utente ad inserire correttamente i dati nel formato richiesto con calendari (nel caso di date), tastierini numerici (nel caso di numeri, sia interi, sia decimali) e menu a tendina con risposte predefinite. </div>
        <div class="header">Salvare i dati</div>
        <div class="content">I dati vengono salvati automaticamente SOLO quando si clicca sui pulsanti <b>"Succ"</b> e <b>"Prec"</b>. Nel caso in cui ci si muova tramite i pulsanti del menu laterale e del tab menu tutte le modifiche non verranno salvate.</div>
        <div class="header">Schede aperte</div>
        <div class="content">In questa schermata, raggiungibile dal menu laterale <b>- Schede Aperte -</b> nella pagina home, è possibile visualizzare tutte le schede, del Centro Regionale autenticato al sistema, non ancora inviate al Centro nazionale. Da qui l'utente può accedere alla scheda per modificare i dati, può cancellare la scheda e inviare la scheda al Centro nazionale. Nel caso in cui tutti i dati obbligatori non siano stati inseriti il sistema impedisce di sottomettere la scheda.</div>
        <div class="header">Schede concluse</div>
        <div class="content">In questa schermata, raggiungibile dal menu laterale <b>- Schede Concluse -</b> nella pagina home, è possibile visualizzare tutte le schede concluse di tutti i centri regionali. Nel caso in cui la scheda che si va a visualizzare non appartiene al Centro Regionale autenticato al sistema, i dati sensibili saranno nascosti. Da questa schermata è possibile richiedere lo <b>sblocco</b> delle schede al Centro Nazionale nell'eventualità di dover fare delle modifiche a schede già inviate. Lo sblocco può essere richiesto solo per schede concluse appartenenti al Centro Regionale autenticato.</div>
    </div>
</div>
</section>



</body>
</html>
