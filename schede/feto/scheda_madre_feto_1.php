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
require_once("./db/loadtab_madref.php");
tab_madref();
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

//ins3 accorta, notato
if(isset($_POST["dati_pers_morteFeto"])){
    $morteFeto = $_POST["dati_pers_morteFeto"];
    $class21 = "";
}
else {
    $morteFeto = null;
    $class21 = "errors";
}

if(isset($_POST["dati_pers_ultimoAvv"])){
    $ultimoAvv = $_POST["dati_pers_ultimoAvv"];
    $class22 = "";
}
else {
    $ultimoAvv = null;
    $class22 = "errors";
}

?>
<script>
$( document ).ready(function() {
    <?php
        require_once("./db/loadtab_madref.php");
        tab_madref();
    ?>
    if ('<?php echo $etnia; ?>' == 'altra'){
    document.getElementById('spec').style.visibility = 'visible';
    }
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
 //funzione per data matromonio
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

</script>
<style>
.overflow {
    height: 150px;
  }
</style>
<div id="dtBox"></div>
<br/<br/><br/>
<form id="adminform" name="adminform" action="db/dati_pers_sendf.php" method="post">
    <div class="col-2">
        <label style="padding-top: 6px;" <?php echo "class=".$class1; ?>>
            Cognome *<br/>
            <?php
                echo "<input id=\"cognome\" name=\"cognome\" $dis tabindex=\"1\" value=\"".$cognome."\">";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 6px;" <?php echo "class=".$class2; ?>>
            Nome *<br/>
            <?php
                echo "<input id=\"nome\" name=\"nome\" $dis tabindex=\"2\" value=\"".$nome."\">";
            ?>
        </label>
    </div>

    <div class="col-3">
        <label style="padding-top: 6px;" <?php echo "class=".$class3; ?>>
            Data di Nascita *<br/>
            <?php
                echo "<input type=\"text\" id=\"dataN\" $dis name=\"dataN\" value=\"".$dataN."\" readonly>";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label style="padding-top: 6px;" <?php echo "class=".$class4; ?>>
            Luogo di Nascita *<br/>
            <?php
                echo "<input id=\"luogoN\" name=\"luogoN\" $dis tabindex=\"4\" value=\"".$luogoN."\">";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label style="padding-bottom: -12px;" <?php echo "class=".$class5; ?>>
            Età *<br/>
            <?php
                echo "<input id=\"eta\" name=\"eta\" $dis value=\"".$eta."\" readonly>";
            ?>
        </label>
    </div>
    <div class="col-2b">
        <label style="padding-top: 6px;">
            Via e numero<br/>
            <?php
                echo "<input id=\"indirizzo\" name=\"indirizzo\" $dis tabindex=\"6\" value=\"".$via."\">";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label style="padding-top: 6px;" >
            CAP<br/>
            <?php
                echo "<input id=\"cap\" name=\"cap\" $dis tabindex=\"8\" value=\"".$cap."\">";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 6px;" <?php echo "class=".$class8; ?>>
            Comune *<br/>
            <?php
                echo "<input id=\"comune\" name=\"comune\" $dis tabindex=\"9\" value=\"".$comune."\">";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 6px;" <?php echo "class=".$class9; ?>>
            Provincia *<br/>
            <?php
                echo "<input id=\"prov\" name=\"prov\" $dis tabindex=\"10\" value=\"".$prov."\">";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 6px;" <?php echo "class=".$class13; ?>>
            Cell *<br/>
            <?php
                echo "<input id=\"prov\" $dis name=\"cell\" tabindex=\"13\" value=\"".$cell."\">";
            ?>
        </label>
    </div>

    <div class="col-2">
        <label style="padding-top: 6px;" <?php echo "class=".$class14; ?>>
            Codice Fiscale *<br/>
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

    <!-- aggiunta nuovi div-->
    <div class="col-2">
        <label style="padding-top: 6px; " <?php echo "class=".$class15; ?>>
            Riconosciuti rischi nell’ambiente di lavoro *<br/>
            <?php
                echo "<input name=\"rischi\" $dis tabindex=\"15\" value=\"".$rischi."\">";               
            ?>
        </label>
    </div>

    <div class="col-2">
        <label style="padding-top: 6px;" <?php echo "class=".$class16; ?>>
            Titolo di Studio *<br/>
            <?php
                echo "<input name=\"titolodistudio\" $dis tabindex=\"16\" value=\"".$titolodistudio."\">";
            ?>
        </label>
    </div>

    <div class="col-4">
        <label style="padding-top: 9px;" <?php echo "class=".$class17; ?>>
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
        <label  id="spec2" style="visibility: hidden;padding-top: 6px;" <?php echo "class=".$class20; ?>>
            Data Matrimonio *<br/>
            <?php
                echo "<input type=\"text\" id=\"specM\" $dis name=\"specM\" value=\"".$specM."\" readonly>";
            ?>
        </label>    
    </div>

    <div class="col-4">
        <label style="padding-top: 6px;" <?php echo "class=".$class18; ?>>
            Altezza *<br/>
            <?php
                echo "<input name=\"altezza\" $dis tabindex=\"18\" value=\"".$altezza."\">";
            ?>
        </label>
    </div>
    
    <div class="col-4">
        <label style="padding-top: 6px;" <?php echo "class=".$class19; ?>>
            Peso *<br/>
            <?php
                echo "<input name=\"peso\" $dis tabindex=\"19\" value=\"".$peso."\">";
            ?>
        </label>
    </div>
    <div class="col-2">
		<label style="padding-top: 8px;" >
			Come si è accorta della morte del feto <br/>
            <?php
			echo "<textarea name=\"morteFeto\" style=\"height:40px;\" $dis tabindex=\"21\">$morteFeto</textarea>";
            ?>
		</label>
	</div>
    <div class="col-2">
		<label style="padding-top: 8px;" >
			Quando è stato notato vivo/muoversi l'ultima volta <br/>
            <?php
			echo "<textarea name=\"ultimoAvv\" style=\"height:40px;\" $dis tabindex=\"22\"> $ultimoAvv</textarea>";
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