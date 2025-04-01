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
	require_once("./db/cavita_addominale_mf_load2.php");
	loadPage();
	require_once("./db/loadtab_autopsiaf.php");
	tab_autopsiaf();
	if(isset($_POST["addominale_surreni"])){
		$surreni = $_POST["addominale_surreni"];
		$class1 = "";
	}
	else {
		$surreni = null;
		$class1 = "errors";
	}
	if(isset($_POST["addominale_malfoS"])){
		$malfoS = $_POST["addominale_malfoS"];
		$class2 = "";
	}
	else {
		$malfoS = null;
		$class2 = "errors";
	}
	if(isset($_POST["addominale_emorragie"])){
		$emo = $_POST["addominale_emorragie"];
		$class3 = "";
	}
	else {
		$emo = null;
		$class3 = "errors";
	}
	if(isset($_POST["addominale_ispessimenti"])){
		$ispessimenti = $_POST["addominale_ispessimenti"];
		$class4 = "";
	}
	else {
		$ispessimenti = null;
		$class4 = "errors";
	}
	if(isset($_POST["addominale_pesoRD"])){
		$pesoRD = $_POST["addominale_pesoRD"];
		$class5 = "";
	}
	else {
		$pesoRD = null;
		$class5 = "errors";
	}
	if(isset($_POST["addominale_statoRD"])){
		$statoRD = $_POST["addominale_statoRD"];
		$class6 = "";
	}
	else {
		$statoRD = null;
		$class6 = "errors";
	}
	if(isset($_POST["addominale_specRD"])){
		$specRD = $_POST["addominale_specRD"];
		$class7 = "";
	}
	else {
		$specRD = null;
		$class7 = "errors";
	}
    if(isset($_POST["addominale_ischemiaRD"])){
		$ischemiaRD = $_POST["addominale_ischemiaRD"];
		$class8 = "";
	}
	else {
		$ischemiaRD = null;
		$class8 = "errors";
	}
    if(isset($_POST["addominale_microlisiRD"])){
		$microlisiRD = $_POST["addominale_microlisiRD"];
		$class9 = "";
	}
	else {
		$microlisiRD = null;
		$class9 = "errors";
	}
    if(isset($_POST["addominale_pesoRS"])){
		$pesoRS = $_POST["addominale_pesoRS"];
		$class10 = "";
	}
	else {
		$pesoRS = null;
		$class10 = "errors";
	}
    if(isset($_POST["addominale_statoRS"])){
		$statoRS = $_POST["addominale_statoRS"];
		$class11 = "";
	}
	else {
		$statoRS = null;
		$class11 = "errors";
	}
    if(isset($_POST["addominale_specRS"])){
		$specRS = $_POST["addominale_specRS"];
		$class12 = "";
	}
	else {
		$specRS = null;
		$class12 = "errors";
	}
    if(isset($_POST["addominale_ischemiaRS"])){
		$ischemiaRS = $_POST["addominale_ischemiaRS"];
		$class13 = "";
	}
	else {
		$ischemiaRS = null;
		$class13 = "errors";
	}
    if(isset($_POST["addominale_microlisiRS"])){
		$microlisiRS = $_POST["addominale_microlisiRS"];
		$class14 = "";
	}
	else {
		$microlisiRS = null;
		$class14 = "errors";
	}
    if(isset($_POST["addominale_ureteri"])){
		$ureteri = $_POST["addominale_ureteri"];
		$class15 = "";
	}
	else {
		$ureteri = null;
		$class15 = "errors";
	}
    if(isset($_POST["addominale_specU"])){
		$specU = $_POST["addominale_specU"];
		$class16 = "";
	}
	else {
		$specU = null;
		$class16 = "errors";
	}
    if(isset($_POST["addominale_vescica"])){
		$vescica = $_POST["addominale_vescica"];
		$class17 = "";
	}
	else {
		$vescica = null;
		$class17 = "errors";
	}
    if(isset($_POST["addominale_specV"])){
		$specV = $_POST["addominale_specV"];
		$class18 = "";
	}
	else {
		$specV = null;
		$class18 = "errors";
	}
    if(isset($_POST["addominale_contenuto"])){
		$contenuto = $_POST["addominale_contenuto"];
		$class19 = "";
	}
	else {
		$contenuto = null;
		$class19 = "errors";
	}
    if(isset($_POST["addominale_uraco"])){
		$uraco = $_POST["addominale_uraco"];
		$class20 = "";
	}
	else {
		$uraco = null;
		$class20 = "errors";
	}
    if(isset($_POST["addominale_testicoli"])){
		$testicoli = $_POST["addominale_testicoli"];
		$class21 = "";
	}
	else {
		$testicoli = null;
		$class21 = "errors";
	}
    if(isset($_POST["addominale_uto"])){
		$uto = $_POST["addominale_uto"];
		$class22 = "";
	}
	else {
		$uto = null;
		$class22 = "errors";
	}
    if(isset($_POST["addominale_specUTO"])){
		$specUTO = $_POST["addominale_specUTO"];
		$class23 = "";
	}
	else {
		$specUTO = null;
		$class23 = "errors";
	}
    if(isset($_POST["addominale_grandi"])){
		$grandi = $_POST["addominale_grandi"];
		$class24 = "";
	}
	else {
		$grandi = null;
		$class24 = "errors";
	}
    if(isset($_POST["addominale_specG"])){
		$specG = $_POST["addominale_specG"];
		$class25 = "";
	}
	else {
		$specG = null;
		$class25 = "errors";
	}
    
