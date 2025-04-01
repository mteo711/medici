<?php
session_start();
include_once("databases.php");
include_once("prelievi_sids.php");
require_once("loadtab_prelievi.php");
require_once("loadmenu_sids.php");
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
$insert_data["idcircolatorio"] = $_SESSION['case_id'];

if((isset($_POST['paragangli'])) && (!empty($_POST['paragangli']))){
    $insert_data["app_circolatorio_paragangli_aortico_polmonari"] = $_POST['paragangli'];
}
else{
    $insert_data["app_circolatorio_paragangli_aortico_polmonari"] = 'N';
}
if((isset($_POST['aorta'])) && (!empty($_POST['aorta']))){
    $insert_data["app_circolatorio_aorta"] = $_POST['aorta'];
}
else{
    $insert_data["app_circolatorio_aorta"] = 'N';
}
if((isset($_POST['tronco'])) && (!empty($_POST['tronco']))){
    $insert_data["app_circolatorio_tronco_polmonare"] = $_POST['tronco'];
}
else{
    $insert_data["app_circolatorio_tronco_polmonare"] = 'N';
}
if((isset($_POST['pericardio'])) && (!empty($_POST['pericardio']))){
    $insert_data["app_circolatorio_pericardio"] = $_POST['pericardio'];
}
else{
    $insert_data["app_circolatorio_pericardio"] = 'N';
}
if((isset($_POST['atrioDX'])) && (!empty($_POST['atrioDX']))){
    $insert_data["app_circolatorio_parete_atrio_dx"] = $_POST['atrioDX'];
}
else{
    $insert_data["app_circolatorio_parete_atrio_dx"] = 'N';
}
if((isset($_POST['atrioSX'])) && (!empty($_POST['atrioSX']))){
    $insert_data["app_circolatorio_parete_atrio_sx"] = $_POST['atrioSX'];
}
else{
    $insert_data["app_circolatorio_parete_atrio_sx"] = 'N';
}
if((isset($_POST['setto'])) && (!empty($_POST['setto']))){
    $insert_data["app_circolatorio_setto_interventricolare"] = $_POST['setto'];
}
else{
    $insert_data["app_circolatorio_setto_interventricolare"] = 'N';
}
if((isset($_POST['ventricoloDX'])) && (!empty($_POST['ventricoloDX']))){
    $insert_data["app_circolatorio_parete_ventricolo_dx"] = $_POST['ventricoloDX'];
}
else{
    $insert_data["app_circolatorio_parete_ventricolo_dx"] = 'N';
}
if((isset($_POST['ventricoloSX'])) && (!empty($_POST['ventricoloSX']))){
    $insert_data["app_circolatorio_parete_ventricolo_sx"] = $_POST['ventricoloSX'];
}
else{
    $insert_data["app_circolatorio_parete_ventricolo_sx"] = 'N';
}
if((isset($_POST['discendenteA'])) && (!empty($_POST['discendenteA']))){
    $insert_data["app_circolatorio_coronaria_sx_ramo_disc_ant"] = $_POST['discendenteA'];
}
else{
    $insert_data["app_circolatorio_coronaria_sx_ramo_disc_ant"] = 'N';
}
if((isset($_POST['circonflesso'])) && (!empty($_POST['circonflesso']))){
    $insert_data["app_circolatorio_coronaria_sx_ramo_circ"] = $_POST['circonflesso'];
}
else{
    $insert_data["app_circolatorio_coronaria_sx_ramo_circ"] = 'N';
}
if((isset($_POST['discendenteP'])) && (!empty($_POST['discendenteP']))){
    $insert_data["app_circolatorio_coronaria_dx_ramo_disc_post"] = $_POST['discendenteP'];
}
else{
    $insert_data["app_circolatorio_coronaria_dx_ramo_disc_post"] = 'N';
}
if((isset($_POST['marginale'])) && (!empty($_POST['marginale']))){
    $insert_data["app_circolatorio_coronaria_dx_ramo_marg"] = $_POST['marginale'];
}
else{
    $insert_data["app_circolatorio_coronaria_dx_ramo_marg"] = 'N';
}


    echo "update";
    $obj = new prelievi_sids();
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
    $insert_log["operazione"] = $scritta." tab prelievi APP.CIRCOLAT.";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
//    require_once("../comuni/loadtab_prelievi.php");
    tab_prelievi();
    loadmenu_sids();
    if($i == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=prelievi&tipo=sids&tab=26");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=prelievi&tipo=sids&tab=24");
    }
    $_SESSION["prelievi_sids3"] == 'Y';

}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=prelievi&tipo=sids&tab=24");

}					       
?>