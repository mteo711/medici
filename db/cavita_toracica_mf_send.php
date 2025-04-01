<?php
session_start();
include_once("databases.php");
include_once("cavita_toracica_mf.php");
require_once("loadtab_autopsiaf.php");
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
$insert_data["dati_protocollo_mf_schede_id"] = $_SESSION['case_id'];

if((isset($_POST['sito'])) && (!empty($_POST['sito']))){
    $insert_data["stato_viscerale"] = $_POST['sito'];
}
else{
}
if((isset($_POST['versamenti'])) && (!empty($_POST['versamenti']))){
    $insert_data["versamenti_cavi_pleurici"] = $_POST['versamenti'];
}
else{
}
if((isset($_POST['pneumo'])) && (!empty($_POST['pneumo']))){
    $insert_data["pneumotorace"] = $_POST['pneumo'];
}
else{
}
if((isset($_POST['asimmetria'])) && (!empty($_POST['asimmetria']))){
    $insert_data["asimmetria_viscerale"] = $_POST['asimmetria'];
}
else{
}
if((isset($_POST['specA'])) && (!empty($_POST['specA']))){
    $insert_data["specifica_asimmetria_viscerale"] = $_POST['specA'];
}
else{
}
if((isset($_POST['vieaeree'])) && (!empty($_POST['vieaeree']))){
    $insert_data["laringe_trachea_bronchi"] = $_POST['vieaeree'];
}
else{
}
if((isset($_POST['specV'])) && (!empty($_POST['specV']))){
    $insert_data["specifica_laringe_trachea_bronchi_malformata"] = $_POST['specV'];
}
else{
}
if((isset($_POST['esofago'])) && (!empty($_POST['esofago']))){
    $insert_data["esofago"] = $_POST['esofago'];
}
else{
}
if((isset($_POST['specE'])) && (!empty($_POST['specE']))){
    $insert_data["specifica_esofago_malformazioni"] = $_POST['specE'];
}
else{
}


if($_SESSION["cavita_toracica_mf"] != "Y"){
	echo "insert";
    
    $objj = new cavita_toracica_mf();
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
    $insert_log["operazione"] = $scritta." tab cav. toracica";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    tab_autopsiaf();
    loadmenu_feto();
    if($i == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=19");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=17");
    }
    $_SESSION["cavita_toracica_mf"] = "Y";
}
else {
	echo "update";
	
    $obj = new cavita_toracica_mf();
    $condition= array("dati_protocollo_mf_schede_id" => $_SESSION['case_id']);
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

    tab_autopsiaf();
    loadmenu_feto();
    if($i == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=19");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=17");
    }

}
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=17");

}					       
?>