<!--
 * User: lucaferrari
 * Date: 12/06/15
 */
 -->
<script src="js/scripts.js"></script>
<link rel="stylesheet" href="js/jquery/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="js/jquery/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="css/DateTimePicker.css" />
<script type="text/javascript" src="js/DateTimePicker.js"></script>
<link type="text/css" href="css/jquery.keypad.css" rel="stylesheet"> 
<script type="text/javascript" src="js/number/jquery.plugin.js"></script> 
<script type="text/javascript" src="js/number/jquery.keypadi.js"></script>

<!--[if lt IE 9]>
 <link rel="stylesheet" type="text/css" href="DateTimePicker-ltie9.css" />
 <script type="text/javascript" src="DateTimePicker-ltie9.js"></script>
<![endif]-->

<?php
    if (($_SESSION["stato"] == 'chiusa') || ($_SESSION["stato"] == 'chiusa_usr')){
        $dis = "disabled";
    }
    else {
        $dis = "";
    }
require_once("./db/dati_pers_loadM.php");
loadPage();
require_once("./db/loadtab_madre.php");
tab_madre();

if(isset($_POST["dati_pers_cognome"])){
    $cognome = $_POST["dati_pers_cognome"];
    $class1 = "";
}
else {
    $cognome = null;
    $class1 = "errors";
}
if(isset($_POST["dati_pers_nome"])){
    $nome = $_POST["dati_pers_nome"];
    $class2 = "";
}
else {
    $nome = null;
    $class2 = "errors";
}
if(isset($_POST["dati_pers_dataN"])){
    list($year, $month, $day) = explode("-", $_POST['dati_pers_dataN']);
    $dataN = "$day-$month-$year";
    $class3 = "";
}
else {
    $dataN = null;
    $class3 = "errors";
}
if(isset($_POST["dati_pers_luogoN"])){
    $luogoN = $_POST["dati_pers_luogoN"];
    $class4 = "";
}
else {
    $luogoN = null;
    $class4 = "errors";
}
if(isset($_POST["dati_pers_eta"])){
    $eta = $_POST["dati_pers_eta"];
    $class5 = "";
}
else {
    $eta = null;
    $class5 = "errors";
}
if(isset($_POST["dati_pers_via"])){
    $via = $_POST["dati_pers_via"];
    $class6 = "";
}
else {
    $via = null;
    $class6 = "errors";
}
if(isset($_POST["dati_pers_cap"])){
    $cap = $_POST["dati_pers_cap"];
    $class7 = "";
}
else {
    $cap = null;
    $class7 = "errors";
}
if(isset($_POST["dati_pers_comune"])){
    $comune = $_POST["dati_pers_comune"];
    $class8 = "";
}
else {
    $comune = null;
    $class8 = "errors";
}
if(isset($_POST["dati_pers_prov"])){
    $prov = $_POST["dati_pers_prov"];
    $class9 = "";
}
else {
    $prov = null;
    $class9 = "errors";
}
if(isset($_POST["dati_pers_etnia"])){
    $etnia = $_POST["dati_pers_etnia"];
    $class10 = "";
}
else {
    $etnia = null;
    $class10 = "errors";
}
if(isset($_POST["dati_pers_specE"])){
    $specE = $_POST["dati_pers_specE"];
    $class11 = "";
}
else {
    $specE = null;
    $class11 = "errors";
}
if(isset($_POST["dati_pers_professione"])){
    $prof = $_POST["dati_pers_professione"];
    $class12 = "";
}
else {
    $prof = null;
    $class12 = "errors";
}
//inserimento Cell e Codfiscale
if(isset($_POST["dati_pers_cell"])){
    $cell = $_POST["dati_pers_cell"];
    $class13 = "";
}
else {
    $cell = null;
    $class13 = "errors";
}

