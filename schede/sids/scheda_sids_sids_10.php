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
require_once("./db/scheda_sids_load2.php");
loadPage();
//require_once("./comuni/loadtab_latt.php");
require_once("./db/loadtab_latt.php");
tab_lattante();
$checked1 = "";
$checked2 = "";
$checked3 = "";
$checked4 = "";
$checked5 = "";
$checked6 = "";
$checked7 = "";

if (!empty($_POST["data_morte"]) && count(explode("-", $_POST["data_morte"])) === 3) {
    list($year, $month, $day) = explode("-", $_POST['data_morte']);
    $morte = "$day-$month-$year";
} else {
    $morte = null;
}

if (!empty($_POST["data_nato"]) && count(explode("-", $_POST["data_nato"])) === 3) {
    list($year, $month, $day) = explode("-", $_POST['data_nato']);
    $nato = "$day-$month-$year";
} else {
    $nato = null;
}



if(isset($_POST["scheda_sids_ultimo"])){
    list($year, $month, $day) = explode("-", $_POST['scheda_sids_ultimo']);
    $dataU = "$day-$month-$year";
    $class1 = "";
}
else {
    $dataU = null;
    $class1 = "errors";
}
if(isset($_POST["scheda_sids_patoatto"])){
    $patoAtto = $_POST["scheda_sids_patoatto"];
    $class2 = "";
}
else {
    $patoAtto = null;
    $class2 = "errors";
}
if(isset($_POST["scheda_sids_tipopatoatto"])){
    $tipoPato = $_POST["scheda_sids_tipopatoatto"];
    $class3 = "";
    $check = explode(",", $tipoPato);
    (in_array("raffreddore", $check)) ? $checked1 = "checked" : $checked1 = "";
    (in_array("tosse", $check)) ? $checked2 = "checked" : $checked2 = "";
    (in_array("febbre", $check)) ? $checked3 = "checked" : $checked3 = "";
    (in_array("diarrea", $check)) ? $checked4 = "checked" : $checked4 = "";
    (in_array("vomito/rigurgito", $check)) ? $checked5 = "checked" : $checked5 = "";
    (in_array("esantema/eczema", $check)) ? $checked6 = "checked" : $checked6 = "";
}
else {
    $tipoPato = null;
    $class3 = "errors";
}
if(isset($_POST["scheda_sids_specpatoatto"])){
    $altroPato = $_POST["scheda_sids_specpatoatto"];
    $class4 = "";
}
else {
    $altroPato = null;
    $class4 = "errors";
}
if(($class3 == "errors")&&($class4 == "errors")){
    $class4b = "errors";
}
else{
    $class4b = "";
}
if(isset($_POST["scheda_sids_distresp"])){
    $distResp = $_POST["scheda_sids_distresp"];
    $class5 = "";
}
else {
    $distResp = null;
    $class5 = "errors";
}
if(isset($_POST["scheda_sids_tipodispresp"])){
    $tipoDist = $_POST["scheda_sids_tipodispresp"];
    $class6 = "";
    $check = explode(",", $tipoDist);
    (in_array("apnee notturne", $check)) ? $checked7 = "checked" : $checked7 = "";
}
else {
    $tipoDist = null;
    $class6 = "errors";
}
if(isset($_POST["scheda_sids_specdistresp"])){
    $altroDist = $_POST["scheda_sids_specdistresp"];
    $class7 = "";
}
else {
    $altroDist = null;
    $class7 = "errors";
}
if(($class6 == "errors")&&($class7 == "errors")){
    $class7b = "errors";
}
else{
    $class7b = "";
}
if(isset($_POST["scheda_sids_vacc"])){
    $vacci = $_POST["scheda_sids_vacc"];
    $class8 = "";
}
else {
    $vacci = null;
    $class8 = "errors";
}
if(isset($_POST["scheda_sids_tipovacc"])){
    $qualiVacc = $_POST["scheda_sids_tipovacc"];
    $class9 = "";
}
else {
    $qualiVacc = null;
    $class9 = "errors";
}
if(isset($_POST["scheda_sids_riscontro"])){
    $riscon = $_POST["scheda_sids_riscontro"];
    $class10 = "";
}
else {
    $riscon = null;
    $class10 = "errors";
}
if(isset($_POST["scheda_sids_riscdove"])){
    $doveRisc = $_POST["scheda_sids_riscdove"];
    $class11 = "";
}
else {
    $doveRisc = null;
    $class11 = "errors";
}
if(isset($_POST["scheda_sids_prelievi"])){
    $preli = $_POST["scheda_sids_prelievi"];
    $class12 = "";
}
else {
    $preli = null;
    $class12 = "errors";
}
if(isset($_POST["scheda_sids_datarisc"])){
    list($year, $month, $day) = explode("-", $_POST['scheda_sids_datarisc']);
    $dataPr = "$day-$month-$year";
    $class13 = "";
}
else {
    $dataPr = null;
    $class13 = "errors";
}
if(isset($_POST["scheda_sids_medico"])){
    $medico = $_POST["scheda_sids_medico"];
    $class14 = "";
}
else {
    $medico = null;
    $class14 = "errors";
}


