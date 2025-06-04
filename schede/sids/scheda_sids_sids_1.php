<!--
 * User: lucaferrari
 * Date: 12/06/15
 */
 -->
<br/<br/><br/>
<script src="js/scripts.js"></script>
<link rel="stylesheet" href="js/jquery/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="js/jquery/jquery-ui.js"></script>
 <link rel="stylesheet" type="text/css" href="css/DateTimePicker.css" />
<script type="text/javascript" src="js/DateTimePicker.js"></script>
<link type="text/css" href="css/jquery.keypad.css" rel="stylesheet"> 
<script type="text/javascript" src="js/number/jquery.plugin.js"></script> 
<script type="text/javascript" src="js/number/jquery.keypadi.js"></script>
<!-- libreria nuova-->
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
    require_once("./db/dati_sids_load.php");
    loadPage();
    require_once("./db/loadtab_latt.php");
    tab_lattante();
    if(isset($_POST["dati_sids_cognome"])){
        $cognome = $_POST["dati_sids_cognome"];
        $class1 = "";
    }
    else {
        $cognome = null;
        $class1 = "errors";
    }
    if(isset($_POST["dati_sids_nome"])){
        $nome = $_POST["dati_sids_nome"];
        $class2 = "";
    }
    else {
        $nome = null;
        $class2 = "errors";
    }
    if(isset($_POST["dati_sids_via"])){
        $via = $_POST["dati_sids_via"];
        $class3 = "";
    }
    else {
        $via = null;
        $class3 = "errors";
    }
    if(isset($_POST["dati_sids_cap"])){
        $cap = $_POST["dati_sids_cap"];
        $class4 = "";
    }
    else {
        $cap = null;
        $class4 = "errors";
    }
    if(isset($_POST["dati_sids_comune"])){
        $comune = $_POST["dati_sids_comune"];
        $class5 = "";
    }
    else {
        $comune = null;
        $class5 = "errors";
    }
    if(isset($_POST["dati_sids_prov"])){
        $prov = $_POST["dati_sids_prov"];
        $class6 = "";
    }
    else {
        $prov = null;
        $class6 = "errors";
    }
    if(isset($_POST["dati_sids_dataN"])){
        list($year, $month, $day) = explode("-", $_POST['dati_sids_dataN']);
        $dataN = "$day-$month-$year";
        $class7 = "";
    }
    else {
        $dataN = null;
        $class7 = "errors";
    }
    if(isset($_POST["dati_sids_dataM"])) {
        list($year, $month, $day) = explode("-", $_POST['dati_sids_dataM']);
        $dataM = "$day-$month-$year";
        $class8 = "";
    }
    else {
        $dataM = null;
        $class8 = "errors";
    }
    if(isset($_POST["dati_sids_etaGest"])) {
        $gest = $_POST["dati_sids_etaGest"];
        $class9 = "";
    }
    else {
        $gest = null;
        $class9 = "errors";
    }
    if(isset($_POST["dati_sids_etaPostNat"])){
        $postN = $_POST["dati_sids_etaPostNat"];
        $class10 = "";
    }
    else {
        $postN = null;
        $class10 = "errors";
    }
    if(isset($_POST["dati_sids_etaPostCon"])) {
        $postC = $_POST["dati_sids_etaPostCon"];
        $class11 = "";
    }
    else {
        $postC = null;
        $class11 = "errors";
    }
    if(isset($_POST["dati_sids_oraD"])){
        list($hour, $min, $sec) = explode(":", $_POST['dati_sids_oraD']);
        $oraD = "$hour:$min";
        $class12 = "";
    }
    else {
        $oraD = null;
        $class12 = "errors";
    }
    if(isset($_POST["dati_sids_oraC"])){
        list($hour, $min, $sec) = explode(":", $_POST['dati_sids_oraC']);
        $oraC = "$hour:$min";
        $class13 = "";
    }
    else {
        $oraC = null;
        $class13 = "errors";
    }
    if(isset($_POST["dati_sids_sex"])){
        $sex = $_POST["dati_sids_sex"];
        $class14 = "";
    }
    else {
        $sex = null;
        $class14 = "errors";
    }
