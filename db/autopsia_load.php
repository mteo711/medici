<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/dati_protocollo_sids.php");
   
	$objj = new dati_protocollo_sids();

	$recordy= $objj->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

    	
    if($objj->fetchNumRows() == 0){
        $_SESSION["autopsia_sids"] = "N";
    }
    else {
        $_POST["autopsia"] = $recordy['autopsia'];
        $_SESSION["autopsia_sids"] = "Y";
    }
    }							       
?>