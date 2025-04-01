
<!--
 * User: lucaferrari
 * Date: 12/06/15
 */
 -->
<script src="js/scripts.js"></script>
<link rel="stylesheet" href="js/jquery/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="js/jquery/jquery-ui.js"></script>
<!--<link rel="stylesheet" type="text/css" href="css/DateTimePicker.css" />
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
 require_once("./db/padre_load2.php");
 loadPage();
 require_once("./db/loadtab_padre.php");
 tab_padre();
 if(isset($_POST["padre_alcol_alcol"])){
     $alcol = $_POST["padre_alcol_alcol"];
     $class1 = "";
 }
 else {
     $alcol = null;
     $class1 = "errors";
 }
 if(isset($_POST["padre_alcol_specA"])){
     $specA = $_POST["padre_alcol_specA"];
     $class2 = "";
 }
 else {
     $specA = null;
     $class2 = "errors";
 }
 if(isset($_POST["padre_alcol_stupefacenti"])){
     $stupefacenti = $_POST["padre_alcol_stupefacenti"];
     $class3 = "";
 }
 else {
     $stupefacenti = null;
     $class3 = "errors";
 }
 if(isset($_POST["padre_alcol_specS"])){
     $specS = $_POST["padre_alcol_specS"];
     $class4 = "";
 }
 else {
     $specS = null;
     $class4 = "errors";
 }
?>
<script>
$( document ).ready(function() {
    if ('<?php echo $alcol; ?>' == 'Y'){
    document.getElementById('qualia').style.visibility = 'visible';
    }
    if ('<?php echo $stupefacenti; ?>' == 'Y'){
    document.getElementById('qualid').style.visibility = 'visible';
    }
  });
$(function() {
    $( "#slct" ).selectmenu({
         change: function(event, ui){
             var select = document.getElementById('slct');
                var value = select.value;
                if (value == 'Y') {
                   document.getElementById('qualia').style.visibility = 'visible'; return;
                }
                   document.getElementById('qualia').style.visibility = 'hidden'; return;
         }
    });
    $("#slct").val('<?php echo $alcol; ?>')
    $('#slct').selectmenu('refresh', true);
});

    
$(function() {
    $( "#slct1" ).selectmenu({
         change: function(event, ui){
             var select = document.getElementById('slct1');
                var value = select.value;
                if (value == 'Y') {
                   document.getElementById('qualid').style.visibility = 'visible'; return;
                }
                   document.getElementById('qualid').style.visibility = 'hidden'; return;
         }
    });
    $("#slct1").val('<?php echo $stupefacenti; ?>')
    $('#slct1').selectmenu('refresh', true);
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
                Consuma bevande alcoliche? *<br/>
                <select tabindex="41" id="slct" name="alcool" style="width:75%;" <?php echo $dis; ?>>
                    <option value=""> &nbsp </option>
                    <option value="mancante">Dato Mancante</option>
                    <option value="Y">Si (specificare)</option>
                    <option value="N">No</option>
                </select>
            </label>
        </div>
        <div class="col-2">
            <label id="qualia" style="visibility:hidden;padding-top: 0px;" <?php echo "class=".$class2; ?>>
                Quali e quando *<br/>
                <?php
                    echo "<textarea name=\"qualiAlcool\" $dis style=\"height:24px;\">".$specA."</textarea>";
                ?>
            </label>
        </div>
        <div class="col-2">
            <label style="padding-top: 7px;" <?php echo "class=".$class3; ?>>
                Utilizza, o ha utilizzato, sostanze stupefacenti? *<br/>
                <select tabindex="44" id="slct1" name="stupefacenti" style="width:75%;" <?php echo $dis; ?>>
                    <option value=""> &nbsp </option>
                    <option value="mancante">Dato Mancante</option>
                    <option value="Y">Si (specificare)</option>
                    <option value="N">No</option>
                </select>
            </label>
        </div>
        <div class="col-2" >
            <label id="qualid" style="visibility:hidden;padding-top: 0px;" <?php echo "class=".$class4; ?>>
                Quali e quando *<br/>
                <?php
                    echo "<textarea name=\"qualiStupe\" $dis style=\"height:24px;\">".$specS."</textarea>";
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
                     echo "<button class='guide' onclick=\"performSubmit('succ_d')\">< Prec</button>";
                ?>

            </label>
        </div>
    <div class="col-7">
        <label style="font-size: 15px; color: #000;">
            <?php
                 echo "<button class='guide' onclick=\"performSubmit('succ_v')\">Succ ></button>";
            ?>            
            <input type="hidden" id="action" name="action"  value="" />    
        </label>
    </div>

</form>