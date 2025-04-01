<?php
function loadPage() {
	require_once("./db/databases.php");
    require_once("./db/padre.php");

	$obj = new padre();

	$records= $obj->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
    if($records['idfarmaci'] === null){
        $_SESSION["padre_farmaci"] = "N";
        $_SESSION["padre_farmaciF"] = "N";
    }
    else {

    // $sql = "select idfarmaci, farmaci, farmaci_quali_quantita, HIV_positivo FROM padre WHERE schede_id = $_SESSION[case_id]";
        $_POST["padre_farmaci_farmaci"] = $records['farmaci'];
        $_POST["padre_farmaci_specF"] = $records['farmaci_quali_quantita'];
        $_POST["padre_farmaci_HIV"] = $records['HIV_positivo'];

        $_SESSION["padre_farmaci"] = "Y";
        $_SESSION["padre_farmaciF"] = "Y";
    }
    }							       
?>