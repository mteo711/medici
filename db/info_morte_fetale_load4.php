<?php
function loadPage() {
	require_once("./db/databases.php");
    require_once("./db/info_morte_fetale.php");

	$obj = new info_morte_fetale();

	$records= $obj->fetchRecord(array("madre_schede_id"=>$_SESSION['case_id']));
    
    if($records['idricovero'] === null){
        $_SESSION["morte_fetale4"] = "N";
    }
    else {
        $_POST["morte_fetale_ricovero"] = $records['ricovero_durante_gravidanza'];
        $_POST["morte_fetale_diagnosi"] = $records['diagnosi_dimissione'];
        $_SESSION["morte_fetale4"] = "Y";
    }
    

    }							       
?>