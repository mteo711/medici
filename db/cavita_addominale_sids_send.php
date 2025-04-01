<?php
session_start();
include_once("databases.php");
include_once("cavita_addominale_sids.php");
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

if((isset($_POST['eterotassia'])) && (!empty($_POST['eterotassia']))){
    $insert_data["eterotassia_viscerale"] = $_POST['eterotassia'];
}
else{
}
if((isset($_POST['malformazioniG'])) && (!empty($_POST['malformazioniG']))){
    $insert_data["tratto_gastroenterico_malformazioni"] = $_POST['malformazioniG'];
}
else{
}
if($_POST['malformazioniG']=='Y' && (isset($_POST['specMalfoG'])) && (!empty($_POST['specMalfoG']))){
    $insert_data["specifica_tratto_gastroenterico_malformazioni"] = $_POST['specMalfoG'];
}
else{
}
if((isset($_POST['emoraggieG'])) && (!empty($_POST['emoraggieG']))){
    $insert_data["tratto_gastroenterico_emorragie"] = $_POST['emoraggieG'];
}
else{
}
if((isset($_POST['altroEmoG'])) && (!empty($_POST['altroEmoG']))){
    $insert_data["tratto_gastroenterico_altro"] = $_POST['altroEmoG'];
}
else{
}
if((isset($_POST['pesSu'])) && (!empty($_POST['pesSu'])) && (ctype_digit($_POST['pesSu']))){
    $insert_data["surreni_peso_gr"] = $_POST['pesSu'];
}
else{
}
if((isset($_POST['emoraggieS'])) && (!empty($_POST['emoraggieS']))){
    $insert_data["surreni_emorragie"] = $_POST['emoraggieS'];
}
else{
}
if((isset($_POST['ispessimenti'])) && (!empty($_POST['ispessimenti']))){
    $insert_data["surreni_ispessimenti"] = $_POST['ispessimenti'];
}
else{
}
if((isset($_POST['pesRe'])) && (!empty($_POST['pesRe'])) && (ctype_digit($_POST['pesRe']))){
    $insert_data["reni_peso_gr"] = $_POST['pesRe'];
}
else{
}
if((isset($_POST['malformazioniR'])) && (!empty($_POST['malformazioniR']))){
    $insert_data["reni_malformazioni"] = $_POST['malformazioniR'];
}
else{
}
if((isset($_POST['ischemia'])) && (!empty($_POST['ischemia']))){
    $insert_data["ischemia_corticale_congestione_midollare"] = $_POST['ischemia'];
}
else{
}
if((isset($_POST['microlitiasi'])) && (!empty($_POST['microlitiasi']))){
    $insert_data["microlitiasi_ascessualizzazioni"] = $_POST['microlitiasi'];
}
else{
}
if((isset($_POST['pesMil'])) && (!empty($_POST['pesMil'])) && (ctype_digit($_POST['pesMil']))){
    $insert_data["milza_peso_gr"] = $_POST['pesMil'];
}
else{
}
if((isset($_POST['tipoM'])) && (!empty($_POST['tipoM']))){
    $insert_data["tipo"] = $_POST['tipoM'];
}
else{
}
if((isset($_POST['pesFeg'])) && (!empty($_POST['pesFeg'])) && (ctype_digit($_POST['pesFeg']))){
    $insert_data["fegato_peso_gr"] = $_POST['pesFeg'];
}
else{
}
if((isset($_POST['coloreF'])) && (!empty($_POST['coloreF']))){
    $insert_data["fegato_colore"] = $_POST['coloreF'];
}
else{
}
if((isset($_POST['pesPan'])) && (!empty($_POST['pesPan'])) && (ctype_digit($_POST['pesPan']))){
    $insert_data["pancreas_peso_gr"] = $_POST['pesPan'];
}
else{
}
if((isset($_POST['coloreP'])) && (!empty($_POST['coloreP']))){
    $insert_data["pancreas_colore"] = $_POST['coloreP'];
}
else{
}
echo "qui";

if($_SESSION["cavita_addominale_sids"] != "Y"){

    $objj = new cavita_addominale_sids();
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
    $insert_log["operazione"] = $scritta." tab cav. addominale";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);

//    require_once("../comuni/loadtab_autopsia.php");
    tab_autopsia();
    loadmenu_sids();
    if($i == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=23");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=20");
    }
    $_SESSION["cavita_addominale_sids"] = "Y";
}
else {
    echo "update";
    $obj = new cavita_addominale_sids();
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
    $insert_log["operazione"] = $scritta." tab cav. addominale";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
//    require_once("../comuni/loadtab_autopsia.php");
    tab_autopsia();
    loadmenu_sids();
    if($i == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=23");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=20");
    }

}
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=20");

}					       
?>