<?php
session_start();
include_once("databases.php");
include_once("allattamento.php");
include_once("dati_sids.php");
include_once("scheda_sids.php");
include_once("log_activities.php");
require_once("loadtab_latt.php");
require_once("loadmenu_sids.php");

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
if((isset($_POST['dataN'])) && (!empty($_POST['dataN']))){
    list($day, $month, $year) = explode("-", $_POST['dataN']);
    $ymdN = "$year-$month-$day";
    $insert_data["data_nascita"] = $ymdN;
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
if((isset($_POST['etaGest'])) && (!empty($_POST['etaGest'])) && (ctype_digit($_POST['etaGest']))){
    $insert_data["eta_gestazionale"] = $_POST['etaGest'];
}
else {
}
if((isset($_POST['etaPostNat'])) && (!empty($_POST['etaPostNat'])) && (ctype_digit($_POST['etaPostNat']))){
    $insert_data["eta_postnatale"] = $_POST['etaPostNat'];
}
else {
}
if((isset($_POST['etaPostCon'])) && (!empty($_POST['etaPostCon'])) && (ctype_digit($_POST['etaPostCon']))){
    $insert_data["eta_postconcezionale"] = $_POST['etaPostCon'];
}
else {
}
if((isset($_POST['oraD'])) && (!empty($_POST['oraD']))){
    $insert_data["ora_rilievo_decesso"] = $_POST['oraD'];
}
else {
}
if((isset($_POST['oraC'])) && (!empty($_POST['oraC']))){
    $insert_data["ora_ultimo_controllo_parentale"] = $_POST['oraC'];
}
else {
}

if((isset($_POST['oraC'])) && (!empty($_POST['oraC']))){
    $insert_data["ora_ultimo_controllo_parentale"] = $_POST['oraC'];
}
else {
}

if((isset($_POST['skin'])) && (!empty($_POST['skin']))){
    $insert_data["skin"] = $_POST['skin'];
}
else {
}

echo "qui";

if($_SESSION["dati_sids"] != "Y"){
	echo "insert";
    //creo la connessione con il database
    $obj = new dati_sids();
    // a questo punto posso effettuare la seguente insert
    
    $obj->insert($insert_data);
    var_dump($insert_data);
    $obj->error();
    
    //log
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = "Inserimento";
    $insert_log["operazione"] = "Inserimento tab dati personali SIDS";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
//    require_once("../comuni/loadtab_latt.php");
    tab_lattante();
    loadmenu_sids();
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=sids&tipo=sids&tab=8");
    $_SESSION["dati_sids"] = "Y";
}
else {
	echo "update";
    $obj = new dati_sids();
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
    $insert_log["operazione"] = $scritta." tab dati personali SIDS";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
//    require_once("../comuni/loadtab_latt.php");
    tab_lattante();
    loadmenu_sids();
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=sids&tipo=sids&tab=8");
}
}
						       
?>