<?php
session_start();
include_once("databases.php");
include_once("cavita_addominale_mf.php");
require_once("loadtab_autopsiaf.php");
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
$insert_data["idreni"] = $_SESSION['case_id'];

if((isset($_POST['tipoS'])) && (!empty($_POST['tipoS']))){
    $insert_data["surreni"] = $_POST['tipoS'];
}
else{
}
if((isset($_POST['specS'])) && (!empty($_POST['specS']))){
    $insert_data["specifica_surreni_malformati"] = $_POST['specS'];
}
else{
}
if((isset($_POST['emoraggie'])) && (!empty($_POST['emoraggie']))){
    $insert_data["surreni_emorragie"] = $_POST['emoraggie'];
}
else{
}
if((isset($_POST['ispessimenti'])) && (!empty($_POST['ispessimenti']))){
    $insert_data["surreni_ispessimenti"] = $_POST['ispessimenti'];
}
else{
}
if((isset($_POST['pesReD'])) && (!empty($_POST['pesReD'])) && (ctype_digit($_POST['pesReD']))){
    $insert_data["rene_dx_peso_gr"] = $_POST['pesReD'];
}
else{
}
if((isset($_POST['malfoRD'])) && (!empty($_POST['malfoRD']))){
    $insert_data["rene_dx_stato"] = $_POST['malfoRD'];
}
else{
}
if((isset($_POST['specRD'])) && (!empty($_POST['specRD']))){
    $insert_data["specifica_rene_dx_malformazione"] = $_POST['specRD'];
}
else{
}
if((isset($_POST['ischemiaRD'])) && (!empty($_POST['ischemiaRD']))){
    $insert_data["rene_dx_ischemia_corticale_congestione_midollare"] = $_POST['ischemiaRD'];
}
else{
}
if((isset($_POST['microlitiasiRD'])) && (!empty($_POST['microlitiasiRD']))){
    $insert_data["rene_dx_microlisi_ascessualizzazioni"] = $_POST['microlitiasiRD'];
}
else{
}
if((isset($_POST['pesReS'])) && (!empty($_POST['pesReS'])) && (ctype_digit($_POST['pesReS']))){
    $insert_data["rene_sx_peso_gr"] = $_POST['pesReS'];
}
else{
}
if((isset($_POST['malfoRS'])) && (!empty($_POST['malfoRS']))){
    $insert_data["rene_sx_stato"] = $_POST['malfoRS'];
}
else{
}
if((isset($_POST['specRS'])) && (!empty($_POST['specRS']))){
    $insert_data["specifica_rene_sx_malformazione"] = $_POST['specRS'];
}
else{
}
if((isset($_POST['ischemiaRS'])) && (!empty($_POST['ischemiaRS']))){
    $insert_data["rene_sx_ischemia_corticale_congestione_midollare"] = $_POST['ischemiaRS'];
}
else{
}
if((isset($_POST['microlitiasiRS'])) && (!empty($_POST['microlitiasiRS']))){
    $insert_data["rene_sx_microlisi_ascessualizzazioni"] = $_POST['microlitiasiRS'];
}
else{
}
if((isset($_POST['ureteri'])) && (!empty($_POST['ureteri']))){
    $insert_data["ureteri"] = $_POST['ureteri'];
}
else{
}
if((isset($_POST['specU'])) && (!empty($_POST['specU']))){
    $insert_data["specifica_ureteri_malformazioni"] = $_POST['specU'];
}
else{
}
if((isset($_POST['vescica'])) && (!empty($_POST['vescica']))){
    $insert_data["vescica_urinaria"] = $_POST['vescica'];
}
else{
}
if((isset($_POST['specV'])) && (!empty($_POST['specV']))){
    $insert_data["specifica_vescica_urinaria_malformazione"] = $_POST['specV'];
}
else{
}
if((isset($_POST['contenuto'])) && (!empty($_POST['contenuto']))){
    $insert_data["vescica_urinaria_contenuto"] = $_POST['contenuto'];
}
else{
}
if((isset($_POST['uraco'])) && (!empty($_POST['uraco']))){
    $insert_data["uraco"] = $_POST['uraco'];
}
else{
}
if((isset($_POST['testicoli'])) && (!empty($_POST['testicoli']))){
    $insert_data["testicoli"] = $_POST['testicoli'];
}
else{
}
if((isset($_POST['uto'])) && (!empty($_POST['uto']))){
    $insert_data["utero_tube_ovaie"] = $_POST['uto'];
}
else{
}
if((isset($_POST['specUTO'])) && (!empty($_POST['specUTO']))){
    $insert_data["specifica_utero_tube_ovaie_malformazioni"] = $_POST['specUTO'];
}
else{
}
if((isset($_POST['grandi'])) && (!empty($_POST['grandi']))){
    $insert_data["grandi_vasi"] = $_POST['grandi'];
}
else{
}
if((isset($_POST['specVasi'])) && (!empty($_POST['specVasi']))){
    $insert_data["specifica_grandi_vasi_malformazione"] = $_POST['specVasi'];
}
else{
}

    

echo "qui";

	echo "update";
    $obj = new cavita_addominale_mf();
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
    $insert_log["operazione"] = $scritta." tab surreni/reni";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);


    tab_autopsiaf();
    loadmenu_feto();
    if($i == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=referto&tipo=feto&tab=1");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=21");
    }
    $_SESSION["cavita_addominale_mf2"] = "Y";
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=21");

}					       
?>