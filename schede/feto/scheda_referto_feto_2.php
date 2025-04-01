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
require_once("./db/referto_macroscopico_annessi_fetali_load2.php");
loadPage();
require_once("./db/loadtab_annessif.php");
tab_annessif();

$checked1 = "";
$checked2 = "";
$checked3 = "";
$checked4 = "";
$checked5 = "";
$checked6 = "";
$checked7 = "";
$checked8 = "";
if(isset($_POST["annessi_lungC"])){
    $lungC = $_POST["annessi_lungC"];
    $class1 = "";
}
else {
    $lungC = null;
    $class1 = "errors";
}
if(isset($_POST["annessi_diamMax"])){
    $diamMax = $_POST["annessi_diamMax"];
    $class2 = "";
}
else {
    $diamMax = null;
    $class2 = "errors";
}
if(isset($_POST["annessi_diamMin"])){
    $diamCMin = $_POST["annessi_diamMin"];
    $class3 = "";
}
else {
    $diamCMin = null;
    $class3 = "errors";
}
if(isset($_POST["annessi_inserzione"])){
    $inser = $_POST["annessi_inserzione"];
    $class4 = "";
}
else {
    $inser = null;
    $class4 = "errors";
}
if(isset($_POST["annessi_distMC"])){
    $distMC= $_POST["annessi_distMC"];
    $class5 = "";
}
else {
    $distMC = null;
    $class5 = "errors";
}
if(isset($_POST["annessi_altro"])){
     $altro = $_POST["annessi_altro"];
     $class6 = "";
     $check = explode(",", $altro);
     (in_array("nodi veri", $check)) ? $checked1 = "checked" : $checked1 = "";
     (in_array("nodi falsi", $check)) ? $checked2 = "checked" : $checked2 = "";
     (in_array("torsione", $check)) ? $checked3 = "checked" : $checked3 = "";
     (in_array("restringimenti", $check)) ? $checked4 = "checked" : $checked4 = "";
     (in_array("iperspiralizzazione", $check)) ? $checked5 = "checked" : $checked5 = "";
     (in_array("aneurismi", $check)) ? $checked6 = "checked" : $checked6 = "";
     (in_array("ematomi", $check)) ? $checked7 = "checked" : $checked7 = "";
     (in_array("trombosi", $check)) ? $checked8 = "checked" : $checked8 = "";
 }
 else{ 
     $altro = null;
     $class6 = "errors";
 }
