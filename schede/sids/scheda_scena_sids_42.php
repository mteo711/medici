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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>



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
  require_once("./db/ritrovamento_load3.php");
  loadPage();
  require_once("./db/loadtab_scheda.php");
  tab_scheda();
    $checked1 = "";
    $checked2 = "";
    $checked3 = "";
    $checked4 = "";
    $checked5 = "";
    $checked6 = "";
    $checked7 = "";


  if(isset($_POST["data_morte"])){
      list($year, $month, $day) = explode("-", $_POST['data_morte']);
      $morte = "$day-$month-$year";
  }
  else {
      $morte = null;
  }
  if(isset($_POST["data_nato"])){
      list($year, $month, $day) = explode("-", $_POST['data_nato']);
      $nato = "$day-$month-$year";
  }
  else {
      $nato = null;
  }
  if(isset($_POST["ritrovamento_dataU"])){
      list($year, $month, $day) = explode("-", $_POST['ritrovamento_dataU']);
      $dataU = "$day-$month-$year";
      $class1 = "";
  }
  else{ 
      $dataU = null;
      $class1 = "errors";
  }
  if(isset($_POST["ritrovamento_oraU"])){
      list($hour, $min, $sec) = explode(":", $_POST['ritrovamento_oraU']);
      $oraU = "$hour:$min";
      $class2 = "";
  }
  else{ 
      $oraU = null;
      $class2 = "errors";
  }
  if(isset($_POST["ritrovamento_pastoU"])){
      $pasto = $_POST["ritrovamento_pastoU"];
      $class3 = "";
  }
  else{ 
      $pasto = null;
      $class3 = "errors";
  }
  if(isset($_POST["ritrovamento_alimenti"])){
      $alimenti = $_POST["ritrovamento_alimenti"];
      $class4 = "";
      $check = explode(",", $alimenti);
      (in_array("materno", $check)) ? $checked1 = "checked" : $checked1 = "";
      (in_array("polvere", $check)) ? $checked2 = "checked" : $checked2 = "";
      (in_array("mucca", $check)) ? $checked3 = "checked" : $checked3 = "";
      (in_array("acqua", $check)) ? $checked4 = "checked" : $checked4 = "";
      (in_array("liquidi", $check)) ? $checked5 = "checked" : $checked5 = "";
      (in_array("omogeneizzati", $check)) ? $checked6 = "checked" : $checked6 = "";
      (in_array("altro", $check)) ? $checked7 = "checked" : $checked7 = "";
  }
  else{ 
      $alimenti = null;
      $class4 = "errors";
  }
  if(isset($_POST["ritrovamento_materno"])){
      $latte = $_POST["ritrovamento_materno"];
      $class5 = "";
  }
  else{ 
      $latte = null;
      $class5 = "errors";
  }
  if(isset($_POST["ritrovamento_polvere"])){
      $polvere = $_POST["ritrovamento_polvere"];
      $class6 = "";
  }
  else{ 
      $polvere = null;
      $class6 = "errors";
  }
  if(isset($_POST["ritrovamento_mucca"])){
      $mucca = $_POST["ritrovamento_mucca"];
      $class7 = "";
  }
  else{ 
      $mucca = null;
      $class7 = "errors";
  }
  if(isset($_POST["ritrovamento_acqua"])){
      $acqua = $_POST["ritrovamento_acqua"];
      $class8 = "";
  }
  else{ 
      $acqua = null;
      $class8 = "errors";
  }
  if(isset($_POST["ritrovamento_liquidi"])){
      $liquidi = $_POST["ritrovamento_liquidi"];
      $class9 = "";
  }
  else{ 
      $liquidi = null;
      $class9 = "errors";
  }
  if(isset($_POST["ritrovamento_omogeneizzati"])){
      $omo = $_POST["ritrovamento_omogeneizzati"];
      $class10 = "";
  }
  else{ 
      $omo = null;
      $class10 = "errors";
  }
  if(isset($_POST["ritrovamento_specAltro"])){
      $specAltro = $_POST["ritrovamento_specAltro"];
      $class11 = "";
  }
  else{ 
      $specAltro = null;
      $class11 = "errors";
  }
  if(isset($_POST["ritrovamento_nuovi"])){
      $nuovi = $_POST["ritrovamento_nuovi"];
      $class12 = "";
  }
  else{ 
      $nuovi = null;
      $class12 = "errors";
  }
  if(isset($_POST["ritrovamento_specNuovi"])){
      $specN = $_POST["ritrovamento_specNuovi"];
      $class13 = "";
  }
  else{ 
      $specN = null;
      $class13 = "errors";
  }
  if(isset($_POST["ritrovamento_rilevata"])){
      $rileva = $_POST["ritrovamento_rilevata"];
      $class14 = "";
  }
  else{ 
      $rileva = null;
      $class14 = "errors";
  }
  if(isset($_POST["ritrovamento_specRileva"])){
      $specR = $_POST["ritrovamento_specRileva"];
      $class15 = "";
  }
  else{ 
      $specR = null;
      $class15 = "errors";
  }
