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
	require_once("./db/apparato_cardiovascolare_sids_load.php");
	loadPage();
	require_once("./db/loadtab_autopsia.php");
	tab_autopsia();
	if(isset($_POST["cardiovascolare_versamenti"])){
		$versamenti = $_POST["cardiovascolare_versamenti"];
		$class1 = "";
	}
	else {
		$versamenti = null;
		$class1 = "errors";
	}
	if(isset($_POST["cardiovascolare_altro"])){
		$altro = $_POST["cardiovascolare_altro"];
		$class2 = "";
	}
	else {
		$altro = null;
		$class2 = "errors";
	}
	if(isset($_POST["cardiovascolare_forma"])){
		$forma = $_POST["cardiovascolare_forma"];
		$class3 = "";
	}
	else {
		$forma = null;
		$class3 = "errors";
	}
	if(isset($_POST["cardiovascolare_volume"])){
		$volume = $_POST["cardiovascolare_volume"];
		$class4 = "";
	}
	else {
		$volume = null;
		$class4 = "errors";
	}
	if(isset($_POST["cardiovascolare_consistenza"])){
		$consistenza = $_POST["cardiovascolare_consistenza"];
		$class5 = "";
	}
	else {
		$consistenza = null;
		$class5 = "errors";
	}
	if(isset($_POST["cardiovascolare_epicardio"])){
		$epicardio = $_POST["cardiovascolare_epicardio"];
		$class6 = "";
	}
	else {
		$epicardio = null;
		$class6 = "errors";
	}
	if(isset($_POST["cardiovascolare_peso"])){
		$peso = $_POST["cardiovascolare_peso"];
		$class7 = "";
	}
	else {
		$peso = null;
		$class7 = "errors";
	}
	if(isset($_POST["cardiovascolare_diametroT"])){
		$diamT = $_POST["cardiovascolare_diametroT"];
		$class8 = "";
	}
	else {
		$diamT = null;
		$class8 = "errors";
	}
	if(isset($_POST["cardiovascolare_diametroL"])){
		$diamL = $_POST["cardiovascolare_diametroL"];
		$class9 = "";
	}
	else {
		$diamL = null;
		$class9 = "errors";
	}
	if(isset($_POST["cardiovascolare_diametroAP"])){
		$diamAP = $_POST["cardiovascolare_diametroAP"];
		$class10 = "";
	}
	else {
		$diamAP = null;
		$class10 = "errors";
	}
	if(isset($_POST["cardiovascolare_spessVD"])){
		$spessVD = $_POST["cardiovascolare_spessVD"];
		$class11 = "";
	}
	else {
		$spessVD = null;
		$class11 = "errors";
	}
	if(isset($_POST["cardiovascolare_spessVS"])){
		$spessVS = $_POST["cardiovascolare_spessVS"];
		$class12 = "";
	}
	else {
		$spessVS = null;
		$class12 = "errors";
	}
	if(isset($_POST["cardiovascolare_spessSI"])){
		$spessSI = $_POST["cardiovascolare_spessSI"];
		$class13 = "";
	}
	else {
		$spessSI = null;
		$class13 = "errors";
	}
	if(isset($_POST["cardiovascolare_forame"])){
		$forame = $_POST["cardiovascolare_forame"];
		$class14 = "";
	}
	else {
		$forame = null;
		$class14 = "errors";
	}
	if(isset($_POST["cardiovascolare_dotto"])){
		$dotto = $_POST["cardiovascolare_dotto"];
		$class15 = "";
	}
	else {
		$dotto = null;
		$class15 = "errors";
	}
	if(isset($_POST["cardiovascolare_endocardio"])){
		$endocardio = $_POST["cardiovascolare_endocardio"];
		$class16 = "";
	}
	else {
		$endocardio = null;
		$class16 = "errors";
	}
	if(isset($_POST["cardiovascolare_miocardio"])){
		$miocardio = $_POST["cardiovascolare_miocardio"];
		$class17 = "";
	}
	else {
		$miocardio = null;
		$class17 = "errors";
	}
	if(isset($_POST["cardiovascolare_osti"])){
		$osti = $_POST["cardiovascolare_osti"];
		$class18 = "";
	}
	else {
		$osti = null;
		$class18 = "errors";
	}
	if(isset($_POST["cardiovascolare_coronarie"])){
		$coronarie = $_POST["cardiovascolare_coronarie"];
		$class20 = "";
	}
	else {
		$coronarie = null;
		$class20 = "errors";
	}
	if(isset($_POST["cardiovascolare_aortaA"])){
		$aortaA = $_POST["cardiovascolare_aortaA"];
		$class21 = "";
	}
	else {
		$aortaA = null;
		$class21 = "errors";
	}
	if(isset($_POST["cardiovascolare_tronco"])){
		$tronco = $_POST["cardiovascolare_tronco"];
		$class22 = "";
	}
	else {
		$tronco = null;
		$class22 = "errors";
	}
	if(isset($_POST["cardiovascolare_grossi"])){
		$grossi = $_POST["cardiovascolare_grossi"];
		$class23 = "";
	}
	else {
		$grossi = null;
		$class23 = "errors";
	}
	if(isset($_POST["cardiovascolare_aortaT"])){
		$aortaT = $_POST["cardiovascolare_aortaT"];
		$class24 = "";
	}
	else {
		$aortaT = null;
		$class24 = "errors";
	}
	if(isset($_POST["cardiovascolare_vene"])){
		$vene = $_POST["cardiovascolare_vene"];
		$class25 = "";
	}
	else {
		$vene = null;
		$class25 = "errors";
	}
