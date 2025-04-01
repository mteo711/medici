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
	require_once("./db/cavita_toracica_mf_load.php");
	loadPage();
	require_once("./db/loadtab_autopsiaf.php");
	tab_autopsiaf();
	if(isset($_POST["cavita_toracica_sito"])){
		$sito = $_POST["cavita_toracica_sito"];
		$class1 = "";
	}
	else {
		$sito = null;
		$class1 = "errors";
	}
	if(isset($_POST["cavita_toracica_versamenti"])){
		$versamenti = $_POST["cavita_toracica_versamenti"];
		$class2 = "";
	}
	else {
		$versamenti = null;
		$class2 = "errors";
	}
	if(isset($_POST["cavita_toracica_pneumo"])){
		$pneumo = $_POST["cavita_toracica_pneumo"];
		$class3 = "";
	}
	else {
		$pneumo = null;
		$class3 = "errors";
	}
	if(isset($_POST["cavita_toracica_asimmetria"])){
		$asimmetria = $_POST["cavita_toracica_asimmetria"];
		$class4 = "";
	}
	else {
		$asimmetria = null;
		$class4 = "errors";
	}
	if(isset($_POST["cavita_toracica_specA"])){
		$specA = $_POST["cavita_toracica_specA"];
		$class5 = "";
	}
	else {
		$specA = null;
		$class5 = "errors";
	}
	if(isset($_POST["cavita_toracica_aeree"])){
		$vie = $_POST["cavita_toracica_aeree"];
		$class6 = "";
	}
	else {
		$vie = null;
		$class6 = "errors";
	}
	if(isset($_POST["cavita_toracica_specV"])){
		$specV = $_POST["cavita_toracica_specV"];
		$class7 = "";
	}
	else {
		$specV = null;
		$class7 = "errors";
	}
    if(isset($_POST["cavita_toracica_esofago"])){
		$esofago = $_POST["cavita_toracica_esofago"];
		$class8 = "";
	}
	else {
		$esofago = null;
		$class8 = "errors";
	}
    if(isset($_POST["cavita_toracica_specE"])){
		$specE = $_POST["cavita_toracica_specE"];
		$class9 = "";
	}
	else {
		$specE = null;
		$class9 = "errors";
	}
?>
<script>
$( document ).ready(function() {
    if ('<?php echo $asimmetria; ?>' == 'Y'){
    document.getElementById('sel').style.visibility = 'visible';
    }
    if ('<?php echo $vie; ?>' == 'malformati'){
    document.getElementById('sel3').style.visibility = 'visible';
    }
    if ('<?php echo $esofago; ?>' == 'malformazioni'){
    document.getElementById('sel4').style.visibility = 'visible';
    }
});
    
  $(function() {
  	$( "#slct" ).selectmenu({
  		 change: function(event, ui){
  		 	var select = document.getElementById('slct');
  		 	   var value = select.value;
  		 	   if (value == 'Y') {
  		 		  document.getElementById('sel').style.visibility='visible'; return;
  		 	   }
  		 		  document.getElementById('sel').style.visibility='hidden'; return;
  		 }
  	});
    $("#slct").val('<?php echo $asimmetria; ?>')
    $('#slct').selectmenu('refresh', true);

  });

  $(function() {
  	$( "#slct3" ).selectmenu({
  		 change: function(event, ui){
  		 	var select = document.getElementById('slct3');
  		 	   var value = select.value;
  		 	   if (value == 'malformati') {
  		 		  document.getElementById('sel3').style.visibility='visible'; return;
  		 	   }
  		 		  document.getElementById('sel3').style.visibility='hidden'; return;
  		 }
  	});
    $("#slct3").val('<?php echo $vie; ?>')
    $('#slct3').selectmenu('refresh', true);

  });
    
  $(function() {
  	$( "#slct4" ).selectmenu({
  		 change: function(event, ui){
  		 	var select = document.getElementById('slct4');
  		 	   var value = select.value;
  		 	   if (value == 'malformazioni') {
  		 		  document.getElementById('sel4').style.visibility='visible'; return;
  		 	   }
  		 		  document.getElementById('sel4').style.visibility='hidden'; return;
  		 }
  	});
    $("#slct4").val('<?php echo $esofago; ?>')
    $('#slct4').selectmenu('refresh', true);
  
  });
    
  $(function() {
  	$( "#sito" ).selectmenu();
    $("#sito").val('<?php echo $sito; ?>')
    $('#sito').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#versamenti" ).selectmenu();
    $("#versamenti").val('<?php echo $versamenti; ?>')
    $('#versamenti').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#pneumo" ).selectmenu();
    $("#pneumo").val('<?php echo $pneumo; ?>')
    $('#pneumo').selectmenu('refresh', true);
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
<form id="adminform" name="adminform" action="db/cavita_toracica_mf_send.php" method="post">
	<div class="col-3">
		<label <?php echo "class=".$class1; ?>>
			Sito viscerale *<br/>
			<select tabindex="11" id="sito" style="width:75%;" name="sito" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="situs solitus">Situs solitus</option>
				<option value="situs inversus">Situs inversus</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label <?php echo "class=".$class2; ?>>
			Versamenti *<br/>
			<select tabindex="11" id="versamenti" style="width:75%;" name="versamenti" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label <?php echo "class=".$class3; ?>>
			Pneumotorace *<br/>
			<select tabindex="11" id="pneumo" style="width:75%;" name="pneumo" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top:13px" <?php echo "class=".$class4; ?>>
			Asimmetria viscerale *<br/>
			<select tabindex="11" id="slct" style="width:75%;" name="asimmetria" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si (specificare)</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label id="sel" style="visibility: hidden" <?php echo "class=".$class5; ?>>
			Specificare *<br/>
			<textarea name="specA" style="height:24px;" <?php echo $dis; ?>><?php echo $specA; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top:13px" <?php echo "class=".$class6; ?>>
			Vie aeree (laringe, trachea, bronchi) *<br/>
			<select tabindex="11" id="slct3" style="width:75%;" name="vieaeree" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normali">Normali</option>
				<option value="pervie">Pervie</option>
				<option value="malformati">Malformati (specificare)</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label id="sel3" style="visibility: hidden" <?php echo "class=".$class7; ?>>
			Specificare *<br/>
			<textarea name="specV" style="height:24px;" <?php echo $dis; ?>><?php echo $specV; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top:13px" <?php echo "class=".$class8; ?>>
			Esofago *<br/>
			<select tabindex="11" id="slct4" style="width:75%;" name="esofago" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normale">Normale</option>
				<option value="fistole">Fistole</option>
				<option value="malformazioni">Malformazioni (specificare)</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label id="sel4" style="visibility: hidden" <?php echo "class=".$class9; ?>>
			Specificare *<br/>
			<textarea name="specE" style="height:24px;" <?php echo $dis; ?>><?php echo $specE; ?></textarea>
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