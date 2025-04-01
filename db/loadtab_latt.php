<?php
        include_once("databases.php");
        include_once("dati_sids.php");
        include_once("allattamento.php");
        include_once("scheda_sids.php");
    function tab_lattante() {
        
        
        $objp = new dati_sids();

	    $recordp= $objp->fetchRecord(array("schede_id"=>$_SESSION['case_id']));
    
        if($objp->fetchNumRows() == 0){
            $_SESSION['personali'] = "tabs";
        }
        else {
            if (($recordp['cognome'] == null) || ($recordp['nome'] == null) || ($recordp['comune'] == null) || ($recordp['provincia'] == null) || ($recordp['sesso'] == null) || ($recordp['data_nascita'] == null) || ($recordp['data_morte'] == null) || ($recordp['eta_postnatale'] == null) || ($recordp['ora_rilievo_decesso'] == null) || ($recordp['ora_ultimo_controllo_parentale'] == null)){
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new dati_sids();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['personali'] = "tabs_er";
                
            }
            else {
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new dati_sids();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['personali'] = "tabs_ok";
                
            }
        }
        
        $obja = new allattamento();

	    $recorda= $obja->fetchRecord(array("scheda_sids_schede_id"=>$_SESSION['case_id']));
        
        if($obja->fetchNumRows() == 0){
            $_SESSION['allattamento'] = "tabs";
        }
        else {
            if ((($recorda['allattamento_materno']==null) || (($recorda['allattamento_materno']=='Y') && (($recorda['allattamento_materno_nascita']=='N') && (($recorda['allattamento_materno_settD']==null) || ($recorda['allattamento_materno_settA']==null)))) || (($recorda['allattamento_materno']=='Y') && (($recorda['allattamento_materno_nascita']=='Y') && ($recorda['allattamento_materno_settA']==null)))) || (($recorda['allattamento_artificiale']==null) || (($recorda['allattamento_artificiale']=='Y') && (($recorda['allattamento_artificiale_nascita']=='N') && (($recorda['allattamento_artificiale_settD']==null) || ($recorda['allattamento_artificiale_settA']==null)))) || (($recorda['allattamento_artificiale']=='Y') && (($recorda['allattamento_artificiale_nascita']=='Y') && ($recorda['allattamento_artificiale_settA']==null)))) || (($recorda['allattamento_misto']==null) || (($recorda['allattamento_misto']=='Y') && (($recorda['allattamento_misto_nascita']=='N') && (($recorda['allattamento_misto_settD']==null) || ($recorda['allattamento_misto_settA']==null)))) || (($recorda['allattamento_misto']=='Y') && (($recorda['allattamento_misto_nascita']=='Y') && ($recorda['allattamento_misto_settA']==null)))) || (($recorda['allattamento_svezzato']=='Y') && (($recorda['allattamento_svezzato_settD']==null) || ($recorda['allattamento_svezzato_settA']==null)))){
                
                $insert_data1 = array();
                $insert_data1["conclusa"] = "N";
                $obj = new allattamento();
                $condition= array("scheda_sids_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data1,$condition);
                $obj->error();
                
                $_SESSION['allattamento'] = "tabs_er";
            }
            else {
                
                $insert_data1 = array();
                $insert_data1["conclusa"] = "Y";
                $obj = new allattamento();
                $condition= array("scheda_sids_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data1,$condition);
                $obj->error();
                
                $_SESSION['allattamento'] = "tabs_ok";
            }
        }
        
        $objs = new scheda_sids();

	    $records= $objs->fetchRecord(array("dati_sids_schede_id"=>$_SESSION['case_id']));
        //MM 
        //MM: modificato il secondo if per metterlo nell'else di $objs->fetchNumRows()
        if($objs->fetchNumRows() == 0){
            $_SESSION['sonno'] = "tabs";
        }
        else {
            if (($records['posizione_sonno']==null) || ($records['succhiotto_sonno']==null) ){
                
                $insert_data1 = array();
                $insert_data1["conclusa1"] = "N";
                $obj = new scheda_sids();
                $condition= array("dati_sids_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data1,$condition);
                $obj->error();
                
                $_SESSION['sonno'] = "tabs_er";
            }
            else {
                
                $insert_data1 = array();
                $insert_data1["conclusa1"] = "Y";
                $obj = new scheda_sids();
                $condition= array("dati_sids_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data1,$condition);
                $obj->error();
                
                $_SESSION['sonno'] = "tabs_ok";
            }
        
        
        
        if($records['idmedici'] == null){
            $_SESSION['medici'] = "tabs";
        }
        else {
            if (($records['data_ultimo_controllo_pediatrico']==null) || ($records['patologie_in_atto']==null) || (($records['tipologie_patologie_in_atto']==null) && ($records['specifica_tipologie_patologie_in_atto']==null)) || ($records['disturbi_respiratori']==null) || (($records['disturbi_respiratori']=='Y') && (($records['tipologie_disturbi_respiratori']==null) && ($records['specifica_tipologie_disturbi_respiratori']==null))) || (($records['vaccinazioni_ultimo_mese']==null) || (($records['vaccinazioni_ultimo_mese']=='Y') && ($records['tipologie_vaccinazioni_ultimo_mese']==null))) || (($records['effettuato_riscontro_diagnostico']==null) || (($records['effettuato_riscontro_diagnostico']=='Y') && ($records['riscontro_diagnostico_dove']==null))) || (($records['prelievi_secondo_prot_naz']==null) || (($records['prelievi_secondo_prot_naz']=='Y') && (($records['data_riscontro_diagnostico']==null) || ($records['medico_effettuato_riscontro']==null))))){
                
                $insert_data1 = array();
                $insert_data1["conclusa2"] = "N";
                $obj = new scheda_sids();
                $condition= array("dati_sids_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data1,$condition);
                $obj->error();
                
                $_SESSION['medici'] = "tabs_er";
            }
            else {
                
                $insert_data1 = array();
                $insert_data1["conclusa2"] = "Y";
                $obj = new scheda_sids();
                $condition= array("dati_sids_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data1,$condition);
                $obj->error();
                
                $_SESSION['medici'] = "tabs_ok";
            }
        }
    }   

    }
?>