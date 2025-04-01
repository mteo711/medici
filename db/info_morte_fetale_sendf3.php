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
$insert_data["idecografia"] = $_SESSION['case_id'];

if((isset($_POST['ecografia'])) && (!empty($_POST['ecografia']))){
	$insert_data["ecografia"] = $_POST['ecografia'];
}
else {
}
if(($_POST['ecografia'] == 'patologico') && (isset($_POST['malfoF'])) && (!empty($_POST['malfoF']))){
	$insert_data["malformazioni_fetali"] = $_POST['malfoF'];
}
else {
}
if((isset($_POST['placenta'])) && (!empty($_POST['placenta']))){
	$insert_data["placenta"] = $_POST['placenta'];
}
else {
}
if((isset($_POST['malfoU'])) && (!empty($_POST['malfoU']))){
	$insert_data["malformazioni_utero"] = $_POST['malfoU'];
}
else {
}
if(($_POST['malfoU'] == 'Y') && (isset($_POST['specU'])) && (!empty($_POST['specU']))){
	$insert_data["specifica_malformazioni_utero"] = $_POST['specU'];
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
    $insert_log["operazione"] = $scritta." tab ecografia";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    tab_esamimf();
    loadmenu_feto();
	if($i == 'succ'){
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=esami&tipo=feto&tab=12");
	}
	else {
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=esami&tipo=feto&tab=10");
	}
    $_SESSION["morte_fetale3"] = "Y";
}

function back(){
	echo "ahahahaha";
	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=esami&tipo=feto&tab=10");
}		       
?>