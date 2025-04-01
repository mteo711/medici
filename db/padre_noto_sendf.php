<?php
session_start();
include_once("databases.php");
include_once("padre.php");
include_once("dati_pers.php");
require_once("loadtab_padref.php");
require_once("loadmenu_feto.php");
include_once("log_activities.php");
if($_POST && array_key_exists("action", $_POST)){
  switch($_POST['action'])
   {
	  case "succ":
		invia('succ');
	  break;
	  case "succ_b":
	  	invia('succ_b');
	  break;
	  case "back":
		back();
	  break;
   }
}

function invia($j){
echo "inizio";
$insert_data = array();
$insert_data["schede_id"] = $_SESSION['case_id'];
$no = "";

if((isset($_POST['noto'])) && (!empty($_POST['noto']))){
    $insert_data["noto"] = $_POST['noto'];
}
else {
    $no = "err";
}


//
if(($_SESSION["padre_notoF"] != "Y")) {
	echo "insert";
    //creo la connessione con il database
    
    $objj = new padre();
    // a questo punto posso effettuare la seguente insert
    $objj->insert($insert_data);
    var_dump($insert_data);
    $objj->error();
    
    //log
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = "Inserimento";
    $insert_log["operazione"] = "Inserimento tab padre noto";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    if($_POST['noto']=='Y'){
//    require_once("../comuni/loadtab_padre.php");
    tab_padref();
    loadmenu_feto();
    if($j == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=feto&tab=1");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=esami&tipo=feto&tab=12");
    }
    }
    else if($_POST['noto']=='N'){
    if($j == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=consenso&tipo=feto&tab=40");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=esami&tipo=feto&tab=12");
    }
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=feto&tab=0");
    }
    $_SESSION["padre_notoF"] = "Y";
}
else {
	echo "update";
    $obj = new padre();
    $condition= array("schede_id" => $_SESSION['case_id']);
    $obj->update($insert_data,$condition);
    var_dump($insert_data);
    $obj->error();
    
    $records= $obj->fetchRecord(array("schede_id"=>$_SESSION['case_id']));
    
    //log
    $scritta = "";
    if (($_SESSION["stato"] == 'chiusa') || ($_SESSION["stato"] == 'chiusa_usr')){
        $scritta = "Consultazione";
    }
    else {
        $scritta = "Update";
    }
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = $scritta;
    $insert_log["operazione"] = $scritta." tab padre noto";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    if(($_POST['noto']=='Y') || ($records['noto'])=='Y'){
//    require_once("../comuni/loadtab_padre.php");
    tab_padref();
    loadmenu_feto();
    if($j == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=feto&tab=1");
    }
    else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=esami&tipo=feto&tab=12");
    }
    }
    else if(($_POST['noto']=='N') || ($records['noto'])=='N'){
    if($j == 'succ'){
        echo "no".$no;
        echo "cancelrow";
        $obj = new padre();
        $condition= array("schede_id" => $_SESSION['case_id']);
        $obj->cancelRow($condition);
        $obj->error();
        
        $objd = new dati_pers();
        $conditiond= array("schede_id" => $_SESSION['case_id'], "tipo" => 'PADRE');
        $objd->cancelRow($conditiond);
        $objd->error();
        
        $obj->insert($insert_data);
        var_dump($insert_data);
        $obj->error();
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=consenso&tipo=feto&tab=40");
    }
    else {
        echo "no".$no;
        echo "cancelrow";
        $obj = new padre();
        $condition= array("schede_id" => $_SESSION['case_id']);
        $obj->cancelRow($condition);
        $obj->error();
        
        $objd = new dati_pers();
        $conditiond= array("schede_id" => $_SESSION['case_id'], "tipo" => 'PADRE');
        $objd->cancelRow($conditiond);
        $objd->error();
        
        $obj->insert($insert_data);
        var_dump($insert_data);
        $obj->error();
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=esami&tipo=feto&tab=12");
    }
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=feto&tab=0");
    }
}
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=esami&tipo=feto&tab=12");
}					       
?>