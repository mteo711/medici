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


    //schede sids
    include_once("dati_sids.php");
    include_once("allattamento.php");
    include_once("scheda_sids.php");
    include_once("ritrovamento.php");
    include_once("esame_esterno_sids.php");
    include_once("encefalo_sids.php");
    include_once("cavo_orale_sids.php");
    include_once("cavita_toracica_sids.php");
    include_once("apparato_cardiovascolare_sids.php");
    include_once("apparato_respiratorio_sids.php");
    include_once("cavita_addominale_sids.php");
    include_once("dati_protocollo_sids.php");
    include_once("prelievi_sids.php");

    function loadmenu_sids() {

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


    
    //SCHEDE SIDS
    //dati_sids
    $objp = new dati_sids();
    $recordp = $objp->fetchRecord(array("schede_id"=>$_SESSION['case_id']));
    
    //allattamento
    $obja = new allattamento();
    $recorda= $obja->fetchRecord(array("scheda_sids_schede_id"=>$_SESSION['case_id']));

    //scheda_sids
    $objb = new scheda_sids();
    $recordb= $objb->fetchRecord(array("dati_sids_schede_id"=>$_SESSION['case_id']));

    //ritrovamento
    $objc = new ritrovamento();

    $recordc = $objc->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

    //esame_esterno_sids
    $objm = new esame_esterno_sids();

    $recordm = $objm->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));

    //encefalo_sids
    $objn = new encefalo_sids();

    $recordn = $objn->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));

    //cavo_orale_sids
    $objo = new cavo_orale_sids();

    $recordo = $objo->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));

    //cavita_toracica_sids
    $objq = new cavita_toracica_sids();

    $recordq = $objq->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));

    //apparato_cardiovascolare_sids
    $objr = new apparato_cardiovascolare_sids();

    $recordr = $objr->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));

    //apparato_respiratorio_sids
    $objs = new apparato_respiratorio_sids();

    $records = $objs->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));

    //cavita_addominale_sids
    $objt = new cavita_addominale_sids();

    $recordt = $objt->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));

    //dati_protocollo_sids
    $obju = new dati_protocollo_sids();

    $recordu = $obju->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

    //prelievi sids
    $objv = new prelievi_sids();

    $recordv = $objv->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));
        
    //menu lattante
    if (($objp->fetchNumRows() == 0) || ($obja->fetchNumRows() == 0) || ($objb->fetchNumRows() == 0) || ($recordp['conclusa']=='N') || ($recorda['conclusa']=='N') || ($recordb['conclusa1']=='N') || ($recordb['conclusa2']=='N') || ($recordp['conclusa']==null) || ($recorda['conclusa']==null) || ($recordb['conclusa1']==null) || ($recordb['conclusa2']==null)){
        $_SESSION['menu_lattante_sids'] = 'menu_bt_err';
    }
    else {
        $_SESSION['menu_lattante_sids'] = 'menu';
    }
      
    //menu scena del ritrovamento
    if (($objc->fetchNumRows() == 0) || ($recordc['conclusa1']=='N') || ($recordc['conclusa2']=='N') || ($recordc['conclusa3']=='N') || ($recordc['conclusa1']==null) || ($recordc['conclusa2']==null) || ($recordc['conclusa3']==null)){
        $_SESSION['menu_ritrovamento_sids'] = 'menu_bt_err';
    }
    else {
        $_SESSION['menu_ritrovamento_sids'] = 'menu';
        
    }
        
    //menu madre sids
    if (($objd->fetchNumRows() == 0) || ($obje->fetchNumRows() == 0) || ($objf->fetchNumRows() == 0) || ($objg->fetchNumRows() == 0) || ($objh->fetchNumRows() == 0) || ($obji->fetchNumRows() == 0) || ($objj->fetchNumRows() == 0) || ($recordd['conclusa']=='N') || ($recorde['conclusa']=='N') || ($recordf['conclusa']=='N') || ($recordg['conclusa']=='N') || ($recordj['conclusa']=='N') || ($recordh['conclusa1']=='N') || ($recordh['conclusa2']=='N') || ($recordi['conclusa']=='N') || ($recordd['conclusa']==null) || ($recorde['conclusa']==null) || ($recordf['conclusa']==null) || ($recordg['conclusa']==null) || ($recordh['conclusa1']==null) || ($recordh['conclusa2']==null) || ($recordi['conclusa']==null) || ($recordj['conclusa']==null)){
        $_SESSION['menu_madre_sids'] = 'menu_bt_err';
    }
    else {
        $_SESSION['menu_madre_sids'] = 'menu';
        
    }
    
    //menu padre sids
    if (($objk->fetchNumRows() == 0) || ($objl->fetchNumRows() == 0) || ($recordk['conclusa']=='N') || ($recordl['conclusa1']=='N') || ($recordl['conclusa2']=='N') || ($recordl['conclusa3']=='N') || ($recordk['conclusa']==null) || ($recordl['conclusa1']==null) || ($recordl['conclusa2']==null) || ($recordl['conclusa3']==null))     {
        $_SESSION['menu_padre_sids'] = 'menu_bt_err';
    }
    else {
        $_SESSION['menu_padre_sids'] = 'menu';
        
    }
        
    //menu consenso sids
    if (($objco->fetchNumRows() == 0) || ($recordco['conclusa']=='N') || ($recordco['conclusa']==null))     {
        $_SESSION['menu_consenso_sids'] = 'menu_bt_err';
    }
    else {
        $_SESSION['menu_consenso_sids'] = 'menu';
        
    }
        
    //menu autopsia sids
    if (($objm->fetchNumRows() == 0) || ($objn->fetchNumRows() == 0) || ($objo->fetchNumRows() == 0) || ($objq->fetchNumRows() == 0) || ($objr->fetchNumRows() == 0) || ($objs->fetchNumRows() == 0) || ($objt->fetchNumRows() == 0) || ($obju->fetchNumRows() == 0) || ($recordm['conclusa']=='N') || ($recordn['conclusa']=='N') || ($recordo['conclusa']=='N') || ($recordq['conclusa']=='N') || ($recordr['conclusa']=='N') || ($records['conclusa']=='N') || ($recordt['conclusa']=='N') || ($recordu['conclusa1']=='N') || ($recordu['conclusa2']=='N') || ($recordm['conclusa']==null) || ($recordn['conclusa']==null) || ($recordo['conclusa']==null) || ($recordq['conclusa']==null) || ($recordr['conclusa']==null) || ($records['conclusa']==null) || ($recordt['conclusa']==null) || ($recordu['conclusa1']==null) || ($recordu['conclusa2']==null))     {
        $_SESSION['menu_autopsia_sids'] = 'menu_bt_err';
    }
    else {
        $_SESSION['menu_autopsia_sids'] = 'menu';
        
    }
        
    //menu prelievi sids
    if (($objv->fetchNumRows() == 0) || ($recordv['conclusa']=='N') || ($recordv['conclusa']==null))     {
        $_SESSION['menu_prelievi_sids'] = 'menu_bt_err';
    }
    else {
        $_SESSION['menu_prelievi_sids'] = 'menu';
        
    }
        

    }

?>