    <?php
session_start();
include_once("databases.php");
include_once("info_morte_fetale.php");
require_once("loadtab_esamimf.php");
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
	  break;
   }
}

function invia($i){
    echo "invia";
$insert_data = array();
$insert_data["idindagini"] = $_SESSION['case_id'];

if((isset($_POST['biopsia'])) && (!empty($_POST['biopsia']))){
	$insert_data["biopsia_villocoriale"] = $_POST['biopsia'];
}
else {
}
if(($_POST['biopsia'] == 'patologico') && (isset($_POST['specB'])) && (!empty($_POST['specB']))){
	$insert_data["specifica_patologico_biopsia_villocoriale"] = $_POST['specB'];
}
else {
}
if((isset($_POST['amnio'])) && (!empty($_POST['amnio']))){
	$insert_data["amniocentesi"] = $_POST['amnio'];
}
else {
}
if(($_POST['amnio'] == 'patologico') && (isset($_POST['specA'])) && (!empty($_POST['specA']))){
	$insert_data["specifica_patologico_amniocentesi"] = $_POST['specA'];
}
else {
}
if((isset($_POST['funicolo'])) && (!empty($_POST['funicolo']))){
	$insert_data["funicolocentesi"] = $_POST['funicolo'];
}
else {
}
if(($_POST['funicolo'] == 'patologico') && (isset($_POST['specF'])) && (!empty($_POST['specF']))){
	$insert_data["specifica_patologico_funicolocentesi"] = $_POST['specF'];
}
else {
}
if((isset($_POST['fetosc'])) && (!empty($_POST['fetosc']))){
	$insert_data["fetoscopia"] = $_POST['fetosc'];
}
else {
}
if(($_POST['fetosc'] == 'patologico') && (isset($_POST['specFS'])) && (!empty($_POST['specFS']))){
	$insert_data["specifica_patologico_fetoscopia"] = $_POST['specFS'];
}
else {
}

	$obj = new info_morte_fetale();
	$condition= array("madre_schede_id" => $_SESSION['case_id']);
	$obj->update($insert_data,$condition);
	var_dump($insert_data);
	$obj->error();
    tab_esamimf();
    loadmenu_feto();
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
    $insert_log["operazione"] = $scritta." tab indagini prenatali";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
	if($i == 'succ'){
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=esami&tipo=feto&tab=11");
	}
	else {
		header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=feto&tab=7");
	}
    $_SESSION["morte_fetale2"] = "Y";
}

function back(){
	echo "ahahahaha";
	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=feto&tab=7");
}		       
?>