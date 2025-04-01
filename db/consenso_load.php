<?php
function loadPage() {	
	require_once("./db/databases.php");
    require_once("./db/consenso.php");
    require_once("./db/schede.php");
   
    $obs = new consenso();
    
    $records= $obs->fetchRecord(array("id_scheda"=>$_SESSION['case_id']));
    

	$obj = new schede();

	$recordx= $obj->fetchRecord(array("id"=>$_SESSION['case_id']));

    	
    if($obs->fetchNumRows() == 0){
        $_SESSION["consenso_sids"] = "N";
        $_SESSION["consenso_mf"] = "N";
        $_POST["consenso_diag"] = $recordx['consenso_diag'];
        $_POST["consenso_gen"] = $recordx['consenso_analisi_gen'];
        $_POST["consenso_toss"] = $recordx['consenso_analisi_toss'];
    }
    else {
        $_POST["consenso_diag"] = $recordx['consenso_diag'];
        $_POST["consenso_gen"] = $recordx['consenso_analisi_gen'];
        $_POST["consenso_toss"] = $recordx['consenso_analisi_toss'];

        $_SESSION["consenso_sids"] = "Y";
        $_SESSION["consenso_mf"] = "Y";
    }
}
?>