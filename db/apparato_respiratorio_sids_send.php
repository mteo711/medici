<?php
session_start();
include_once("databases.php");
include_once("apparato_respiratorio_sids.php");
require_once("loadtab_autopsia.php");
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
$insert_data["dati_protocollo_sids_schede_id"] = $_SESSION['case_id'];

if((isset($_POST['laringe'])) && (!empty($_POST['laringe']))){
    $insert_data["laringe"] = $_POST['laringe'];
}
else{
}
if((isset($_POST['trachea'])) && (!empty($_POST['trachea']))){
    $insert_data["trachea"] = $_POST['trachea'];
}
else{
}
if((isset($_POST['bronchi'])) && (!empty($_POST['bronchi']))){
    $insert_data["bronchi_principali"] = $_POST['bronchi'];
}
else{
}

if((isset($_POST['polDX'])) && (!empty($_POST['polDX'])) && (ctype_digit($_POST['polDX']))){
    $insert_data["polmone_dx_peso_gr"] = $_POST['polDX'];
}
else{
}
if((isset($_POST['polSX'])) && (!empty($_POST['polSX'])) && (ctype_digit($_POST['polSX']))){
    $insert_data["polmone_sx_peso_gr"] = $_POST['polSX'];
}
else{
}
if((isset($_POST['lobDX'])) && (!empty($_POST['lobDX'])) && (ctype_digit($_POST['lobDX']))){
    $insert_data["num_lobi_dx"] = $_POST['lobDX'];
}
else{
}
if((isset($_POST['lobSX'])) && (!empty($_POST['lobSX'])) && (ctype_digit($_POST['lobSX']))){
    $insert_data["num_lobi_sx"] = $_POST['lobSX'];
}
else{
}
if((isset($_POST['volume'])) && (!empty($_POST['volume']))){
    $insert_data["volume"] = $_POST['volume'];
}
else{
}
if((isset($_POST['consistenza'])) && (!empty($_POST['consistenza']))){
    $insert_data["consistenza"] = $_POST['consistenza'];
}
else{
}
if((isset($_POST['colore'])) && (!empty($_POST['colore']))){
    $insert_data["colore"] = $_POST['colore'];
}
else{
}
if((isset($_POST['superficie'])) && (!empty($_POST['superficie']))){
    $insert_data["sup_esterna"] = $_POST['superficie'];
}
else{
}
if((isset($_POST['taglio'])) && (!empty($_POST['taglio']))){
    $insert_data["al_taglio"] = $_POST['taglio'];
}
else{
}
echo "qui";

if($_SESSION["apparato_respiratorio_sids"] != "Y"){

    $objj = new apparato_respiratorio_sids();
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
    $insert_log["operazione"] = $scritta." tab app. respirat.";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);

//    require_once("../comuni/loadtab_autopsia.php");
    tab_autopsia();
    loadmenu_sids();
    if($i == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=21");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=19");
    }
    $_SESSION["apparato_respiratorio_sids"] = "Y";
}
else {
    echo "update";
    $obj = new apparato_respiratorio_sids();
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
    $insert_log["operazione"] = $scritta." tab app. respirat.";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
//    require_once("../comuni/loadtab_autopsia.php");
    tab_autopsia();
    loadmenu_sids();
    if($i == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=21");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=19");
    }

}
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=19");

}					       
?>