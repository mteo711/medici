<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/apparato_cardiovascolare_sids.php");

	$obj = new apparato_cardiovascolare_sids();

	$records= $obj->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));

    	
    if($obj->fetchNumRows() == 0){
       $_SESSION["apparato_cardiovascolare_sids"] = "N";
    }
    else {
	    $_POST["cardiovascolare_versamenti"] = $records['versamenti'];
        $_POST["cardiovascolare_altro"] = $records['altro'];
        $_POST["cardiovascolare_forma"] = $records['cuore_forma'];
        $_POST["cardiovascolare_volume"] = $records['cuore_volume'];
        $_POST["cardiovascolare_consistenza"] = $records['cuore_consistenza'];
        $_POST["cardiovascolare_epicardio"] = $records['epicardio'];
        $_POST["cardiovascolare_peso"] = $records['cuore_peso_gr'];
        $_POST["cardiovascolare_diametroT"] = $records['diametro_trasverso_mm'];
        $_POST["cardiovascolare_diametroL"] = $records['diametro_longitudinale_mm'];
        $_POST["cardiovascolare_diametroAP"] = $records['diametro_antero_posteriore_mm'];
        $_POST["cardiovascolare_spessVD"] = $records['spessore_ventricolo_dx_mm'];
        $_POST["cardiovascolare_spessVS"] = $records['spessore_ventricolo_sx_mm'];
        $_POST["cardiovascolare_spessSI"] = $records['spessore_setto_interventricolare_mm'];
        $_POST["cardiovascolare_forame"] = $records['forame_ovale'];
        $_POST["cardiovascolare_dotto"] = $records['dotto_arterioso'];
        $_POST["cardiovascolare_endocardio"] = $records['endocardio_parietale_valvolare'];
        $_POST["cardiovascolare_miocardio"] = $records['miocardio'];
        $_POST["cardiovascolare_osti"] = $records['osti_coronarici_seno_coronarico'];
        $_POST["cardiovascolare_coronarie"] = $records['coronarie'];
        $_POST["cardiovascolare_aortaA"] = $records['aorta_asc_arco_aortico'];
        $_POST["cardiovascolare_tronco"] = $records['tronco_polmonare_rami_principali'];
        $_POST["cardiovascolare_grossi"] = $records['grossi_tronchi_arteriosi_arco'];
        $_POST["cardiovascolare_aortaT"] = $records['aorta_toracica_addominale'];
        $_POST["cardiovascolare_vene"] = $records['vene_cave_tronchi_venosi'];
        $_SESSION["apparato_cardiovascolare_sids"] = "Y";
    }
    }							       
?>