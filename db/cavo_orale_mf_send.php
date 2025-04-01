<?php
session_start();
include_once("databases.php");
include_once("cavo_orale_mf.php");
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
$insert_data["dati_protocollo_mf_schede_id"] = $_SESSION['case_id'];

if((isset($_POST['pesotir'])) && (!empty($_POST['pesotir']))){
    $insert_data["tiroide_peso_gr"] = $_POST['pesotir'];
}
else{
}
if((isset($_POST['tipoTr'])) && (!empty($_POST['tipoTr']))){
    $insert_data["tiroide_stato"] = $_POST['tipoTr'];
}
else{
}
if((isset($_POST['specTr'])) && (!empty($_POST['specTr']))){
    $insert_data["specifica_tiroide_stato_malformata"] = $_POST['specTr'];
}
else{
}
if((isset($_POST['pesotim'])) && (!empty($_POST['pesotim']))){
    $insert_data["timo_peso_gr"] = $_POST['pesotim'];
}
else{
}
if((isset($_POST['specTm'])) && (!empty($_POST['specTm']))){
    $insert_data["timo_stato"] = $_POST['specTm'];
}
else{
}
if((isset($_POST['linfonodi'])) && (!empty($_POST['linfonodi']))){
    $insert_data["linfonodi"] = $_POST['linfonodi'];
}
else{
}
if((isset($_POST['laringe'])) && (!empty($_POST['laringe']))){
    $insert_data["laringe_stato"] = $_POST['laringe'];
}
else{
}
if((isset($_POST['specL'])) && (!empty($_POST['specL']))){
    $insert_data["specifica_laringe_stato_malformata"] = $_POST['specL'];
}
else{
}


if($_SESSION["cavo_orale_mf"] != "Y"){
	echo "insert";
    
    $objj = new cavo_orale_mf();
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
    $insert_log["operazione"] = $scritta." tab cavo orale";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    tab_autopsiaf();
    loadmenu_feto();
    if($i == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=18");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=16");
    }
    $_SESSION["cavo_orale_mf"] = "Y";
}
else {
	echo "update";
	
    $obj = new cavo_orale_mf();
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
    $insert_log["operazione"] = $scritta." tab cavo orale";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);

    tab_autopsiaf();
    loadmenu_feto();
    if($i == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=18");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=16");
    }

}
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=16");

}					       
?>