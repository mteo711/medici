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
$insert_data["idgastro"] = $_SESSION['case_id'];

if((isset($_POST['esofago'])) && (!empty($_POST['esofago']))){
    $insert_data["tratto_gastroenterico_esofago"] = $_POST['esofago'];
}
else{
    $insert_data["tratto_gastroenterico_esofago"] = 'N';
}
if((isset($_POST['stomaco'])) && (!empty($_POST['stomaco']))){
    $insert_data["tratto_gastroenterico_stomaco"] = $_POST['stomaco'];
}
else{
    $insert_data["tratto_gastroenterico_stomaco"] = 'N';
}
if((isset($_POST['duodeno'])) && (!empty($_POST['duodeno']))){
    $insert_data["tratto_gastroenterico_duodeno"] = $_POST['duodeno'];
}
else{
    $insert_data["tratto_gastroenterico_duodeno"] = 'N';
}
if((isset($_POST['piccolo'])) && (!empty($_POST['piccolo']))){
    $insert_data["tratto_gastroenterico_piccolo_intestino"] = $_POST['piccolo'];
}
else{
    $insert_data["tratto_gastroenterico_piccolo_intestino"] = 'N';
}
if((isset($_POST['grosso'])) && (!empty($_POST['grosso']))){
    $insert_data["tratto_gastroenterico_grosso_intestino"] = $_POST['grosso'];
}
else{
    $insert_data["tratto_gastroenterico_grosso_intestino"] = 'N';
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
    $insert_log["operazione"] = $scritta." tab prelievi TRATTO GASTRO ENT.";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
//    require_once("../comuni/loadtab_prelievi.php");
    tab_prelievi();
    loadmenu_sids();
    if($i == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=prelievi&tipo=sids&tab=27");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=prelievi&tipo=sids&tab=25");
    }
    $_SESSION["prelievi_sids4"] == 'Y';

}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=prelievi&tipo=sids&tab=25");

}					       
?>