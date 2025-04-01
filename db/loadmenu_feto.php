<?php
    //comuni
    include_once("databases.php");
    include_once("dati_pers.php");
    include_once("parti_prec.php");
    include_once("fumo_attivo.php");
    include_once("fumo_passivo.php");
    include_once("madre.php");
    include_once("patologie_gest.php");
    include_once("fratelli.php");
    include_once("padre.php");
    include_once("consenso.php");
    include_once("log_activities.php");


    //schede morte fetale
    include_once("dati_feto.php");
    include_once("scheda_feto.php");
    include_once("info_morte_fetale.php");
    include_once("esame_esterno_mf.php");
    include_once("encefalo_mf.php");
    include_once("esame_interno_mf.php");
    include_once("cavo_orale_mf.php");
    include_once("cavita_toracica_mf.php");
    include_once("apparato_cardiovascolare_mf.php");
    include_once("apparato_respiratorio_mf.php");
    include_once("cavita_addominale_mf.php");
    include_once("dati_protocollo_mf.php");
    include_once("prelievi_mf.php");
    include_once("referto_macroscopico_annessi_fetali.php");

    function loadmenu_feto() {

    //dati personali madre
    $objd = new dati_pers();

    $recordd = $objd->fetchRecord(array("schede_id"=>$_SESSION['case_id'],'tipo' => 'MADRE'));

    //parti_prec
    $obje = new parti_prec();

    $recorde = $obje->fetchRecord(array("madre_schede_id"=>$_SESSION['case_id']));

    //fumo_attivo
    $objf = new fumo_attivo();

    $recordf = $objf->fetchRecord(array("madre_schede_id"=>$_SESSION['case_id']));

    //fumo_passivo
    $objg = new fumo_passivo();

    $recordg = $objg->fetchRecord(array("madre_schede_id"=>$_SESSION['case_id']));

    //madre alcol farmaci
    $objh = new madre();

    $recordh = $objh->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

    //patologie_gest
    $obji = new patologie_gest();

    $recordi = $obji->fetchRecord(array("madre_schede_id"=>$_SESSION['case_id']));
    
    //fratelli
    $objj = new fratelli();

    $recordj = $objj->fetchRecord(array("patologie_gest_madre_schede_id"=>$_SESSION['case_id']));

    //dati personali
    $objk = new dati_pers();

    $recordk = $objk->fetchRecord(array("schede_id"=>$_SESSION['case_id'],'tipo' => 'PADRE'));

    //padre fumo alcol farmaci
    $objl = new padre();

    $recordl = $objl->fetchRecord(array("schede_id"=>$_SESSION['case_id']));
        
    //consenso
    $objco = new consenso();
        
    $recordco = $objco->fetchRecord(array("id_scheda"=>$_SESSION['case_id']));


    
    //SCHEDE MORTE FETALE
    //dati_feto
    $objaf = new dati_feto();
    $recordaf= $objaf->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

    //scheda_feto
    $objbf = new scheda_feto();
    $recordbf= $objbf->fetchRecord(array("dati_feto_schede_id"=>$_SESSION['case_id']));

    //info_morte_fetale
    $objcf = new info_morte_fetale();

    $recordcf = $objcf->fetchRecord(array("madre_schede_id"=>$_SESSION['case_id']));
    
    //esame_esterno_mf
    $objmf = new esame_esterno_mf();

    $recordmf = $objmf->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));

    //esame_interno_mf
    $objnnf = new esame_interno_mf();

    $recordnnf = $objnnf->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));
    
    //encefalo_mf
    $objnf = new encefalo_mf();

    $recordnf = $objnf->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));

    //cavo_orale_mf
    $objof = new cavo_orale_mf();

    $recordof = $objof->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));

    //cavita_toracica_mf
    $objqf = new cavita_toracica_mf();

    $recordqf = $objqf->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));

    //apparato_cardiovascolare_mf
    $objrf = new apparato_cardiovascolare_mf();

    $recordrf = $objrf->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));

    //apparato_respiratorio_mf
    $objsf = new apparato_respiratorio_mf();

    $recordsf = $objsf->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));

    //cavita_addominale_mf
    $objtf = new cavita_addominale_mf();

    $recordtf = $objtf->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));

    //dati_protocollo_mf
    $objuf = new dati_protocollo_mf();

    $recorduf = $objuf->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

    //prelievi_mf
    $objvf = new prelievi_mf();

    $recordvf = $objvf->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));

    //referto_macroscopico_annessi_fetali
    $objzf = new referto_macroscopico_annessi_fetali();

    $recordzf = $objzf->fetchRecord(array("schede_id"=>$_SESSION['case_id']));
        
    //menu feto
    if (($objaf->fetchNumRows() == 0) || ($objbf->fetchNumRows() == 0) || ($recordaf['conclusa']=='N') || ($recordbf['conclusa']=='N') || ($recordaf['conclusa']==null) || ($recordbf['conclusa']==null)){
        $_SESSION['menu_feto_feto'] = 'menu_bt_err';
    }
    else {
        $_SESSION['menu_feto_feto'] = 'menu';
    }
        
    //menu madre feto
    if (($objd->fetchNumRows() == 0) || ($objd->fetchNumRows() == 0) || ($objf->fetchNumRows() == 0) || ($objg->fetchNumRows() == 0) || ($objh->fetchNumRows() == 0) || ($obji->fetchNumRows() == 0) || ($objcf->fetchNumRows() == 0) || ($objj->fetchNumRows() == 0) ||($recordd['conclusa']=='N') || ($recorde['conclusa']=='N') || ($recordf['conclusa']=='N') || ($recordg['conclusa']=='N') || ($recordh['conclusa1']=='N') || ($recordh['conclusa2']=='N') || ($recordi['conclusa']=='N') || ($recordj['conclusa']=='N') || ($recordcf['conclusa1']=='N') || ($recordd['conclusa']==null) || ($recorde['conclusa']==null) || ($recordf['conclusa']==null) || ($recordg['conclusa']==null) || ($recordh['conclusa1']==null) || ($recordh['conclusa2']==null) || ($recordi['conclusa']==null) ||  ($recordcf['conclusa1']==null) || ($recordj['conclusa']==null)) {
        $_SESSION['menu_madre_feto'] = 'menu_bt_err';
    }
    else {
        $_SESSION['menu_madre_feto'] = 'menu';
        
    }
    
    //menu esami madre
    if (($objcf->fetchNumRows() == 0) || ($recordcf['conclusa2']=='N') || ($recordcf['conclusa3']=='N') || ($recordcf['conclusa4']=='N') || ($recordcf['conclusa2']==null) || ($recordcf['conclusa3']==null) || ($recordcf['conclusa4']==null)) {
        $_SESSION['menu_esami_feto'] = 'menu_bt_err';
    }
    else {
        $_SESSION['menu_esami_feto'] = 'menu';
        
    }    
    
    //menu padre feto
    if (($objk->fetchNumRows() == 0) || ($objl->fetchNumRows() == 0) || ($recordk['conclusa']=='N') || ($recordl['conclusa1']=='N') || ($recordl['conclusa2']=='N') || ($recordl['conclusa3']=='N') || ($recordk['conclusa']==null) || ($recordl['conclusa1']==null) || ($recordl['conclusa2']==null) || ($recordl['conclusa3']==null))     {
        $_SESSION['menu_padre_feto'] = 'menu_bt_err';
    }
    else {
        $_SESSION['menu_padre_feto'] = 'menu';
        
    }
        
    //menu consenso feto
    if (($objco->fetchNumRows() == 0) || ($recordco['conclusa']=='N') || ($recordco['conclusa']==null))     {
        $_SESSION['menu_consenso_feto'] = 'menu_bt_err';
    }
    else {
        $_SESSION['menu_consenso_feto'] = 'menu';
        
    }
        
    //menu autopsia feto
    if (($objmf->fetchNumRows() == 0) || ($objnf->fetchNumRows() == 0) || ($objnnf->fetchNumRows() == 0) || ($objof->fetchNumRows() == 0) || ($objqf->fetchNumRows() == 0) || ($objrf->fetchNumRows() == 0) || ($objsf->fetchNumRows() == 0) || ($objtf->fetchNumRows() == 0) || ($objuf->fetchNumRows() == 0) || ($recordmf['conclusa']=='N') || ($recordnf['conclusa']=='N') || ($recordnnf['conclusa']=='N') || ($recordof['conclusa']=='N') || ($recordqf['conclusa']=='N') || ($recordrf['conclusa']=='N') || ($recordsf['conclusa']=='N') || ($recordtf['conclusa1']=='N') || ($recordtf['conclusa2']=='N') || ($recorduf['conclusa1']=='N') || ($recordmf['conclusa']==null) || ($recordnf['conclusa']==null) || ($recordnnf['conclusa']==null) || ($recordof['conclusa']==null) || ($recordqf['conclusa']==null) || ($recordrf['conclusa']==null) || ($recordsf['conclusa']==null) || ($recordtf['conclusa1']==null) || ($recordtf['conclusa2']==null) || ($recorduf['conclusa1']==null))     {
        $_SESSION['menu_autopsia_feto'] = 'menu_bt_err';
    }
    else {
        $_SESSION['menu_autopsia_feto'] = 'menu';
        
    }
        
    //annessi fetali feto
    if (($objuf->fetchNumRows() == 0) || ($objzf->fetchNumRows() == 0) || ($recorduf['conclusa2']=='N') || ($recordzf['conclusa1']=='N') || ($recordzf['conclusa2']=='N') || ($recordzf['conclusa3']=='N') || ($recorduf['conclusa2']==null) || ($recordzf['conclusa1']==null) || ($recordzf['conclusa2']==null) || ($recordzf['conclusa3']==null))     {
        $_SESSION['menu_annessi_feto'] = 'menu_bt_err';
    }
    else {
        $_SESSION['menu_annessi_feto'] = 'menu';
        
    }
        
    //menu prelievi feto
    if (($objvf->fetchNumRows() == 0) || ($recordvf['conclusa']=='N') || ($recordvf['conclusa']==null))     {
        $_SESSION['menu_prelievi_feto'] = 'menu_bt_err';
    }
    else {
        $_SESSION['menu_prelievi_feto'] = 'menu';
        
    }
        

    }

?>