if(isset($_POST["dati_pers_codfiscale"])){
    $codfiscale = $_POST["dati_pers_codfiscale"];
    $class14 = "";
}
else {
    $codfiscale = null;
    $class14 = "errors";
}
//Inserimento Rischi, Titolo di studio, Stato civile, Altezza, Peso

if(isset($_POST["dati_pers_rischi"])){
    $rischi = $_POST["dati_pers_rischi"];
    $class15 = "";
}
else {
    $rischi = null;
    $class15 = "errors";
}

if(isset($_POST["dati_pers_titolodistudio"])){
    $titolodistudio = $_POST["dati_pers_titolodistudio"];
    $class16 = "";
}
else {
    $titolodistudio = null;
    $class16 = "errors";
}

if(isset($_POST["dati_pers_statocivile"])){
    $statocivile = $_POST["dati_pers_statocivile"];
    $class17 = "";
}
else {
    $statocivile = null;
    $class17 = "errors";
}

if(isset($_POST["dati_pers_specM"])){
    list($year, $month, $day) = explode("-", $_POST['dati_pers_specM']);
    $specM = "$day-$month-$year";
    $class20 = "";
}
else {
    $specM = null;
    $class20 = "errors";
}

if(isset($_POST["dati_pers_altezza"])){
    $altezza = $_POST["dati_pers_altezza"];
    $class18 = "";
}
else {
    $altezza = null;
    $class18 = "errors";
}

if(isset($_POST["dati_pers_peso"])){
    $peso = $_POST["dati_pers_peso"];
    $class19 = "";
}
else {
    $peso = null;
    $class19 = "errors";
}

if(isset($_POST["dati_pers_numVisite"])){
    $numVisite = $_POST["dati_pers_numVisite"];
    $class21 = "";
}
else {
    $numVisite = null;
    $class21 = "errors";
}

//dati fecondazione 
if(isset($_POST["fecondazione"])){
    $fecondazione = $_POST["fecondazione"];
    $class18 = "";
}
else {
    $fecondazione = null;
    $class18 = "errors";
}

if(isset($_POST["dati_pers_dataF"])){
    list($year, $month, $day) = explode("-", $_POST['dati_pers_dataF']);
    $dataF = "$day-$month-$year";
    $class23 = "";
}
else {
    $dataF = null;
    $class23 = "errors";
}


if(isset($_POST["dati_pers_struttura"])){
    $struttura = $_POST["dati_pers_struttura"];
    $class9 = "";
}
else {
    $struttura = null;
    $class9 = "errors";
}

if((isset($_POST["dati_pers_endouterina"]))&&($_POST["dati_pers_endouterina"] == 'Y')){
    $endouterina = $_POST["dati_pers_endouterina"];
    $class10 = "";
    $checked1 = "checked";
}
else{ 
    $endouterina = null;
    $class10 = "errors";
    $checked1 = "";
}

if((isset($_POST["dati_pers_vitro"]))&&($_POST["dati_pers_vitro"] == 'Y')){
    $vitro = $_POST["dati_pers_vitro"];
    $class11 = "";
    $checked2 = "checked";
}
else{ 
    $vitro = null;
    $class11 = "errors";
    $checked2 = "";
}

if((isset($_POST["dati_pers_intracitoplasmatica"]))&&($_POST["dati_pers_intracitoplasmatica"] == 'Y')){
    $intracitoplasmatica = $_POST["dati_pers_intracitoplasmatica"];
    $class12 = "";
    $checked3 = "checked";
}
else{ 
    $intracitoplasmatica = null;
    $class12 = "errors";
    $checked3 = "";
}

if((isset($_POST["dati_pers_gameti"]))&&($_POST["dati_pers_gameti"] == 'Y')){
    $gameti = $_POST["dati_pers_gameti"];
    $class13 = "";
    $checked4 = "checked";
}
else{ 
    $gameti = null;
    $class13 = "errors";
    $checked4 = "";
}

