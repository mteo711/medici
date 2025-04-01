<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/prelievi_mf.php");

	$obj = new prelievi_mf();

	$records= $obj->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
     if($obj->fetchNumRows() == 0){
         $_SESSION["prelievi_mf6"] = "N";
    }
    else {
	    $_POST["prelievi_mf_stellato"] = $records['gangli_simpatici_stellato'];
        $_POST["prelievi_mf_cervicale"] = $records['gangli_simpatici_cervicale_sup'];
        $_POST["prelievi_mf_corpo"] = $records['biforcazione_carotidea_giomo_corpo_carotideo'];
        $_POST["prelievi_mf_seno"] = $records['biforcazione_carotidea_seno_carotideo'];
        $_POST["prelievi_mf_timo"] = $records['timo'];
        $_POST["prelievi_mf_tiroide"] = $records['tiroide'];
        $_POST["prelievi_mf_milza"] = $records['milza'];
        $_POST["prelievi_mf_fegato"] = $records['fegato'];
        $_POST["prelievi_mf_pancreas"] = $records['pancreas'];
    
        $_SESSION["prelievi_mf6"] = "Y";
    }
    }							       
?>