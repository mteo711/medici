<?php
function loadPage() {
	require_once("./db/databases.php");
    require_once("./db/scheda_feto.php");
    require_once("./db/dati_feto.php");

	$obx = new dati_feto();

	$recordz= $obx->fetchRecord(array("schede_id"=>$_SESSION['case_id']));
    $_POST["data_morte"] = $recordz['data_morte'];
    
   
	$obj = new scheda_feto();

	$records= $obj->fetchRecord(array("dati_feto_schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
     if($obj->fetchNumRows() == 0){
         $_SESSION["scheda_feto"] = "N";
    }
    else {	
         $_POST["scheda_feto_liquido"] = $records['liquido_amniotico'];
         $_POST["scheda_feto_specL"] = $records['specifica_patologico_liquido_amniotico'];
         $_POST["scheda_feto_rx"] = $records['RX_scheletro'];
         $_POST["scheda_feto_specRX"] = $records['specifica_RX_scheletro'];
         $_POST["scheda_feto_prot"] = $records['prelievi_secondo_prot_naz'];
         $_POST["scheda_feto_riscontro"] = $records['effettuato_riscontro_diagnostico'];
         $_POST["scheda_feto_dove"] = $records['riscontro_diagnostico_dove'];
         $_POST["scheda_feto_dataR"] = $records['data_riscontro_diagnostico'];
         $_POST["scheda_feto_medico"] = $records['medico_effettuato_riscontro'];

        $_SESSION["scheda_feto"] = "Y";
    }

    }							       
?>