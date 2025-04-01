<?php
function loadPage() {
	
	require_once("./db/databases.php");
	require_once("./db/ritrovamento.php");
   
	$obj = new ritrovamento();

	$records= $obj->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
     if($obj->fetchNumRows() == 0){
         $_SESSION["ritrovamento2"] = "N";
    }
    else {
        $_POST["ritrovamento_organicoB"] = $records['mat_organico_bocca'];
        $_POST["ritrovamento_tipoB"] = $records['specifica_mat_organico_bocca'];
        $_POST["ritrovamento_organicoN"] = $records['mat_organico_naso'];
        $_POST["ritrovamento_tipoN"] = $records['specifica_mat_organico_naso'];
        $_POST["ritrovamento_organicoP"] = $records['mat_organico_pannolino'];
        $_POST["ritrovamento_tipoP"] = $records['specifica_mat_organico_pannolino'];
        $_POST["ritrovamento_aspetto"] = $records['aspetto_bambino'];
        $_POST["ritrovamento_specAspetto"] = $records['specifica_aspetto_bambino'];
        $_POST["ritrovamento_note"] = $records['specifica_note_aspetto'];
        
        $_SESSION["ritrovamento2"] = "Y";
    }
    }							       
?>