if (isset($_POST["dati_pers_ovulazione"]) && $_POST["dati_pers_ovulazione"] == 'Y') {
    $checked5 = "checked";  // Se il checkbox è selezionato, aggiungi l'attributo checked
    $ovulazione = $_POST["dati_pers_ovulazione"];
} else {
    $ovulazione = null;  // Se non è selezionato, lascia il valore come null
    $class14 = "errors";  // Aggiungi eventuale classe di errore
}

if((isset($_POST["dati_pers_omologa"]))&&($_POST["dati_pers_omologa"] == 'Y')){
    $omologa = $_POST["dati_pers_omologa"];
    $class15 = "";
    $checked6 = "checked";
}
else{ 
    $omologa = null;
    $class15 = "errors";
    $checked6 = "";
}

if ((isset($_POST["dati_pers_eterologa"])) && ($_POST["dati_pers_eterologa"] == 'maschile' || $_POST["dati_pers_eterologa"] == 'femminile')) {
    $eterologa = $_POST["dati_pers_eterologa"];
    $class16 = "";
}
else{ 
    $eterologa = null;
    $class16 = "errors";
}

if((isset($_POST["dati_pers_embriodonazione"]))&&($_POST["dati_pers_embriodonazione"] == 'Y')){
    $embriodonazione = $_POST["dati_pers_embriodonazione"];
    $class17 = "";
    $checked8 = "checked";
}
else{ 
    $embriodonazione = null;
    $class17 = "errors";
    $checked8 = "";
}

if(isset($_POST["dati_pers_altre"])){
    $altre = $_POST["dati_pers_altre"];
    $class19 = "";
}
else {
    $altre = null;
    $class19 = "errors";
}


if((isset($_POST["dati_pers_fresco"]))&&($_POST["dati_pers_fresco"] == 'Y')){
    $fresco = $_POST["dati_pers_fresco"];
    $class20 = "";
    $checked9 = "checked";
}
else{ 
    $fresco = null;
    $class20 = "errors";
    $checked9 = "";
}


if((isset($_POST["dati_pers_crioconservazione"]))&&($_POST["dati_pers_crioconservazione"] == 'Y')){
    $crioconservazione = $_POST["dati_pers_crioconservazione"];
    $class21 = "";
    $checked10 = "checked";
}
else{ 
    $crioconservazione = null;
    $class21 = "errors";
    $checked10 = "";
}

if((isset($_POST["dati_pers_preimpianto"]))&&($_POST["dati_pers_preimpianto"] == 'Y')){
    $preimpianto = $_POST["dati_pers_preimpianto"];
    $class22 = "";
    $checked11 = "checked";
}
else{ 
    $preimpianto = null;
    $class22 = "errors";
    $checked11 = "";
}




?>
<script>
$( document ).ready(function() {
    if ('<?php echo $etnia; ?>' == 'altra'){
    document.getElementById('spec').style.visibility = 'visible';
    }
});
$(function() {
   $( "#specM" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-60:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D", //new Date(2015, 10 - 10, 29) //"+0D"
        onSelect: function(selectedDate) {
            console.log(selectedDate);
            var dd = selectedDate.split('-');
            var daN = dd[2] + '-' + dd[1] + '-' + dd[0];
            console.log(daN);
            
        }
    });
});

