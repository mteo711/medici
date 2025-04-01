<?php
function loadPage() {
	require_once("./db/databases.php");
    require_once("./db/fratelli.php");

	$obj = new fratelli();

	// in questo caso possono essere restituite pi˘ righe -- si usa il comando fetch
	$records= $obj->fetchRecord(array("patologie_gest_madre_schede_id"=>$_SESSION['case_id']));
    
    // non si fa alcun controllo che venga restituita almeno una righa	
     if($obj->fetchNumRows() == 0){
         $_SESSION["fratelli"] = "N";
         $_SESSION["fratelliF"] = "N";
    }
    else {	
         $_POST["fratelli_vivi"] = $records['num_figli_in_vita'];
         $_POST["fratelli_dataU"] = $records['data_ultimo_parto_precedente'];
         $_POST["fratelli_morti"] = $records['num_figli_morti'];
         $_POST["fratelli_dataN1"] = $records['dataN1'];
         $_POST["fratelli_mesiM1"] = $records['mesiM1'];
         $_POST["fratelli_anniM1"] = $records['anniM1'];
         $_POST["fratelli_causaM1"] = $records['causaM1'];
         $_POST["fratelli_dataN2"] = $records['dataN2'];
         $_POST["fratelli_mesiM2"] = $records['mesiM2'];
         $_POST["fratelli_anniM2"] = $records['anniM2'];
         $_POST["fratelli_causaM2"] = $records['causaM2'];
         $_POST["fratelli_dataN3"] = $records['dataN3'];
         $_POST["fratelli_mesiM3"] = $records['mesiM3'];
         $_POST["fratelli_anniM3"] = $records['anniM3'];
         $_POST["fratelli_causaM3"] = $records['causaM3'];
         $_POST["fratelli_dataN4"] = $records['dataN4'];
         $_POST["fratelli_mesiM4"] = $records['mesiM4'];
         $_POST["fratelli_anniM4"] = $records['anniM4'];
         $_POST["fratelli_causaM4"] = $records['causaM4'];



        $_SESSION["fratelli"] = "Y";
         $_SESSION["fratelliF"] = "Y";
    }

}							       
?>