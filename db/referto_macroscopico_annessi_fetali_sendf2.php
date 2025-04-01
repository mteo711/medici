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
$insert_data["idcordone"] = $_SESSION['case_id'];

if((isset($_POST['lungC'])) && (!empty($_POST['lungC']))){
    $insert_data["cordone_ombelicale_lunghezza_cm"] = $_POST['lungC'];
}
else{
}
if((isset($_POST['diamCMax'])) && (!empty($_POST['diamCMax']))){
    $insert_data["cordone_ombelicale_diametro_max_cm"] = $_POST['diamCMax'];
}
else{
}
if((isset($_POST['diamCMin'])) && (!empty($_POST['diamCMin']))){
    $insert_data["cordone_ombelicale_diametro_min_cm"] = $_POST['diamCMin'];
}
else{
}
if((isset($_POST['inserz'])) && (!empty($_POST['inserz']))){
    $insert_data["cordone_ombelicale_inserzione"] = $_POST['inserz'];
}
else{
}
if((isset($_POST['distMC'])) && (!empty($_POST['distMC']))){
    $insert_data["cordone_ombelicale_dist_margine_materno_fetale_cm"] = $_POST['distMC'];
}
else{
}
if((isset($_POST['altro'])) && (!empty($_POST['altro']))){
    $spec_altro = "";
    $spec_altro = implode(",", $_POST['altro']);
    $insert_data["cordone_ombelicale_altro"] = $spec_altro;
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
    $insert_log["operazione"] = $scritta." tab annessi fetali CORDONE OMB.";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);


    tab_annessif();
    loadmenu_feto();
    if($i == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=referto&tipo=feto&tab=3");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=referto&tipo=feto&tab=1");
    }
    $_SESSION["annessi2"] = "Y";
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=referto&tipo=feto&tab=1");

}					       
?>