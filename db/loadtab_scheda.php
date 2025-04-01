<?php
    include_once("databases.php");
    include_once("ritrovamento.php");
    include_once("ritrovamento_ospedale.php");
    include_once("ritrovamento_casa.php");
    include_once("ritrovamento_fuori_casa.php");

    function tab_scheda() {
        
        //ritrovamento
        $objp = new ritrovamento();

	    $recordp = $objp->fetchRecord(array("schede_id"=>$_SESSION['case_id']));
        
        //ospedale
        $objosp = new ritrovamento_ospedale();

	    $recordosp = $objosp->fetchRecord(array("ritrovamento_schede_id"=>$_SESSION['case_id']));
        
        //fuori casa
        $objfuori = new ritrovamento_fuori_casa();

	    $recordfuori = $objfuori->fetchRecord(array("ritrovamento_schede_id"=>$_SESSION['case_id']));
        
        //casa
        $objcasa = new ritrovamento_casa();

	    $recordcasa = $objcasa->fetchRecord(array("ritrovamento_schede_id"=>$_SESSION['case_id']));
        
    
        if($objp->fetchNumRows() == 0){
            $_SESSION['luogo'] = "tabs";
        }
        else {
            if (($recordp['luogo_morte'] == null) || ($recordp['cuscino'] == null) || ($recordp['succhiotto'] == null) || ($recordp['catenine_al_collo'] == null) || ($recordp['oggetti_nel_lettino'] == null) || ($recordp['consistenza_materasso'] == null) || (($recordp['tentativo_di_rianimazione'] == null) || (($recordp['tentativo_di_rianimazione'] == 'Y') && ($recordp['specifica_tentativo_di_rianimazione'] == null))) || (($recordp['posizione_se_sdraiato'] == 'altra') && ($recordp['specifica_posizione_se_sdraiato'] == null)) || (($recordp['luogo_morte'] == 'ospedale') && ($recordosp['nome_ospedale'] == null)) || (($recordp['luogo_morte'] == 'fuori casa') && (($recordfuori['luogo_morte_specifico'] == null) || (($recordfuori['luogo_morte_specifico'] == 'altro') && ($recordfuori['specifica_altro_luogo'] == null)))) || (($recordp['luogo_morte'] == 'casa') && (($recordcasa['temperatura_stanza_ritrovamento'] == null) || ($recordcasa['temperatura_bambino'] == null) || ($recordcasa['luogo_morte_specifico'] == null) || ((($recordcasa['luogo_morte_specifico'] == 'in altro luogo') || ($recordcasa['luogo_morte_specifico'] == 'a letto con altre persone')) && ($recordcasa['specifica_altro_abitazione'] == null))))){
                
                $insert_data = array();
                $insert_data["conclusa1"] = "N";
                $obj = new ritrovamento();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['luogo'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa1"] = "Y";
                $obj = new ritrovamento();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['luogo'] = "tabs_ok";
            }
        }
        
        
        //situazione
        //MM 
        if($objp->fetchNumRows() == 0 || $recordp['idsituazione'] == null){
            $_SESSION['situazione'] = "tabs";
        }
        else {
            
            if ((($recordp['mat_organico_bocca'] == null) || (($recordp['mat_organico_bocca'] == 'Y') &&($recordp['specifica_mat_organico_bocca'] == null))) || (($recordp['mat_organico_naso'] == null) || (($recordp['mat_organico_naso'] == 'Y') && ($recordp['specifica_mat_organico_naso'] == null))) || (($recordp['mat_organico_pannolino'] == null) || (($recordp['mat_organico_pannolino'] == 'Y') &&($recordp['specifica_mat_organico_pannolino'] == null))) || (($recordp['aspetto_bambino'] == null) && ($recordp['specifica_aspetto_bambino'] == null))){
                
                $insert_data = array();
                $insert_data["conclusa2"] = "N";
                $obj = new ritrovamento();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['situazione'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa2"] = "Y";
                $obj = new ritrovamento();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['situazione'] = "tabs_ok";
            }
        }
        
       
        //pasti
        //MM 
        if($objp->fetchNumRows() == 0 || $recordp['idpasti'] == null){
            $_SESSION['pasti'] = "tabs";
        }
        else {
            if (($recordp['data_ultimo_pasto'] == null) || ($recordp['ora_ultimo_pasto'] == null) || ($recordp['ultimo_pasto_somministrato_da'] == null) || (($recordp['alimenti_24_ore'] == null) || (($recordp['alimenti_24_ore'] == 'materno') && ($recordp['latte'] == null)) || (($recordp['alimenti_24_ore'] == 'polvere') && ($recordp['polvere'] == null)) || (($recordp['alimenti_24_ore'] == 'mucca') && ($recordp['mucca'] == null)) || (($recordp['alimenti_24_ore'] == 'acqua') && ($recordp['acqua'] == null)) || (($recordp['alimenti_24_ore'] == 'liquidi') && ($recordp['liquidi'] == null)) || (($recordp['alimenti_24_ore'] == 'omogeneizzati') && ($recordp['omogeneizzati'] == null)) || (($recordp['alimenti_24_ore'] == 'altro') && ($recordp['specifica_altro_alimenti'] == null))) || (($recordp['nuovi_alimenti_ultime_24_ore'] == null) || (($recordp['nuovi_alimenti_ultime_24_ore'] == 'Y') && ($recordp['specifica_nuovi_alimenti_ultime_24_ore'] == null))) || (($recordp['morte_rilevata_da'] == null) || (($recordp['morte_rilevata_da'] == 'altro') && ($recordp['specifica_morte_rilevata_da'] == null)))){
                $insert_data = array();
                $insert_data["conclusa3"] = "N";
                $obj = new ritrovamento();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['pasti'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa3"] = "Y";
                $obj = new ritrovamento();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['pasti'] = "tabs_ok";
            }
        }
    }

?>