<?php
function loadPage() {
	require_once("./db/databases.php");
    require_once("./db/patologie_gest.php");

	$obj = new patologie_gest();

	$records= $obj->fetchRecord(array("madre_schede_id"=>$_SESSION['case_id']));

    	
    if($obj->fetchNumRows() == 0){
        $_SESSION["patologie_gest"] = "N";
        $_SESSION["patologie_gestF"] = "N";
    }
    else {
	    $_POST["patologie_gest_ipertensione"] = $records['presenza_ipertensione'];
        $_POST["patologie_gest_specI"] = $records['periodo_ipertensione'];
        $_POST["patologie_gest_diabete"] = $records['presenza_diabete'];
        $_POST["patologie_gest_specD"] = $records['periodo_diabete'];
        $_POST["patologie_gest_emoglobina"] = $records['presenza_alterazione_emoglobina'];
        $_POST["patologie_gest_tipoE"] = $records['tipologie_alterazione_emoglobina'];
        $_POST["patologie_gest_specE"] = $records['specifica_tipologie_alterazione_emoglobina'];
        $_POST["patologie_gest_coagulazione"] = $records['presenza_alterazione_coagulazione'];
        $_POST["patologie_gest_autoimmuni"] = $records['presenza_malattie_autoimmuni'];
        $_POST["patologie_gest_infezioni"] = $records['presenza_infezioni_materne'];
        $_POST["patologie_gest_tipoPre"] = $records['tipologie_infezioni_materne_preconcezionale'];
        $_POST["patologie_gest_specPre"] = $records['specifica_tipologie_infezioni_materne_preconcezionale'];
        $_POST["patologie_gest_tipoPeri"] = $records['tipologie_infezioni_materne_peri_postconcezionale'];
        $_POST["patologie_gest_specPeri"] = $records['specifica_tipologie_infezioni_materne_peri_postconcezionale'];
        $_POST["patologie_gest_patologie"] = $records['altre_patologie'];
        $_POST["patologie_gest_tipoP"] = $records['tipo_altre_patologie'];
        $_POST["patologie_gest_specP"] = $records['specifica_altre_patologie'];

         $_POST["patologie_gest_screening"] = $records['screening'];
         $_POST["patologie_gest_tipoS"] = $records['tipo_screening'];


         $_POST["patologie_gest_sanguematerno"] = $records['sangue_materno'];
         $_POST["patologie_gest_dataDNA"] = $records['dataDNA'];
         $_POST["patologie_gest_risultato"] = $records['risultato'];         
         $_POST["patologie_gest_altriTest"] = $records['altri_test'];

        
		$_SESSION["patologie_gest"] = "Y";
        $_SESSION["patologie_gestF"] = "Y";
        
    }
    }							       
?>