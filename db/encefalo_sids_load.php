<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/encefalo_sids.php");

	$obj = new encefalo_sids();

	$records= $obj->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));

    	
    if($obj->fetchNumRows() == 0){
        $_SESSION["encefalo_sids"] = "N";
    }
    else {
        $_POST["encefalo_peso"] = $records['peso_gr'];
        $_POST["encefalo_malformazioni"] = $records['malformazioni'];
        $_POST["encefalo_specM"] = $records['specifica_malformazioni'];
        $_POST["encefalo_taglio"] = $records['taglio_emisferi'];
        $_POST["encefalo_tronco"] = $records['tronco_cerebrale'];
        $_POST["encefalo_aspetto"] = $records['aspetto_esterno'];
        $_POST["encefalo_specW"] = $records['specifica_poligono_Willis'];
        $_SESSION["encefalo_sids"] = "Y";
    }
    }							       
?>