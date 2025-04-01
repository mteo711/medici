<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/scheda_sids.php");
   
	$obj = new scheda_sids();

	$records= $obj->fetchRecord(array("dati_sids_schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
     if($obj->fetchNumRows() == 0){
         $_SESSION["scheda_sids"] = "N";
    }
    else {	
        $_POST["scheda_sids_posizione"] = $records['posizione_sonno'];
        $_POST["scheda_sids_succhiotto"] = $records['succhiotto_sonno'];
        
		$_SESSION["scheda_sids"] = "Y";
        $_SESSION["scheda_sids_2"] = "Y";
    }
    }							       
?>