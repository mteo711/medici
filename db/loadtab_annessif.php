<?php

    include_once("databases.php");
    include_once("referto_macroscopico_annessi_fetali.php");
    include_once("dati_protocollo_mf.php");

    function tab_annessif() {
        
        //referto_macroscopico_annessi_fetali
        $objp = new referto_macroscopico_annessi_fetali();

	    $recordp = $objp->fetchRecord(array("schede_id"=>$_SESSION['case_id']));
        
        if(($objp->fetchNumRows() == 0)){
            $_SESSION['ref_placenta'] = "tabs";
        }
        else {
            if (($recordp['placenta'] == null) || ($recordp['placenta_pervenuta'] == null) || ($recordp['placenta_membrane_punto_rottura'] == null) || ($recordp['placenta_distanza_margine_disco_coriale_cm'] == null) || ($recordp['placenta_inserzione'] == null) || ($recordp['placenta_caratteristiche'] == null)){
                
                $insert_data = array();
                $insert_data["conclusa1"] = "N";
                $obj = new referto_macroscopico_annessi_fetali();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['ref_placenta'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa1"] = "Y";
                $obj = new referto_macroscopico_annessi_fetali();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['ref_placenta'] = "tabs_ok";
            }
        }
        
        //cordone
        if($objp->fetchNumRows() == 0 || $recordp['idcordone'] == null){
            $_SESSION['ref_cordone'] = "tabs";
        }
        else {
            if (($recordp['cordone_ombelicale_lunghezza_cm'] == null) || ($recordp['cordone_ombelicale_diametro_max_cm'] == null) || ($recordp['cordone_ombelicale_diametro_min_cm'] == null) || ($recordp['cordone_ombelicale_inserzione'] == null) || ($recordp['cordone_ombelicale_dist_margine_materno_fetale_cm'] == null) || ($recordp['cordone_ombelicale_altro'] == null)){
                
                $insert_data = array();
                $insert_data["conclusa2"] = "N";
                $obj = new referto_macroscopico_annessi_fetali();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['ref_cordone'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa2"] = "Y";
                $obj = new referto_macroscopico_annessi_fetali();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['ref_cordone'] = "tabs_ok";
            }
        }
        
        //disco 
        if($objp->fetchNumRows() == 0 || $recordp['iddisco'] == null){
            $_SESSION['ref_disco'] = "tabs";
        }
        else {
            if (($recordp['disco_coriale_peso_gr'] == null) || ($recordp['disco_coriale_diametro1_cm'] == null) || ($recordp['disco_coriale_diametro2_cm'] == null) || ($recordp['disco_coriale_spessore_max_cm'] == null) || ($recordp['disco_coriale_spessore_min_cm'] == null) || ($recordp['disco_coriale_forma'] == null) || ($recordp['versante_fetale'] == null) || ($recordp['versante_materno'] == null) || ($recordp['vasi_coriali_distribuzione'] == null) || (($recordp['ematomi_retroplacentari'] == null) || (($recordp['ematomi_retroplacentari'] == 'Y') && (($recordp['ematomi_retroplacentari_diametro_max_cm'] == null)))) || (($recordp['ematomi_marginali'] == null) || (($recordp['ematomi_marginali'] == 'Y') && (($recordp['ematomi_marginali_diametro_max_cm'] == null)))) || (($recordp['ematomi_intervillosi'] == null) || (($recordp['ematomi_intervillosi'] == 'Y') && (($recordp['ematomi_intervillosi_diametro_max_cm'] == null)))) || (($recordp['infarti_recenti'] == null) || (($recordp['infarti_recenti'] == 'Y') && (($recordp['infarti_recenti_diametro_max_cm'] == null)))) || (($recordp['infarti_vecchia_data'] == null) || (($recordp['infarti_vecchia_data'] == 'Y') && (($recordp['infarti_vecchia_diametro_max_cm'] == null))))){
                
                $insert_data = array();
                $insert_data["conclusa3"] = "N";
                $obj = new referto_macroscopico_annessi_fetali();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['ref_disco'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa3"] = "Y";
                $obj = new referto_macroscopico_annessi_fetali();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['ref_disco'] = "tabs_ok";
            }
        }
        
        //dati_protocollo_mf
        $objr = new dati_protocollo_mf();

	    $recordr = $objr->fetchRecord(array("schede_id"=>$_SESSION['case_id']));
        
        if($objr->fetchNumRows() == 0 || $recordr['idnote'] == null){
            $_SESSION['ref_mf_note'] = "tabs";
        }
        else {
            
            if (($recordr['principali_referti_patologici'] == null) || ($recordr['diagnosi_anatomo_patologica'] == null)){
                
                $insert_data1 = array();
                $insert_data1["conclusa2"] = "N";
                $obj = new dati_protocollo_mf();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data1,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['ref_mf_note'] = "tabs_er";
            }
            else {
                
                $insert_data1 = array();
                $insert_data1["conclusa2"] = "Y";
                $obj = new dati_protocollo_mf();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data1,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['ref_mf_note'] = "tabs_ok";
            }
        }
    }

?>