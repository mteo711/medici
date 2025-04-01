<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/dati_feto.php");

	$obj = new dati_feto();

	$records= $obj->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

    	
    if($obj->fetchNumRows() == 0){
       $_SESSION["dati_feto"] = "N";
    }
    else {
	     $_POST["dati_feto_cognome"] = $records['cognome'];
         $_POST["dati_feto_nome"] = $records['nome'];
         $_POST["dati_feto_via"] = $records['via'];
         $_POST["dati_feto_cap"] = $records['cap'];
         $_POST["dati_feto_comune"] = $records['comune'];
         $_POST["dati_feto_prov"] = $records['provincia'];
         $_POST["dati_feto_dataU"] = $records['data_ultimo_controllo'];
         $_POST["dati_feto_dataM"] = $records['data_morte'];
         $_POST["dati_feto_eta"] = $records['eta_settimana_gestazione'];
         $_POST["dati_feto_sex"] = $records['sesso'];

        $_SESSION["dati_feto"] = "Y";
    }

    }							       
?>