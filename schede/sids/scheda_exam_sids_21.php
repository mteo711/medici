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

	require_once("./db/cavita_addominale_sids_load.php");
	loadPage();
	require_once("./db/loadtab_autopsia.php");
	tab_autopsia();
	if(isset($_POST["cavita_addominale_eterotassia"])){
		$eterotassia = $_POST["cavita_addominale_eterotassia"];
		$class1 = "";
	}
	else {
		$eterotassia = null;
		$class1 = "errors";
	}
	if(isset($_POST["cavita_addominale_malformazioniG"])){
		$malfoG = $_POST["cavita_addominale_malformazioniG"];
		$class2 = "";
	}
	else {
		$malfoG = null;
		$class2 = "errors";
	}
	if(isset($_POST["cavita_addominale_specMG"])){
		$specMG = $_POST["cavita_addominale_specMG"];
		$class3 = "";
	}
	else {
		$specMG = null;
		$class3 = "errors";
	}
	if(isset($_POST["cavita_addominale_emoraggieG"])){
		$emoraggieG = $_POST["cavita_addominale_emoraggieG"];
		$class4 = "";
	}
	else {
		$emoraggieG = null;
		$class4 = "errors";
	}
	if(isset($_POST["cavita_addominale_altroG"])){
		$altroG = $_POST["cavita_addominale_altroG"];
		$class5 = "";
	}
	else {
		$altroG = null;
		$class5 = "errors";
	}
	if(isset($_POST["cavita_addominale_pesoS"])){
		$pesoS = $_POST["cavita_addominale_pesoS"];
		$class6 = "";
	}
	else {
		$pesoS = null;
		$class6 = "errors";
	}
	if(isset($_POST["cavita_addominale_emoraggieS"])){
		$emoraggieS = $_POST["cavita_addominale_emoraggieS"];
		$class7 = "";
	}
	else {
		$emoraggieS = null;
		$class7 = "errors";
	}
	if(isset($_POST["cavita_addominale_ispessimenti"])){
		$ispessimenti = $_POST["cavita_addominale_ispessimenti"];
		$class8 = "";
	}
	else {
		$ispessimenti = null;
		$class8 = "errors";
	}
	if(isset($_POST["cavita_addominale_pesoR"])){
		$pesoR = $_POST["cavita_addominale_pesoR"];
		$class9 = "";
	}
	else {
		$pesoR = null;
		$class9 = "errors";
	}
	if(isset($_POST["cavita_addominale_malformazioniR"])){
		$malformazioniR = $_POST["cavita_addominale_malformazioniR"];
		$class10 = "";
	}
	else {
		$malformazioniR = null;
		$class10 = "errors";
	}
	if(isset($_POST["cavita_addominale_ischemia"])){
		$ischemia = $_POST["cavita_addominale_ischemia"];
		$class11 = "";
	}
	else {
		$ischemia = null;
		$class11 = "errors";
	}
	if(isset($_POST["cavita_addominale_microlitiasi"])){
		$microlitiasi = $_POST["cavita_addominale_microlitiasi"];
		$class12 = "";
	}
	else {
		$microlitiasi = null;
		$class12 = "errors";
	}
	if(isset($_POST["cavita_addominale_pesoM"])){
		$pesoM = $_POST["cavita_addominale_pesoM"];
		$class13 = "";
	}
	else {
		$pesoM = null;
		$class13 = "errors";
	}
	if(isset($_POST["cavita_addominale_tipoM"])){
		$tipoM = $_POST["cavita_addominale_tipoM"];
		$class14 = "";
	}
	else {
		$tipoM = null;
		$class14 = "errors";
	}
	if(isset($_POST["cavita_addominale_pesoF"])){
		$pesoF = $_POST["cavita_addominale_pesoF"];
		$class15 = "";
	}
	else {
		$pesoF = null;
		$class15 = "errors";
	}
	if(isset($_POST["cavita_addominale_coloreF"])){
		$coloreF = $_POST["cavita_addominale_coloreF"];
		$class16 = "";
	}
	else {
		$coloreF = null;
		$class16 = "errors";
	}
	if(isset($_POST["cavita_addominale_pesoP"])){
		$pesoP = $_POST["cavita_addominale_pesoP"];
		$class17 = "";
	}
	else {
		$pesoP = null;
		$class17 = "errors";
	}
	if(isset($_POST["cavita_addominale_coloreP"])){
		$coloreP = $_POST["cavita_addominale_coloreP"];
		$class18 = "";
	}
	else {
		$coloreP = null;
		$class18 = "errors";
	}
