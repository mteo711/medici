<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/prelievi_mf.php");

	$obj = new prelievi_mf();

	$records= $obj->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
     if($obj->fetchNumRows() == 0){
         $_SESSION["prelievi_mf5"] = "N";
    }
    else {
        $_POST["prelievi_mf_sd"] = $records['surrene_dx'];
        $_POST["prelievi_mf_ss"] = $records['surrene_sx'];
        $_POST["prelievi_mf_rd"] = $records['rene_dx'];
        $_POST["prelievi_mf_rs"] = $records['rene_sx'];
        
		$_SESSION["prelievi_mf5"] = "Y";
        
    }
    }							       
?>