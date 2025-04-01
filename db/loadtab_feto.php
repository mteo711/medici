<?php

    include_once("databases.php");
    include_once("dati_feto.php");
    include_once("scheda_feto.php");

    function tab_feto() {
        
         //dati_feto
        $objp = new dati_feto();

	    $recordp = $objp->fetchRecord(array("schede_id"=>$_SESSION['case_id']));
    
        if($objp->fetchNumRows() == 0){
            $_SESSION['personaliF'] = "tabs";
        }
        else {
            if (($recordp['cognome'] == null) || ($recordp['nome'] == null) || ($recordp['comune'] == null) || ($recordp['provincia'] == null) || ($recordp['sesso'] == null) || ($recordp['data_morte'] == null) || ($recordp['data_ultimo_controllo'] == null) || ($recordp['eta_settimana_gestazione'] == null)){
                
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new dati_feto();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['personaliF'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new dati_feto();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['personaliF'] = "tabs_ok";
            }
        }
        
        
        //scheda_feto
        $obja = new scheda_feto();

	    $recorda = $obja->fetchRecord(array("dati_feto_schede_id"=>$_SESSION['case_id']));
        
        if($obja->fetchNumRows() == 0){
            $_SESSION['schedaF'] = "tabs";
        }
        else {
            if ((($recorda['liquido_amniotico'] == null) || (($recorda['liquido_amniotico'] == 'patologico') && ($recorda['specifica_patologico_liquido_amniotico'] == null))) || (($recorda['RX_scheletro'] == null) || (($recorda['RX_scheletro'] == 'Y') && ($recorda['specifica_RX_scheletro'] == null))) || ($recorda['prelievi_secondo_prot_naz'] == null) || (($recorda['effettuato_riscontro_diagnostico'] == null) || (($recorda['effettuato_riscontro_diagnostico'] == 'Y') && (($recorda['riscontro_diagnostico_dove'] == null) || ($recorda['data_riscontro_diagnostico'] == null) || ($recorda['medico_effettuato_riscontro'] == null))))){
                
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new scheda_feto();
                $condition= array("dati_feto_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['schedaF'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new scheda_feto();
                $condition= array("dati_feto_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['schedaF'] = "tabs_ok";
            }
        }

    }

?>