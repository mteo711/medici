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
	require_once("./db/cavo_orale_mf_load.php");
	loadPage();
	require_once("./db/loadtab_autopsiaf.php");
	tab_autopsiaf();
	if(isset($_POST["cavo_orale_pesoTr"])){
		$pesoTr = $_POST["cavo_orale_pesoTr"];
		$class1 = "";
	}
	else {
		$pesoTr = null;
		$class1 = "errors";
	}
	if(isset($_POST["cavo_orale_tipoTr"])){
		$tipoTr = $_POST["cavo_orale_tipoTr"];
		$class2 = "";
	}
	else {
		$tipoTr = null;
		$class2 = "errors";
	}
	if(isset($_POST["cavo_orale_specTr"])){
		$specTr = $_POST["cavo_orale_specTr"];
		$class3 = "";
	}
	else {
		$specTr = null;
		$class3 = "errors";
	}
	if(isset($_POST["cavo_orale_pesoTm"])){
		$pesoTm = $_POST["cavo_orale_pesoTm"];
		$class4 = "";
	}
	else {
		$pesoTm = null;
		$class4 = "errors";
	}
	if(isset($_POST["cavo_orale_tipoTm"])){
		$tipoTm = $_POST["cavo_orale_tipoTm"];
		$class5 = "";
	}
	else {
		$tipoTm = null;
		$class5 = "errors";
	}
	if(isset($_POST["cavo_orale_linfonodi"])){
		$linfonodi = $_POST["cavo_orale_linfonodi"];
		$class6 = "";
	}
	else {
		$linfonodi = null;
		$class6 = "errors";
	}
	if(isset($_POST["cavo_orale_laringe"])){
		$laringe = $_POST["cavo_orale_laringe"];
		$class7 = "";
	}
	else {
		$laringe = null;
		$class7 = "errors";
	}
    if(isset($_POST["cavo_orale_specL"])){
		$specL = $_POST["cavo_orale_specL"];
		$class8 = "";
	}
	else {
		$specL = null;
		$class8 = "errors";
	}
?>
<script>
$( document ).ready(function() {
    if ('<?php echo $tipoTr; ?>' == 'malformata'){
    document.getElementById('sel').style.visibility = 'visible';
    }
    if ('<?php echo $laringe; ?>' == 'malformata'){
    document.getElementById('sel3').style.visibility = 'visible';
    }
});
 
  $(function() {
      $('#pesotir').keypad();    
  });
    
  $(function() {
      $('#pesotim').keypad();    
  });
 
  $(function() {
  	$( "#slct2" ).selectmenu({
  		 change: function(event, ui){
  		 	var select = document.getElementById('slct2');
  		 	   var value = select.value;
  		 	   if (value == 'malformata') {
  		 		  document.getElementById('sel').style.visibility='visible'; return;
  		 	   }
  		 		  document.getElementById('sel').style.visibility='hidden'; return;
  		 }
  	});
    $("#slct2").val('<?php echo $tipoTr; ?>')
    $('#slct2').selectmenu('refresh', true);

  });
  
  $(function() {
  	$( "#slct3" ).selectmenu({
  		 change: function(event, ui){
  		 	var select = document.getElementById('slct3');
  		 	   var value = select.value;
  		 	   if (value == 'malformata') {
  		 		  document.getElementById('sel3').style.visibility='visible'; return;
  		 	   }
  		 		  document.getElementById('sel3').style.visibility='hidden'; return;
  		 }
  	});
    $("#slct3").val('<?php echo $laringe; ?>')
    $('#slct3').selectmenu('refresh', true);
  
  });
  $(function() {
  	$( "#specif" ).selectmenu();
    $("#specif").val('<?php echo $tipoTm; ?>')
    $('#specif').selectmenu('refresh', true);
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
<form id="adminform" name="adminform" action="db/cavo_orale_mf_send.php" method="post">
	<div class="col-3">
		<label>
			Tiroide Peso (gr) <br/>
			<input placeholder="gr." id="pesotir" name="pesotir" min="0" tabindex="39" style="width: 100%;" readonly value="<?php echo $pesoTr; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-3">
		<label>
			Tipo <br/>
			<select tabindex="38" id="slct2" style="width:75%;" name="tipoTr" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="normale">Normale</option>
				<option value="malformata">Malformata (specificare)</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label id="sel" style="visibility: hidden">
			Specificare <br/>
			<textarea name="specTr" style="height:24px;"><?php echo $specTr; ?></textarea>
		</label>
	</div>
	<div class="col-3">
		<label>
			Timo Peso (gr) <br/>
			<input placeholder="gr." id="pesotim" name="pesotim" min="0" tabindex="39" style="width: 100%;" readonly value="<?php echo $pesoTm; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-3">
		<label>
			Specificare <br/>
			<select tabindex="38" id="specif" style="width:75%;" name="specTm" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="presente">Presente</option>
				<option value="assente">Assente</option>
				<option value="petecchie emorragiche">Petecchie emorragiche</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label>
			Linfonodi <br/>
			<textarea name="linfonodi" style="height:24px;" <?php echo $dis; ?>><?php echo $linfonodi; ?></textarea>
		</label>
	</div>
	<div class="col-3">
		<label>
			Laringe <br/>
			<select tabindex="38" id="slct3" style="width:75%;" name="laringe" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="normale">Normale</option>
				<option value="malformata">Malformata (specificare)</option>
			</select>
		</label>
	</div>
	<div class="col-2b">
		<label id="sel3" style="visibility: hidden">
			Specificare <br/>
			<textarea name="specL" style="height:24px;" <?php echo $dis; ?>><?php echo $specL; ?></textarea>
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