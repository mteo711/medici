<?php
session_start();
include_once("databases.php");
include_once("fumo_passivo.php");
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
if($_POST['prima']== 'Y' && (isset($_POST['etaSigPass1'])) && (!empty($_POST['etaSigPass1'])) && (ctype_digit($_POST['etaSigPass1']))){
    $insert_data["da_anni"] = $_POST['etaSigPass1'];
}
else {
}
if($_POST['prima']== 'Y' && (isset($_POST['dovePrima'])) && (!empty($_POST['dovePrima']))){
    $insert_data["luogoA"] = $_POST['dovePrima'];
}
else {
}
if((isset($_POST['durante'])) && (!empty($_POST['durante']))){
    $insert_data["durante_gravidanza"] = $_POST['durante'];
}
else {
}
if($_POST['durante']== 'Y' && (isset($_POST['etaSigPass2'])) && (!empty($_POST['etaSigPass2'])) && (ctype_digit($_POST['etaSigPass2']))){
    $insert_data["fino_a_settimana"] = $_POST['etaSigPass2'];
}
else {
}
if($_POST['durante']== 'Y' && (isset($_POST['doveDurante'])) && (!empty($_POST['doveDurante']))){
    $insert_data["luogoB"] = $_POST['doveDurante'];
}
else {
}
if((isset($_POST['dopo'])) && (!empty($_POST['dopo']))){
    $insert_data["post_parto"] = $_POST['dopo'];
}
else {
}
if($_POST['dopo'] == 'Y' && (isset($_POST['etaSigPass3'])) && (!empty($_POST['etaSigPass3'])) && (ctype_digit($_POST['etaSigPass3']))){
    $insert_data["fino_a_eta_bambino_in_giorni"] = $_POST['etaSigPass3'];
}
else {
}
if($_POST['dopo']== 'Y' && (isset($_POST['doveDopo'])) && (!empty($_POST['doveDopo']))){
    $insert_data["luogoC"] = $_POST['doveDopo'];
}
else {
}

echo "qui";

//
if($_SESSION["fumo_passivo"] != "Y"){
	echo "insert";
    //creo la connessione con il database
    
    $objj = new fumo_passivo();
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
    $insert_log["operazione"] = "Inserimento tab fumo passivo MADRE";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
//    require_once("../comuni/loadtab_madre.php");
    tab_madre();
    loadmenu_sids();
    if($j == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=sids&tab=4");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=sids&tab=3");
    }
    $_SESSION["fumo_passivo"] = "Y";
}
else {
	echo "update";
    $obj = new fumo_passivo();
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
    $insert_log["operazione"] = $scritta." tab fumo passivo MADRE";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
//    require_once("../comuni/loadtab_madre.php");
    tab_madre();
    loadmenu_sids();
    if($j == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=sids&tab=4");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=sids&tab=3");
    }
}
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=sids&tab=3");
}					       
?>