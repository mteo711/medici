
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
require_once("./db/parti_prec_load.php");
loadPage();
require_once("./db/loadtab_madref.php");
tab_madref();

if(isset($_POST["parti_prec_aborti"])){
    $aborti = $_POST["parti_prec_aborti"];
    $class1 = "";
}
else {
    $aborti = null;
    $class1 = "errors";
}

if(isset($_POST["parti_prec_tipo1"])){
    $tipo1 = $_POST["parti_prec_tipo1"];
    $class2 = "";
}
else {
    $tipo1 = null;
    $class2 = "errors";
}
if(isset($_POST["parti_prec_sett1"])){
    $sett1 = $_POST["parti_prec_sett1"];
    $class3 = "";
}
else {
    $sett1 = null;
    $class3 = "errors";
}

if(isset($_POST["parti_prec_tipo2"])){
    $tipo2 = $_POST["parti_prec_tipo2"];
    $class4 = "";
}
else {
    $tipo2 = null;
    $class4 = "errors";
}
if(isset($_POST["parti_prec_sett2"])){
    $sett2 = $_POST["parti_prec_sett2"];
    $class5 = "";
}
else {
    $sett2 = null;
    $class5 = "errors";
}

if(isset($_POST["parti_prec_tipo3"])){
    $tipo3 = $_POST["parti_prec_tipo3"];
    $class6 = "";
}
else {
    $tipo3 = null;
    $class6 = "errors";
}
if(isset($_POST["parti_prec_sett3"])){
    $sett3 = $_POST["parti_prec_sett3"];
    $class7 = "";
}
else {
    $sett3 = null;
    $class7 = "errors";
}

if(isset($_POST["parti_prec_tipo4"])){
    $tipo4 = $_POST["parti_prec_tipo4"];
    $class8 = "";
}
else {
    $tipo4 = null;
    $class8 = "errors";
}
if(isset($_POST["parti_prec_sett4"])){
    $sett4 = $_POST["parti_prec_sett4"];
    $class9 = "";
}
else {
    $sett4 = null;
    $class9 = "errors";
}

if(isset($_POST["parti_prec_tipo5"])){
    $tipo5 = $_POST["parti_prec_tipo5"];
    $class10 = "";
}
else {
    $tipo5 = null;
    $class10 = "errors";
}
if(isset($_POST["parti_prec_sett5"])){
    $sett5 = $_POST["parti_prec_sett5"];
    $class11 = "";
}
else {
    $sett5 = null;
    $class11 = "errors";
}


?>
<script>
$( document ).ready(function() {
    if (('<?php echo $aborti; ?>' == 'mancante') || ('<?php echo $aborti; ?>' == 'nessuno') || ('<?php echo $aborti; ?>' == '')){
    }
    else{
        i=(<?php echo $aborti; ?>+0)*3;
        for (j=1; j<=i; j++)
        document.getElementById('d'+j).style.display='inline-block';return;
    }
});
    
$(function() {
  $('#settimana1').keypad({
      onClose: function(value, inst) { 
        if(value > 42){
            $('#settimana1').val(42);
        }
  }
  });   
});

$(function() {
  $('#settimana2').keypad({
      onClose: function(value, inst) { 
        if(value > 42){
            $('#settimana2').val(42);
        }
  }
  });   
});
    
$(function() {
  $('#settimana3').keypad({
      onClose: function(value, inst) { 
        if(value > 42){
            $('#settimana3').val(42);
        }
  }
  });   
});
    
$(function() {
  $('#settimana4').keypad({
      onClose: function(value, inst) { 
        if(value > 42){
            $('#settimana4').val(42);
        }
  }
  });   
});
    
$(function() {
  $('#settimana5').keypad({
      onClose: function(value, inst) { 
        if(value > 42){
            $('#settimana5').val(42);
        }
  }
  });   
});
    
$(function() {
    $( "#slct1" ).selectmenu({
         change: function(event, ui){
             var select = document.getElementById('slct1');
                var value = select.value;
                if ((value == 'mancante') || (value == 'nessuno')) {
                    for (i=1; i<=15; i++){
                        document.getElementById("d"+i).style.display = 'none';
                        
                    }
                }
                else {
                    for (x=1; x<=15; x++){
                        document.getElementById("d"+x).style.display = 'none'; 
                    }
                    i=value*3;
                    for (j=1; j<=i; j++)
                    document.getElementById('d'+j).style.display='inline-block';
                       return;
    
                }
         }
    });
    $("#slct1").val('<?php echo $aborti; ?>')
    $('#slct1').selectmenu('refresh', true);
});
    
$(function() {
    $( "#slct2" ).selectmenu();
    $("#slct2").val('<?php echo $tipo1; ?>')
    $('#slct2').selectmenu('refresh', true);
});
    

$(function() {
    $( "#slct3" ).selectmenu();
    $("#slct3").val('<?php echo $tipo2; ?>')
    $('#slct3').selectmenu('refresh', true);
});
   
$(function() {
    $( "#slct4" ).selectmenu();
    $("#slct4").val('<?php echo $tipo3; ?>')
    $('#slct4').selectmenu('refresh', true);
});

$(function() {
    $( "#slct5" ).selectmenu();
    $("#slct5").val('<?php echo $tipo4; ?>')
    $('#slct5').selectmenu('refresh', true);
});
    
