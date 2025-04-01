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

 require_once("./db/patologie_gest_load.php");
 loadPage();
 require_once("./db/loadtab_madre.php");
 tab_madre();
 $checked1 = "";
 $checked2 = "";
 $checked3 = "";
 $checked4 = "";
 $checked5 = "";
 $checked6 = "";
 $checked7 = "";
 $checked8 = "";
 $checked9 = "";
 $checked10 = "";
 $checked11 = "";
 $checked12 = "";
 $checked13 = "";
 $checked14 = "";
 $checked15 = "";
 $checked16 = "";
 $checked17 = "";
 if(isset($_POST["patologie_gest_ipertensione"])){
     $ipertensione = $_POST["patologie_gest_ipertensione"];
     $class1 = "";
 }
 else {
     $ipertensione = null;
     $class1 = "errors";
 }
 if(isset($_POST["patologie_gest_specI"])){
     $specI = $_POST["patologie_gest_specI"];
     $class2 = "";
 }
 else {
     $specI = null;
     $class2 = "errors";
 }
 if(isset($_POST["patologie_gest_diabete"])){
     $diabete = $_POST["patologie_gest_diabete"];
     $class3 = "";
 }
 else {
     $diabete = null;
     $class3 = "errors";
 }
 if(isset($_POST["patologie_gest_specD"])){
     $specD = $_POST["patologie_gest_specD"];
     $class4 = "";
 }
 else {
     $specD = null;
     $class4 = "errors";
 }
 if(isset($_POST["patologie_gest_emoglobina"])){
     $emoglobina = $_POST["patologie_gest_emoglobina"];
     $class5 = "";
 }
 else {
     $emoglobina = null;
     $class5 = "errors";
 }
 if(isset($_POST["patologie_gest_tipoE"])){
     $tipoE = $_POST["patologie_gest_tipoE"];
     $class6 = "";
 }
 else {
     $tipoE = null;
     $class6 = "errors";
 }
 if(isset($_POST["patologie_gest_specE"])){
     $specE = $_POST["patologie_gest_specE"];
     $class7 = "";
 }
 else {
     $specE = null;
     $class7 = "errors";
 }
 if(isset($_POST["patologie_gest_coagulazione"])){
     $coagulazione = $_POST["patologie_gest_coagulazione"];
     $class8 = "";
 }
 else {
     $coagulazione = null;
     $class8 = "errors";
 }
 if(isset($_POST["patologie_gest_autoimmuni"])){
     $autoimmuni = $_POST["patologie_gest_autoimmuni"];
     $class9 = "";
 }
 else {
     $autoimmuni = null;
     $class9 = "errors";
 }
 if(isset($_POST["patologie_gest_infezioni"])){
     $infezioni = $_POST["patologie_gest_infezioni"];
     $class19 = "";
 }
 else {
     $infezioni = null;
     $class19 = "errors";
 }
 if(isset($_POST["patologie_gest_tipoPre"])){
     $tipoPre = $_POST["patologie_gest_tipoPre"];
     $class10 = "";
     $check = explode(",", $tipoPre);
     (in_array("hiv", $check)) ? $checked1 = "checked" : $checked1 = "";
     (in_array("hbv", $check)) ? $checked2 = "checked" : $checked2 = "";
     (in_array("hcv", $check)) ? $checked3 = "checked" : $checked3 = "";
     (in_array("lue", $check)) ? $checked4 = "checked" : $checked4 = "";
     (in_array("toxo", $check)) ? $checked5 = "checked" : $checked5 = "";
     (in_array("rubeo", $check)) ? $checked6 = "checked" : $checked6 = "";
 }
 else{ 
     $tipoPre = null;
     $class10 = "errors";
 }
 if(isset($_POST["patologie_gest_specPre"])){
     $specPre = $_POST["patologie_gest_specPre"];
     $class11 = "";
 }
 else {
     $specPre = null;
     $class11 = "errors";
 }
 if(isset($_POST["patologie_gest_tipoPeri"])){
     $tipoPeri = $_POST["patologie_gest_tipoPeri"];
     $class12 = "";
     $check = explode(",", $tipoPeri);
     (in_array("hiv", $check)) ? $checked7 = "checked" : $checked7 = "";
     (in_array("hbv", $check)) ? $checked8 = "checked" : $checked8 = "";
     (in_array("hcv", $check)) ? $checked9 = "checked" : $checked9 = "";
     (in_array("lue", $check)) ? $checked10 = "checked" : $checked10 = "";
     (in_array("toxo", $check)) ? $checked11 = "checked" : $checked11 = "";
     (in_array("rubeo", $check)) ? $checked12 = "checked" : $checked12 = "";
 }
 else{ 
     $tipoPeri = null;
     $class12 = "errors";
 }
 if(isset($_POST["patologie_gest_specPeri"])){
     $specPeri = $_POST["patologie_gest_specPeri"];
     $class13 = "";
 }
 else {
     $specPeri = null;
     $class13 = "errors";
 }
 if(($class10 == "errors")&&($class11 == "errors")&&($class12 == "errors")&&($class13 == "errors")){
     $class14 = "errors";
 }
 else{
     $class14 = "";
 }
 if(isset($_POST["patologie_gest_patologie"])){
     $patologie = $_POST["patologie_gest_patologie"];
     $class15 = "";
 }
 else {
     $patologie = null;
     $class15 = "errors";
 }
 if(isset($_POST["patologie_gest_tipoP"])){
     $tipoP = $_POST["patologie_gest_tipoP"];
     $class16 = "";
     $check = explode(",", $tipoP);
     (in_array("disturbi tiroide", $check)) ? $checked13 = "checked" : $checked13 = "";
     (in_array("cardiopatia", $check)) ? $checked14 = "checked" : $checked14 = "";
     (in_array("patologie renali", $check)) ? $checked15 = "checked" : $checked15 = "";
     (in_array("colestasi gravidica", $check)) ? $checked16 = "checked" : $checked16 = "";
     (in_array("parodontopatie", $check)) ? $checked17 = "checked" : $checked17 = "";
 }
 else{ 
     $tipoP = null;
     $class16 = "errors";
 }
 if(isset($_POST["patologie_gest_specP"])){
     $specP = $_POST["patologie_gest_specP"];
     $class17 = "";
 }
 else {
     $specP = null;
     $class17 = "errors";
 }
 if(($class16 == "errors")&&($class17 == "errors")){
     $class18 = "errors";
 }
 else{
     $class18 = "";
 }
