<?php
function loadPage() {
	
    require_once("./db/databases.php");
    require_once("./db/dati_sids.php");

	$obj = new dati_sids();

	$records= $obj->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

    	
    if($obj->fetchNumRows() == 0){
        $_SESSION["dati_sids"] = "N";
    }
    else {
        if($_SESSION['stato']=='chiusa'){
            $_POST["dati_sids_cognome"] = '****';
            $_POST["dati_sids_nome"] = '****';
            $_POST["dati_sids_via"] = '****';
            $_POST["dati_sids_cap"] = '****';
            $_POST["dati_sids_comune"] = $records["comune"];
            $_POST["dati_sids_prov"] = $records["provincia"];
            $_POST["dati_sids_dataN"] = '****-**-**';
            $_POST["dati_sids_dataM"] = '****-**-**';
            $_POST["dati_sids_etaGest"] = $records["eta_gestazionale"];
            $_POST["dati_sids_etaPostNat"] = $records["eta_postnatale"];
            $_POST["dati_sids_etaPostCon"] = $records["eta_postconcezionale"];
            $_POST["dati_sids_oraD"] = "**:**:**";
            $_POST["dati_sids_oraC"] = "**:**:**";
            $_POST["dati_sids_sex"] = $records["sesso"];
        }
        else{
            $_POST["dati_sids_cognome"] = $records["cognome"];
            $_POST["dati_sids_nome"] = $records["nome"];
            $_POST["dati_sids_via"] = $records["via"];
            $_POST["dati_sids_cap"] = $records["cap"];
            $_POST["dati_sids_comune"] = $records["comune"];
            $_POST["dati_sids_prov"] = $records["provincia"];
            $_POST["dati_sids_dataN"] = $records["data_nascita"];
            $_POST["dati_sids_dataM"] = $records["data_morte"];
            $_POST["dati_sids_etaGest"] = $records["eta_gestazionale"];
            $_POST["dati_sids_etaPostNat"] = $records["eta_postnatale"];
            $_POST["dati_sids_etaPostCon"] = $records["eta_postconcezionale"];
            $_POST["dati_sids_oraD"] = $records["ora_rilievo_decesso"];
            $_POST["dati_sids_oraC"] = $records["ora_ultimo_controllo_parentale"];
            $_POST["dati_sids_sex"] = $records["sesso"];
            $_POST["dati_sids_skin"] = $records["skin"];
            
        }
        $_SESSION["dati_sids"] = "Y";
    }
    
    }							       
?>