?>
<script>
  $( document ).ready(function() {
    <?php
        $check = explode(",", $alimenti);
    ?>
      
    if (('<?php echo $morte; ?>' == '') || ('<?php echo $nato; ?>' == '') || ('<?php echo $_SESSION["stato"]; ?>' == 'chiusa') || ('<?php echo $_SESSION["stato"]; ?>' == 'chiusa_usr')){
        document.getElementById("dataS").disabled = true;
    }
    else {
        document.getElementById("dataS").disabled = false;
    }
    if ('<?php echo $nuovi; ?>' == 'Y'){
    document.getElementById('selNew').style.visibility = 'visible';
    }
    if ('<?php echo $rileva; ?>' == 'altro'){
    document.getElementById('selChi').style.visibility = 'visible';
    }
    if ('<?php echo in_array("materno", $check) ?>' == '1'){
    document.getElementById('LatMat').style.visibility = 'visible';
    document.getElementById('labMat').style.visibility = 'visible';
    }
    if ('<?php echo in_array("polvere", $check) ?>' == '1'){
    document.getElementById('LatPol').style.visibility = 'visible';
    document.getElementById('labPol').style.visibility = 'visible';
    }
    if ('<?php echo in_array("mucca", $check) ?>' == '1'){
    document.getElementById('LatMuc').style.visibility = 'visible';
    document.getElementById('labMuc').style.visibility = 'visible';
    }
    if ('<?php echo in_array("acqua", $check) ?>' == '1'){
    document.getElementById('Acq').style.visibility = 'visible';
    document.getElementById('labA').style.visibility = 'visible';
    }
    if ('<?php echo in_array("liquidi", $check) ?>' == '1'){
    document.getElementById('AltLi').style.visibility = 'visible';
    document.getElementById('labLi').style.visibility = 'visible';
    }
    if ('<?php echo in_array("omogeneizzati", $check) ?>' == '1'){
    document.getElementById('Omo').style.visibility = 'visible';
    document.getElementById('labLi').style.visibility = 'visible';
    }
    if ('<?php echo in_array("altro", $check) ?>' == '1'){
    document.getElementById('altFood').style.visibility = 'visible';
    document.getElementById('labAlt').style.visibility = 'visible';
    }
      
  });
    
  $(function() {
      $('#LatMat').keypad();    
  });
  
  $(function() {
      $('#LatPol').keypad();    
  });
  
  $(function() {
      $('#LatMuc').keypad();    
  });
  
  $(function() {
      $('#Acq').keypad();    
  });
  
  $(function() {
      $('#Omo').keypad();    
  });

  $(function() {
      $( "#slctNew" ).selectmenu({
           change: function(event, ui){
               var select = document.getElementById('slctNew');
                  var value = select.value;
                  if (value == 'Y') {
                     document.getElementById('selNew').style.visibility = 'visible'; return;
                  }
                     document.getElementById('selNew').style.visibility = 'hidden'; return;
           }
      });
      $("#slctNew").val('<?php echo $nuovi; ?>')
      $('#slctNew').selectmenu('refresh', true);
  
  });
  $(function() {
      $( "#slctChi" ).selectmenu({
           change: function(event, ui){
               var select = document.getElementById('slctChi');
                  var value = select.value;
                  if (value == 'altro') {
                     document.getElementById('selChi').style.visibility = 'visible'; return;
                  }
                     document.getElementById('selChi').style.visibility = 'hidden'; return;
           }
      });
      $("#slctChi").val('<?php echo $rileva; ?>')
      $('#slctChi').selectmenu('refresh', true);
  
  });
  
  $(function() {
    $( "#dataS" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-10:+0",
        changeMonth: true,
        changeYear: true,
        minDate: "<?php echo $nato; ?>" , //manca
        maxDate: "<?php echo $morte; ?>" //new Date(2015, 10 - 10, 29) //"+0D"
    });
  });
