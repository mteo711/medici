<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/prelievi_sids.php");

	$obj = new prelievi_sids();

	$records= $obj->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
     if($obj->fetchNumRows() == 0){
         $_SESSION["prelievi_sids5"] = "N";
    }
    else {
        $_POST["prelievi_sids_sd"] = $records['surrene_dx'];
        $_POST["prelievi_sids_ss"] = $records['surrene_sx'];
        $_POST["prelievi_sids_rd"] = $records['rene_dx'];
        $_POST["prelievi_sids_rs"] = $records['rene_sx'];

        $_SESSION["prelievi_sids5"] = "Y";
    }
    }							       
?>