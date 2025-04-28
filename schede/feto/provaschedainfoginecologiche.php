
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
 require_once("./db/info_morte_fetale_load.php");
 loadPage();
 require_once("./db/loadtab_madref.php");
 tab_madref();




?>
<script>
$( document ).ready(function() {
    if (('<?php echo $morti; ?>' == 'mancante') || ('<?php echo $morti; ?>' == 'nessuno') || ('<?php echo $morti; ?>' == '')){
    }
    else{
        i=(<?php echo $morti; ?>+0)*5;
        for (j=1; j<=i; j++)
        document.getElementById('d'+j).style.display='inline-block';return;
    }
});
    
$(function() {
  $('#mesiM1').keypad({
      onClose: function(value, inst) { 
        if(value > 11){
            $('#mesiM1').val(11);
        }
  }
  });   
});

$(function() {
  $('#anniM1').keypad();   
});
    
$(function() {
  $('#mesiM2').keypad({
      onClose: function(value, inst) { 
        if(value > 11){
            $('#mesiM2').val(11);
        }
  }
  });   
});

$(function() {
  $('#anniM2').keypad();   
});
 
    
$(function() {
  $('#mesiM3').keypad({
      onClose: function(value, inst) { 
        if(value > 11){
            $('#mesiM3').val(11);
        }
  }
  });   
});

$(function() {
  $('#anniM3').keypad();   
});
    
    
$(function() {
  $('#mesiM4').keypad({
      onClose: function(value, inst) { 
        if(value > 11){
            $('#mesiM4').val(11);
        }
  }
  });   
});

$(function() {
  $('#anniM4').keypad();   
});
    
$(function() {
    $( "#slct2" ).selectmenu({
         change: function(event, ui){
             var select = document.getElementById('slct2');
                var value = select.value;
                if ((value == 'mancante') || (value == 'nessuno')) {
                    for (i=1; i<=20; i++){
                        document.getElementById("d"+i).style.display = 'none';return;
                        
                    }
                }
                else {
                    for (x=1; x<=20; x++){
                        document.getElementById("d"+x).style.display = 'none'; 
                    }
                    i=value*5;
                    for (j=1; j<=i; j++)
                    document.getElementById('d'+j).style.display='inline-block';
                       return;
    
                }
         }
    });
    $("#slct2").val('<?php echo $morti; ?>')
    $('#slct2').selectmenu('refresh', true);
});
    
$(function() {
    $( "#slct1" ).selectmenu();
    $("#slct1").val('<?php echo $vivi; ?>')
    $('#slct1').selectmenu('refresh', true);
});
    
$(function() {
  $( "#dataU" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-30:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D" //new Date(2015, 10 - 10, 29) //"+0D"
    });
});
    
$(function() {
  $( "#dataN1" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-30:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D" //new Date(2015, 10 - 10, 29) //"+0D"
    });
});
    
$(function() {
  $( "#dataN2" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-30:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D" //new Date(2015, 10 - 10, 29) //"+0D"
    });
});
    

