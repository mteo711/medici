<!--
 * User: lucaferrari
 * Date: 12/06/15
 */
 -->
<script src="js/scripts.js"></script>
<link rel="stylesheet" href="js/jquery/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link type="text/css" href="css/jquery.keypad.css" rel="stylesheet"> 
<script type="text/javascript" src="js/number/jquery.plugin.js"></script> 
<script type="text/javascript" src="js/number/jquery.keypadi.js"></script>

<?php
    if (($_SESSION["stato"] == 'chiusa') || ($_SESSION["stato"] == 'chiusa_usr')){
        $dis = "disabled";
    }
    else {
        $dis = "";
    }
require_once("./db/allattamento_load.php");
loadPage();
//require_once("./comuni/loadtab_latt.php");
require_once("./db/loadtab_latt.php");
tab_lattante();
$checked1 = "";
$checked2 = "";
$checked3 = "";
$checked4 = "";
if(isset($_POST["allattamento_materno"])){
    $materno = $_POST["allattamento_materno"];
    $class1 = "";
}
else{ 
    $materno = null;
    $class1 = "errors";
}
if((isset($_POST["allattamento_materno_nascita"]))&&($_POST["allattamento_materno_nascita"] == 'Y')){
    $matNascita = $_POST["allattamento_materno_nascita"];
    $class2 = "";
    $checked1 = "checked";
}
else{ 
    $matNascita = null;
    $class2 = "errors";
    $checked1 = "";
}
if(isset($_POST["allattamento_materno_settD"])){
    $matSetD = $_POST["allattamento_materno_settD"];
    $class3 = "";
}
else{ 
    $matSetD = null;
    $class3 = "errors";
}
if(isset($_POST["allattamento_materno_settA"])){
    $matSetA = $_POST["allattamento_materno_settA"];
    $class4 = "";
}
else{ 
    $matSetA = null;
    $class4 = "errors";
}

if(isset($_POST["allattamento_artificiale"])){
    $artificiale = $_POST["allattamento_artificiale"];
    $class5 = "";
}
else{ 
    $artificiale = null;
    $class5 = "errors";
}
if((isset($_POST["allattamento_artificiale_nascita"]))&&($_POST["allattamento_artificiale_nascita"] == 'Y')){
    $artNascita = $_POST["allattamento_artificiale_nascita"];
    $class6 = "";
    $checked2 = "checked";
}
else{ 
    $artNascita = null;
    $class6 = "errors";
    $checked2 = "";
}
if(isset($_POST["allattamento_artificiale_settD"])){
    $artSetD = $_POST["allattamento_artificiale_settD"];
    $class7 = "";
}
else{ 
    $artSetD = null;
    $class7 = "errors";
}
if(isset($_POST["allattamento_artificiale_settA"])){
    $artSetA = $_POST["allattamento_artificiale_settA"];
    $class8 = "";
}
else{ 
    $artSetA = null;
    $class8 = "errors";
}

if(isset($_POST["allattamento_misto"])){
    $misto = $_POST["allattamento_misto"];
    $class9 = "";
}
else{ 
    $misto = null;
    $class9 = "errors";
}
if((isset($_POST["allattamento_misto_nascita"]))&& ($_POST["allattamento_misto_nascita"] == 'Y')){
    $misNascita = $_POST["allattamento_misto_nascita"];
    $class10 = "";
    $checked3 = "checked";
}
else{ 
    $misNascita = null;
    $class10 = "errors";
    $checked3 = "";
}
if(isset($_POST["allattamento_misto_settD"])){
    $misSetD = $_POST["allattamento_misto_settD"];
    $class11 = "";
}
else{ 
    $misSetD = null;
    $class11 = "errors";
}
if(isset($_POST["allattamento_misto_settA"])){
    $misSetA = $_POST["allattamento_misto_settA"];
    $class12 = "";
}
else{ 
    $misSetA = null;
    $class12 = "errors";
}

