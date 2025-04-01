<?php
session_start();
include_once("databases.php");
include_once("cavo_orale_sids.php");
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

if((isset($_POST['tiroide'])) && (!empty($_POST['tiroide']))){
    $insert_data["tiroide"] = $_POST['tiroide'];
}
else{
}
if((isset($_POST['timo'])) && (!empty($_POST['timo']))){
    $insert_data["timo"] = $_POST['timo'];
}
else{
}
if((isset($_POST['paratiroidi'])) && (!empty($_POST['paratiroidi']))){
    $insert_data["paratiroidi"] = $_POST['paratiroidi'];
}
else{
}
if((isset($_POST['linfonodi'])) && (!empty($_POST['linfonodi']))){
    $insert_data["linfonodi"] = $_POST['linfonodi'];
}
else{
}
if((isset($_POST['lingua'])) && (!empty($_POST['lingua']))){
    $insert_data["blocco_lingua_ipofaringe"] = $_POST['lingua'];
}
else{
}
if((isset($_POST['ghiandole'])) && (!empty($_POST['ghiandole']))){
    $insert_data["ghiandole_salivari_paralinguali"] = $_POST['ghiandole'];
}
else{
}
echo "qui";

if($_SESSION["cavo_orale_sids"] != "Y"){
	
    $objj = new cavo_orale_sids();
    // a questo punto posso effettuare la seguente insert
    $objj->insert($insert_data);
    var_dump($insert_data);
    $objj->error();
    
    //log
    $scritta = "";
    if (($_SESSION["stato"] == 'chiusa') || ($_SESSION["stato"] == 'chiusa_usr')){
        $scritta = "Consulta";
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
    
//    require_once("../comuni/loadtab_autopsia.php");
    tab_autopsia();
    loadmenu_sids();
    if($i == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=18");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=16");
    }
    $_SESSION["cavo_orale_sids"] = "Y";
}
else {
	echo "update";
    $obj = new cavo_orale_sids();
    $condition= array("dati_protocollo_sids_schede_id" => $_SESSION['case_id']);
    $obj->update($insert_data,$condition);
    var_dump($insert_data);
    $obj->error();
    
    //log
    $scritta = "";
    if (($_SESSION["stato"] == 'chiusa') || ($_SESSION["stato"] == 'chiusa_usr')){
        $scritta = "Consulta";
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
//    require_once("../comuni/loadtab_autopsia.php");
    tab_autopsia();
    loadmenu_sids();
    if($i == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=18");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=16");
    }

}
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=16");

}					       
?>