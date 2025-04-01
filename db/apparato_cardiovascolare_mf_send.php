<?php
session_start();
include_once("databases.php");
include_once("apparato_cardiovascolare_mf.php");
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

if((isset($_POST['versamenti'])) && (!empty($_POST['versamenti']))){
    $insert_data["versamenti"] = $_POST['versamenti'];
}
else{
}
if((isset($_POST['altro'])) && (!empty($_POST['altro']))){
    $insert_data["altro"] = $_POST['altro'];
}
else{
}
if((isset($_POST['forma'])) && (!empty($_POST['forma']))){
    $insert_data["cuore_forma"] = $_POST['forma'];
}
else{
}
if((isset($_POST['volume'])) && (!empty($_POST['volume']))){
    $insert_data["cuore_volume"] = $_POST['volume'];
}
else{
}
if((isset($_POST['consistenza'])) && (!empty($_POST['consistenza']))){
    $insert_data["cuore_consistenza"] = $_POST['consistenza'];
}
else{
}
if((isset($_POST['epicardio'])) && (!empty($_POST['epicardio']))){
    $insert_data["epicardio"] = $_POST['epicardio'];
}
else{
}
if((isset($_POST['peso'])) && (!empty($_POST['peso'])) && (ctype_digit($_POST['peso']))){
    $insert_data["cuore_peso_gr"] = $_POST['peso'];
}
else{
}
if((isset($_POST['diTr'])) && (!empty($_POST['diTr'])) && (ctype_digit($_POST['diTr']))){
    $insert_data["diametro_trasverso_mm"] = $_POST['diTr'];
}
else{
}
if((isset($_POST['diLo'])) && (!empty($_POST['diLo'])) && (ctype_digit($_POST['diLo']))){
    $insert_data["diametro_longitudinale_mm"] = $_POST['diLo'];
}
else{
}
if((isset($_POST['diAP'])) && (!empty($_POST['diAP'])) && (ctype_digit($_POST['diAP']))){
    $insert_data["diametro_antero_posteriore_mm"] = $_POST['diAP'];
}
else{
}
if((isset($_POST['spVD'])) && (!empty($_POST['spVD'])) && (ctype_digit($_POST['spVD']))){
    $insert_data["spessore_ventricolo_dx_mm"] = $_POST['spVD'];
}
else{
}
if((isset($_POST['spVS'])) && (!empty($_POST['spVS'])) && (ctype_digit($_POST['spVS']))){
    $insert_data["spessore_ventricolo_sx_mm"] = $_POST['spVS'];
}
else{
}
if((isset($_POST['spSI'])) && (!empty($_POST['spSI'])) && (ctype_digit($_POST['spSI']))){
    $insert_data["spessore_setto_interventricolare_mm"] = $_POST['spSI'];
}
else{
}
if((isset($_POST['forame'])) && (!empty($_POST['forame']))){
    $insert_data["forame_ovale"] = $_POST['forame'];
}
else{
}
if((isset($_POST['dotto'])) && (!empty($_POST['dotto']))){
    $insert_data["dotto_arterioso"] = $_POST['dotto'];
}
else{
}
if((isset($_POST['endocardio'])) && (!empty($_POST['endocardio']))){
    $insert_data["endocardio_parietale_valvolare"] = $_POST['endocardio'];
}
else{
}
if((isset($_POST['miocardio'])) && (!empty($_POST['miocardio']))){
    $insert_data["miocardio"] = $_POST['miocardio'];
}
else{
}
if((isset($_POST['osti'])) && (!empty($_POST['osti']))){
    $insert_data["osti_coronarici_seno_coronarico"] = $_POST['osti'];
}
else{
}
if((isset($_POST['coronarie'])) && (!empty($_POST['coronarie']))){
    $insert_data["coronarie"] = $_POST['coronarie'];
}
else{
}
if((isset($_POST['aortaA'])) && (!empty($_POST['aortaA']))){
    $insert_data["aorta_asc_arco_aortico"] = $_POST['aortaA'];
}
else{
}
if((isset($_POST['tronco'])) && (!empty($_POST['tronco']))){
    $insert_data["tronco_polmonare_rami_principali"] = $_POST['tronco'];
}
else{
}
if((isset($_POST['grossi'])) && (!empty($_POST['grossi']))){
    $insert_data["grossi_tronchi_arteriosi_arco"] = $_POST['grossi'];
}
else{
}
if((isset($_POST['aortaT'])) && (!empty($_POST['aortaT']))){
    $insert_data["aorta_toracica_addominale"] = $_POST['aortaT'];
}
else{
}
if((isset($_POST['vene'])) && (!empty($_POST['vene']))){
    $insert_data["vene_cave_tronchi_venosi"] = $_POST['vene'];
}
else{
}

echo "qui";

if($_SESSION["apparato_cardiovascolare_mf"] != "Y"){
	
    $objj = new apparato_cardiovascolare_mf();
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
    $insert_log["operazione"] = $scritta." tab app. cardio.";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    tab_autopsiaf();
    loadmenu_feto();
    if($i == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=20");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=18");
    }
    
    $_SESSION["apparato_cardiovascolare_mf"] = "Y";
}
else {
	echo "update";
    $obj = new apparato_cardiovascolare_mf();
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
    $insert_log["operazione"] = $scritta." tab app. cardio.";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    tab_autopsiaf();
    loadmenu_feto();
    if($i == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=20");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=18");
    }

}
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=18");

}					       
?>