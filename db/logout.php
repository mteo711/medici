<?php
    session_start();
    include_once("databases.php");
    include_once("utenti.php");
    include_once("log_activities.php");
    
    //log
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = "Logut";
    $insert_log["operazione"] = "Logout dal sistema";
    $obja->insert($insert_log);

    session_unset();
    header("Location:../index.php");

?>