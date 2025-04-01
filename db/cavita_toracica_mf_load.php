<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/cavita_toracica_mf.php");

	$obj = new cavita_toracica_mf();

	$records= $obj->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));

    	
    if($obj->fetchNumRows() == 0){
       $_SESSION["cavita_toracica_mf"] = "N";
    }
    else {
        $_POST["cavita_toracica_sito"] = $records['stato_viscerale'];
        $_POST["cavita_toracica_versamenti"] = $records['versamenti_cavi_pleurici'];
        $_POST["cavita_toracica_pneumo"] = $records['pneumotorace'];
        $_POST["cavita_toracica_asimmetria"] = $records['asimmetria_viscerale'];
        $_POST["cavita_toracica_specA"] = $records['specifica_asimmetria_viscerale'];
        $_POST["cavita_toracica_aeree"] = $records['laringe_trachea_bronchi'];
        $_POST["cavita_toracica_specV"] = $records['specifica_laringe_trachea_bronchi_malformata'];
        $_POST["cavita_toracica_esofago"] = $records['esofago'];
        $_POST["cavita_toracica_specE"] = $records['specifica_esofago_malformazioni'];
        
        
        $_SESSION["cavita_toracica_mf"] = "Y";
    }
        
    }							       
?>