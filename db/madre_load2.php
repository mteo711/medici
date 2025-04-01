<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/madre.php");

	$obj = new madre();

	$records= $obj->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

    	
    if($records['idfarmaci'] === null){
        $_SESSION["madre_farmaci"] = "N";
        $_SESSION["madre_farmaciF"] = "N";
    }
    else {    
     // $sql = "select idfarmaci, farmaci, farmaci_quali_quantita, HIV_positivo FROM madre WHERE schede_id = $_SESSION[case_id]";
    
        $_POST["madre_farmaci_farmaci"] = $records['farmaci'];
        $_POST["madre_farmaci_specF"] = $records['farmaci_quali_quantita'];
        $_POST["madre_farmaci_HIV"] = $records['HIV_positivo'];

        $_SESSION["madre_farmaci"] = "Y";
        $_SESSION["madre_farmaciF"] = "Y";
        
    }
    

    }							       
?>