?>
<script>
$( document ).ready(function() {
    if (('<?php echo $morte; ?>' == '') || ('<?php echo $nato; ?>' == '') || ('<?php echo $_SESSION["stato"]; ?>' == 'chiusa') || ('<?php echo $_SESSION["stato"]; ?>' == 'chiusa_usr')){
        document.getElementById("dataU").disabled = true;
        document.getElementById("dataPr").disabled = true;
    }
    else {
        document.getElementById("dataU").disabled = false;
        document.getElementById("dataPr").disabled = false;
    }
    
    if ('<?php echo $patoAtto; ?>' == 'Y'){
        for (i=1; i<14; i++)
            document.getElementById('p'+i).style.display='inline-block';
    }
    if ('<?php echo $distResp; ?>' == 'Y'){
        document.getElementById('ch').style.visibility='visible';
        document.getElementById('ap').style.visibility='visible';
        document.getElementById('al').style.visibility= 'visible';
    }
    if ('<?php echo $vacci; ?>' == 'Y'){
        document.getElementById('specv').style.visibility='visible';
    }
    if ('<?php echo $riscon; ?>' == 'Y'){
        document.getElementById('specri').style.visibility='visible';
    }
    if ('<?php echo $preli; ?>' == 'Y'){
        document.getElementById('specq').style.visibility='visible'; 
        document.getElementById('specm').style.visibility='visible';
    }
});
$(function() {
    $( "#slctpat" ).selectmenu({
         change: function(event, ui){
             i = 1;
             var select = document.getElementById('slctpat');
             var value = select.value;
             if ((value == 'Y')) {
                    for (i=1; i<14; i++)
                    document.getElementById('p'+i).style.display='inline-block';
                           return;
                }
                else {
                    for (i=1; i<14; i++)
                    document.getElementById('p'+i).style.display='none';
                           return;
                }
         }
    });
    $("#slctpat").val('<?php echo $patoAtto; ?>')
    $('#slctpat').selectmenu('refresh', true);
});
$(function() {
    $( "#slctdist" ).selectmenu({
         change: function(event, ui){
             var select = document.getElementById('slctdist');
             var value = select.value;
             if (value == 'Y') {
                document.getElementById('ch').style.visibility='visible';
                document.getElementById('ap').style.visibility='visible';
                //document.getElementById('ac').style.visibility='visible';
                document.getElementById('al').style.visibility= 'visible'; return;
             
             }
             else {
                document.getElementById('ch').style.visibility='hidden';
                document.getElementById('ap').style.visibility='hidden'; 
                //document.getElementById('ac').style.visibility='hidden';
                document.getElementById('al').style.visibility='hidden';return;
             }
         }
    });
    $("#slctdist").val('<?php echo $distResp; ?>')
    $('#slctdist').selectmenu('refresh', true);

});
$(function() {
    $( "#slctvac" ).selectmenu({
         change: function(event, ui){
             var select = document.getElementById('slctvac');
             var value = select.value;
             if (value == 'Y') {
                document.getElementById('specv').style.visibility='visible'; return;

             }
             else {
                document.getElementById('specv').style.visibility='hidden';return;
             }
         }
    });
    $("#slctvac").val('<?php echo $vacci; ?>')
    $('#slctvac').selectmenu('refresh', true);

});
$(function() {
    $( "#slctris" ).selectmenu({
         change: function(event, ui){
             var select = document.getElementById('slctris');
             var value = select.value;
             if (value == 'Y') {
                document.getElementById('specri').style.visibility='visible'; return;

             }
             else {
                document.getElementById('specri').style.visibility='hidden';return;
             }
         }
    });
    $("#slctris").val('<?php echo $riscon; ?>')
    $('#slctris').selectmenu('refresh', true);

});
$(function() {
    $( "#slctpre" ).selectmenu({
         change: function(event, ui){
             var select = document.getElementById('slctpre');
             var value = select.value;
             if (value == 'Y') {
                document.getElementById('specq').style.visibility='visible'; 
                document.getElementById('specm').style.visibility='visible';return;

             }
             else {
                document.getElementById('specq').style.visibility='hidden';
                document.getElementById('specm').style.visibility='hidden';return;
             }
         }
    });
    $("#slctpre").val('<?php echo $preli; ?>')
    $('#slctpre').selectmenu('refresh', true);

});
$(function() {
  $( "#dataU" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-10:+0",
        changeMonth: true,
        changeYear: true,
        minDate: "<?php echo $nato; ?>" , //manca
        maxDate: "<?php echo $morte; ?>" //new Date(2015, 10 - 10, 29) //"+0D"
    });
});

