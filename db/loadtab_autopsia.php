<?php

    include_once("databases.php");
    include_once("esame_esterno_sids.php");
    include_once("encefalo_sids.php");
    include_once("cavo_orale_sids.php");
    include_once("cavita_toracica_sids.php");
    include_once("apparato_cardiovascolare_sids.php");
    include_once("apparato_respiratorio_sids.php");
    include_once("cavita_addominale_sids.php");
    include_once("dati_protocollo_sids.php");

    function tab_autopsia() {
        //esame_esterno_sids
        $objp = new esame_esterno_sids();

	    $recordp = $objp->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));
        
        //dati_protocollo_sids
        $objr = new dati_protocollo_sids();

	    $recordr = $objr->fetchRecord(array("schede_id"=>$_SESSION['case_id']));
        
        
        if(($objp->fetchNumRows() == 0) && ($objr->fetchNumRows() == 0)){
            $_SESSION['esami_sids_esterno'] = "tabs";
        }
        else {
            if (($recordr['autopsia']==null) || ($recordr['num_autopsia']==null) || ($recordr['data_autopsia']==null) || ($recordr['medico_settore']==null) || ($recordp['peso_gr']==null) || ($recordp['lunghezza_tot_cm']==null) || ($recordp['segni_tanatologici']==null) || ($recordp['presenza_sangue_naso']==null) || ($recordp['presenza_sangue_bocca']==null) || (($recordp['documentazione_foto_video'] == null) || (($recordp['documentazione_foto_video'] == 'Y') && (($recordp['documentazione'] == null)))) || (($recordp['presenza_urine_sangue_feci_orifizi'] == null) || (($recordp['presenza_urine_sangue_feci_orifizi'] == 'Y') && (($recordp['specifica_presenza_urine_sangue_feci_orifizi'] == null))))){
                
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new esame_esterno_sids();
                $condition= array("dati_protocollo_sids_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $insert_data1 = array();
                $insert_data1["conclusa1"] = "N";
                $obj = new dati_protocollo_sids();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data1,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_sids_esterno'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new esame_esterno_sids();
                $condition= array("dati_protocollo_sids_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $insert_data1 = array();
                $insert_data1["conclusa1"] = "Y";
                $obj = new dati_protocollo_sids();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data1,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_sids_esterno'] = "tabs_ok";
            }
        }
        
        
        //encefalo_sids
        $obja = new encefalo_sids();

	    $recorda = $obja->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));
        
        if(($obja->fetchNumRows() == 0)){
            $_SESSION['esami_sids_encefalo'] = "tabs";
        }
        else {
            if (($recorda['peso_gr'] == null) || (($recorda['malformazioni'] == null) || (($recorda['malformazioni'] == 'Y') && (($recorda['specifica_malformazioni'] == null)))) || ($recorda['taglio_emisferi'] == null) || ($recorda['tronco_cerebrale'] == null) || (($recorda['aspetto_esterno'] == null) || (($recorda['aspetto_esterno'] == 'poligono di willis') && (($recorda['specifica_poligono_Willis'] == null)))))
            {
                
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new encefalo_sids();
                $condition= array("dati_protocollo_sids_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_sids_encefalo'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new encefalo_sids();
                $condition= array("dati_protocollo_sids_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_sids_encefalo'] = "tabs_ok";
            }
        }
        
        
        //cavo_orale_sids
        $objb = new cavo_orale_sids();

	    $recordb = $objb->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));
        
        if(($objb->fetchNumRows() == 0)){
            
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new cavo_orale_sids();
                $condition= array("dati_protocollo_sids_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
            
            $_SESSION['esami_sids_capo'] = "tabs";
        }
        else {
            
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new cavo_orale_sids();
                $condition= array("dati_protocollo_sids_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
            
            $_SESSION['esami_sids_capo'] = "tabs_ok";
        }
        
        //cavita_toracica_sids
        $objc = new cavita_toracica_sids();

	    $recordc = $objc->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));
        
        if(($objc->fetchNumRows() == 0)){
            $_SESSION['esami_sids_toracica'] = "tabs";
        }
        else {
            if (($recordc['vie_aeree'] == null) || ($recordc['versamenti'] == null) || ($recordc['pneumotorace'] == null) || (($recordc['asimmetria_viscerale'] == null) || (($recordc['asimmetria_viscerale'] == 'Y') && ($recordc['specifica_asimmetria_viscerale'] == null)))) {
                
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new cavita_toracica_sids();
                $condition= array("dati_protocollo_sids_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_sids_toracica'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new cavita_toracica_sids();
                $condition= array("dati_protocollo_sids_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_sids_toracica'] = "tabs_ok";
            }
        }
        
        //apparato_cardiovascolare_sids
        $objy = new apparato_cardiovascolare_sids();

	    $recordy = $objy->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));
        
        if(($objy->fetchNumRows() == 0)){
            $_SESSION['esami_sids_cardiovascolare'] = "tabs";
        }
        else {
            if (($recordy['versamenti'] == null) || ($recordy['cuore_forma'] == null) || ($recordy['cuore_consistenza'] == null) || ($recordy['cuore_peso_gr'] == null) || ($recordy['spessore_setto_interventricolare_mm'] == null) || ($recordy['vene_cave_tronchi_venosi'] == null)){
                
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new apparato_cardiovascolare_sids();
                $condition= array("dati_protocollo_sids_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_sids_cardiovascolare'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new apparato_cardiovascolare_sids();
                $condition= array("dati_protocollo_sids_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_sids_cardiovascolare'] = "tabs_ok";
            }
        }
        
        //apparato_respiratorio_sids
        $obje = new apparato_respiratorio_sids();

	    $recorde = $obje->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));
        
        if(($obje->fetchNumRows() == 0)){
            $_SESSION['esami_sids_respiratorio'] = "tabs";
        }
        else {
            if (($recorde['polmone_dx_peso_gr'] == null) || ($recorde['polmone_sx_peso_gr'] == null) || ($recorde['num_lobi_dx'] == null) || ($recorde['num_lobi_sx'] == null)){
                
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new apparato_respiratorio_sids();
                $condition= array("dati_protocollo_sids_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_sids_respiratorio'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new apparato_respiratorio_sids();
                $condition= array("dati_protocollo_sids_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_sids_respiratorio'] = "tabs_ok";
            }
        }
        
        //cavita_addominale_sids
        $objf = new cavita_addominale_sids();

	    $recordf = $objf->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));
        
        if(($objf->fetchNumRows() == 0)){
            $_SESSION['esami_sids_addominale'] = "tabs";
        }
        else {
            if (($recordf['eterotassia_viscerale'] == null) || ($recordf['tratto_gastroenterico_emorragie'] == null) || ($recordf['surreni_peso_gr'] == null) || ($recordf['surreni_emorragie'] == null) || ($recordf['surreni_ispessimenti'] == null) || ($recordf['reni_peso_gr'] == null) || ($recordf['reni_malformazioni'] == null) || ($recordf['ischemia_corticale_congestione_midollare'] == null) || ($recordf['microlitiasi_ascessualizzazioni'] == null) || ($recordf['milza_peso_gr'] == null) || ($recordf['tipo'] == null) || ($recordf['fegato_peso_gr'] == null) || ($recordf['fegato_colore'] == null) || ($recordf['pancreas_peso_gr'] == null) || ($recordf['pancreas_colore'] == null) || (($recordf['tratto_gastroenterico_malformazioni'] == null) || (($recordf['tratto_gastroenterico_malformazioni'] == 'Y') && ($recordf['specifica_tratto_gastroenterico_malformazioni'] == null)))){
                
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new cavita_addominale_sids();
                $condition= array("dati_protocollo_sids_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_sids_addominale'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new cavita_addominale_sids();
                $condition= array("dati_protocollo_sids_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_sids_addominale'] = "tabs_ok";
            }
        }
        
        //note
        if($objr->fetchNumRows() == 0 || $recordr['idnote'] == null){
        // MM if($recordr['idnote'] == null){
            $_SESSION['esami_sids_note'] = "tabs";
        }
        else {
            if (($recordr['principali_referti_patologici']==null) || ($recordr['diagnosi_anatomo_patologica']==null) || ($recordr['caso_di_sids']==null)){ 
                
                $insert_data1 = array();
                $insert_data1["conclusa2"] = "N";
                $obj = new dati_protocollo_sids();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data1,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_sids_note'] = "tabs_er";
            }
            else {
                
                $insert_data1 = array();
                $insert_data1["conclusa2"] = "Y";
                $obj = new dati_protocollo_sids();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data1,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_sids_note'] = "tabs_ok";
            }
        }
    }

?>