<?php
    
    include_once("databases.php");
    include_once("esame_esterno_mf.php");
    include_once("esame_interno_mf.php");
    include_once("encefalo_mf.php");
    include_once("cavo_orale_mf.php");
    include_once("cavita_toracica_mf.php");
    include_once("apparato_cardiovascolare_mf.php");
    include_once("apparato_respiratorio_mf.php");
    include_once("cavita_addominale_mf.php");
    include_once("dati_protocollo_mf.php");

    function tab_autopsiaf() {
        //esame_esterno_mf
        $objp = new esame_esterno_mf();

	    $recordp = $objp->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));
        
        //dati_protocollo_mf
        $objr = new dati_protocollo_mf();

	    $recordr = $objr->fetchRecord(array("schede_id"=>$_SESSION['case_id']));
    
        if(($objp->fetchNumRows() == 0) && ($objr->fetchNumRows() == 0)){
            $_SESSION['esami_mf_esterno'] = "tabs";
        }
        else {
            if (($recordr['autopsia']==null) || ($recordr['num_autopsia']==null) || ($recordr['data_autopsia']==null) || ($recordr['medico_settore']==null) || (($recordp['documentazione_foto_video'] == null) || (($recordp['documentazione_foto_video'] == 'Y') && (($recordp['documentazione'] == null))))){
                
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new esame_esterno_mf();
                $condition= array("dati_protocollo_mf_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $insert_data1 = array();
                $insert_data1["conclusa1"] = "N";
                $obj = new dati_protocollo_mf();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data1,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_mf_esterno'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new esame_esterno_mf();
                $condition= array("dati_protocollo_mf_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $insert_data1 = array();
                $insert_data1["conclusa1"] = "Y";
                $obj = new dati_protocollo_mf();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data1,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_mf_esterno'] = "tabs_ok";
            }
        }
        
        
        //encefalo_mf
        $obja = new encefalo_mf();

	    $recorda = $obja->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));
        
        //esame_interno_mf
        $objaa = new esame_interno_mf();

	    $recordaa = $objaa->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));
       
        
        if(($obja->fetchNumRows() == 0)){
            $_SESSION['esami_mf_encefalo'] = "tabs";
        }
        else {
            if (($recorda['peso_gr']==null) || ($recorda['fontanella_anteriore']==null) || ($recorda['fontanella_posteriore']==null) || ($recorda['dura_madre']==null) || ($recorda['seno_venoso']==null) || ($recorda['emorragie']==null) || ($recorda['leptomeningi']==null) || ($recorda['solchi']==null) || ($recorda['taglio_emisferi']==null) || ($recorda['tronco_cerebrale']==null) || ($recorda['plessi_corioidei']==null) || ($recorda['setto_pellucido']==null) || ($recorda['corpo_calloso']==null) || ($recorda['ventricoli']==null) || ($recordaa['colonna_vertebrale']==null) || ($recordaa['diaframma']==null) || (($recordaa['sterno_gabbia_toracica'] == null) || (($recordaa['sterno_gabbia_toracica'] == 'malformati') && (($recordaa['specifica_sterno_gabbia_toracica_malformati'] == null))))){
                
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new encefalo_mf();
                $condition= array("dati_protocollo_mf_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $insert_data1 = array();
                $insert_data1["conclusa"] = "N";
                $obj = new esame_interno_mf();
                $condition= array("dati_protocollo_mf_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data1,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_mf_encefalo'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new encefalo_mf();
                $condition= array("dati_protocollo_mf_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $insert_data1 = array();
                $insert_data1["conclusa"] = "Y";
                $obj = new esame_interno_mf();
                $condition= array("dati_protocollo_mf_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data1,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_mf_encefalo'] = "tabs_ok";
            }
        }
        
         //cavo_orale_mf
        $objb = new cavo_orale_mf();

	    $recordb = $objb->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));
        
        if(($objb->fetchNumRows() == 0)){
            $_SESSION['esami_mf_capo'] = "tabs";
        }
        else {
            if ((($recordb['tiroide_stato'] == 'malformata') && (($recordb['specifica_tiroide_stato_malformata'] == null))) || (($recordb['laringe_stato'] == 'malformata') && (($recordb['specifica_laringe_stato_malformata'] == null)))){
                
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new cavo_orale_mf();
                $condition= array("dati_protocollo_mf_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_mf_capo'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new cavo_orale_mf();
                $condition= array("dati_protocollo_mf_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_mf_capo'] = "tabs_ok";
            }
        }
        
        
        //cavita_toracica_mf
        $objc = new cavita_toracica_mf();

	    $recordc = $objc->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));
        
        if(($objc->fetchNumRows() == 0)){
            $_SESSION['esami_mf_toracica'] = "tabs";
        }
        else {
            if (($recordc['stato_viscerale'] == null) || ($recordc['versamenti_cavi_pleurici'] == null) || ($recordc['pneumotorace'] == null) || (($recordc['asimmetria_viscerale'] == null) || (($recordc['asimmetria_viscerale'] == 'Y') && (($recordc['specifica_asimmetria_viscerale'] == null)))) || (($recordc['laringe_trachea_bronchi'] == null) || (($recordc['laringe_trachea_bronchi'] == 'malformati') && (($recordc['specifica_laringe_trachea_bronchi_malformata'] == null)))) || (($recordc['esofago'] == null) || (($recordc['esofago'] == 'malformazioni') && (($recordc['specifica_esofago_malformazioni'] == null))))){
                
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new cavita_toracica_mf();
                $condition= array("dati_protocollo_mf_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_mf_toracica'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new cavita_toracica_mf();
                $condition= array("dati_protocollo_mf_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_mf_toracica'] = "tabs_ok";
            }
        }
        
        
        //apparato_cardiovascolare_mf
        $objy = new apparato_cardiovascolare_mf();

	    $recordy = $objy->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));
        
        if($objy->fetchNumRows() == 0){
            $_SESSION['esami_mf_cardiovascolare'] = "tabs";
        }
        else {
            if (($recordy['versamenti'] == null) || ($recordy['cuore_forma'] == null) || ($recordy['cuore_consistenza'] == null) || ($recordy['cuore_peso_gr'] == null) || ($recordy['spessore_setto_interventricolare_mm'] == null) || ($recordy['vene_cave_tronchi_venosi'] == null)){
                
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new apparato_cardiovascolare_mf();
                $condition= array("dati_protocollo_mf_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_mf_cardiovascolare'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new apparato_cardiovascolare_mf();
                $condition= array("dati_protocollo_mf_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_mf_cardiovascolare'] = "tabs_ok";
            }
        }
        
        //apparato_respiratorio_mf
        $obje = new apparato_respiratorio_mf();

	    $recorde = $obje->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));
        
        if(($obje->fetchNumRows() == 0)){
            $_SESSION['esami_mf_respiratorio'] = "tabs";
        }
        else {
            if (($recorde['polmone_dx_peso_gr'] == null) || ($recorde['polmone_sx_peso_gr'] == null) || ($recorde['num_lobi_dx'] == null) || ($recorde['num_lobi_sx'] == null)){
                
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new apparato_respiratorio_mf();
                $condition= array("dati_protocollo_mf_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_mf_respiratorio'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new apparato_respiratorio_mf();
                $condition= array("dati_protocollo_mf_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_mf_respiratorio'] = "tabs_ok";
            }
        }
        
        //cavita_addominale_mf
        $objf = new cavita_addominale_mf();

	    $recordf = $objf->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));
        
        if(($objf->fetchNumRows() == 0)){
            $_SESSION['esami_mf_addominale'] = "tabs";
        }
        else {
            if (($recordf['stato_viscerale'] == null) || ($recordf['num_arterie_vena_ombelicale_normali'] == null) || ($recordf['arterie_vena_ombelicale_stato'] == null) || ($recordf['dotto_Aranzio'] == null) || (($recordf['vene_sovraepatiche_vena_cava_inf'] == null) || (($recordf['vene_sovraepatiche_vena_cava_inf'] == 'malformate') && (($recordf['specifica_vene_sovraepatiche_vena_cava_inf_malformate'] == null)))) || ($recordf['stomaco'] == null) || (($recordf['piccolo_grosso_intestino'] == null) || (($recordf['piccolo_grosso_intestino'] == 'malformazioni') && (($recordf['specifica_piccolo_grosso_intestino_malformazioni'] == null)))) || ($recordf['fegato_peso_gr'] == null) || ($recordf['fegato_volume'] == null) || (($recordf['fegato_isomerismo'] == null) || (($recordf['fegato_isomerismo'] == 'Y') && (($recordf['specifica_fegato_isomerismo'] == null)))) || ($recordf['fegato_consistenza'] == null) || ($recordf['fegato_superficie'] == null) || ($recordf['fegato_parenchima_al_taglio'] == null) || ($recordf['colecisti'] == null) || ($recordf['vie_biliarie_extraepatiche'] == null) || (($recordf['pancreas'] == null) || (($recordf['pancreas'] == 'malformato') && (($recordf['specifica_pancreas_malformato'] == null)))) || ($recordf['milza'] == null)){
                
                $insert_data = array();
                $insert_data["conclusa1"] = "N";
                $obj = new cavita_addominale_mf();
                $condition= array("dati_protocollo_mf_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_mf_addominale'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa1"] = "Y";
                $obj = new cavita_addominale_mf();
                $condition= array("dati_protocollo_mf_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_mf_addominale'] = "tabs_ok";
            }
        }
        
        //surreni-reni
        
        if($objf->fetchNumRows() == 0 ||$recordf['idreni'] == null){
            $_SESSION['esami_mf_reni'] = "tabs";
        }
        else {
            
            if ((($recordf['surreni'] == null) || (($recordf['surreni'] == 'malformati') && (($recordf['surreni'] == null)))) || ($recordf['surreni_emorragie'] == null) || ($recordf['surreni_ispessimenti'] == null) || ($recordf['rene_dx_peso_gr'] == null) || (($recordf['rene_dx_stato'] == null) || (($recordf['rene_dx_stato'] == 'Y') && (($recordf['specifica_rene_dx_malformazione'] == null)))) || ($recordf['rene_dx_ischemia_corticale_congestione_midollare'] == null) || ($recordf['rene_dx_microlisi_ascessualizzazioni'] == null) || ($recordf['rene_sx_peso_gr'] == null) || (($recordf['rene_sx_stato'] == null) || (($recordf['rene_sx_stato'] == 'Y') && (($recordf['specifica_rene_sx_malformazione'] == null)))) || ($recordf['rene_sx_ischemia_corticale_congestione_midollare'] == null) || ($recordf['rene_sx_microlisi_ascessualizzazioni'] == null) || (($recordf['ureteri'] == null) || (($recordf['ureteri'] == 'malformati') && (($recordf['specifica_ureteri_malformazioni'] == null)))) || (($recordf['vescica_urinaria'] == null) || (($recordf['vescica_urinaria'] == 'malformata') && (($recordf['specifica_vescica_urinaria_malformazione'] == null)))) || ($recordf['vescica_urinaria_contenuto'] == null) || ($recordf['uraco'] == null) || (($recordf['testicoli'] == null) && (($recordf['utero_tube_ovaie'] == null) || (($recordf['utero_tube_ovaie'] == 'malformazioni') && ($recordf['specifica_utero_tube_ovaie_malformazioni'] == null)))) || (($recordf['grandi_vasi'] == null) || (($recordf['grandi_vasi'] == 'malformati') && (($recordf['specifica_grandi_vasi_malformazione'] == null))))){
                
                $insert_data = array();
                $insert_data["conclusa2"] = "N";
                $obj = new cavita_addominale_mf();
                $condition= array("dati_protocollo_mf_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_mf_reni'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa2"] = "Y";
                $obj = new cavita_addominale_mf();
                $condition= array("dati_protocollo_mf_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['esami_mf_reni'] = "tabs_ok";
            }
        }
        
    }

?>