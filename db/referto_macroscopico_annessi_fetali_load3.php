<?php
function loadPage() {
	require_once("./db/databases.php");
    require_once("./db/referto_macroscopico_annessi_fetali.php");

	$obj = new referto_macroscopico_annessi_fetali();

	$records= $obj->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
     if($records['iddisco'] === null){
         $_SESSION["annessi3"] = "N";
    }
    else {
	    $_POST["annessi_peso"] = $records['disco_coriale_peso_gr'];
        $_POST["annessi_diam1"] = $records['disco_coriale_diametro1_cm'];
        $_POST["annessi_diam2"] = $records['disco_coriale_diametro2_cm'];
        $_POST["annessi_spess1"] = $records['disco_coriale_spessore_max_cm'];
        $_POST["annessi_spess2"] = $records['disco_coriale_spessore_min_cm'];
        $_POST["annessi_forma"] = $records['disco_coriale_forma'];
        $_POST["annessi_vfetale"] = $records['versante_fetale'];
        $_POST["annessi_vmaterno"] = $records['versante_materno'];
        $_POST["annessi_emaR"] = $records['ematomi_retroplacentari'];
        $_POST["annessi_emaRV"] = $records['ematomi_retroplacentari_diametro_max_cm'];
        $_POST["annessi_emaM"] = $records['ematomi_marginali'];
        $_POST["annessi_emaMV"] = $records['ematomi_marginali_diametro_max_cm'];
        $_POST["annessi_emaI"] = $records['ematomi_intervillosi'];
        $_POST["annessi_emaIV"] = $records['ematomi_intervillosi_diametro_max_cm'];
        $_POST["annessi_infR"] = $records['infarti_recenti'];
        $_POST["annessi_infRV"] = $records['infarti_recenti_diametro_max_cm'];
        $_POST["annessi_infV"] = $records['infarti_vecchia_data'];
        $_POST["annessi_infVV"] = $records['infarti_vecchia_diametro_max_cm'];
        $_POST["annessi_distribuzione"] = $records['vasi_coriali_distribuzione'];

        $_SESSION["annessi3"] = "Y";
    }
    }							       
?>