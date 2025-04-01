<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/allattamento.php");
   
	$obj = new allattamento();

	$records= $obj->fetchRecord(array("scheda_sids_schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
     if($obj->fetchNumRows() == 0){
         $_SESSION["allattamento_sids"] = "N";
    }
    else {	
	    $_POST["allattamento_materno"] = $records['allattamento_materno'];
        $_POST["allattamento_materno_nascita"] = $records['allattamento_materno_nascita'];
        $_POST["allattamento_materno_settD"] = $records['allattamento_materno_settD'];
        $_POST["allattamento_materno_settA"] = $records['allattamento_materno_settA'];
        $_POST["allattamento_artificiale"] = $records['allattamento_artificiale'];
        $_POST["allattamento_artificiale_nascita"] = $records['allattamento_artificiale_nascita'];
        $_POST["allattamento_artificiale_settD"] = $records['allattamento_artificiale_settD'];
        $_POST["allattamento_artificiale_settA"] = $records['allattamento_artificiale_settA'];
        $_POST["allattamento_misto"] = $records['allattamento_misto'];
        $_POST["allattamento_misto_nascita"] = $records['allattamento_misto_nascita'];
        $_POST["allattamento_misto_settD"] = $records['allattamento_misto_settD'];
        $_POST["allattamento_misto_settA"] = $records['allattamento_misto_settA'];
        $_POST["allattamento_svezzato"] = $records['allattamento_svezzato'];
        $_POST["allattamento_svezzato_settD"] = $records['allattamento_svezzato_settD'];
        $_POST["allattamento_svezzato_settA"] = $records['allattamento_svezzato_settA'];
        
        $_SESSION["allattamento_sids"] = "Y";
    }
    }							       
?>