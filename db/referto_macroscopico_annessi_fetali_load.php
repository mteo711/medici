<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/referto_macroscopico_annessi_fetali.php");

	$obj = new referto_macroscopico_annessi_fetali();

	$records= $obj->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
     if($obj->fetchNumRows() == 0){
         $_SESSION["annessi1"] = "N";
    }
    else {
        $_POST["annessi_placenta"] = $records['placenta'];
        $_POST["annessi_pervenuta"] = $records['placenta_pervenuta'];
        $_POST["annessi_punto"] = $records['placenta_membrane_punto_rottura'];
        $_POST["annessi_distanza"] = $records['placenta_distanza_margine_disco_coriale_cm'];
        $_POST["annessi_intersezione"] = $records['placenta_inserzione'];
        $_POST["annessi_caratteristiche"] = $records['placenta_caratteristiche'];

        $_SESSION["annessi1"] = "Y";
    }
    }							       
?>