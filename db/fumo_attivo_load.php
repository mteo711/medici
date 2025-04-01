<?php
function loadPage() {
	require_once("./db/databases.php");
    require_once("./db/fumo_attivo.php");

	$obj = new fumo_attivo();

	$records= $obj->fetchRecord(array("madre_schede_id"=>$_SESSION['case_id']));

    	
    if($obj->fetchNumRows() == 0){
        $_SESSION["fumo_attivo"] = "N";
		$_SESSION["fumo_attivoF"] = "N";
    }
    else {
        $_POST["fumo_att_prima"] = $records['prima_del_concepimento'];
        $_POST["fumo_att_primaA"] = $records['da_anni'];
        $_POST["fumo_att_primaN"] = $records['num_sigarette_per_giornoA'];
        $_POST["fumo_att_durante"] = $records['durante_gravidanza'];
        $_POST["fumo_att_duranteA"] = $records['fino_a_settimana'];
        $_POST["fumo_att_duranteN"] = $records['num_sigarette_per_giornoB'];
        $_POST["fumo_att_dopo"] = $records['post_parto'];
        $_POST["fumo_att_dopoA"] = $records['fino_a_eta_bambini_in_giorni'];
        $_POST["fumo_att_dopoN"] = $records['num_sigarette_per_giornoC'];
        $_POST["fumo_att_elettronica"] = $records['sigaretta_elettronica'];
        $_POST["fumo_att_specE"] = $records['spec_sigaretta_elettronica'];
        
		$_SESSION["fumo_attivo"] = "Y";
        $_SESSION["fumo_attivoF"] = "Y";
        
    }
    }							       
?>