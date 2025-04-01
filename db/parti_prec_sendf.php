<?php
session_start();
include_once("databases.php");
include_once("parti_prec.php");
require_once("loadtab_madref.php");
require_once("loadmenu_feto.php");
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

if((isset($_POST['aborti'])) && (!empty($_POST['aborti']))){
    $insert_data["aborti_precedenti"] = $_POST['aborti'];
}
else {
}

if((isset($_POST['tipo1'])) && (!empty($_POST['tipo1']))){
    $insert_data["tipo1"] = $_POST['tipo1'];
}
else {
}
if((isset($_POST['settimana1'])) && (!empty($_POST['settimana1']))){
    $insert_data["settimana1"] = $_POST['settimana1'];
}
else {
}
    
if((isset($_POST['tipo2'])) && (!empty($_POST['tipo2']))){
    $insert_data["tipo2"] = $_POST['tipo2'];
}
else {
}
if((isset($_POST['settimana2'])) && (!empty($_POST['settimana2']))){
    $insert_data["settimana2"] = $_POST['settimana2'];
}
else {
}

if((isset($_POST['tipo3'])) && (!empty($_POST['tipo3']))){
    $insert_data["tipo3"] = $_POST['tipo3'];
}
else {
}
if((isset($_POST['settimana3'])) && (!empty($_POST['settimana3']))){
    $insert_data["settimana3"] = $_POST['settimana3'];
}
else {
}

if((isset($_POST['tipo4'])) && (!empty($_POST['tipo4']))){
    $insert_data["tipo4"] = $_POST['tipo4'];
}
else {
}
if((isset($_POST['settimana4'])) && (!empty($_POST['settimana4']))){
    $insert_data["settimana4"] = $_POST['settimana4'];
}
else {
}

if((isset($_POST['tipo5'])) && (!empty($_POST['tipo5']))){
    $insert_data["tipo5"] = $_POST['tipo5'];
}
else {
}
if((isset($_POST['settimana5'])) && (!empty($_POST['settimana5']))){
    $insert_data["settimana5"] = $_POST['settimana5'];
}
else {
}

// 
if($_SESSION["parti_precF"] != "Y"){
	echo "insert";
    //creo la connessione con il database
    $obj = new parti_prec();
    // a questo punto posso effettuare la seguente insert
    
    $obj->insert($insert_data);
    var_dump($insert_data);
    $obj->error();
    //log
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = "Inserimento";
    $insert_log["operazione"] = "Inserimento tab aborti precedenti MADRE";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    tab_madref();
    loadmenu_feto();
    if($j == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=feto&tab=8");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=feto&tab=1");
    }
    $_SESSION["parti_precF"] = "Y";
}
else {
	echo "update";
    $obj = new parti_prec();
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
    $insert_log["operazione"] = $scritta." tab aborti precedenti MADRE";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    tab_madref();
    loadmenu_feto();
    if($j == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=feto&tab=8");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=feto&tab=1");
    }
}
}
function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=fetosw&tab=5");
}
						       
?>