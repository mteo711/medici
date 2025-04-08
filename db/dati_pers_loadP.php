<?php
function loadPage() {
    require_once("./db/databases.php");
    require_once("./db/dati_pers.php");
	
	$obj = new dati_pers();

	$records= $obj->fetchRecord(array("schede_id"=>$_SESSION['case_id'],'tipo' => 'PADRE'));

	
    if($obj->fetchNumRows() == 0){
      $_SESSION["dati_pers"] = "N";
      $_SESSION["dati_persF"] = "N";
    }
    else {
        $_POST["dati_pers_cognome"] = $records['cognome'];
        $_POST["dati_pers_nome"] = $records['nome'];
        $_POST["dati_pers_dataN"] = $records['data_nascita'];
        $_POST["dati_pers_luogoN"] = $records['luogo_nascita'];
        $_POST["dati_pers_eta"] = $records['eta'];
        $_POST["dati_pers_via"] = $records['via'];
        $_POST["dati_pers_cap"] = $records['cap'];
        $_POST["dati_pers_comune"] = $records['comune'];
        $_POST["dati_pers_prov"] = $records['provincia'];
        $_POST["dati_pers_etnia"] = $records['etnia'];
        $_POST["dati_pers_specE"] = $records['specifica_etnia'];
        $_POST["dati_pers_professione"] = $records['professione'];
        $_POST["dati_pers_cell"] = $records['cell'];
        $_POST["dati_pers_codfiscale"] = $records['codice_fiscale'];
        $_POST["dati_pers_rischi"] = $records['rischi'];
        $_POST["dati_pers_titolodistudio"] = $records['titolo_studio'];
        $_POST["dati_pers_statocivile"] = $records['stato_civile'];
        $_POST["dati_pers_altezza"] = $records['altezza'];
        $_POST["dati_pers_peso"] = $records['peso'];


        $_SESSION["dati_pers"] = "Y";
		$_SESSION["dati_persF"] = "Y";
        
    }
    

    }							       
?>
