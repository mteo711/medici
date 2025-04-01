<?php
session_start();
include_once("databases.php");
include_once("encefalo_mf.php");
include_once("esame_interno_mf.php");
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

$insert_prot["dati_protocollo_mf_schede_id"] = $_SESSION['case_id'];

if((isset($_POST['sterno'])) && (!empty($_POST['sterno']))){
    $insert_prot["sterno_gabbia_toracica"] = $_POST['sterno'];
}
else {
}
if((isset($_POST['specS'])) && (!empty($_POST['specS']))){
    $insert_prot["specifica_sterno_gabbia_toracica_malformati"] = $_POST['specS'];
}
else {
}
if((isset($_POST['diaframma'])) && (!empty($_POST['diaframma']))){
    $insert_prot["diaframma"] = $_POST['diaframma'];
}
else {
}
if((isset($_POST['colonna'])) && (!empty($_POST['colonna']))){
    $insert_prot["colonna_vertebrale"] = $_POST['colonna'];
}
else {
}


if((isset($_POST['peso'])) && (!empty($_POST['peso']))){
    $insert_data["peso_gr"] = $_POST['peso'];
}
else{
}
if((isset($_POST['fontanellaa'])) && (!empty($_POST['fontanellaa']))){
    $insert_data["fontanella_anteriore"] = $_POST['fontanellaa'];
}
else{
}
if((isset($_POST['fontanellap'])) && (!empty($_POST['fontanellap']))){
    $insert_data["fontanella_posteriore"] = $_POST['fontanellap'];
}
else{
}
if((isset($_POST['dura'])) && (!empty($_POST['dura']))){
    $insert_data["dura_madre"] = $_POST['dura'];
}
else{
}
if((isset($_POST['seno'])) && (!empty($_POST['seno']))){
    $insert_data["seno_venoso"] = $_POST['seno'];
}
else{
}
if((isset($_POST['emorragie'])) && (!empty($_POST['emorragie']))){
    $insert_data["emorragie"] = $_POST['emorragie'];
}
else{
}
if((isset($_POST['leptomeningi'])) && (!empty($_POST['leptomeningi']))){
    $insert_data["leptomeningi"] = $_POST['leptomeningi'];
}
else{
}
if((isset($_POST['willis'])) && (!empty($_POST['willis']))){
    $insert_data["poligono_Willis"] = $_POST['willis'];
}
else{
}
if((isset($_POST['solchi'])) && (!empty($_POST['solchi']))){
    $insert_data["solchi"] = $_POST['solchi'];
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
if((isset($_POST['plessi'])) && (!empty($_POST['plessi']))){
    $insert_data["plessi_corioidei"] = $_POST['plessi'];
}
else{
}
if((isset($_POST['setto'])) && (!empty($_POST['setto']))){
    $insert_data["setto_pellucido"] = $_POST['setto'];
}
else{
}
if((isset($_POST['corpo'])) && (!empty($_POST['corpo']))){
    $insert_data["corpo_calloso"] = $_POST['corpo'];
}
else{
}
if((isset($_POST['ventricoli'])) && (!empty($_POST['ventricoli']))){
    $insert_data["ventricoli"] = $_POST['ventricoli'];
}
else{
}


if($_SESSION["encefalo_mf"] != "Y"){
	echo "insert";
    //creo la connessione con il database
    $obj = new esame_interno_mf();
    $obj->insert($insert_prot);
    var_dump($insert_prot);
    $obj->error();
    
    
    $objj = new encefalo_mf();
    // a questo punto posso effettuare la seguente insert
    $objj->insert($insert_data);
    var_dump($insert_data);
    $objj->error();
    
    //log
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = "Inserimento";
    $insert_log["operazione"] = "Inserimento tab autopsia ESAME INTERNO";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    tab_autopsiaf();
    loadmenu_feto();
    if($i == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=17");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=15");
    }
    $_SESSION["encefalo_mf"] = "Y";
}
else {
	echo "update";
	$objp = new esame_interno_mf();
	$condition1= array("dati_protocollo_mf_schede_id" => $_SESSION['case_id']);
	$objp->update($insert_prot, $condition1);
	var_dump($insert_prot);
	$objp->error();
	
    $obj = new encefalo_mf();
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
    $insert_log["operazione"] = $scritta." tab autopsia ESAME INTERNO";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    

    tab_autopsiaf();
    loadmenu_feto();
    if($i == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=17");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=15");
    }

}
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=15");

}					       
?>