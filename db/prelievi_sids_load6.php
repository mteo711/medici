<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/prelievi_sids.php");

	$obj = new prelievi_sids();

	$records= $obj->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
     if($obj->fetchNumRows() == 0){
         $_SESSION["prelievi_sids6"] = "N";
    }
    else {
        $_POST["prelievi_sids_stellato"] = $records['gangli_simpatici_stellato'];
        $_POST["prelievi_sids_cervicale"] = $records['gangli_simpatici_cervicale_sup'];
        $_POST["prelievi_sids_corpo"] = $records['biforcazione_carotidea_giomo_corpo_carotideo'];
        $_POST["prelievi_sids_seno"] = $records['biforcazione_carotidea_seno_carotideo'];
        $_POST["prelievi_sids_timo"] = $records['timo'];
        $_POST["prelievi_sids_tiroide"] = $records['tiroide'];
        $_POST["prelievi_sids_milza"] = $records['milza'];
        $_POST["prelievi_sids_fegato"] = $records['fegato'];
        $_POST["prelievi_sids_pancreas"] = $records['pancreas'];

        $_SESSION["prelievi_sids6"] = "Y";
    }
    }							       
?>