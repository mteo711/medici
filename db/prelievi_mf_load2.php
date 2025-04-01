<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/prelievi_mf.php");

	$obj = new prelievi_mf();

	$records= $obj->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
     if($obj->fetchNumRows() == 0){
         $_SESSION["prelievi_mf2"] = "N";
    }
    else {
	    $_POST["prelievi_mf_dxilo"] = $records['polmone_dx_ilo'];
        $_POST["prelievi_mf_dxsup"] = $records['polmone_dx_lobo_superiore'];
        $_POST["prelievi_mf_dxmedio"] = $records['polmone_dx_lobo_medio'];
        $_POST["prelievi_mf_dxinf"] = $records['polmone_dx_lobo_inferiore'];
        $_POST["prelievi_mf_sxilo"] = $records['polmone_sx_ilo'];
        $_POST["prelievi_mf_sxsup"] = $records['polmone_sx_lobo_superiore'];
        $_POST["prelievi_mf_sxinf"] = $records['polmone_sx_lobo_inferiore'];
        
		$_SESSION["prelievi_mf2"] = "Y";
        
    }
    }							       
?>