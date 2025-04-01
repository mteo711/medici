<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/cavita_addominale_sids.php");

	$obj = new cavita_addominale_sids();

	$records= $obj->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));

    	
    if($obj->fetchNumRows() == 0){
       $_SESSION["cavita_addominale_sids"] = "N";
    }
    else {
	    $_POST["cavita_addominale_eterotassia"] = $records['eterotassia_viscerale'];
        $_POST["cavita_addominale_malformazioniG"] = $records['tratto_gastroenterico_malformazioni'];
        $_POST["cavita_addominale_specMG"] = $records['specifica_tratto_gastroenterico_malformazioni'];
        $_POST["cavita_addominale_emoraggieG"] = $records['tratto_gastroenterico_emorragie'];
        $_POST["cavita_addominale_altroG"] = $records['tratto_gastroenterico_altro'];
        $_POST["cavita_addominale_pesoS"] = $records['surreni_peso_gr'];
        $_POST["cavita_addominale_emoraggieS"] = $records['surreni_emorragie'];
        $_POST["cavita_addominale_ispessimenti"] = $records['surreni_ispessimenti'];
        $_POST["cavita_addominale_pesoR"] = $records['reni_peso_gr'];
        $_POST["cavita_addominale_malformazioniR"] = $records['reni_malformazioni'];
        $_POST["cavita_addominale_ischemia"] = $records['ischemia_corticale_congestione_midollare'];
        $_POST["cavita_addominale_microlitiasi"] = $records['microlitiasi_ascessualizzazioni'];
        $_POST["cavita_addominale_pesoM"] = $records['milza_peso_gr'];
        $_POST["cavita_addominale_tipoM"] = $records['tipo'];
        $_POST["cavita_addominale_pesoF"] = $records['fegato_peso_gr'];
        $_POST["cavita_addominale_coloreF"] = $records['fegato_colore'];
        $_POST["cavita_addominale_pesoP"] = $records['pancreas_peso_gr'];
        $_POST["cavita_addominale_coloreP"] = $records['pancreas_colore'];
        
		$_SESSION["cavita_addominale_sids"] = "Y";
    }
    }							       
?>