$(document).ready(function()
  {

    $("#dtBox").DateTimePicker();

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


</script>

<div id="dtBox"></div>
<br/<br/><br/>
<form id="adminform" name="adminform" action="db/ritrovamento_send.php" method="post">
    <div class="col-1">
        <label style="font-size: 13px; color: #000;">
            In quale giorno e in quale ora è stato somministrato l'ultimo pasto? *<br/>
        </label>
    </div>
    <div class="col-3">
        <label style="padding-top: 4px;"  <?php echo "class=".$class1; ?>>
            Data somministrazione * <sup>1</sup><br/>
            <?php
                echo "<input type=\"text\" id=\"dataS\" $dis name=\"dataS\" readonly value=\"".$dataU."\">";
            ?>
        </label>
    </div>


    <script>
    document.addEventListener('DOMContentLoaded', function () {
        flatpickr("#oraS", {
            enableTime: true,          
            noCalendar: true,        
            dateFormat: "H:i",      
            defaultDate: "<?php echo $oraU; ?>"  
        });
    });
</script>


<div class="col-3">
    <label class="form-label" style="padding-top: 8px;">
        Ora somministrazione *<br/>
        <input type="text" id="oraS" name="oraS" readonly value="<?php echo $oraU; ?>">
    </label>
</div>

    <div class="col-3">
        <label style="padding-top: 8px;"  <?php echo "class=".$class3; ?>>
            Persona che lo ha sommministrato *<br/>
            <?php
                echo "<input id=\"chiPasto\" $dis name=\"chiPasto\" tabindex=\"28\" value=\"".$pasto."\">";
            ?>
        </label>
    </div>
    <div class="col-1">
        <label style="font-size: 13px; color: #000;">
            Quali cibi e liquidi sono stati somministrati al bambino nelle ultime 24 ore (incluso l'ultimo pasto) e in quale quantità? *<br/>
        </label>
    </div>
    <div class="col-12">
        <label style="padding-top: 8px;"  <?php echo "class=".$class4; ?>>
            <input type="checkbox" name="alimenti[]" value="materno" id="cb1" style="margin-bottom: 0px;" onclick="logo('cb1', 'LatMat', 'labMat');" <?php echo $checked1."  ".$dis;?>>
        </label>
    </div>
    <div class="col-15">
        <label style="padding-top: 9px;"  <?php echo "class=".$class4; ?>>
            Latte Materno (ml) <br/>          
        </label>
    </div>
    <div class="col-4">
        <label style="visibility:hidden;" id="labMat"  <?php echo "class=".$class5; ?>> 
            <?php
                echo "<input placeholder=\"ml\" $dis id=\"LatMat\" name=\"LatMat\" tabindex=\"21\" style=\"visibility:hidden;width: 100%;\" readonly value=\"".$latte."\">";
            ?>
        </label>
    </div>
    <div class="col-12">
        <label style="padding-top: 8px;"  <?php echo "class=".$class4; ?>>
            <input type="checkbox" style="margin-bottom: 0px;" name="alimenti[]" value="polvere" id="cb2" onclick="logo('cb2', 'LatPol', 'labPol');" <?php echo $checked2."  ".$dis;?>>
        </label>
    </div>
    <div class="col-15">
        <label style="padding-top: 9px;"  <?php echo "class=".$class4; ?>>
            Latte in polvere (gr) <br/>         
        </label>
    </div>
    <div class="col-4">
        <label style="visibility:hidden;" id="labPol" <?php echo "class=".$class6; ?>> 
            <?php
                echo "<input placeholder=\"gr\" id=\"LatPol\" $dis name=\"LatPol\" tabindex=\"21\" style=\"visibility:hidden;width: 100%;\" readonly value=\"".$polvere."\">";
            ?>
        </label>
    </div>
    <div class="col-12">
        <label style="padding-top: 9px;"  <?php echo "class=".$class4; ?>>
            <input type="checkbox" style="margin-bottom: 0px;" name="alimenti[]" value="mucca" id="cb3" onclick="logo('cb3', 'LatMuc', 'labMuc');" <?php echo $checked3."  ".$dis;?>>
        </label>
    </div>
    <div class="col-15">
        <label style="padding-top: 10px;"  <?php echo "class=".$class4; ?>>
            Latte di mucca (ml) <br/>          
        </label>
    </div>
    <div class="col-4">
        <label style="visibility:hidden;" id="labMuc"  <?php echo "class=".$class7; ?>> 
            <?php
                echo "<input placeholder=\"ml\" $dis id=\"LatMuc\" name=\"LatMuc\" tabindex=\"21\" style=\"visibility:hidden;width: 100%;\" readonly value=\"".$mucca."\">";
            ?>        
        </label>
    </div>
    <div class="col-12">
        <label style="padding-top: 9px;"  <?php echo "class=".$class4; ?>>
            <input type="checkbox" style="margin-bottom: 0px;" name="alimenti[]" value="acqua" id="cb4" onclick="logo('cb4', 'Acq', 'labA');" <?php echo $checked4."  ".$dis;?>>
        </label>
    </div>
    <div class="col-15">
        <label style="padding-top: 10px;"  <?php echo "class=".$class4; ?>>
            Acqua (ml) <br/>           
        </label>
    </div>
    <div class="col-4">
        <label style="visibility:hidden;" id="labA"  <?php echo "class=".$class8; ?>> 
            <?php
                echo "<input placeholder=\"ml\" $dis id=\"Acq\" name=\"Acq\" tabindex=\"21\" style=\"visibility:hidden;width: 100%;\" readonly value=\"".$acqua."\">";
            ?>
        </label>
    </div>
    <div class="col-12">
        <label style="padding-top: 9px;"  <?php echo "class=".$class4; ?>>
            <input type="checkbox" style="margin-bottom: 0px;" name="alimenti[]" value="liquidi" id="cb5" onclick="logo('cb5', 'AltLi', 'labLi');" <?php echo $checked5."  ".$dis;?>>
        </label>
    </div>
    <div class="col-15">
        <label style="padding-top: 10px;"  <?php echo "class=".$class4; ?>>
            Altri liquidi (ml)  <br/>         
        </label>
    </div>
    <div class="col-4">
        <label style="visibility:hidden;" id="labLi" <?php echo "class=".$class9; ?>> 
            <?php
            echo "<input placeholder=\"Tipo e quantità\" $dis id=\"AltLi\" name=\"liquidi\" tabindex=\"21\" style=\"visibility:hidden;width: 100%;\" value=\"".$liquidi."\">"
            ?>
        </label>
    </div>
    <div class="col-12">
        <label style="padding-top: 9px;"  <?php echo "class=".$class4; ?>>       
            <input type="checkbox" style="margin-bottom: 0px;" name="alimenti[]" value="omogeneizzati" id="cb6" onclick="logo('cb6', 'Omo', 'labOmo');" <?php echo $checked6."  ".$dis;?>> 
        </label>
    </div>
    <div class="col-15">
        <label style="padding-top: 10px;"  <?php echo "class=".$class4; ?>>
            Cibi omogeneizzati (gr) <br/>           
        </label>
    </div>
    <div class="col-4">
        <label style="visibility:hidden;" id="labOmo"  <?php echo "class=".$class10; ?>> 
            <?php
            echo "<input placeholder=\"gr\" id=\"Omo\" $dis name=\"Omo\" tabindex=\"21\" style=\"visibility:hidden;width: 100%;\" readonly value=\"".$omo."\">";
            ?>        
        </label>
    </div>
    <div class="col-12">
            <label style="padding-top: 13px;"  <?php echo "class=".$class4; ?>>
                <input type="checkbox" style="margin-bottom: 0px;" name="alimenti[]" value="altro" id="cb7" onclick="logo('cb7', 'altFood', 'labAlt');" <?php echo $checked7."  ".$dis;?>>
            </label>
        </div>
        <div class="col-15">
            <label style="padding-top: 14px;"  <?php echo "class=".$class4; ?>>
                Altro (gr/ml) <br/>          
            </label>
        </div>
        <div class="col-4">
            <label style="height:34px;padding-top: 9px;visibility:hidden;" id="labAlt"  <?php echo "class=".$class11; ?>> 
                <?php
                    echo "<input placeholder=\"Tipo e quantità\" $dis id=\"altFood\" name=\"altFood\" tabindex=\"21\" style=\"visibility:hidden;width: 100%;\" value=\"".$specAltro."\">"
                ?>
            </label>
        </div>
    <div class="col-2">
        <label style="height:34px;padding-top: 9px;"> 
            <input style="visibility:hidden;" style="width: 100%;">
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 8px;"  <?php echo "class=".$class12; ?>>
            C'è stato un nuovo alimento somministrato al bambino nelle ultime 24 ore? *<br/>
            <select tabindex="29" id="slctNew" name="nuovoAlimento" style="width:50%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="Y">Si (specificare)</option>
                <option value="N">No</option>
            </select>
        </label>
    </div>
    <div class="col-2">
        <label id="selNew" style="visibility:hidden;padding-top: 12px;"  <?php echo "class=".$class13; ?>>
            Specificare *<br/>
            <?php
                echo "<textarea $dis placeholder=\"es. passaggio a latte artificiale, svezzamento\" name=\"specAlimento\" style=\"height:40px;\">".$specN."</textarea>"
            ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top:8px;" <?php echo "class=".$class14; ?>>
            Chi ha rilevato la morte? *<br/>
            <select tabindex="31" id="slctChi" name="rilevato" style="width:50%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="medico di famiglia">Medico di famiglia</option>
                <option value="medico 118">Medico 118</option>
                <option value="pediatra">Pediatra</option>
                <option value="altro">Altri (specificare)</option>
            </select>
        </label>
    </div>
    <div class="col-2">
        <label id="selChi" style="visibility:hidden;" <?php echo "class=".$class15; ?>>
            Specificare *<br/>
            <?php
                echo "<input id=\"rilevMorte\" $dis name=\"chiRilevato\" tabindex=\"32\" value=\"".$specR."\">";
            ?>
        </label>
    </div>
    <div class="col-9">
        <label style="font-size: 10px; color: #e80d0d;">
               * Campi obbligatori. <br/>
               <sup>1</sup> Inserire prima la data di nascita e la data di morte nella scheda Lattante > Dati Personali.
        </label>
    </div>
    <div class="col-7">
        <label style="font-size: 15px; color: #000;">
                <?php
                     echo "<button class='guide' onclick=\"performSubmit('succ_d')\">< Prec</button>";
                ?>
        
            </label>
        </div>
    <div class="col-7">
        <label style="font-size: 15px; color: #000;">
            <?php
                 echo "<button class='guide' onclick=\"performSubmit('succ_v')\">Succ ></button>";
            ?>            
            <input type="hidden" id="action" name="action"  value="" />    
        </label>
    </div>
</form>
