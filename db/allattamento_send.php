<?php
session_start();
include_once("databases.php");
include_once("allattamento.php");
include_once("log_activities.php");
require_once("loadtab_latt.php");
require_once("loadmenu_sids.php");


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
	  break;
   }
}

function invia($i){
$insert_data = array();
$insert_data["scheda_sids_schede_id"] = $_SESSION['case_id'];

if((isset($_POST['materno'])) && (!empty($_POST['materno']))){
	$insert_data["allattamento_materno"] = $_POST['materno'];
}
else {
}
if(($_POST['materno'] == 'Y') && (isset($_POST['matNascita'])) && (!empty($_POST['matNascita']))){
	$insert_data["allattamento_materno_nascita"] = $_POST['matNascita'];
}
else {
    $insert_data["allattamento_materno_nascita"] = 'N';
}
if(($_POST['materno'] == 'Y') && (isset($_POST['matSettDa'])) && (!empty($_POST['matSettDa']))){
	$insert_data["allattamento_materno_settD"] = $_POST['matSettDa'];
}
else {
}
if(($_POST['materno'] == 'Y') && (isset($_POST['matSettA'])) && (!empty($_POST['matSettA']))){
	$insert_data["allattamento_materno_settA"] = $_POST['matSettA'];
}
else {
}
if((isset($_POST['artificiale'])) && (!empty($_POST['artificiale']))){
	$insert_data["allattamento_artificiale"] = $_POST['artificiale'];
}
else {
}
if(($_POST['artificiale'] == 'Y') && (isset($_POST['artNascita'])) && (!empty($_POST['artNascita']))){
	$insert_data["allattamento_artificiale_nascita"] = $_POST['artNascita'];
}
else {
    $insert_data["allattamento_artificiale_nascita"] = 'N';
}
if(($_POST['artificiale'] == 'Y') && (isset($_POST['artSettDa'])) && (!empty($_POST['artSettDa']))){
	$insert_data["allattamento_artificiale_settD"] = $_POST['artSettDa'];
}
else {
}
if(($_POST['artificiale'] == 'Y') && (isset($_POST['artSettA'])) && (!empty($_POST['artSettA']))){
	$insert_data["allattamento_artificiale_settA"] = $_POST['artSettA'];
}
else {
}
if((isset($_POST['misto'])) && (!empty($_POST['misto']))){
	$insert_data["allattamento_misto"] = $_POST['misto'];
}
else {
}
if(($_POST['misto'] == 'Y') && (isset($_POST['misNascita'])) && (!empty($_POST['misNascita']))){
	$insert_data["allattamento_misto_nascita"] = $_POST['misNascita'];
}
else {
    $insert_data["allattamento_misto_nascita"] = 'N';
}
if(($_POST['misto'] == 'Y') && (isset($_POST['misSettDa'])) && (!empty($_POST['misSettDa']))){
	$insert_data["allattamento_misto_settD"] = $_POST['misSettDa'];
}
else {
}
if(($_POST['misto'] == 'Y') && (isset($_POST['misSettA'])) && (!empty($_POST['misSettA']))){
	$insert_data["allattamento_misto_settA"] = $_POST['misSettA'];
}
else {
}
if((isset($_POST['svezzato'])) && (!empty($_POST['svezzato']))){
	$insert_data["allattamento_svezzato"] = $_POST['svezzato'];
}
else {
}
if(($_POST['svezzato'] == 'Y') && (isset($_POST['sveSettDa'])) && (!empty($_POST['sveSettDa']))){
	$insert_data["allattamento_svezzato_settD"] = $_POST['sveSettDa'];
}
else{
}
if(($_POST['svezzato'] == 'Y') && (isset($_POST['sveSettA'])) && (!empty($_POST['sveSettA']))){
	$insert_data["allattamento_svezzato_settA"] = $_POST['sveSettA'];
}
else{
}
if($_SESSION["allattamento_sids"] != "Y"){
	//creo la connessione con il database
	$obj = new allattamento();
	// a questo punto posso effettuare la seguente insert

	$obj->insert($insert_data);
	var_dump($insert_data);
	$obj->error();
    $scritta = "";
    if (($_SESSION["stato"] == 'chiusa') || ($_SESSION["stato"] == 'chiusa_usr')){
        $scritta = "Consultazione";
    }
    else {
        $scritta = "Inserimento";
    }
    //log
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = $scritta;
    $insert_log["operazione"] = $scritta." tab allattamento";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
//	require_once("../comuni/loadtab_latt.php");
	tab_lattante();
    loadmenu_sids();
	if($i == 'succ'){
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=sids&tipo=sids&tab=9");
	}
	else {
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=sids&tipo=sids&tab=1");
	}
	$_SESSION["allattamento_sids"] = "Y";
}
else {
	$obj = new allattamento();
	$condition= array("scheda_sids_schede_id" => $_SESSION['case_id']);
	$obj->update($insert_data,$condition);
	var_dump($insert_data);
	$obj->error();
//	require_once("../comuni/loadtab_latt.php");
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
    $insert_log["operazione"] = $scritta." tab allattamento";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
	tab_lattante();
	if($i == 'succ'){
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=sids&tipo=sids&tab=9");
	}
	else {
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=sids&tipo=sids&tab=1");
	}

}
}

function back(){
	echo "ahahahaha";
	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=sids&tipo=sids&tab=1");
}		       
?>