<?php
session_start();
include_once("databases.php");
include_once("prelievi_mf.php");
require_once("loadtab_prelievif.php");
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
$insert_data["idrene"] = $_SESSION['case_id'];

if((isset($_POST['surreneDX'])) && (!empty($_POST['surreneDX']))){
    $insert_data["surrene_dx"] = $_POST['surreneDX'];
}
else{
    $insert_data["surrene_dx"] = 'N';
}
if((isset($_POST['surreneSX'])) && (!empty($_POST['surreneSX']))){
    $insert_data["surrene_sx"] = $_POST['surreneSX'];
}
else{
    $insert_data["surrene_sx"] = 'N';
}
if((isset($_POST['reneDX'])) && (!empty($_POST['reneDX']))){
    $insert_data["rene_dx"] = $_POST['reneDX'];
}
else{
    $insert_data["rene_dx"] = 'N';
}
if((isset($_POST['reneSX'])) && (!empty($_POST['reneSX']))){
    $insert_data["rene_sx"] = $_POST['reneSX'];
}
else{
    $insert_data["rene_sx"] = 'N';
}

    echo "update";
    $obj = new prelievi_mf();
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
    $insert_log["operazione"] = $scritta." tab prelievi SURRENE/RENE";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    tab_prelievif();
    loadmenu_feto();
    if($i == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=prelievi&tipo=feto&tab=28");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=prelievi&tipo=feto&tab=26");
    }
    $_SESSION["prelievi_mf5"] == 'Y';

}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=prelievi&tipo=feto&tab=26");

}					       
?>