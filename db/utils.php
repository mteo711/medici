<?php
include_once("databases.php");
include_once("schede.php");
include_once("centri.php");

function checksession() {
if (isset($_SESSION["username"]))
  return TRUE;
else {
    header("Location:index_404.php");
}
}

function checkconnection() {
if (isset($_SESSION["username"]))
  return TRUE;
else {
	header("Location:index_404.php");
}
}

function listOpenNaz() {
    
    $condition= array("nazionale" => 'Y', "completa" => 'N', "cancellata" => 'N', "bloccata" => 'N');
    $obj = new schede();
    //print_r($obj->fetch(array("idcaso_provv","utenti_centri_id","tipologia"), $condition));
    $record = $obj->fetch(array("idcaso_provv","utenti_centri_id","tipologia"), $condition);
    for ($i=0; $i < count($record); $i++){
    $obj = new centri();
    $recordr = $obj->fetchRecord(array("id"=>$record[$i]['utenti_centri_id']));
    $reg = $recordr['regione'];
    $idc = $record[$i]['idcaso_provv'];
    $tip = $record[$i]['tipologia'];
    echo <<<STAMPA
    <div class="col-5">
        <label>
            $idc<br/>
        </label>
    </div>
    <div class="col-5">
        <label >
            $reg<br/>
        </label>
    </div>
    <div class="col-5">
        <label >
            $tip<br/>
        </label>
    </div>
    <div class="col-5">
        <label align="center">
            <a href="db/inviaScheda.php?idc=$idc"><img src="img/mail.png" style="width: 14%;"/></a><br/>
        </label>
    </div>
    <div class="col-5">
        <label align="center">
            <a href="db/deleteSchedaNaz.php?idc=$idc"><img src="img/delete.png" style="width: 14%;"/></a><br/>
        </label>
    </div>
    <div class="col-5">
        <label align="center">
            <a href="db/openScheda.php?idc=$idc"><img src="img/edit.png" style="width: 14%;"/></a><br/>
        </label>
    </div>
STAMPA;
    }   
}

function listOpen() {
    
    $condition= array("utenti_centri_id" => $_SESSION["centri_id"], "completa" => 'N', "cancellata" => 'N', "bloccata" => 'N');
    echo "prima" . $condition;   
    $obj = new schede();
    echo "dopo" . $condition;
    //print_r($obj->fetch(array("idcaso_provv","utenti_centri_id","tipologia"), $condition));
    $record = $obj->fetch(array("idcaso_provv","utenti_centri_id","tipologia"), $condition);
    for ($i=0; $i < count($record); $i++){
    $obj = new centri();
    $recordr = $obj->fetchRecord(array("id"=>$record[$i]['utenti_centri_id']));
    $reg = $recordr['regione'];
    $idc = $record[$i]['idcaso_provv'];
    $tip = $record[$i]['tipologia'];
    echo <<<STAMPA
    <div class="col-5">
        <label>
            $idc<br/>
        </label>
    </div>
    <div class="col-5">
        <label >
            $reg<br/>
        </label>
    </div>
    <div class="col-5">
        <label >
            $tip<br/>
        </label>
    </div>
    <div class="col-5">
        <label align="center">
            <a href="db/inviaScheda.php?idc=$idc"><img src="img/mail.png" style="width: 14%;"/></a><br/>
        </label>
    </div>
    <div class="col-5">
        <label align="center">
            <a href="db/deleteScheda.php?idc=$idc"><img src="img/delete.png" style="width: 14%;"/></a><br/>
        </label>
    </div>
    <div class="col-5">
        <label align="center">
            <a href="db/openScheda.php?idc=$idc"><img src="img/edit.png" style="width: 14%;"/></a><br/>
        </label>
    </div>
STAMPA;
    }   
}

function listCloseds() {
    
    $condition= array("completa" => 'Y', "cancellata" => 'N', "bloccata" => 'Y');
    $obj = new schede();
    //print_r($obj->fetch(array("idcaso_provv","utenti_centri_id","tipologia"), $condition));
    $record = $obj->fetch(array("idcaso","utenti_centri_id","tipologia", "data_invio"), $condition);
    for ($i=0; $i < count($record); $i++){
    $obj = new centri();
    $recordr = $obj->fetchRecord(array("id"=>$record[$i]['utenti_centri_id']));
    $reg = $recordr['regione'];
    $idc = $record[$i]['idcaso'];
    $tip = $record[$i]['tipologia'];
    list($year, $month, $day) = explode("-", $record[$i]['data_invio']);
    $dat = "$day-$month-$year";
    echo <<<STAMPA
    <div class="col-4" style="width:15%;">
        <label>
            $idc<br/>
        </label>
    </div>
    <div class="col-4" style="width:15%;">
        <label >
            $tip<br/>
        </label>
    </div>
    <div class="col-4" style="width:25%;">
        <label >
            $reg<br/>
        </label>
    </div>
    <div class="col-4" style="width:15%;">
        <label >
            $dat<br/>
        </label>
    </div>
    <div class="col-4" style="width:15%;">
        <label align="center">
            <a href="db/sbloccoScheda.php?idc=$idc"><img src="img/unlock.png" style="width: 15%;"/></a><br/>
        </label>
    </div>
    <div class="col-4" style="width:15%;">
        <label align="center">
            <a href="db/openSchedaConclusa.php?idc=$idc"><img src="img/info.png" style="width: 15%;"/></a><br/>
        </label>
    </div>
STAMPA;
    }      
}

