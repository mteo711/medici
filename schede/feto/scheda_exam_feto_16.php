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
	require_once("./db/encefalo_mf_load.php");
	loadPage();
	require_once("./db/loadtab_autopsiaf.php");
	tab_autopsiaf();
	if(isset($_POST["encefalo_sterno"])){
		$sterno = $_POST["encefalo_sterno"];
		$class1 = "";
	}
	else {
		$sterno = null;
		$class1 = "errors";
	}
	if(isset($_POST["encefalo_specS"])){
		$specS = $_POST["encefalo_specS"];
		$class2 = "";
	}
	else {
		$specS = null;
		$class2 = "errors";
	}
	if(isset($_POST["encefalo_colonna"])){
		$colonna = $_POST["encefalo_colonna"];
		$class3 = "";
	}
	else {
		$colonna = null;
		$class3 = "errors";
	}
	if(isset($_POST["encefalo_diaframma"])){
		$diaframma = $_POST["encefalo_diaframma"];
		$class4 = "";
	}
	else {
		$diaframma = null;
		$class4 = "errors";
	}
	if(isset($_POST["encefalo_peso"])){
		$peso = $_POST["encefalo_peso"];
		$class5 = "";
	}
	else {
		$peso = null;
		$class5 = "errors";
	}
	if(isset($_POST["encefalo_fontanellaA"])){
		$fontA = $_POST["encefalo_fontanellaA"];
		$class6 = "";
	}
	else {
		$fontA = null;
		$class6 = "errors";
	}
	if(isset($_POST["encefalo_fontanellaP"])){
		$fontP = $_POST["encefalo_fontanellaP"];
		$class7 = "";
	}
	else {
		$fontP = null;
		$class7 = "errors";
	}
    if(isset($_POST["encefalo_dura"])){
		$dura = $_POST["encefalo_dura"];
		$class8 = "";
	}
	else {
		$dura = null;
		$class8 = "errors";
	}
    if(isset($_POST["encefalo_seno"])){
		$seno = $_POST["encefalo_seno"];
		$class9 = "";
	}
	else {
		$seno = null;
		$class9 = "errors";
	}
    if(isset($_POST["encefalo_emorragie"])){
		$emo = $_POST["encefalo_emorragie"];
		$class10 = "";
	}
	else {
		$emo = null;
		$class10 = "errors";
	}
    if(isset($_POST["encefalo_lepto"])){
		$lepto = $_POST["encefalo_lepto"];
		$class11 = "";
	}
	else {
		$lepto = null;
		$class11 = "errors";
	}
    if(isset($_POST["encefalo_willis"])){
		$willis = $_POST["encefalo_willis"];
		$class12 = "";
	}
	else {
		$willis = null;
		$class12 = "errors";
	}
    if(isset($_POST["encefalo_solchi"])){
		$solchi = $_POST["encefalo_solchi"];
		$class13 = "";
	}
	else {
		$solchi = null;
		$class13 = "errors";
	}
    if(isset($_POST["encefalo_taglio"])){
		$taglio = $_POST["encefalo_taglio"];
		$class14 = "";
	}
	else {
		$taglio = null;
		$class14 = "errors";
	}
    if(isset($_POST["encefalo_tronco"])){
		$tronco = $_POST["encefalo_tronco"];
		$class15 = "";
	}
	else {
		$tronco = null;
		$class15 = "errors";
	}
    if(isset($_POST["encefalo_plessi"])){
		$plessi = $_POST["encefalo_plessi"];
		$class16 = "";
	}
	else {
		$plessi = null;
		$class16 = "errors";
	}
    if(isset($_POST["encefalo_setto"])){
		$setto = $_POST["encefalo_setto"];
		$class17 = "";
	}
	else {
		$setto = null;
		$class17 = "errors";
	}
    if(isset($_POST["encefalo_corpo"])){
		$corpo = $_POST["encefalo_corpo"];
		$class18 = "";
	}
	else {
		$corpo = null;
		$class18 = "errors";
	}
    if(isset($_POST["encefalo_ventricoli"])){
		$ventricoli = $_POST["encefalo_ventricoli"];
		$class19 = "";
	}
	else {
		$ventricoli = null;
		$class19 = "errors";
	}
    
?>

