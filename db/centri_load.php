<?php
function loadPage() {
	require_once("./db/databases.php");
    require_once("./db/centri.php");
   
	$obj = new centri();

	$records= $obj->fetchRecord(array("id"=>$_SESSION["centri_id"]));

    // non si fa alcun controllo che venga restituita almeno una righa	
    if($obj->fetchNumRows() == 0){
    }
    else {	
	    $_POST["centri_nome"] = $records['nome'];
        $_POST["centri_via"] = $records['via'];
        $_POST["centri_citta"] = $records['citta'];
        $_POST["centri_cap"] = $records['cap'];
        $_POST["centri_info"] = $records['info'];
        $_POST["centri_telefono"] = $records['telefono'];
        $_POST["centri_email"] = $records['email'];
        $_POST["centri_direttore"] = $records['direttore'];
        $_POST["centri_responsabile"] = $records['responsabile_schede'];
    }
    }							       
?>