?>
<script>
    
  $(function() {
      $('#lung').keypad();    
  });
    
  $(function() {
      $('#diamM').keypad();    
  });
    
  $(function() {
      $('#diamm').keypad();    
  });
    
  $(function() {
      $('#dist').keypad();    
  });

    
  $(function() {
  	$( "#inserzione" ).selectmenu();
    $("#inserzione").val('<?php echo $inser; ?>')
    $('#inserzione').selectmenu('refresh', true);
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
<form id="adminform" name="adminform" action="db/referto_macroscopico_annessi_fetali_sendf2.php" method="post">
	<div class="col-3">
		<label <?php echo "class=".$class1; ?>>
			Lunghezza (cm) *<br/>
			<input placeholder="cm" id="lung" name="lungC" tabindex="39" style="width: 100%;" readonly value="<?php echo $lungC; ?>" <?php echo $dis; ?>></input>
		</label>
	</div>
	<div class="col-3">
		<label <?php echo "class=".$class2; ?>>
			Diametro Massimo (cm) *<br/>
			<input placeholder="cm" id="diamM" name="diamCMax" tabindex="39" style="width: 100%;" readonly value="<?php echo $diamMax; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-3">
		<label <?php echo "class=".$class3; ?>>
			Diametro Minimo (cm) *<br/>
			<input placeholder="cm" id="diamm" name="diamCMin" tabindex="39" style="width: 100%;" readonly value="<?php echo $diamCMin; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top:7px;" <?php echo "class=".$class4; ?>>
			Inserzione *<br/>
			<select tabindex="38" id="inserzione" style="width:75%;" name="inserz" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="centrale">Centrale</option>
				<option value="marginale">Marginale</option>
				<option value="eccentrica">Eccentrica</option>
				<option value="velamentosa">Velamentosa</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class5; ?>>
			Distanza dal margine matero-fetale (cm) *<br/>
			<input placeholder="cm" id="dist" name="distMC" tabindex="39" style="width: 100%;" readonly value="<?php echo $distMC; ?>" <?php echo $dis; ?>>
		</label>
	</div>
    <div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Altro *<br/>
		</label>
	</div>
	<div class="col-12" id="p1"  >
		<label <?php echo "class=".$class6; ?>>
			<input type="checkbox" style="margin-bottom: 0px;" name="altro[]" value="nodi veri" <?php echo $checked1."  ".$dis;?>>
		</label>
	</div>
	<div class="col-14" id="p2"  >
		<label <?php echo "class=".$class6; ?>>
			Nodi veri
		</label>
	</div>
	<div class="col-12" id="p3"  >
		<label <?php echo "class=".$class6; ?>>
			<input type="checkbox" style="margin-bottom: 0px;" name="altro[]" value="nodi falsi" <?php echo $checked2."  ".$dis;?>>
		</label>
	</div>
	<div class="col-14" id="p4"  >
		<label <?php echo "class=".$class6; ?>>
			Nodi falsi
		</label>
	</div>
	<div class="col-12" id="p5"  >
		<label <?php echo "class=".$class6; ?>>
			<input type="checkbox" style="margin-bottom: 0px;" name="altro[]" value="torsione" <?php echo $checked3."  ".$dis;?>>
		</label>
	</div>
	<div class="col-14" id="p6"  >
		<label <?php echo "class=".$class6; ?>>
			Torsione
		</label>
	</div>
	<div class="col-12" id="p7"  >
		<label <?php echo "class=".$class6; ?>>
			<input type="checkbox" style="margin-bottom: 0px;" name="altro[]" value="restringimenti" <?php echo $checked4."  ".$dis;?>>
		</label>
	</div>
	<div class="col-14" id="p8"  >
		<label <?php echo "class=".$class6; ?>>
			Restringimenti
		</label>
	</div>
	<div class="col-12" id="p9"  >
		<label <?php echo "class=".$class6; ?>>
			<input type="checkbox" style="margin-bottom: 0px;" name="altro[]" value="iperspiralizzazione" <?php echo $checked5."  ".$dis;?>>
		</label>
	</div>
	<div class="col-14" id="p20"  >
		<label <?php echo "class=".$class6; ?>>
			Iperspiralizzazione
		</label>
	</div>
	<div class="col-12" id="p11"  >
		<label <?php echo "class=".$class6; ?>>
			<input type="checkbox" style="margin-bottom: 0px;" name="altro[]" value="aneurismi" <?php echo $checked6."  ".$dis;?>>
		</label>
	</div>
	<div class="col-14" id="p12"  >
		<label <?php echo "class=".$class6; ?>>
			Aneurismi
		</label>
	</div>
	<div class="col-12" id="p13"  >
		<label <?php echo "class=".$class6; ?>>
			<input type="checkbox" style="margin-bottom: 0px;" name="altro[]" value="ematomi" <?php echo $checked7."  ".$dis;?>>
		</label>
	</div>
	<div class="col-14" id="p14"  >
		<label <?php echo "class=".$class6; ?>>
			Ematomi
		</label>
	</div>
	<div class="col-12" id="p15"  >
		<label <?php echo "class=".$class6; ?>>
			<input type="checkbox" style="margin-bottom: 0px;" name="altro[]" value="trombosi" <?php echo $checked8."  ".$dis;?>>
		</label>
	</div>
	<div class="col-14" id="p16"  >
		<label <?php echo "class=".$class6; ?>>
			Trombosi
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