$(function() {
  $( "#dataPr" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-10:+0",
        changeMonth: true,
        changeYear: true,
        minDate: "<?php echo $morte; ?>",
        maxDate: "+0" //new Date(2015, 10 - 10, 29) //"+0D"
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

<div id="dtBox"></div>
<br/><br/><br/>
<form id="adminform" name="adminform" action="db/scheda_sids_send.php" method="post">
    <div class="col-2">
        <label <?php echo "class=".$class1; ?>>
            Data ultimo controllo pediatrico * <sup>1</sup><br/>
            <?php echo"<input type=\"text\" id=\"dataU\" $dis name=\"dataU\" value=\"".$dataU."\" readonly>"; ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 11px;"  <?php echo "class=".$class2; ?> >
            Patologie in atto? *<br/>
            <select tabindex="22" id="slctpat" name="pato_atto" style="width:50%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="Y">Si (specificare)</option>
                <option value="N">No</option>
            </select>
        </label>
    </div>
    <div class="col-12" id="p1" style="display: none;" >
        <label style="padding-top: -1px;" <?php echo "class=".$class4b; ?>>
            <input type="checkbox" name="patospec[]" value="raffreddore" style="margin-bottom: 0px;" <?php echo $checked1."  ".$dis;?>>
        </label>
    </div>
    <div class="col-14" id="p2" style="display: none;">
        <label <?php echo "class=".$class4b; ?>>
            Raffreddore
        </label>
    </div>
    <div class="col-12" id="p3" style="display: none;">
        <label <?php echo "class=".$class4b; ?>>
            <input type="checkbox" name="patospec[]" value="tosse" style="margin-bottom: 0px;" <?php echo $checked2."  ".$dis;?>>
        </label>
    </div>
    <div class="col-14" id="p4" style="display: none;">
        <label <?php echo "class=".$class4b; ?>>
            Tosse
        </label>
    </div>
    <div class="col-12" id="p5" style="display: none;">
        <label  <?php echo "class=".$class4b; ?>>
            <input type="checkbox" name="patospec[]" value="febbre" style="margin-bottom: 0px;" <?php echo $checked3."  ".$dis;?>>
        </label>
    </div>
    <div class="col-14" id="p6" style="display: none;">
        <label <?php echo "class=".$class4b; ?>>
            Febbre
        </label>
    </div>
    <div class="col-12" id="p7" style="display: none;">
        <label <?php echo "class=".$class4b; ?>>
            <input type="checkbox" name="patospec[]" value="diarrea" style="margin-bottom: 0px;" <?php echo $checked4."  ".$dis;?>>
        </label>
    </div>
    <div class="col-14" id="p8" style="display: none;">
        <label <?php echo "class=".$class4b; ?>>
            Diarrea
        </label>
    </div>
    <div class="col-12" id="p9" style="display: none;">
        <label <?php echo "class=".$class4b; ?>>
            <input type="checkbox" name="patospec[]" value="vomito/rigurgito" style="margin-bottom: 0px;" <?php echo $checked5."  ".$dis;?>>
        </label>
    </div>
    <div class="col-14" id="p10" style="display: none;">
        <label <?php echo "class=".$class4b; ?>>
            Vomito
        </label>
    </div>
    <div class="col-12" id="p11" style="display: none;">
        <label <?php echo "class=".$class4b; ?>>
            <input type="checkbox" name="patospec[]" value="esantema/eczema" style="margin-bottom: 0px;" <?php echo $checked6."  ".$dis;?>>
        </label>
    </div>
    <div class="col-14" id="p12" style="display: none;">
        <label <?php echo "class=".$class4b; ?>>
            Esantema/Eczema
        </label>
    </div>
    <!-- <div class="col-12" id="p13" style="display: none;">
        <label>
            <input type="checkbox" name="patospec[]" value="altro" style="margin-bottom: 0px;" >
        </label>
    </div> -->
    <div class="col-1" id="p13" style="display: none;">
        <label <?php echo "class=".$class4b; ?>>
            Altro
            <?php echo "<textarea name=\"pato_atto_spec\" $dis style=\"height:40px;\">".$altroPato."</textarea>"; ?>

        </label>
    </div>
    
    <div class="col-2">
        <label style="padding-top: 6px;" <?php echo "class=".$class5; ?>>
            Ha manifestato disturbi respiratori *<br/>
            <select tabindex="24" id="slctdist" name="dist_resp" style="width:50%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value='Y'>Si (specificare)</option>
                <option value="N">No</option>
            </select>
        </label>
    </div>
    <div class="col-12">
        <label id="ch" style="visibility: hidden; padding-top: 36px;"  <?php echo "class=".$class7b; ?>>
            <input type="checkbox" name="distresp[]"  value="apnee notturne" style="margin-bottom: 0px;" <?php echo $checked7."  ".$dis;?>>
        </label>
    </div>
    <div class="col-14">
        <label id="ap" style="visibility: hidden; padding-top: 37px;" <?php echo "class=".$class7b; ?>>
            Apnee Notturne <br/>       
        </label>
    </div>
    <!-- <div class="col-12">
        <label id="ac" style="visibility: hidden;">
            <input type="checkbox" name="distresp[]" value="altro" style="margin-bottom: 0px;" >
        </label>
    </div> -->
    <div class="col-1" >
        <label id="al" style="visibility: hidden;"  <?php echo "class=".$class7b; ?>>
            Altro
            <?php echo "<textarea name=\"dist_resp_spec\" $dis style=\"height:40px;\">".$altroDist."</textarea>"; ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 12px;" <?php echo "class=".$class8; ?>>
            Ha eseguito vaccinazioni nell'ultimo mese? *<br/>
            <select tabindex="26" id="slctvac" name="vaccinazioni" style="width:50%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>
                <option value='Y'>Si (specificare)</option>
                <option value="N">No</option>
            </select>
        </label>
    </div>
    <div class="col-2" >
        <label id="specv" style="visibility: hidden;" <?php echo "class=".$class9; ?>>
            Specificare *<br/>
            <?php echo "<textarea name=\"quali_vacc\" $dis style=\"height:24px;\">".$qualiVacc."</textarea>"; ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 12px;" <?php echo "class=".$class10; ?>>
            Il riscontro diagnostico è stato effettuato? *<br/>
            <select tabindex="28" id="slctris" name="riscontro" style="width:50%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>
                <option value='Y'>Si</option>
                <option value="N">No</option>
            </select>
        </label>
    </div>
    <div class="col-2">
        <label id="specri" style="visibility: hidden; padding-top:10px;" <?php echo "class=".$class11; ?>>
            Dove? *<br/>
            <?php echo" <input id=\"doveRisc\" $dis name=\"dove_risc\" value=\"".$doveRisc."\" tabindex=\"29\">"; ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 12px;" <?php echo "class=".$class12; ?>>
            I prelievi sono stati eseguiti seguendo il prot. nazionale? *<br/>
            <select tabindex="30" id="slctpre" name="prelievi" style="width:50%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>
                <option value='Y'>Si (specificare)</option>
                <option value="N">No</option>
            </select>
        </label>
    </div>
    <div class="col-4">
        <label id="specq" style="visibility: hidden; padding-top:6px;" <?php echo "class=".$class13; ?>>
            Quando? * <sup>1</sup><br/>
            <?php echo"<input type=\"text\" $dis id=\"dataPr\" name=\"quando_prel\" value=\"".$dataPr."\" readonly>"; ?>
        </label>
    </div>
    <div class="col-4">
        <label id="specm" style="visibility: hidden; padding-top:10px;" <?php echo "class=".$class14; ?>>
            Medico *<br/>
            <?php echo "<input id=\"medicoRisc\" $dis name=\"medico_prel\" value=\"".$medico."\" tabindex=\"32\">"; ?>
        </label>
    </div>
    <div class="col-9">
        <label style="font-size: 10px; color: #e80d0d;">
               * Campi obbligatori. <br/>
               <sup>1</sup> Inserire prima la data di nascita e data di morte nella scheda Lattante > Dati Personali.
        </label>
    </div> 
    <div class="col-7">
        <label style="font-size: 15px; color: #000;">
                <?php
                     echo "<button class='guide' onclick=\"performSubmit('succ_c')\">< Prec</button>";
                ?>
        
            </label>
        </div>
        <div class="col-7">
            <label style="font-size: 15px; color: #000;">
                <?php
                     echo "<button class='guide' onclick=\"performSubmit('succ_u')\">Succ ></button>";
                ?>            
                <input type="hidden" id="action" name="action"  value="" />    
            </label>
    </div>
</form>