?>

<script>
$( document ).ready(function() {
    if ('<?php echo $surreni; ?>' == 'malformati'){
    document.getElementById('surr').style.visibility = 'visible';
    }
    if ('<?php echo $statoRD; ?>' == 'Y'){
    document.getElementById('malr1').style.visibility = 'visible';
    }
    if ('<?php echo $statoRS; ?>' == 'Y'){
    document.getElementById('malr2').style.visibility = 'visible';
    }
    if ('<?php echo $ureteri; ?>' == 'malformati'){
    document.getElementById('malu').style.visibility = 'visible';
    }
    if ('<?php echo $vescica; ?>' == 'malformata'){
    document.getElementById('malv').style.visibility = 'visible';
    }
    if ('<?php echo $uto; ?>' == 'malformazioni'){
    document.getElementById('malov').style.visibility = 'visible';
    }
    if ('<?php echo $grandi; ?>' == 'malformati'){
    document.getElementById('malvasi').style.visibility = 'visible';
    }
});
  
$(function() {
  $('#pesReD').keypad();    
});

$(function() {
  $('#pesReS').keypad();    
});
    
  $(function() {
  	$( "#slct5" ).selectmenu({
  		 change: function(event, ui){
  		 	var select = document.getElementById('slct5');
  		 	   var value = select.value;
  		 	   if (value == 'malformati') {
  		 		  document.getElementById('surr').style.visibility='visible'; return;
  		 	   }
  		 		  document.getElementById('surr').style.visibility='hidden'; return;
  		 }
  	});
    $("#slct5").val('<?php echo $surreni; ?>')
    $('#slct5').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#slct6" ).selectmenu({
  		 change: function(event, ui){
  		 	var select = document.getElementById('slct6');
  		 	   var value = select.value;
  		 	   if (value == 'Y') {
  		 		  document.getElementById('malr1').style.visibility='visible'; return;
  		 	   }
  		 		  document.getElementById('malr1').style.visibility='hidden'; return;
  		 }
  	});
    $("#slct6").val('<?php echo $statoRD; ?>')
    $('#slct6').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#slct7" ).selectmenu({
  		 change: function(event, ui){
  		 	var select = document.getElementById('slct7');
  		 	   var value = select.value;
  		 	   if (value == 'Y') {
  		 		  document.getElementById('malr2').style.visibility='visible'; return;
  		 	   }
  		 		  document.getElementById('malr2').style.visibility='hidden'; return;
  		 }
  	});
    $("#slct7").val('<?php echo $statoRS; ?>')
    $('#slct7').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#slct8" ).selectmenu({
  		 change: function(event, ui){
  		 	var select = document.getElementById('slct8');
  		 	   var value = select.value;
  		 	   if (value == 'malformati') {
  		 		  document.getElementById('malu').style.visibility='visible'; return;
  		 	   }
  		 		  document.getElementById('malu').style.visibility='hidden'; return;
  		 }
  	});
    $("#slct8").val('<?php echo $ureteri; ?>')
    $('#slct8').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#slct9" ).selectmenu({
  		 change: function(event, ui){
  		 	var select = document.getElementById('slct9');
  		 	   var value = select.value;
  		 	   if (value == 'malformata') {
  		 		  document.getElementById('malv').style.visibility='visible'; return;
  		 	   }
  		 		  document.getElementById('malv').style.visibility='hidden'; return;
  		 }
  	});
    $("#slct9").val('<?php echo $vescica; ?>')
    $('#slct9').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#slct10" ).selectmenu({
  		 change: function(event, ui){
  		 	var select = document.getElementById('slct10');
  		 	   var value = select.value;
  		 	   if (value == 'malformazioni') {
  		 		  document.getElementById('malov').style.visibility='visible'; return;
  		 	   }
  		 		  document.getElementById('malov').style.visibility='hidden'; return;
  		 }
  	});
    $("#slct10").val('<?php echo $uto; ?>')
    $('#slct10').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#slct11" ).selectmenu({
  		 change: function(event, ui){
  		 	var select = document.getElementById('slct11');
  		 	   var value = select.value;
  		 	   if (value == 'malformati') {
  		 		  document.getElementById('malvasi').style.visibility='visible'; return;
  		 	   }
  		 		  document.getElementById('malvasi').style.visibility='hidden'; return;
  		 }
  	});
    $("#slct11").val('<?php echo $grandi; ?>')
    $('#slct11').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#emorr" ).selectmenu();
    $("#emorr").val('<?php echo $emo; ?>')
    $('#emorr').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#ispess" ).selectmenu();
    $("#ispess").val('<?php echo $ispessimenti; ?>')
    $('#ispess').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#ischem" ).selectmenu();
    $("#ischem").val('<?php echo $ischemiaRD; ?>')
    $('#ischem').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#micro" ).selectmenu();
    $("#micro").val('<?php echo $microlisiRD; ?>')
    $('#micro').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#ischem2" ).selectmenu();
    $("#ischem2").val('<?php echo $ischemiaRS; ?>')
    $('#ischem2').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#micro2" ).selectmenu();
    $("#micro2").val('<?php echo $microlisiRS; ?>')
    $('#micro2').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#conten" ).selectmenu();
    $("#conten").val('<?php echo $contenuto; ?>')
    $('#conten').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#uraco" ).selectmenu();
    $("#uraco").val('<?php echo $uraco; ?>')
    $('#uraco').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#testic" ).selectmenu();
    $("#testic").val('<?php echo $testicoli; ?>')
    $('#testic').selectmenu('refresh', true);
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
<form id="adminform" name="adminform" action="db/cavita_addominale_mf_send2.php" method="post">
	<div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Surreni
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top:13px" <?php echo "class=".$class1; ?>>
			Tipo *<br/>
			<select tabindex="11" id="slct5" style="width:75%;" name="tipoS" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normali">Normali</option>
				<option value="malformati">Malformati (specificare)</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label id="surr" style="visibility: hidden" <?php echo "class=".$class2; ?>>
			Specificare *<br/>
			<textarea name="specS" style="height:24px;" <?php echo $dis; ?>><?php echo $malfoS; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class3; ?>>
			Emoraggie *<br/>
			<select tabindex="11" id="emorr" style="width:75%;" name="emoraggie" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class4; ?>>
			Ispessimenti *<br/>
			<select tabindex="11" id="ispess" style="width:75%;" name="ispessimenti" <?php echo $dis; ?>>
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
	<div class="col-1">
		<label style="font-size: 14px; color: #000;" >
			Rene DX <br/>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top:11px" <?php echo "class=".$class5; ?>>
			Peso (gr) *<br/>
			<input placeholder="gr." id="pesReD" name="pesReD" min="0" tabindex="39" style="width: 100%;" readonly value="<?php echo $pesoRD; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top:13px" <?php echo "class=".$class6; ?>>
			Malformazioni *<br/>
			<select tabindex="11" id="slct6" style="width:75%;" name="malfoRD" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si (specificare)</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label id="malr1" style="visibility: hidden" <?php echo "class=".$class7; ?>>
			Specificare *<br/>
			<textarea name="specRD" style="height:24px;" <?php echo $dis; ?>><?php echo $specRD; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class8; ?>>
			Ischemia corticale e congestione della midollare *<br/>
			<select tabindex="11" id="ischem" style="width:75%;" name="ischemiaRD" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class9; ?>>
			Microlitiasi o ascessualizzazioni *<br/>
			<select tabindex="11" id="micro" style="width:75%;" name="microlitiasiRD" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-1">
		<label style="font-size: 14px; color: #000;" >
			Rene SX
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top:11px" <?php echo "class=".$class10; ?>>
			Peso (gr) *<br/>
			<input placeholder="gr." id="pesReS" name="pesReS" min="0" tabindex="39" style="width: 100%;" readonly value="<?php echo $pesoRS; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top:13px" <?php echo "class=".$class11; ?>>
			Malformazioni *<br/>
			<select tabindex="11" id="slct7" style="width:75%;" name="malfoRS" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si (specificare)</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label id="malr2" style="visibility: hidden" <?php echo "class=".$class12; ?>>
			Specificare *<br/>
			<textarea name="specRS" style="height:24px;" <?php echo $dis; ?>><?php echo $specRS; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class13; ?>>
			Ischemia corticale e congestione della midollare *<br/>
			<select tabindex="11" id="ischem2" style="width:75%;" name="ischemiaRS" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class14; ?>>
			Microlitiasi o ascessualizzazioni *<br/>
			<select tabindex="11" id="micro2" style="width:75%;" name="microlitiasiRS" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top:13px" <?php echo "class=".$class15; ?>>
			Ureteri *<br/>
			<select tabindex="11" id="slct8" style="width:75%;" name="ureteri" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normali">Normali</option>
				<option value="malformati">Malformati (specificare)</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label id="malu" style="visibility: hidden" <?php echo "class=".$class16; ?>>
			Specificare *<br/>
			<textarea name="specU" style="height:24px;" <?php echo $dis; ?>><?php echo $specU; ?></textarea>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top:13px" <?php echo "class=".$class17; ?>>
			Vescica Urinaria *<br/>
			<select tabindex="11" id="slct9" style="width:75%;" name="vescica" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normale">Normale</option>
				<option value="malformata">Malformata (specificare)</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label id="malv" style="visibility: hidden" <?php echo "class=".$class18; ?>>
			Specificare *<br/>
			<textarea name="specV" style="height:24px;" <?php echo $dis; ?>><?php echo $specV; ?></textarea>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top:13px" <?php echo "class=".$class19; ?>>
			Contenuto *<br/>
			<select tabindex="11" id="conten" style="width:75%;" name="contenuto" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="vuota">Vuota</option>
				<option value="urina">Urina</option>
				<option value="sangue e coaguli ematici">Sangue e coaguli ematici</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class20; ?>>
			Uraco *<br/>
			<select tabindex="11" id="uraco" style="width:75%;" name="uraco" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normale">Normale</option>
				<option value="assente">Assente</option>
				<option value="cistico">Cistico</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class21; ?>>
			Testicoli *<br/>
			<select tabindex="11" id="testic" style="width:75%;" name="testicoli" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="in addome">In addome</option>
				<option value="canale inguinale">Canale inguinale</option>
				<option value="scroto">Scroto</option>
				<option value="assenti">Assenti</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top:13px" <?php echo "class=".$class22; ?>>
			Utero, Tube, Ovaie *<br/>
			<select tabindex="11" id="slct10" style="width:75%;" name="uto" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="enza anomalie macroscopiche e di dimensione nella norma">Senza anomalie macroscopiche e di dimensione nella norma</option>
				<option value="cisti ovariche">Cisti ovariche</option>
				<option value="malformazioni">Malformazioni (specificare)</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label id="malov" style="visibility: hidden" <?php echo "class=".$class23; ?>>
			Specificare *<br/>
			<textarea name="specUTO" style="height:24px;" <?php echo $dis; ?>><?php echo $specUTO; ?></textarea>		
		</label>
	</div>
	<div class="col-2b">
		<label <?php echo "class=".$class24; ?>>
			Grandi vasi retroperitoneali (aorta addominale, vena cava inferiore, tripode celiaco, arterie renali) *<br/>
			<select tabindex="11" id="slct11" style="width:75%;" name="grandi" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>   
				<option value="normali">Normali</option>
				<option value="trombizzati">Trombizzati</option>
				<option value="malformati">Malformati (specificare)</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label id="malvasi" style="visibility: hidden; padding-top:25px" <?php echo "class=".$class25; ?>>
			Specificare *<br/>
			<textarea name="specVasi" style="height:24px;" <?php echo $dis; ?>><?php echo $specG; ?></textarea>
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