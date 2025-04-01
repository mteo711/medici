<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/padre.php");

	$obj = new padre();

	$records= $obj->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
    if($records['idfumo'] === null){
         $_SESSION["padre_fumo"] = "N";
        $_SESSION["padre_fumoF"] = "N";
    }
    else {
        $_POST["fumo_padre_fumo"] = $records['fumo'];
        $_POST["fumo_padre_num"] = $records['num_sigarette_per_giorno'];
    
        $_SESSION["padre_fumo"] = "Y";
        $_SESSION["padre_fumoF"] = "Y";

    }
    }							       
?>