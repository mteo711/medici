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
	require_once("./db/encefalo_sids_load.php");
	loadPage();
	require_once("./db/loadtab_autopsia.php");
	tab_autopsia();
	if(isset($_POST["encefalo_peso"])){
		$peso = $_POST["encefalo_peso"];
		$class1 = "";
	}
	else {
		$peso = null;
		$class1 = "errors";
	}
	if(isset($_POST["encefalo_malformazioni"])){
		$malfo = $_POST["encefalo_malformazioni"];
		$class2 = "";
	}
	else {
		$malfo = null;
		$class2 = "errors";
	}
	if(isset($_POST["encefalo_specM"])){
		$specM = $_POST["encefalo_specM"];
		$class3 = "";
	}
	else {
		$specM = null;
		$class3 = "errors";
	}
	if(isset($_POST["encefalo_taglio"])){
		$taglio = $_POST["encefalo_taglio"];
		$class4 = "";
	}
	else {
		$taglio = null;
		$class4 = "errors";
	}
	if(isset($_POST["encefalo_tronco"])){
		$tronco = $_POST["encefalo_tronco"];
		$class5 = "";
	}
	else {
		$tronco = null;
		$class5 = "errors";
	}
	if(isset($_POST["encefalo_aspetto"])){
		$aspetto = $_POST["encefalo_aspetto"];
		$class6 = "";
	}
	else {
		$aspetto = null;
		$class6 = "errors";
	}
	if(isset($_POST["encefalo_specW"])){
		$specW = $_POST["encefalo_specW"];
		$class7 = "";
	}
	else {
		$specW = null;
		$class7 = "errors";
	}
?>
<script>  
$( document ).ready(function() {
    if ('<?php echo $malfo; ?>' == 'Y'){
    document.getElementById('sel').style.visibility = 'visible';
    }
    if ('<?php echo $aspetto; ?>' == 'poligono di willis'){
    document.getElementById('wil').style.visibility = 'visible';
    }
  });
$(function() {
  $('#peso').keypad();    
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
    $('#slct').val('<?php echo $malfo; ?>');
	$('#slct').selectmenu('refresh', true);
});
$(function() {
	$( "#slct1" ).selectmenu({
		 change: function(event, ui){
		 	var select = document.getElementById('slct1');
		 	   var value = select.value;
		 	   if (value == 'poligono di willis') {
		 		  document.getElementById('wil').style.visibility='visible'; return;
		 	   }
		 		  document.getElementById('wil').style.visibility='hidden'; return;
		 }
	});
    $('#slct1').val('<?php echo $aspetto; ?>');
	$('#slct1').selectmenu('refresh', true);
});

$(function() {
	$( "#taglio" ).selectmenu();
	$('#taglio').val('<?php echo $taglio; ?>');
	$('#taglio').selectmenu('refresh', true);
});
$(function() {
	$( "#tronco" ).selectmenu();
	$('#tronco').val('<?php echo $tronco; ?>');
	$('#tronco').selectmenu('refresh', true);
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
<script>
function popupCenter(url, title, w, h) {
var left = (screen.width/2)-(w/2);
var top = (screen.height/2)-(h/2);
return window.open(url, title, 'directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no, width='+w+', height='+h+', top='+top+', left='+left);
} 
</script>
<br/><br/>
<form id="adminform" name="adminform" action="db/encefalo_sids_send.php" method="post">
	<div id="error" class="col-1">
		<label style="font-size: 10px; color: #e80d0d;" align="justify" class="cart">
		 <img src="img/info.png" style="width: 30px; height: 30px; vertical-align:middle;" onclick="popupCenter('comuni/popup2.php', 'Avviso!',510,300);" href="javascript:void(0);"/>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 6px;" <?php echo "class=".$class1; ?>>
			Peso (gr) *<br/> 
			<?php
				echo "<input placeholder=\"gr.\" id=\"peso\" $dis name=\"peso\" tabindex=\"39\" style=\"width: 100%;\" readonly value=\"".$peso."\">";
			?>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 8px;" <?php echo "class=".$class2; ?>>
			Malformazioni *<br/>
			<select tabindex="11" id="slct" name="malformazioni" style="width:75%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si (specificare)</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-3" >
		<label id="sel" style="visibility: hidden;padding-top: 0px;" <?php echo "class=".$class3; ?>>
			Specificare* <br/>
			<textarea name="specMalfo" style="height:24px;" <?php echo $dis; ?>><?php echo $specM; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 6px;" <?php echo "class=".$class4; ?>>
			Taglio emisferi cerebrali e cerebellari *<br/>
			<select tabindex="11" id="taglio" name="taglio" style="width:75%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="emorragie">Emorragie</option>
				<option value="rammollimenti">Rammollimenti</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 6px;" <?php echo "class=".$class5; ?>> 
			Tronco cerebrale *<br/>
			<select tabindex="11" id="tronco" name="tronco" style="width:75%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="emorragie">Emorragie</option>
				<option value="rammollimenti">Rammollimenti</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 14px;" <?php echo "class=".$class6; ?>>
			Apetto Esterno *<br/>
			<select tabindex="11" id="slct1" name="aspetto" style="width:75%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="emorragie">Emorragie subaracnoidee</option>
				<option value="ipermia">Ipermia dei vasi meningei</option>
				<option value="edema">Edema con appiattimento delle circonvoluzioni</option>
				<option value="poligono di willis">Poligono di Willis</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label id="wil" style="visibility: hidden;padding-top: 6px;" <?php echo "class=".$class7; ?>>
			Specificare *<br/>
			<textarea name="willis" style="height:24px;" <?php echo $dis; ?>><?php echo $specW; ?></textarea>
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