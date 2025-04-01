<?php
session_start();
include_once("databases.php");
include_once("fratelli.php");
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

function invia($i){
echo "inizio";
$insert_data = array();

$insert_data["patologie_gest_madre_schede_id"] = $_SESSION['case_id'];
    
if((isset($_POST['figliVivi'])) && (!empty($_POST['figliVivi']))){
    $insert_data["num_figli_in_vita"] = $_POST['figliVivi'];
}
else {
}
    
if((isset($_POST['dataU'])) && (!empty($_POST['dataU']))){
    list($day, $month, $year) = explode("-", $_POST['dataU']);
    $ymd = "$year-$month-$day";
    $insert_data["data_ultimo_parto_precedente"] = $ymd;
}
else {
}
    
if((isset($_POST['figliMorti'])) && (!empty($_POST['figliMorti']))){
    $insert_data["num_figli_morti"] = $_POST['figliMorti'];
}
else {
}
    
if((isset($_POST['dataN1'])) && (!empty($_POST['dataN1']))){
    list($day, $month, $year) = explode("-", $_POST['dataN1']);
    $ymd = "$year-$month-$day";
    $insert_data["dataN1"] = $ymd;
}
else {
}
    
if((isset($_POST['mesiM1'])) && (!empty($_POST['mesiM1']))){
    $insert_data["mesiM1"] = $_POST['mesiM1'];
}
else {
}
    
if((isset($_POST['anniM1'])) && (!empty($_POST['anniM1']))){
    $insert_data["anniM1"] = $_POST['anniM1'];
}
else {
}
    
if((isset($_POST['causaM1'])) && (!empty($_POST['causaM1']))){
    $insert_data["causaM1"] = $_POST['causaM1'];
}
else {
}
    
if((isset($_POST['dataN2'])) && (!empty($_POST['dataN2']))){
    list($day, $month, $year) = explode("-", $_POST['dataN2']);
    $ymd = "$year-$month-$day";
    $insert_data["dataN2"] = $ymd;
}
else {
}
    
if((isset($_POST['mesiM2'])) && (!empty($_POST['mesiM2']))){
    $insert_data["mesiM2"] = $_POST['mesiM2'];
}
else {
}
    
if((isset($_POST['anniM2'])) && (!empty($_POST['anniM2']))){
    $insert_data["anniM2"] = $_POST['anniM2'];
}
else {
}
    
if((isset($_POST['causaM2'])) && (!empty($_POST['causaM2']))){
    $insert_data["causaM2"] = $_POST['causaM2'];
}
else {
}
    
if((isset($_POST['dataN3'])) && (!empty($_POST['dataN3']))){
    list($day, $month, $year) = explode("-", $_POST['dataN3']);
    $ymd = "$year-$month-$day";
    $insert_data["dataN3"] = $ymd;
}
else {
}
    
if((isset($_POST['mesiM3'])) && (!empty($_POST['mesiM3']))){
    $insert_data["mesiM3"] = $_POST['mesiM3'];
}
else {
}
    
if((isset($_POST['anniM3'])) && (!empty($_POST['anniM3']))){
    $insert_data["anniM3"] = $_POST['anniM3'];
}
else {
}
    
if((isset($_POST['causaM3'])) && (!empty($_POST['causaM3']))){
    $insert_data["causaM3"] = $_POST['causaM3'];
}
else {
}
    
if((isset($_POST['dataN4'])) && (!empty($_POST['dataN4']))){
    list($day, $month, $year) = explode("-", $_POST['dataN4']);
    $ymd = "$year-$month-$day";
    $insert_data["dataN4"] = $ymd;
}
else {
}
    
if((isset($_POST['mesiM4'])) && (!empty($_POST['mesiM4']))){
    $insert_data["mesiM4"] = $_POST['mesiM4'];
}
else {
}
    
if((isset($_POST['anniM4'])) && (!empty($_POST['anniM4']))){
    $insert_data["anniM4"] = $_POST['anniM4'];
}
else {
}
    
if((isset($_POST['causaM4'])) && (!empty($_POST['causaM4']))){
    $insert_data["causaM4"] = $_POST['causaM4'];
}
else {
}

if($_SESSION["fratelli"] != "Y"){
    $obj = new fratelli();
    // a questo punto posso effettuare la seguente insert
    $obj->insert($insert_data);
    var_dump($insert_data);
    $obj->error();
    //log
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = "Inserimento";
    $insert_log["operazione"] = "Inserimento tab altri fratelli MADRE";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
	tab_madre();
    loadmenu_sids();
	if($i == 'succ'){
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=sids&tab=3");
	}
	else {
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=sids&tab=2");
	}
	$_SESSION["fratelli"] = "Y";
}
else {
	echo "update";
	$obj = new fratelli();
	$condition= array("patologie_gest_madre_schede_id" => $_SESSION['case_id']);
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
    $insert_log["operazione"] = $scritta." tab altri fratelli MADRE";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
	tab_madre();
    loadmenu_sids();
	if($i == 'succ'){
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=sids&tab=3");
	}
	else {
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=sids&tab=2");
	}
}
}
function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=sids&tab=2");
}
						       
?>