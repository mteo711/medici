<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/cavo_orale_mf.php");

	$obj = new cavo_orale_mf();

	$records= $obj->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));

    	
    if($obj->fetchNumRows() == 0){
       $_SESSION["cavo_orale_mf"] = "N";
    }
    else {
	    $_POST["cavo_orale_pesoTr"] = $records['tiroide_peso_gr'];
        $_POST["cavo_orale_tipoTr"] = $records['tiroide_stato'];
        $_POST["cavo_orale_specTr"] = $records['specifica_tiroide_stato_malformata'];
        $_POST["cavo_orale_pesoTm"] = $records['timo_peso_gr'];
        $_POST["cavo_orale_tipoTm"] = $records['timo_stato'];
        $_POST["cavo_orale_linfonodi"] = $records['linfonodi'];
        $_POST["cavo_orale_laringe"] = $records['laringe_stato'];
        $_POST["cavo_orale_specL"] = $records['specifica_laringe_stato_malformata'];
        
        
        $_SESSION["cavo_orale_mf"] = "Y";
    }
    }							       
?>