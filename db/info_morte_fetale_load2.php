<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/info_morte_fetale.php");

	$obj = new info_morte_fetale();

	$records= $obj->fetchRecord(array("madre_schede_id"=>$_SESSION['case_id']));
    
    if($records['idindagini'] === null){
        $_SESSION["morte_fetale2"] = "N";
    }
    else {
        $_POST["morte_fetale_biopsia"] = $records['biopsia_villocoriale'];
        $_POST["morte_fetale_specB"] = $records['specifica_patologico_biopsia_villocoriale'];
        $_POST["morte_fetale_amniocentesi"] = $records['amniocentesi'];
        $_POST["morte_fetale_specA"] = $records['specifica_patologico_amniocentesi'];
        $_POST["morte_fetale_funicolocentesi"] = $records['funicolocentesi'];
        $_POST["morte_fetale_specF"] = $records['specifica_patologico_funicolocentesi'];
        $_POST["morte_fetale_fetoscopia"] = $records['fetoscopia'];
        $_POST["morte_fetale_specFS"] = $records['specifica_patologico_fetoscopia'];

        $_SESSION["morte_fetale2"] = "Y";
    }
    

    }							       
?>