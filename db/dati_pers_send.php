<?php
session_start();
include_once("databases.php");
include_once("dati_pers.php");
include_once("madre.php");
include_once("padre.php");
require_once("loadtab_madre.php");
require_once("loadtab_padre.php");
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
$insert_data["schede_id"] = $_SESSION['case_id'];
$insert_data["tipo"] = $_POST['tipo'];

$insert_tipo["schede_id"] = $_SESSION['case_id'];

if((isset($_POST['cognome'])) && (!empty($_POST['cognome']))){
    $insert_data["cognome"] = $_POST['cognome'];
}
else {
}
if((isset($_POST['nome'])) && (!empty($_POST['nome']))){
    $insert_data["nome"] = $_POST['nome'];
}
else {
}
if((isset($_POST['dataN'])) && (!empty($_POST['dataN']))){
    list($day, $month, $year) = explode("-", $_POST['dataN']);
    $ymd = "$year-$month-$day";
    $insert_data["data_nascita"] = $ymd;
}
else {
}
if((isset($_POST['luogoN'])) && (!empty($_POST['luogoN']))){
    $insert_data["luogo_nascita"] = $_POST['luogoN'];
}
else{
}
if((isset($_POST['eta'])) && (!empty($_POST['eta']))){
    $insert_data["eta"] = $_POST['eta'];
}
else{
}
if((isset($_POST['indirizzo'])) && (!empty($_POST['indirizzo']))){
    $insert_data["via"] = $_POST['indirizzo'];
}
else {
}
if((isset($_POST['cap'])) && (ctype_digit($_POST['cap'])) && (!empty($_POST['cap'])) && (strlen($_POST['cap']) == 5)){
    $insert_data["cap"] = $_POST['cap'];
}
else {
}
if((isset($_POST['comune'])) && (!empty($_POST['comune']))){
    $insert_data["comune"] = $_POST['comune'];
}
else {
}
if((isset($_POST['prov'])) && (!empty($_POST['prov']))){
    $insert_data["provincia"] = $_POST['prov'];
}
else {
}
if((isset($_POST['etnia'])) && (!empty($_POST['etnia']))){
    $insert_data["etnia"] = $_POST['etnia'];
}
else {
}
if((isset($_POST['specEtnia'])) && (!empty($_POST['specEtnia']))){
    $insert_data["specifica_etnia"] = $_POST['specEtnia'];
}
else {
}
if((isset($_POST['prof'])) && (!empty($_POST['prof']))){
    $insert_data["professione"] = $_POST['prof'];
}
else {
}
echo "qui";


if($_SESSION["dati_pers"] != "Y"){
	echo "insert";
    //creo la connessione con il database
    if( $_POST['tipo']=='MADRE'){
    $obj = new madre();
    $obj->insert($insert_tipo);
    echo "MADRE: ";
    var_dump($insert_tipo);
    $obj->error();
    }
    
    
    $objj = new dati_pers();
    // a questo punto posso effettuare la seguente insert
    $objj->insert($insert_data);
    echo "DATI_PERS: ";
    var_dump($insert_data);
    $objj->error();
    $scritta = "";
    if (($_SESSION["stato"] == 'chiusa') || ($_SESSION["stato"] == 'chiusa_usr')){
        $scritta = "Consultazione";
    }
    else {
        $scritta = "Inserimento";
    }
    
    if( $_POST['tipo']=='MADRE'){
//        require_once("../comuni/loadtab_madre.php");
        //log
        $insert_log = array();
        $obja = new log_activities();
        $insert_log["utente"] = $_SESSION["username"];
        $insert_log["oggetto"] = $scritta;
        $insert_log["operazione"] = $scritta." tab dati personali MADRE";
        $insert_log["schede_id"] = $_SESSION["case_id"];
        $insert_log["id"] = $_SESSION["id_caso"];
        $obja->insert($insert_log);
        tab_madre();
        loadmenu_sids();
        if($i == 'succ'){
            header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=sids&tab=2");
        }
        else {
            header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=scena&tipo=sids&tab=42");
        }
    }
    else if( $_POST['tipo']=='PADRE'){
//        require_once("../comuni/loadtab_padre.php");
        //log
        $insert_log = array();
        $obja = new log_activities();
        $insert_log["utente"] = $_SESSION["username"];
        $insert_log["oggetto"] = $scritta;
        $insert_log["operazione"] = $scritta." tab dati personali PADRE";
        $insert_log["schede_id"] = $_SESSION["case_id"];
        $insert_log["id"] = $_SESSION["id_caso"];
        $obja->insert($insert_log);
        tab_padre();
        loadmenu_sids();
        if($i == 'succ'){
            header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=sids&tab=3");
        }
        else {
            header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=sids&tab=0");
        }
    }
    $_SESSION["dati_pers"] = "Y";
}
else {
	echo "update";
    $obj = new dati_pers();
    $condition= array("schede_id" => $_SESSION['case_id'], "tipo" => $_POST['tipo']);
    $obj->update($insert_data,$condition);
    var_dump($insert_data);
    $obj->error();
    $scritta = "";
    if (($_SESSION["stato"] == 'chiusa') || ($_SESSION["stato"] == 'chiusa_usr')){
        $scritta = "Consultazione";
    }
    else {
        $scritta = "Update";
    }
    if( $_POST['tipo']=='MADRE'){
//        require_once("../comuni/loadtab_madre.php");
        //log
        $insert_log = array();
        $obja = new log_activities();
        $insert_log["utente"] = $_SESSION["username"];
        $insert_log["oggetto"] = $scritta;
        $insert_log["operazione"] = $scritta." tab dati personali MADRE";
        $insert_log["schede_id"] = $_SESSION["case_id"];
        $insert_log["id"] = $_SESSION["id_caso"];
        $obja->insert($insert_log);
        tab_madre();
        loadmenu_sids();
        if($i == 'succ'){
            header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=sids&tab=2");
        }
        else {
            header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=scena&tipo=sids&tab=42");
        }
    }
    else if( $_POST['tipo']=='PADRE'){
//        require_once("../comuni/loadtab_padre.php");
        //log
        $insert_log = array();
        $obja = new log_activities();
        $insert_log["utente"] = $_SESSION["username"];
        $insert_log["oggetto"] = $scritta;
        $insert_log["operazione"] = $scritta." tab dati personali PADRE";
        $insert_log["schede_id"] = $_SESSION["case_id"];
        $insert_log["id"] = $_SESSION["id_caso"];
        $obja->insert($insert_log);
        tab_padre();
        loadmenu_sids();
        if($i == 'succ'){
            header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=sids&tab=3");
        }
        else {
            header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=sids&tab=0");
        }
    }

}
}

function back(){
    echo "ahahahaha";
    if( $_POST['tipo']=='MADRE'){
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=scena&tipo=sids&tab=42");
    }
    else if( $_POST['tipo']=='PADRE'){
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=sids&tab=0");
    }

}					       
?>