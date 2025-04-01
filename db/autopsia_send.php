<?php
session_start();
include_once("databases.php");
include_once("dati_protocollo_sids.php");
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
$insert_data["schede_id"] = $_SESSION['case_id'];

if((isset($_POST['autopsia'])) && (!empty($_POST['autopsia']))){
    $insert_data["autopsia"] = $_POST['autopsia'];
}
else {
}


if($_SESSION["autopsia_sids"] != "Y"){
	echo "insert";
    
    $objj = new dati_protocollo_sids();
    // a questo punto posso effettuare la seguente insert
    $objj->insert($insert_data);
    var_dump($insert_data);
    $objj->error();
    
    //log
    $scritta = "";
    if (($_SESSION["stato"] == 'chiusa') || ($_SESSION["stato"] == 'chiusa_usr')){
        $scritta = "Consultazione";
    }
    else {
        $scritta = "Inserimento";
    }
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = $scritta;
    $insert_log["operazione"] = $scritta." autopsia effettuata";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    if(($_POST['autopsia']=='Y')){
    tab_autopsia();
    loadmenu_sids();
    if($i == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=15");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=consenso&tipo=sids&tab=40");
    }
    }
    else if(($_POST['autopsia']=='N')){
    if($i == 'succ'){
    	header("Location:../index_".$_SESSION["tipo_usr"].".php");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=consenso&tipo=sids&tab=40");
    }
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=0");
    }
    $_SESSION["autopsia_sids"] = "Y";
}
else {
	
    $obj = new dati_protocollo_sids();
    $condition= array("schede_id" => $_SESSION['case_id']);
    $obj->update($insert_data,$condition);
    var_dump($insert_data);
    $obj->error();
    
    $records= $obj->fetchRecord(array("schede_id"=>$_SESSION['case_id']));
    
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
    $insert_log["operazione"] = $scritta." autopsia effettuata";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    if(($_POST['autopsia']=='Y') || ($records['autopsia'])=='Y'){
    tab_autopsia();
    loadmenu_sids();
    if($i == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=15");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=consenso&tipo=sids&tab=40");
    }
    }
    else if(($_POST['autopsia']=='N') || ($records['autopsia'])=='N'){
    if($i == 'succ'){
    	header("Location:../index_".$_SESSION["tipo_usr"].".php");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=consenso&tipo=sids&tab=40");
    }
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=0");
    }
    }
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=consenso&tipo=sids&tab=40");

}					       
?>