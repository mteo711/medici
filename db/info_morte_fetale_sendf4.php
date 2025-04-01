<?php
session_start();
include_once("databases.php");
include_once("info_morte_fetale.php");
require_once("loadtab_esamimf.php");
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
	  break;
   }
}

function invia($i){
    echo "invia";
$insert_data = array();
$insert_data["idricovero"] = $_SESSION['case_id'];

if((isset($_POST['ricovero'])) && (!empty($_POST['ricovero']))){
	$insert_data["ricovero_durante_gravidanza"] = $_POST['ricovero'];
}
else {
}
if(($_POST['ricovero'] == 'Y') && (isset($_POST['diagnosi'])) && (!empty($_POST['diagnosi']))){
	$insert_data["diagnosi_dimissione"] = $_POST['diagnosi'];
}
else {
}

	$obj = new info_morte_fetale();
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
    $insert_log["operazione"] = $scritta." tab ricovero durante gravidanza";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    tab_esamimf();
    loadmenu_feto();
	if($i == 'succ'){
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=feto&tab=0");
	}
	else {
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=esami&tipo=feto&tab=11");
	}
    $_SESSION["morte_fetale4"] = "Y";
}

function back(){
	echo "ahahahaha";
	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=esami&tipo=feto&tab=11");
}		       
?>