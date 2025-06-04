<?php
session_start();
include_once("databases.php");
include_once("fratelli.php");
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


function invia($i){
echo "inizio";
$insert_data = array();

$insert_data["patologie_gest_madre_schede_id"] = $_SESSION['case_id'];
    
if((isset($_POST['dataU'])) && (!empty($_POST['dataU']))){
    list($day, $month, $year) = explode("-", $_POST['dataU']);
    $ymd = "$year-$month-$day";
    $insert_data["data_ultimo_parto_precedente"] = $ymd;
}
else {
}
    
if(!empty($_POST['fratelli_sorelle'])){
    $insert_data["fratelli_sorelle"] = $_POST['fratelli_sorelle'];
} else {
    // eventualmente gestisci errore
}
//fratello 1   

    
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

if((isset($_POST['vivo1'])) && (!empty($_POST['vivo1']))){
    $insert_data["vivo1"] = $_POST['vivo1'];
}
else {
}
if((isset($_POST['ereditarieM1'])) && (!empty($_POST['ereditarieM1']))){
    $insert_data["ereditarieM1"] = $_POST['ereditarieM1'];
}
else {
}
    
if((isset($_POST['geneticheM1'])) && (!empty($_POST['geneticheM1']))){
    $insert_data["geneticheM1"] = $_POST['geneticheM1'];
}
else {
}
    
if((isset($_POST['dismetabolicheM1'])) && (!empty($_POST['dismetabolicheM1']))){
    $insert_data["dismetabolicheM1"] = $_POST['dismetabolicheM1'];
}
else {
}

if((isset($_POST['altroM1'])) && (!empty($_POST['altroM1']))){
    $insert_data["altroM1"] = $_POST['altroM1'];
}
else {
}

    

    

    

//fratello 2
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


if((isset($_POST['vivo2'])) && (!empty($_POST['vivo2']))){
    $insert_data["vivo2"] = $_POST['vivo2'];
}
else {
}
if((isset($_POST['ereditarieM2'])) && (!empty($_POST['ereditarieM2']))){
    $insert_data["ereditarieM2"] = $_POST['ereditarieM2'];
}
else {
}
    
if((isset($_POST['geneticheM2'])) && (!empty($_POST['geneticheM2']))){
    $insert_data["geneticheM2"] = $_POST['geneticheM2'];
}
else {
}
    
if((isset($_POST['dismetabolicheM2'])) && (!empty($_POST['dismetabolicheM2']))){
    $insert_data["dismetabolicheM2"] = $_POST['dismetabolicheM2'];
}
else {
}

if((isset($_POST['altroM2'])) && (!empty($_POST['altroM2']))){
    $insert_data["altroM2"] = $_POST['altroM2'];
}
else {
}


//fratello 3
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

if((isset($_POST['vivo3'])) && (!empty($_POST['vivo3']))){
    $insert_data["vivo3"] = $_POST['vivo3'];
}
else {
}
if((isset($_POST['ereditarieM3'])) && (!empty($_POST['ereditarieM3']))){
    $insert_data["ereditarieM3"] = $_POST['ereditarieM3'];
}
else {
}
    
if((isset($_POST['geneticheM3'])) && (!empty($_POST['geneticheM3']))){
    $insert_data["geneticheM3"] = $_POST['geneticheM3'];
}
else {
}
    
if((isset($_POST['dismetabolicheM3'])) && (!empty($_POST['dismetabolicheM3']))){
    $insert_data["dismetabolicheM3"] = $_POST['dismetabolicheM3'];
}
else {
}

if((isset($_POST['altroM3'])) && (!empty($_POST['altroM3']))){
    $insert_data["altroM3"] = $_POST['altroM3'];
}
else {
}
//fratello 4
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

if((isset($_POST['vivo4'])) && (!empty($_POST['vivo4']))){
    $insert_data["vivo4"] = $_POST['vivo4'];
}
else {
}
if((isset($_POST['ereditarieM4'])) && (!empty($_POST['ereditarieM4']))){
    $insert_data["ereditarieM4"] = $_POST['ereditarieM4'];
}
else {
}
    
if((isset($_POST['geneticheM4'])) && (!empty($_POST['geneticheM4']))){
    $insert_data["geneticheM4"] = $_POST['geneticheM4'];
}
else {
}
    
if((isset($_POST['dismetabolicheM4'])) && (!empty($_POST['dismetabolicheM4']))){
    $insert_data["dismetabolicheM4"] = $_POST['dismetabolicheM4'];
}
else {
}

if((isset($_POST['altroM4'])) && (!empty($_POST['altroM4']))){
    $insert_data["altroM4"] = $_POST['altroM4'];
}
else {
}
//fratello 5

if((isset($_POST['dataN5'])) && (!empty($_POST['dataN5']))){
    list($day, $month, $year) = explode("-", $_POST['dataN5']);
    $ymd = "$year-$month-$day";
    $insert_data["dataN5"] = $ymd;
}
else {
}
    
if((isset($_POST['mesiM5'])) && (!empty($_POST['mesiM5']))){
    $insert_data["mesiM5"] = $_POST['mesiM5'];
}
else {
}
    
if((isset($_POST['anniM5'])) && (!empty($_POST['anniM5']))){
    $insert_data["anniM5"] = $_POST['anniM5'];
}
else {
}
    
if((isset($_POST['causaM5'])) && (!empty($_POST['causaM5']))){
    $insert_data["causaM5"] = $_POST['causaM5'];
}
else {
}

if((isset($_POST['vivo5'])) && (!empty($_POST['vivo5']))){
    $insert_data["vivo5"] = $_POST['vivo5'];
}
else {
}
if((isset($_POST['ereditarieM5'])) && (!empty($_POST['ereditarieM5']))){
    $insert_data["ereditarieM5"] = $_POST['ereditarieM5'];
}
else {
}
    
if((isset($_POST['geneticheM5'])) && (!empty($_POST['geneticheM5']))){
    $insert_data["geneticheM5"] = $_POST['geneticheM5'];
}
else {
}
    
if((isset($_POST['dismetabolicheM5'])) && (!empty($_POST['dismetabolicheM5']))){
    $insert_data["dismetabolicheM5"] = $_POST['dismetabolicheM5'];
}
else {
}

if((isset($_POST['altroM5'])) && (!empty($_POST['altroM5']))){
    $insert_data["altroM5"] = $_POST['altroM5'];
}
else {
}




if($_SESSION["fratelliF"] != "Y"){
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
	tab_madref();
    loadmenu_feto();
	if($i == 'succ'){
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=feto&tab=3");
	}
	else {
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=feto&tab=2");
	}
	$_SESSION["fratelliF"] = "Y";
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
	tab_madref();
    loadmenu_feto();
	if($i == 'succ'){
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=feto&tab=3");
	}
	else {
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=feto&tab=2");
	}
}
}
function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=feto&tab=2");
}
						       
?>