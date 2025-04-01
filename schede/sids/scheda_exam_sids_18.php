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

	require_once("./db/cavita_toracica_sids_load.php");
	loadPage();
	require_once("./db/loadtab_autopsia.php");
	tab_autopsia();
	if(isset($_POST["cavita_toracica_aeree"])){
		$vie = $_POST["cavita_toracica_aeree"];
		$class1 = "";
	}
	else {
		$vie = null;
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
	if(isset($_POST["cavita_toracica_pneumotorace"])){
		$pneumo = $_POST["cavita_toracica_pneumotorace"];
		$class3 = "";
	}
	else {
		$pneumo = null;
		$class3 = "errors";
	}
	if(isset($_POST["cavita_toracica_altro"])){
		$altro = $_POST["cavita_toracica_altro"];
		$class4 = "";
	}
	else {
		$altro = null;
		$class4 = "errors";
	}
	if(isset($_POST["cavita_toracica_asimmetria"])){
		$asimmetria = $_POST["cavita_toracica_asimmetria"];
		$class5 = "";
	}
	else {
		$asimmetria = null;
		$class5 = "errors";
	}
	if(isset($_POST["cavita_toracica_specA"])){
		$specA = $_POST["cavita_toracica_specA"];
		$class6 = "";
	}
	else {
		$specA = null;
		$class6 = "errors";
	}
?>
<script>
    $( document ).ready(function() {
    if ('<?php echo $asimmetria; ?>' == 'Y'){
    document.getElementById('sel').style.visibility = 'visible';
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
               else {
   		 		  document.getElementById('sel').style.visibility='hidden'; return;
               }
   		 }
   	});
    $('#slct').val('<?php echo $asimmetria; ?>');
   	$('#slct').selectmenu('refresh', true);
   });
   $(function() {
   	$( "#aeree" ).selectmenu();
   	$('#aeree').val('<?php echo $vie; ?>');
   	$('#aeree').selectmenu('refresh', true);
   });
   $(function() {
   	$( "#versam" ).selectmenu();
   	$('#versam').val('<?php echo $versamenti; ?>');
   	$('#versam').selectmenu('refresh', true);
   });
   $(function() {
   	$( "#pneu" ).selectmenu();
   	$('#pneu').val('<?php echo $pneumo; ?>');
   	$('#pneu').selectmenu('refresh', true);
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
<form id="adminform" name="adminform" action="db/cavita_toracica_sids_send.php" method="post">	
	<div class="col-3">
		<label style="padding-top: 8px;" <?php echo "class=".$class1; ?>>
			Vie aeree (laringe, trachea, bronchi) *<br/>
			<select tabindex="11" id="aeree" name="aeree" style="width:75%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="pervie">Pervie</option>
				<option value="corpi estranei">Corpi estranei</option>
				<option value="ab ingestis">Ab ingestis</option>
				<option value="edema glottide">Edema glottide</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 8px;" <?php echo "class=".$class2; ?>>
			Versamenti *<br/>
			<select tabindex="11" id="versam" name="versamenti" style="width:75%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 8px;" <?php echo "class=".$class3; ?>>
			Pneumotorace *<br/>
			<select tabindex="11" id="pneu" name="pneumotorace" style="width:75%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 8px;">
			Altro cavi pleurici<br/>
			<textarea name="altroCavi" style="height:24px;" <?php echo $dis; ?>><?php echo $altro; ?></textarea>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 16px;" <?php echo "class=".$class5; ?>>
			Asimmetria viscerale *<br/>
			<select tabindex="11" id="slct" name="asimmetria" style="width:75%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>    
				<option value="Y">Si (specificare)</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label id="sel" style="visibility: hidden;padding-top: 8px;" <?php echo "class=".$class6; ?>>
			Specificare *<br/>
			<textarea name="specAsimmetria" style="height:24px;" <?php echo $dis; ?>><?php echo $specA; ?></textarea>
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