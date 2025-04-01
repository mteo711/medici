<?php

    include_once("databases.php");
    include_once("consenso.php");
    include_once("schede.php");
    

    function tab_consenso() {
        
        //consenso
        $objp = new consenso();
	    $recordp = $objp->fetchRecord(array("id_scheda"=>$_SESSION['case_id']));
        
        
        //schede
        $obj = new schede();
	    $record = $obj->fetchRecord(array("id"=>$_SESSION['case_id']));
    
        if($objp->fetchNumRows() == 0){
        }
        else {
            if ((($recordp['id'] == 1) && (($record['consenso_diag'] == null) || (($record['consenso_diag'] == 'Y') && ($recordp['name'] == null)))) || (($recordp['id'] == 2) && (($record['consenso_analisi_gen'] == null) || (($record['consenso_analisi_gen'] == 'Y') && ($recordp['name'] == null)))) || (($recordp['id'] == 3) && (($record['consenso_analisi_gen'] == null) || (($record['consenso_analisi_toss'] == 'Y') && ($recordp['name'] == null))))){
                
                $insert_data = array();
                $insert_data["conclusa"] = "N";
                $obj = new consenso();
                $condition= array("id_scheda" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();
                
            }
            else {
                $insert_data = array();
                $insert_data["conclusa"] = "Y";
                $obj = new consenso();
                $condition= array("id_scheda" => $_SESSION['case_id']);
                $obj->update($insert_data,$condition);
                //var_dump($insert_data);
                $obj->error();  
            }
        }
        

    }

?>