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
	require_once("./db/prelievi_mf_load2.php");
	loadPage();
	require_once("./db/loadtab_prelievif.php");
	tab_prelievif();
	if(isset($_POST["prelievi_mf_dxilo"])&&($_POST["prelievi_mf_dxilo"]=='Y')){
		$checked1 = "checked";
	}
	else {
		$checked1 = "";
	}
	if(isset($_POST["prelievi_mf_sxilo"])&&($_POST["prelievi_mf_sxilo"]=='Y')){
		$checked2 = "checked";
	}
	else {
		$checked2 = "";
	}
	if(isset($_POST["prelievi_mf_dxsup"])&&($_POST["prelievi_mf_dxsup"]=='Y')){
		$checked3 = "checked";
	}
	else {
		$checked3 = "";
	}
	if(isset($_POST["prelievi_mf_sxsup"])&&($_POST["prelievi_mf_sxsup"]=='Y')){
		$checked4 = "checked";
	}
	else {
		$checked4 = "";
	}
	if(isset($_POST["prelievi_mf_dxmedio"])&&($_POST["prelievi_mf_dxmedio"]=='Y')){
		$checked5 = "checked";
	}
	else {
		$checked5 = "";
	}
	if(isset($_POST["prelievi_mf_sxinf"])&&($_POST["prelievi_mf_sxinf"]=='Y')){
		$checked6 = "checked";
	}
	else {
		$checked6 = "";
	}
	if(isset($_POST["prelievi_mf_dxinf"])&&($_POST["prelievi_mf_dxinf"]=='Y')){
		$checked7 = "checked";
	}
	else {
		$checked7 = "";
	}
?>
<form id="adminform" name="adminform" action="db/prelievi_mf_send2.php" method="post">
	<div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Polmoni
		</label>
	</div>
	<div class="col-2">
		<label style="font-size: 14px; color: #000;">
			Destro
		</label>
	</div>
	<div class="col-2">
		<label style="font-size: 14px; color: #000;">
			Sinistro
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="dxIlo" value="Y" style="margin-bottom: 0px;" <?php echo $checked1."  ".$dis;?>>
		</label>
	</div>
	<div class="col-14">
		<label>
			Ilo
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="sxIlo" value="Y" style="margin-bottom: 0px;" <?php echo $checked2."  ".$dis;?>>
		</label>
	</div>
	<div class="col-14">
		<label>
			Ilo
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="dxLS" value="Y" style="margin-bottom: 0px;" <?php echo $checked3."  ".$dis;?>>
		</label>
	</div>
	<div class="col-14">
		<label>
			Lobo superiore
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="sxLS" value="Y" style="margin-bottom: 0px;" <?php echo $checked4."  ".$dis;?>>
		</label>
	</div>
	<div class="col-14">
		<label>
			Lobo superiore
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="dxLM" value="Y" style="margin-bottom: 0px;" <?php echo $checked5."  ".$dis;?>>
		</label>
	</div>
	<div class="col-14">
		<label>
			Lobo medio
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="sxLI" value="Y" style="margin-bottom: 0px;" <?php echo $checked6."  ".$dis;?>>
		</label>
	</div>
	<div class="col-14">
		<label>
			Lobo inferiore
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="dxLI" value="Y" style="margin-bottom: 0px;" <?php echo $checked7."  ".$dis;?>>
		</label>
	</div>
	<div class="col-14">
		<label>
			Lobo inferiore
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