$(function() {
   $( "#dataF" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-60:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D", //new Date(2015, 10 - 10, 29) //"+0D"
        onSelect: function(selectedDate) {
            console.log(selectedDate);
            var dd = selectedDate.split('-');
            var daN = dd[2] + '-' + dd[1] + '-' + dd[0];
            console.log(daN);
            
        }
    });
});
  $(function() {
      $( "#slct" ).selectmenu({
           change: function(event, ui){
               var select = document.getElementById('slct');
                  var value = select.value;
                  if (value == 'altra') {
                     document.getElementById('spec').style.visibility='visible'; return;
                  }
                     document.getElementById('spec').style.visibility='hidden'; return;
           }
      })
      .selectmenu( "menuWidget")
      .addClass( "overflow" );;
      $("#slct").val('<?php echo $etnia; ?>')
      $('#slct').selectmenu('refresh', true);

  });
    
  $(function() {
      $('#cap').keypad({
          onClose: function(value, inst) { 
            if(value.toString().length != 5){
                alert('Attenzione! Cap sbagliato.'); 
            }
      }
      });   
  }); 


  $(function() {
      $( "#slct" ).selectmenu({
           change: function(event, ui){
               var select = document.getElementById('slct');
                  var value = select.value;
                  if (value == 'altra') {
                     document.getElementById('spec').style.visibility='visible'; return;
                  }
                     document.getElementById('spec').style.visibility='hidden'; return;
           }
      })
      .selectmenu( "menuWidget")
      .addClass( "overflow" );;
      $("#slct").val('<?php echo $etnia; ?>')
      $('#slct').selectmenu('refresh', true);

  });

  $(function() {
      $('#numVisite').keypad();    
   });
  

  $(function() {
    $("#slct2").selectmenu({
        change: function(event, ui) {
            gestisciSpec2(ui.item.value);
        }
    }).selectmenu("menuWidget").addClass("overflow");

    var statoIniziale = '<?php echo $statocivile; ?>';
    $("#slct2").val(statoIniziale);
    $('#slct2').selectmenu('refresh');

    gestisciSpec2(statoIniziale);

    function gestisciSpec2(valore) {
        if (valore === 'coniugata') {
            $('#spec2').css('visibility', 'visible');
        } else {
            $('#spec2').css('visibility', 'hidden');
        }
    }
});

$(function() {
    $("#slct3").selectmenu({
        change: function(event, ui) {
            var value = ui.item.value; 
            for (let i = 1; i <= 20; i++) {
                var div = document.getElementById('d' + i);
                if (div) {
                    if (value === 'si') {
                        div.style.display = 'inline-block';
                        div.style.verticalAlign = 'top';
                    } else {
                        div.style.display = 'none';
                    }
                }
            }
        }
    });
});

 
 function performSubmit(action)
   {
      // ASSIGN THE ACTION
      var action = action;
 
      // UPDATE THE HIDDEN FIELD
      document.getElementById("action").value = action;
 
      // SUBMIT THE FORM
      document.adminform.submit();
   }

 $(function() {
   $( "#dataN" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-60:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D", //new Date(2015, 10 - 10, 29) //"+0D"
        onSelect: function(selectedDate) {
            console.log(selectedDate);
            var dd = selectedDate.split('-');
            var daN = dd[2] + '-' + dd[1] + '-' + dd[0];
            console.log(daN);
            dob = new Date(daN);
            var today = new Date();
            var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
            $("#eta").val(age);
       }
    });
 });
</script>
<style>
.overflow {
    height: 150px;
  }
