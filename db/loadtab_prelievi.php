<?php

    include_once("databases.php");
    include_once("prelievi_sids.php");

    function tab_prelievi() {
        //prelievi
        $objp = new prelievi_sids();

	    $recordp = $objp->fetchRecord(array("dati_protocollo_sids_schede_id"=>$_SESSION['case_id']));
    
        if($objp->fetchNumRows() == 0){
            $_SESSION['prelievi_sids_encefalo'] = "tabs";
        }
        else {
            $_SESSION['prelievi_sids_encefalo'] = "tabs_ok";
        }
        
        //polmoni
        if($objp->fetchNumRows() == 0 || $recordp['idpolmone'] == null){
            $_SESSION['prelievi_sids_polmoni'] = "tabs";
        }
        else {
            $_SESSION['prelievi_sids_polmoni'] = "tabs_ok";
        }
        
        //circolatorio
        if($objp->fetchNumRows() == 0 || $recordp['idcircolatorio'] == null){
            $_SESSION['prelievi_sids_circolatorio'] = "tabs";
        }
        else {
            $_SESSION['prelievi_sids_circolatorio'] = "tabs_ok";
        }
        
        //gastro
        if($objp->fetchNumRows() == 0 || $recordp['idgastro'] == null){
            $_SESSION['prelievi_sids_gastro'] = "tabs";
        }
        else {
            $_SESSION['prelievi_sids_gastro'] = "tabs_ok";
        }
        
        //reni
        if($objp->fetchNumRows() == 0 || $recordp['idrene'] == null){
            $_SESSION['prelievi_sids_surrene'] = "tabs";
        }
        else {
            $_SESSION['prelievi_sids_surrene'] = "tabs_ok";
        }
        
        //altro
        if($objp->fetchNumRows() == 0 ||  $recordp['idaltro'] == null){
            $_SESSION['prelievi_sids_altro'] = "tabs";
        }
        else {
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new prelievi_sids();
                $condition= array("dati_protocollo_sids_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
            
            $_SESSION['prelievi_sids_altro'] = "tabs_ok";
        }
    }

?>