<?php
session_start();
include_once("databases.php");
include_once("esame_esterno_sids.php");
include_once("dati_protocollo_sids.php");
require_once("loadtab_autopsia.php");
require_once("loadmenu_sids.php");
include_once("log_activities.php");
require_once("utils.php");

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
$insert_data["dati_protocollo_sids_schede_id"] = $_SESSION['case_id'];

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
if((isset($_POST['segni'])) && (!empty($_POST['segni']))){
    $insert_data["segni_tanatologici"] = $_POST['segni'];
}
else{
}
if((isset($_POST['sangueN'])) && (!empty($_POST['sangueN']))){
    $insert_data["presenza_sangue_naso"] = $_POST['sangueN'];
}
else{
}
if((isset($_POST['sangueB'])) && (!empty($_POST['sangueB']))){
    $insert_data["presenza_sangue_bocca"] = $_POST['sangueB'];
}
else{
}
if((isset($_POST['sangueF'])) && (!empty($_POST['sangueF']))){
    $insert_data["presenza_urine_sangue_feci_orifizi"] = $_POST['sangueF'];
}
else{
}
if($_POST['sangueF']=='Y' && (isset($_POST['specF'])) && (!empty($_POST['specF']))){
    $insert_data["specifica_presenza_urine_sangue_feci_orifizi"] = $_POST['specF'];
}
else{
}
echo "qui";

if($_SESSION["esame_esterno_sids"] != "Y"){
	echo "insert";
    //creo la connessione con il database
    $objp = new dati_protocollo_sids();
	$condition1= array("schede_id" => $_SESSION['case_id']);
	$objp->update($insert_prot, $condition1);
	var_dump($insert_prot);
	$objp->error();
    
    
    $objj = new esame_esterno_sids();
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
    
    
//    require_once("../comuni/loadtab_autopsia.php");
    tab_autopsia();
    loadmenu_sids();
    if($i == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=16");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=0");
    }
    $_SESSION["esame_esterno_sids"] = "Y";
}
else {
	echo "update";
	$objp = new dati_protocollo_sids();
	$condition1= array("schede_id" => $_SESSION['case_id']);
	$objp->update($insert_prot, $condition1);
	var_dump($insert_prot);
	$objp->error();
	
    $obj = new esame_esterno_sids();
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
    $insert_log["operazione"] = $scritta." tab autopsia ESAME ESTERNO";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    
//    require_once("../comuni/loadtab_autopsia.php");
    tab_autopsia();
    loadmenu_sids();
    if($i == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=16");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=0");
    }

}
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=0");

}					       
?>