function listCentris() {
    $obj = new centri();
    $record = $obj->fetch2(array('*'));
    for ($i=0; $i < count($record); $i++){
    $regione = $record[$i]['regione'];
    $direttore = $record[$i]['direttore'];
    $responsabile = $record[$i]['responsabile_schede'];
    $via = $record[$i]['via'];
    $cap = $record[$i]['cap'];
    $citta = $record[$i]['citta'];
    $telefono = $record[$i]['telefono'];
    $email = $record[$i]['email'];
    echo <<<STAMPA
    <h1 align="center">$regione</h1>

<form class="profilo" metho="GET" action="scheda_reg.php">
	<div class="col-1">
	    <label style="font-size: 15px; color: #000;">
	        Direttore
	        <p style="font-size: 12px; color: #000; text-transform:none;">$direttore</p>
	    </label>
	</div>
	<div class="col-1">
	    <label style="font-size: 15px; color: #000;">
	        Responsabile inserimento schede
	        <p style="font-size: 12px; color: #000; text-transform:none;">$responsabile</p>
	    </label>
	</div>
	<div class="col-1">
	    <label style="font-size: 15px; color: #000;">
	        Sede
	        <p style="font-size: 12px; color: #000; text-transform:none;">$via - $cap $citta</p>
	    </label>
	</div>
	<div class="col-1">
	    <label style="font-size: 15px; color: #000;">
	        Telefono
	        <p style="font-size: 12px; color: #000; text-transform:none;">$telefono</p>
	    </label>
	</div>
    <div class="col-1">
        <label style="font-size: 15px; color: #000;">
            Email
            <p style="font-size: 12px; color: #000; text-transform:none;">$email</p>
        </label>
    </div>
</form>
<br/>
<hr>
STAMPA;
    }   
}

function listResult() {
    
    $search_data = array();
    $search_data['completa'] = 'Y';
    $search_data['bloccata'] = 'Y';

    if((isset($_POST['idcaso'])) && (!empty($_POST['idcaso']))){
        $search_data["idcaso"] = $_POST['idcaso'];
    }
    else {
    }
    if((isset($_POST['centro'])) && (!empty($_POST['centro']))){
        $search_data["utenti_centri_id"] = $_POST['centro'];
    }
    else {
    }
    if((isset($_POST['tipo'])) && (!empty($_POST['tipo']))){
        $search_data["tipologia"] = $_POST['tipo'];
    }
    else{
    }
    if((isset($_POST['dataC'])) && (!empty($_POST['dataC']))){
    list($day, $month, $year) = explode("-", $_POST['dataC']);
    $ymdS = "$year-$month-$day";
    $search_data["data_creazione"] = $ymdS;
    }
    else {
    }
    if((isset($_POST['dataI'])) && (!empty($_POST['dataI']))){
    list($day, $month, $year) = explode("-", $_POST['dataI']);
    $ymdS = "$year-$month-$day";
    $search_data["data_invio"] = $ymdS;
    }
    else {
    }
    
    if(count($search_data) == 0){
        
    }
    else {
      $condition = $search_data;
      $obj = new schede();
        //print_r($obj->fetch(array("idcaso_provv","utenti_centri_id","tipologia"), $condition));
  $record = $obj->fetch(array("idcaso","tipologia","utenti_centri_id","data_creazione","data_invio"),$condition);   
        if(count($record) == 0){
             header("Location:index_naz.php?menu=search&messaggio=noresult");
        }
        else{
    for ($i=0; $i < count($record); $i++){
    $obj = new centri();
    $recordr = $obj->fetchRecord(array("id"=>$record[$i]['utenti_centri_id']));
    $reg = $recordr['regione'];
    $idc = $record[$i]['idcaso'];
    $tip = $record[$i]['tipologia'];
    list($year, $month, $day) = explode("-", $record[$i]['data_creazione']);
    $datc = "$day-$month-$year";
    list($year, $month, $day) = explode("-", $record[$i]['data_invio']);
    $dati = "$day-$month-$year";
    echo <<<STAMPA
    <!-- indice -->
    <div class="col-4" style="width:13.28%">
        <label style="font-size: 11px; color: #000;" align="center">
            $idc<br/>
        </label>
    </div>
    <div class="col-4" style="width:13.28%">
        <label style="font-size: 11px; color: #000;" align="center">
            $tip<br/>
        </label>
    </div>
    <div class="col-5" style="width:20.28%">
        <label style="font-size: 11px; color: #000;" align="center">
            $reg<br/>
        </label>
    </div>
    <div class="col-5" style="width:14.28%">
        <label style="font-size: 11px; color: #000;" align="center">
            $datc<br/>
        </label>
    </div>
    <div class="col-5" style="width:14.28%">
        <label style="font-size: 11px; color: #000;" align="center">
            $dati<br/>
        </label>
    </div>
    <div class="col-5" style="width:12.28%">
        <label style="font-size: 11px; color: #000;" align="center">
            <a href="db/openSchedaConclusa.php?idc=$idc"><img src="img/info.png" style="width: 15%;"/></a><br/>
        </label>
    </div>
    <div class="col-5" style="width:12.28%">
        <label style="font-size: 11px; color: #000;" align="center">
            <a href="db/sbloccoScheda.php?idc=$idc"><img src="img/unlock.png" style="width: 15%;"/></a><br/>
        </label>
    </div>
STAMPA;
    }  
    }
    }
}

function getRegione(){
    $obj = new centri();
    $recordr = $obj->fetchRecord(array("id"=>$_SESSION['centri_id']));
    $_SESSION["regione"] = $recordr['regione'];
}

function generateCaseNum(){
    $obj = new schede();
    $recordr = $obj->fetch2(array("id", "idcaso_provv"));
    $co = count($recordr)-1;
    $_SESSION["case_id"] = $recordr[$co]["id"]+1;
}

function generateRandomString() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 30; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>