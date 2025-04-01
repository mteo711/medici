<?php
function loadPage() {
    require_once("./db/databases.php");
    require_once("./db/cavita_toracica_sids.php");

	$obj = new cavita_toracica_sids();

	$records= $obj->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));

    	
    if($obj->fetchNumRows() == 0){
       $_SESSION["cavita_toracica_sids"] = "N";
    }
    else {
	    $_POST["cavita_toracica_aeree"] = $records['vie_aeree'];
        $_POST["cavita_toracica_versamenti"] = $records['versamenti'];
        $_POST["cavita_toracica_pneumotorace"] = $records['pneumotorace'];
        $_POST["cavita_toracica_altro"] = $records['altro_cavi_pleurici'];
        $_POST["cavita_toracica_asimmetria"] = $records['asimmetria_viscerale'];
        $_POST["cavita_toracica_specA"] = $records['specifica_asimmetria_viscerale'];
        
		
		$_SESSION["cavita_toracica_sids"] = "Y";
        
    }
    }							       
?>