<?php

    include_once("databases.php");
    include_once("info_morte_fetale.php");


    function tab_esamimf() {
        
        //info_morte_fetale indagini
        $objh = new info_morte_fetale();

	    $recordh = $objh->fetchRecord(array("madre_schede_id"=>$_SESSION['case_id']));
        
        
        if($recordh['idindagini'] == null){
            $_SESSION['indaginiF'] = "tabs";
        }
        else {
            
            if ((($recordh['biopsia_villocoriale'] == null ) || (($recordh['biopsia_villocoriale'] == 'patologico') && ($recordh['specifica_patologico_biopsia_villocoriale'] == null))) || (($recordh['amniocentesi'] == null ) || (($recordh['amniocentesi'] == 'patologico') && ($recordh['specifica_patologico_amniocentesi'] == null))) || (($recordh['funicolocentesi'] == null ) || (($recordh['funicolocentesi'] == 'patologico') && ($recordh['specifica_patologico_funicolocentesi'] == null))) || (($recordh['fetoscopia'] == null ) || (($recordh['fetoscopia'] == 'patologico') && ($recordh['specifica_patologico_fetoscopia'] == null)))){
                
                $insert_data = array();
                $insert_data["conclusa2"] = "N";
                $obj = new info_morte_fetale();
                $condition= array("madre_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['indaginiF'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa2"] = "Y";
                $obj = new info_morte_fetale();
                $condition= array("madre_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['indaginiF'] = "tabs_ok";
            }
        }
        
        //info_morte_fetale ecografia
        if($recordh['idecografia'] == null){
            $_SESSION['ecografiaF'] = "tabs";
        }
        else {
            
            if ((($recordh['malformazioni_utero'] == null ) || (($recordh['malformazioni_utero'] == 'Y') && ($recordh['specifica_malformazioni_utero'] == null))) || (($recordh['ecografia'] == null ) || (($recordh['ecografia'] == 'patologico' ) && ($recordh['malformazioni_fetali'] == null ))) || ($recordh['placenta'] == null )){
                
                $insert_data = array();
                $insert_data["conclusa3"] = "N";
                $obj = new info_morte_fetale();
                $condition= array("madre_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['ecografiaF'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa3"] = "Y";
                $obj = new info_morte_fetale();
                $condition= array("madre_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['ecografiaF'] = "tabs_ok";
            }
        }
        
        //info_morte_fetale ricovero
        
        if($recordh['idecografia'] == null){
            $_SESSION['ricoveroF'] = "tabs";
        }
        else {
            if (($recordh['ricovero_durante_gravidanza'] == null) || (($recordh['ricovero_durante_gravidanza'] == 'Y') && ($recordh['diagnosi_dimissione'] == null))){
                
                $insert_data = array();
                $insert_data["conclusa4"] = "N";
                $obj = new info_morte_fetale();
                $condition= array("madre_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['ricoveroF'] = "tabs_er";
            }
            else {
                
                $insert_data = array();
                $insert_data["conclusa4"] = "Y";
                $obj = new info_morte_fetale();
                $condition= array("madre_schede_id" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
                $_SESSION['ricoveroF'] = "tabs_ok";
            }
        }
        
    }

?>