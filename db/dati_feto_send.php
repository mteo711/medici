<?php
session_start();
include_once("databases.php");
include_once("dati_feto.php");
require_once("loadtab_feto.php");
require_once("loadmenu_feto.php");
include_once("log_activities.php");

if($_POST && array_key_exists("action", $_POST)){
  switch($_POST['action'])
   {
	  case "succ":
		invia();
	  break;
	  case "add":
		addRecord();
	  break;
   }
}

function invia(){
echo "inizio";
$insert_data = array();
$insert_data["schede_id"] = $_SESSION['case_id'];

if((isset($_POST['cognome'])) && (!empty($_POST['cognome']))){
    $insert_data["cognome"] = $_POST['cognome'];
}
else {
}
if((isset($_POST['nome'])) && (!empty($_POST['nome']))){
    $insert_data["nome"] = $_POST['nome'];
}
else {
}
if((isset($_POST['via'])) && (!empty($_POST['via']))){
    $insert_data["via"] = $_POST['via'];
}
else {
}
if((isset($_POST['cap'])) && (ctype_digit($_POST['cap'])) && (!empty($_POST['cap'])) && (strlen($_POST['cap']) == 5)){
    $insert_data["cap"] = $_POST['cap'];
}
else {
}
if((isset($_POST['comune'])) && (!empty($_POST['comune']))){
    $insert_data["comune"] = $_POST['comune'];
}
else {
}
if((isset($_POST['prov'])) && (!empty($_POST['prov']))){
    $insert_data["provincia"] = $_POST['prov'];
}
else {
}
if((isset($_POST['sex'])) && (!empty($_POST['sex']))){
    $insert_data["sesso"] = $_POST['sex'];
}
else {
}
if((isset($_POST['dataU'])) && (!empty($_POST['dataU']))){
    list($day, $month, $year) = explode("-", $_POST['dataU']);
    $ymdU = "$year-$month-$day";
    $insert_data["data_ultimo_controllo"] = $ymdU;
}
else {
}
if((isset($_POST['dataM'])) && (!empty($_POST['dataM']))){
    list($day, $month, $year) = explode("-", $_POST['dataM']);
    $ymdM = "$year-$month-$day";
    $insert_data["data_morte"] = $ymdM;
}
else {
}


if((isset($_POST['eta'])) && (!empty($_POST['eta'])) && (ctype_digit($_POST['eta']))){
    $insert_data["eta_settimana_gestazione"] = $_POST['eta'];
}
else {
}


if((isset($_POST['mortequando'])) && (!empty($_POST['mortequando']))){
    list($day, $month, $year) = explode("-", $_POST['mortequando']);
    $ymdM = "$year-$month-$day";
    $insert_data["morte_quando"] = $ymdM;
}
else {
}

if((isset($_POST['mortedove'])) && (!empty(trim($_POST['mortedove'])))){
    $insert_data["morte_dove"] = $_POST['mortedove'];
}
else {
}

if((isset($_POST['mortecome'])) && (!empty(trim($_POST['mortecome'])))){
    $insert_data["morte_come"] = $_POST['mortecome'];
}
else {
}

  









echo "qui";




if($_SESSION["dati_feto"] != "Y"){
	echo "insert";  
    //creo la connessione con il database
    $obj = new dati_feto();
    // a questo punto posso effettuare la seguente insert
    
    $obj->insert($insert_data);
    var_dump($insert_data);
    $obj->error();
    
    
    //log
    $scritta = "";
    if (($_SESSION["stato"] == 'chiusa') || ($_SESSION["stato"] == 'chiusa_usr')){
        $scritta = "Consultazione";
    }
    else {
        $scritta = "Inserimento";
    }
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = $scritta;
    $insert_log["operazione"] = $scritta." tab dati personali feto";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    tab_feto();
    loadmenu_feto();
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=scheda&tipo=feto&tab=14");
    $_SESSION["dati_feto"] = "Y";
}
else {
	echo "update";
    $obj = new dati_feto();
    $condition= array("schede_id" => $_SESSION['case_id']);
    $obj->update($insert_data,$condition);
    var_dump($insert_data);
    $obj->error();
    
    //log
    $scritta = "";
    if (($_SESSION["stato"] == 'chiusa') || ($_SESSION["stato"] == 'chiusa_usr')){
        $scritta = "Consultazione";
    }
    else {
        $scritta = "Update";
    }
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = $scritta;
    $insert_log["operazione"] = $scritta." tab dati personali feto";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    tab_feto();
    loadmenu_feto();
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=scheda&tipo=feto&tab=14");
}
}
						       
?>