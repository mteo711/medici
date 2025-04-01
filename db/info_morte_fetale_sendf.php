<?php
session_start();
include_once("databases.php");
include_once("info_morte_fetale.php");
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
	  break;
   }
}

function invia($i){
    echo "invia";
$insert_data = array();
$insert_data["madre_schede_id"] = $_SESSION['case_id'];

if((isset($_POST['dataU'])) && (!empty($_POST['dataU']))){
    list($day, $month, $year) = explode("-", $_POST['dataU']);
    $ymdU = "$year-$month-$day";
	$insert_data["data_ultima_mestruazione"] = $ymdU;
}
else {
}
if((isset($_POST['dataA'])) && (!empty($_POST['dataA']))){
    list($day, $month, $year) = explode("-", $_POST['dataA']);
    $ymdA = "$year-$month-$day";
	$insert_data["data_presunta_parto_anamnestico"] = $ymdA;
}
else {
}
if((isset($_POST['dataE'])) && (!empty($_POST['dataE']))){
    list($day, $month, $year) = explode("-", $_POST['dataE']);
    $ymdE = "$year-$month-$day";
	$insert_data["data_presunta_parto_ecografico"] = $ymdE;
}
else {
}
if((isset($_POST['numVisite'])) && (!empty($_POST['numVisite']))){
	$insert_data["num_visite_controllo_in_gravidanza"] = $_POST['numVisite'];
}
else {
}
if($_SESSION["morte_fetale"] != "Y"){
	//creo la connessione con il database
	$obj = new info_morte_fetale();
	// a questo punto posso effettuare la seguente insert

	$obj->insert($insert_data);
	var_dump($insert_data);
	$obj->error();
    
    //log
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = "Inserimento";
    $insert_log["operazione"] = "Inserimento tab mestruazioni MADRE";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    tab_madref();
    loadmenu_feto();
	if($i == 'succ'){
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=esami&tipo=feto&tab=10");
	}
	else {
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=feto&tab=6");
	}
	$_SESSION["morte_fetale"] = "Y";
}
else {
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
    $insert_log["operazione"] = $scritta." tab mestruazioni MADRE";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    tab_madref();
    loadmenu_feto();
	if($i == 'succ'){
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=esami&tipo=feto&tab=10");
	}
	else {
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=feto&tab=6");
	}

}
}

function back(){
	echo "ahahahaha";
	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=feto&tab=6");
}		       
?>