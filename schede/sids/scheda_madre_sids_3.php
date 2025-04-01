
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
 require_once("./db/fumo_attivo_load.php");
 loadPage();
 require_once("./db/loadtab_madre.php");
 tab_madre();
 if(isset($_POST["fumo_att_prima"])){
     $prima = $_POST["fumo_att_prima"];
     $class1 = "";
 }
 else {
     $prima = null;
     $class1 = "errors";
 }
 if(isset($_POST["fumo_att_primaA"])){
     $primaA = $_POST["fumo_att_primaA"];
     $class2 = "";
 }
 else {
     $primaA = null;
     $class2 = "errors";
 }
 if(isset($_POST["fumo_att_primaN"])){
     $primaN = $_POST["fumo_att_primaN"];
     $class3 = "";
 }
 else {
     $primaN = null;
     $class3 = "errors";
 }
 if(isset($_POST["fumo_att_durante"])){
     $durante = $_POST["fumo_att_durante"];
     $class4 = "";
 }
 else {
     $durante = null;
     $class4 = "errors";
 }
 if(isset($_POST["fumo_att_duranteA"])){
     $duranteA = $_POST["fumo_att_duranteA"];
     $class5 = "";
 }
 else {
     $duranteA = null;
     $class5 = "errors";
 }
 if(isset($_POST["fumo_att_duranteN"])){
     $duranteN = $_POST["fumo_att_duranteN"];
     $class6 = "";
 }
 else {
     $duranteN = null;
     $class6 = "errors";
 }
 if(isset($_POST["fumo_att_dopo"])){
     $dopo = $_POST["fumo_att_dopo"];
     $class7 = "";
 }
 else {
     $dopo = null;
     $class7 = "errors";
 }
 if(isset($_POST["fumo_att_dopoA"])){
     $dopoA = $_POST["fumo_att_dopoA"];
     $class8 = "";
 }
 else {
     $dopoA = null;
     $class8 = "errors";
 }
 if(isset($_POST["fumo_att_dopoN"])){
     $dopoN = $_POST["fumo_att_dopoN"];
     $class9 = "";
 }
 else {
     $dopoN = null;
     $class9 = "errors";
 }
 if(isset($_POST["fumo_att_elettronica"])){
     $elettronica = $_POST["fumo_att_elettronica"];
     $class10 = "";
 }
 else {
     $elettronica = null;
     $class10 = "errors";
 }
 if(isset($_POST["fumo_att_specE"])){
     $specE = $_POST["fumo_att_specE"];
     $class11 = "";
 }
 else {
     $specE = null;
     $class11 = "errors";
 }
 
