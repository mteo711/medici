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
    require_once("./db/scheda_feto_load.php");
    loadPage();
    require_once("./db/loadtab_feto.php");
    tab_feto();

    if(isset($_POST["data_morte"])){
        list($year, $month, $day) = explode("-", $_POST['data_morte']);
        $morte = "$day-$month-$year";
    }
    else {
        $morte = null;
    }

    if(isset($_POST["scheda_feto_liquido"])){
        $liquido = $_POST["scheda_feto_liquido"];
        $class1 = "";
    }
    else {
        $liquido = null;
        $class1 = "errors";
    }
    if(isset($_POST["scheda_feto_specL"])){
        $specL = $_POST["scheda_feto_specL"];
        $class2 = "";
    }
    else {
        $specL = null;
        $class2 = "errors";
    }
    if(isset($_POST["scheda_feto_rx"])){
        $rx = $_POST["scheda_feto_rx"];
        $class3 = "";
    }
    else {
        $rx = null;
        $class3 = "errors";
    }
    if(isset($_POST["scheda_feto_specRX"])){
        $specRX = $_POST["scheda_feto_specRX"];
        $class4 = "";
    }
    else {
        $specRX = null;
        $class4 = "errors";
    }
    if(isset($_POST["scheda_feto_prot"])){
        $prot = $_POST["scheda_feto_prot"];
        $class5 = "";
    }
    else {
        $prot = null;
        $class5 = "errors";
    }
    if(isset($_POST["scheda_feto_riscontro"])){
        $riscontro = $_POST["scheda_feto_riscontro"];
        $class6 = "";
    }
    else {
        $riscontro = null;
        $class6 = "errors";
    }
    if(isset($_POST["scheda_feto_dove"])){
        $dove = $_POST["scheda_feto_dove"];
        $class7 = "";
    }
    else {
        $dove = null;
        $class7 = "errors";
    }
    if(isset($_POST["scheda_feto_dataR"])) {
        list($year, $month, $day) = explode("-", $_POST['scheda_feto_dataR']);
        $dataR = "$day-$month-$year";
        $class8 = "";
    }
    else {
        $dataR = null;
        $class8 = "errors";
    }
    if(isset($_POST["scheda_feto_medico"])) {
        $medico = $_POST["scheda_feto_medico"];
        $class9 = "";
    }
    else {
        $medico = null;
        $class9 = "errors";
    }
?>
<script>
$( document ).ready(function() {
    if (('<?php echo $morte; ?>' == '') || ('<?php echo $_SESSION["stato"]; ?>' == 'chiusa') || ('<?php echo $_SESSION["stato"]; ?>' == 'chiusa_usr')){
        document.getElementById("dataR").disabled = true;
    }
    else {
        document.getElementById("dataR").disabled = false;
    }
    if ('<?php echo $liquido; ?>' == 'patologico'){
       document.getElementById('spec').style.visibility='visible';   
    }
    if ('<?php echo $rx; ?>' == 'Y'){
       document.getElementById('spec2').style.visibility='visible';
    }
    if ('<?php echo $riscontro; ?>' == 'Y'){
       document.getElementById('spec4').style.visibility='visible';
       document.getElementById('spec5').style.visibility='visible';
       document.getElementById('spec3').style.visibility='visible';
    }
  });

$(function() {
    $( "#slct" ).selectmenu({
         change: function(event, ui){
             var select = document.getElementById('slct');
                var value = select.value;
                if (value == 'patologico') {
                   document.getElementById('spec').style.visibility='visible'; return;
                }
                   document.getElementById('spec').style.visibility='hidden'; return;
         }
    });
    $("#slct").val('<?php echo $liquido; ?>')
    $('#slct').selectmenu('refresh', true);

});
$(function() {
    $( "#slct2" ).selectmenu({
         change: function(event, ui){
             var select = document.getElementById('slct2');
                var value = select.value;
                if (value == 'Y') {
                   document.getElementById('spec2').style.visibility='visible'; return;
                }
                   document.getElementById('spec2').style.visibility='hidden'; return;
         }
    });
    $("#slct2").val('<?php echo $rx; ?>')
    $('#slct2').selectmenu('refresh', true);

});
$(function() {
    $( "#slct4" ).selectmenu({
         change: function(event, ui){
             var select = document.getElementById('slct4');
                var value = select.value;
                if (value == 'Y') {
                   document.getElementById('spec4').style.visibility='visible';
                   document.getElementById('spec5').style.visibility='visible';
                   document.getElementById('spec3').style.visibility='visible'; return;
                }
                   document.getElementById('spec4').style.visibility='hidden';
                   document.getElementById('spec5').style.visibility='hidden';
                   document.getElementById('spec3').style.visibility='hidden'; return;
         }
    });
    $("#slct4").val('<?php echo $riscontro; ?>')
    $('#slct4').selectmenu('refresh', true);

});
    
