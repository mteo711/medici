<?php
session_start();
include_once("databases.php");
include_once("info_morte_fetale.php");
require_once("loadtab_madref.php");
require_once("loadmenu_feto.php");
include_once("log_activities.php");

// Funzione per convertire le date da dd-mm-yyyy a yyyy-mm-dd
function convertiData($data) {
    list($giorno, $mese, $anno) = explode("-", $data);
    return "$anno-$mese-$giorno";
}

// Gestione delle azioni
if ($_POST && array_key_exists("action", $_POST)) {
    switch ($_POST['action']) {
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

function invia($i) {
    $insert_data = array();
    $insert_data["madre_schede_id"] = $_SESSION['case_id'];

    if (!empty($_POST['dataU'])) $insert_data["data_ultima_mestruazione"] = convertiData($_POST['dataU']);
    if (!empty($_POST['dataA'])) $insert_data["data_presunta_parto_anamnestico"] = convertiData($_POST['dataA']);
    if (!empty($_POST['dataE'])) $insert_data["data_presunta_parto_ecografico"] = convertiData($_POST['dataE']);
    if (!empty($_POST['numVisite'])) $insert_data["num_visite_controllo_in_gravidanza"] = $_POST['numVisite'];
    if (!empty($_POST['dataO'])) $insert_data["ultima_visita_ostetrica"] = convertiData($_POST['dataO']);
    if (!empty($_POST['dataF'])) $insert_data["dataF"] = convertiData($_POST['dataF']);

    if (!empty($_POST['ginecologo'])) $insert_data["ginecologo_curante"] = $_POST['ginecologo'];
    if (!empty($_POST['ostetrica'])) $insert_data["ostetrica"] = $_POST['ostetrica'];
    if (!empty($_POST['fecondazione'])) $insert_data["fecondazione"] = $_POST['fecondazione'];
    if (!empty($_POST['struttura'])) $insert_data["struttura"] = $_POST['struttura'];
    if (!empty($_POST['eterologa'])) $insert_data["eterologa"] = $_POST['eterologa'];
    if (!empty($_POST['altre'])) $insert_data["specifica_altre"] = $_POST['altre'];

    $insert_data["inseminazione_endouterina"] = !empty($_POST['endouterina']) ? $_POST['endouterina'] : 'N';
    $insert_data["fecondazione_in_vitro"] = !empty($_POST['vitro']) ? $_POST['vitro'] : 'N';
    $insert_data["intracitoplasmatica"] = !empty($_POST['intracitoplasmatica']) ? $_POST['intracitoplasmatica'] : 'N';
    $insert_data["gameti"] = !empty($_POST['gameti']) ? $_POST['gameti'] : 'N';
    $insert_data["ovulazione_indotta"] = !empty($_POST['ovulazione']) ? $_POST['ovulazione'] : 'N';
    $insert_data["omologa"] = !empty($_POST['omologa']) ? $_POST['omologa'] : 'N';
    $insert_data["embriodonazione"] = !empty($_POST['embriodonazione']) ? $_POST['embriodonazione'] : 'N';
    $insert_data["a_fresco"] = !empty($_POST['fresco']) ? $_POST['fresco'] : 'N';
    $insert_data["crioconservazione"] = !empty($_POST['crioconservazione']) ? $_POST['crioconservazione'] : 'N';
    $insert_data["test_preimpianto"] = !empty($_POST['preimpianto']) ? $_POST['preimpianto'] : 'N';


    $obj = new info_morte_fetale();

    if ($_SESSION["morte_fetale"] != "Y") {
        $obj->insert($insert_data);
        $obj->error();

        // Log inserimento
        $obja = new log_activities();
        $obja->insert([
            "utente" => $_SESSION["username"],
            "oggetto" => "Inserimento",
            "operazione" => "Inserimento tab mestruazioni MADRE",
            "schede_id" => $_SESSION["case_id"],
            "id" => $_SESSION["id_caso"]
        ]);

        $_SESSION["morte_fetale"] = "Y";
    } else {
        $condition = array("madre_schede_id" => $_SESSION['case_id']);
        $obj->update($insert_data, $condition);
        $obj->error();

        // Log aggiornamento o consultazione
        $scritta = (in_array($_SESSION["stato"], ['chiusa', 'chiusa_usr'])) ? "Consultazione" : "Update";
        $obja = new log_activities();
        $obja->insert([
            "utente" => $_SESSION["username"],
            "oggetto" => $scritta,
            "operazione" => $scritta . " tab mestruazioni MADRE",
            "schede_id" => $_SESSION["case_id"],
            "id" => $_SESSION["id_caso"]
        ]);
    }

    tab_madref();
    loadmenu_feto();

    // Redirect finale
    $pagina = "../scheda_" . $_SESSION["tipo_usr"] . ".php?scheda=";
    $pagina .= ($i == 'succ') ? "esami&tipo=feto&tab=10" : "madre&tipo=feto&tab=6";
    header("Location: $pagina");
}

function back() {
    header("Location:../scheda_" . $_SESSION["tipo_usr"] . ".php?scheda=madre&tipo=feto&tab=6");
}
?>
