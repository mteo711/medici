<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/dati_protocollo_sids.php");

	$obj = new dati_protocollo_sids();

	$records= $obj->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

    	
    if($obj->fetchNumRows() == 0){
       $_SESSION["dati_protocollo_sids"] = "N";
    }
    else {
	    $_POST["dati_protocollo_referti"] = $records['principali_referti_patologici'];
        $_POST["dati_protocollo_diagnosi"] = $records['diagnosi_anatomo_patologica'];
        $_POST["dati_protocollo_caso"] = $records['caso_di_sids'];
        $_SESSION["dati_protocollo_sids"] = "Y";
    }
    }							       
?>