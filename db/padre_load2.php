<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/padre.php");

	$obj = new padre();

	$records= $obj->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
    if($records['idalcol'] === null){
          $_SESSION["padre_alcol"] = "N";
        $_SESSION["padre_alcolF"] = "N";
    }
    else {
     // $sql = "select idalcol, alcool, alcool_quali_quantita, stupefacenti, stupefacenti_quali_quantita FROM padre WHERE schede_id = $_SESSION[case_id]";
    
        $_POST["padre_alcol_alcol"] = $records['alcool'];
        $_POST["padre_alcol_specA"] = $records['alcool_quali_quantita'];
        $_POST["padre_alcol_stupefacenti"] = $records['stupefacenti'];
        $_POST["padre_alcol_specS"] = $records['stupefacenti_quali_quantita'];

        $_SESSION["padre_alcol"] = "Y";
        $_SESSION["padre_alcolF"] = "Y";
        
    }
    

    }							       
?>