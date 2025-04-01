<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/info_morte_fetale.php");
    require_once("./db/dati_pers.php");
   
    $obx = new dati_pers();
    
    $recordz= $obx->fetchRecord(array("schede_id"=>$_SESSION['case_id'],'tipo' => 'MADRE'));
    
    $_POST["data_nascita"] = $recordz['data_nascita'];
    
    require_once("./db/dati_feto.php");

	$oby = new dati_feto();

	$recordy= $oby->fetchRecord(array("schede_id"=>$_SESSION['case_id']));
    $_POST["data_morte"] = $recordy['data_morte'];

	$obj = new info_morte_fetale();

	$records= $obj->fetchRecord(array("madre_schede_id"=>$_SESSION['case_id']));

    	
    if($obj->fetchNumRows() == 0){
         $_SESSION["morte_fetale"] = "N";
    }
    else {
	    $_POST["morte_fetale_dataU"] = $records['data_ultima_mestruazione'];
        $_POST["morte_fetale_dataA"] = $records['data_presunta_parto_anamnestico'];
        $_POST["morte_fetale_dataE"] = $records['data_presunta_parto_ecografico'];
        $_POST["morte_fetale_num"] = $records['num_visite_controllo_in_gravidanza'];
        
		$_SESSION["morte_fetale"] = "Y";
        
    }
    

    }							       
?>