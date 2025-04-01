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
<br/<br/><br/>
<script>

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

<?php
    if (($_SESSION["stato"] == 'chiusa') || ($_SESSION["stato"] == 'chiusa_usr')){
        $dis = "disabled";
    }
    else {
        $dis = "";
    }
	require_once("./db/prelievi_mf_load3.php");
	loadPage();
	require_once("./db/loadtab_prelievif.php");
	tab_prelievif();
	if(isset($_POST["prelievi_mf_paragangli"])&&($_POST["prelievi_mf_paragangli"]=='Y')){
		$checked1 = "checked";
	}
	else {
		$checked1 = "";
	}
	if(isset($_POST["prelievi_mf_aorta"])&&($_POST["prelievi_mf_aorta"]=='Y')){
		$checked2 = "checked";
	}
	else {
		$checked2 = "";
	}
	if(isset($_POST["prelievi_mf_tronco"])&&($_POST["prelievi_mf_tronco"]=='Y')){
		$checked3 = "checked";
	}
	else {
		$checked3 = "";
	}
	if(isset($_POST["prelievi_mf_pericardio"])&&($_POST["prelievi_mf_pericardio"]=='Y')){
		$checked4 = "checked";
	}
	else {
		$checked4 = "";
	}
	if(isset($_POST["prelievi_mf_atrioDX"])&&($_POST["prelievi_mf_atrioDX"]=='Y')){
		$checked5 = "checked";
	}
	else {
		$checked5 = "";
	}
	if(isset($_POST["prelievi_mf_atrioSX"])&&($_POST["prelievi_mf_atrioSX"]=='Y')){
		$checked6 = "checked";
	}
	else {
		$checked6 = "";
	}
	if(isset($_POST["prelievi_mf_setto"])&&($_POST["prelievi_mf_setto"]=='Y')){
		$checked7 = "checked";
	}
	else {
		$checked7 = "";
	}
	if(isset($_POST["prelievi_mf_ventrDX"])&&($_POST["prelievi_mf_ventrDX"]=='Y')){
		$checked8 = "checked";
	}
	else {
		$checked8 = "";
	}
	if(isset($_POST["prelievi_mf_ventrSX"])&&($_POST["prelievi_mf_ventrSX"]=='Y')){
		$checked9 = "checked";
	}
	else {
		$checked9 = "";
	}
	if(isset($_POST["prelievi_mf_ramoA"])&&($_POST["prelievi_mf_ramoA"]=='Y')){
		$checked10 = "checked";
	}
	else {
		$checked10 = "";
	}
	if(isset($_POST["prelievi_mf_ramoC"])&&($_POST["prelievi_mf_ramoC"]=='Y')){
		$checked11 = "checked";
	}
	else {
		$checked11 = "";
	}
	if(isset($_POST["prelievi_mf_ramoP"])&&($_POST["prelievi_mf_ramoP"]=='Y')){
		$checked12 = "checked";
	}
	else {
		$checked12 = "";
	}
	if(isset($_POST["prelievi_mf_ramoM"])&&($_POST["prelievi_mf_ramoM"]=='Y')){
		$checked13 = "checked";
	}
	else {
		$checked13 = "";
	}
?>
<form id="adminform" name="adminform" action="db/prelievi_mf_send3.php" method="post">
	<div class="col-12">
		<label>
			<input type="checkbox" name="paragangli" value="Y" style="margin-bottom: 0px;" <?php echo $checked1."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Un prelievo paragangli aortico-polmonari
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="aorta" value="Y"  style="margin-bottom: 0px;" <?php echo $checked2."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Un prelievo dell'aorta
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="tronco" value="Y" style="margin-bottom: 0px;" <?php echo $checked3."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Un prelievo del tronco polmonare
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="pericardio" value="Y" style="margin-bottom: 0px;" <?php echo $checked4."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Un prelievo del pericardio
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="atrioDX" value="Y" style="margin-bottom: 0px;" <?php echo $checked5."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Un prelievo parete atrio DX
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="atrioSX" value="Y" style="margin-bottom: 0px;" <?php echo $checked6."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Un prelievo parete atrio SX
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="setto" value="Y" style="margin-bottom: 0px;" <?php echo $checked7."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Un prelievo del setto intraventricolare (terzo inferiore)
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="ventricoloDX" value="Y" style="margin-bottom: 0px;" <?php echo $checked8."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Un prelievo parete ventricolo DX
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="ventricoloSX" value="Y" style="margin-bottom: 0px;" <?php echo $checked9."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Un prelievo parete ventricolo SX
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="discendenteA" value="Y" style="margin-bottom: 0px;" <?php echo $checked10."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Un prelievo coronaria sinistra, ramo discendente anteriore
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="circonflesso" value="Y" style="margin-bottom: 0px;" <?php echo $checked11."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Un prelievo coronaria di sinistra, ramo circonflesso
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="discendenteP" value="Y" style="margin-bottom: 0px;" <?php echo $checked12."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Un prelievo coronaria destra, ramo discendente posteriore
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="marginale" value="Y" style="margin-bottom: 0px;" <?php echo $checked13."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Un prelievo coronaria destra, ramo marginale
		</label>
	</div>
	<div class="col-9">
		<label>
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