?>
<script>
    $( document ).ready(function() {
    if ('<?php echo $ipertensione; ?>' == 'Y'){
    document.getElementById('ipertensiva').style.visibility = 'visible';
    }
    if ('<?php echo $diabete; ?>' == 'Y'){
    document.getElementById('diabete').style.visibility = 'visible';
    }
    if ('<?php echo $emoglobina; ?>' == 'Y'){
    document.getElementById('emoglobina').style.visibility = 'visible';
    }
    if ('<?php echo $tipoE; ?>' == 'altro'){
    document.getElementById('tipoemo').style.visibility = 'visible';
    }
    if ('<?php echo $infezioni; ?>' == 'Y'){
    for (i=0; i<30; i++)
       document.getElementById('p'+i).style.display='inline-block';
    }
    if ('<?php echo $patologie; ?>' == 'Y'){
    for (j=1; j<13; j++)
       document.getElementById('d'+j).style.display='inline-block';
    }
  });
$(function() {
    $( "#slct1" ).selectmenu({
         change: function(event, ui){
             var select = document.getElementById('slct1');
                var value = select.value;
                if (value == 'Y') {
                   document.getElementById('ipertensiva').style.visibility='visible'; return;
                }
                   document.getElementById('ipertensiva').style.visibility='hidden'; return;
         }
    });
    $("#slct1").val('<?php echo $ipertensione; ?>')
    $('#slct1').selectmenu('refresh', true);

});
    