</style>
<div id="dtBox"></div>
<br/<br/><br/>
<form id="adminform" name="adminform" action="db/dati_pers_send.php" method="post">
    <div class="col-2">
        <label style="padding-top: 6px;" <?php echo "class=".$class1; ?>>
            Cognome *<br/>
            <?php
                echo "<input id=\"cognome\" $dis name=\"cognome\" tabindex=\"1\" value=\"".$cognome."\">";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 6px;" <?php echo "class=".$class2; ?>>
            Nome *<br/>
            <?php
                echo "<input id=\"nome\" $dis name=\"nome\" tabindex=\"2\" value=\"".$nome."\">";
            ?>
        </label>
    </div>

    <div class="col-3">
        <label style="padding-top: 6px;" <?php echo "class=".$class3; ?>>
            Data di Nascita *<br/>
            <?php
                echo "<input type=\"text\" $dis id=\"dataN\" name=\"dataN\" value=\"".$dataN."\" readonly>";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label style="padding-top: 6px;" <?php echo "class=".$class4; ?>>
            Luogo di Nascita *<br/>
            <?php
                echo "<input id=\"luogoN\" $dis name=\"luogoN\" tabindex=\"4\" value=\"".$luogoN."\">";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label style="padding-bottom: -12px;" <?php echo "class=".$class5; ?>>
            Età *<br/>
            <?php
                echo "<input id=\"eta\" $dis name=\"eta\" value=\"".$eta."\" readonly>";
            ?>
        </label>
    </div>
    <div class="col-2b">
        <label style="padding-top: 6px;">
            Via e numero<br/>
            <?php
                echo "<input id=\"indirizzo\" $dis name=\"indirizzo\" tabindex=\"6\" value=\"".$via."\">";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label style="padding-top: 6px;">
            CAP<br/>
            <?php
                echo "<input id=\"cap\" $dis name=\"cap\" tabindex=\"8\" value=\"".$cap."\">";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 6px;" <?php echo "class=".$class8; ?>>
            Comune *<br/>
            <?php
                echo "<input id=\"comune\" $dis name=\"comune\" tabindex=\"9\" value=\"".$comune."\">";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 6px;" <?php echo "class=".$class9; ?>>
            Provincia *<br/>
            <?php
                echo "<input id=\"prov\" $dis name=\"prov\" tabindex=\"10\" value=\"".$prov."\">";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 6px;">
            Cell *<br/>
            <?php
                echo "<input id=\"prov\" $dis name=\"cell\" tabindex=\"13\" value=\"".$cell."\">";
            ?>
        </label>
    </div>

    <div class="col-2">
        <label style="padding-top: 6px;">
            Codice Fiscale <br/>
            <?php
                echo "<input id=\"prov\" $dis name=\"codfiscale\" tabindex=\"14\" value=\"".$codfiscale."\">";
            ?>
        </label>
    </div>
    <div class="col-4">
        <label style="padding-top: 9px;" <?php echo "class=".$class10; ?>>
            Etnia *<br/>
            <select tabindex="11" id="slct" name="etnia" style="width:75%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>    
                <option value="caucasica">Caucasica</option>
                <option value="ispanica">Ispanica</option>
                <option value="medio orientale">Medio Orientale</option>
                <option value="indiana">Indiana (subcontinentale)</option>
                <option value="asiatica">Asiatica</option>
                <option value="nera">Nera</option>
                <option value="meticcia">Meticcia</option>
                <option value="magrebina">Magrebina</option>
                <option value="altra">Altra (specificare)</option>
            </select>
        </label>
    </div>
    <div class="col-4">
        <label  id="spec" style="visibility: hidden;padding-top: 6px;" <?php echo "class=".$class11; ?>>
            Specificare *<br/>
            <?php
                echo "<input name=\"specEtnia\" $dis tabindex=\"10\" value=\"".$specE."\">";
            ?>
        </label>    
    </div>
    <div class="col-2">
        <label style="padding-top: 6px;" <?php echo "class=".$class12; ?>>
            Professione *<br/>
            <?php
                echo "<input name=\"prof\" $dis tabindex=\"12\" value=\"".$prof."\">";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 6px; ">
            Riconosciuti rischi nell’ambiente di lavoro <br/>
            <?php
                echo "<input name=\"rischi\" $dis tabindex=\"15\" value=\"".$rischi."\">";               
            ?>
        </label>
    </div>

    <div class="col-2">
        <label style="padding-top: 6px;">
            Titolo di Studio <br/>
            <?php
                echo "<input name=\"titolodistudio\" $dis tabindex=\"16\" value=\"".$titolodistudio."\">";
            ?>
        </label>
    </div>

    <div class="col-4">
        <label style="padding-top: 9px;">
            Stato Civile *<br/>
            <select tabindex="17" id="slct2" name="statocivile" style="width:75%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option> 
                <option value="nubile">Nubile</option>    
                <option value="convivente">convivente</option>
                <option value="separata">separata</option>
                <option value="divorziata">divorziata</option>
                <option value="vedova">vedova</option>
                <option value="madre single">madre single</option>   
                <option value="coniugata">coniugata</option>              
            </select>          
        </label>
    </div>

    <div class="col-4">
        <label  id="spec2" style="visibility: hidden;padding-top: 6px;">
            Data Matrimonio *<br/>
            <?php
                echo "<input type=\"text\" id=\"specM\" $dis name=\"specM\" value=\"".$specM."\" readonly>";
            ?>
        </label>    
    </div>

    <div class="col-4">
        <label style="padding-top: 6px;">
            Altezza *<br/>
            <?php
                echo "<input name=\"altezza\" $dis tabindex=\"18\" value=\"".$altezza."\">";
            ?>
        </label>
    </div>
    
    <div class="col-4">
        <label style="padding-top: 6px;" >
            Peso *<br/>
            <?php
                echo "<input name=\"peso\" $dis tabindex=\"19\" value=\"".$peso."\">";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 9px;" <?php echo "class=".$class4; ?>>
            N° visite di controllo in gravidanza * <br/>
            <input placeholder="" id="numVisite" name="numVisite" tabindex="12" style="width: 100%;" readonly value="<?php echo $numVisite; ?>" <?php echo $dis; ?>>
        </label>
    </div>
