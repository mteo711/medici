
<!--
 * User: lucaferrari
 * Date: 12/06/15
 */
 -->
<script src="js/scripts.js"></script>
<link rel="stylesheet" href="js/jquery/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="js/jquery/jquery-ui.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="css/DateTimePicker.css" />
<script type="text/javascript" src="js/DateTimePicker.js"></script>-->

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
 require_once("./db/padre_load3.php");
 loadPage();
 require_once("./db/loadtab_padre.php");
 tab_padre();
 if(isset($_POST["padre_farmaci_farmaci"])){
     $farmaci = $_POST["padre_farmaci_farmaci"];
     $class1 = "";
 }
 else {
     $farmaci = null;
     $class1 = "errors";
 }
 if(isset($_POST["padre_farmaci_specF"])){
     $specF = $_POST["padre_farmaci_specF"];
     $class2 = "";
 }
 else {
     $specF = null;
     $class2 = "errors";
 }
 if(isset($_POST["padre_farmaci_HIV"])){
     $hiv = $_POST["padre_farmaci_HIV"];
     $class3 = "";
 }
 else {
     $hiv = null;
     $class3 = "errors";
 }
?>

<script>
$( document ).ready(function() {
    if ('<?php echo $farmaci; ?>' == 'Y'){
    document.getElementById('qualif').style.visibility = 'visible';
    }
  });
$(function() {
    $( "#slct" ).selectmenu({
         change: function(event, ui){
             var select = document.getElementById('slct');
                var value = select.value;
                if (value == 'Y') {
                   document.getElementById('qualif').style.visibility = 'visible'; return;
                }
                   document.getElementById('qualif').style.visibility = 'hidden'; return;
         }
    });
    $("#slct").val('<?php echo $farmaci; ?>')
    $('#slct').selectmenu('refresh', true);

});
$(function() {
    $( "#hiv" ).selectmenu();
    $('#hiv').val('<?php echo $hiv; ?>');
    $('#hiv').selectmenu('refresh', true);
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
<form id="adminform" name="adminform" action="db/padre_send.php" method="post"> 
    <div class="col-2">
        <label style="padding-top: 8px;" <?php echo "class=".$class1; ?>>
            Fa uso abituale di sedativi e/o altri farmaci? *<br/>
            <select tabindex="47" id="slct" name="farmaci" style="width:75%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>
                <option value="Y">Si</option>
                <option value="N">No</option>
            </select>
        </label>
    </div>
    <div class="col-2">
        <label id="qualif" style="visibility:hidden;padding-top: 0px;" <?php echo "class=".$class2; ?>>
            Quali *<br/>
            <?php
                echo "<textarea name=\"quali\" $dis style=\"height:24px;\">".$specF."</textarea>";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 7px;" <?php echo "class=".$class3; ?>>
            È risultato positivo al virus dell'HIV? *<br/>
            <select tabindex="49" id="hiv" name="hiv" style="width:75%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>
                <option value="Y">Si</option>
                <option value="N">No</option>
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
                     echo "<button class='guide' onclick=\"performSubmit('succ_f')\">< Prec</button>";
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