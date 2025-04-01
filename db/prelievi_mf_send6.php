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
$insert_data["idaltro"] = $_SESSION['case_id'];

if((isset($_POST['stellato'])) && (!empty($_POST['stellato']))){
    $insert_data["gangli_simpatici_stellato"] = $_POST['stellato'];
}
else{
    $insert_data["gangli_simpatici_stellato"] = 'N';
}
if((isset($_POST['cervicale'])) && (!empty($_POST['cervicale']))){
    $insert_data["gangli_simpatici_cervicale_sup"] = $_POST['cervicale'];
}
else{
    $insert_data["gangli_simpatici_cervicale_sup"] = 'N';
}
if((isset($_POST['glomo'])) && (!empty($_POST['glomo']))){
    $insert_data["biforcazione_carotidea_giomo_corpo_carotideo"] = $_POST['glomo'];
}
else{
    $insert_data["biforcazione_carotidea_giomo_corpo_carotideo"] = 'N';
}
if((isset($_POST['seno'])) && (!empty($_POST['seno']))){
    $insert_data["biforcazione_carotidea_seno_carotideo"] = $_POST['seno'];
}
else{
    $insert_data["biforcazione_carotidea_seno_carotideo"] = 'N';
}
if((isset($_POST['timo'])) && (!empty($_POST['timo']))){
    $insert_data["timo"] = $_POST['timo'];
}
else{
    $insert_data["timo"] = 'N';
}
if((isset($_POST['tiroide'])) && (!empty($_POST['tiroide']))){
    $insert_data["tiroide"] = $_POST['tiroide'];
}
else{
    $insert_data["tiroide"] = 'N';
}
if((isset($_POST['milza'])) && (!empty($_POST['milza']))){
    $insert_data["milza"] = $_POST['milza'];
}
else{
    $insert_data["milza"] = 'N';
}
if((isset($_POST['fegato'])) && (!empty($_POST['fegato']))){
    $insert_data["fegato"] = $_POST['fegato'];
}
else{
    $insert_data["fegato"] = 'N';
}
if((isset($_POST['pancreas'])) && (!empty($_POST['pancreas']))){
    $insert_data["pancreas"] = $_POST['pancreas'];
}
else{
    $insert_data["pancreas"] = 'N';
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
    $insert_log["operazione"] = $scritta." tab prelievi ALTRO";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    tab_prelievif();
    loadmenu_feto();
    if($i == 'succ'){
        header("Location:../index_".$_SESSION["tipo_usr"].".php");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=prelievi&tipo=feto&tab=27");
    }
    
    $_SESSION["prelievi_mf6"] == 'Y';

}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=prelievi&tipo=feto&tab=27");

}					       
?>