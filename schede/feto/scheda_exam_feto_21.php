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
	require_once("./db/cavita_addominale_mf_load.php");
	loadPage();
	require_once("./db/loadtab_autopsiaf.php");
	tab_autopsiaf();
	if(isset($_POST["addominale_sito"])){
		$sito = $_POST["addominale_sito"];
		$class1 = "";
	}
	else {
		$sito = null;
		$class1 = "errors";
	}
	if(isset($_POST["addominale_numA"])){
		$numA = $_POST["addominale_numA"];
		$class2 = "";
	}
	else {
		$numA = null;
		$class2 = "errors";
	}
	if(isset($_POST["addominale_tipoA"])){
		$tipoA = $_POST["addominale_tipoA"];
		$class3 = "";
	}
	else {
		$tipoA = null;
		$class3 = "errors";
	}
	if(isset($_POST["addominale_dotto"])){
		$dotto = $_POST["addominale_dotto"];
		$class4 = "";
	}
	else {
		$dotto = null;
		$class4 = "errors";
	}
	if(isset($_POST["addominale_vene"])){
		$vene = $_POST["addominale_vene"];
		$class5 = "";
	}
	else {
		$vene = null;
		$class5 = "errors";
	}
	if(isset($_POST["addominale_specV"])){
		$specV = $_POST["addominale_specV"];
		$class6 = "";
	}
	else {
		$specV = null;
		$class6 = "errors";
	}
	if(isset($_POST["addominale_stomaco"])){
		$stomaco = $_POST["addominale_stomaco"];
		$class7 = "";
	}
	else {
		$stomaco = null;
		$class7 = "errors";
	}
    if(isset($_POST["addominale_intestino"])){
		$intestino = $_POST["addominale_intestino"];
		$class8 = "";
	}
	else {
		$intestino = null;
		$class8 = "errors";
	}
    if(isset($_POST["addominale_specI"])){
		$specI = $_POST["addominale_specI"];
		$class9 = "";
	}
	else {
		$specI = null;
		$class9 = "errors";
	}
    if(isset($_POST["addominale_ciecale"])){
		$ciecale = $_POST["addominale_ciecale"];
		$class10 = "";
	}
	else {
		$ciecale = null;
		$class10 = "errors";
	}
    if(isset($_POST["addominale_pesoF"])){
		$pesoF = $_POST["addominale_pesoF"];
		$class11 = "";
	}
	else {
		$pesoF = null;
		$class11 = "errors";
	}
    if(isset($_POST["addominale_volumeF"])){
		$volumeF = $_POST["addominale_volumeF"];
		$class12 = "";
	}
	else {
		$volumeF = null;
		$class12 = "errors";
	}
    if(isset($_POST["addominale_isomerismo"])){
		$isomerismo = $_POST["addominale_isomerismo"];
		$class13 = "";
	}
	else {
		$isomerismo = null;
		$class13 = "errors";
	}
    if(isset($_POST["addominale_specF"])){
		$specF = $_POST["addominale_specF"];
		$class14 = "";
	}
	else {
		$specF = null;
		$class14 = "errors";
	}
    if(isset($_POST["addominale_consistenzaF"])){
		$consistenzaF = $_POST["addominale_consistenzaF"];
		$class15 = "";
	}
	else {
		$consistenzaF = null;
		$class15 = "errors";
	}
    if(isset($_POST["addominale_superficieF"])){
		$superficieF = $_POST["addominale_superficieF"];
		$class16 = "";
	}
	else {
		$superficieF = null;
		$class16 = "errors";
	}
    if(isset($_POST["addominale_parenchima"])){
		$parenchima = $_POST["addominale_parenchima"];
		$class17 = "";
	}
	else {
		$parenchima = null;
		$class17 = "errors";
	}
    if(isset($_POST["addominale_colecisti"])){
		$colecisti = $_POST["addominale_colecisti"];
		$class18 = "";
	}
	else {
		$colecisti = null;
		$class18 = "errors";
	}
    if(isset($_POST["addominale_biliari"])){
		$biliari = $_POST["addominale_biliari"];
		$class19 = "";
	}
	else {
		$biliari = null;
		$class19 = "errors";
	}
    if(isset($_POST["addominale_pancreas"])){
		$pancreas = $_POST["addominale_pancreas"];
		$class20 = "";
	}
	else {
		$pancreas = null;
		$class20 = "errors";
	}
    if(isset($_POST["addominale_specP"])){
		$specP = $_POST["addominale_specP"];
		$class21 = "";
	}
	else {
		$specP = null;
		$class21 = "errors";
	}
    if(isset($_POST["addominale_milza"])){
		$milza = $_POST["addominale_milza"];
		$class22 = "";
	}
	else {
		$milza = null;
		$class22 = "errors";
	}
    if(isset($_POST["addominale_numM"])){
		$numM = $_POST["addominale_numM"];
		$class23 = "";
	}
	else {
		$numM = null;
		$class23 = "errors";
	}
    
