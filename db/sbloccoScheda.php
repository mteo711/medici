<?php
    session_start();

    include_once("databases.php");
    include_once("schede.php");
    
    $idcaso = $_GET['idc'];

    
    $insert_data = array();
    $insert_data["completa"] = "N";
    $insert_data["bloccata"] = "N";
    $obj = new schede();
    $condition= array("idcaso_provv" => $idcaso);
    $obj->update($insert_data,$condition);
    //var_dump($insert_data);
    $obj->error();
    header("Location:../index_".$_SESSION["tipo_usr"].".php?menu=concluse&messaggio=oksblocco");
?>