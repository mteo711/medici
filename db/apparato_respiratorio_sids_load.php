<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/apparato_respiratorio_sids.php");

	$obj = new apparato_respiratorio_sids();

	$records= $obj->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));

    	
    if($obj->fetchNumRows() == 0){
       $_SESSION["apparato_respiratorio_sids"] = "N";
    }
    else {
        $_POST["respiratorio_laringe"] = $records['laringe'];
        $_POST["respiratorio_trachea"] = $records['trachea'];
        $_POST["respiratorio_bronchi"] = $records['bronchi_principali'];
        $_POST["respiratorio_pesoDX"] = $records['polmone_dx_peso_gr'];
        $_POST["respiratorio_pesoSX"] = $records['polmone_sx_peso_gr'];
        $_POST["respiratorio_lobiDX"] = $records['num_lobi_dx'];
        $_POST["respiratorio_lobiSX"] = $records['num_lobi_sx'];
        $_POST["respiratorio_volume"] = $records['volume'];
        $_POST["respiratorio_consistenza"] = $records['consistenza'];
        $_POST["respiratorio_colore"] = $records['colore'];
        $_POST["respiratorio_superficie"] = $records['sup_esterna'];
        $_POST["respiratorio_taglio"] = $records['al_taglio'];

        $_SESSION["apparato_respiratorio_sids"] = "Y";
    }
    }							       
?>