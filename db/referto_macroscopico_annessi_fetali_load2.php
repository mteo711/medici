<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/referto_macroscopico_annessi_fetali.php");

	$obj = new referto_macroscopico_annessi_fetali();

	$records= $obj->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
     if($records['idcordone'] === null){
         $_SESSION["annessi2"] = "N";
    }
    else {
        $_POST["annessi_lungC"] = $records['cordone_ombelicale_lunghezza_cm'];
        $_POST["annessi_diamMax"] = $records['cordone_ombelicale_diametro_max_cm'];
        $_POST["annessi_diamMin"] = $records['cordone_ombelicale_diametro_min_cm'];
        $_POST["annessi_inserzione"] = $records['cordone_ombelicale_inserzione'];
        $_POST["annessi_distMC"] = $records['cordone_ombelicale_dist_margine_materno_fetale_cm'];
        $_POST["annessi_altro"] = $records['cordone_ombelicale_altro'];

        $_SESSION["annessi2"] = "Y";
    }
    }							       
?>