?>
<script>
    
  $(function() {
      $('#peso').keypad();    
  });
  
  $(function() {
      $('#diTr').keypad();    
  });
    
  $(function() {
      $('#diLo').keypad();    
  });
    
  $(function() {
      $('#diAP').keypad();    
  });
    
  $(function() {
      $('#spVD').keypad();    
  });
    
  $(function() {
      $('#spVS').keypad();    
  });
    
  $(function() {
      $('#spSI').keypad();    
  });
	 	  
  $(function() {
	$( "#vers" ).selectmenu();
	$('#vers').val('<?php echo $versamenti; ?>');
	$('#vers').selectmenu('refresh', true);
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
<form id="adminform" name="adminform" action="db/apparato_cardiovascolare_sids_send.php" method="post">	
	<div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Sacco Pericardico<br/>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 8px;" <?php echo "class=".$class1; ?>>
			Versamenti *<br/>
			<select tabindex="11" id="vers" name="versamenti" style="width:75%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 0px;">
			Altro<br/>
			<textarea name="altro" style="height:24px;" <?php echo $dis; ?>><?php echo $altro; ?></textarea>
		</label>
	</div>
	<div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Cuore e Vasi <br/>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 8px;" <?php echo "class=".$class3; ?>>
			Forma *<br/>
			<textarea name="forma" style="height:40px;" <?php echo $dis; ?>><?php echo $forma; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 8px;">
			Volume <br/>
			<textarea name="volume" style="height:40px;" <?php echo $dis; ?>><?php echo $volume; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 8px;" <?php echo "class=".$class5; ?>>
			Consistenza *<br/>
			<textarea name="consistenza" style="height:40px;" <?php echo $dis; ?>><?php echo $consistenza; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 8px;">
			Epicardio <br/>
			<textarea name="epicardio" style="height:40px;" <?php echo $dis; ?>><?php echo $epicardio; ?></textarea>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 8px;" <?php echo "class=".$class7; ?>>
			Peso (gr) *<br/>
			<?php
			echo "<input placeholder=\"gr.\" $dis id=\"peso\" name=\"peso\" style=\"width: 100%;\" readonly value=\"".$peso."\">";
			?>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 8px;" >
			Diametro trasverso (mm) <br/>
			<?php
				echo "<input placeholder=\"mm\" $dis id=\"diTr\" name=\"diTr\" style=\"width: 100%;\" readonly value=\"".$diamT."\">";
			?>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 8px;" >
			Diametro Longitudinale (mm) <br/>
			<?php
				echo "<input placeholder=\"mm\" $dis id=\"diLo\" name=\"diLo\" style=\"width: 100%;\" readonly value=\"".$diamL."\">";
			?>
		</label>
	</div>
	<div class="col-4">
		<label style="padding-top: 8px;" >
			Diametro Antero-posteriore (mm) <br/>
			<?php
				echo "<input placeholder=\"mm\" $dis id=\"diAP\" name=\"diAP\" style=\"width: 100%;\" readonly value=\"".$diamAP."\">";
			?>
		</label>
	</div>
	<div class="col-4">
		<label style="padding-top: 36px;">
			Spessore ventricolo DX (mm) <br/>
			<?php
				echo "<input placeholder=\"mm\" $dis id=\"spVD\" name=\"spVD\" style=\"width: 100%;\" readonly value=\"".$spessVD."\">";
			?>
		</label>
	</div>
	<div class="col-4">
		<label style="padding-top: 36px;">
			Spessore ventricolo SX (mm) <br/>
			<?php
				echo "<input placeholder=\"mm\" $dis id=\"spVS\" name=\"spVS\" style=\"width: 100%;\" readonly value=\"".$spessVS."\">";
			?>
		</label>
	</div>
	<div class="col-4">
		<label style="padding-top: 8px;" <?php echo "class=".$class13; ?>>
			Spessore setto intraventricolare (mm) *<br/>
			<?php
				echo "<input placeholder=\"mm\" $dis id=\"spSI\" name=\"spSI\" style=\"width: 100%;\" readonly value=\"".$spessSI."\">";
			?>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 8px;">
			Forame ovale <br/>
			<textarea name="forame" style="height:40px;" <?php echo $dis; ?>><?php echo $forame; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 8px;" >
			Dotto arterioso <br/>
			<textarea name="dotto" style="height:40px;" <?php echo $dis; ?>><?php echo $dotto; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 8px;">
			Endocardio parietale e valvolare <br/>
			<textarea name="endocardio" style="height:40px;" <?php echo $dis; ?>><?php echo $endocardio; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 8px;">
			Miocardio <br/>
			<textarea name="miocardio" style="height:40px;" <?php echo $dis; ?>><?php echo $miocardio; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 8px;">
			Osti coronarici e seno coronarico <br/>
			<textarea name="osti" style="height:40px;" <?php echo $dis; ?>><?php echo $osti; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 8px;" >
			Coronarie <br/>
			<textarea name="coronarie" style="height:40px;" <?php echo $dis; ?>><?php echo $coronarie; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 8px;">
			Aorta ascendente e arco aortico <br/>
			<textarea name="aortaA" style="height:40px;" <?php echo $dis; ?>><?php echo $aortaA; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 8px;"> 
			Tronco polmonare e suoi rami principali <br/>
			<textarea name="tronco" style="height:40px;" <?php echo $dis; ?>><?php echo $tronco; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 8px;" >
			Grossi tronchi arteriosi dell'arco <br/>
			<textarea name="grossi" style="height:40px;" <?php echo $dis; ?>><?php echo $grossi; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 8px;" >
			Aorta toracica e addominale <br/>
			<textarea name="aortaT" style="height:40px;" <?php echo $dis; ?>><?php echo $aortaT; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 8px;" <?php echo "class=".$class25; ?>>
			Vene cave e tronchi venosi *<br/>
			<textarea name="vene" style="height:40px;" v><?php echo $vene; ?></textarea>
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