<?php
session_start();
include_once("databases.php");
include_once("esame_esterno_mf.php");
include_once("dati_protocollo_mf.php");
require_once("loadtab_autopsiaf.php");
require_once("loadmenu_feto.php");
require_once("utils.php");
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
$nFile = generateRandomString();
$insert_data = array();
$insert_data["dati_protocollo_mf_schede_id"] = $_SESSION['case_id'];

$insert_prot["schede_id"] = $_SESSION['case_id'];

if((isset($_POST['numAuto'])) && (!empty($_POST['numAuto']))){
    $insert_prot["num_autopsia"] = $_POST['numAuto'];
}
else {
}
if((isset($_POST['dataA'])) && (!empty($_POST['dataA']))){
    list($day, $month, $year) = explode("-", $_POST['dataA']);
    $ymdA = "$year-$month-$day";
    $insert_prot["data_autopsia"] = $ymdA;
}
else {
}
if((isset($_POST['dr'])) && (!empty($_POST['dr']))){
    $insert_prot["medico_settore"] = $_POST['dr'];
}
else {
}
    
if((isset($_POST['documenti'])) && (!empty($_POST['documenti']))){
    $insert_data["documentazione_foto_video"] = $_POST['documenti'];
}
else{
}
if($_POST['documenti']=='Y' && (isset($_FILES['allegati']['name'])) && (!empty($_FILES['allegati']['name']))){
    $target = "../esame_esterno_doc/";  
    $target = $target . basename( $_FILES['allegati']['name']);
    $temp = explode(".", $_FILES["allegati"]["name"]);
    $newfilename = "../esame_esterno_doc/" . $nFile . '.' . end($temp);
    $pic = $nFile. '.' . end($temp);
    //echo $newfilename;
    //Writes the photo to the server  
    if(move_uploaded_file($_FILES['allegati']['tmp_name'], $newfilename))  {   
        //Tells you if its all ok  
        echo "The file has been uploaded, and your information has been added to the directory";
        $insert_data["documentazione"] = $pic;
    }  
    else {   
        //Gives and error if its not  
        echo "Sorry, there was a problem uploading your file.";  
    }
    
}
else{
}
if((isset($_POST['peso'])) && (ctype_digit($_POST['peso'])) && (!empty($_POST['peso']))){
    $insert_data["peso_gr"] = $_POST['peso'];
}
else {
}
if((isset($_POST['lung'])) && (ctype_digit($_POST['lung'])) && (!empty($_POST['lung']))){
    $insert_data["lunghezza_tot_cm"] = $_POST['lung'];
}
else {
}
if((isset($_POST['lungVP'])) && (!empty($_POST['lungVP']))){
    $insert_data["lunghezza_vertice_podice_cm"] = $_POST['lungVP'];
}
else{
}
if((isset($_POST['circC'])) && (!empty($_POST['circC']))){
    $insert_data["circ_cranica_cm"] = $_POST['circC'];
}
else{
}
if((isset($_POST['circT'])) && (!empty($_POST['circT']))){
    $insert_data["circ_toracica_cm"] = $_POST['circT'];
}
else{
}
if((isset($_POST['circA'])) && (!empty($_POST['circA']))){
    $insert_data["circ_addom_cm"] = $_POST['circA'];
}
else{
}
if((isset($_POST['lungO'])) && (!empty($_POST['lungO']))){
    $insert_data["lunghezza_omero_cm"] = $_POST['lungO'];
}
else{
}
if((isset($_POST['lungF'])) && (!empty($_POST['lungF']))){
    $insert_data["lunghezza_femore_cm"] = $_POST['lungF'];
}
else{
}
if((isset($_POST['lungP'])) && (!empty($_POST['lungP']))){
    $insert_data["lunghezza_piede"] = $_POST['lungP'];
}
else{
}
if((isset($_POST['monc'])) && (!empty($_POST['monc']))){
    $insert_data["moncone_ombelicale_cm"] = $_POST['monc'];
}
else{
}
if((isset($_POST['percC'])) && (!empty($_POST['percC']))){
    $insert_data["percentile_crescita"] = $_POST['percC'];
}
else{
}
if((isset($_POST['plica'])) && (!empty($_POST['plica']))){
    $insert_data["plica_nucale_diametro_trasverso_mm"] = $_POST['plica'];
}
else{
}
if((isset($_POST['fenotipo'])) && (!empty($_POST['fenotipo']))){
    $insert_data["descrizione_fenotipo"] = $_POST['fenotipo'];
}
else{
}
if((isset($_POST['nutrizione'])) && (!empty($_POST['nutrizione']))){
    $insert_data["nutrizione"] = $_POST['nutrizione'];
}
else{
}
if((isset($_POST['idrope'])) && (!empty($_POST['idrope']))){
    $insert_data["idrope_cutanea"] = $_POST['idrope'];
}
else{
}
if((isset($_POST['igroma'])) && (!empty($_POST['igroma']))){
    $insert_data["igroma_cistico_collo"] = $_POST['igroma'];
}
else{
}
if((isset($_POST['macerazione'])) && (!empty($_POST['macerazione']))){
    $insert_data["macerazione_grado"] = $_POST['macerazione'];
}
else{
}
if((isset($_POST['colorito'])) && (!empty($_POST['colorito']))){
    $insert_data["colorito"] = $_POST['colorito'];
}
else{
}
if((isset($_POST['specS'])) && (!empty($_POST['specS']))){
    $insert_data["specifica_sede_marezzature_petecchie"] = $_POST['specS'];
}
else{
}
if((isset($_POST['vernice'])) && (!empty($_POST['vernice']))){
    $insert_data["vernice_caseosa_sede_quantita"] = $_POST['vernice'];
}
else{
}
if((isset($_POST['genitali'])) && (!empty($_POST['genitali']))){
    $insert_data["caratteristiche_genitali"] = $_POST['genitali'];
}
else{
}
if((isset($_POST['estremita'])) && (!empty($_POST['estremita']))){
    $insert_data["estremita"] = $_POST['estremita'];
}
else{
}
if((isset($_POST['cordone'])) && (!empty($_POST['cordone']))){
    $insert_data["moncone_cordone_ombelicale"] = $_POST['cordone'];
}
else{
}
if((isset($_POST['nvasi'])) && (!empty($_POST['nvasi']))){
    $insert_data["moncone_cordone_ombelicale_num_vasi"] = $_POST['nvasi'];
}
else{
}