?>
<script>
$( document ).ready(function() {
    if ('<?php echo $malfoG; ?>' == 'Y'){
    document.getElementById('mal').style.visibility = 'visible';
    }
  });

  $(function() {
      $('#pesSu').keypad();    
  });

  $(function() {
      $('#pesRe').keypad();    
  });
    
  $(function() {
      $('#pesFeg').keypad();    
  });
    
  $(function() {
      $('#pesMil').keypad();    
  });
    
  $(function() {
      $('#pesPan').keypad();    
  });

	 $(function() {
	 	$( "#slct" ).selectmenu({
	 		 change: function(event, ui){
	 		 	var select = document.getElementById('slct');
	 		 	   var value = select.value;
	 		 	   if (value == 'Y') {
	 		 		  document.getElementById('mal').style.visibility='visible'; return;
	 		 	   }
	 		 		  document.getElementById('mal').style.visibility='hidden'; return;
	 		 }
	 	});
        $('#slct').val('<?php echo $malfoG; ?>');
	 	$('#slct').selectmenu('refresh', true);
	 });

	 $(function() {
	 	$( "#etero" ).selectmenu();
	 	$('#etero').val('<?php echo $eterotassia; ?>');
	 	$('#etero').selectmenu('refresh', true);
	 });
	 $(function() {
	 	$( "#emo" ).selectmenu();
	 	$('#emo').val('<?php echo $emoraggieG; ?>');
	 	$('#emo').selectmenu('refresh', true);
	 });
	 $(function() {
	 	$( "#emo2" ).selectmenu();
	 	$('#emo2').val('<?php echo $emoraggieS; ?>');
	 	$('#emo2').selectmenu('refresh', true);
	 });
	 $(function() {
	 	$( "#isp" ).selectmenu();
	 	$('#isp').val('<?php echo $ispessimenti; ?>');
	 	$('#isp').selectmenu('refresh', true);
	 });
	 $(function() {
	 	$( "#ische" ).selectmenu();
	 	$('#ische').val('<?php echo $ischemia; ?>');
	 	$('#ische').selectmenu('refresh', true);
	 });
	 $(function() {
		$( "#micro" ).selectmenu();
		$('#micro').val('<?php echo $microlitiasi; ?>');
		$('#micro').selectmenu('refresh', true);
	 });
	 $(function() {
		$( "#tipo" ).selectmenu();
		$('#tipo').val('<?php echo $tipoM; ?>');
		$('#tipo').selectmenu('refresh', true);
	 });
	 $(function() {
	 	$( "#slct1" ).selectmenu();
	 	$('#slct1').val('<?php echo $malformazioniR; ?>');
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
<form id="adminform" name="adminform" action="db/cavita_addominale_sids_send.php" method="post">
	<div class="col-1">
		<label style="padding-top: 8px;" <?php echo "class=".$class1; ?>>
			Eterotassia viscerale *<br/>
			<select tabindex="11" id="etero" name="eterotassia" style="width:75%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Tratto gastroenterico <br/>
		</label> 
	</div>
	<div class="col-2">
		<label style="padding-top: 8px;" <?php echo "class=".$class2; ?>>
			Malformazioni *<br/>
			<select tabindex="11" id="slct" name="malformazioniG" style="width:50%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si (specificare)</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label id="mal" style="visibility: hidden;padding-top: 0px;" <?php echo "class=".$class3; ?>>
			Specificare *<br/>
			<textarea name="specMalfoG" style="height:24px;" <?php echo $dis; ?>><?php echo $specMG; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 8px;" <?php echo "class=".$class4; ?>>
			Emoraggie *<br/>
			<select tabindex="11" id="emo" name="emoraggieG" style="width:50%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 0px;">
			Altro <br/>
			<textarea name="altroEmoG" style="height:24px;" <?php echo $dis; ?>><?php echo $altroG; ?></textarea>
		</label>
	</div>
	<div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Surreni
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 6px;" <?php echo "class=".$class6; ?>>
			Peso (gr) *<br/>
			<?php
				echo "<input placeholder=\"gr.\" $dis id=\"pesSu\" name=\"pesSu\" style=\"width: 100%;\" readonly value=\"".$pesoS."\">";
			?>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 8px;" <?php echo "class=".$class7; ?>>
			Emoraggie *<br/>
			<select tabindex="11" id="emo2" name="emoraggieS"style="width:50%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 8px;" <?php echo "class=".$class8; ?>>
			Ispessimenti *<br/>
			<select tabindex="11" id="isp" name="ispessimenti" style="width:50%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="diffusi">Diffusi</option>
				<option value="nodulari">Nodulari</option>
			</select>
		</label>
	</div>
	<div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Reni
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 4px;" <?php echo "class=".$class9; ?>>
			Peso (gr) *<br/>
			<?php
				echo "<input placeholder=\"gr.\" $dis id=\"pesRe\" name=\"pesRe\" style=\"width: 100%;\" readonly value=\"".$pesoR."\">";
			?>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 6px;" <?php echo "class=".$class10; ?>>
			Malformazioni *<br/>
			<select tabindex="11" id="slct1" name="malformazioniR" style="width:50%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 8px;" <?php echo "class=".$class11; ?>>
			Ischemia corticale e congestione della midollare *<br/>
			<select tabindex="11" id="ische" name="ischemia" style="width:50%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 8px;" <?php echo "class=".$class12; ?>>
			Microlitiasi o ascessualizzazioni *<br/>
			<select tabindex="11" id="micro" name="microlitiasi" style="width:50%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Milza
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 4px;" <?php echo "class=".$class13; ?>>
			Peso (gr) *<br/>
			<?php
				echo "<input placeholder=\"gr.\" $dis id=\"pesMil\" name=\"pesMil\" style=\"width: 100%;\" readonly value=\"".$pesoM."\">";
			?>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 6px;" <?php echo "class=".$class14; ?>>
			Tipo *<br/>
			<select tabindex="11" id="tipo" name="tipoM" style="width:50%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="assenza">Assenza (asplenia)</option>
				<option value="milze multiple">Milze multiple (polisplenia)</option>
			</select>
		</label>
	</div>
	<div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Fegato <br/>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 6px;" <?php echo "class=".$class15; ?>>
			Peso (gr) *<br/>
			<?php
				echo "<input placeholder=\"gr.\" $dis id=\"pesFeg\" name=\"pesFeg\" style=\"width: 100%;\" readonly value=\"".$pesoF."\">";
			?>
		</label>
	</div>
	<div class="col-2b">
		<label style="padding-top: 0px;" <?php echo "class=".$class16; ?>>
			Consistenza e Colore al taglio *<br/>
			<textarea name="coloreF" style="height:24px;" <?php echo $dis; ?>><?php echo $coloreF; ?></textarea>
		</label>
	</div>
	<div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Pancreas <br/>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 6px;" <?php echo "class=".$class17; ?>>
			Peso (gr) *<br/>
			<?php
				echo "<input placeholder=\"gr.\" $dis id=\"pesPan\" name=\"pesPan\" style=\"width: 100%;\" readonly value=\"".$pesoP."\">";
			?>
		</label>
	</div>
	<div class="col-2b">
		<label style="padding-top: 0px;" <?php echo "class=".$class18; ?>>
			Consistenza e Colore al taglio *<br/>
			<textarea name="coloreP" style="height:24px;" <?php echo $dis; ?>><?php echo $coloreP; ?></textarea>
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