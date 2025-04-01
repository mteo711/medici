<?php
session_start();
include_once("databases.php");
include_once("ritrovamento.php");
include_once("ritrovamento_ospedale.php");
include_once("ritrovamento_casa.php");
include_once("ritrovamento_fuori_casa.php");
require_once("loadtab_scheda.php");
require_once("loadmenu_sids.php");
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
	  case "succ_u":
	      invia_u('succ');
	  break;
	  case "succ_c":
	      invia_u('succ_b');
	  break;
	  case "succ_v":
	      invia_v('succ');
	  break;
	  case "succ_d":
	      invia_v('succ_b');
	  break;
	  case "back":
	      back();
	  break;
	  case "back_u":
	      back_u();
	  break;
	  case "back_v":
	      back_v();
	  break;
   }
}

//scheda luogo di ritrovamento
function invia($i){
$insert_data = array();
$insert_ospedale = array();
$insert_casa = array();
$insert_fuori = array();

$insert_data["schede_id"] = $_SESSION['case_id'];
$insert_casa["ritrovamento_schede_id"] = $_SESSION['case_id'];
$insert_fuori["ritrovamento_schede_id"] = $_SESSION['case_id'];
$insert_ospedale["ritrovamento_schede_id"] = $_SESSION['case_id'];

if((isset($_POST['luogoM'])) && (!empty($_POST['luogoM']))){
    $insert_data["luogo_morte"] = $_POST['luogoM'];
    if(($_POST['luogoM']=='ospedale') && (isset($_POST['nomeOsp'])) && (!empty($_POST['nomeOsp']))){
        $insert_ospedale["nome_ospedale"] = $_POST['nomeOsp'];
    }
    else if(($_POST['luogoM']=='casa')){
            if((isset($_POST['selDoveCasa'])) && (!empty($_POST['selDoveCasa']))){
                $insert_casa["luogo_morte_specifico"] = $_POST['selDoveCasa'];
            }
            else{
            }
            if((isset($_POST['specDv'])) && (!empty($_POST['specDv']))){
                $insert_casa["specifica_altro_abitazione"] = $_POST['specDv'];
            }
            else{
            }
            if((isset($_POST['tempStanza'])) && (!empty($_POST['tempStanza']))){
                $insert_casa["temperatura_stanza_ritrovamento"] = $_POST['tempStanza'];
            }
            else{
            }
            if((isset($_POST['tempBamb'])) && (!empty($_POST['tempBamb']))){
                $insert_casa["temperatura_bambino"] = $_POST['tempBamb'];
            }
            else{
            }
    }
    if(($_POST['luogoM']=='fuori casa')){
        if((isset($_POST['doveFuo'])) && (!empty($_POST['doveFuo']))){
            $insert_fuori["luogo_morte_specifico"] = $_POST['doveFuo'];
        }
        else{
        }
        if((isset($_POST['specDoveFuo'])) && (!empty($_POST['specDoveFuo']))){
            $insert_fuori["specifica_altro_luogo"] = $_POST['specDoveFuo'];
        }
        else{
        }
    }  
}
else {
}
if((isset($_POST['abbigliamento'])) && (!empty($_POST['abbigliamento']))){
    $insert_data["abbigliamento_indossato"] = $_POST['abbigliamento'];
}
else {
}
if((isset($_POST['sdraiato'])) && (!empty($_POST['sdraiato']))){
    $insert_data["posizione_se_sdraiato"] = $_POST['sdraiato'];
}
else {
}
if((isset($_POST['specPS'])) && (!empty($_POST['specPS']))){
    $insert_data["specifica_posizione_se_sdraiato"] = $_POST['specPS'];
}
else {
}
if((isset($_POST['cuscino'])) && (!empty($_POST['cuscino']))){
    $insert_data["cuscino"] = $_POST['cuscino'];
}
else {
}
if((isset($_POST['succhiotto'])) && (!empty($_POST['succhiotto']))){
    $insert_data["succhiotto"] = $_POST['succhiotto'];
}
else {
}
if((isset($_POST['catenine'])) && (!empty($_POST['catenine']))){
    $insert_data["catenine_al_collo"] = $_POST['catenine'];
}
else {
}
if((isset($_POST['giochi'])) && (!empty($_POST['giochi']))){
    $insert_data["oggetti_nel_lettino"] = $_POST['giochi'];
}
else {
}
if((isset($_POST['materasso'])) && (!empty($_POST['materasso']))){
    $insert_data["consistenza_materasso"] = $_POST['materasso'];
}
else {
}
if((isset($_POST['rianimazione'])) && (!empty($_POST['rianimazione']))){
    $insert_data["tentativo_di_rianimazione"] = $_POST['rianimazione'];
}
else {
}
if((isset($_POST['specRiani'])) && (!empty($_POST['specRiani']))){
    $insert_data["specifica_tentativo_di_rianimazione"] = $_POST['specRiani'];
}
else {
}

echo $_SESSION["ritrovamento"];
if($_SESSION["ritrovamento"] != "Y"){
	echo "insert";
    //creo la connessione con il database
    $obj = new ritrovamento();
    // a questo punto posso effettuare la seguente insert
    
    $obj->insert($insert_data);
    //var_dump($insert_data);
    $obj->error();
    
    $objo = new ritrovamento_ospedale();
    // a questo punto posso effettuare la seguente insert
    $objo->insert($insert_ospedale);
    var_dump($insert_ospedale);
    $objo->error();
    
    $obj = new ritrovamento_casa();
    // a questo punto posso effettuare la seguente insert
    echo "casa";
    $obj->insert($insert_casa);
    var_dump($insert_casa);
    $obj->error();
    
    $objfc = new ritrovamento_fuori_casa();
    // a questo punto posso effettuare la seguente insert

    $objfc->insert($insert_fuori);
    //var_dump($insert_data);
    $objfc->error();
    
    //log
    $insert_log = array();
    $obja = new log_activities();
    $insert_log["utente"] = $_SESSION["username"];
    $insert_log["oggetto"] = "Inserimento";
    $insert_log["operazione"] = "Inserimento tab scena ritrovamento LUOGO";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
    
//    require_once("../comuni/loadtab_scheda.php");
    tab_scheda();
    loadmenu_sids();
    if($i == 'succ'){
        var_dump($insert_data);
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=scena&tipo=sids&tab=41");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=sids&tipo=sids&tab=10");
    }

    $_SESSION["ritrovamento"] = "Y";
}
else {
	echo "update";
    $obj = new ritrovamento();
    $condition= array("schede_id" => $_SESSION['case_id']);
    $condition2= array("ritrovamento_schede_id" => $_SESSION['case_id']);
    $obj->update($insert_data,$condition);
    var_dump($insert_data);
    $obj->error();
    if((isset($_POST['luogoM'])) && (!empty($_POST['luogoM'])) && ($_POST['luogoM'] == 'ospedale')){
        $objo = new ritrovamento_ospedale();
        // a questo punto posso effettuare la seguente insert
        
        $objo->update($insert_ospedale,$condition2);
        var_dump($insert_ospedale);
        $objo->error();
    }
    else if((isset($_POST['luogoM'])) && (!empty($_POST['luogoM'])) && ($_POST['luogoM'] == 'casa')){
        $objca = new ritrovamento_casa();
        // a questo punto posso effettuare la seguente insert
        
        $objca->update($insert_casa,$condition2);
        var_dump($insert_casa);
        $objca->error();
    }
    else if((isset($_POST['luogoM'])) && (!empty($_POST['luogoM'])) && ($_POST['luogoM'] == 'fuori casa')){
        $objfc = new ritrovamento_fuori_casa();
        // a questo punto posso effettuare la seguente insert
        
        $objfc->update($insert_fuori,$condition2);
        //var_dump($insert_data);
        $objfc->error();
    }
    else{
    }
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
    $insert_log["operazione"] = $scritta." tab scena ritrovamento LUOGO";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
//    require_once("../comuni/loadtab_scheda.php");
    tab_scheda();
    loadmenu_sids();
    if($i == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=scena&tipo=sids&tab=41");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=sids&tipo=sids&tab=10");
    }
}
}

