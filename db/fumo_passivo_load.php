<?php
function loadPage() {
	require_once("./db/databases.php");
    require_once("./db/fumo_passivo.php");

	$obj = new fumo_passivo();

	$records= $obj->fetchRecord(array("madre_schede_id"=>$_SESSION['case_id']));

    	
    if($obj->fetchNumRows() == 0){
        $_SESSION["fumo_passivo"] = "N";
		$_SESSION["fumo_passivoF"] = "N";
    }
    else {
        $_POST["fumo_pass_prima"] = $records['prima_del_concepimento'];
        $_POST["fumo_pass_primaA"] = $records['da_anni'];
        $_POST["fumo_pass_primaD"] = $records['luogoA'];
        $_POST["fumo_pass_durante"] = $records['durante_gravidanza'];
        $_POST["fumo_pass_duranteA"] = $records['fino_a_settimana'];
        $_POST["fumo_pass_duranteD"] = $records['luogoB'];
        $_POST["fumo_pass_dopo"] = $records['post_parto'];
        $_POST["fumo_pass_dopoA"] = $records['fino_a_eta_bambino_in_giorni'];
        $_POST["fumo_pass_dopoD"] = $records['luogoC'];
        $_SESSION["fumo_passivo"] = "Y";
        $_SESSION["fumo_passivoF"] = "Y";
    }
    }							       
?>