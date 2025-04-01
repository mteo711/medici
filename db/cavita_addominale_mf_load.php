<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/cavita_addominale_mf.php");

	$obj = new cavita_addominale_mf();

	$records= $obj->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));

    	
    if($obj->fetchNumRows() == 0){
       $_SESSION["cavita_addominale_mf"] = "N";
    }
    else {
        $_POST["addominale_sito"] = $records['stato_viscerale'];
        $_POST["addominale_numA"] = $records['num_arterie_vena_ombelicale_normali'];
        $_POST["addominale_tipoA"] = $records['arterie_vena_ombelicale_stato'];
        $_POST["addominale_dotto"] = $records['dotto_Aranzio'];
        $_POST["addominale_vene"] = $records['vene_sovraepatiche_vena_cava_inf'];
        $_POST["addominale_specV"] = $records['specifica_vene_sovraepatiche_vena_cava_inf_malformate'];
        $_POST["addominale_stomaco"] = $records['stomaco'];
        $_POST["addominale_intestino"] = $records['piccolo_grosso_intestino'];
        $_POST["addominale_specI"] = $records['specifica_piccolo_grosso_intestino_malformazioni'];
        $_POST["addominale_ciecale"] = $records['appendice_ciecale_sita_in'];
        $_POST["addominale_pesoF"] = $records['fegato_peso_gr'];
        $_POST["addominale_volumeF"] = $records['fegato_volume'];
        $_POST["addominale_isomerismo"] = $records['fegato_isomerismo'];
        $_POST["addominale_specF"] = $records['specifica_fegato_isomerismo'];
        $_POST["addominale_consistenzaF"] = $records['fegato_consistenza'];
        $_POST["addominale_superficieF"] = $records['fegato_superficie'];
        $_POST["addominale_parenchima"] = $records['fegato_parenchima_al_taglio'];
        $_POST["addominale_colecisti"] = $records['colecisti'];
        $_POST["addominale_biliari"] = $records['vie_biliarie_extraepatiche'];
        $_POST["addominale_pancreas"] = $records['pancreas'];
        $_POST["addominale_specP"] = $records['specifica_pancreas_malformato'];
        $_POST["addominale_milza"] = $records['milza'];
        $_POST["addominale_numM"] = $records['milza_num'];

        $_SESSION["cavita_addominale_mf"] = "Y";
    }
    }							       
?>