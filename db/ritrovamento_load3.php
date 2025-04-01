<?php
function loadPage() {
	require_once("./db/databases.php");
    require_once("./db/ritrovamento.php");
    require_once("./db/dati_sids.php");
   
    $obx = new dati_sids();
    
    $recordz= $obx->fetchRecord(array("schede_id"=>$_SESSION['case_id']));
    
    $_POST["data_morte"] = $recordz['data_morte'];
    $_POST["data_nato"] = $recordz['data_nascita'];
    
    
   
	$obj = new ritrovamento();

	$records= $obj->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
     if($obj->fetchNumRows() == 0){
         $_SESSION["ritrovamento3"] = "N";
    }
    else {	
        if($_SESSION['stato']=='chiusa'){
            $_POST["ritrovamento_dataU"] = "****-**-**";
            $_POST["ritrovamento_oraU"] = "**:**:**"; // $record2[0];
            $_POST["ritrovamento_pastoU"] = "****";
            $_POST["ritrovamento_alimenti"] = $records['alimenti_24_ore'];
            $_POST["ritrovamento_materno"] = $records['latte'];
            $_POST["ritrovamento_polvere"] = $records['polvere'];
            $_POST["ritrovamento_mucca"] = $records['mucca'];
            $_POST["ritrovamento_acqua"] = $records['acqua'];
            $_POST["ritrovamento_liquidi"] = $records['liquidi'];
            $_POST["ritrovamento_omogeneizzati"] = $records['omogeneizzati'];
            $_POST["ritrovamento_specAltro"] = $records['specifica_altro_alimenti'];
            $_POST["ritrovamento_nuovi"] = $records['nuovi_alimenti_ultime_24_ore'];
            $_POST["ritrovamento_specNuovi"] = $records['specifica_nuovi_alimenti_ultime_24_ore'];
            $_POST["ritrovamento_rilevata"] = $records['morte_rilevata_da'];
            $_POST["ritrovamento_specRileva"] = "****";
        }
        else {
            $_POST["ritrovamento_dataU"] = $records['data_ultimo_pasto'];
            $_POST["ritrovamento_oraU"] = $records['ora_ultimo_pasto']; // $record2[0];
            $_POST["ritrovamento_pastoU"] = $records['ultimo_pasto_somministrato_da'];
            $_POST["ritrovamento_alimenti"] = $records['alimenti_24_ore'];
            $_POST["ritrovamento_materno"] = $records['latte'];
            $_POST["ritrovamento_polvere"] = $records['polvere'];
            $_POST["ritrovamento_mucca"] = $records['mucca'];
            $_POST["ritrovamento_acqua"] = $records['acqua'];
            $_POST["ritrovamento_liquidi"] = $records['liquidi'];
            $_POST["ritrovamento_omogeneizzati"] = $records['omogeneizzati'];
            $_POST["ritrovamento_specAltro"] = $records['specifica_altro_alimenti'];
            $_POST["ritrovamento_nuovi"] = $records['nuovi_alimenti_ultime_24_ore'];
            $_POST["ritrovamento_specNuovi"] = $records['specifica_nuovi_alimenti_ultime_24_ore'];
            $_POST["ritrovamento_rilevata"] = $records['morte_rilevata_da'];
            $_POST["ritrovamento_specRileva"] = $records['specifica_morte_rilevata_da'];
        }
        
        
        $_SESSION["ritrovamento3"] = "Y";
    }
    

    }							       
?>