//scheda situazione di ritrovamento
function invia_u($t){
$insert_data = array();
$insert_data["idsituazione"] = $_SESSION['case_id'];

if((isset($_POST['organicoB'])) && (!empty($_POST['organicoB']))){
    $insert_data["mat_organico_bocca"] = $_POST['organicoB'];
}
else {
}
if((isset($_POST['matBocca'])) && (!empty($_POST['matBocca']))){
    $insert_data["specifica_mat_organico_bocca"] = $_POST['matBocca'];
}
else {
}
if((isset($_POST['organicoN'])) && (!empty($_POST['organicoN']))){
    $insert_data["mat_organico_naso"] = $_POST['organicoN'];
}
else {
}
if((isset($_POST['matNaso'])) && (!empty($_POST['matNaso']))){
    $insert_data["specifica_mat_organico_naso"] = $_POST['matNaso'];
}
else {
}
if((isset($_POST['organicoP'])) && (!empty($_POST['organicoP']))){
    $insert_data["mat_organico_pannolino"] = $_POST['organicoP'];
}
else {
}
if((isset($_POST['matPanno'])) && (!empty($_POST['matPanno']))){
    $insert_data["specifica_mat_organico_pannolino"] = $_POST['matPanno'];
}
else {
}
if ((isset($_POST['aspetto'])) && (!empty($_POST['aspetto']))){
    $spec_pato_atto = "";
    $spec_pato_atto = implode(",", $_POST['aspetto']);
    $insert_data["aspetto_bambino"] = $spec_pato_atto;
}
else {
}
if((isset($_POST['altriCheck'])) && (!empty($_POST['altriCheck']))){
    $insert_data["specifica_aspetto_bambino"] = $_POST['altriCheck'];
}
else {
}
if((isset($_POST['note'])) && (!empty($_POST['note']))){
    $insert_data["specifica_note_aspetto"] = $_POST['note'];
}
else {
}
    $obj = new ritrovamento();
    $condition= array("schede_id" => $_SESSION['case_id']);
    $obj->update($insert_data,$condition);
    var_dump($insert_data);
    $obj->error();
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
    $insert_log["operazione"] = $scritta." tab scena ritrovamento SITUAZIONE";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
//    require_once("../comuni/loadtab_scheda.php");
    tab_scheda();
    loadmenu_sids();
    if($t == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=scena&tipo=sids&tab=42");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=scena&tipo=sids&tab=40");
    }
}

