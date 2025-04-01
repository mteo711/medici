<?php
session_start();
include_once("databases.php");
include_once("padre.php");
require_once("loadtab_padre.php");
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
	  case "succ_v":
	    invia_v('succ_v');
	  break;
	  case "succ_d":
	    invia_v('succ_d');
	  break;
	  case "back_v":
	    back_v();
	  break;
	  case "succ_u":
	    invia_u('succ_u');
	  break;
	  case "succ_f":
	    invia_u('succ_f');
	  break;
	  case "back_u":
	    back_u();
	  break;
   }
}

function invia($i){
echo "inizio";
$insert_data = array();
$insert_data["idfumo"] = $_SESSION['case_id'];

    
if((isset($_POST['fumo'])) && (!empty($_POST['fumo']))){
    $insert_data["fumo"] = $_POST['fumo'];
}
else {
}
if($_POST['fumo'] == 'Y' && (isset($_POST['numSig'])) && (!empty($_POST['numSig']))){
    $insert_data["num_sigarette_per_giorno"] = $_POST['numSig'];
}
else {
}
    echo "update";
    $obj = new padre();
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
    $insert_log["operazione"] = $scritta." tab fumo PADRE";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
//    require_once("../comuni/loadtab_padre.php");
    tab_padre();
    loadmenu_sids();
    if($i == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=sids&tab=4");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=sids&tab=1");
    }
    $_SESSION["padre_fumo"] = "Y";
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=sids&tab=1");
}	

function invia_v($j){
echo "inizio";
$insert_data = array();
$insert_data["idalcol"] = $_SESSION['case_id'];

if((isset($_POST['alcool'])) && (!empty($_POST['alcool']))){
    $insert_data["alcool"] = $_POST['alcool'];
}
else {
}
if($_POST['alcool'] == 'Y' && (isset($_POST['qualiAlcool'])) && (!empty($_POST['qualiAlcool']))){
    $insert_data["alcool_quali_quantita"] = $_POST['qualiAlcool'];
}
else {
}
if((isset($_POST['stupefacenti'])) && (!empty($_POST['stupefacenti']))){
    $insert_data["stupefacenti"] = $_POST['stupefacenti'];
}
else {
}
if($_POST['stupefacenti'] == 'Y' && (isset($_POST['qualiStupe'])) && (!empty($_POST['qualiStupe']))){
    $insert_data["stupefacenti_quali_quantita"] = $_POST['qualiStupe'];
}
else {
}
echo "qui";

	echo "update";
    $obj = new padre();
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
    $insert_log["operazione"] = $scritta." tab alcool/stupefacenti PADRE";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
//    require_once("../comuni/loadtab_padre.php");
    tab_padre();
    loadmenu_sids();
    if($j == 'succ_v'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=sids&tab=5");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=sids&tab=3");
    }
    $_SESSION["padre_alcol"] = "Y";
}

function back_v(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=sids&tab=3");
}	

function invia_u($z){
echo "inizio";
$insert_data = array();
$insert_data["idfarmaci"] = $_SESSION['case_id'];

if((isset($_POST['farmaci'])) && (!empty($_POST['farmaci']))){
    $insert_data["farmaci"] = $_POST['farmaci'];
}
else {
}
if($_POST['farmaci'] == 'Y' && (isset($_POST['quali'])) && (!empty($_POST['quali']))){
    $insert_data["farmaci_quali_quantita"] = $_POST['quali'];
}
else {
}
if((isset($_POST['hiv'])) && (!empty($_POST['hiv']))){
    $insert_data["HIV_positivo"] = $_POST['hiv'];
}
else {
}

echo "qui";

    echo "update";
    $obj = new padre();
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
    $insert_log["operazione"] = $scritta." tab farmaci PADRE";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
//    require_once("../comuni/loadtab_padre.php");
    tab_padre();
    loadmenu_sids();
    if($z == 'succ_u'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=consenso&tipo=sids&tab=40");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=sids&tab=4");
    }
    $_SESSION["padre_farmaci"] = "Y";
}

function back_u(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=sids&tab=4");
}				       
?>