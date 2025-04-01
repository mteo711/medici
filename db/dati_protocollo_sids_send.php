<?php
session_start();
include_once("databases.php");
include_once("dati_protocollo_sids.php");
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
$insert_data["idnote"] = $_SESSION['case_id'];

if((isset($_POST['reperti'])) && (!empty($_POST['reperti']))){
    $insert_data["principali_referti_patologici"] = $_POST['reperti'];
}
else{
}
if((isset($_POST['diagnosi'])) && (!empty($_POST['diagnosi']))){
    $insert_data["diagnosi_anatomo_patologica"] = $_POST['diagnosi'];
}
if((isset($_POST['caso'])) && (!empty($_POST['caso']))){
    $insert_data["caso_di_sids"] = $_POST['caso'];
}

echo "qui";

    echo "update";
    $obj = new dati_protocollo_sids();
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
        $insert_log["operazione"] = $scritta." tab autopsia note";
        $insert_log["schede_id"] = $_SESSION["case_id"];
        $insert_log["id"] = $_SESSION["id_caso"];
        $obja->insert($insert_log);
//    require_once("../comuni/loadtab_autopsia.php");
    tab_autopsia();
    loadmenu_sids();
    if($i == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=prelievi&tipo=sids&tab=22");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=21");
    }
    $_SESSION['dati_protocollo_sids'] = 'Y';
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=21");

}					       
?>