<script>
$( document ).ready(function() {
    if ('<?php echo $sterno; ?>' == 'malformati'){
    document.getElementById('sels').style.visibility = 'visible';
    }
});

  $(function() {
      $('#peso').keypad();    
  });
    
  $(function() {
  	$( "#slcts" ).selectmenu({
  		 change: function(event, ui){
  		 	var select = document.getElementById('slcts');
  		 	   var value = select.value;
  		 	   if (value == 'malformati') {
  		 		  document.getElementById('sels').style.visibility='visible'; return;
  		 	   }
  		 		  document.getElementById('sels').style.visibility='hidden'; return;
  		 }
  	});
    $("#slcts").val('<?php echo $sterno; ?>')
    $('#slcts').selectmenu('refresh', true);
  	
  });
    
  $(function() {
  	$( "#colonna" ).selectmenu();
    $("#colonna").val('<?php echo $colonna; ?>')
    $('#colonna').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#diaframma" ).selectmenu();
    $("#diaframma").val('<?php echo $diaframma; ?>')
    $('#diaframma').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#fontAnt" ).selectmenu();
    $("#fontAnt").val('<?php echo $fontA; ?>')
    $('#fontAnt').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#fontPost" ).selectmenu();
    $("#fontPost").val('<?php echo $fontP; ?>')
    $('#fontPost').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#dura" ).selectmenu();
    $("#dura").val('<?php echo $dura; ?>')
    $('#dura').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#seno" ).selectmenu();
    $("#seno").val('<?php echo $seno; ?>')
    $('#seno').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#emorag" ).selectmenu();
    $("#emorag").val('<?php echo $emo; ?>')
    $('#emorag').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#lepto" ).selectmenu();
    $("#lepto").val('<?php echo $lepto; ?>')
    $('#lepto').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#solchi" ).selectmenu();
    $("#solchi").val('<?php echo $solchi; ?>')
    $('#solchi').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#tronco" ).selectmenu();
    $("#tronco").val('<?php echo $tronco; ?>')
    $('#tronco').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#plessi" ).selectmenu();
    $("#plessi").val('<?php echo $plessi; ?>')
    $('#plessi').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#setto" ).selectmenu();
    $("#setto").val('<?php echo $setto; ?>')
    $('#setto').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#calloso" ).selectmenu();
    $("#calloso").val('<?php echo $corpo; ?>')
    $('#calloso').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#ventricoli" ).selectmenu();
    $("#ventricoli").val('<?php echo $ventricoli; ?>')
    $('#ventricoli').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#taglio" ).selectmenu();
    $("#taglio").val('<?php echo $taglio; ?>')
    $('#taglio').selectmenu('refresh', true);
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
<style>
.overflow {
	height: 150px;
  }
</style>
<script>
function popupCenter(url, title, w, h) {
var left = (screen.width/2)-(w/2);
var top = (screen.height/2)-(h/2);
return window.open(url, title, 'directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no, width='+w+', height='+h+', top='+top+', left='+left);
} 
</script>
<div id="dtBox"></div>
<br/<br/><br/>
<form id="adminform" name="adminform" action="db/encefalo_mf_send.php" method="post">
	<div id="error" class="col-1">
		<label style="font-size: 10px; color: #e80d0d;" align="justify" class="cart">
		 <img src="img/info.png" style="width: 30px; height: 30px; vertical-align:middle;" onclick="popupCenter('comuni/popup2.php', 'Avviso!',510,350);" href="javascript:void(0);"/>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 13px;" <?php echo "class=".$class1; ?>>
			Sterno, gabbia toracica *<br/>
			<select tabindex="11" id="slcts" style="width:75%;" name="sterno" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normali">Normali</option>
				<option value="malformati">Malformati (specificare)</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label id="sels" style="visibility: hidden" <?php echo "class=".$class2; ?>>
			Specificare *<br/>
			<textarea name="specS" style="height:24px;" <?php echo $dis; ?>><?php echo $specS; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class3; ?>>
			Colonna vertebrale *<br/>
			<select tabindex="11" id="colonna" style="width:75%;" name="colonna" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>v    
				<option value="normale">Normale</option>
				<option value="in asse">In asse</option>
				<option value="scoliosi">Scoliosi</option>
				<option value="cifosi">Cifosi</option>
				<option value="lordosi">Lordosi</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class4; ?>>
			Diaframma *<br/>
			<select tabindex="11" id="diaframma" style="width:75%;" name="diaframma" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normoconformato">Normoconformato</option>
				<option value="agenesia/fessurazione">Agenesia/Fessurazione</option>
				<option value="eventratio">Eventratio</option>
			</select>
		</label>
	</div>
	<div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Encefalo<br/>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 3px;" <?php echo "class=".$class5; ?>>
			Peso (gr) *<br/>
			<input placeholder="gr." id="peso" name="peso" min="0" tabindex="39" style="width: 100%;" readonly value="<?php echo $peso; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-3">
		<label <?php echo "class=".$class6; ?>>
			Fontanella anteriore *<br/>
			<select tabindex="11" id="fontAnt" style="width:75%;" name="fontanellaa" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normotesa">Normotesa</option>
				<option value="estroflessa">Estroflessa</option>
				<option value="introflessa">Introflessa</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label <?php echo "class=".$class7; ?>>
			Fontanella Posteriore *<br/>
			<select tabindex="11" id="fontPost" style="width:75%;" name="fontanellap" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normotesa">Normotesa</option>
				<option value="estroflessa">Estroflessa</option>
				<option value="introflessa">Introflessa</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label  <?php echo "class=".$class8; ?>>
			Dura madre *<br/>
			<select tabindex="11" id="dura" style="width:75%;" name="dura" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="integra">Integra</option>
				<option value="liscia">Liscia</option>
				<option value="madreperlacea">Madreperlacea</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label  <?php echo "class=".$class9; ?>>
			Seno venoso *<br/>
			<select tabindex="11" id="seno" style="width:75%;" name="seno" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="pervio">Pervio</option>
				<option value="congesto">Congesto</option>
				<option value="trombizzato">Trombizzato</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label <?php echo "class=".$class10; ?>>
			Emorragie *<br/>
			<select tabindex="11" id="emorag" style="width:75%;" name="emorragie" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>   
				<option value="intradurale">Intradurale</option>
				<option value="sub aracnoidee">Sub-aracnoidee</option>
				<option value="iperemia dei vasi meningei">Iperemia dei vasi meningei</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 13px;" <?php echo "class=".$class11; ?>>
			Leptomeningi *<br/>
			<select tabindex="11" id="lepto" style="width:75%;" name="leptomeningi" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="ben svolgibili">Ben svolgibili</option>
				<option value="opache">Opache</option>
				<option value="congeste">Congeste</option>
				<option value="verde-grigiastre">Verde-Grigiastre</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label>
			Poligono di Willis <br/>
			<textarea name="willis" style="height:24px;" <?php echo $dis; ?>><?php echo $willis; ?></textarea>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 13px;" <?php echo "class=".$class13; ?>>
			Solchi *<br/>
			<select tabindex="11" id="solchi" style="width:75%;" name="solchi" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normali">Normali</option>
				<option value="allargati">Allargati</option>
				<option value="ridotti con circonvoluzioni appiattite">Ridotti con circonvulzioni appiattite</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class14; ?>>
			Taglio emisferi cerebrali e cerebellari *<br/>
			<select tabindex="11" id="taglio" style="width:75%;" name="taglio" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="emorragie">Emorragie</option>
				<option value="rammollimenti">Rammollimenti</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 33px;" <?php echo "class=".$class15; ?>>
			Tronco cerebrale *<br/>
			<select tabindex="11" id="tronco" style="width:75%;" name="tronco" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="emorragie">Emorragie</option>
				<option value="rammollimenti">Rammollimenti</option>
			</select>
		</label>
	</div>	
	<div class="col-4">
		<label <?php echo "class=".$class16; ?>>
			Plessi corioidei *<br/>
			<select tabindex="11" id="plessi" style="width:75%;" name="plessi" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normali">Normali</option>
				<option value="edematosi">Edematosi</option>
			</select>
		</label>
	</div>
	<div class="col-4">
		<label <?php echo "class=".$class17; ?>>
			Setto pellucido *<br/>
			<select tabindex="11" id="setto" style="width:75%;" name="setto" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normale">Normale</option>
				<option value="assente">Assente</option>
				<option value="assottigliato">Assottigliato</option>
			</select>
		</label>
	</div>
	<div class="col-4">
		<label <?php echo "class=".$class18; ?>>
			Corpo calloso *<br/>
			<select tabindex="11" id="calloso" style="width:75%;" name="corpo" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normale">Normale</option>
				<option value="assente">Assente</option>
				<option value="assottigliato">Assottigliato</option>
			</select>
		</label>
	</div>
	<div class="col-4">
		<label <?php echo "class=".$class19; ?>>
			Ventricoli *<br/>
			<select tabindex="11" id="ventricoli" style="width:75%;" name="ventricoli" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="normali">Normali</option>
				<option value="dilatati">Dilatati</option>
				<option value="stenotici">Stenotici</option>
			</select>
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
