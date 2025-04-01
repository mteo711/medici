<?php
session_start();
include_once("databases.php");
include_once("scheda_feto.php");
require_once("loadtab_feto.php");
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
$insert_data["dati_feto_schede_id"] = $_SESSION['case_id'];

if((isset($_POST['liquido'])) && (!empty($_POST['liquido']))){
    $insert_data["liquido_amniotico"] = $_POST['liquido'];
}
else {
}
if($_POST['liquido'] == 'patologico' && (isset($_POST['specL'])) && (!empty($_POST['specL']))){
    $insert_data["specifica_patologico_liquido_amniotico"] = $_POST['specL'];
}
else {
}
if((isset($_POST['rx'])) && (!empty($_POST['rx']))){
    $insert_data["RX_scheletro"] = $_POST['rx'];
}
else {
}
if($_POST['rx'] == 'Y' && (isset($_POST['specRX'])) && (!empty($_POST['specRX']))){
    $insert_data["specifica_RX_scheletro"] = $_POST['specRX'];
}
else {
}
if((isset($_POST['prelievi'])) && (!empty($_POST['prelievi']))){
    $insert_data["prelievi_secondo_prot_naz"] = $_POST['prelievi'];
}
else {
}
if((isset($_POST['riscontro'])) && (!empty($_POST['riscontro']))){
    $insert_data["effettuato_riscontro_diagnostico"] = $_POST['riscontro'];
}
else {
}
if($_POST['riscontro'] == 'Y' && (isset($_POST['sede'])) && (!empty($_POST['sede']))){
    $insert_data["riscontro_diagnostico_dove"] = $_POST['sede'];
}
else {
}
if($_POST['riscontro'] == 'Y' && (isset($_POST['dataR'])) && (!empty($_POST['dataR']))){
    list($day, $month, $year) = explode("-", $_POST['dataR']);
    $ymdR = "$year-$month-$day";
    $insert_data["data_riscontro_diagnostico"] = $ymdR;
}
else {
}
if($_POST['riscontro'] == 'Y' && (isset($_POST['medico'])) && (!empty($_POST['medico']))){
    $insert_data["medico_effettuato_riscontro"] = $_POST['medico'];
}
else {
}

echo "qui";

// 
if($_SESSION["scheda_feto"] != "Y"){
	echo "insert";
    //creo la connessione con il database
    $obj = new scheda_feto();
    // a questo punto posso effettuare la seguente insert
    
    $obj->insert($insert_data);
    var_dump($insert_data);
    $obj->error();
    tab_feto();
    loadmenu_feto();
    //log
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = "Inserimento";
    $insert_log["operazione"] = "Inserimento tab scheda feto";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    if($j == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=feto&tab=1");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=scheda&tipo=feto&tab=1");
    }
    $_SESSION["scheda_feto"] = "Y";
}
else {
	echo "update";
    $obj = new scheda_feto();
    $condition= array("dati_feto_schede_id" => $_SESSION['case_id']);
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
    $insert_log["operazione"] = $scritta." tab scheda feto";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    tab_feto();
    loadmenu_feto();
    if($j == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=feto&tab=1");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=scheda&tipo=feto&tab=1");
    }
}
}
function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=scheda&tipo=feto&tab=1");
}
						       
?>