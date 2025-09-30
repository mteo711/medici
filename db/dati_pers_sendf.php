<?php
session_start(); 
echo "<pre>";
echo "</pre>";

include_once("databases.php");
include_once("dati_pers.php");
include_once("madre.php");
include_once("padre.php");
require_once("loadtab_madref.php");
require_once("loadtab_padref.php");
require_once("loadmenu_feto.php");
include_once("log_activities.php");

echo "Stato dati_persF: ".$_SESSION["dati_persF"];


if ($_POST && array_key_exists("action", $_POST)) {
    

    switch ($_POST['action']) {
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

if ((isset($_POST['cognome'])) && (!empty(trim($_POST['cognome'])))) {
    $insert_data["cognome"] = trim($_POST['cognome']);
}

if ((isset($_POST['nome'])) && (!empty(trim($_POST['nome'])))) {
    $insert_data["nome"] = trim($_POST['nome']);
}

if ((isset($_POST['dataN'])) && (!empty(trim($_POST['dataN'])))) {
    list($day, $month, $year) = explode("-", trim($_POST['dataN']));
    $ymdN = "$year-$month-$day";
    $insert_data["data_nascita"] = $ymdN;
}

if ((isset($_POST['luogoN'])) && (!empty(trim($_POST['luogoN'])))) {
    $insert_data["luogo_nascita"] = trim($_POST['luogoN']);
}

if ((isset($_POST['eta'])) && (!empty(trim($_POST['eta'])))) {
    $insert_data["eta"] = trim($_POST['eta']);
}

if ((isset($_POST['indirizzo'])) && (!empty(trim($_POST['indirizzo'])))) {
    $insert_data["via"] = trim($_POST['indirizzo']);
}

if ((isset($_POST['cap'])) && (ctype_digit(trim($_POST['cap']))) && (!empty(trim($_POST['cap']))) && (strlen(trim($_POST['cap'])) == 5)) {
    $insert_data["cap"] = trim($_POST['cap']);
}

if ((isset($_POST['comune'])) && (!empty(trim($_POST['comune'])))) {
    $insert_data["comune"] = trim($_POST['comune']);
}

if ((isset($_POST['prov'])) && (!empty(trim($_POST['prov'])))) {
    $insert_data["provincia"] = trim($_POST['prov']);
}

if ((isset($_POST['etnia'])) && (!empty(trim($_POST['etnia'])))) {
    $insert_data["etnia"] = trim($_POST['etnia']);
}

if ((isset($_POST['specEtnia'])) && (!empty(trim($_POST['specEtnia'])))) {
    $insert_data["specifica_etnia"] = trim($_POST['specEtnia']);
}

if ((isset($_POST['prof'])) && (!empty(trim($_POST['prof'])))) {
    $insert_data["professione"] = trim($_POST['prof']);
}

if ((isset($_POST['cell'])) && (!empty(trim($_POST['cell'])))) {
    $insert_data["cell"] = trim($_POST['cell']);
}

if ((isset($_POST['codfiscale'])) && (!empty(trim($_POST['codfiscale'])))) {
    $insert_data["codice_fiscale"] = trim($_POST['codfiscale']);
}

if ((isset($_POST['rischi'])) && (!empty(trim($_POST['rischi'])))) {
    $insert_data["rischi"] = trim($_POST['rischi']);
}

if ((isset($_POST['titolodistudio'])) && (!empty(trim($_POST['titolodistudio'])))) {
    $insert_data["titolo_studio"] = trim($_POST['titolodistudio']);
}

if ((isset($_POST['statocivile'])) && (!empty(trim($_POST['statocivile'])))) {
    $insert_data["stato_civile"] = trim($_POST['statocivile']);
}

if ((isset($_POST['specM'])) && (!empty(trim($_POST['specM'])))) {
    list($day, $month, $year) = explode("-", trim($_POST['specM']));
    $ymdN2 = "$year-$month-$day";
    $insert_data["specifica_matrimonio"] = $ymdN2;
}

if ((isset($_POST['altezza'])) && (!empty(trim($_POST['altezza'])))) {
    $insert_data["altezza"] = trim($_POST['altezza']);
}

if ((isset($_POST['peso'])) && (!empty(trim($_POST['peso'])))) {
    $insert_data["peso"] = trim($_POST['peso']);
}

if ((isset($_POST['morteFeto'])) && (!empty(trim($_POST['morteFeto'])))) {
    $insert_data["morte_feto"] = trim($_POST['morteFeto']);
}

if (isset($_POST['ultimoAvv']) && !empty(trim($_POST['ultimoAvv']))) {
    $insert_data["ultimo_avvistamento"] = trim($_POST['ultimoAvv']);
}

// ANAMNESI FAMILIARE 

if (isset($_POST["dati_pers_anni_nonnamaterna"]) && !empty(trim($_POST["dati_pers_anni_nonnamaterna"]))) {
    $insert_data["anni_nonnamaterna"] = trim($_POST["dati_pers_anni_nonnamaterna"]);
}

if (isset($_POST["dati_pers_anni_nonnomaterno"]) && !empty(trim($_POST["dati_pers_anni_nonnomaterno"]))) {
    $insert_data["anni_nonnomaterno"] = trim($_POST["dati_pers_anni_nonnomaterno"]);
}

if (isset($_POST["dati_pers_patologie_nonnamaterna"]) && !empty(trim($_POST["dati_pers_patologie_nonnamaterna"]))) {
    $insert_data["patologie_nonnamaterna"] = trim($_POST["dati_pers_patologie_nonnamaterna"]);
}

if (isset($_POST["dati_pers_patologie_nonnomaterno"]) && !empty(trim($_POST["dati_pers_patologie_nonnomaterno"]))) {
    $insert_data["patologie_nonnomaterno"] = trim($_POST["dati_pers_patologie_nonnomaterno"]);
}

if (isset($_POST["dati_pers_fratelli_sorelle"]) && !empty(trim($_POST["dati_pers_fratelli_sorelle"]))) {
    $insert_data["fratelli_sorelle"] = trim($_POST["dati_pers_fratelli_sorelle"]);
}

if (isset($_POST["dati_pers_patologie_famiglia"]) && !empty(trim($_POST["dati_pers_patologie_famiglia"]))) {
    $insert_data["patologie_famiglia"] = trim($_POST["dati_pers_patologie_famiglia"]);
}

if (isset($_POST["dati_pers_altricasi"]) && !empty(trim($_POST["dati_pers_altricasi"]))) {
    $insert_data["altricasi"] = trim($_POST["dati_pers_altricasi"]);
}

if (isset($_POST["dati_pers_altri_casi"]) && !empty(trim($_POST["dati_pers_altri_casi"]))) {
    $insert_data["altri_casi"] = trim($_POST["dati_pers_altri_casi"]);
}

if (isset($_POST["dati_pers_nonnaviva"]) && !empty(trim($_POST["dati_pers_nonnaviva"]))) {
    $insert_data["nonnaviva"] = trim($_POST["dati_pers_nonnaviva"]);
}

if (isset($_POST["dati_pers_nonnovivo"]) && !empty(trim($_POST["dati_pers_nonnovivo"]))) {
    $insert_data["nonnovivo"] = trim($_POST["dati_pers_nonnovivo"]);
}

if (isset($_POST["dati_pers_morte_nonnamaterna"]) && !empty(trim($_POST["dati_pers_morte_nonnamaterna"]))) {
    $insert_data["morte_nonnamaterna"] = trim($_POST["dati_pers_morte_nonnamaterna"]);
}

if (isset($_POST["dati_pers_morte_nonnomaterno"]) && !empty(trim($_POST["dati_pers_morte_nonnomaterno"]))) {
    $insert_data["morte_nonnomaterno"] = trim($_POST["dati_pers_morte_nonnomaterno"]);
}








echo "qui";
   echo "<pre>";
print_r($insert_data);
echo "</pre>";


if($_SESSION["dati_persF"] != "Y"){
	echo "insert";
    //creo la connessione con il database
    if( $_POST['tipo']=='MADRE'){
    $obj = new madre(); 

    $obj->insert($insert_tipo); 

    echo "MADRE: ";
    $obj->error();
    }
    
echo "Dati da inserire nel database:<br>";
echo "<pre>";
print_r($insert_data); // Visualizza i dati da inserire
echo "</pre>";

$objj = new dati_pers(); // Creazione dell'oggetto
$objj->insert($insert_data);


    $objj->error();
    $scritta = "";
    if (($_SESSION["stato"] == 'chiusa') || ($_SESSION["stato"] == 'chiusa_usr')){
        $scritta = "Consultazione";
    }
    else {
        $scritta = "Inserimento";
    }
    
    
    if( $_POST['tipo']=='MADRE'){
        //log
        $insert_log = array();
        $obja = new log_activities();
        $insert_log["utente"] = $_SESSION["username"];
        $insert_log["oggetto"] = $scritta;
        $insert_log["operazione"] = $scritta." tab dati personali MADRE";
        $insert_log["schede_id"] = $_SESSION["case_id"];
        $insert_log["id"] = $_SESSION["id_caso"];
        $obja->insert($insert_log);
        tab_madref();
        loadmenu_feto();
        if($i == 'succ'){
            header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=feto&tab=2");
        }
        else {
            header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=scheda&tipo=feto&tab=14");
        }
    }
    else if( $_POST['tipo']=='PADRE'){
        //log
        $insert_log = array();
        $obja = new log_activities();
        $insert_log["utente"] = $_SESSION["username"];
        $insert_log["oggetto"] = $scritta;
        $insert_log["operazione"] = $scritta." tab dati personali PADRE";
        $insert_log["schede_id"] = $_SESSION["case_id"];
        $insert_log["id"] = $_SESSION["id_caso"];
        $obja->insert($insert_log);
        tab_padref();
        loadmenu_feto();
        if($i == 'succ'){
            header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=feto&tab=3");
        }
        else {
            header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=feto&tab=0");
        }
    }
    $_SESSION["dati_persF"] = "Y";
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
        //log
        $insert_log = array();
        $obja = new log_activities();
        $insert_log["utente"] = $_SESSION["username"];
        $insert_log["oggetto"] = $scritta;
        $insert_log["operazione"] = $scritta." tab dati personali MADRE";
        $insert_log["schede_id"] = $_SESSION["case_id"];
        $insert_log["id"] = $_SESSION["id_caso"];
        $obja->insert($insert_log);
        tab_madref();
        loadmenu_feto();
        if($i == 'succ'){
            header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=feto&tab=2");
        }
        else {
            header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=scheda&tipo=feto&tab=14");
        }
    }
    else if( $_POST['tipo']=='PADRE'){
        //log
        $insert_log = array();
        $obja = new log_activities();
        $insert_log["utente"] = $_SESSION["username"];
        $insert_log["oggetto"] = "Update";
        $insert_log["operazione"] = "Update tab dati personali PADRE";
        $insert_log["schede_id"] = $_SESSION["case_id"];
        $insert_log["id"] = $_SESSION["id_caso"];
        $obja->insert($insert_log);
        tab_padref();
        loadmenu_feto();
        if($i == 'succ'){
            header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=feto&tab=3");
        }
        else {
            header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=feto&tab=0");
        }
    }

}
}

function back(){
    echo "ahahahaha";
    if( $_POST['tipo']=='MADRE'){
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=scheda&tipo=feto&tab=14");
    }
    else if( $_POST['tipo']=='PADRE'){
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=feto&tab=0");
    }

}					       
?>