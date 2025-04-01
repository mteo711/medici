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

 if(isset($_POST["data_nascita"])){
   list($year, $month, $day) = explode("-", $_POST['data_nascita']);
   $nata = "$day-$month-$year";
  }
 else {
   $nata = null;
 }
 if(isset($_POST["data_morte"])){
   list($year, $month, $day) = explode("-", $_POST['data_morte']);
   $morte = "$day-$month-$year";
  }
 else {
   $morte = null;
 }
 if(isset($_POST["morte_fetale_dataU"])){
     list($year, $month, $day) = explode("-", $_POST['morte_fetale_dataU']);
     $dataU = "$day-$month-$year";
     $class1 = "";
 }
 else {
     $dataU = null;
     $class1 = "errors";
 }
 if(isset($_POST["morte_fetale_dataA"])){
     list($year, $month, $day) = explode("-", $_POST['morte_fetale_dataA']);
     $dataA = "$day-$month-$year";
     $class2 = "";
 }
 else {
     $dataA = null;
     $class2 = "errors";
 }
 if(isset($_POST["morte_fetale_dataE"])){
     list($year, $month, $day) = explode("-", $_POST['morte_fetale_dataE']);
     $dataE = "$day-$month-$year";
     $class3 = "";
 }
 else {
     $dataE = null;
     $class3 = "errors";
 }
 if(isset($_POST["morte_fetale_num"])){
     $num = $_POST["morte_fetale_num"];
     $class4 = "";
 }
 else {
     $num = null;
     $class4 = "errors";
 }
?>
<script>
   $( document ).ready(function() {
    if (('<?php echo $nata; ?>' == '') || ('<?php echo $morte; ?>' == '') || ('<?php echo $_SESSION["stato"]; ?>' == 'chiusa') || ('<?php echo $_SESSION["stato"]; ?>' == 'chiusa_usr')){
        document.getElementById("dataU").disabled = true;
        document.getElementById("dataA").disabled = true;
        document.getElementById("dataE").disabled = true;
    }
    else {
        document.getElementById("dataU").disabled = false;
        document.getElementById("dataA").disabled = false;
        document.getElementById("dataE").disabled = false;
    }
   });
     
   $(function() {
      $('#numVisite').keypad();    
   });
  
$(function() {
   $( "#dataU" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-70:+0",
        changeMonth: true,
        changeYear: true, 
        minDate: "<?php echo $nata; ?>",
        maxDate: "<?php echo $morte; ?>" //new Date(2015, 10 - 10, 29) //"+0D"
    });
 });
$(function() {
   $( "#dataA" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-70:+0",
        changeMonth: true,
        changeYear: true,
        minDate: "<?php echo $nata; ?>", //manca
        maxDate: "<?php echo $morte; ?>" //new Date(2015, 10 - 10, 29) //"+0D"
    });
 });
$(function() {
   $( "#dataE" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-70:+0",
        changeMonth: true,
        changeYear: true,
        minDate: "<?php echo $nata; ?>", //manca
        maxDate: "<?php echo $morte; ?>" //new Date(2015, 10 - 10, 29) //"+0D"
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
<form id="adminform" name="adminform" action="db/info_morte_fetale_sendf.php" method="post">
    <div class="col-2">
        <label <?php echo "class=".$class1; ?>>
            Data ultima mestruazione * <sup>1</sup><br/>
            <input id="dataU" name="dataU" tabindex="12" value="<?php echo $dataU; ?>" <?php echo $dis; ?>>
         
        </label>
    </div>
    <div class="col-2">
        <label <?php echo "class=".$class2; ?>>
            Data presunta parto anamnestico * <sup>1</sup><br/>
            <input id="dataA" name="dataA" tabindex="12" value="<?php echo $dataA; ?>" <?php echo $dis; ?>>
        </label>
    </div>
    <div class="col-2">
        <label <?php echo "class=".$class3; ?>>
            Data presunta parto ecografico * <sup>1</sup><br/>
            <input id="dataE" name="dataE" tabindex="12" value="<?php echo $dataE; ?>" <?php echo $dis; ?>>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 9px;" <?php echo "class=".$class4; ?>>
            N° visite di controllo in gravidanza * <br/>
            <input placeholder="" id="numVisite" name="numVisite" tabindex="12" style="width: 100%;" readonly value="<?php echo $num; ?>" <?php echo $dis; ?>>
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
    </div></form>