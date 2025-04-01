<?php
    session_start();

    include_once("databases.php");
    include_once("schede.php");
    include_once("dati_sids.php");
    include_once("allattamento.php");
    include_once("scheda_sids.php");
    include_once("log_activities.php");
    require_once("loadmenu_feto.php");
    require_once("loadmenu_sids.php");
    require_once("loadtab_annessif.php");
    require_once("loadtab_autopsia.php");
    require_once("loadtab_autopsiaf.php");
    require_once("loadtab_consenso.php");
    require_once("loadtab_esamimf.php");
    require_once("loadtab_feto.php");
    require_once("loadtab_latt.php");
    require_once("loadtab_madre.php");
    require_once("loadtab_madref.php");
    require_once("loadtab_padre.php");
    require_once("loadtab_padref.php");
    require_once("loadtab_prelievi.php");
    require_once("loadtab_prelievif.php");
    require_once("loadtab_scheda.php");

    $idcaso = $_GET['idc'];

    
   //schede
    $insert_data = array();
    $obj = new schede();
    $records = $obj->fetchRecord(array("idcaso_provv"=>$idcaso));
    $typo = $records['tipologia'];
    $_SESSION["case_id"] = $records['id'];
    $_SESSION["id_caso"] = $records['idcaso_provv'];
    $insert_data["data_ultima_modifica"] = date("Y-m-d");
    $condition= array("idcaso_provv" => $idcaso);
    $obj->update($insert_data,$condition);

    //log
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = "Modifica";
    $insert_log["operazione"] = "Apertura scheda";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    $_SESSION["stato"] = 'aperta';
    
    if($typo == 'sids'){
        loadmenu_sids();
        tab_lattante();
        tab_scheda();
        tab_madre();
        tab_padre();
        tab_consenso();
        tab_autopsia();
        tab_prelievi();
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=sids&tipo=sids&tab=1");
    }
    else if($typo == 'morte fetale'){
        loadmenu_feto();
        tab_feto();
        tab_madref();
        tab_esamimf();
        tab_padref();
        tab_consenso();
        tab_autopsiaf();
        tab_annessif();
        tab_prelievif();
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=scheda&tipo=feto&tab=1");
    }
?>