if(isset($_POST["allattamento_svezzato"])){
    $svezzato = $_POST["allattamento_svezzato"];
}
else{ 
    $svezzato = null;
}
if(isset($_POST["allattamento_svezzato_settD"])){
    $sveSetD = $_POST["allattamento_svezzato_settD"];
    $class14 = "";
}
else{ 
    $sveSetD = null;
    $class14 = "errors";
}
if(isset($_POST["allattamento_svezzato_settA"])){
    $sveSetA = $_POST["allattamento_svezzato_settA"];
    $class15 = "";
}
else{ 
    $sveSetA = null;
    $class15 = "errors";
}



?>
<script>
  $( document ).ready(function() {
    if ('<?php echo $materno; ?>' == 'Y'){
    document.getElementById('speca').style.visibility = 'visible';
    document.getElementById('specc').style.visibility = 'visible';
    }
    if (('<?php echo $materno; ?>' == 'Y')&&('<?php echo $matNascita; ?>' != 'Y')){
    document.getElementById('specb').style.visibility = 'visible';
    }
    if ('<?php echo $artificiale; ?>' == 'Y'){
    document.getElementById('speca2').style.visibility = 'visible';
    document.getElementById('specc2').style.visibility = 'visible';
    }
    if (('<?php echo $artificiale; ?>' == 'Y')&&('<?php echo $artNascita; ?>' != 'Y')){
    document.getElementById('specb2').style.visibility = 'visible';
    }
    if ('<?php echo $misto; ?>' == 'Y'){
    document.getElementById('speca3').style.visibility = 'visible';
    document.getElementById('specc3').style.visibility = 'visible';
    }
    if (('<?php echo $misto; ?>' == 'Y')&&('<?php echo $misNascita; ?>' != 'Y')){
    document.getElementById('specb3').style.visibility = 'visible';
    }
    if ('<?php echo $svezzato; ?>' == 'Y'){
    document.getElementById('specb4').style.visibility = 'visible';
    document.getElementById('specc4').style.visibility = 'visible';
    }
  });
  
  $(function() {
      $('#inp1').keypad({
          onClose: function(value, inst) { 
            var inp1b = document.getElementById("inp1b").value;
            console.log(inp1b);
            var eg = new Number(inp1b);
            var epn = new Number(value);
            console.log("prima: " + eg + " dopo: " + epn);
            if(epn < eg){
                $("#inp1").val(null);
                alert('Attenzione! Il valore deve essere maggiore di dall\'età di'); 
            }
      }
      });   
  });
    
  $(function() {
      $('#inp2').keypad({
          onClose: function(value, inst) { 
            var inp2b = document.getElementById("inp2b").value;
            console.log(inp2b);
            var eg = new Number(inp2b);
            var epn = new Number(value);
            console.log("prima: " + eg + " dopo: " + epn);
            if(epn < eg){
                $("#inp2").val(null);
                alert('Attenzione! Il valore deve essere maggiore di dall\'età di'); 
            }
      }
      });   
  });
    
  $(function() {
      $('#inp3').keypad({
          onClose: function(value, inst) { 
            var inp3b = document.getElementById("inp3b").value;
            console.log(inp3b);
            var eg = new Number(inp3b);
            var epn = new Number(value);
            console.log("prima: " + eg + " dopo: " + epn);
            if(epn < eg){
                $("#inp3").val(null);
                alert('Attenzione! Il valore deve essere maggiore di dall\'età di'); 
            }
      }
      });   
  });
    
  $(function() {
      $('#inp4').keypad({
          onClose: function(value, inst) { 
            var inp4b = document.getElementById("inp4b").value;
            console.log(inp4b);
            var eg = new Number(inp4b);
            var epn = new Number(value);
            console.log("prima: " + eg + " dopo: " + epn);
            if(epn < eg){
                $("#inp4").val(null);
                alert('Attenzione! Il valore deve essere maggiore di dall\'età di'); 
            }
      }
      });   
  });
    
  $(function() {
      $('#inp1b').keypad({
          onClose: function(value, inst) { 
            var inp1 = document.getElementById("inp1").value;
            console.log(inp1);
            var eg = new Number(inp1);
            var epn = new Number(value);
            console.log("prima: " + eg + " dopo: " + epn);
            if((eg != 0) && (epn > eg)){
                $("#inp1b").val(null);
                alert('Attenzione! Il valore deve essere minore di fino all\'età di'); 
            }
      }
      });   
  });
    
  $(function() {
      $('#inp2b').keypad({
          onClose: function(value, inst) { 
            var inp2 = document.getElementById("inp2").value;
            console.log(inp2);
            var eg = new Number(inp2);
            var epn = new Number(value);
            console.log("prima: " + eg + " dopo: " + epn);
            if((eg != 0) && (epn > eg)){
                $("#inp2b").val(null);
                alert('Attenzione! Il valore deve essere minore di fino all\'età di'); 
            }
      }
      });   
  });
    
  $(function() {
      $('#inp3b').keypad({
          onClose: function(value, inst) { 
            var inp3 = document.getElementById("inp3").value;
            console.log(inp3);
            var eg = new Number(inp3);
            var epn = new Number(value);
            console.log("prima: " + eg + " dopo: " + epn);
            if((eg != 0) && (epn > eg)){
                $("#inp3b").val(null);
                alert('Attenzione! Il valore deve essere minore di fino all\'età di'); 
            }
      }
      });   
  });
    
  $(function() {
      $('#inp4b').keypad({
          onClose: function(value, inst) { 
            var inp4 = document.getElementById("inp4").value;
            console.log(inp4);
            var eg = new Number(inp4);
            var epn = new Number(value);
            console.log("prima: " + eg + " dopo: " + epn);
            if((eg != 0) && (epn > eg)){
                $("#inp4b").val(null);
                alert('Attenzione! Il valore deve essere minore di fino all\'età di'); 
            }
      }
      });   
  });
    

  $(function() {
      $( "#slct" ).selectmenu({
           change: function(event, ui){
               var select = document.getElementById('slct');
               var check = document.getElementById('cb1');
                  var value = select.value;
                  if (value == "Y") {
                     document.getElementById('speca').style.visibility = 'visible';
                     document.getElementById('specc').style.visibility = 'visible';
                     console.log("1: " + check.value);
                     if (check.checked == false){
                         console.log("2: " + check.value);
                         document.getElementById('specb').style.visibility = 'visible'; return;
                     }
                     else {
                         console.log("2: " + check.value);
                         document.getElementById('specb').style.visibility = 'hidden'; return;
                     }
                      return;
                  }
                  else{
                     document.getElementById('speca').style.visibility = 'hidden';
                     document.getElementById('specb').style.visibility = 'hidden';
                     document.getElementById('specc').style.visibility = 'hidden'; return;
                  }
                     
           }
      }); 
      $("#slct").val('<?php echo $materno; ?>')
      $('#slct').selectmenu('refresh', true);
  
  });
  $(function() {
      $( "#slct2" ).selectmenu({
           change: function(event, ui){
               var select = document.getElementById('slct2');
               var check2 = document.getElementById('cb2');
                  var value = select.value;
                  if (value == "Y") {
                     document.getElementById('speca2').style.visibility = 'visible';
                     document.getElementById('specc2').style.visibility = 'visible';
                     console.log("1: " + check2.value);
                     if (check2.checked == false){
                         console.log("2: " + check2.value);
                         document.getElementById('specb2').style.visibility = 'visible'; return;
                     }
                     else {
                         console.log("2: " + check2.value);
                         document.getElementById('specb2').style.visibility = 'hidden'; return;
                     }
                      return;
                  }
                  else{
                     document.getElementById('speca2').style.visibility = 'hidden';
                     document.getElementById('specb2').style.visibility = 'hidden';
                     document.getElementById('specc2').style.visibility = 'hidden'; return;
                  }
                     
           }
      });
      $("#slct2").val('<?php echo $artificiale; ?>')
      $('#slct2').selectmenu('refresh', true);
  
  });
  $(function() {
      $( "#slct3" ).selectmenu({
           change: function(event, ui){
               var select = document.getElementById('slct3');
               var check3 = document.getElementById('cb3');
                  var value = select.value;
                  if (value == "Y") {
                     document.getElementById('speca3').style.visibility = 'visible';
                     document.getElementById('specc3').style.visibility = 'visible';
                     console.log("1: " + check3.value);
                     if (check3.checked == false){
                         console.log("2: " + check3.value);
                         document.getElementById('specb3').style.visibility = 'visible'; return;
                     }
                     else {
                         console.log("2: " + check3.value);
                         document.getElementById('specb3').style.visibility = 'hidden'; return;
                     }
                      return;
                  }
                  else{
                     document.getElementById('speca3').style.visibility = 'hidden';
                     document.getElementById('specb3').style.visibility = 'hidden';
                     document.getElementById('specc3').style.visibility = 'hidden'; return;
                  }
                     
           }
      });
      $("#slct3").val('<?php echo $misto; ?>')
      $('#slct3').selectmenu('refresh', true);
  
  });
  $(function() {
      $( "#slct4" ).selectmenu({
            change: function(event, ui){
               var select = document.getElementById('slct4');
                  var value = select.value;
                  if (value == "Y") {
                     document.getElementById('specb4').style.visibility = 'visible';
                     document.getElementById('specc4').style.visibility = 'visible';
                     console.log("1: " + check4.value);
                     return;
                  }
                  else{
                     document.getElementById('specb4').style.visibility = 'hidden';
                     document.getElementById('specc4').style.visibility = 'hidden'; return;
                  }
                     
           }
      });
      $("#slct4").val('<?php echo $svezzato; ?>')
      $('#slct4').selectmenu('refresh', true);
  
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
<form id="adminform" name="adminform" action="db/allattamento_send.php" method="post">
    <div class="col-4">
        <label style="padding-top: 7px;" <?php echo "class=".$class1; ?> >
            Materno *<br/>
            <select tabindex="17" id="slct" style="width: 75%;" name="materno" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>
                <option value="Y">Si</option>
                <option value="N">No</option>
            </select>
        </label>
    </div>
    <div class="col-4">
        <label id="speca" style="visibility: hidden; padding-top: 9px;">
            Dalla nascita *<br/>
            <input type="checkbox" style="margin-bottom: 0px;" name="matNascita" value="Y" id="cb1" onclick="logob('cb1', 'specb');" <?php echo $checked1."  ".$dis;?>>
        </label>
    </div>
    <div class="col-4">
        <label id="specb" style="visibility: hidden; padding-top: 5px;"  <?php echo "class=".$class3; ?>>
            Dall'età di *<br/>
            <?php echo "<input placeholder=\"settimane\" $dis id=\"inp1b\" name=\"matSettDa\" tabindex=\"18\" style=\"width: 100%;\" value=\"".$matSetD."\" readonly>"; ?>
        </label>
    </div>
    <div class="col-4">
        <label id="specc" style="visibility: hidden; padding-top: 5px;"  <?php echo "class=".$class4; ?>>
            Fino all'età di *<br/>
            <?php echo "<input placeholder=\"settimane\" $dis id=\"inp1\" name=\"matSettA\" tabindex=\"18\" style=\"width: 100%;\" value=\"".$matSetA."\" readonly>"; ?>
        </label>
    </div>
    <div class="col-4">
        <label style="padding-top: 7px;" <?php echo "class=".$class5; ?>>
            Artificiale *<br/>
            <select tabindex="17" id="slct2" style="width:75%;" name="artificiale" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>
                <option value="Y">Si</option>
                <option value="N">No</option>
            </select>
        </label>
    </div>
    <div class="col-4">
        <label id="speca2" style="visibility: hidden; padding-top: 9px;">
            Dalla nascita *<br/>
            <input type="checkbox" style="margin-bottom: 0px;" name="artNascita" value="Y" id="cb2" onclick="logob('cb2', 'specb2');" <?php echo $checked2."  ".$dis;?>>
        </label>
    </div>
    <div class="col-4">
        <label id="specb2" style="visibility: hidden; padding-top: 5px;"  <?php echo "class=".$class7; ?>>
            Dall'età di *<br/>
            <?php echo "<input placeholder=\"settimane\" $dis id=\"inp2b\" name=\"artSettDa\" tabindex=\"18\" style=\"width: 100%;\" value=\"".$artSetD."\" readonly>"; ?>
        </label>
    </div>
    <div class="col-4">
        <label id="specc2" style="visibility: hidden; padding-top: 5px;" <?php echo "class=".$class8; ?>>
            Fino all'età di *<br/>
            <?php echo "<input placeholder=\"settimane\" $dis id=\"inp2\" name=\"artSettA\" tabindex=\"19\" style=\"width: 100%;\" value=\"".$artSetA."\" readonly>"; ?>
        </label>
    </div>
    <div class="col-4">
        <label style="padding-top: 7px;" <?php echo "class=".$class9; ?>>
            Misto *<br/>
            <select tabindex="17" id="slct3" style="width: 75%;" name="misto" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>
                <option value="Y">Si</option>
                <option value="N">No</option>
            </select>
        </label>
    </div>
    <div class="col-4">
        <label id="speca3" style="visibility: hidden; padding-top: 9px;">
            Dalla nascita *<br/>
            <input type="checkbox" style="margin-bottom: 0px;" name="misNascita" value="Y" id="cb3" onclick="logob('cb3', 'specb3');" <?php echo $checked3."  ".$dis;?>>
        </label>
    </div>
    <div class="col-4">
        <label id="specb3" style="visibility: hidden; padding-top: 5px;"  <?php echo "class=".$class11; ?>>
            Dall'età di *<br/>
            <?php echo "<input placeholder=\"settimane\" $dis id=\"inp3b\" name=\"misSettDa\" tabindex=\"18\" style=\"width: 100%;\" value=\"".$misSetD."\" readonly>"; ?>
        </label>
    </div>
    <div class="col-4">
        <label id="specc3" style="visibility: hidden; padding-top: 5px;" <?php echo "class=".$class12; ?>>
            Fino all'età di *<br/>
            <?php echo "<input placeholder=\"settimane\" $dis id=\"inp3\" name=\"misSettA\" tabindex=\"20\" style=\"width: 100%;\" value=\"".$misSetA."\" readonly>"; ?>
        </label>
    </div>
    <div class="col-4">
        <label style="padding-top: 6px;">
            Svezzato<br/>
            <select tabindex="17" id="slct4" style="width: 75%;" name="svezzato" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>
                <option value="Y">Si</option>
                <option value="N">No</option>
            </select>
        </label>
    </div>
    <div class="col-4">
        <label id="specb4" style="visibility: hidden; padding-top: 5px;"  <?php echo "class=".$class14; ?>>
            Dall'età di *<br/>
            <?php echo "<input placeholder=\"settimane\" $dis id=\"inp4b\" name=\"sveSettDa\" tabindex=\"18\" style=\"width: 100%;\" value=\"".$sveSetD."\" readonly>"; ?>
        </label>
    </div>
    <div class="col-4">
        <label id="specc4" style="visibility: hidden;padding-top: 5px;" <?php echo "class=".$class15; ?>>
            Fino all'età di *<br/>
            <?php echo "<input placeholder=\"settimane\" $dis id=\"inp4\" name=\"sveSettA\" tabindex=\"21\" style=\"width: 100%;\" value=\"".$sveSetA."\" readonly>"; ?>
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