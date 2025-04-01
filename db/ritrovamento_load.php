<?php
function loadPage() {
	require_once("./db/databases.php");
    require_once("./db/ritrovamento.php");
    require_once("./db/ritrovamento_ospedale.php");
    require_once("./db/ritrovamento_casa.php");
	require_once("./db/ritrovamento_fuori_casa.php");
	

	$obj = new ritrovamento();

	$records= $obj->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
     if($obj->fetchNumRows() == 0){
         $_SESSION["ritrovamento"] = "N";
    }
    else {
	    $_POST["ritrovamento_luogo_morte"] = $records['luogo_morte'];
        $_POST["ritrovamento_posizione_sdraiato"] = $records['posizione_se_sdraiato'];
        $_POST["ritrovamento_spec_sdraiato"] = $records['specifica_posizione_se_sdraiato'];
        $_POST["ritrovamento_abbigliamento"] = $records['abbigliamento_indossato'];
        $_POST["ritrovamento_cuscino"] = $records['cuscino'];
        $_POST["ritrovamento_succhiotto"] = $records['succhiotto'];
        $_POST["ritrovamento_catenine"] = $records['catenine_al_collo'];
        $_POST["ritrovamento_giochi"] = $records['oggetti_nel_lettino'];
        $_POST["ritrovamento_materasso"] = $records['consistenza_materasso'];
        $_POST["ritrovamento_rianimazione"] = $records['tentativo_di_rianimazione'];
        $_POST["ritrovamento_specRiani"] = $records['specifica_tentativo_di_rianimazione'];
        
        $_SESSION["ritrovamento"] = "Y";
        
    }
	
	$objj = new ritrovamento_ospedale();

	$recordso= $objj->fetchRecord(array("ritrovamento_schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
     if($objj->fetchNumRows() == 0){
    }
    else {
        if($_SESSION['stato']=='chiusa')
            $_POST["ritrovamento_nome_ospedale"] = "****";
        else
            $_POST["ritrovamento_nome_ospedale"] = $recordso['nome_ospedale'];
    }

	$objk = new ritrovamento_casa();

	$recordsc= $objk->fetchRecord(array("ritrovamento_schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
     if($objk->fetchNumRows() == 0){
    }
    else {
        $_POST["ritrovamento_luogo_casa"] = $recordsc['luogo_morte_specifico'];
        $_POST["ritrovamento_specAC"] = $recordsc['specifica_altro_abitazione'];
        $_POST["ritrovamento_tempS"] = $recordsc['temperatura_stanza_ritrovamento'];
        $_POST["ritrovamento_tempB"] = $recordsc['temperatura_bambino'];
    }
    
	
	$objl = new ritrovamento_fuori_casa();

	$recordsf= $objl->fetchRecord(array("ritrovamento_schede_id"=>$_SESSION['case_id']));

    // non si fa alcun controllo che venga restituita almeno una righa	
     if($objl->fetchNumRows() == 0){
    }
    else {
        $_POST["ritrovamento_luogo_spec"] = $recordsf['luogo_morte_specifico'];
        $_POST["ritrovamento_specA"] = $recordsf['specifica_altro_luogo'];
    }
    
}		
    					       
?>