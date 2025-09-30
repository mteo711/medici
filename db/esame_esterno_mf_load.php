<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/esame_esterno_mf.php");
    require_once("./db/dati_protocollo_mf.php");
    require_once("./db/dati_feto.php");
   
    $obx = new dati_feto();
    
    $recordz= $obx->fetchRecord(array("schede_id"=>$_SESSION['case_id']));
    
   
  $_POST["data_morte"] = $recordz['data_morte'];

	$obj = new esame_esterno_mf();

	$records= $obj->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));

    	
    if($obj->fetchNumRows() == 0){
        $_SESSION["esame_esterno_mf"] = "N";
    }
    else {
        $_POST["esame_esterno_documentazione"] = $records['documentazione_foto_video'];
        $_POST["esame_esterno_formato"] = $records['documentazione'];
        $_POST["esame_esterno_peso"] = $records['peso_gr'];
        $_POST["esame_esterno_lung"] = $records['lunghezza_tot_cm'];
        $_POST["esame_esterno_lungVP"] = $records['lunghezza_vertice_podice_cm'];
        $_POST["esame_esterno_circC"] = $records['circ_cranica_cm'];
        $_POST["esame_esterno_circT"] = $records['circ_toracica_cm'];
        $_POST["esame_esterno_circA"] = $records['circ_addom_cm'];
        $_POST["esame_esterno_lungO"] = $records['lunghezza_omero_cm'];
        $_POST["esame_esterno_lungF"] = $records['lunghezza_femore_cm'];
        $_POST["esame_esterno_lungP"] = $records['lunghezza_piede'];
        $_POST["esame_esterno_lungM"] = $records['moncone_ombelicale_cm'];
        $_POST["esame_esterno_percentile"] = $records['percentile_crescita'];
        $_POST["esame_esterno_fenotipo"] = $records['descrizione_fenotipo'];
        $_POST["esame_esterno_nutrizione"] = $records['nutrizione'];
        $_POST["esame_esterno_idrope"] = $records['idrope_cutanea'];
        $_POST["esame_esterno_plica"] = $records['plica_nucale_diametro_trasverso_mm'];
        $_POST["esame_esterno_igroma"] = $records['igroma_cistico_collo'];
        $_POST["esame_esterno_macerazione"] = $records['macerazione_grado'];
        $_POST["esame_esterno_colorito"] = $records['colorito'];
        $_POST["esame_esterno_specS"] = $records['specifica_sede_marezzature_petecchie'];
        $_POST["esame_esterno_vernice"] = $records['vernice_caseosa_sede_quantita'];
        $_POST["esame_esterno_genitali"] = $records['caratteristiche_genitali'];
        $_POST["esame_esterno_estremita"] = $records['estremita'];
        $_POST["esame_esterno_cordone"] = $records['moncone_cordone_ombelicale'];
        $_POST["esame_esterno_specC"] = $records['moncone_cordone_ombelicale_num_vasi'];
        
        $_SESSION["esame_esterno_mf"] = "Y";
    }
    
	$objj = new dati_protocollo_mf();

	$recordy= $objj->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

    	
    if($objj->fetchNumRows() == 0){
    }
    else {
        $_POST["esame_esterno_num"] = $recordy['num_autopsia'];
        $_POST["esame_esterno_data"] = $recordy['data_autopsia'];
        $_POST["esame_esterno_medico"] = $recordy['medico_settore'];
    }
    }							       
?>