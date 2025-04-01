<?php

    include_once("databases.php");
    include_once("dati_pers.php");
    include_once("padre.php");

    function tab_padre() {
        
        //dati personali
        $objp = new dati_pers();

	    $recordp = $objp->fetchRecord(array("schede_id"=>$_SESSION['case_id'],'tipo' => 'PADRE'));
    
        if($objp->fetchNumRows() == 0){
            $_SESSION['perso_padre'] = "tabs";
        }
        else {
            if (($recordp['cognome'] == null) || ($recordp['nome'] == null) || ($recordp['comune'] == null) || ($recordp['provincia'] == null) || ($recordp['data_nascita'] == null) || ($recordp['luogo_nascita'] == null) || ($recordp['eta'] == null) || ($recordp['professione'] == null) || (($recordp['etnia'] == null) || (($recordp['etnia'] == 'altra') && ($recordp['specifica_etnia'] == null)))){
                
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new dati_pers();
                $condition= array("schede_id" => $_SESSION['case_id'],'tipo' => 'PADRE');
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['perso_padre'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new dati_pers();
                $condition= array("schede_id" => $_SESSION['case_id'],'tipo' => 'PADRE');
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['perso_padre'] = "tabs_ok";
            }
        }
        
        
        //padre fumo
        $objy = new padre();
        $recordy = $objy->fetchRecord(array("schede_id"=>$_SESSION['case_id']));
        
        
        // if($recordy['idfumo'] == null){
            if($objy->fetchNumRows() == 0 || $recordy['idfumo'] == null){    
            $_SESSION['fumo_p'] = "tabs";
        }
        else {
            if ((($recordy['fumo'] == null) || (($recordy['fumo'] == 'Y') && ($recordy['num_sigarette_per_giorno'] == null)))){
                
                $insert_data = array();
                $insert_data["conclusa1"] = "N";
                $obj = new padre();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['fumo_p'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa1"] = "Y";
                $obj = new padre();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['fumo_p'] = "tabs_ok";
            }
        }
        
        //padre alcol
        // if($recordy['idalcol'] == null){
            if($objy->fetchNumRows() == 0 || $recordy['idalcol'] == null){     
            $_SESSION['alcol_p'] = "tabs";
        }
        else {
            if (($recordy['alcool'] == null) || (($recordy['alcool'] == 'Y') && ($recordy['alcool_quali_quantita'] == null)) || ($recordy['stupefacenti'] == null) || (($recordy['stupefacenti'] == 'Y') && ($recordy['stupefacenti_quali_quantita'] == null))){
                
                $insert_data = array();
                $insert_data["conclusa2"] = "N";
                $obj = new padre();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['alcol_p'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa2"] = "Y";
                $obj = new padre();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['alcol_p'] = "tabs_ok";
            }
        }
        
        
        //padre farmaci
        if($objy->fetchNumRows() == 0 || $recordy['idfarmaci'] == null){     
        // if($recordy['idfarmaci'] == null){
            $_SESSION['farma_p'] = "tabs";
        }
        else {
            
            if (($recordy['farmaci'] == null) || (($recordy['farmaci'] == 'Y') && ($recordy['farmaci_quali_quantita'] == null)) || ($recordy['HIV_positivo'] == null)){
                
                $insert_data = array();
                $insert_data["conclusa3"] = "N";
                $obj = new padre();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['farma_p'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa3"] = "Y";
                $obj = new padre();
                $condition= array("schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['farma_p'] = "tabs_ok";
            }
        }
    }

?>