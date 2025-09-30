<?php
function loadPage() {
	
	require_once("./db/databases.php");
    require_once("./db/info_morte_fetale.php");
    require_once("./db/dati_pers.php");
   
    $obx = new dati_pers();
    
    $recordz= $obx->fetchRecord(array("schede_id"=>$_SESSION['case_id'],'tipo' => 'MADRE'));
    
  $_POST["data_nascita"] = $recordz['data_nascita'];
    
    require_once("./db/dati_feto.php");

	$oby = new dati_feto();

	$recordy= $oby->fetchRecord(array("schede_id"=>$_SESSION['case_id']));

  $_POST["data_morte"] = $recordy['data_morte'];
  
    

  

	$obj = new info_morte_fetale();

	$records= $obj->fetchRecord(array("madre_schede_id"=>$_SESSION['case_id']));

    	
    if($obj->fetchNumRows() == 0){
         $_SESSION["morte_fetale"] = "N";
    }
    else {
	    $_POST["morte_fetale_dataU"] = $records['data_ultima_mestruazione'];
        $_POST["morte_fetale_dataA"] = $records['data_presunta_parto_anamnestico'];
        $_POST["morte_fetale_dataE"] = $records['data_presunta_parto_ecografico'];
        $_POST["morte_fetale_num"] = $records['num_visite_controllo_in_gravidanza'];
        
        $_POST["morte_fetale_dataO"] = $records['ultima_visita_ostetrica'];
        $_POST["morte_fetale_ginecologo"] = $records['ginecologo_curante'];
        $_POST["morte_fetale_ostetrica"] = $records['ostetrica'];
        $_POST["morte_fetale_fecondazione"] = $records['fecondazione'];
        $_POST["morte_fetale_dataF"] = $records['dataF'];
        $_POST["morte_fetale_struttura"] = $records['struttura'];
        $_POST["morte_fetale_endouterina"] = $records['inseminazione_endouterina'];
        $_POST["morte_fetale_vitro"] = $records['fecondazione_in_vitro'];
        $_POST["morte_fetale_intracitoplasmatica"] = $records['intracitoplasmatica'];
        $_POST["morte_fetale_gameti"] = $records['gameti'];
        $_POST["morte_fetale_altre"] = $records['specifica_altre'];
        $_POST["morte_fetale_ovulazione"] = $records['ovulazione_indotta'];
        $_POST["morte_fetale_omologa"] = $records['omologa'];
        $_POST["morte_fetale_eterologa"] = $records['eterologa'];
        $_POST["morte_fetale_embriodonazione"] = $records['embriodonazione'];
        $_POST["morte_fetale_fresco"] = $records['a_fresco'];
        $_POST["morte_fetale_crioconservazione"] = $records['crioconservazione'];
        $_POST["morte_fetale_preimpianto"] = $records['test_preimpianto'];  
        
        
        $_POST["morte_fetale_tentativiFecondazione"] = $records['tentativiFecondazione'];
        
        $_POST["morte_fetale_dataCaso1"] = $records['dataCaso1'];
        $_POST["morte_fetale_dataCaso2"] = $records['dataCaso2'];
        $_POST["morte_fetale_dataCaso3"] = $records['dataCaso3'];
        $_POST["morte_fetale_dataCaso4"] = $records['dataCaso4'];
        $_POST["morte_fetale_dataCaso5"] = $records['dataCaso5'];
        
        $_POST["morte_fetale_descriviCaso1"] = $records['descriviCaso1'];
        $_POST["morte_fetale_descriviCaso2"] = $records['descriviCaso2'];
        $_POST["morte_fetale_descriviCaso3"] = $records['descriviCaso3'];
        $_POST["morte_fetale_descriviCaso4"] = $records['descriviCaso4'];
        $_POST["morte_fetale_descriviCaso5"] = $records['descriviCaso5'];



		$_SESSION["morte_fetale"] = "Y";
        
    }
    

    }							       
?>