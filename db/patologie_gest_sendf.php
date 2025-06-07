<?php
session_start();
include_once("databases.php");
include_once("patologie_gest.php");
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

function invia($j){
echo "inizio";
$insert_data = array();
$insert_data["madre_schede_id"] = $_SESSION['case_id'];

if((isset($_POST['ipertensiva'])) && (!empty($_POST['ipertensiva']))){
    $insert_data["presenza_ipertensione"] = $_POST['ipertensiva'];
}
else {
}
if($_POST['ipertensiva'] == 'Y' && (isset($_POST['specIpertensiva'])) && (!empty($_POST['specIpertensiva']))){
    $insert_data["periodo_ipertensione"] = $_POST['specIpertensiva'];
}
else {
}
if((isset($_POST['diabete'])) && (!empty($_POST['diabete']))){
    $insert_data["presenza_diabete"] = $_POST['diabete'];
}
else {
}
if($_POST['diabete'] == 'Y' && (isset($_POST['specDiabete'])) && (!empty($_POST['specDiabete']))){
    $insert_data["periodo_diabete"] = $_POST['specDiabete'];
}
else {
}
if((isset($_POST['emoglobina'])) && (!empty($_POST['emoglobina']))){
    $insert_data["presenza_alterazione_emoglobina"] = $_POST['emoglobina'];
}
else {
}
if($_POST['emoglobina'] == 'Y' && (isset($_POST['specEmoglobina'])) && (!empty($_POST['specEmoglobina']))){
    $insert_data["tipologie_alterazione_emoglobina"] = $_POST['specEmoglobina'];
}
else {
}
if($_POST['specEmoglobina'] == 'altro' && (isset($_POST['specAltroEmo'])) && (!empty($_POST['specAltroEmo']))){
    $insert_data["specifica_tipologie_alterazione_emoglobina"] = $_POST['specAltroEmo'];
}
else {
}
if((isset($_POST['coagulazione'])) && (!empty($_POST['coagulazione']))){
    $insert_data["presenza_alterazione_coagulazione"] = $_POST['coagulazione'];
}
else {
}
if((isset($_POST['autoimmuni'])) && (!empty($_POST['autoimmuni']))){
    $insert_data["presenza_malattie_autoimmuni"] = $_POST['autoimmuni'];
}
else {
}
if((isset($_POST['infezioni'])) && (!empty($_POST['infezioni']))){
    $insert_data["presenza_infezioni_materne"] = $_POST['infezioni'];
}
else {
}
if($_POST['infezioni'] == 'Y' && (isset($_POST['preinfezioni'])) && (!empty($_POST['preinfezioni']))){
    $spec_pato_atto = "";
    $spec_pato_atto = implode(",", $_POST['preinfezioni']);
    $insert_data["tipologie_infezioni_materne_preconcezionale"] = $spec_pato_atto;
}
else {
}
if((isset($_POST['altroPre'])) && (!empty($_POST['altroPre']))){
    $insert_data["specifica_tipologie_infezioni_materne_preconcezionale"] = $_POST['altroPre'];
}
else {
}
if($_POST['infezioni'] == 'Y' && (isset($_POST['periinfezioni'])) && (!empty($_POST['periinfezioni']))){
    $spec_pato_atto2 = "";
    $spec_pato_atto2 = implode(",", $_POST['periinfezioni']);
    $insert_data["tipologie_infezioni_materne_peri_postconcezionale"] = $spec_pato_atto2;
}
else {
}
if((isset($_POST['altroPeri'])) && (!empty($_POST['altroPeri']))){
    $insert_data["specifica_tipologie_infezioni_materne_peri_postconcezionale"] = $_POST['altroPeri'];
}
else {
}
if((isset($_POST['altre_patologie'])) && (!empty($_POST['altre_patologie']))){
    $insert_data["altre_patologie"] = $_POST['altre_patologie'];
}
else {
}
if($_POST['altre_patologie'] == 'Y' && (isset($_POST['patologie'])) && (!empty($_POST['patologie']))){
    $spec_pato_atto3 = "";
    $spec_pato_atto3 = implode(",", $_POST['patologie']);
    $insert_data["tipo_altre_patologie"] = $spec_pato_atto3;
}
else {
}
if((isset($_POST['specAltrePato'])) && (!empty($_POST['specAltrePato']))){
    $insert_data["specifica_altre_patologie"] = $_POST['specAltrePato'];
}
else {
}

if ((isset($_POST['screening'])) && (!empty(trim($_POST['screening'])))) {
    $insert_data["screening"] = trim($_POST['screening']);
} else {
}

if (trim($_POST['screening']) == 'Y' && (isset($_POST['tipo_screening'])) && (!empty($_POST['tipo_screening']))) {
    $spec_pato_atto4 = "";
    $spec_pato_atto4 = implode(",", $_POST['tipo_screening']);
    $insert_data["tipo_screening"] = $spec_pato_atto4;
} else {
}

if ((isset($_POST['sanguematerno'])) && (!empty(trim($_POST['sanguematerno'])))) {
    $insert_data["sangue_materno"] = trim($_POST['sanguematerno']);
} else {
}

if ((isset($_POST['dataDNA'])) && (!empty(trim($_POST['dataDNA'])))) {
    list($day, $month, $year) = explode("-", trim($_POST['dataDNA']));
    $ymdN = "$year-$month-$day";
    $insert_data["dataDNA"] = $ymdN;
} else {
}

if ((isset($_POST['risultato'])) && (!empty(trim($_POST['risultato'])))) {
    $insert_data["risultato"] = trim($_POST['risultato']);
} else {
}

if ((isset($_POST['altriTest'])) && (!empty(trim($_POST['altriTest'])))) {
    $insert_data["altri_test"] = trim($_POST['altriTest']);
} else {
}

echo "qui";

// 
if($_SESSION["patologie_gestF"] != "Y"){
	echo "insert";
    //creo la connessione con il database
    $obj = new patologie_gest();
    // a questo punto posso effettuare la seguente insert
    
    $obj->insert($insert_data);
    var_dump($insert_data);
    $obj->error();
    //log
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = "Inserimento";
    $insert_log["operazione"] = "Inserimento tab patologie gestante MADRE";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    tab_madref();
    loadmenu_feto();
    if($j == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=feto&tab=7");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=feto&tab=5");
    }
    $_SESSION["patologie_gestF"] = "Y";
}
else {
	echo "update";
    $obj = new patologie_gest();
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
    $insert_log["operazione"] = $scritta." tab patologie gestante MADRE";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    tab_madref();
    loadmenu_feto();
    if($j == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=feto&tab=7");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=feto&tab=5");
    }
}
}
function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=fetosw&tab=5");
}
						       
?>