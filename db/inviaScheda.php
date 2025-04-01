<?php
    session_start();
    $idcaso = $_GET['idc'];
    
    //comuni
    include_once("databases.php");
    include_once("schede.php");
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


    //SCHEDE COMUNI
    //schede
    $obj = new schede();
    $record = $obj->fetchRecord(array("idcaso_provv"=>$idcaso));

    //dati personali madre
    $objd = new dati_pers();

    $recordd = $objd->fetchRecord(array("schede_id"=>$record['id'],'tipo' => 'MADRE'));

    //parti_prec
    $obje = new parti_prec();

    $recorde = $obje->fetchRecord(array("madre_schede_id"=>$record['id']));

    //fumo_attivo
    $objf = new fumo_attivo();

    $recordf = $objf->fetchRecord(array("madre_schede_id"=>$record['id']));

    //fumo_passivo
    $objg = new fumo_passivo();

    $recordg = $objg->fetchRecord(array("madre_schede_id"=>$record['id']));

    //madre alcol farmaci
    $objh = new madre();

    $recordh = $objh->fetchRecord(array("schede_id"=>$record['id']));

    //patologie_gest
    $obji = new patologie_gest();

    $recordi = $obji->fetchRecord(array("madre_schede_id"=>$record['id']));
    
    //fratelli
    $objj = new fratelli();

    $recordj = $objj->fetchRecord(array("patologie_gest_madre_schede_id"=>$record['id']));

    //dati personali
    $objk = new dati_pers();

    $recordk = $objk->fetchRecord(array("schede_id"=>$record['id'],'tipo' => 'PADRE'));

    //padre fumo alcol farmaci
    $objl = new padre();

    $recordl = $objl->fetchRecord(array("schede_id"=>$record['id']));

    //consenso
    $objco = new consenso();
    $recordco = $objco->fetchRecord(array("id_scheda"=>$record['id']));


    
    //SCHEDE SIDS
    //dati_sids
    $objp = new dati_sids();
    $recordp = $objp->fetchRecord(array("schede_id"=>$record['id']));
    
    //allattamento
    $obja = new allattamento();
    $recorda= $obja->fetchRecord(array("scheda_sids_schede_id"=>$record['id']));

    //scheda_sids
    $objb = new scheda_sids();
    $recordb= $objb->fetchRecord(array("dati_sids_schede_id"=>$record['id']));

    //ritrovamento
    $objc = new ritrovamento();

    $recordc = $objc->fetchRecord(array("schede_id"=>$record['id']));

    //esame_esterno_sids
    $objm = new esame_esterno_sids();

    $recordm = $objm->fetchRecord(array("dati_protocollo_sids_schede_id"=>$record['id']));

    //encefalo_sids
    $objn = new encefalo_sids();

    $recordn = $objn->fetchRecord(array("dati_protocollo_sids_schede_id"=>$record['id']));

    //cavo_orale_sids
    $objo = new cavo_orale_sids();

    $recordo = $objo->fetchRecord(array("dati_protocollo_sids_schede_id"=>$record['id']));

    //cavita_toracica_sids
    $objq = new cavita_toracica_sids();

    $recordq = $objq->fetchRecord(array("dati_protocollo_sids_schede_id"=>$record['id']));

    //apparato_cardiovascolare_sids
    $objr = new apparato_cardiovascolare_sids();

    $recordr = $objr->fetchRecord(array("dati_protocollo_sids_schede_id"=>$record['id']));

    //apparato_respiratorio_sids
    $objs = new apparato_respiratorio_sids();

    $records = $objs->fetchRecord(array("dati_protocollo_sids_schede_id"=>$record['id']));

    //cavita_addominale_sids
    $objt = new cavita_addominale_sids();

    $recordt = $objt->fetchRecord(array("dati_protocollo_sids_schede_id"=>$record['id']));

    //dati_protocollo_sids
    $obju = new dati_protocollo_sids();

    $recordu = $obju->fetchRecord(array("schede_id"=>$record['id']));

    //prelievi sids
    $objv = new prelievi_sids();

    $recordv = $objv->fetchRecord(array("dati_protocollo_sids_schede_id"=>$record['id']));



    //SCHEDE MORTE FETALE
    //dati_feto
    $objaf = new dati_feto();
    $recordaf= $objaf->fetchRecord(array("schede_id"=>$record['id']));

    //scheda_feto
    $objbf = new scheda_feto();
    $recordbf= $objbf->fetchRecord(array("dati_feto_schede_id"=>$record['id']));

    //info_morte_fetale
    $objcf = new info_morte_fetale();

    $recordcf = $objcf->fetchRecord(array("madre_schede_id"=>$record['id']));
    
    //esame_esterno_mf
    $objmf = new esame_esterno_mf();

    $recordmf = $objmf->fetchRecord(array("dati_protocollo_mf_schede_id"=>$record['id']));

    //esame_interno_mf
    $objnnf = new esame_interno_mf();

    $recordnnf = $objnnf->fetchRecord(array("dati_protocollo_mf_schede_id"=>$record['id']));
    
    //encefalo_mf
    $objnf = new encefalo_mf();

    $recordnf = $objnf->fetchRecord(array("dati_protocollo_mf_schede_id"=>$record['id']));

    //cavo_orale_mf
    $objof = new cavo_orale_mf();

    $recordof = $objof->fetchRecord(array("dati_protocollo_mf_schede_id"=>$record['id']));

    //cavita_toracica_mf
    $objqf = new cavita_toracica_mf();

    $recordqf = $objqf->fetchRecord(array("dati_protocollo_mf_schede_id"=>$record['id']));

    //apparato_cardiovascolare_mf
    $objrf = new apparato_cardiovascolare_mf();

    $recordrf = $objrf->fetchRecord(array("dati_protocollo_mf_schede_id"=>$record['id']));

    //apparato_respiratorio_mf
    $objsf = new apparato_respiratorio_mf();

    $recordsf = $objsf->fetchRecord(array("dati_protocollo_mf_schede_id"=>$record['id']));

    //cavita_addominale_mf
    $objtf = new cavita_addominale_mf();

    $recordtf = $objtf->fetchRecord(array("dati_protocollo_mf_schede_id"=>$record['id']));

    //dati_protocollo_mf
    $objuf = new dati_protocollo_mf();

    $recorduf = $objuf->fetchRecord(array("schede_id"=>$record['id']));

    //prelievi_mf
    $objvf = new prelievi_mf();

    $recordvf = $objvf->fetchRecord(array("dati_protocollo_mf_schede_id"=>$record['id']));

    //referto_macroscopico_annessi_fetali
    $objzf = new referto_macroscopico_annessi_fetali();

    $recordzf = $objzf->fetchRecord(array("schede_id"=>$record['id']));


    //SIDS
    if($record['tipologia'] == 'sids'){
        if(($recordp['conclusa']=='N') || ($recorda['conclusa']=='N') || ($recordb['conclusa1']=='N') || ($recordb['conclusa2']=='N') || ($recordb['caso_di_sids']==null) || ($recordc['conclusa1']=='N') || ($recordc['conclusa2']=='N') || ($recordc['conclusa3']=='N') || ($recordd['conclusa']=='N') || ($recorde['conclusa']=='N') || ($recordf['conclusa']=='N') || ($recordg['conclusa']=='N') || ($recordh['conclusa1']=='N') || ($recordh['conclusa2']=='N') || ($recordi['conclusa2']=='N') || ($recordj['conclusa']=='N') || ($recordk['conclusa']=='N') || ($recordl['conclusa1']=='N') || ($recordl['conclusa2']=='N') || ($recordl['conclusa3']=='N') || ($recordm['conclusa']=='N') || ($recordn['conclusa']=='N') || ($recordo['conclusa']=='N') || ($recordq['conclusa']=='N') || ($recordr['conclusa']=='N') || ($records['conclusa']=='N') || ($recordt['conclusa']=='N') || ($recordu['conclusa1']=='N') || ($recordu['conclusa2']=='N') || ($recordv['conclusa']=='N') || ($recordco['conclusa']=='N')){ 
            echo "errore";
            header("Location:../index_".$_SESSION["tipo_usr"].".php?menu=aperte&messaggio=errore");
        }
        else{
            //log
            $insert_log = array();
            $obja = new log_activities();
            $insert_log["utente"] = $_SESSION["username"];
            $insert_log["oggetto"] = "Invio Scheda";
            $insert_log["operazione"] = "Invio scheda SIDS al Centro Nazionale";
            $insert_log["schede_id"] = $record['id'];
            $insert_log["id"] = $idcaso;
            $obja->insert($insert_log);
            
            
            $insert_data = array();
            $insert_data["idcaso"] = 'naz_'.$record['id'].'/'.date('Y');
            $insert_data["completa"] = "Y";
            $insert_data["bloccata"] = "Y";
            $insert_data["data_invio"] = date("Y-m-d");
            $obj = new schede();
            $condition= array("idcaso_provv" => $idcaso);
            $obj->update($insert_data,$condition);
            //var_dump($insert_data);
            $obj->error();
            header("Location:../index_".$_SESSION["tipo_usr"].".php?menu=aperte&messaggio=ok");
        }
    }

    //FETO
    else if($record['tipologia'] == 'morte fetale'){
        if(($recordaf['conclusa']=='N') || ($recordbf['conclusa']=='N') || ($recordcf['conclusa1']=='N') || ($recordcf['conclusa2']=='N') || ($recordcf['conclusa3']=='N') || ($recordcf['conclusa4']=='N') || ($recordd['conclusa']=='N') || ($recorde['conclusa']=='N') || ($recordf['conclusa']=='N') || ($recordg['conclusa']=='N') || ($recordh['conclusa1']=='N') || ($recordh['conclusa2']=='N') || ($recordi['conclusa2']=='N') || ($recordj['conclusa']=='N') || ($recordk['conclusa']=='N') || ($recordl['conclusa1']=='N') || ($recordl['conclusa2']=='N') || ($recordl['conclusa3']=='N') || ($recordmf['conclusa']=='N') || ($recordnf['conclusa']=='N') || ($recordnnf['conclusa']=='N') || ($recordof['conclusa']=='N') || ($recordqf['conclusa']=='N') || ($recordrf['conclusa']=='N') || ($recordsf['conclusa']=='N') || ($recordtf['conclusa1']=='N') || ($recordtf['conclusa2']=='N') || ($recorduf['conclusa1']=='N') || ($recorduf['conclusa2']=='N') || ($recordvf['conclusa']=='N') || ($recordzf['conclusa1']=='N') || ($recordzf['conclusa2']=='N') || ($recordzf['conclusa3']=='N') || ($recordco['conclusa']=='N')){ 
            echo "errore";
            header("Location:../index_".$_SESSION["tipo_usr"].".php?menu=aperte&messaggio=errore");
        }
        else{
            //log
            $insert_log = array();
            $obja = new log_activities();
            $insert_log["utente"] = $_SESSION["username"];
            $insert_log["oggetto"] = "Invio Scheda";
            $insert_log["operazione"] = "Invio scheda MORTE FETALE al Centro Nazionale";
            $insert_log["schede_id"] = $record['id'];
            $insert_log["id"] = $idcaso;
            $obja->insert($insert_log);
            
            $insert_data = array();
            $insert_data["idcaso"] = 'naz_'.$record['id'].'/'.date('Y');
            $insert_data["completa"] = "Y";
            $insert_data["bloccata"] = "Y";
            $insert_data["data_invio"] = date("Y-m-d");
            $obj = new schede();
            $condition= array("idcaso_provv" => $idcaso);
            $obj->update($insert_data,$condition);
            //var_dump($insert_data);
            $obj->error();
            header("Location:../index_".$_SESSION["tipo_usr"].".php?menu=aperte&messaggio=ok");
        }
    }
?>