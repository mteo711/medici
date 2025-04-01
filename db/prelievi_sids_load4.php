<?php
function loadPage() {
	require_once("./db/databases.php");
    require_once("./db/prelievi_sids.php");

	$obj = new prelievi_sids();

	$records= $obj->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
     if($obj->fetchNumRows() == 0){
         $_SESSION["prelievi_sids4"] = "N";
    }
    else {
        $_POST["prelievi_sids_esofago"] = $records['tratto_gastroenterico_esofago'];
        $_POST["prelievi_sids_stomaco"] = $records['tratto_gastroenterico_stomaco'];
        $_POST["prelievi_sids_duodeno"] = $records['tratto_gastroenterico_duodeno'];
        $_POST["prelievi_sids_piccolo"] = $records['tratto_gastroenterico_piccolo_intestino'];
        $_POST["prelievi_sids_grosso"] = $records['tratto_gastroenterico_grosso_intestino'];

        $_SESSION["prelievi_sids4"] = "Y";
    }
    }							       
?>