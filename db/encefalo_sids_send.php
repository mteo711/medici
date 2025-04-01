<?php
session_start();
include_once("databases.php");
include_once("encefalo_sids.php");
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

if((isset($_POST['peso'])) && (!empty($_POST['peso']))){
    $insert_data["peso_gr"] = $_POST['peso'];
}
else{
}
if((isset($_POST['malformazioni'])) && (!empty($_POST['malformazioni']))){
    $insert_data["malformazioni"] = $_POST['malformazioni'];
}
else{
}
if($_POST['malformazioni']=='Y' && (isset($_POST['specMalfo'])) && (!empty($_POST['specMalfo']))){
    $insert_data["specifica_malformazioni"] = $_POST['specMalfo'];
}
else{
}
if((isset($_POST['taglio'])) && (!empty($_POST['taglio']))){
    $insert_data["taglio_emisferi"] = $_POST['taglio'];
}
else{
}
if((isset($_POST['tronco'])) && (!empty($_POST['tronco']))){
    $insert_data["tronco_cerebrale"] = $_POST['tronco'];
}
else{
}
if((isset($_POST['aspetto'])) && (!empty($_POST['aspetto']))){
    $insert_data["aspetto_esterno"] = $_POST['aspetto'];
}
else{
}
if($_POST['aspetto']=='poligono di willis' && (isset($_POST['willis'])) && (!empty($_POST['willis']))){
    $insert_data["specifica_poligono_Willis"] = $_POST['willis'];
}
echo "qui";

if($_SESSION["encefalo_sids"] != "Y"){
	
    $objj = new encefalo_sids();
    // a questo punto posso effettuare la seguente insert
    $objj->insert($insert_data);
    var_dump($insert_data);
    $objj->error();
    
    //log
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = "Inserimento";
    $insert_log["operazione"] = "Inserimento tab autopsia ENCEFALO";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    
//    require_once("../comuni/loadtab_autopsia.php");
    tab_autopsia();
    loadmenu_sids();
	if($i == 'succ'){
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=17");
	}
	else {
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=15");
	}
    $_SESSION["encefalo_sids"] = "Y";
}
else {
	echo "update";
    $obj = new encefalo_sids();
    $condition= array("dati_protocollo_sids_schede_id" => $_SESSION['case_id']);
    $obj->update($insert_data,$condition);
    var_dump($insert_data);
    
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
    $insert_log["operazione"] = $scritta." tab autopsia ENCEFALO";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    
    $obj->error();
//    require_once("../comuni/loadtab_autopsia.php");
    tab_autopsia();
    loadmenu_sids();
    if($i == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=17");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=15");
    }

}
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=15");

}					       
?>