//scheda ultimi pasti
function invia_v($j){
$insert_data = array();
$insert_data["idpasti"] = $_SESSION['case_id'];

if((isset($_POST['dataS'])) && (!empty($_POST['dataS']))){
    list($day, $month, $year) = explode("-", $_POST['dataS']);
    $ymdS = "$year-$month-$day";
    $insert_data["data_ultimo_pasto"] = $ymdS;
}
else {
}
if((isset($_POST['oraS'])) && (!empty($_POST['oraS']))){
    $insert_data["ora_ultimo_pasto"] = $_POST['oraS'];
}
else {
}
if((isset($_POST['chiPasto'])) && (!empty($_POST['chiPasto']))){
    $insert_data["ultimo_pasto_somministrato_da"] = $_POST['chiPasto'];
}
else {
}
if((isset($_POST['nuovoAlimento'])) && (!empty($_POST['nuovoAlimento']))){
    $insert_data["nuovi_alimenti_ultime_24_ore"] = $_POST['nuovoAlimento'];
}
else {
}
if((isset($_POST['specAlimento'])) && (!empty($_POST['specAlimento']))){
    $insert_data["specifica_nuovi_alimenti_ultime_24_ore"] = $_POST['specAlimento'];
}
else {
}
if((isset($_POST['rilevato'])) && (!empty($_POST['rilevato']))){
    $insert_data["morte_rilevata_da"] = $_POST['rilevato'];
}
else {
}
if((isset($_POST['chiRilevato'])) && (!empty($_POST['chiRilevato']))){
	$insert_data["specifica_morte_rilevata_da"] = $_POST['chiRilevato'];
}
else {
}
if ((isset($_POST['alimenti'])) && (!empty($_POST['alimenti']))){
    $alimenti_24 = "";
    $alimenti_24 = implode(",", $_POST['alimenti']);
    $insert_data["alimenti_24_ore"] = $alimenti_24;
}
else {
}
if((isset($_POST['alimenti'])) && (in_array('materno', $_POST['alimenti'])) && (isset($_POST['LatMat'])) && (!empty($_POST['LatMat']))){
	$insert_data["latte"] = $_POST['LatMat'];
}
else {
}
if((isset($_POST['alimenti'])) && (in_array('polvere', $_POST['alimenti'])) && (isset($_POST['LatPol'])) && (!empty($_POST['LatPol']))){
	$insert_data["polvere"] = $_POST['LatPol'];
}
else {
}
if((isset($_POST['alimenti'])) && (in_array('mucca', $_POST['alimenti'])) && (isset($_POST['LatMuc'])) && (!empty($_POST['LatMuc']))){
	$insert_data["mucca"] = $_POST['LatMuc'];
}
else {
}
if((isset($_POST['alimenti'])) && (in_array('acqua', $_POST['alimenti'])) && (isset($_POST['Acq'])) && (!empty($_POST['Acq']))){
	$insert_data["acqua"] = $_POST['Acq'];
}
else {
}
if((isset($_POST['alimenti'])) && (in_array('liquidi', $_POST['alimenti'])) && (isset($_POST['liquidi'])) && (!empty($_POST['liquidi']))){
	$insert_data["liquidi"] = $_POST['liquidi']; 
}
else {
}
if((isset($_POST['alimenti'])) && (in_array('omogeneizzati', $_POST['alimenti'])) && (isset($_POST['Omo'])) && (!empty($_POST['Omo']))){
	$insert_data["omogeneizzati"] = $_POST['Omo'];
}
else {
}
if((isset($_POST['alimenti'])) && (in_array('altro', $_POST['alimenti'])) && (isset($_POST['altFood'])) && (!empty($_POST['altFood']))){
    $insert_data["specifica_altro_alimenti"] = $_POST['altFood'];
}
else {
}
    $obj = new ritrovamento();
    $condition= array("schede_id" => $_SESSION['case_id']);
    $obj->update($insert_data,$condition);
    var_dump($insert_data);
    $obj->error();
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
    $insert_log["operazione"] = $scritta." tab scena ritrovamento ULTIMI PASTI";
    $insert_log["schede_id"] = $_SESSION["case_id"];
    $insert_log["id"] = $_SESSION["id_caso"];
    $obja->insert($insert_log);
//    require_once("../comuni/loadtab_madre.php");
//    tab_madre();
    loadmenu_sids();
    if($j == 'succ'){
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=madre&tipo=sids&tab=1");
    }
    else {
        header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=scena&tipo=sids&tab=41");
    }
}

function back(){
	echo "ahahahaha";
	header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=sids&tipo=sids&tab=10");
}						       
function back_u(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=scena&tipo=sids&tab=40");
}
function back_v(){
    echo "ahahahaha";
    header("Location:../scheda_".$_SESSION["tipo_usr"].".php?scheda=scena&tipo=sids&tab=41");
}
?>