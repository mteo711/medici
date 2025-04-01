<?php
function loadPage() {
    require_once("./db/databases.php");
    require_once("./db/padre.php");
	
	$obj = new padre();

	$records= $obj->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

	
    if($obj->fetchNumRows() == 0){
      $_SESSION["padre_noto"] = "N";
      $_SESSION["padre_notoF"] = "N";
    }
    else {
        $_POST["padre_no"] = $records['noto'];

        $_SESSION["padre_noto"] = "Y";
		$_SESSION["padre_notoF"] = "Y";
        
    }
    

    }							       
?>