$(function() {
    $( "#slct2" ).selectmenu({
         change: function(event, ui){
             var select = document.getElementById('slct2');
                var value = select.value;
                if (value == 'Y') {
                   document.getElementById('diabete').style.visibility='visible'; return;
                }
                   document.getElementById('diabete').style.visibility='hidden'; return;
         }
    });
    $("#slct2").val('<?php echo $diabete; ?>')
    $('#slct2').selectmenu('refresh', true);
});
    
$(function() {
    $( "#slct3" ).selectmenu({
         change: function(event, ui){
             var select = document.getElementById('slct3');
                var value = select.value;
                if (value == 'Y') {
                   var element = document.getElementById('slct3b');
                   element.value = '';
                   document.getElementById('emoglobina').style.visibility='visible'; return;
                }
                else {
                    document.getElementById('emoglobina').style.visibility='hidden';
                    document.getElementById('tipoemo').style.visibility='hidden'; return;
                }

         }
    });
    $("#slct3").val('<?php echo $emoglobina; ?>')
    $('#slct3').selectmenu('refresh', true);

});
$(function() {
    $( "#slct3b" ).selectmenu({
         change: function(event, ui){
             var select = document.getElementById('slct3b');
                var value = select.value;
                if (value == 'altro') {
                   document.getElementById('tipoemo').style.visibility='visible'; return;
                }
                   document.getElementById('tipoemo').style.visibility='hidden'; return;
         }
    });
    $("#slct3b").val('<?php echo $tipoE; ?>')
    $('#slct3b').selectmenu('refresh', true);

});
$(function() {
    $( "#slctInf" ).selectmenu({
         change: function(event, ui){
             i=0;
             var select = document.getElementById('slctInf');
             var value = select.value;
             if (value == 'Y') {
                 for (i=0; i<30; i++)
                 document.getElementById('p'+i).style.display='inline-block';
                        return;
             }
             else {
                 for (i=0; i<30; i++)
                 document.getElementById('p'+i).style.display='none';
                        return;
             }
         }
    });
    $("#slctInf").val('<?php echo $infezioni; ?>')
    $('#slctInf').selectmenu('refresh', true);

});
$(function() {
    $( "#slct6" ).selectmenu({
         change: function(event, ui){
             j=1;
                var select = document.getElementById('slct6');
                var value = select.value;
                if (value == 'Y') {
                    for (j=1; j<13; j++)
                    document.getElementById('d'+j).style.display='inline-block';
                           return;
                }
                else {
                    for (j=1; j<13;j++)
                    document.getElementById('d'+j).style.display='none';
                           return;  
                }
         }
    });
    $("#slct6").val('<?php echo $patologie; ?>')
    $('#slct6').selectmenu('refresh', true);

});

