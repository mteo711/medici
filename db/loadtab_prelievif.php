<?php

    include_once("databases.php");
    include_once("prelievi_mf.php");

    function tab_prelievif() {
        //prelievi
        $objp = new prelievi_mf();

	    $recordp = $objp->fetchRecord(array("dati_protocollo_mf_schede_id"=>$_SESSION['case_id']));
    
        if($objp->fetchNumRows() == 0){
            $_SESSION['prelievi_feto_encefaloF'] = "tabs";
        }
        else {
            $_SESSION['prelievi_feto_encefaloF'] = "tabs_ok";
        }
        
        //polmone
        if($objp->fetchNumRows() == 0 || $recordp['idpolmone'] == null){
            $_SESSION['prelievi_feto_polmoniF'] = "tabs";
        }
        else {
            $_SESSION['prelievi_feto_polmoniF'] = "tabs_ok";
        }
        
        //circolatorio
        if($objp->fetchNumRows() == 0 || $recordp['idcircolatorio'] == null){
            $_SESSION['prelievi_feto_circolatorioF'] = "tabs";
        }
        else {
            $_SESSION['prelievi_feto_circolatorioF'] = "tabs_ok";
        }
        
        //gastro
        if($objp->fetchNumRows() == 0 || $recordp['idgastro'] == null){
            $_SESSION['prelievi_feto_gastroF'] = "tabs";
        }
        else {
            $_SESSION['prelievi_feto_gastroF'] = "tabs_ok";
        }
        
        //rene
        if($objp->fetchNumRows() == 0 || $recordp['idrene'] == null){
            $_SESSION['prelievi_feto_surreneF'] = "tabs";
        }
        else {
            $_SESSION['prelievi_feto_surreneF'] = "tabs_ok";
        }
        
        //altro
        if($objp->fetchNumRows() == 0 || $recordp['idaltro'] == null){
            $_SESSION['prelievi_feto_altroF'] = "tabs";
        }
        else {
            
            $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new prelievi_mf();
                $condition= array("dati_protocollo_mf_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
            
            $_SESSION['prelievi_feto_altroF'] = "tabs_ok";
        }
    }

?>