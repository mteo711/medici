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
require_once("./db/info_morte_fetale_load2.php");
loadPage();
require_once("./db/loadtab_esamimf.php");
tab_esamimf();
if(isset($_POST["morte_fetale_biopsia"])){
    $biopsia = $_POST["morte_fetale_biopsia"];
    $class1 = "";
}
else {
    $biopsia = null;
    $class1 = "errors";
}
if(isset($_POST["morte_fetale_specB"])){
    $specB = $_POST["morte_fetale_specB"];
    $class2 = "";
}
else {
    $specB = null;
    $class2 = "errors";
}
if(isset($_POST["morte_fetale_amniocentesi"])){
    $amnio = $_POST["morte_fetale_amniocentesi"];
    $class3 = "";
}
else {
    $amnio = null;
    $class3 = "errors";
}
if(isset($_POST["morte_fetale_specA"])){
    $specA = $_POST["morte_fetale_specA"];
    $class4 = "";
}
else {
    $specA = null;
    $class4 = "errors";
}
if(isset($_POST["morte_fetale_funicolocentesi"])){
    $funicolo = $_POST["morte_fetale_funicolocentesi"];
    $class5 = "";
}
else {
    $funicolo = null;
    $class5 = "errors";
}
if(isset($_POST["morte_fetale_specF"])){
    $specF = $_POST["morte_fetale_specF"];
    $class6 = "";
}
else {
    $specF = null;
    $class6 = "errors";
}
if(isset($_POST["morte_fetale_fetoscopia"])){
    $feto = $_POST["morte_fetale_fetoscopia"];
    $class7 = "";
}
else {
    $feto = null;
    $class7 = "errors";
}
if(isset($_POST["morte_fetale_specFS"])){
    $specFS = $_POST["morte_fetale_specFS"];
    $class8 = "";
}
else {
    $specFS = null;
    $class8 = "errors";
}
?>
<script>
$( document ).ready(function() {
    <?php
        require_once("./db/loadtab_esamimf.php");
        tab_esamimf();
    ?>
    if ('<?php echo $biopsia; ?>' == 'patologico'){
    document.getElementById('specs').style.visibility = 'visible';
    }
    if ('<?php echo $amnio; ?>' == 'patologico'){
    document.getElementById('specs1').style.visibility = 'visible';
    }
    if ('<?php echo $funicolo; ?>' == 'patologico'){
    document.getElementById('specs2').style.visibility = 'visible';
    }
    if ('<?php echo $feto; ?>' == 'patologico'){
    document.getElementById('specs3').style.visibility = 'visible';
    }
});
	$(function() {
		$( "#slct" ).selectmenu({
			 change: function(event, ui){
			 	var select = document.getElementById('slct');
			 	   var value = select.value;
			 	   if (value == 'patologico') {
			 		  document.getElementById('specs').style.visibility='visible'; return;
			 	   }
			 		  document.getElementById('specs').style.visibility='hidden'; return;
			 }
		});
         $("#slct").val('<?php echo $biopsia; ?>')
         $('#slct').selectmenu('refresh', true);
	});
    
	$(function() {
		$( "#slct1" ).selectmenu({
			 change: function(event, ui){
			 	var select = document.getElementById('slct1');
			 	   var value = select.value;
			 	   if (value == 'patologico') {
			 		  document.getElementById('specs1').style.visibility='visible'; return;
			 	   }
			 		  document.getElementById('specs1').style.visibility='hidden'; return;
			 }
		});
         $("#slct1").val('<?php echo $amnio; ?>')
         $('#slct1').selectmenu('refresh', true);
	});
    
	$(function() {
		$( "#slct2" ).selectmenu({
			 change: function(event, ui){
			 	var select = document.getElementById('slct2');
			 	   var value = select.value;
			 	   if (value == 'patologico') {
			 		  document.getElementById('specs2').style.visibility='visible'; return;
			 	   }
			 		  document.getElementById('specs2').style.visibility='hidden'; return;
			 }
		});
         $("#slct2").val('<?php echo $funicolo; ?>')
         $('#slct2').selectmenu('refresh', true);
	});
    
	$(function() {
		$( "#slct3" ).selectmenu({
			 change: function(event, ui){
			 	var select = document.getElementById('slct3');
			 	   var value = select.value;
			 	   if (value == 'patologico') {
			 		  document.getElementById('specs3').style.visibility='visible'; return;
			 	   }
			 		  document.getElementById('specs3').style.visibility='hidden'; return;
			 }
		});
         $("#slct3").val('<?php echo $feto; ?>')
         $('#slct3').selectmenu('refresh', true);
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
<form id="adminform" name="adminform" action="db/info_morte_fetale_sendf2.php" method="post">
	<div class="col-2">
		<label style="padding-top:13px" <?php echo "class=".$class1; ?>>
			Biopsia villicoriale *<br/>
			<select tabindex="11" id="slct" style="width:75%;" name="biopsia" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>    
				<option value="normale">Normale</option>
				<option value="non effettuata">Non effettuata</option>
				<option value="patologico">Patologico (specificare)</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label id="specs" style="visibility: hidden" <?php echo "class=".$class2; ?>>
			Specificare *<br/>
			<textarea name="specB" style="height:24px;" <?php echo $dis; ?>><?php echo $specB; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top:13px" <?php echo "class=".$class3; ?>>
			Amniocentesi *<br/>
			<select tabindex="11" id="slct1" style="width:75%;" name="amnio" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>    
				<option value="normale">Normale</option>
				<option value="non effettuata">Non effettuata</option>
				<option value="patologico">Patologico (specificare)</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label id="specs1" style="visibility: hidden" <?php echo "class=".$class4; ?>>
			Specificare *<br/>
			<textarea name="specA" style="height:24px;" <?php echo $dis; ?>><?php echo $specA; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top:13px" <?php echo "class=".$class5; ?>>
			Funicolocentesi *<br/>
			<select tabindex="11" id="slct2" style="width:75%;" name="funicolo" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>    
				<option value="normale">Normale</option>
				<option value="non effettuata">Non effettuata</option>
				<option value="patologico">Patologico (specificare)</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label id="specs2" style="visibility: hidden" <?php echo "class=".$class6; ?>>
			Specificare *<br/>
			<textarea name="specF" style="height:24px;" <?php echo $dis; ?>><?php echo $specF; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top:13px" <?php echo "class=".$class7; ?>>
			Fetoscopia *<br/>
			<select tabindex="11" id="slct3" style="width:75%;" name="fetosc" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>    
				<option value="normale">Normale</option>
				<option value="non effettuata">Non effettuata</option>
				<option value="patologico">Patologico (specificare)</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label id="specs3" style="visibility: hidden" <?php echo "class=".$class8; ?>>
			Specificare *<br/>
			<textarea name="specFS" style="height:24px;" <?php echo $dis; ?>><?php echo $specFS; ?></textarea>
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