echo "qui";

if($_SESSION["esame_esterno_mf"] != "Y"){
	echo "insert";
    //creo la connessione con il database
    $objp = new dati_protocollo_mf();
	$condition1= array("schede_id" => $_SESSION['case_id']);
	$objp->update($insert_prot, $condition1);
	var_dump($insert_prot);
	$objp->error();
    
    
    $objj = new esame_esterno_mf();
    // a questo punto posso effettuare la seguente insert
    $objj->insert($insert_data);
    var_dump($insert_data);
    $objj->error();
    
    //log
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = "Inserimento";
    $insert_log["operazione"] = "Inserimento tab autopsia ESAME ESTERNO";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    
    tab_autopsiaf();
    loadmenu_feto();
    if($i == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=16");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=0");
    }
    $_SESSION["esame_esterno_sids"] = "Y";
}
else {
	echo "update";
	$objp = new dati_protocollo_mf();
	$condition1= array("schede_id" => $_SESSION['case_id']);
	$objp->update($insert_prot, $condition1);
	var_dump($insert_prot);
	$objp->error();
	
    $obj = new esame_esterno_mf();
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
    $insert_log["operazione"] = $scritta." tab autopsia ESAME ESTERNO";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    

    tab_autopsiaf();
    loadmenu_feto();
    if($i == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=16");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=0");
    }

}
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=0");

}					       
?>