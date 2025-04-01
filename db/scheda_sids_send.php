<?php
session_start();
include_once("databases.php");
include_once("allattamento.php");
include_once("dati_sids.php");
include_once("scheda_sids.php");
require_once("loadtab_latt.php");
require_once("loadmenu_sids.php");
include_once("log_activities.php");

if($_POST && array_key_exists("action", $_POST)){
  switch($_POST['action'])
   {
	  case "succ":
		invia('succ');
	  break;
	  case "succ_u":
		invia_u('succ');
	  break;
	  case "succ_b":
	  	invia('succ_b');
	  break;
	  case "succ_c":
	  	invia_u('succ_c');
	  break;
   }
}

function invia($i){
$insert_data = array();
$insert_data["dati_sids_schede_id"] = $_SESSION['case_id'];

if((isset($_POST['dormire'])) && (!empty($_POST['dormire']))){
	$insert_data["posizione_sonno"] = $_POST['dormire'];
}
else {
}
if((isset($_POST['succhi'])) && (!empty($_POST['succhi']))){
	$insert_data["succhiotto_sonno"] = $_POST['succhi'];
}
else {
}
if($_SESSION["scheda_sids"] != "Y"){
	//creo la connessione con il database
	$obj = new scheda_sids();
	// a questo punto posso effettuare la seguente insert

	$obj->insert($insert_data);
	var_dump($insert_data);
	$obj->error();
    
    //log
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = "Inserimento";
    $insert_log["operazione"] = "Inserimento tab sonno";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
//	require_once("../comuni/loadtab_latt.php");
	tab_lattante();
    loadmenu_sids();
	if($i == 'succ'){
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=sids&tipo=sids&tab=10");
	}
	else {
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=sids&tipo=sids&tab=8");
	}
	$_SESSION["scheda_sids"] = "Y";
}
else {
	$obj = new scheda_sids();
	$condition= array("dati_sids_schede_id" => $_SESSION['case_id']);
	$obj->update($insert_data,$condition);
	var_dump($insert_data);
	$obj->error();
    
    //log
    $scritta = "";
    if (($_SESSION["stato"] == 'chiusa') || ($_SESSION["stato"] == 'chiusa_usr')){
        $scritta = "Consulta";
    }
    else {
        $scritta = "Update";
    }
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = $scritta;
    $insert_log["operazione"] = $scritta." tab sonno";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
//	require_once("../comuni/loadtab_latt.php");
	tab_lattante();
    loadmenu_sids();
	if($i == 'succ'){
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=sids&tipo=sids&tab=10");
	}
	else {
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=sids&tipo=sids&tab=8");
	}
}

 
}

function invia_u($t){
//per la modifica gli devo dire quale Ë la riga da modificare (esprimo una condizione sulla chiave)
$insert_data = array();

$condition= array("dati_sids_schede_id" => $_SESSION['case_id']);
$insert_data["idmedici"] = $_SESSION['case_id'];

if((isset($_POST['dataU'])) && (!empty($_POST['dataU']))){
    list($day, $month, $year) = explode("-", $_POST['dataU']);
    $ymdU = "$year-$month-$day";
	$insert_data["data_ultimo_controllo_pediatrico"] = $ymdU;
}
else {
}
if((isset($_POST['pato_atto'])) && (!empty($_POST['pato_atto']))){
	$insert_data["patologie_in_atto"] = $_POST['pato_atto'];
}
else {
}

if (($_POST['pato_atto']=='Y') && (isset($_POST['patospec'])) && (!empty($_POST['patospec']))){
	$spec_pato_atto = "";
	$spec_pato_atto = implode(",", $_POST['patospec']);
	$insert_data["tipologie_patologie_in_atto"] = $spec_pato_atto;
}
else {
}
//(in_array("altro", $_POST['patospec'])) && && (isset($_POST['patospec'])) && (!empty($_POST['patospec']))
if (($_POST['pato_atto']=='Y') &&  (isset($_POST['pato_atto_spec'])) && (!empty($_POST['pato_atto_spec']))){
	$insert_data["specifica_tipologie_patologie_in_atto"] = $_POST['pato_atto_spec'];
}
else {
}
if((isset($_POST['dist_resp'])) && (!empty($_POST['dist_resp']))){
	$insert_data["disturbi_respiratori"] = $_POST['dist_resp'];
}
else {
}
if (($_POST['dist_resp']=='Y') && (isset($_POST['distresp'])) && (!empty($_POST['distresp']))){
	$spec_dist_resp = "";
	$spec_dist_resp = implode(",", $_POST['distresp']);
	$insert_data["tipologie_disturbi_respiratori"] = $spec_dist_resp;
}
else {
}
//(in_array("altro", $_POST['distresp'])) && && (isset($_POST['distresp'])) && (!empty($_POST['distresp'])) &&
if (($_POST['dist_resp']=='Y') && (isset($_POST['dist_resp_spec'])) && (!empty($_POST['dist_resp_spec']))){
	$insert_data["specifica_tipologie_disturbi_respiratori"] = $_POST['dist_resp_spec'];
}
else {
}
if((isset($_POST['vaccinazioni'])) && (!empty($_POST['vaccinazioni']))){
	$insert_data["vaccinazioni_ultimo_mese"] = $_POST['vaccinazioni'];
}
else {
}
if(($_POST['vaccinazioni'] == 'Y') && (isset($_POST['quali_vacc'])) && (!empty($_POST['quali_vacc']))){
	$insert_data["tipologie_vaccinazioni_ultimo_mese"] = $_POST['quali_vacc'];
}
else {
}
if((isset($_POST['riscontro'])) && (!empty($_POST['riscontro']))){
	$insert_data["effettuato_riscontro_diagnostico"] = $_POST['riscontro'];
}
else {
}
if(($_POST['riscontro'] == 'Y') && (isset($_POST['dove_risc'])) && (!empty($_POST['dove_risc']))){
	$insert_data["riscontro_diagnostico_dove"] = $_POST['dove_risc'];
}
else {
}
if((isset($_POST['prelievi'])) && (!empty($_POST['prelievi']))){
	$insert_data["prelievi_secondo_prot_naz"] = $_POST['prelievi'];
}
else {
}
if(($_POST['prelievi'] == 'Y') && (isset($_POST['quando_prel'])) && (!empty($_POST['quando_prel']))){
    list($day, $month, $year) = explode("-", $_POST['quando_prel']);
    $ymdP = "$year-$month-$day";
	$insert_data["data_riscontro_diagnostico"] = $ymdP;
}
else {
}
if(($_POST['prelievi'] == 'Y') && (isset($_POST['medico_prel'])) && (!empty($_POST['medico_prel']))){
	$insert_data["medico_effettuato_riscontro"] = $_POST['medico_prel'];
}
else {
}
var_dump($insert_data);
$obj = new scheda_sids();
// 
$insert_data["dati_sids_schede_id"] = $_SESSION['case_id'];
$obj->update($insert_data,$condition);

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
    $insert_log["operazione"] = $scritta." tab dati medici";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
var_dump($insert_data);
//require_once("../comuni/loadtab_latt.php");
tab_lattante();
loadmenu_sids();
if($t == 'succ'){
	//var_dump($insert_data);
	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=scena&tipo=sids&tab=40");
}
else {
	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=sids&tipo=sids&tab=9");
}
$_SESSION["scheda_sids_2"] = "Y";
}	

?>