<?php
function loadPage() {
	require_once("./db/databases.php");
    require_once("./db/scheda_sids.php");
    require_once("./db/dati_sids.php");
   
    $obx = new dati_sids();
    
    $recordz= $obx->fetchRecord(array("schede_id"=>$_SESSION['case_id']));
    
    $_POST["data_morte"] = $recordz['data_morte'];
    $_POST["data_nato"] = $recordz['data_nascita'];
    
    
    
	$obj = new scheda_sids();

    
	$records= $obj->fetchRecord(array("dati_sids_schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
    if($records['idmedici'] === null){
        $_SESSION["scheda_sids_2"] = "N";
    }
    else {	
        if($_SESSION['stato']=='chiusa'){
            $_POST["scheda_sids_ultimo"] = "****-**-**";
            $_POST["scheda_sids_patoatto"] = $records['patologie_in_atto'];
            $_POST["scheda_sids_tipopatoatto"] = $records['tipologie_patologie_in_atto'];
            $_POST["scheda_sids_specpatoatto"] = $records['specifica_tipologie_patologie_in_atto'];
            $_POST["scheda_sids_distresp"] = $records['disturbi_respiratori'];
            $_POST["scheda_sids_tipodispresp"] = $records['tipologie_disturbi_respiratori'];
            $_POST["scheda_sids_specdistresp"] = $records['specifica_tipologie_disturbi_respiratori'];
            $_POST["scheda_sids_vacc"] = $records['vaccinazioni_ultimo_mese'];
            $_POST["scheda_sids_tipovacc"] = $records['tipologie_vaccinazioni_ultimo_mese'];
            $_POST["scheda_sids_riscontro"] = $records['effettuato_riscontro_diagnostico'];
            $_POST["scheda_sids_riscdove"] = $records['riscontro_diagnostico_dove'];
            $_POST["scheda_sids_prelievi"] = $records['prelievi_secondo_prot_naz'];
            $_POST["scheda_sids_datarisc"] = "****-**-**";
            $_POST["scheda_sids_medico"] = "****";
        }
        else{
            $_POST["scheda_sids_ultimo"] = $records['data_ultimo_controllo_pediatrico'];
            $_POST["scheda_sids_patoatto"] = $records['patologie_in_atto'];
            $_POST["scheda_sids_tipopatoatto"] = $records['tipologie_patologie_in_atto'];
            $_POST["scheda_sids_specpatoatto"] = $records['specifica_tipologie_patologie_in_atto'];
            $_POST["scheda_sids_distresp"] = $records['disturbi_respiratori'];
            $_POST["scheda_sids_tipodispresp"] = $records['tipologie_disturbi_respiratori'];
            $_POST["scheda_sids_specdistresp"] = $records['specifica_tipologie_disturbi_respiratori'];
            $_POST["scheda_sids_vacc"] = $records['vaccinazioni_ultimo_mese'];
            $_POST["scheda_sids_tipovacc"] = $records['tipologie_vaccinazioni_ultimo_mese'];
            $_POST["scheda_sids_riscontro"] = $records['effettuato_riscontro_diagnostico'];
            $_POST["scheda_sids_riscdove"] = $records['riscontro_diagnostico_dove'];
            $_POST["scheda_sids_prelievi"] = $records['prelievi_secondo_prot_naz'];
            $_POST["scheda_sids_datarisc"] = $records['data_riscontro_diagnostico'];
            $_POST["scheda_sids_medico"] = $records['medico_effettuato_riscontro'];
        }
        
        $_SESSION["scheda_sids_2"] = "Y";
    }
    

    }							       
?>