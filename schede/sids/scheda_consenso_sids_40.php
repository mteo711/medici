<!--
 * User: lucaferrari
 * Date: 8/06/15
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
<?php
    if (($_SESSION["stato"] == 'chiusa') || ($_SESSION["stato"] == 'chiusa_usr')){
        $dis = "disabled";
    }
    else {
        $dis = "";
    }
	require_once("./db/consenso_load.php");
	loadPage();
    if(isset($_POST["consenso_nome1"])){
		$nome1 = $_POST["consenso_nome1"];
		$class1 = "";
	}
	else {
		$nome1 = null;
		$class1 = "errors";
	}
	if(isset($_POST["consenso_diag"])){
        $diag = $_POST["consenso_diag"];
		$class2 = "";
	}
	else {
		$diag = null;
		$class2 = "errors";
	}
	if(isset($_POST["consenso_nome2"])){
		$nome2 = $_POST["consenso_nome2"];
		$class3 = "";
	}
	else {
		$nome2 = null;
		$class3 = "errors";
	}
	if(isset($_POST["consenso_gen"])){
		$gen = $_POST["consenso_gen"];
		$class4 = "";
	}
	else {
		$gen = null;
		$class4 = "errors";
	}
	if(isset($_POST["consenso_nome3"])){
		$nome3 = $_POST["consenso_nome3"];
		$class5 = "";
	}
	else {
		$nome3 = null;
		$class5 = "errors";
	}
	if(isset($_POST["consenso_toss"])){
		$toss= $_POST["consenso_toss"];
		$class6 = "";
	}
    else {
		$toss = null;
		$class5 = "errors";
	}
?>


<script>
$( document ).ready(function() {
    if ('<?php echo $diag; ?>' == 'Y'){
    document.getElementById('rDoc').style.visibility = 'visible';
    }
    if ('<?php echo $gen; ?>' == 'Y'){
    document.getElementById('gDoc').style.visibility = 'visible';
    }
    if ('<?php echo $toss; ?>' == 'Y'){
    document.getElementById('tDoc').style.visibility = 'visible';
    }
  });
$(function() {
   	$( "#slct1" ).selectmenu({
   		 change: function(event, ui){
   		 	var select = document.getElementById('slct1');
   		 	   var value = select.value;
   		 	   if (value == 'Y') {
   		 		  document.getElementById('rDoc').style.visibility='visible'; return;
   		 	   }
   		 		  document.getElementById('rDoc').style.visibility='hidden'; return;
   		 }
   	});
    $("#slct1").val('<?php echo $diag; ?>')
    $('#slct1').selectmenu('refresh', true);
   });
    
$(function() {
   	$( "#slct2" ).selectmenu({
   		 change: function(event, ui){
   		 	var select = document.getElementById('slct2');
   		 	   var value = select.value;
   		 	   if (value == 'Y') {
   		 		  document.getElementById('gDoc').style.visibility='visible'; return;
   		 	   }
   		 		  document.getElementById('gDoc').style.visibility='hidden'; return;
   		 }
   	});
    $("#slct2").val('<?php echo $gen; ?>')
    $('#slct2').selectmenu('refresh', true);
   });
    
$(function() {
   	$( "#slct3" ).selectmenu({
   		 change: function(event, ui){
   		 	var select = document.getElementById('slct3');
   		 	   var value = select.value;
   		 	   if (value == 'Y') {
   		 		  document.getElementById('tDoc').style.visibility='visible'; return;
   		 	   }
   		 		  document.getElementById('tDoc').style.visibility='hidden'; return;
   		 }
   	});
    $("#slct3").val('<?php echo $toss; ?>')
    $('#slct3').selectmenu('refresh', true);
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
<form enctype="multipart/form-data" action="db/consenso_send.php" method="POST">
    <div class="col-2">
        <label style="font-size: 16px; color: #000;" align="center">
            Id caso <?php echo $nome2;?><br/>
        </label>
    </div>
    <div class="col-5">
        <label style="font-size: 16px; color: #000;" align="center">
            Download PDF<br/>
        </label>
    </div>
    <div class="col-3">
        <label style="font-size: 16px; color: #000;" align="center">
            Upload PDF<br/>
        </label>
    </div>
    <!-- Ricontro diagnostico-->
    <div class="col-2">
        <label>
            Consenso informato al riscontro diagnostico *
            <select tabindex="42" id="slct1" name="riscontro" style="width:50%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="Y">Si (allegare)</option>
				<option value="N">No</option>
			</select>
        </label>
    </div>
    <div class="col-5">
        <label align="center">
            <a href="docs/Consenso_Riscontro_Diagnostico.pdf" target="_blank"><img src="img/pdf.png" style="width: 15%;"/></a><br/>
        </label>
    </div>
    <div class="col-3">
        <label id="rDoc" style="visibility: hidden;padding-top: 6px;">
            <input name="riscontroDoc" $dis type="file" accept=".png,.jpg,.jpeg,.pdf,.bmp" value="<?php echo $nome1; ?>">
        </label>
    </div>
    <!-- Analisi genetiche-->
    <div class="col-2">
        <label>
            Consenso informato all'esecuzione di analisi genetiche *
            <select tabindex="42" id="slct2" name="genetiche" style="width:50%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="Y">Si (allegare)</option>
				<option value="N">No</option>
			</select>
        </label>
    </div>
    <div class="col-5">
        <label align="center">
            <a href="docs/Consenso_Analisi_Genetiche.pdf" target="_blank"><img src="img/pdf.png" style="width: 15%;"/></a><br/>        </label>
    </div>
    <div class="col-3">
        <label id="gDoc" style="visibility: hidden;padding-top: 6px;">
            <input name="geneticheDoc" $dis type="file" accept=".png,.jpg,.jpeg,.pdf,.bmp">       
        </label>
    </div>
    <!-- analisi tossicologiche-->
    <div class="col-2">
        <label>
            Consenso informato all'esecuzione di analisi tossicologiche *
            <select tabindex="42" id="slct3" name="tossicologiche" style="width:50%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="Y">Si (allegare)</option>
				<option value="N">No</option>
			</select>
        </label>
    </div>
    <div class="col-5">
        <label align="center">
            <a href="docs/Consenso_Analisi_Tossicologiche.pdf" target="_blank"><img src="img/pdf.png" style="width: 15%;"/></a><br/>
        </label>
    </div>
    <div class="col-3">
        <label id="tDoc" style="visibility: hidden;padding-top: 6px;">
            <input name="tossicologicheDoc" $dis type="file" accept=".png,.jpg,.jpeg,.pdf,.bmp">       
        </label>
    </div>
    <div class="col-9">
		<label style="font-size: 10px; color: #e80d0d;">
			   * Campi obbligatori. <br/>
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