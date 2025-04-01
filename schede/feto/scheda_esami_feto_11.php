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
require_once("./db/info_morte_fetale_load3.php");
loadPage();
require_once("./db/loadtab_esamimf.php");
tab_esamimf();
if(isset($_POST["morte_fetale_ecografia"])){
    $eco = $_POST["morte_fetale_ecografia"];
    $class1 = "";
}
else {
    $eco = null;
    $class1 = "errors";
}
if(isset($_POST["morte_fetale_malfoF"])){
    $malfoF = $_POST["morte_fetale_malfoF"];
    $class2 = "";
}
else {
    $malfoF = null;
    $class2 = "errors";
}
if(isset($_POST["morte_fetale_placenta"])){
    $placenta = $_POST["morte_fetale_placenta"];
    $class3 = "";
}
else {
    $placenta = null;
    $class3 = "errors";
}
if(isset($_POST["morte_fetale_malfoU"])){
    $malfoU = $_POST["morte_fetale_malfoU"];
    $class4 = "";
}
else {
    $malfoU = null;
    $class4 = "errors";
}
if(isset($_POST["morte_fetale_specU"])){
    $specU = $_POST["morte_fetale_specU"];
    $class5 = "";
}
else {
    $specU = null;
    $class5 = "errors";
}

?>
<script>
$( document ).ready(function() {
    if ('<?php echo $eco; ?>' == 'patologico'){
    document.getElementById('spec').style.visibility = 'visible';
    }
    if ('<?php echo $malfoU; ?>' == 'Y'){
    document.getElementById('spec1').style.visibility = 'visible';
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
        $("#slct").val('<?php echo $eco; ?>')
        $('#slct').selectmenu('refresh', true);
	});
    
	$(function() {
		$( "#slct1" ).selectmenu({
			 change: function(event, ui){
			 	var select = document.getElementById('slct1');
			 	   var value = select.value;
			 	   if (value == 'Y') {
			 		  document.getElementById('spec1').style.visibility='visible'; return;
			 	   }
			 		  document.getElementById('spec1').style.visibility='hidden'; return;
			 }
		});
        $("#slct1").val('<?php echo $malfoU; ?>')
        $('#slct1').selectmenu('refresh', true);
	});
    
	$(function() {
		$( "#malformazioni" ).selectmenu();
        $("#malformazioni").val('<?php echo $malfoF; ?>')
        $('#malformazioni').selectmenu('refresh', true);
	});
    
    
	$(function() {
		$( "#placenta" ).selectmenu();
        $("#placenta").val('<?php echo $placenta; ?>')
        $('#placenta').selectmenu('refresh', true);
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
<form id="adminform" name="adminform" action="db/info_morte_fetale_sendf3.php" method="post">
	<div class="col-3">
		<label <?php echo "class=".$class1; ?>>
			Ecografia *<br/>
			<select tabindex="11" id="slct" style="width:75%;" name="ecografia" v>
                <option value=""> &nbsp </option>
				<option value="mancante">Dato Mancante</option>    
				<option value="normale">Normale</option>
				<option value="non effettuata">Non effettuata</option>
				<option value="patologico">Patologico (specificare)</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label id="spec" style="visibility: hidden" <?php echo "class=".$class2; ?>>
			Malformazioni fetali *<br/>
			<select tabindex="11" id="malformazioni" style="width:75%;" name="malfoF" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="cardiache">Cardiache</option>
				<option value="SNC">SNC</option>
				<option value="parete addominale">Parete addominale</option>
				<option value="tratto gastroenterico">Tratto gastroenterico</option>
				<option value="arteria ombelicale unica">Arteria ombelicale unica</option>
				<option value="apparato muscolo scheletrico">Apparato muscolo scheletrico</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label <?php echo "class=".$class3; ?>>
			Placenta *<br/>
			<select tabindex="11" id="placenta" style="width:75%;" name="placenta" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="distacco intempestivo">Distacco intempestivo</option>
				<option value="previa">Previa</option>
				<option value="vasi previ">Vasi previ</option>
				<option value="infarto">Infarto</option>
				<option value="accreta-percreta">Accreta-percreta</option>
				<option value="apparato muscolo scheletrico">Apparato muscolo scheletrico</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top:13px;" <?php echo "class=".$class4; ?>>
			Utero *<br/>
			<select tabindex="11" id="slct1" style="width:75%;" name="malfoU" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
			 	<option value="N">Normale</option> 
				<option value="Y">Malformazioni (specificare)</option>
			</select>
		</label>
 	</div>
	<div class="col-2">
		<label id="spec1" style="visibility: hidden" <?php echo "class=".$class5; ?>>
			Specificare *<br/>
			<textarea name="specU" style="height:24px;" <?php echo $dis; ?>><?php echo $specU; ?></textarea>
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