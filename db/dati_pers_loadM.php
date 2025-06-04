<?php
function loadPage() {
    require_once("./db/databases.php");
    require_once("./db/dati_pers.php");
	
	$obj = new dati_pers();
	$records= $obj->fetchRecord(array("schede_id"=>$_SESSION['case_id'],'tipo' => 'MADRE'));
  

	
    if($obj->fetchNumRows() == 0){
      $_SESSION["dati_pers"] = "N";
      $_SESSION["dati_persF"] = "N";
    } 
    else {
	    if($_SESSION['stato']=='chiusa'){
            $_POST["dati_pers_cognome"] = "****";
            $_POST["dati_pers_nome"] = "****";
            $_POST["dati_pers_dataN"] = "****-**-**";
            $_POST["dati_pers_luogoN"] = "****";
            $_POST["dati_pers_eta"] = $records['eta'];
            $_POST["dati_pers_via"] = "****";
            $_POST["dati_pers_cap"] = "****";
            $_POST["dati_pers_comune"] = $records['comune'];
            $_POST["dati_pers_prov"] = $records['provincia'];
            $_POST["dati_pers_etnia"] = $records['etnia'];
            $_POST["dati_pers_specE"] = $records['specifica_etnia'];
            $_POST["dati_pers_professione"] = $records['professione'];
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
            $_POST["dati_pers_specM"] = $records['specifica_matrimonio'];
            $_POST["dati_pers_altezza"] = $records['altezza'];
            $_POST["dati_pers_peso"] = $records['peso'];
            $_POST["dati_pers_morteFeto"] = $records['morte_feto'];
            $_POST["dati_pers_ultimoAvv"] = $records['ultimo_avvistamento'];

            $_POST["dati_pers_numVisite"] = $records['num_visite'];

             $_POST["dati_pers_fecondazione"] = $records['fecondazione'];
        $_POST["dati_pers_dataF"] = $records['dataF'];
        $_POST["dati_pers_struttura"] = $records['struttura'];
        $_POST["dati_pers_endouterina"] = $records['inseminazione_endouterina'];
        $_POST["dati_pers_vitro"] = $records['fecondazione_in_vitro'];
        $_POST["dati_pers_intracitoplasmatica"] = $records['intracitoplasmatica'];
        $_POST["dati_pers_gameti"] = $records['gameti'];
        $_POST["dati_pers_altre"] = $records['specifica_altre'];
        $_POST["dati_pers_ovulazione"] = $records['ovulazione_indotta'];
        $_POST["dati_pers_omologa"] = $records['omologa'];
        $_POST["dati_pers_eterologa"] = $records['eterologa'];
        $_POST["dati_pers_embriodonazione"] = $records['embriodonazione'];
        $_POST["dati_pers_fresco"] = $records['a_fresco'];
        $_POST["dati_pers_crioconservazione"] = $records['crioconservazione'];
        $_POST["dati_pers_preimpianto"] = $records['test_preimpianto'];   
        }

        $_SESSION["dati_pers"] = "Y";
        $_SESSION["dati_persF"] = "Y";
    }
    

    }							       
?>