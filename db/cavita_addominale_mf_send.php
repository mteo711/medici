<?php
session_start();
include_once("databases.php");
include_once("cavita_addominale_mf.php");
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
if((isset($_POST['numAr'])) && (!empty($_POST['numAr'])) && (ctype_digit($_POST['numAr']))){
    $insert_data["num_arterie_vena_ombelicale_normali"] = $_POST['numAr'];
}
else{
}
if((isset($_POST['tipoA'])) && (!empty($_POST['tipoA']))){
    $insert_data["arterie_vena_ombelicale_stato"] = $_POST['tipoA'];
}
else{
}
if((isset($_POST['dotto'])) && (!empty($_POST['dotto']))){
    $insert_data["dotto_Aranzio"] = $_POST['dotto'];
}
else{
}
if((isset($_POST['vene'])) && (!empty($_POST['vene']))){
    $insert_data["vene_sovraepatiche_vena_cava_inf"] = $_POST['vene'];
}
else{
}
if((isset($_POST['specV'])) && (!empty($_POST['specV']))){
    $insert_data["specifica_vene_sovraepatiche_vena_cava_inf_malformate"] = $_POST['specV'];
}
else{
}
if((isset($_POST['stomaco'])) && (!empty($_POST['stomaco']))){
    $insert_data["stomaco"] = $_POST['stomaco'];
}
else{
}
if((isset($_POST['intestino'])) && (!empty($_POST['intestino']))){
    $insert_data["piccolo_grosso_intestino"] = $_POST['intestino'];
}
else{
}
if((isset($_POST['specI'])) && (!empty($_POST['specI']))){
    $insert_data["specifica_piccolo_grosso_intestino_malformazioni"] = $_POST['specI'];
}
else{
}
if((isset($_POST['appendice'])) && (!empty($_POST['appendice']))){
    $insert_data["appendice_ciecale_sita_in"] = $_POST['appendice'];
}
else{
}
if((isset($_POST['pesoFe'])) && (!empty($_POST['pesoFe'])) && (ctype_digit($_POST['pesoFe']))){
    $insert_data["fegato_peso_gr"] = $_POST['pesoFe'];
}
else{
}
if((isset($_POST['volumeF'])) && (!empty($_POST['volumeF']))){
    $insert_data["fegato_volume"] = $_POST['volumeF'];
}
else{
}
if((isset($_POST['isomerismo'])) && (!empty($_POST['isomerismo']))){
    $insert_data["fegato_isomerismo"] = $_POST['isomerismo'];
}
else{
}
if((isset($_POST['specF'])) && (!empty($_POST['specF']))){
    $insert_data["specifica_fegato_isomerismo"] = $_POST['specF'];
}
else{
}
if((isset($_POST['consistenzaF'])) && (!empty($_POST['consistenzaF']))){
    $insert_data["fegato_consistenza"] = $_POST['consistenzaF'];
}
else{
}
if((isset($_POST['superficieF'])) && (!empty($_POST['superficieF']))){
    $insert_data["fegato_superficie"] = $_POST['superficieF'];
}
else{
}
if((isset($_POST['parenchima'])) && (!empty($_POST['parenchima']))){
    $insert_data["fegato_parenchima_al_taglio"] = $_POST['parenchima'];
}
else{
}
if((isset($_POST['colecisti'])) && (!empty($_POST['colecisti']))){
    $insert_data["colecisti"] = $_POST['colecisti'];
}
else{
}
if((isset($_POST['biliari'])) && (!empty($_POST['biliari']))){
    $insert_data["vie_biliarie_extraepatiche"] = $_POST['biliari'];
}
else{
}
if((isset($_POST['pancreas'])) && (!empty($_POST['pancreas']))){
    $insert_data["pancreas"] = $_POST['pancreas'];
}
else{
}
if((isset($_POST['specP'])) && (!empty($_POST['specP']))){
    $insert_data["specifica_pancreas_malformato"] = $_POST['specP'];
}
else{
}
if((isset($_POST['milza'])) && (!empty($_POST['milza']))){
    $insert_data["milza"] = $_POST['milza'];
}
else{
}
if((isset($_POST['numMil'])) && (!empty($_POST['numMil'])) && (ctype_digit($_POST['numMil']))){
    $insert_data["milza_num"] = $_POST['numMil'];
}
else{
}

echo "qui";

if($_SESSION["cavita_addominale_mf"] != "Y"){
	
    $objj = new cavita_addominale_mf();
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
    $insert_log["operazione"] = $scritta." tab cav. addominale";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    tab_autopsiaf();
    loadmenu_feto();
    if($i == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=22");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=20");
    }
    
    $_SESSION["cavita_addominale_mf"] = "Y";
}
else {
	echo "update";
    $obj = new cavita_addominale_mf();
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
    $insert_log["operazione"] = $scritta." tab cav. addominale";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);

    tab_autopsiaf();
    loadmenu_feto();
    if($i == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=22");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=20");
    }

}
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=20");

}					       
?>