?>
<script>
  $( document ).ready(function() {
    if ('<?php echo $prima; ?>' == 'Y'){
       document.getElementById('prima').style.visibility='visible';           
       document.getElementById('prima2').style.visibility='visible';
    }
    if ('<?php echo $durante; ?>' == 'Y'){
       document.getElementById('durante').style.visibility='visible';
       document.getElementById('durante2').style.visibility='visible';
    }
    if ('<?php echo $dopo; ?>' == 'Y'){
       document.getElementById('dopo').style.visibility='visible';
       document.getElementById('dopo2').style.visibility='visible';
    }
    if ('<?php echo $elettronica; ?>' == 'Y'){
       document.getElementById('concentrazione').style.visibility = 'visible';
    }
  });
  $(function() {
      $('#etaSigAtt1').keypad();    
  });
  $(function() {
      $('#numSigDieAtt1').keypad();    
  });
  $(function() {
      $('#etaSigAtt2').keypad();    
  });
  $(function() {
      $('#numSigDieAtt2').keypad();    
  });
  $(function() {
      $('#etaSigAtt3').keypad();    
  });
  $(function() {
      $('#numSigDieAtt3').keypad();    
  });
  
  
  $(function() {
      $( "#slct" ).selectmenu({
           change: function(event, ui){
               var select = document.getElementById('slct');
                  var value = select.value;
                  if (value == 'Y') {
                     document.getElementById('concentrazione').style.visibility='visible'; return;
                  }
                     document.getElementById('concentrazione').style.visibility='hidden'; return;
           }
      });
      $("#slct").val('<?php echo $elettronica; ?>')
      $('#slct').selectmenu('refresh', true);

  });
  $(function() {
      $( "#slct1" ).selectmenu({
           change: function(event, ui){
               var select = document.getElementById('slct1');
                  var value = select.value;
                  if (value == 'Y') {
                     document.getElementById('prima').style.visibility='visible';
                     document.getElementById('prima2').style.visibility='visible'; return;
                  }
                  else {
                      document.getElementById('prima').style.visibility='hidden';
                      document.getElementById('prima2').style.visibility='hidden'; return;
                  }

           }
      });
      $("#slct1").val('<?php echo $prima; ?>')
      $('#slct1').selectmenu('refresh', true);

  });
  $(function() {
      $( "#slct2" ).selectmenu({
           change: function(event, ui){
               var select = document.getElementById('slct2');
                  var value = select.value;
                  if (value == 'Y') {
                     document.getElementById('durante').style.visibility='visible';
                     document.getElementById('durante2').style.visibility='visible'; return;
                  }
                  else {
                      document.getElementById('durante').style.visibility='hidden';
                      document.getElementById('durante2').style.visibility='hidden'; return;
                  }

           }
      });
      $("#slct2").val('<?php echo $durante; ?>')
      $('#slct2').selectmenu('refresh', true);

  });
  $(function() {
      $( "#slct3" ).selectmenu({
           change: function(event, ui){
               var select = document.getElementById('slct3');
                  var value = select.value;
                  if (value == 'Y') {
                     document.getElementById('dopo').style.visibility='visible';
                     document.getElementById('dopo2').style.visibility='visible'; return;
                  }
                  else {
                      document.getElementById('dopo').style.visibility='hidden';
                      document.getElementById('dopo2').style.visibility='hidden'; return;
                  }

           }
      });
      $("#slct3").val('<?php echo $dopo; ?>')
      $('#slct3').selectmenu('refresh', true);

  });
  $(function() {
      $( "#conc" ).selectmenu();
      $("#conc").val('<?php echo $specE; ?>')
      $('#conc').selectmenu('refresh', true);
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

<br/<br/><br/>
<form id="adminform" name="adminform" action="db/fumo_attivo_send.php" method="post">
    <div class="col-3">
        <label style="padding-top: 13px;" <?php echo "class=".$class1; ?>>
            Prima del concepimento *<br/>
            <select tabindex="23" id="slct1" name="prima" style="width:75%;" <?php echo $dis; ?>>
                <option value=''> &nbsp </option>
                <option value="Y">Si (specificare)</option>
                <option value='N'>No</option>
            </select>
        </label>
    </div>
    <div class="col-3">
        <label id="prima" style="visibility: hidden; padding-top: 11px;" <?php echo "class=".$class2; ?>>
            Dall'età di *<br/>
            <?php
             echo "<input id=\"etaSigAtt1\" $dis name=\"etaSigAtt1\" style=\"width: 100%;\" readonly value=\"".$primaA."\">";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label id="prima2" style="visibility: hidden; padding-top: 11px;" <?php echo "class=".$class3; ?>>
            Numero sigarette/giorno *<br/>
            <?php
              echo "<input id=\"numSigDieAtt1\" $dis name=\"numSigDieAtt1\" style=\"width: 100%;\" readonly value=\"".$primaN."\">";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label style="padding-top: 13px;" <?php echo "class=".$class4; ?>>
            Durante la gravidanza *<br/>
            <select tabindex="26" id="slct2" name="durante" style="width:75%;" <?php echo $dis; ?>>
                <option value=''> &nbsp </option>
                <option value="Y">Si (specificare)</option>
                <option value='N'>No</option>
            </select>
        </label>
    </div>
    <div class="col-3">
        <label id="durante" style="visibility: hidden; padding-top: 11px;" <?php echo "class=".$class5; ?> >
            Fino alla settimana di gestazione *<br/>
            <?php
             echo "<input id=\"etaSigAtt2\" $dis name=\"etaSigAtt2\" style=\"width: 100%;\" readonly value=\"".$duranteA."\">";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label id="durante2" style="visibility: hidden; padding-top: 11px;" <?php echo "class=".$class6; ?>>
            Numero sigarette/giorno *<br/>
            <?php
              echo "<input id=\"numSigDieAtt2\" $dis name=\"numSigDieAtt2\" style=\"width: 100%;\" readonly value=\"".$duranteN."\">";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label style="padding-top: 13px;" <?php echo "class=".$class7; ?>>
            Dopo il parto *<br/>
            <select tabindex="29" id="slct3" name="dopo" style="width:75%;" <?php echo $dis; ?>>
                <option value=''> &nbsp </option>
                <option value="Y">Si (specificare)</option>
                <option value='N'>No</option>
            </select>
        </label>
    </div>
    <div class="col-3">
        <label id="dopo" style="visibility: hidden; padding-top: 11px;" <?php echo "class=".$class8; ?>>
            Fino all'età del bambino di giorni *<br/>
            <?php
             echo "<input id=\"etaSigAtt3\" $dis name=\"etaSigAtt3\" style=\"width: 100%;\" readonly value=\"".$dopoA."\">"; 
            ?>
        </label>
    </div>
    <div class="col-3">
        <label id="dopo2" style="visibility: hidden; padding-top: 11px;" <?php echo "class=".$class9; ?>>
            Numero sigarette/giorno *<br/>
            <?php
              echo "<input id=\"numSigDieAtt3\" $dis name=\"numSigDieAtt3\" style=\"width: 100%;\" readonly value=\"".$dopoN."\">";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 6px;" <?php echo "class=".$class10; ?>>
            Usa la sigaretta elettronica? *<br/>
            <select tabindex="21" id="slct" name="elettronica" style="width:75%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>
                <option value="Y">Si (specificare)</option>
                <option value="N">No</option>
            </select>
        </label>
    </div>
    <div class="col-2">
        <label id="concentrazione" style="visibility: hidden;padding-top: 6px;" <?php echo "class=".$class11; ?>>
            Concentrazione di nicotina *<br/>
            <select tabindex="22" id="conc" name="specElettronica" style="width:75%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="senza nicotina">Senza nicotina</option>
                <option value="bassa">Bassa (4,5-6 mg/ml)</option>
                <option value="media">Media (9-12 mg/ml)</option>
                <option value="alta">Alta (16-18 mg/ml)</option>
                <option value="molto alta">Molto Alta (24 mg/ml)</option>
                <option value="altissima">Altissima (36 mg/ml)</option>
            </select>
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
        </label>
    </div>
    </form>