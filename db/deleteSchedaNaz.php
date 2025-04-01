<?php
    session_start();
    $idcaso = $_GET['idc'];
    
    //comuni
    include_once("databases.php");
    include_once("schede.php");
    include_once("log_activities.php");


    //SCHEDE COMUNI
    //schede
    $obj = new schede();
    $record = $obj->fetchRecord(array("idcaso_provv"=>$idcaso));


    //SIDS
    if($record['nazionale'] == 'N'){ 
            echo "errore";
            header("Location:../index_".$_SESSION["tipo_usr"].".php?menu=aperte&messaggio=nodelete");
        }
    else{
            
            
            //log
            $insert_log = array();
            $obja = new log_activities();
            $insert_log["utente"] = $_SESSION["username"];
            $insert_log["oggetto"] = "Cancellazione";
            $insert_log["operazione"] = "Cancellata Scheda dal menu schede aperte";
            $insert_log["schede_id"] = $record['id'];
            $insert_log["id"] = $idcaso;
            $obja->insert($insert_log);
        
            $obj = new schede();
            $condition= array("idcaso_provv" => $idcaso);
            $insert_data["cancellata"] = 'Y';
            $obj->update($insert_data,$condition);
            //var_dump($insert_data);
            $obj->error();
            header("Location:../index_".$_SESSION["tipo_usr"].".php?menu=aperte&messaggio=okdelete");
        }

?>