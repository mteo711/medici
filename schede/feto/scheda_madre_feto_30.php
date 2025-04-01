
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
 require_once("./db/fumo_passivo_load.php");
 loadPage();
 require_once("./db/loadtab_madref.php");
 tab_madref();
 if(isset($_POST["fumo_pass_prima"])){
     $prima = $_POST["fumo_pass_prima"];
     $class1 = "";
 }
 else {
     $prima = null;
     $class1 = "errors";
 }
 if(isset($_POST["fumo_pass_primaA"])){
     $primaA = $_POST["fumo_pass_primaA"];
     $class2 = "";
 }
 else {
     $primaA = null;
     $class2 = "errors";
 }
 if(isset($_POST["fumo_pass_primaD"])){
     $primaD = $_POST["fumo_pass_primaD"];
     $class3 = "";
 }
 else {
     $primaD = null;
     $class3 = "errors";
 }
 if(isset($_POST["fumo_pass_durante"])){
     $durante = $_POST["fumo_pass_durante"];
     $class4 = "";
 }
 else {
     $durante = null;
     $class4 = "errors";
 }
 if(isset($_POST["fumo_pass_duranteA"])){
     $duranteA = $_POST["fumo_pass_duranteA"];
     $class5 = "";
 }
 else {
     $duranteA = null;
     $class5 = "errors";
 }
 if(isset($_POST["fumo_pass_duranteD"])){
     $duranteD = $_POST["fumo_pass_duranteD"];
     $class6 = "";
 }
 else {
     $duranteD = null;
     $class6 = "errors";
 }
 if(isset($_POST["fumo_pass_dopo"])){
     $dopo = $_POST["fumo_pass_dopo"];
     $class7 = "";
 }
 else {
     $dopo = null;
     $class7 = "errors";
 }
 if(isset($_POST["fumo_pass_dopoA"])){
     $dopoA = $_POST["fumo_pass_dopoA"];
     $class8 = "";
 }
 else {
     $dopoA = null;
     $class8 = "errors";
 }
 if(isset($_POST["fumo_pass_dopoD"])){
     $dopoD = $_POST["fumo_pass_dopoD"];
     $class9 = "";
 }
 else {
     $dopoD = null;
     $class9 = "errors";
 }
