<?php
session_start();
include_once("databases.php");
include_once("padre.php");
include_once("consenso.php");
include_once("schede.php");
require_once("loadtab_padref.php");
require_once("loadtab_autopsiaf.php");
require_once("loadtab_consenso.php");
require_once("loadmenu_feto.php");
include_once("log_activities.php");
require_once("utils.php");

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
echo "ini";

function invia($i){
echo "inizio <br/>";
$insert_scheda= array();
$insert_scheda["id"] = $_SESSION['case_id'];

$insert_data = array();
$insert_data["id_scheda"] = $_SESSION['case_id'];
$insert_data["id"] = 1;

$insert_data1 = array();
$insert_data1["id_scheda"] = $_SESSION['case_id'];
$insert_data1["id"] = 2;
    
    
$insert_data2 = array();
$insert_data2["id_scheda"] = $_SESSION['case_id'];
$insert_data2["id"] = 3;
    
if((isset($_POST['riscontro'])) && (!empty($_POST['riscontro']))){
	$insert_scheda["consenso_diag"] = $_POST["riscontro"];
}
else {
}
if(($_POST['riscontro'] == 'Y') && (isset($_FILES['riscontroDoc']['name'])) && (!empty($_FILES['riscontroDoc']['name']))){
    
    $nFile1 = generateRandomString();
    
    $target = "../consenso_doc/";  
    $target = $target . basename( $_FILES['riscontroDoc']['name']);
    $temp = explode(".", $_FILES["riscontroDoc"]["name"]);
    $newfilename = "../consenso_doc/" . $nFile1 . '.' . end($temp);
    $pic = $nFile1. '.' . end($temp);
    echo $newfilename;
    //Writes the photo to the server  
    if(move_uploaded_file($_FILES['riscontroDoc']['tmp_name'], $newfilename))  {   
        //Tells you if its all ok  
        echo "The file has been uploaded, and your information has been added to the directory";  
        $insert_data["name"] = $pic;
    }  
    else {   
        //Gives and error if its not  
        echo "Sorry, there was a problem uploading your file.";  
    } 
    
}
else{
}
    
if((isset($_POST['genetiche'])) && (!empty($_POST['genetiche']))){
	$insert_scheda["consenso_analisi_gen"] = $_POST["genetiche"];
}
else {
}
if(($_POST['genetiche'] == 'Y') && (isset($_FILES['geneticheDoc']['name'])) && (!empty($_FILES['geneticheDoc']['name']))){
    
    $nFile2 = generateRandomString();
    
    $target = "../consenso_doc/";  
    $target = $target . basename( $_FILES['geneticheDoc']['name']);
    $temp = explode(".", $_FILES["geneticheDoc"]["name"]);
    $newfilename = "../consenso_doc/" . $nFile2 . '.' . end($temp);
    $pic = $nFile2. '.' . end($temp);
    //echo $newfilename;
    //Writes the photo to the server  
    if(move_uploaded_file($_FILES['geneticheDoc']['tmp_name'], $newfilename))  {   
        //Tells you if its all ok  
        echo "The file has been uploaded, and your information has been added to the directory";
        $insert_data1["name"] = $pic;
    }  
    else {   
        //Gives and error if its not  
        echo "Sorry, there was a problem uploading your file.";  
    }
    
}
else{
}
    
if((isset($_POST['tossicologiche'])) && (!empty($_POST['tossicologiche']))){
	$insert_scheda["consenso_analisi_toss"] = $_POST["tossicologiche"];
}
else {
}
if(($_POST['tossicologiche'] == 'Y') && (isset($_FILES['tossicologicheDoc']['name'])) && (!empty($_FILES['tossicologicheDoc']['name']))){
    echo "upload tossicologiche";
    
    $nFile3 = generateRandomString();
    
    $target = "../consenso_doc/";  
    $target = $target . basename( $_FILES['tossicologicheDoc']['name']);
    $temp = explode(".", $_FILES["tossicologicheDoc"]["name"]);
    $newfilename = "../consenso_doc/" . $nFile3 . '.' . end($temp);
    $pic = $nFile3. '.' . end($temp);
    //echo $newfilename;
    //Writes the photo to the server  
    if(move_uploaded_file($_FILES['tossicologicheDoc']['tmp_name'], $newfilename))  {   
        //Tells you if its all ok  
        echo "The file has been uploaded, and your information has been added to the directory"; 
        $insert_data2["name"] = $pic;
    }  
    else {   
        //Gives and error if its not  
        echo "Sorry, there was a problem uploading your file.";  
    } 
    
}
else{
}
echo "qui";
    

if($_SESSION["consenso_sids"] != "Y"){
    
    $obj = new schede();
    $condition= array("id" => $_SESSION['case_id']);
    $obj->update($insert_scheda,$condition);
    $obj->error();

    $objj = new consenso();
    // a questo punto posso effettuare la seguente insert
    $objj->insert($insert_data);
    var_dump($insert_data);
    $objj->error();

    $objj->insert($insert_data1);
    var_dump($insert_data);
    $objj->error();

    $objj->insert($insert_data2);
    var_dump($insert_data);
    $objj->error();
    
    $objp = new padre();
    $records= $objp->fetchRecord(array("schede_id"=>$_SESSION['case_id']));
    
    //log
    $scritta = "";
    if (($_SESSION["stato"] == 'chiusa') || ($_SESSION["stato"] == 'chiusa_usr')){
        $scritta = "Consultazione";
    }
    else {
        $scritta = "Inserimento";
    }
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = $scritta;
    $insert_log["operazione"] = $scritta." tab consenso";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    tab_padref();
    tab_autopsiaf();
    tab_consenso();
    loadmenu_feto();
    if($records['noto'] == 'Y'){
        if($i == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=0");
    }
        else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=feto&tab=5");
    }
    }
    else if(($records['noto'] == 'N') || $records['noto'] == null){
        if($i == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=0");
    }
        else {
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=feto&tab=0");
    }
    }
    
    $_SESSION["consenso_sids"] = "Y";
}
else {
	echo "update";
    $objs = new schede();
    $condition= array("id" => $_SESSION['case_id']);
    $objs->update($insert_scheda,$condition);
    var_dump($insert_scheda);
    $objs->error();
    
    $obj = new consenso();
    $condition1= array("id_scheda" => $_SESSION['case_id'],  "id" => 1);
    $condition2= array("id_scheda" => $_SESSION['case_id'],  "id" => 2);
    $condition3= array("id_scheda" => $_SESSION['case_id'],  "id" => 3);
    $obj->update($insert_data,$condition1);
    $obj->update($insert_data1,$condition2);
    $obj->update($insert_data2,$condition3);
    //var_dump($insert_data);
    $obj->error();
    
    $objp = new padre();
    $records= $objp->fetchRecord(array("schede_id"=>$_SESSION['case_id']));
    
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
    $insert_log["operazione"] = $scritta." tab consenso";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
    tab_padref();
    tab_autopsiaf();
    tab_consenso();
    loadmenu_feto();
    if($records['noto'] == 'Y'){
        if($i == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=0");
    }
        else {
            echo "NOTO:  ".$records['noto'];
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=feto&tab=5");
    }
    }
    else if(($records['noto'] == 'N') || $records['noto'] == null){
        if($i == 'succ'){
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=feto&tab=0");
    }
        else {
        echo "NOTO:  ".$records['noto'];
    	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=padre&tipo=feto&tab=0");
    }
    }

}
}

function back(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=exam&tipo=sids&tab=16");

}					       
?>