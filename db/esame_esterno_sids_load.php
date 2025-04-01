<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/esame_esterno_sids.php");
    require_once("./db/dati_protocollo_sids.php");
    require_once("./db/dati_sids.php");
   
    $obx = new dati_sids();
    
    $recordz= $obx->fetchRecord(array("schede_id"=>$_SESSION['case_id']));
    
    $_POST["data_morte"] = $recordz['data_morte'];
    
    

	$obj = new esame_esterno_sids();

	$records= $obj->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));

    	
    if($obj->fetchNumRows() == 0){
        $_SESSION["esame_esterno_sids"] = "N";
    }
    else {
	    $_POST["esame_esterno_documentazione"] = $records['documentazione_foto_video'];
        $_POST["esame_esterno_formato"] = $records['documentazione'];
        $_POST["esame_esterno_peso"] = $records['peso_gr'];
        $_POST["esame_esterno_lung"] = $records['lunghezza_tot_cm'];
        $_POST["esame_esterno_segni"] = $records['segni_tanatologici'];
        $_POST["esame_esterno_naso"] = $records['presenza_sangue_naso'];
        $_POST["esame_esterno_bocca"] = $records['presenza_sangue_bocca'];
        $_POST["esame_esterno_urine"] = $records['presenza_urine_sangue_feci_orifizi'];
        $_POST["esame_esterno_specU"] = $records['specifica_presenza_urine_sangue_feci_orifizi'];

        $_SESSION["esame_esterno_sids"] = "Y";
    }
    
	$objj = new dati_protocollo_sids();

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