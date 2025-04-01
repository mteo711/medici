<?php
session_start();
include_once("databases.php");
include_once("cavita_toracica_sids.php");
require_once("loadtab_autopsia.php");
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
$insert_data["dati_protocollo_sids_schede_id"] = $_SESSION['case_id'];

if((isset($_POST['aeree'])) && (!empty($_POST['aeree']))){
    $insert_data["vie_aeree"] = $_POST['aeree'];
}
else{
}
if((isset($_POST['versamenti'])) && (!empty($_POST['versamenti']))){
    $insert_data["versamenti"] = $_POST['versamenti'];
}
else{
}
if((isset($_POST['pneumotorace'])) && (!empty($_POST['pneumotorace']))){
    $insert_data["pneumotorace"] = $_POST['pneumotorace'];
}
else{
}
if((isset($_POST['altroCavi'])) && (!empty($_POST['altroCavi']))){
    $insert_data["altro_cavi_pleurici"] = $_POST['altroCavi'];
}
else{
}
if((isset($_POST['asimmetria'])) && (!empty($_POST['asimmetria']))){
    $insert_data["asimmetria_viscerale"] = $_POST['asimmetria'];
}
else{
}
if($_POST['asimmetria']=='Y' && (isset($_POST['specAsimmetria'])) && (!empty($_POST['specAsimmetria']))){
    $insert_data["specifica_asimmetria_viscerale"] = $_POST['specAsimmetria'];
}
else{
}
echo "qui";

if($_SESSION["cavita_toracica_sids"] != "Y"){
	
    $objj = new cavita_toracica_sids();
    // a questo punto posso effettuare la seguente insert
    $objj->insert($insert_data);
    var_dump($insert_data);
    $objj->error();
    
    //log
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = "Inserimento";
    $insert_log["operazione"] = "Inserimento tab cav. toracica";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
//    require_once("../comuni/loadtab_autopsia.php");
    tab_autopsia();
    loadmenu_sids();
	if($i == 'succ'){
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=19");
	}
	else {
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=17");
	} 
    $_SESSION["cavita_toracica_sids"] = "Y";
}
else {
	echo "update";
    $obj = new cavita_toracica_sids();
    $condition= array("dati_protocollo_sids_schede_id" => $_SESSION['case_id']);
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
    $insert_log["operazione"] = $scritta." tab cav. toracica";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
//    require_once("../comuni/loadtab_autopsia.php");
    tab_autopsia();
    loadmenu_sids();
    if($i == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=19");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=17");
    }

}
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=17");

}					       
?>