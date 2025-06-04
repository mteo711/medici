<?php
function loadPage() {
	require_once("./db/databases.php");
    require_once("./db/fratelli.php");

	$obj = new fratelli();

	// in questo caso possono essere restituite pi˘ righe -- si usa il comando fetch
	$records= $obj->fetchRecord(array("patologie_gest_madre_schede_id"=>$_SESSION['case_id']));
    
    // non si fa alcun controllo che venga restituita almeno una righa	
     if($obj->fetchNumRows() == 0){
         $_SESSION["fratelli"] = "N";
         $_SESSION["fratelliF"] = "N";
    }
    else {	
         $_POST["fratelli_dataU"] = $records['data_ultimo_parto_precedente'];
         $_POST["fratelli_sorelle"] = $records['fratelli_sorelle'];

         //fratello 1
         $_POST["fratelli_dataN1"] = $records['dataN1'];
         $_POST["fratelli_vivo1"] = $records['vivo1'];        
         $_POST["fratelli_mesiM1"] = $records['mesiM1'];
         $_POST["fratelli_anniM1"] = $records['anniM1'];
         $_POST["fratelli_causaM1"] = $records['causaM1'];
         $_POST["fratelli_ereditarieM1"] = $records['ereditarieM1'];
         $_POST["fratelli_geneticheM1"] = $records['geneticheM1'];
         $_POST["fratelli_dismetabolicheM1"] = $records['dismetabolicheM1'];
         $_POST["fratelli_altroM1"] = $records['altroM1'];       
         
         //fratello 2                    
         $_POST["fratelli_dataN2"] = $records['dataN2'];
         $_POST["fratelli_vivo2"] = $records['vivo2'];
         $_POST["fratelli_mesiM2"] = $records['mesiM2'];
         $_POST["fratelli_anniM2"] = $records['anniM2'];
         $_POST["fratelli_causaM2"] = $records['causaM2'];
          $_POST["fratelli_ereditarieM2"] = $records['ereditarieM2'];
         $_POST["fratelli_geneticheM2"] = $records['geneticheM2'];
         $_POST["fratelli_dismetabolicheM2"] = $records['dismetabolicheM2'];
         $_POST["fratelli_altroM2"] = $records['altroM2'];

         //fratello 3
         $_POST["fratelli_dataN3"] = $records['dataN3'];
         $_POST["fratelli_vivo3"] = $records['vivo3'];
         $_POST["fratelli_mesiM3"] = $records['mesiM3'];
         $_POST["fratelli_anniM3"] = $records['anniM3'];
         $_POST["fratelli_causaM3"] = $records['causaM3'];
           $_POST["fratelli_ereditarieM3"] = $records['ereditarieM3'];
         $_POST["fratelli_geneticheM3"] = $records['geneticheM3'];
         $_POST["fratelli_dismetabolicheM3"] = $records['dismetabolicheM3'];
         $_POST["fratelli_altroM3"] = $records['altroM3'];

         //fratello 4
         $_POST["fratelli_dataN4"] = $records['dataN4'];
          $_POST["fratelli_vivo4"] = $records['vivo4'];
         $_POST["fratelli_mesiM4"] = $records['mesiM4'];
         $_POST["fratelli_anniM4"] = $records['anniM4'];
         $_POST["fratelli_causaM4"] = $records['causaM4'];
          $_POST["fratelli_ereditarieM4"] = $records['ereditarieM4'];
         $_POST["fratelli_geneticheM4"] = $records['geneticheM4'];
         $_POST["fratelli_dismetabolicheM4"] = $records['dismetabolicheM4'];
         $_POST["fratelli_altroM4"] = $records['altroM4'];

         //fratello 5
         $_POST["fratelli_dataN5"] = $records['dataN5'];
          $_POST["fratelli_vivo5"] = $records['vivo5'];
         $_POST["fratelli_mesiM5"] = $records['mesiM5'];
         $_POST["fratelli_anniM5"] = $records['anniM5'];
         $_POST["fratelli_causaM5"] = $records['causaM5'];
          $_POST["fratelli_ereditarieM5"] = $records['ereditarieM5'];
         $_POST["fratelli_geneticheM5"] = $records['geneticheM5'];
         $_POST["fratelli_dismetabolicheM5"] = $records['dismetabolicheM5'];
         $_POST["fratelli_altroM5"] = $records['altroM5'];



        $_SESSION["fratelli"] = "Y";
         $_SESSION["fratelliF"] = "Y";
    }

}							       
?>