<br>
<div class="col-3" style="width:40%;">
    <label style="padding-top:7px;">
        La Fecondazione è stata medicalmente assistita? * <br/>
        <select tabindex="15" id="slct3" name="fecondazione" style="width:50%;" <?php echo $dis; ?>>
            <option value="">-- Seleziona --</option>
            <option value="mancante">Dato Mancante</option>
            <option value="si">Si</option>
            <option value="no">No</option>
        </select>
    </label>
</div>

    <div class="col-4" id="d1" style="display:none;">
    <label>
        Eseguito in data:
        <?php
                echo "<input type=\"text\" id=\"dataF\" $dis name=\"dataF\" value=\"".$dataF."\" readonly>";
            ?>
    </label>
    </div>
    <div class="col-3" id="d2" style="display:none;">
        <label <?php echo "class=".$class4 ?>>
            Presso quale struttura? *<br/>
            <?php
                echo "<input type=\"text\" $dis id=\"struttura\" name=\"struttura\" value=\"".$struttura."\"";
            ?>
        </label>
    </div>
    <div class="col-3" id="d3" style="display:none;">
    <label>
    Inseminazione endouterina (IUI)
        <?php
           $endouterina = !empty($endouterina) ? $endouterina : 'N';
           $checked = ($endouterina == 'Y') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"endouterina\" $dis name=\"endouterina\" value=\"Y\" $checked>";
        ?>
    </label>
</div>
    <div class="col-3" id="d4" style="display:none;">
        <label 
        >
            Fecondazione in vitro con transfer embrionale (FIVET)
            <?php
           $vitro = !empty($vitro) ? $vitro : 'N';
           $checked = ($vitro == 'Y') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"vitro\" $dis name=\"vitro\" value=\"Y\" $checked>";
        ?>
        </label>
        <label 
        >
            Iniezione Intracitoplasmatica dello Spermatozoo (ICSI)
            <?php
           $intracitoplasmatica = !empty($intracitoplasmatica) ? $intracitoplasmatica : 'N';
           $checked = ($endouterina == 'Y') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"intracitoplasmatica\" $dis name=\"intracitoplasmatica\" value=\"Y\" $checked>";
        ?>
        </label>
        <label 
        >
            Trasferimento Intrafallopiano di Gameti (GIFT)
            <?php
           $gameti = !empty($gameti) ? $gameti : 'N';
           $checked = ($gameti == 'Y') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"gameti\" $dis name=\"gameti\" value=\"Y\" $checked>";
        ?>
        </label>
        <label style="padding-top: 6px;">
            Altre <br/>
            <?php
                echo "<input name=\"altre\" $dis tabindex=\"13\" value=\"".$altre."\">";
            ?>
        </label>
    </div>
    <div class="col-3" id="d5" style="display:none;">
    <label>
        Ovulazione indotta
        <?php
           $ovulazione = !empty($ovulazione) ? $ovulazione : 'N';
           $checked = ($ovulazione == 'Y') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"ovulazione\" $dis name=\"ovulazione\" value=\"Y\" $checked>";
        ?>
    </label>
