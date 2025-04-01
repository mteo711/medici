<?php
function loadPage() {
	require_once("./db/databases.php");
    require_once("./db/madre.php");

	$obj = new madre();

	$records= $obj->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
    if($records['idalcol'] === null){
        $_SESSION["madre_alcol"] = "N";
        $_SESSION["madre_alcolF"] = "N";
    }
    else {
        //$sql = "select idalcol, alcool, alcool_quali_quantita, stupefacenti, stupefacenti_quali_quantita FROM madre WHERE schede_id = $_SESSION[case_id]";
        $_POST["madre_alcol_alcol"] = $records['alcool'];
        $_POST["madre_alcol_specA"] = $records['alcool_quali_quantita'];
        $_POST["madre_alcol_stupefacenti"] = $records['stupefacenti'];
        $_POST["madre_alcol_specS"] = $records['stupefacenti_quali_quantita'];

        $_SESSION["madre_alcol"] = "Y";
        $_SESSION["madre_alcolF"] = "Y";
    }
    }							       
?>