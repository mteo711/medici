<?php
session_start();
include_once("databases.php");
include_once("fumo_attivo.php");
require_once("loadtab_madre.php");
require_once("loadmenu_sids.php");
include_once("log_activities.php");

if($_POST && array_key_exists("action", $_POST)){
  switch($_POST['action'])
   {
	  case "succ":
		invia('succ');
	  break;
	  case "succ_b":
	    invia('succ_b');
	  break;
	  case "back":
		back();
	  break;
   }
}

function invia($j){
echo "inizio";
$insert_data = array();
$insert_data["madre_schede_id"] = $_SESSION['case_id'];

if((isset($_POST['prima'])) && (!empty($_POST['prima']))){
    $insert_data["prima_del_concepimento"] = $_POST['prima'];
}
else {
}
if($_POST['prima']== 'Y' && (isset($_POST['etaSigAtt1'])) && (!empty($_POST['etaSigAtt1'])) && (ctype_digit($_POST['etaSigAtt1']))){
    $insert_data["da_anni"] = $_POST['etaSigAtt1'];
}
else {
}
if($_POST['prima']== 'Y' && (isset($_POST['numSigDieAtt1'])) && (!empty($_POST['numSigDieAtt1'])) && (ctype_digit($_POST['numSigDieAtt1']))){
    $insert_data["num_sigarette_per_giornoA"] = $_POST['numSigDieAtt1'];
}
else {
}
if((isset($_POST['durante'])) && (!empty($_POST['durante']))){
    $insert_data["durante_gravidanza"] = $_POST['durante'];
}
else {
}
if($_POST['durante']== 'Y' && (isset($_POST['etaSigAtt2'])) && (!empty($_POST['etaSigAtt2'])) && (ctype_digit($_POST['etaSigAtt2']))){
    $insert_data["fino_a_settimana"] = $_POST['etaSigAtt2'];
}
else {
}
if($_POST['durante']== 'Y' && (isset($_POST['numSigDieAtt2'])) && (!empty($_POST['numSigDieAtt2'])) && (ctype_digit($_POST['numSigDieAtt2']))){
    $insert_data["num_sigarette_per_giornoB"] = $_POST['numSigDieAtt2'];
}
else {
}
if((isset($_POST['dopo'])) && (!empty($_POST['dopo']))){
    $insert_data["post_parto"] = $_POST['dopo'];
}
else {
}
if($_POST['dopo']== 'Y' && (isset($_POST['etaSigAtt3'])) && (!empty($_POST['etaSigAtt3'])) && (ctype_digit($_POST['etaSigAtt3']))){
    $insert_data["fino_a_eta_bambini_in_giorni"] = $_POST['etaSigAtt3'];
}
else {
}
if($_POST['dopo']== 'Y' && (isset($_POST['numSigDieAtt3'])) && (!empty($_POST['numSigDieAtt3'])) && (ctype_digit($_POST['numSigDieAtt3']))){
    $insert_data["num_sigarette_per_giornoC"] = $_POST['numSigDieAtt3'];
}
else {
}

if((isset($_POST['elettronica'])) && (!empty($_POST['elettronica']))){
    $insert_data["sigaretta_elettronica"] = $_POST['elettronica'];
}
else {
}
if($_POST['elettronica']== 'Y' && (isset($_POST['specElettronica'])) && (!empty($_POST['specElettronica']))){
    $insert_data["spec_sigaretta_elettronica"] = $_POST['specElettronica'];
}
else {
}

echo "qui";

if($_SESSION["fumo_attivo"] != "Y"){
	echo "insert";
    //creo la connessione con il database
    
    $objj = new fumo_attivo();
    // a questo punto posso effettuare la seguente insert
    $objj->insert($insert_data);
    echo "DATI_PERS: ";
    var_dump($insert_data);
    $objj->error();
    
    //log
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = "Inserimento";
    $insert_log["operazione"] = "Inserimento tab fumo attivo MADRE";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    
//    require_once("../comuni/loadtab_madre.php");
    tab_madre();
    loadmenu_sids();
    if($j == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=sids&tab=30");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=sids&tab=7");
    }
    $_SESSION["fumo_attivo"] = "Y";
}
else {
	echo "update";
    $obj = new fumo_attivo();
    $condition= array("madre_schede_id" => $_SESSION['case_id']);
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
    $insert_log["operazione"] = $scritta." tab fumo attivo MADRE";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
//    require_once("../comuni/loadtab_madre.php");
    tab_madre();
    loadmenu_sids();
    if($j == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=sids&tab=30");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=sids&tab=7");
    }
}
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=sids&tab=2");
}					       
?>