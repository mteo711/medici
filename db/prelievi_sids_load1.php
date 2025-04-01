<?php
function loadPage() {
	require_once("./db/databases.php");
    require_once("./db/prelievi_sids.php");

	$obj = new prelievi_sids();

	$records= $obj->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
     if($obj->fetchNumRows() == 0){
         $_SESSION["prelievi_sids1"] = "N";
    }
    else {	
        $_POST["prelievi_sids_corteccia"] = $records['encefalo_corteccia_cerebrale'];
        $_POST["prelievi_sids_ippocampo"] = $records['encefalo_ippocampo'];
        $_POST["prelievi_sids_nuclei"] = $records['encefalo_nuclei_della_base'];
        $_POST["prelievi_sids_tronco"] = $records['enefalo_tronco_encefalico'];
        
		$_SESSION["prelievi_sids1"] = "Y";

    }
    }							       
?>