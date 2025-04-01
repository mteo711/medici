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
$insert_data["dati_protocollo_mf_schede_id"] = $_SESSION['case_id'];

if((isset($_POST['corteccia'])) && (!empty($_POST['corteccia']))){
    $insert_data["encefalo_corteccia_cerebrale"] = $_POST['corteccia'];
}
else{
    $insert_data["encefalo_corteccia_cerebrale"] = 'N';
}
if((isset($_POST['ippocampo'])) && (!empty($_POST['ippocampo']))){
    $insert_data["encefalo_ippocampo"] = $_POST['ippocampo'];
}
else{
    $insert_data["encefalo_ippocampo"] = 'N';
}
if((isset($_POST['nuclei'])) && (!empty($_POST['nuclei']))){
    $insert_data["encefalo_nuclei_della_base"] = $_POST['nuclei'];
}
else{
    $insert_data["encefalo_nuclei_della_base"] = 'N';
}
if((isset($_POST['tronco'])) && (!empty($_POST['tronco']))){
    $insert_data["enefalo_tronco_encefalico"] = $_POST['tronco'];
}
else{
    $insert_data["enefalo_tronco_encefalico"] = 'N';
}


if($_SESSION["prelievi_mf1"] != "Y"){

    $objj = new prelievi_mf();
    // a questo punto posso effettuare la seguente insert
    $objj->insert($insert_data);
    var_dump($insert_data);
    $objj->error();
    
    //log
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = "Inserimento";
    $insert_log["operazione"] = "Inserimento tab prelievi ENCEFALO";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);

    tab_prelievif();
    loadmenu_feto();
    if($i == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=prelievi&tipo=feto&tab=24");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=referto&tipo=feto&tab=4");
    }
    
    $_SESSION["prelievi_mf1"] = "Y";
}
else {
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
    $insert_log["operazione"] = $scritta." tab prelievi ENCEFALO";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);

    tab_prelievif();
    loadmenu_feto();
    if($i == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=prelievi&tipo=feto&tab=24");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=referto&tipo=feto&tab=4");
    }

}
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=referto&tipo=feto&tab=4");

}					       
?>