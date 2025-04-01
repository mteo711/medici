<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/cavita_addominale_mf.php");

	$obj = new cavita_addominale_mf();

	$records= $obj->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));
    
    if($records['idreni'] === null){
        $_SESSION["cavita_addominale_mf2"] = "N";
    }
    else {
        $_POST["addominale_surreni"] = $records['surreni'];
        $_POST["addominale_malfoS"] = $records['specifica_surreni_malformati'];
        $_POST["addominale_emorragie"] = $records['surreni_emorragie'];
        $_POST["addominale_ispessimenti"] = $records['surreni_ispessimenti'];
        $_POST["addominale_pesoRD"] = $records['rene_dx_peso_gr'];
        $_POST["addominale_statoRD"] = $records['rene_dx_stato'];
        $_POST["addominale_specRD"] = $records['specifica_rene_dx_malformazione'];
        $_POST["addominale_ischemiaRD"] = $records['rene_dx_ischemia_corticale_congestione_midollare'];
        $_POST["addominale_microlisiRD"] = $records['rene_dx_microlisi_ascessualizzazioni'];
        $_POST["addominale_pesoRS"] = $records['rene_sx_peso_gr'];
        $_POST["addominale_statoRS"] = $records['rene_sx_stato'];
        $_POST["addominale_specRS"] = $records['specifica_rene_sx_malformazione'];
        $_POST["addominale_ischemiaRS"] = $records['rene_sx_ischemia_corticale_congestione_midollare'];
        $_POST["addominale_microlisiRS"] = $records['rene_sx_microlisi_ascessualizzazioni'];
        $_POST["addominale_ureteri"] = $records['ureteri'];
        $_POST["addominale_specU"] = $records['specifica_ureteri_malformazioni'];
        $_POST["addominale_vescica"] = $records['vescica_urinaria'];
        $_POST["addominale_specV"] = $records['specifica_vescica_urinaria_malformazione'];
        $_POST["addominale_contenuto"] = $records['vescica_urinaria_contenuto'];
        $_POST["addominale_uraco"] = $records['uraco'];
        $_POST["addominale_testicoli"] = $records['testicoli'];
        $_POST["addominale_uto"] = $records['utero_tube_ovaie'];
        $_POST["addominale_specUTO"] = $records['specifica_utero_tube_ovaie_malformazioni'];
        $_POST["addominale_grandi"] = $records['grandi_vasi'];
        $_POST["addominale_specG"] = $records['specifica_grandi_vasi_malformazione'];

        $_SESSION["cavita_addominale_mf2"] = "Y";
    }
    }							       
?>