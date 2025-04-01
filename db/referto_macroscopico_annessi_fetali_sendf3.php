<?php
session_start();
include_once("databases.php");
include_once("referto_macroscopico_annessi_fetali.php");
require_once("loadtab_annessif.php");
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
$insert_data["iddisco"] = $_SESSION['case_id'];

if((isset($_POST['peso'])) && (!empty($_POST['peso']))){
    $insert_data["disco_coriale_peso_gr"] = $_POST['peso'];
}
else{
}
if((isset($_POST['diam'])) && (!empty($_POST['diam']))){
    $insert_data["disco_coriale_diametro1_cm"] = $_POST['diam'];
}
else{
}
if((isset($_POST['diammm'])) && (!empty($_POST['diammm']))){
    $insert_data["disco_coriale_diametro2_cm"] = $_POST['diammm'];
}
else{
}
if((isset($_POST['spessm'])) && (!empty($_POST['spessm']))){
    $insert_data["disco_coriale_spessore_max_cm"] = $_POST['spessm'];
}
else{
}
if((isset($_POST['spessmm'])) && (!empty($_POST['spessmm']))){
    $insert_data["disco_coriale_spessore_min_cm"] = $_POST['spessmm'];
}
else{
}
if((isset($_POST['forma'])) && (!empty($_POST['forma']))){
    $insert_data["disco_coriale_forma"] = $_POST['forma'];
}
else{
}
if((isset($_POST['vfetale'])) && (!empty($_POST['vfetale']))){
    $insert_data["versante_fetale"] = $_POST['vfetale'];
}
else{
}
if((isset($_POST['vmaterno'])) && (!empty($_POST['vmaterno']))){
    $insert_data["versante_materno"] = $_POST['vmaterno'];
}
else{
}
if((isset($_POST['emaR'])) && (!empty($_POST['emaR']))){
    $insert_data["ematomi_retroplacentari"] = $_POST['emaR'];
}
else{
    $insert_data["ematomi_retroplacentari"] = 'N';
}
if((isset($_POST['emaRV'])) && (!empty($_POST['emaRV']))){
    $insert_data["ematomi_retroplacentari_diametro_max_cm"] = $_POST['emaRV'];
}
else{
}
if((isset($_POST['emaM'])) && (!empty($_POST['emaM']))){
    $insert_data["ematomi_marginali"] = $_POST['emaM'];
}
else{
    $insert_data["ematomi_marginali"] = 'N';
}
if((isset($_POST['emaMV'])) && (!empty($_POST['emaMV']))){
    $insert_data["ematomi_marginali_diametro_max_cm"] = $_POST['emaMV'];
}
else{
}
if((isset($_POST['emaI'])) && (!empty($_POST['emaI']))){
    $insert_data["ematomi_intervillosi"] = $_POST['emaI'];
}
else{
    $insert_data["ematomi_intervillosi"] = 'N';
}
if((isset($_POST['emaIV'])) && (!empty($_POST['emaIV']))){
    $insert_data["ematomi_intervillosi_diametro_max_cm"] = $_POST['emaIV'];
}
else{
}
if((isset($_POST['infR'])) && (!empty($_POST['infR']))){
    $insert_data["infarti_recenti"] = $_POST['infR'];
}
else{
    $insert_data["infarti_recenti"] = 'N';
}
if((isset($_POST['infRV'])) && (!empty($_POST['infRV']))){
    $insert_data["infarti_recenti_diametro_max_cm"] = $_POST['infRV'];
}
else{
}
if((isset($_POST['infV'])) && (!empty($_POST['infV']))){
    $insert_data["infarti_vecchia_data"] = $_POST['infV'];
}
else{
    $insert_data["infarti_vecchia_data"] = 'N';
}
if((isset($_POST['infVV'])) && (!empty($_POST['infVV']))){
    $insert_data["infarti_vecchia_diametro_max_cm"] = $_POST['infVV'];
}
else{
}
if((isset($_POST['distribuzione'])) && (!empty($_POST['distribuzione']))){
    $insert_data["vasi_coriali_distribuzione"] = $_POST['distribuzione'];
}
else{
}

    echo "update";
    $obj = new referto_macroscopico_annessi_fetali();
    $condition= array("schede_id" => $_SESSION['case_id']);
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
    $insert_log["operazione"] = $scritta." tab annessi fetali DISCO CORIALE";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    tab_annessif();
    loadmenu_feto();
    if($i == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=referto&tipo=feto&tab=4");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=referto&tipo=feto&tab=2");
    }
    $_SESSION["annessi3"] = "Y";
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=referto&tipo=feto&tab=2");

}					       
?>