$(function() {
    $( "#gest1" ).selectmenu();
    $('#gest1').val('<?php echo $specI; ?>');
    $('#gest1').selectmenu('refresh', true);
});
$(function() {
    $( "#gest2" ).selectmenu();
    $('#gest2').val('<?php echo $specD; ?>');
    $('#gest2').selectmenu('refresh', true);
});
$(function() {
    $( "#alter" ).selectmenu();
    $('#alter').val('<?php echo $coagulazione; ?>');
    $('#alter').selectmenu('refresh', true);
});
$(function() {
    $( "#malattie" ).selectmenu();
    $('#malattie').val('<?php echo $autoimmuni; ?>');
    $('#malattie').selectmenu('refresh', true);
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
<form id="adminform" name="adminform" action="db/patologie_gest_send.php" method="post">
    <div class="col-2">
        <label style="padding-top: 7px;" <?php echo "class=".$class1; ?>>
            Malattia ipertensiva *<br/>
            <select tabindex="1" id="slct1" name="ipertensiva" style="width:75%;" <?php echo $dis ?>>
                <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>
                <option value="Y">Si (specificare)</option>
                <option value="N">No</option>
            </select>
        </label>
    </div>
    <div class="col-2">
        <label id="ipertensiva" style="visibility: hidden;padding-top: 7px;" <?php echo "class=".$class2; ?>>
            Gestazionale/Pregestazionale *<br/>
            <select tabindex="2" id="gest1" name="specIpertensiva" style="width:75%;" <?php echo $dis ?>>
                <option value=""> &nbsp </option>
                <option value="gestazionale">Gestazionale</option>
                <option value="pregestazionale">Pregestazionale</option>
            </select>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 7px;" <?php echo "class=".$class3; ?>>
            Diabete *<br/>
            <select tabindex="3" id="slct2" name="diabete" style="width:75%;" <?php echo $dis ?>>
                <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>
                <option value="Y">Si (specificare)</option>
                <option value="N">No</option>
            </select>
        </label>
    </div>
    <div class="col-2">
        <label id="diabete" style="visibility: hidden;padding-top: 7px;" <?php echo "class=".$class4; ?>>
            Gestazionale/Pregestazionale *<br/>
            <select tabindex="4" id="gest2" name="specDiabete" style="width:75%;" <?php echo $dis ?>>
                <option value=""> &nbsp </option>
                <option value="gestazionale">Gestazionale</option>
                <option value="pregestazionale">Pregestazionale</option>
            </select>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 7px;" <?php echo "class=".$class5; ?>>
            Alterazione dell'emoglobina *<br/>
            <select tabindex="5" id="slct3" name="emoglobina" style="width:75%;" <?php echo $dis ?>>
                <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>
                <option value="Y">Si (specificare)</option>
                <option value="N">No</option>
            </select>
        </label>
    </div>
    <div class="col-4">
        <label id="emoglobina" style="visibility: hidden;padding-top: 7px;" <?php echo "class=".$class6; ?>>
            Tipo alterazione *<br/>
            <select tabindex="6" id="slct3b" name="specEmoglobina" style="width:75%;" <?php echo $dis ?>>
                <option value=""> &nbsp </option>
                <option value="talassemia">Talassemia</option>
                <option value="metemoglobinemia">Metemoglobinemia</option>
                <option value="altro">Altro (specificare)</option>
            </select>
        </label>
    </div>
    <div class="col-4">
        <label id="tipoemo" style="visibility: hidden;padding-top: 5px;" <?php echo "class=".$class7; ?>>
            Specificare *<br/>
            <?php
                echo "<input id=\"tipoalt\" $dis name=\"specAltroEmo\" tabindex=\"10\" value=\"".$specE."\">";
            ?>      
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 7px;" <?php echo "class=".$class8; ?>>
            Alterazione della coagulazione *<br/>
            <select tabindex="7" id="alter" name="coagulazione" style="width:75%;" <?php echo $dis ?>>
                <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>
                <option value="Y">Si</option>
                <option value="N">No</option>
            </select>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 7px;" <?php echo "class=".$class9; ?>>
            Malattie autoimmuni *<br/>
            <select tabindex="8" id="malattie" name="autoimmuni" style="width:75%;" <?php echo $dis ?>>
                <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>
                <option value="Y">Si</option>
                <option value="N">No</option>
            </select>
            </label>
    </div>
    <div class="col-1">
        <label style="padding-top: 7px;" <?php echo "class=".$class19; ?>>
            Infezioni materne *<br/>
            <select tabindex="9" id="slctInf" name="infezioni" style="width:75%;" <?php echo $dis ?>>
                <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>
                <option value="Y">Si (specificare)</option>
                <option value="N">No</option>
            </select>
        </label>
    </div>
    <div class="col-1" id="p0" style="display: none;">
        <label style="font-size: 13px; color: #000;">
            Preconcezionale<br/>
        </label>
    </div>
    <div class="col-12" id="p1" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            <input type="checkbox" name="preinfezioni[]" value="hiv" style="margin-bottom: 0px;" <?php echo $checked1."  ".$dis;?>>
        </label>
    </div>
    <div class="col-16" id="p2" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            HIV
        </label>
    </div>
    <div class="col-12" id="p3" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            <input type="checkbox" name="preinfezioni[]" value="hbv" style="margin-bottom: 0px;" <?php echo $checked2."  ".$dis;?>>
        </label>
    </div>
    <div class="col-16" id="p4" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            HBV
        </label>
    </div>
    <div class="col-12" id="p5" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            <input type="checkbox" name="preinfezioni[]" value="hcv" style="margin-bottom: 0px;" <?php echo $checked3."  ".$dis;?>>
        </label>
    </div>
    <div class="col-16" id="p6" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            HCV
        </label>
    </div>
    <div class="col-12" id="p7" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            <input type="checkbox" name="preinfezioni[]" value="lue" style="margin-bottom: 0px;" <?php echo $checked4."  ".$dis;?>>
        </label>
    </div>
    <div class="col-16" id="p8" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            LUE
        </label>
    </div>
    <div class="col-12" id="p9" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            <input type="checkbox" name="preinfezioni[]" value="toxo" style="margin-bottom: 0px;" <?php echo $checked5."  ".$dis;?>>
        </label>
    </div>
    <div class="col-16" id="p10" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            TOXO
        </label>
    </div>
    <div class="col-12" id="p11" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            <input type="checkbox" name="preinfezioni[]" value="rubeo" style="margin-bottom: 0px;" <?php echo $checked6."  ".$dis;?>>
        </label>
    </div>
    <div class="col-16" id="p12" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            RUBEO
        </label>
    </div><div class="col-16" id="p29" style="display: none; width:8%;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            Altro
        </label>
    </div>
    <div class="col-14" id="p13" style="display: none;width:32%;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            <textarea name="altroPre" style="height:24px;margin-bottom:-10px;" <?php echo $dis ?>><?php echo $specPre ?></textarea>
        </label>
    </div>
    <div class="col-1" id="p14" style="display: none;">
        <label style="font-size: 13px; color: #000;">
            Peri-Postconcezionale<br/>
        </label>
    </div>
    <div class="col-12" id="p15" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            <input type="checkbox" name="periinfezioni[]" value="hiv" style="margin-bottom: 0px;" <?php echo $checked7."  ".$dis;?>>
        </label>
    </div>
    <div class="col-16" id="p16" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            HIV
        </label>
    </div>
    <div class="col-12" id="p17" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            <input type="checkbox" name="periinfezioni[]" value="hbv" style="margin-bottom: 0px;" <?php echo $checked8."  ".$dis;?>>
        </label>
    </div>
    <div class="col-16" id="p18" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            HBV
        </label>
    </div>
    <div class="col-12" id="p19" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            <input type="checkbox" name="periinfezioni[]" value="hcv" style="margin-bottom: 0px;" <?php echo $checked9."  ".$dis;?>>
        </label>
    </div>
    <div class="col-16" id="p20" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            HCV
        </label>
    </div>
    <div class="col-12" id="p21" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            <input type="checkbox" name="periinfezioni[]" value="lue" style="margin-bottom: 0px;" <?php echo $checked10."  ".$dis;?>>
        </label>
    </div>
    <div class="col-16" id="p22" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            LUE
        </label>
    </div>
    <div class="col-12" id="p23" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            <input type="checkbox" name="periinfezioni[]" value="toxo" style="margin-bottom: 0px;" <?php echo $checked11."  ".$dis;?>>
        </label>
    </div>
    <div class="col-16" id="p24" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            TOXO
        </label>
    </div>
    <div class="col-12" id="p25" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            <input type="checkbox" name="periinfezioni[]" value="rubeo" style="margin-bottom: 0px;" <?php echo $checked12."  ".$dis;?>>
        </label>
    </div>
    <div class="col-16" id="p26" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            RUBEO
        </label>
    </div>
    <div class="col-16" id="p27" style="display: none; width:8%;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            Altro
        </label>
    </div>
    <div class="col-14" id="p28" style="display: none;width:32%;">
        <label style="padding-top: 7px;" <?php echo "class=".$class14; ?>>
            <textarea name="altroPeri" style="height:24px;margin-bottom:-10px;" <?php echo $dis ?>><?php echo $specPeri ?></textarea>
        </label>
    </div>
    <div class="col-1">
        <label style="padding-top: 7px;" <?php echo "class=".$class15; ?>>
            Altre patologie *<br/>
            <select tabindex="11" id="slct6" name="altre_patologie" style="width:75%;" <?php echo $dis ?>>
                <option value=""> &nbsp </option>
                <option value="Y">Si (specificare)</option>
                <option value="N">No</option>
            </select>
        </label>
    </div>
    <div class="col-12" id="d1" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class18; ?>>
            <input type="checkbox" name="patologie[]" value="disturbi tiroide" style="margin-bottom: 0px;"<?php echo $checked13."  ".$dis;?> >
        </label>
    </div>
    <div class="col-14" id="d2" style="display: none;">
        <label style="padding-top:8px;" <?php echo "class=".$class18; ?>>
            Disturbi Tiroide
        </label>
    </div>
    <div class="col-12" id="d3" style="display: none;">
        <label style="padding-top: 7px;" <?php echo "class=".$class18; ?>>
            <input type="checkbox" name="patologie[]" value="cardiopatia" style="margin-bottom: 0px;" <?php echo $checked14."  ".$dis;?> >
        </label>
    </div>
    <div class="col-14" id="d4" style="display: none;">
        <label style="padding-top: 8px;" <?php echo "class=".$class18; ?>>
            Cardiopatia
        </label>
    </div>
    <div class="col-12" id="d5" style="display: none;">
        <label style="padding-top: 8px;" <?php echo "class=".$class18; ?>>
            <input type="checkbox" name="patologie[]" value="patologie renali" style="margin-bottom: 0px;" <?php echo $checked15."  ".$dis;?>>
        </label>
    </div>
    <div class="col-14" id="d6" style="display: none;">
        <label style="padding-top: 9px;" <?php echo "class=".$class18; ?>>
            Patologie Renali
        </label>
    </div>
    <div class="col-12" id="d7" style="display: none;">
        <label style="padding-top: 8px;" <?php echo "class=".$class18; ?>>
            <input type="checkbox" name="patologie[]" value="colestasi gravidica" style="margin-bottom: 0px;" <?php echo $checked16."  ".$dis;?>>
        </label>
    </div>
    <div class="col-14" id="d8" style="display: none;">
        <label style="padding-top: 9px;" <?php echo "class=".$class18; ?>>
            Colestasi Gravidica
        </label>
    </div>
    <div class="col-12" id="d9" style="display: none;">
        <label style="padding-top: 8px;" <?php echo "class=".$class18; ?>>
            <input type="checkbox" name="patologie[]" value="parodontopatie" style="margin-bottom: 0px;" <?php echo $checked17."  ".$dis;?>>
        </label>
    </div>
    <div class="col-14" id="d10" style="display: none;">
        <label style="padding-top: 9px;" <?php echo "class=".$class18; ?>>
            Parodontopatie
        </label>
    </div>
    <div class="col-12" id="d11" style="display: none; width:10%;">
        <label style="padding-top: 9px;" <?php echo "class=".$class18; ?>>
            Altro
        </label>
    </div>
    <div class="col-14" id="d12" style="display: none; width:40%;">
        <label style="padding-top: 4px;" <?php echo "class=".$class18; ?>>
            <?php
            echo "<input name=\"specAltrePato\" $dis style=\"margin-bottom: 0px;\" value=\"".$specP."\" >";
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
        </label>
    </div>
    </form>