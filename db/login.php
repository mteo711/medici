<?php
    session_start();

    include_once("databases.php");
    include_once("utenti.php");
    include_once("log_activities.php");

    $name = $_POST['username'];
    $pass = $_POST['password'];
    
    $obj = new utenti();
    $records = $obj->fetchRecord(array("username"=>$name, 'password' => $pass));

    $_SESSION["nome_usr"] = $records['nome'];
    $_SESSION["cognome_usr"] = $records['cognome'];
    $_SESSION["centri_id"] = $records["centri_id"];
    $_SESSION["username"] = $records["username"];

    //log
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = "Autenticazione";
    $insert_log["operazione"] = "Accesso al sistema";
    $obja->insert($insert_log);

    if ($records['regionale'] == 'Y'){
        $_SESSION["tipo_usr"] = 'reg';
        header("Location:../index_reg.php?usr=reg");
    }
    elseif ($records['regionale'] == 'N'){
        $_SESSION["tipo_usr"] = 'naz';
        header("Location:../index_naz.php?usr=naz");
    }
    else {
        header("Location:../index.php");
    }
?>