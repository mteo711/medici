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
$insert_data["idpolmone"] = $_SESSION['case_id'];

if((isset($_POST['dxIlo'])) && (!empty($_POST['dxIlo']))){
    $insert_data["polmone_dx_ilo"] = $_POST['dxIlo'];
}
else{
    $insert_data["polmone_dx_ilo"] = 'N';
}
if((isset($_POST['sxIlo'])) && (!empty($_POST['sxIlo']))){
    $insert_data["polmone_sx_ilo"] = $_POST['sxIlo'];
}
else{
    $insert_data["polmone_sx_ilo"] = 'N';
}
if((isset($_POST['dxLS'])) && (!empty($_POST['dxLS']))){
    $insert_data["polmone_dx_lobo_superiore"] = $_POST['dxLS'];
}
else{
    $insert_data["polmone_dx_lobo_superiore"] = 'N';
}
if((isset($_POST['sxLS'])) && (!empty($_POST['sxLS']))){
    $insert_data["polmone_sx_lobo_superiore"] = $_POST['sxLS'];
}
else{
    $insert_data["polmone_sx_lobo_superiore"] = 'N';
}
if((isset($_POST['dxLM'])) && (!empty($_POST['dxLM']))){
    $insert_data["polmone_dx_lobo_medio"] = $_POST['dxLM'];
}
else{
    $insert_data["polmone_dx_lobo_medio"] = 'N';
}
if((isset($_POST['dxLI'])) && (!empty($_POST['dxLI']))){
    $insert_data["polmone_dx_lobo_inferiore"] = $_POST['dxLI'];
}
else{
    $insert_data["polmone_dx_lobo_inferiore"] = 'N';
}
if((isset($_POST['sxLI'])) && (!empty($_POST['sxLI']))){
    $insert_data["polmone_sx_lobo_inferiore"] = $_POST['sxLI'];
}
else{
    $insert_data["polmone_sx_lobo_inferiore"] = 'N';
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
    $insert_log["operazione"] = $scritta." tab prelievi POLMONE";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
//    require_once("../comuni/loadtab_prelievi.php");
    tab_prelievi();
    loadmenu_sids();
    if($i == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=prelievi&tipo=sids&tab=25");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=prelievi&tipo=sids&tab=22");
    }
    $_SESSION["prelievi_sids2"] == 'Y';

}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=prelievi&tipo=sids&tab=22");

}					       
?>