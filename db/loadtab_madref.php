<?php

    include_once("databases.php");
    include_once("dati_pers.php");
    include_once("parti_prec.php");
    include_once("fumo_attivo.php");
    include_once("fumo_passivo.php");
    include_once("madre.php");
    include_once("patologie_gest.php");
    include_once("info_morte_fetale.php");
    include_once("fratelli.php");


    function tab_madref() {
        
        //dati personali
        $objp = new dati_pers();

	    $recordp = $objp->fetchRecord(array("schede_id"=>$_SESSION['case_id'],'tipo' => 'MADRE'));
        
    
        if($objp->fetchNumRows() == 0){
            $_SESSION['perso_madreF'] = "tabs";
        }
        else {
            if (($recordp['cognome'] == null) || ($recordp['nome'] == null) || ($recordp['comune'] == null) || ($recordp['provincia'] == null) || ($recordp['data_nascita'] == null) || ($recordp['luogo_nascita'] == null) || ($recordp['eta'] == null) || ($recordp['professione'] == null) || (($recordp['etnia'] == null) || (($recordp['etnia'] == 'altra') && ($recordp['specifica_etnia'] == null))))
            {
             
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new dati_pers();
                $condition= array("schede_id" => $_SESSION['case_id'],'tipo' => 'MADRE');
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['perso_madreF'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new dati_pers();
                $condition= array("schede_id" => $_SESSION['case_id'],'tipo' => 'MADRE');
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['perso_madreF'] = "tabs_ok";
            }
        }
        
        
        //parti_prec
        $obja = new parti_prec();

	    $recorda = $obja->fetchRecord(array("madre_schede_id"=>$_SESSION['case_id']));
        
        if($obja->fetchNumRows() == 0){
            
            $_SESSION['part_precF'] = "tabs";
        }
        else {
            if (($recorda['aborti_precedenti'] == null) || (($recorda['aborti_precedenti'] == '1') && (($recorda['tipo1'] == null) || ($recorda['settimana1'] == null))) || (($recorda['aborti_precedenti'] == '2') && (($recorda['tipo1'] == null) || ($recorda['settimana1'] == null) || ($recorda['tipo2'] == null) || ($recorda['settimana2'] == null))) || (($recorda['aborti_precedenti'] == '3') && (($recorda['tipo1'] == null) || ($recorda['settimana1'] == null) || ($recorda['tipo2'] == null) || ($recorda['settimana2'] == null) || ($recorda['tipo3'] == null) || ($recorda['settimana3'] == null))) || (($recorda['aborti_precedenti'] == '4') && (($recorda['tipo1'] == null) || ($recorda['settimana1'] == null) || ($recorda['tipo2'] == null) || ($recorda['settimana2'] == null) || ($recorda['tipo3'] == null) || ($recorda['settimana3'] == null) || ($recorda['tipo4'] == null) || ($recorda['settimana4'] == null))) || (($recorda['aborti_precedenti'] == '5') && (($recorda['tipo1'] == null) || ($recorda['settimana1'] == null) || ($recorda['tipo2'] == null) || ($recorda['settimana2'] == null) || ($recorda['tipo3'] == null) || ($recorda['settimana3'] == null) || ($recorda['tipo4'] == null) || ($recorda['settimana4'] == null) || ($recorda['tipo5'] == null) || ($recorda['settimana5'] == null)))){
                
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new parti_prec();
                $condition= array("madre_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['part_precF'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new parti_prec();
                $condition= array("madre_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['part_precF'] = "tabs_ok";
            }
        }
        
        //fumo_attivo
        $objb = new fumo_attivo();

	    $recordb = $objb->fetchRecord(array("madre_schede_id"=>$_SESSION['case_id']));
        
        if($objb->fetchNumRows() == 0){
            $_SESSION['fumo_attF'] = "tabs";
        }
        else {
            if ((($recordb['prima_del_concepimento'] == null) || (($recordb['prima_del_concepimento'] == 'Y') && (($recordb['da_anni'] == null) || ($recordb['num_sigarette_per_giornoA'] == null)))) || (($recordb['durante_gravidanza'] == null) || (($recordb['durante_gravidanza'] == 'Y') && (($recordb['fino_a_settimana'] == null) || ($recordb['num_sigarette_per_giornoB'] == null)))) || (($recordb['post_parto'] == 'Y') && (($recordb['fino_a_eta_bambini_in_giorni'] == null) || ($recordb['num_sigarette_per_giornoC'] == null))) || (($recordb['sigaretta_elettronica'] == 'Y') && ($recordb['spec_sigaretta_elettronica'] == null))){
                
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new fumo_attivo();
                $condition= array("madre_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['fumo_attF'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new fumo_attivo();
                $condition= array("madre_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['fumo_attF'] = "tabs_ok";
            }
        }
        
        //fumo_passivo
        $objc = new fumo_passivo();

	    $recordc = $objc->fetchRecord(array("madre_schede_id"=>$_SESSION['case_id']));
        
        if($objc->fetchNumRows() == 0){
            $_SESSION['fumo_passF'] = "tabs";
        }
        else {
            if ((($recordc['prima_del_concepimento'] == null) || (($recordc['prima_del_concepimento'] == 'Y') && (($recordc['da_anni'] == null) || ($recordc['luogoA'] == null)))) || (($recordc['durante_gravidanza'] == null) || (($recordc['durante_gravidanza'] == 'Y') && (($recordc['fino_a_settimana'] == null) || ($recordc['luogoB'] == null)))) || (($recordc['post_parto'] == 'Y') && (($recordc['fino_a_eta_bambino_in_giorni'] == null) || ($recordc['luogoC'] == null)))){
                
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new fumo_passivo();
                $condition= array("madre_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['fumo_passF'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new fumo_passivo();
                $condition= array("madre_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['fumo_passF'] = "tabs_ok";
            }
        }
         
        //madre alcol
        $objy = new madre();

	    $recordy = $objy->fetchRecord(array("schede_id"=>$_SESSION['case_id']));
        
        if($objy->fetchNumRows() == 0 || $recordy['idalcol'] == null){
            $_SESSION['alcol_mF'] = "tabs";
        }
        else {
            if (($recordy['alcool'] == null) || (($recordy['alcool'] == 'Y') && ($recordy['alcool_quali_quantita'] == null)) || ($recordy['stupefacenti'] == null) || (($recordy['stupefacenti'] == 'Y') && ($recordy['stupefacenti_quali_quantita'] == null))){
                
                $insert_data = array();
                $insert_data["conclusa1"] = "N";
                $obj = new madre();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['alcol_mF'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa1"] = "Y";
                $obj = new madre();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['alcol_mF'] = "tabs_ok";
            }
        }
        
        
        //madre farmaci
        if($objy->fetchNumRows() == 0 ||  $recordy['idfarmaci'] == null){
            $_SESSION['farma_mF'] = "tabs";
        }
        else {
            
            if (($recordy['farmaci'] == null) || (($recordy['farmaci'] == 'Y') && ($recordy['farmaci_quali_quantita'] == null)) || ($recordy['HIV_positivo'] == null)){
                
                $insert_data = array();
                $insert_data["conclusa2"] = "N";
                $obj = new madre();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['farma_mF'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa2"] = "Y";
                $obj = new madre();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['farma_mF'] = "tabs_ok";
            }
        }
        
        
        //patologie_gest
        $objg = new patologie_gest();

	    $recordg = $objg->fetchRecord(array("madre_schede_id"=>$_SESSION['case_id']));
        
        if($objg->fetchNumRows() == 0){
            $_SESSION['pato_mF'] = "tabs";
        }
        else {
            if ((($recordg['presenza_ipertensione'] == null ) || (($recordg['presenza_ipertensione'] == 'Y') && ($recordg['periodo_ipertensione'] == null))) || (($recordg['presenza_diabete'] == null ) || (($recordg['presenza_diabete'] == 'Y') && ($recordg['periodo_diabete']== null))) || ($recordg['presenza_alterazione_coagulazione'] == null) || ($recordg['presenza_malattie_autoimmuni'] == null) || (($recordg['presenza_infezioni_materne'] == null ) || (($recordg['presenza_infezioni_materne'] == 'Y') && (($recordg['tipologie_infezioni_materne_preconcezionale'] == null) && ($recordg['specifica_tipologie_infezioni_materne_preconcezionale'] == null) && ($recordg['tipologie_infezioni_materne_peri_postconcezionale'] == null) && ($recordg['specifica_tipologie_infezioni_materne_peri_postconcezionale'] == null)))) || (($recordg['altre_patologie'] == null ) || (($recordg['altre_patologie'] == 'Y') && (($recordg['tipo_altre_patologie']  == null) && ($recordg['specifica_altre_patologie']  == null)))) || (($recordg['presenza_alterazione_emoglobina']  == null) || (($recordg['presenza_alterazione_emoglobina']  == 'Y') && (($recordg['tipologie_alterazione_emoglobina']  == null) || (($recordg['tipologie_alterazione_emoglobina']  == 'altro') && ($recordg['specifica_tipologie_alterazione_emoglobina']  == null)))))){
                
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new patologie_gest();
                $condition= array("madre_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['pato_mF'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new patologie_gest();
                $condition= array("madre_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['pato_mF'] = "tabs_ok";
            }
        }
        
        //info_morte_fetale
        $objh = new info_morte_fetale();

	    $recordh = $objh->fetchRecord(array("madre_schede_id"=>$_SESSION['case_id']));
        
     if ($objh->fetchNumRows() == 0) {
    $_SESSION['mestruoF'] = "tabs";
}
else {  
    if (
        ($recordh['data_ultima_mestruazione'] == null) || 
        ($recordh['data_presunta_parto_anamnestico'] == null) || 
        ($recordh['data_presunta_parto_ecografico'] == null) || 
        ($recordh['num_visite_controllo_in_gravidanza'] == null) ||
        ($recordh['tentativiFecondazione'] == null) ||
        ($recordh['dataCaso1'] == null) ||
        ($recordh['dataCaso2'] == null) ||
        ($recordh['dataCaso3'] == null) ||
        ($recordh['dataCaso4'] == null) ||
        ($recordh['dataCaso5'] == null) ||
        ($recordh['descriviCaso1'] == null) ||
        ($recordh['descriviCaso2'] == null) ||
        ($recordh['descriviCaso3'] == null) ||
        ($recordh['descriviCaso4'] == null) ||
        ($recordh['descriviCaso5'] == null) ||
        ($recordh['ginecologo_curante'] == null) ||
        ($recordh['ostetrica'] == null) ||
        ($recordh['fecondazione'] == null) ||
        ($recordh['struttura'] == null) ||
        ($recordh['eterologa'] == null) ||
        ($recordh['specifica_altre'] == null)
    ) {
        $insert_data = array();
        $insert_data["conclusa1"] = "N";
        $obj = new info_morte_fetale();
        $condition= array("madre_schede_id" => $_SESSION['case_id']);
        $obj->update($insert_data,$condition);
        $obj->error();
        
        $_SESSION['mestruoF'] = "tabs_er";
    }
    else {
        $insert_data = array();
        $insert_data["conclusa1"] = "Y";
        $obj = new info_morte_fetale();
        $condition= array("madre_schede_id" => $_SESSION['case_id']);
        $obj->update($insert_data,$condition);
        $obj->error();
        
        $_SESSION['mestruoF'] = "tabs_ok";
    }
}


        
        //fratelli
        $objf = new fratelli();

	    $recordf = $objf->fetchRecord(array("patologie_gest_madre_schede_id"=>$_SESSION['case_id']));
        
        if($objf->fetchNumRows() == 0){
            $_SESSION['frat_mF'] = "tabs";
        }
        else {
            //rimuovo 
           if (
   ($recordf['fratelli_sorelle'] == null) ||
(
    ($recordf['fratelli_sorelle'] == '1') &&
    (
        ($recordf['dataN1'] == null) || ($recordf['vivo1'] == null) || ($recordf['mesiM1'] == null) || ($recordf['causaM1'] == null)
    )
) ||
(
    ($recordf['fratelli_sorelle'] == '2') &&
    (
        ($recordf['dataN1'] == null) || ($recordf['vivo1'] == null) || ($recordf['mesiM1'] == null) || ($recordf['causaM1'] == null) ||
        ($recordf['dataN2'] == null) || ($recordf['vivo2'] == null) || ($recordf['mesiM2'] == null) || ($recordf['causaM2'] == null)
    )
) ||
(
    ($recordf['fratelli_sorelle'] == '3') &&
    (
        ($recordf['dataN1'] == null) || ($recordf['vivo1'] == null) || ($recordf['mesiM1'] == null) || ($recordf['causaM1'] == null) ||
        ($recordf['dataN2'] == null) || ($recordf['vivo2'] == null) || ($recordf['mesiM2'] == null) || ($recordf['causaM2'] == null) ||
        ($recordf['dataN3'] == null) || ($recordf['vivo3'] == null) || ($recordf['mesiM3'] == null) || ($recordf['causaM3'] == null)
    )
) ||
(
    ($recordf['fratelli_sorelle'] == '4') &&
    (
        ($recordf['dataN1'] == null) || ($recordf['vivo1'] == null) || ($recordf['mesiM1'] == null) || ($recordf['causaM1'] == null) ||
        ($recordf['dataN2'] == null) || ($recordf['vivo2'] == null) || ($recordf['mesiM2'] == null) || ($recordf['causaM2'] == null) ||
        ($recordf['dataN3'] == null) || ($recordf['vivo3'] == null) || ($recordf['mesiM3'] == null) || ($recordf['causaM3'] == null) ||
        ($recordf['dataN4'] == null) || ($recordf['vivo4'] == null) || ($recordf['mesiM4'] == null) || ($recordf['causaM4'] == null)
    )
) ||
(
    ($recordf['fratelli_sorelle'] == '5') &&
    (
        ($recordf['dataN1'] == null) || ($recordf['vivo1'] == null) || ($recordf['mesiM1'] == null) || ($recordf['causaM1'] == null) ||
        ($recordf['dataN2'] == null) || ($recordf['vivo2'] == null) || ($recordf['mesiM2'] == null) || ($recordf['causaM2'] == null) ||
        ($recordf['dataN3'] == null) || ($recordf['vivo3'] == null) || ($recordf['mesiM3'] == null) || ($recordf['causaM3'] == null) ||
        ($recordf['dataN4'] == null) || ($recordf['vivo4'] == null) || ($recordf['mesiM4'] == null) || ($recordf['causaM4'] == null) ||
        ($recordf['dataN5'] == null) || ($recordf['vivo5'] == null) || ($recordf['mesiM5'] == null) || ($recordf['causaM5'] == null)
    )
)
           )

    


    
 {
    $insert_data = array();
    $insert_data["conclusa"] = "N";

    $obj = new fratelli();
    $condition = array("patologie_gest_madre_schede_id" => $_SESSION['case_id']);
    $obj->update($insert_data, $condition);
    
    // var_dump($insert_data);
    $obj->error();

    $_SESSION['frat_mF'] = "tabs_er";
}

            else {
                
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new fratelli();
                $condition= array("patologie_gest_madre_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['frat_mF'] = "tabs_ok";
            }
        }
    }

?>
        
        