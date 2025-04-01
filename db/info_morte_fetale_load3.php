<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/info_morte_fetale.php");

	$obj = new info_morte_fetale();

	$records= $obj->fetchRecord(array("madre_schede_id"=>$_SESSION['case_id']));
	
    
    if($records['idecografia'] === null){
        $_SESSION["morte_fetale3"] = "N";
    }
    else {
        $_POST["morte_fetale_ecografia"] = $records['ecografia'];
        $_POST["morte_fetale_malfoF"] = $records['malformazioni_fetali'];
        $_POST["morte_fetale_placenta"] = $records['placenta'];
        $_POST["morte_fetale_malfoU"] = $records['malformazioni_utero'];
        $_POST["morte_fetale_specU"] = $records['specifica_malformazioni_utero'];

        $_SESSION["morte_fetale3"] = "Y";

    }
    

    }							       
?>