?>
<script>
$( document ).ready(function() {
    if ('<?php echo $prima; ?>' == 'Y'){
       document.getElementById('pprima').style.visibility='visible';           
       document.getElementById('pprima2').style.visibility='visible';
    }
    if ('<?php echo $durante; ?>' == 'Y'){
       document.getElementById('pdurante').style.visibility='visible';       
       document.getElementById('pdurante2').style.visibility='visible';
    }
    if ('<?php echo $dopo; ?>' == 'Y'){
       document.getElementById('pdopo').style.visibility='visible';  
       document.getElementById('pdopo2').style.visibility='visible';
    }
  });
    
  $(function() {
      $('#etaSigPass1').keypad();    
  });
  
  $(function() {
      $('#etaSigPass2').keypad();    
  });
    
  $(function() {
      $('#etaSigPass3').keypad();    
  });
    
  $(function() {
      $( "#slct4" ).selectmenu({
           change: function(event, ui){
               var select = document.getElementById('slct4');
                  var value = select.value;
                  if (value == 'Y') {
                     document.getElementById('pprima').style.visibility='visible';
                     document.getElementById('pprima2').style.visibility='visible'; return;
                  }
                  else {
                      document.getElementById('pprima').style.visibility='hidden';
                      document.getElementById('pprima2').style.visibility='hidden'; return;
                  }

           }
      });
      $("#slct4").val('<?php echo $prima; ?>')
      $('#slct4').selectmenu('refresh', true);

  });
  $(function() {
      $( "#slct5" ).selectmenu({
           change: function(event, ui){
               var select = document.getElementById('slct5');
                  var value = select.value;
                  if (value == 'Y') {
                     document.getElementById('pdurante').style.visibility='visible';
                     document.getElementById('pdurante2').style.visibility='visible'; return;
                  }
                  else {
                      document.getElementById('pdurante').style.visibility='hidden';
                      document.getElementById('pdurante2').style.visibility='hidden'; return;
                  }

           }
      });
      $("#slct5").val('<?php echo $durante; ?>')
      $('#slct5').selectmenu('refresh', true);

  });
  $(function() {
      $( "#slct6" ).selectmenu({
           change: function(event, ui){
               var select = document.getElementById('slct6');
                  var value = select.value;
                  if (value == 'Y') {
                     document.getElementById('pdopo').style.visibility='visible';
                     document.getElementById('pdopo2').style.visibility='visible'; return;
                  }
                  else {
                      document.getElementById('pdopo').style.visibility='hidden';
                      document.getElementById('pdopo2').style.visibility='hidden'; return;
                  }

           }
      });
      $("#slct6").val('<?php echo $dopo; ?>')
      $('#slct6').selectmenu('refresh', true);

  });
    
  $(function() {
      $( "#p4" ).selectmenu();
      $('#p4').val('<?php echo $primaD; ?>');
      $('#p4').selectmenu('refresh', true);
      
  });
  $(function() {
      $( "#p5" ).selectmenu();
      $('#p5').val('<?php echo $duranteD; ?>');
      $('#p5').selectmenu('refresh', true);
  });
  $(function() {
      $( "#p6" ).selectmenu();
      $('#p6').val('<?php echo $dopoD; ?>');
      $('#p6').selectmenu('refresh', true);
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
<form id="adminform" name="adminform" action="db/fumo_passivo_sendf.php" method="post">
    <div class="col-3">
        <label style="padding-top: 9px;" <?php echo "class=".$class1; ?>>
            Prima del concepimento *<br/>
            <select tabindex="32" id="slct4" name="prima" style="width:75%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="Y">Si (specificare)</option>
                <option value="N">No</option>
            </select>
        </label>
    </div>
    <div class="col-3">
        <label id="pprima" style="visibility: hidden;padding-top: 7px;" <?php echo "class=".$class2; ?>>
            Dall'età di *<br/>
            <?php
             echo "<input id=\"etaSigPass1\" name=\"etaSigPass1\" $dis style=\"width: 100%;\" readonly value=\"".$primaA."\">";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label id="pprima2" style="visibility: hidden;padding-top: 9px;" <?php echo "class=".$class3; ?>>
            Casa/Lavoro *<br/>
            <select tabindex="34" id="p4" name="dovePrima" style="width:75%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="casa">Casa</option>
                <option value="lavoro">Lavoro</option>
            </select>
        </label>
    </div>
    <div class="col-3">
        <label style="padding-top: 9px;" <?php echo "class=".$class4; ?>>
            Durante la gravidanza *<br/>
            <select tabindex="35" id="slct5" name="durante" style="width:75%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="Y">Si (specificare)</option>
                <option value="N">No</option>
            </select>
        </label>
    </div>
    <div class="col-3">
        <label id="pdurante" style="visibility: hidden;padding-top: 7px;" <?php echo "class=".$class5; ?>>
            Fino alla settimana di gestazione *<br/>
            <?php
             echo "<input id=\"etaSigPass2\" name=\"etaSigPass2\" $dis style=\"width: 100%;\" readonly value=\"".$duranteA."\">";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label id="pdurante2" style="visibility: hidden;padding-top:9px;" <?php echo "class=".$class6; ?>>
            Casa/Lavoro *<br/>
            <select tabindex="37" id="p5" name="doveDurante" style="width:75%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="casa">Casa</option>
                <option value="lavoro">Lavoro</option>
            </select>
        </label>
    </div>
    <div class="col-3">
        <label style="padding-top: 9px;" <?php echo "class=".$class7; ?>>
            Dopo il parto *<br/>
            <select tabindex="38" id="slct6" name="dopo" style="width:75%;" <?php echo $dis; ?>>
                <option value="">&nbsp </option>
                <option value="Y">Si (specificare)</option>
                <option value="N">No</option>                
            </select>
        </label>
    </div>
    <div class="col-3">
        <label id="pdopo" style="visibility: hidden;padding-top: 7px;" <?php echo "class=".$class8; ?>>
            Fino all'età del bambino di giorni *<br/>
            <?php
             echo "<input id=\"etaSigPass3\" name=\"etaSigPass3\" $dis style=\"width: 100%;\" readonly value=\"".$dopoA."\">";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label id="pdopo2" style="visibility: hidden;padding-top: 9px;" <?php echo "class=".$class9; ?>>
            Casa/Lavoro *<br/>
            <select tabindex="40" id="p6" name="doveDopo" style="width:75%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="casa">Casa</option>
                <option value="lavoro">Lavoro</option>
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