$(function() {
    $( "#slct6" ).selectmenu();
    $("#slct6").val('<?php echo $tipo5; ?>')
    $('#slct6').selectmenu('refresh', true);
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
<form id="adminform" name="adminform" action="db/parti_prec_sendf.php" method="post">
    <div class="col-1">
        <label <?php echo "class=".$class1 ?>>
            Numero aborti precedenti * <br/>
            <select tabindex="13" id="slct1" name="aborti" style="width:50%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option> 
                <option value="mancante">Dato Mancante</option>
                <option value="nessuno">Nessuno</option>
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
            </select>
        </label>
    </div>
    <div class="col-3" id="d1" style="display:none;">
    <label>
        &nbsp; &nbsp; Caso #1
    </label>
    </div>
    <div class="col-3" id="d2" style="display:none;">
        <label style="padding-top:7px;" <?php echo "class=".$class2 ?>>
            Tipologia * <br/>
            <select tabindex="13" id="slct2" name="tipo1" style="width:100%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option> 
                <option value="feto">Feto morto dopo la 25a settimana</option>
                <option value="aborto">Aborto spontaneo</option>
                <option value="ivg">Interruzione Volontaria di Gravidanza (IVG)</option>
            </select>
        </label>
    </div>
    <div class="col-3" id="d3" style="display:none;">
        <label <?php echo "class=".$class3 ?>>
            Settimana dell'aborto *<br/>
              <input placeholder="Da 0 a 42" id="settimana1" name="settimana1" style="width: 100%;" value="<?php echo $sett1; ?>" readonly  <?php echo $dis; ?>>
        </label>
    </div>
    
    <div class="col-3" id="d4" style="display:none;">
    <label>
        &nbsp; &nbsp; Caso #2
    </label>
    </div>
    <div class="col-3" id="d5" style="display:none;">
        <label style="padding-top:7px;" <?php echo "class=".$class4 ?>>
            Tipologia * <br/>
            <select tabindex="13" id="slct3" name="tipo2" style="width:100%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option> 
                <option value="feto">Feto morto dopo la 25a settimana</option>
                <option value="aborto">Aborto spontaneo</option>
                <option value="ivg">Interruzione Volontaria di Gravidanza (IVG)</option>
            </select>
        </label>
    </div>
    <div class="col-3" id="d6" style="display:none;">
        <label <?php echo "class=".$class5 ?> >
            Settimana dell'aborto *<br/>
              <input placeholder="Da 0 a 42" id="settimana2" name="settimana2" style="width: 100%;" value="<?php echo $sett2; ?>" readonly  <?php echo $dis; ?>>
        </label>
    </div>
    
    <div class="col-3" id="d7" style="display:none;">
    <label>
        &nbsp; &nbsp; Caso #3
    </label>
    </div>
    <div class="col-3" id="d8" style="display:none;">
        <label style="padding-top:7px;" <?php echo "class=".$class6 ?>>
            Tipologia * <br/>
            <select tabindex="13" id="slct4" name="tipo3" style="width:100%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option> 
                <option value="feto">Feto morto dopo la 25a settimana</option>
                <option value="aborto">Aborto spontaneo</option>
                <option value="ivg">Interruzione Volontaria di Gravidanza (IVG)</option>
            </select>
        </label>
    </div>
    <div class="col-3" id="d9" style="display:none;">
        <label <?php echo "class=".$class7 ?>>
            Settimana dell'aborto *<br/>
              <input placeholder="Da 0 a 42" id="settimana3" name="settimana3" style="width: 100%;" value="<?php echo $sett3; ?>" readonly  <?php echo $dis; ?>>
        </label>
    </div>
    
    <div class="col-3" id="d10" style="display:none;">
    <label>
        &nbsp; &nbsp; Caso #4
    </label>
    </div>
    <div class="col-3" id="d11" style="display:none;">
        <label style="padding-top:7px;" <?php echo "class=".$class8 ?>>
            Tipologia * <br/>
            <select tabindex="13" id="slct5" name="tipo4" style="width:100%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option> 
                <option value="feto">Feto morto dopo la 25a settimana</option>
                <option value="aborto">Aborto spontaneo</option>
                <option value="ivg">Interruzione Volontaria di Gravidanza (IVG)</option>
            </select>
        </label>
    </div>
    <div class="col-3" id="d12" style="display:none;">
        <label <?php echo "class=".$class9 ?>>
            Settimana dell'aborto *<br/>
              <input placeholder="Da 0 a 42" id="settimana4" name="settimana4" style="width: 100%;" value="<?php echo $sett4; ?>" readonly  <?php echo $dis; ?>>
        </label>
    </div>
    
    <div class="col-3" id="d13" style="display:none;">
    <label>
        &nbsp; &nbsp; Caso #5
    </label>
    </div>
    <div class="col-3" id="d14" style="display:none;">
        <label style="padding-top:7px;" <?php echo "class=".$class10 ?>>
            Tipologia * <br/>
            <select tabindex="13" id="slct6" name="tipo5" style="width:100%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option> 
                <option value="feto">Feto morto dopo la 25a settimana</option>
                <option value="aborto">Aborto spontaneo</option>
                <option value="ivg">Interruzione Volontaria di Gravidanza (IVG)</option>
            </select>
        </label>
    </div>
    <div class="col-3" id="d15" style="display:none;">
        <label <?php echo "class=".$class11 ?>>
            Settimana dell'aborto *<br/>
              <input placeholder="Da 0 a 42" id="settimana5" name="settimana5" style="width: 100%;" value="<?php echo $sett5; ?>" readonly  <?php echo $dis; ?>>
        </label>
    </div>
    <div class="col-9">
        <label style="font-size: 10px; color: #e80d0d;">
               * Campi obbligatori. <br/>
               <sup>1</sup> Inserire prima la data di nascita in Madre > Dati personali.
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