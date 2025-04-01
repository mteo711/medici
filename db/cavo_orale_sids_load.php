<?php
function loadPage() {

	require_once("./db/databases.php");
    require_once("./db/cavo_orale_sids.php");

	$obj = new cavo_orale_sids();

	$records= $obj->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));

    	
    if($obj->fetchNumRows() == 0){
       $_SESSION["cavo_orale_sids"] = "N";
    }
    else {
        $_POST["cavo_orale_tiroide"] = $records['tiroide'];
        $_POST["cavo_orale_timo"] = $records['timo'];
        $_POST["cavo_orale_paratiroidi"] = $records['paratiroidi'];
        $_POST["cavo_orale_linfonodi"] = $records['linfonodi'];
        $_POST["cavo_orale_lingua"] = $records['blocco_lingua_ipofaringe'];
        $_POST["cavo_orale_ghiandole"] = $records['ghiandole_salivari_paralinguali'];

        $_SESSION["cavo_orale_sids"] = "Y";
    }
    }							       
?>