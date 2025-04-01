<?php
function loadPage() {
    require_once("./db/databases.php");
    require_once("./db/encefalo_mf.php");
    require_once("./db/esame_interno_mf.php");

	$obj = new encefalo_mf();

	$records= $obj->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));

    if($obj->fetchNumRows() == 0){
        $_SESSION["encefalo_mf"] = "N";
    }
    else {
        $_POST["encefalo_peso"] = $records['peso_gr'];
        $_POST["encefalo_fontanellaA"] = $records['fontanella_anteriore'];
        $_POST["encefalo_fontanellaP"] = $records['fontanella_posteriore'];
        $_POST["encefalo_dura"] = $records['dura_madre'];
        $_POST["encefalo_seno"] = $records['seno_venoso'];
        $_POST["encefalo_emorragie"] = $records['emorragie'];
        $_POST["encefalo_lepto"] = $records['leptomeningi'];
        $_POST["encefalo_willis"] = $records['poligono_Willis'];
        $_POST["encefalo_solchi"] = $records['solchi'];
        $_POST["encefalo_taglio"] = $records['taglio_emisferi'];
        $_POST["encefalo_tronco"] = $records['tronco_cerebrale'];
        $_POST["encefalo_plessi"] = $records['plessi_corioidei'];
        $_POST["encefalo_setto"] = $records['setto_pellucido'];
        $_POST["encefalo_corpo"] = $records['corpo_calloso'];
        $_POST["encefalo_ventricoli"] = $records['ventricoli'];
        
        $_SESSION["encefalo_mf"] = "Y";
    }
    
    $objy = new esame_interno_mf();

	$recordy= $objy->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));
    
    if($objy->fetchNumRows() == 0){
    }
    else {
        $_POST["encefalo_sterno"] = $recordy['sterno_gabbia_toracica'];
        $_POST["encefalo_specS"] = $recordy['specifica_sterno_gabbia_toracica_malformati'];
        $_POST["encefalo_colonna"] = $recordy['colonna_vertebrale'];
        $_POST["encefalo_diaframma"] = $recordy['diaframma'];
    }
    }							       
?>