</div>
<div class="col-3" id="d6" style="display:none;">
    <label>
        Omologa
        <?php
           $omologa = !empty($omologa) ? $omologa : 'N';
           $checked = ($omologa == 'Y') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"omologa\" $dis name=\"omologa\" value=\"Y\" $checked>";
        ?>
    </label>
</div>



     <div class="col-3" id="d7" style="display:none;">
    <label>
        Eterologa<br/>
        <label style="margin-right: 15px; display: inline-block;">
            Maschile
            <?php
           $eterologa = !empty($eterologa) ? $eterologa : 'N';
           $checked = ($eterologa == 'maschile') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"eterologa\" $dis name=\"eterologa\" value=\"maschile\" $checked>";
        ?>
        </label>

        <label style="display: inline-block;">
            Femminile
            <?php
           $eterologa = !empty($eterologa) ? $eterologa : 'N';
           $checked = ($eterologa == 'femminile') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"eterologa\" $dis name=\"eterologa\" value=\"femminile\" $checked>";
        ?>
        </label>
    </label>
</div>
<div class="col-3" id="d8" style="display:none;">
    <label>
        Embriodonazione
        <?php
           $omologa = !empty($embriodonazione) ? $embriodonazione : 'N';
           $checked = ($embriodonazione == 'Y') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"embriodonazione\" $dis name=\"embriodonazione\" value=\"Y\" $checked>";
        ?>
    </label>
</div>
<div class="col-3" id="d9" style="display:none;">
    <label>
        A Fresco
        <?php
           $omologa = !empty($fresco) ? $fresco : 'N';
           $checked = ($fresco == 'Y') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"fresco\" $dis name=\"fresco\" value=\"Y\" $checked>";
        ?>
    </label>
</div>
<div class="col-3" id="d10" style="display:none;">
    <label>
        Crioconservazione
        <?php
           $crioconservazione = !empty($crioconservazione) ? $crioconservazione : 'N';
           $checked = ($crioconservazione == 'Y') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"crioconservazione\" $dis name=\"crioconservazione\" value=\"Y\" $checked>";
        ?>
    </label>
</div>
<div class="col-3" id="d11" style="display:none;">
    <label>
        Test Preimpianto
        <?php
           $preimpianto = !empty($preimpianto) ? $preimpianto : 'N';
           $checked = ($preimpianto == 'Y') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"preimpianto\" $dis name=\"preimpianto\" value=\"Y\" $checked>";
        ?>
    </label>
</div>


    <div class="col-9">
        <label style="font-size: 10px; color: #e80d0d;">
               * Campi obbligatori. 
        </label>
    </div>
    <div class="col-7">
        <label style="font-size: 15px; color: #000;">
                <?php
                     echo "<button class='guide' onclick=\"performSubmit('succ_b')\">< Prec</button>";
                ?>
        
            </label>
        </div>
    <div class="col-7">
        <label style="font-size: 15px; color: #000;">
            <?php
                 echo "<button class='guide' onclick=\"performSubmit('succ')\">Succ ></button>";
            ?>            
            <input type="hidden" id="action" name="action"  value="" /> 
            <input type="hidden" id="tipo" name="tipo"  value="MADRE" />    
        </label>
    </div>
    
</form>