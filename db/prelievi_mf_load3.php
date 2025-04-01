<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/prelievi_mf.php");

	$obj = new prelievi_mf();

	$records= $obj->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
     if($obj->fetchNumRows() == 0){
         $_SESSION["prelievi_mf3"] = "N";
    }
    else {
	    $_POST["prelievi_mf_paragangli"] = $records['app_circolatorio_paragangli_aortico_polmonari'];
        $_POST["prelievi_mf_aorta"] = $records['app_circolatorio_aorta'];
        $_POST["prelievi_mf_tronco"] = $records['app_circolatorio_tronco_polmonare'];
        $_POST["prelievi_mf_pericardio"] = $records['app_circolatorio_pericardio'];
        $_POST["prelievi_mf_atrioDX"] = $records['app_circolatorio_parete_atrio_dx'];
        $_POST["prelievi_mf_atrioSX"] = $records['app_circolatorio_parete_atrio_sx'];
        $_POST["prelievi_mf_setto"] = $records['app_circolatorio_setto_interventricolare'];
        $_POST["prelievi_mf_ventrDX"] = $records['app_circolatorio_parete_ventricolo_dx'];
        $_POST["prelievi_mf_ventrSX"] = $records['app_circolatorio_parete_ventricolo_sx'];
        $_POST["prelievi_mf_ramoA"] = $records['app_circolatorio_coronaria_sx_ramo_disc_ant'];
        $_POST["prelievi_mf_ramoC"] = $records['app_circolatorio_coronaria_sx_ramo_circ'];
        $_POST["prelievi_mf_ramoP"] = $records['app_circolatorio_coronaria_dx_ramo_disc_post'];
        $_POST["prelievi_mf_ramoM"] = $records['app_circolatorio_coronaria_dx_ramo_marg'];
    
        $_SESSION["prelievi_mf3"] = "Y";
    }
    }							       
?>