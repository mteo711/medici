<?php
function loadPage() {
	require_once("./db/databases.php");
    require_once("./db/parti_prec.php");
    require_once("./db/dati_pers.php");
   
    $obx = new dati_pers();
    
    $recordz= $obx->fetchRecord(array("schede_id"=>$_SESSION['case_id'],'tipo' => 'MADRE'));
    
    $_POST["data_nascita"] = $recordz['data_nascita'];

	$obj = new parti_prec();

	$records= $obj->fetchRecord(array("madre_schede_id"=>$_SESSION['case_id']));

    	
    if($obj->fetchNumRows() == 0){
        $_SESSION["parti_prec"] = "N";
        $_SESSION["parti_precF"] = "N";
    }
    else {
	    $_POST["parti_prec_aborti"] = $records['aborti_precedenti'];
        $_POST["parti_prec_tipo1"] = $records['tipo1'];
        $_POST["parti_prec_sett1"] = $records['settimana1'];
        $_POST["parti_prec_tipo2"] = $records['tipo2'];
        $_POST["parti_prec_sett2"] = $records['settimana2'];
        $_POST["parti_prec_tipo3"] = $records['tipo3'];
        $_POST["parti_prec_sett3"] = $records['settimana3'];
        $_POST["parti_prec_tipo4"] = $records['tipo4'];
        $_POST["parti_prec_sett4"] = $records['settimana4'];
        $_POST["parti_prec_tipo5"] = $records['tipo5'];
        $_POST["parti_prec_sett5"] = $records['settimana5'];

        $_SESSION["parti_prec"] = "Y";
        $_SESSION["parti_precF"] = "Y";
    
    }
    }							       
?>