?>

<script>
$( document ).ready(function() {
    if ('<?php echo $vene; ?>' == 'malformate'){
    document.getElementById('mals').style.visibility = 'visible';
    }
    if ('<?php echo $intestino; ?>' == 'malformazioni'){
    document.getElementById('malp').style.visibility = 'visible';
    }
    if ('<?php echo $isomerismo; ?>' == 'Y'){
    document.getElementById('spei').style.visibility = 'visible';
    }
    if ('<?php echo $pancreas; ?>' == 'malformato'){
    document.getElementById('panc').style.visibility = 'visible';
    }
});
    
  $(function() {
      $('#numAr').keypad();    
  });
    
  $(function() {
      $('#pesoFe').keypad();    
  });
    
  $(function() {
      $('#numMil').keypad();    
  });
    
  $(function() {
  	$( "#slct" ).selectmenu({
  		 change: function(event, ui){
  		 	var select = document.getElementById('slct');
  		 	   var value = select.value;
  		 	   if (value == 'malformate') {
  		 		  document.getElementById('mals').style.visibility='visible'; return;
  		 	   }
  		 		  document.getElementById('mals').style.visibility='hidden'; return;
  		 }
  	});
    $("#slct").val('<?php echo $vene; ?>')
    $('#slct').selectmenu('refresh', true); 
  });
      
  $(function() {
  	$( "#slct1" ).selectmenu({
  		 change: function(event, ui){
  		 	var select = document.getElementById('slct1');
  		 	   var value = select.value;
  		 	   if (value == 'malformazioni') {
  		 		  document.getElementById('malp').style.visibility='visible'; return;
  		 	   }
  		 		  document.getElementById('malp').style.visibility='hidden'; return;
  		 }
  	});
    $("#slct1").val('<?php echo $intestino; ?>')
    $('#slct1').selectmenu('refresh', true);
  });
      
  $(function() {
  	$( "#slct2" ).selectmenu({
  		 change: function(event, ui){
  		 	var select = document.getElementById('slct2');
  		 	   var value = select.value;
  		 	   if (value == 'Y') {
  		 		  document.getElementById('spei').style.visibility='visible'; return;
  		 	   }
  		 		  document.getElementById('spei').style.visibility='hidden'; return;
  		 }
  	});
    $("#slct2").val('<?php echo $isomerismo; ?>')
    $('#slct2').selectmenu('refresh', true);
  });
      
  $(function() {
  	$( "#slct4" ).selectmenu({
  		 change: function(event, ui){
  		 	var select = document.getElementById('slct4');
  		 	   var value = select.value;
  		 	   if (value == 'malformato') {
  		 		  document.getElementById('panc').style.visibility='visible'; return;
  		 	   }
  		 		  document.getElementById('panc').style.visibility='hidden'; return;
  		 }
  	});
    $("#slct4").val('<?php echo $pancreas; ?>')
    $('#slct4').selectmenu('refresh', true);
  });
      
  $(function() {
  	$( "#sito" ).selectmenu();
    $("#sito").val('<?php echo $sito; ?>')
    $('#sito').selectmenu('refresh', true);
  });
      
  $(function() {
  	$( "#tipo" ).selectmenu();
    $("#tipo").val('<?php echo $tipoA; ?>')
    $('#tipo').selectmenu('refresh', true);
  });
      
  $(function() {
  	$( "#dotto" ).selectmenu();
    $("#dotto").val('<?php echo $dotto; ?>')
    $('#dotto').selectmenu('refresh', true);
  });
      
  $(function() {
  	$( "#stomaco" ).selectmenu();
    $("#stomaco").val('<?php echo $stomaco; ?>')
    $('#stomaco').selectmenu('refresh', true);
  });
      
  $(function() {
  	$( "#volu" ).selectmenu();
    $("#volu").val('<?php echo $volumeF; ?>')
    $('#volu').selectmenu('refresh', true);
  });
      
  $(function() {
  	$( "#cons" ).selectmenu();
    $("#cons").val('<?php echo $consistenzaF; ?>')
    $('#cons').selectmenu('refresh', true);
  });
      
  $(function() {
  	$( "#super" ).selectmenu();
    $("#super").val('<?php echo $superficieF; ?>')
    $('#super').selectmenu('refresh', true);
  });
      
  $(function() {
  	$( "#parenchi" ).selectmenu();
    $("#parenchi").val('<?php echo $parenchima; ?>')
    $('#parenchi').selectmenu('refresh', true);
  });
      
  $(function() {
  	$( "#colec" ).selectmenu();
    $("#colec").val('<?php echo $colecisti; ?>')
    $('#colec').selectmenu('refresh', true);
  });
      
  $(function() {
  	$( "#biliari" ).selectmenu();
    $("#biliari").val('<?php echo $biliari; ?>')
    $('#biliari').selectmenu('refresh', true);
  });
      
  $(function() {
  	$( "#milza" ).selectmenu();
    $("#milza").val('<?php echo $milza; ?>')
    $('#milza').selectmenu('refresh', true);
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
<form id="adminform" name="adminform" action="db/cavita_addominale_mf_send.php" method="post">
	<div class="col-1">
		<label <?php echo "class=".$class1; ?>>
			Sito viscerale *<br/>
			<select tabindex="11" id="sito" style="width:75%;" name="sito" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="proprio">Proprio</option>
				<option value="situs viscerum inversus">Situs viscerum inversus</option>
			</select>
		</label>
	</div>
	<div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Arteria e vena ombelicale <br/>
		</label>
	</div>
	
	<div class="col-3">
		<label style="padding-top:3px;" <?php echo "class=".$class2; ?>>
			Numero *<br/>
			<input id="numAr" name="numAr" min="0" tabindex="39" style="width: 100%;" readonly value="<?php echo $numA; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-3">
		<label <?php echo "class=".$class3; ?>>
			Tipo *<br/>
			<select tabindex="11" id="tipo" style="width:75%;" name="tipoA" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normali">Normali</option>
				<option value="agenesia">Agenesia</option>
				<option value="ipoplasia">Ipoplasia</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label <?php echo "class=".$class4; ?>>
			Dotto di Aranzio *<br/>
			<select tabindex="11" id="dotto" style="width:75%;" name="dotto" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="pervio">Pervio</option>
				<option value="stenotico">Stenotico</option>
				<option value="assente">Assente</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top:13px;" <?php echo "class=".$class5; ?>>
			Vene sovraepatiche e vena cava inferiore *<br/>
			<select tabindex="11" id="slct" style="width:75%;" name="vene" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normali">Normali</option>
				<option value="trombizzate">Trombizzate</option>
				<option value="malformate">Malformate (specificare)</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label id="mals" style="visibility: hidden" <?php echo "class=".$class6; ?>>
			Specificare *<br/>
			<textarea name="specV" style="height:24px;" <?php echo $dis; ?>><?php echo $specV; ?></textarea>
		</label>
	</div>
	<div class="col-1">
		<label style="font-size: 20px; color: #000;" >
			Tratto Gastroenterico <br/>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top:13px;" <?php echo "class=".$class7; ?>>
			Stomaco *<br/>
			<select tabindex="11" id="stomaco" style="width:75%;" name="stomaco" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normale">Normale</option>
				<option value="normodotato">Normodotato</option>
				<option value="ipoplasico">Ipoplasico</option>
				<option value="sovradisteso">Sovradisteso</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top:13px;" <?php echo "class=".$class8; ?>>
			Piccolo e grosso intestino *<br/>
			<select tabindex="11" id="slct1" style="width:75%;" name="intestino" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normosito e normoconformato">Normosito e normoconformato</option>
				<option value="emorragie gastrointestinali">emorragie gastrointestinali</option>
				<option value="malformazioni">Malformazioni (specificare)</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label id="malp" style="visibility: hidden" <?php echo "class=".$class9; ?>>
			Specificare *<br/> 
			<textarea name="specI" style="height:24px;" <?php echo $dis; ?>><?php echo $specI; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label>
			Appendice ciecale <br/>
			<textarea name="appendice" style="height:24px;" <?php echo $dis; ?>><?php echo $ciecale; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="visibility: hidden">
			hidden <br/>
			<textarea name="quali" style="height:24px;" <?php echo $dis; ?>></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top:3px;" <?php echo "class=".$class11; ?>>
			Fegato - Peso (gr) *<br/>
			<input placeholder="gr." id="pesoFe" name="pesoFe" min="0" tabindex="39" style="width: 100%;" readonly value="<?php echo $pesoF; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class12; ?>>
			Volume *<br/>
			<select tabindex="11" id="volu" style="width:75%;" name="volumeF" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normale">Normale</option>
				<option value="aumentato">Aumentato</option>
				<option value="ridotto">Ridotto</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top:13px;" <?php echo "class=".$class13; ?>>
			Isomerismo *<br/>
			<select tabindex="11" id="slct2" style="width:75%;" name="isomerismo" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si (specificare)</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label id="spei" style="visibility: hidden" <?php echo "class=".$class14; ?>>
			Specificare *<br/>
			<textarea name="specF" style="height:24px;" <?php echo $dis; ?>><?php echo $specF; ?></textarea>
		</label>
	</div>
	<div class="col-3">
		<label <?php echo "class=".$class15; ?>>
			Consistenza *<br/>
			<select tabindex="11" id="cons" style="width:75%;" name="consistenzaF" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="propria">Propria</option>
				<option value="ridotta">Ridotta</option>
				<option value="aumentata">Aumentata</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label <?php echo "class=".$class16; ?>>
			Superficie *<br/>
			<select tabindex="11" id="super" style="width:75%;" name="superficieF" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="liscia lucente">Liscia lucente</option>
				<option value="mammellonata">Mammellonata</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label <?php echo "class=".$class17; ?>>
			Parenchima al taglio *<br/>
			<select tabindex="11" id="parenchi" style="width:75%;" name="parenchima" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normale">Normale</option>
				<option value="congesto">Congesto</option>
				<option value="pallido">Pallido</option>
				<option value="giallastro">Giallastro</option>
				<option value="verdastro">Verdastro</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class18; ?>>
			Colecisti *<br/>
			<select tabindex="11" id="colec" style="width:75%;" name="colecisti" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normale">Normale</option>
				<option value="ipoplasia">Ipoplasia</option>
				<option value="sovradistesa">Sovradistesa</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class19; ?>>
			Vie biliari extraepatiche *<br/>
			<select tabindex="11" id="biliari" style="width:75%;" name="biliari" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normali e pervie">Normali e pervie</option>
				<option value="ipoplasiche">Ipoplasiche</option>
				<option value="assenti">Assenti</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top:13px;" <?php echo "class=".$class20; ?>>
			Pancreas *<br/>
			<select tabindex="11" id="slct4" style="width:75%;" name="pancreas" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normale">Normale</option>
				<option value="ridotto">Ridotto</option>
				<option value="malformato">Malformato (specificare)</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label id="panc" style="visibility: hidden" <?php echo "class=".$class21; ?>>
			Specificare *<br/>
			<textarea name="specP" style="height:24px;" <?php echo $dis; ?>><?php echo $specP; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class22; ?>>
			Milza *<br/>
			<select tabindex="11" id="milza" style="width:75%;" name="milza" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normale">Normale</option>
				<option value="a destra">A destra</option>
				<option value="assente">Assente</option>
				<option value="milza accessoria">Milza accessoria</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top:2px;">
			Numero <br/>
			<input placeholder="" id="numMil" name="numMil" min="0" tabindex="39" style="width: 100%;" readonly value="<?php echo $numM; ?>" <?php echo $dis; ?>>
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