$(function() {
    $( "#slct3" ).selectmenu();
    $("#slct3").val('<?php echo $prot; ?>')
    $('#slct3').selectmenu('refresh', true);

});
$(function() {
    $( "#dataR" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-10:+0",
        changeMonth: true,
        changeYear: true,
        minDate: '<?php echo $morte; ?>', //manca
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
 <div id="dtBox"></div>
<br/<br/><br/>
<form id="adminform" name="adminform" action="db/scheda_feto_send.php" method="post">
  <div class="col-2">
        <label style="padding-top:8px;" <?php echo "class=".$class1; ?>>
            Liquido Amniotico *<br/>
            <select tabindex="11" id="slct" style="width:75%;" name="liquido" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>    
                <option value="normale">Normale</option>
                <option value="patologico">Patologico (specificare)</option>
            </select>
        </label>
   </div>
   <div class="col-2">
        <label id="spec" style="visibility: hidden" <?php echo "class=".$class2; ?>>
             Se patologico specificare *<br/>
            <textarea name="specL" style="height:19px;" <?php echo $dis; ?>><?php echo $specL; ?></textarea>
        </label>
    </div> 
    <div class="col-2">
         <label style="padding-top:8px;" <?php echo "class=".$class3; ?>>
             RX scheletro *<br/>
             <select tabindex="11" id="slct2" style="width:75%;" name="rx" <?php echo $dis; ?>>
                 <option value=""> &nbsp </option>
                 <option value="mancante">Dato Mancante</option>     
                 <option value="Y">Si (specificare)</option>
                 <option value="N">No</option>
             </select>
         </label>
     </div>
    <div class="col-2">
         <label id="spec2" style="visibility: hidden" <?php echo "class=".$class4; ?>>
             Specificare *<br/>
             <textarea name="specRX" style="height:19px;" <?php echo $dis; ?>><?php echo $specRX; ?></textarea>
         </label>
     </div> 
    <div class="col-2">
           <label <?php echo "class=".$class5; ?>>
               I prelievi sono stati eseguiti secondo il prot. nazionale? *<br/>
               <select tabindex="11" id="slct3" style="width:75%;" name="prelievi" <?php echo $dis; ?>>
                   <option value=""> &nbsp </option>
                   <option value="mancante">Dato Mancante</option>     
                   <option value="Y">Si</option>
                   <option value="N">No</option>
               </select>
           </label>
       </div>
     <div class="col-2">
          <label <?php echo "class=".$class6; ?>>
              Il riscontro diagnostico è stato effettuato? *<br/>
              <select tabindex="11" id="slct4" style="width:75%;" name="riscontro" <?php echo $dis; ?>>
                  <option value=""> &nbsp </option>
                  <option value="mancante">Dato Mancante</option>     
                  <option value="Y">Si (specificare)</option>
                  <option value="N">No</option>
              </select>
          </label>
      </div>
     <div class="col-2">
          <label id="spec3" style="visibility: hidden; padding-top: 9px;" <?php echo "class=".$class7; ?>>
              Presso quale sede? *<br/>
              <input placeholder="" id="sede" name="sede" tabindex="3" value="<?php echo $dove; ?>" <?php echo $dis; ?>>
          </label>
      </div> 
      
      <div class="col-4">
           <label id="spec4" style="visibility: hidden" <?php echo "class=".$class8; ?>>
               Quando? * <sup>1</sup><br/>
               <input type="text" id="dataR" name="dataR" readonly value="<?php echo $dataR; ?>" <?php echo $dis; ?>>
           </label>
       </div> 
       <div class="col-4" >
           <label id="spec5" style="visibility: hidden; padding-top: 9px;" <?php echo "class=".$class9; ?>>
               Medico *<br/>
               <input placeholder="" id="medico" name="medico" tabindex="3" value="<?php echo $medico; ?>" <?php echo $dis; ?>>
           </label>
       </div> 
       <div class="col-9">
        <label style="font-size: 10px; color: #e80d0d;">
               * Campi obbligatori. <br/>
               <sup>1</sup> Inserire prima la data di morte in Feto > Dati personali.
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