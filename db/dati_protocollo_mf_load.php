<?php
function loadPage() {
	require_once("./db/databases.php");
    require_once("./db/dati_protocollo_mf.php");

	$obj = new dati_protocollo_mf();

	$records= $obj->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

    	
    if($obj->fetchNumRows() == 0){
       $_SESSION["dati_protocollo_mf"] = "N";
    }
    else {
        $_POST["dati_protocollo_referti"] = $records['principali_referti_patologici'];
        $_POST["dati_protocollo_diagnosi"] = $records['diagnosi_anatomo_patologica'];
        $_SESSION["dati_protocollo_mf"] = "Y";
    }
    }							       
?>