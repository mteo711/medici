<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/prelievi_mf.php");

	$obj = new prelievi_mf();

	$records= $obj->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));

    	
    if($obj->fetchNumRows() == 0){
       $_SESSION["prelievi_mf1"] = "N";
    }
    else {
	    $_POST["prelievi_mf_corteccia"] = $records['encefalo_corteccia_cerebrale'];
        $_POST["prelievi_mf_ippocampo"] = $records['encefalo_ippocampo'];
        $_POST["prelievi_mf_nuclei"] = $records['encefalo_nuclei_della_base'];
        $_POST["prelievi_mf_tronco"] = $records['enefalo_tronco_encefalico'];
    
        $_SESSION["prelievi_mf1"] = "Y";
    }
    }							       
?>