$(function() {
  $( "#dataN3" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-30:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D" //new Date(2015, 10 - 10, 29) //"+0D"
    });
});
    
 
$(function() {
  $( "#dataN4" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-30:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D" //new Date(2015, 10 - 10, 29) //"+0D"
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
</script>
<br/<br/><br/>
<form id="adminform" name="adminform" action="db/fratelli_sendf.php" method="post">
    <div class="col-3" style="width:25%;">
        <label style="padding-top:7px;" <?php echo "class=".$class1 ?>>
            Numero figli in vita * <br/>
            <select tabindex="13" id="slct1" name="figliVivi" style="width:50%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option> 
                <option value="mancante">Dato Mancante</option>
                <option value="nessuno">Nessuno</option>
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
                <option value=2>6</option>
                <option value=3>7</option>
                <option value=4>8</option>
                <option value=5>9</option>
            </select>
        </label>
    </div>
    <div class="col-3" style="width:35%;">
        <label>
            Data ultimo parto precedente<br/>
            <?php
                echo "<input type=\"text\" $dis id=\"dataU\" name=\"dataU\" value=\"".$dataU."\" readonly>";
            ?>
        </label>
    </div>
    <div class="col-3" style="width:40%;">
        <label style="padding-top:7px;" <?php echo "class=".$class3 ?>>
            Numero figli deceduti dopo la nascita * <br/>
            <select tabindex="13" id="slct2" name="figliMorti" style="width:50%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option> 
                <option value="mancante">Dato Mancante</option>
                <option value="nessuno">Nessuno</option>
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
            </select>
        </label>
    </div>
    <div class="col-1" id="d1" style="display:none;">
    <label>
        Caso #1
    </label>
    </div>
    <div class="col-3" id="d2" style="display:none;">
        <label <?php echo "class=".$class4 ?>>
            Nato il *<br/>
            <?php
                echo "<input type=\"text\" $dis id=\"dataN1\" name=\"dataN1\" value=\"".$dataN1."\" readonly>";
            ?>
        </label>
    </div>
    <div class="col-3" id="d3" style="display:none;">
        <label <?php echo "class=".$class5 ?>>
            Età in Mesi *<br/>
            <?php
                echo "<input id=\"mesiM1\" $dis name=\"mesiM1\" tabindex=\"8\" value=\"".$mesiM1."\">";
            ?>
        </label>
    </div>
    <div class="col-3" id="d4" style="display:none;">
        <label>
            Età in Anni<br/>
            <?php
                echo "<input id=\"anniM1\" $dis name=\"anniM1\" tabindex=\"8\" value=\"".$anniM1."\">";
            ?>
        </label>
    </div>
    <div class="col-1" id="d5" style="display:none;">
    <label <?php echo "class=".$class7 ?>>
        Causa *
        <textarea name="causaM1" style="height:60px;" <?php echo $dis; ?>><?php echo $causaM1; ?></textarea>
    </label>
    </div>
    
    <div class="col-1" id="d6" style="display:none;">
    <label>
        Caso #2
    </label>
    </div>
    <div class="col-3" id="d7" style="display:none;">
        <label <?php echo "class=".$class8 ?>>
            Nato il *<br/>
            <?php
                echo "<input type=\"text\" $dis id=\"dataN2\" name=\"dataN2\" value=\"".$dataN2."\" readonly>";
            ?>
        </label>
    </div>
    <div class="col-3" id="d8" style="display:none;">
        <label <?php echo "class=".$class9 ?>>
            Età in Mesi *<br/>
            <?php
                echo "<input id=\"mesiM2\" $dis name=\"mesiM2\" tabindex=\"8\" value=\"".$mesiM2."\">";
            ?>
        </label>
    </div>
    <div class="col-3" id="d9" style="display:none;">
        <label>
            Età in Anni<br/>
            <?php
                echo "<input id=\"anniM2\" $dis name=\"anniM2\" tabindex=\"8\" value=\"".$anniM2."\">";
            ?>
        </label>
    </div>
    <div class="col-1" id="d10" style="display:none;">
    <label <?php echo "class=".$class11 ?>>
        Causa *
        <textarea name="causaM2" style="height:60px;" <?php echo $dis; ?>><?php echo $causaM2; ?></textarea>
    </label>
    </div>
    
    <div class="col-1" id="d11" style="display:none;">
    <label >
        Caso #3
    </label>
    </div>
    <div class="col-3" id="d12" style="display:none;">
        <label <?php echo "class=".$class12 ?>>
            Nato il *<br/>
            <?php
                echo "<input type=\"text\" $dis id=\"dataN3\" name=\"dataN3\" value=\"".$dataN3."\" readonly>";
            ?>
        </label>
    </div>
    <div class="col-3" id="d13" style="display:none;">
        <label <?php echo "class=".$class13 ?>>
            Età in Mesi *<br/>
            <?php
                echo "<input id=\"mesiM3\" $dis name=\"mesiM3\" tabindex=\"8\" value=\"".$mesiM3."\">";
            ?>
        </label>
    </div>
    <div class="col-3" id="d14" style="display:none;">
        <label>
            Età in Anni<br/>
            <?php
                echo "<input id=\"anniM3\" $dis name=\"anniM3\" tabindex=\"8\" value=\"".$anniM3."\">";
            ?>
        </label>
    </div>
    <div class="col-1" id="d15" style="display:none;">
    <label <?php echo "class=".$class15 ?>>
        Causa *
        <textarea name="causaM3" style="height:60px;" <?php echo $dis; ?>><?php echo $causaM3; ?></textarea>
    </label>
    </div>
    
    <div class="col-1" id="d16" style="display:none;">
    <label>
        Caso #4
    </label>
    </div>
    <div class="col-3" id="d17" style="display:none;">
        <label <?php echo "class=".$class16 ?>>
            Nato il *<br/>
            <?php
                echo "<input type=\"text\" $dis id=\"dataN4\" name=\"dataN4\" value=\"".$dataN4."\" readonly>";
            ?>
        </label>
    </div>
    <div class="col-3" id="d18" style="display:none;">
        <label <?php echo "class=".$class17 ?>>
            Età in Mesi *<br/>
            <?php
                echo "<input id=\"mesiM4\" $dis name=\"mesiM4\" tabindex=\"8\" value=\"".$mesiM4."\">";
            ?>
        </label>
    </div>
    <div class="col-3" id="d19" style="display:none;">
        <label>
            Età in Anni<br/>
            <?php
                echo "<input id=\"anniM4\" $dis name=\"anniM4\" tabindex=\"8\" value=\"".$anniM4."\">";
            ?>
        </label>
    </div>
    <div class="col-1" id="d20" style="display:none;">
    <label <?php echo "class=".$class19 ?>>
        Causa *
        <textarea name="causaM4" style="height:60px;" <?php echo $dis; ?>><?php echo $causaM4; ?></textarea>
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