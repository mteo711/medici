<?php
session_start();
include_once("databases.php");
include_once("schede.php");
include_once("allattamento.php");
include_once("scheda_sids.php");
include_once("log_activities.php");
require_once("loadmenu_feto.php");
require_once("loadmenu_sids.php");
require_once("loadtab_annessif.php");
require_once("loadtab_autopsia.php");
require_once("loadtab_autopsiaf.php");
require_once("loadtab_consenso.php");
require_once("loadtab_esamimf.php");
require_once("loadtab_feto.php");
require_once("loadtab_latt.php");
require_once("loadtab_madre.php");
require_once("loadtab_madref.php");
require_once("loadtab_padre.php");
require_once("loadtab_padref.php");
require_once("loadtab_prelievi.php");
require_once("loadtab_prelievif.php");
require_once("loadtab_scheda.php");
include_once("log_activities.php");

//setto le variabili di sessione.
$insert_data1 = array(); 
$insert_data1["data_creazione"] = date("Y-m-d");
$insert_data1["bloccata"] = "N";
$insert_data1["completa"] = "N";
$insert_data1["consenso_diag"] = "N";
$insert_data1["consenso_analisi_gen"] = "N";
$insert_data1["consenso_analisi_toss"] = "N";
$insert_data1["nazionale"] = "Y";


if((isset($_POST['idcaso'])) && (!empty($_POST['idcaso']))){
	$_SESSION["id_caso"] = $_POST['idcaso'];
	$insert_data1["idcaso_provv"] = $_SESSION["id_caso"];
}
else {
}
if((isset($_POST['info'])) && (!empty($_POST['info']))){ 
	$insert_data1["info"] = $_POST['info'];
}
else {
}
if((isset($_POST['centro'])) && (!empty($_POST['centro']))){ 
	$insert_data1["utenti_centri_id"] = $_POST['centro'];
	$_SESSION["class2"] = "";
}
else {
	$_SESSION["class2"] = "errors";
}
if((isset($_POST['tipo_scheda'])) && (!empty($_POST['tipo_scheda']))){
	$_SESSION["scheda_tipologia"] = $_POST['tipo_scheda'];
	$insert_data1["tipologia"] = $_SESSION["scheda_tipologia"];
}
else {
}
$obj = new schede();
// a questo punto posso effettuare la seguente insert

if ($_SESSION["class2"] == "errors"){
	header("Location:../index_".$_SESSION["tipo_usr"].".php?menu=crea_naz&error2=".$_SESSION["class2"]."");
}
else {
	$obj->insert($insert_data1);
	var_dump($insert_data1);
	$obj->error();
	$_SESSION["update"] = "false";
    $_SESSION["stato"] = "aperta";
    
    $record = $obj->fetchRecord(array("idcaso_provv"=>$_SESSION["id_caso"]));
    $_SESSION["case_id"] = $record['id'];
    //log
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = "Nuova scheda";
    $insert_log["operazione"] = "Inserimento di una nuova scheda";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
	if($_SESSION["scheda_tipologia"] == 'sids'){
        loadmenu_sids();
        tab_lattante();
        tab_scheda();
        tab_madre();
        tab_padre();
        tab_consenso();
        tab_autopsia();
        tab_prelievi();
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=sids&tipo=sids&tab=1");
	}
	else if($_SESSION["scheda_tipologia"] == 'morte fetale'){
        loadmenu_feto();
        tab_feto();
        tab_madref();
        tab_esamimf();
        tab_padref();
        tab_consenso();
        tab_autopsiaf();
        tab_annessif();
        tab_prelievif();
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=scheda&tipo=feto&tab=1");
	}
}
					       
?>