?>
<script>
  $( document ).ready(function() {
    if (('<?php echo $dataN; ?>' == '') || ('<?php echo $_SESSION["stato"]; ?>' == 'chiusa') || ('<?php echo $_SESSION["stato"]; ?>' == 'chiusa_usr')){
        document.getElementById("dataM").disabled = true;
    }
    else {
        document.getElementById("dataM").disabled = false;
    }
  });
    
  $(function() {
      $('#etagest').keypad({
      onClose: function(value, inst) {
          var egv = document.getElementById("etaPostNat").value
          var eg = new Number(egv);
          var epn = new Number(value);
                               
          document.getElementById("etaPostCon").value = eg + epn;
      
      }
      });    
  });
  
  $(function() {
      $('#etaPostNat').keypad({
      onClose: function(value, inst) {
          var egv = document.getElementById("etagest").value
          var eg = new Number(egv);
          var epn = new Number(value);
                               
          document.getElementById("etaPostCon").value = eg + epn;
      
      }
      });    
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
      $('#sex').selectmenu();  
      $('#sex').val('<?php echo $sex; ?>');
      $('#sex').selectmenu('refresh', true);    
  });
  $(function() {
    $( "#dataN" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-10:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D",
        onSelect: function(selectedDate) {
            $("#dataM").datepicker("option", "minDate", selectedDate);
            $( "#dataM" ).datepicker( "option", "disabled", false );
       }
    });
  });
    
  $(function() {
    $( "#dataM" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-10:+0",
        changeMonth: true,
        changeYear: true,
        minDate: '<?php echo $dataN; ?>',//manca
        maxDate: "+0D" //new Date(2015, 10 - 10, 29) //"+0D"
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
<form id="adminform" name="adminform" action="db/dati_sids_send.php" method="post">
    <div class="col-2">
        <label  <?php echo "class=".$class1; ?> >
            Cognome * <br/>
            <?php
                echo "<input id=\"cognome\" name=\"cognome\" $dis tabindex=\"1\" value=\"".$cognome."\" >";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label   <?php echo "class=".$class2; ?> >
            Nome * <br/>
            <?php
                echo "<input id=\"nome\" name=\"nome\" $dis tabindex=\"2\" value=\"".$nome."\">";
            ?>
        </label>
    </div>
    <div class="col-2b">
        <label>
            Via e numero <br/>
            <?php
                echo "<input id=\"via\" name=\"via\" $dis tabindex=\"3\" value=\"".$via."\">";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label>
            CAP<br/>
            <?php
                echo "<input id=\"cap\" name=\"cap\" $dis tabindex=\"4\" value=\"".$cap."\">";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label  <?php echo "class=".$class5; ?> >
            Comune *<br/>
            <?php
                echo "<input id=\"comune\" name=\"comune\" $dis tabindex=\"5\" value=\"".$comune."\">";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label  <?php echo "class=".$class6; ?> >
            Provincia *<br/>
            <?php
                echo "<input id=\"prov\" name=\"prov\" $dis tabindex=\"6\" value=\"".$prov."\">";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label style="padding-top: 8px;" <?php echo "class=".$class14; ?>  >
            Sesso *<br/>
            <select id="sex" style="width:75%;" tabindex="7" name="sex" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="maschio">Maschio</option>
                <option value="femmina">Femmina</option>
            </select>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 9px;"  <?php echo "class=".$class7; ?> >
            Data di Nascita *<br/>
            <?php
                echo "<input type=\"text\" id=\"dataN\" $dis name=\"dataN\" value=\"".$dataN."\" readonly>";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label  <?php echo "class=".$class8; ?> >
            Data di Morte * <sup>1</sup><br/>
            <?php
                echo "<input type=\"text\" id=\"dataM\" $dis name=\"dataM\"  value=\"".$dataM."\" readonly>";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label>
            Età gestazionale (in settimane)<br/>
            <?php
                echo "<input  id=\"etagest\" name=\"etaGest\" $dis tabindex=\"13\" readonly=\"readonly\" style=\"width: 100%;\"value=\"".$gest."\">";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label <?php echo "class=".$class10; ?> >
            Età postnatale (in settimane) *<br/>
            <?php
                echo "<input  id=\"etaPostNat\" $dis name=\"etaPostNat\" tabindex=\"12\" style=\"width: 100%;\" value=\"".$postN."\" >";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label>
            Età postconcezionale (in settimane)<br/>
            <?php
                echo "<input placeholder=\"Età gestazionale + età postnatale\" id=\"etaPostCon\" name=\"etaPostCon\" $dis tabindex=\"13\" readonly=\"readonly\" style=\"width: 100%;\"value=\"".$postC."\">";
            ?>
        </label>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        flatpickr("#oraD", {
            enableTime: true,          
            noCalendar: true,        
            dateFormat: "H:i",      
            defaultDate: "<?php echo $oraD; ?>"  
        });
    });
</script>

<div class="col-3">
    <label class="form-label" style="padding-top: 8px;">
        Ora del rilievo del decesso * *<br/>
        <input type="text" id="oraD" name="oraD" readonly value="<?php echo $oraD; ?>">
    </label>
</div>


    <script>
    document.addEventListener('DOMContentLoaded', function () {
        flatpickr("#oraC", {
            enableTime: true,          
            noCalendar: true,        
            dateFormat: "H:i",      
            defaultDate: "<?php echo $oraC; ?>"  
        });
    });
</script>

<div class="col-3">
    <label class="form-label" style="padding-top: 8px;">
    Ora AAA dell'ultimo controllo parentale *<br/>
        <input type="text" id="oraC" name="oraC" readonly value="<?php echo $oraC; ?>">
    </label>
</div>
    <div class="col-9">
        <label style="font-size: 10px; color: #e80d0d;">
               * Campi obbligatori. <br/>
               <sup>1</sup> Inserire prima la data di nascita.
        </label>
    </div> 
    <div class="col-7" style="visibility:hidden;">
        <label style="font-size: 15px; color: #000;">
                <?php
                     echo "<button class='guide' onclick='myFunction()'>Prec</button>";
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