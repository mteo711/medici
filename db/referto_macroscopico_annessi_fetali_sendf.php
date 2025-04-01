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
$insert_data["schede_id"] = $_SESSION['case_id'];

if((isset($_POST['placenta'])) && (!empty($_POST['placenta']))){
    $insert_data["placenta"] = $_POST['placenta'];
}
else{
}
if((isset($_POST['pervenuta'])) && (!empty($_POST['pervenuta']))){
    $insert_data["placenta_pervenuta"] = $_POST['pervenuta'];
}
else{
}
if((isset($_POST['punto'])) && (!empty($_POST['punto']))){
    $insert_data["placenta_membrane_punto_rottura"] = $_POST['punto'];
}
else{
}
if((isset($_POST['distanza'])) && (!empty($_POST['distanza']))){
    $insert_data["placenta_distanza_margine_disco_coriale_cm"] = $_POST['distanza'];
}
else{
}
if((isset($_POST['intersezione'])) && (!empty($_POST['intersezione']))){
    $insert_data["placenta_inserzione"] = $_POST['intersezione'];
}
else{
}
if((isset($_POST['caratteristiche'])) && (!empty($_POST['caratteristiche']))){
    $insert_data["placenta_caratteristiche"] = $_POST['caratteristiche'];
}
else{
}


if($_SESSION["annessi1"] != "Y"){

    $objj = new referto_macroscopico_annessi_fetali();
    // a questo punto posso effettuare la seguente insert
    $objj->insert($insert_data);
    var_dump($insert_data);
    $objj->error();
    
    //log
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = "Inserimento";
    $insert_log["operazione"] = "Inserimento tab annessi fetali PLACENTA";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);

    tab_annessif();
    loadmenu_feto();
    if($i == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=referto&tipo=feto&tab=2");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=22");
    }
    
    $_SESSION["annessi1"] = "Y";
}
else {
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
    $insert_log["operazione"] = $scritta." tab annessi fetali PLACENTA";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);

    
    tab_annessif();
    loadmenu_feto();
    if($i == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=referto&tipo=feto&tab=2");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=22");
    }

}
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=22");

}					       
?>