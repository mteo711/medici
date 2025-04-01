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
	require_once("./db/prelievi_sids_load4.php");
	loadPage();
	require_once("./db/loadtab_prelievi.php");
	tab_prelievi();
	if(isset($_POST["prelievi_sids_esofago"])&&($_POST["prelievi_sids_esofago"]=='Y')){
		$checked1 = "checked";
	}
	else {
		$checked1 = "";
	}
	if(isset($_POST["prelievi_sids_stomaco"])&&($_POST["prelievi_sids_stomaco"]=='Y')){
		$checked2 = "checked";
	}
	else {
		$checked2 = "";
	}
	if(isset($_POST["prelievi_sids_duodeno"])&&($_POST["prelievi_sids_duodeno"]=='Y')){
		$checked3 = "checked";
	}
	else {
		$checked3 = "";
	}
	if(isset($_POST["prelievi_sids_piccolo"])&&($_POST["prelievi_sids_piccolo"]=='Y')){
		$checked4 = "checked";
	}
	else {
		$checked4 = "";
	}
	if(isset($_POST["prelievi_sids_grosso"])&&($_POST["prelievi_sids_grosso"]=='Y')){
		$checked5 = "checked";
	}
	else {
		$checked5 = "";
	}
?>
<form id="adminform" name="adminform" action="db/prelievi_sids_send4.php" method="post">
	<div class="col-12">
		<label>
			<input type="checkbox" name="esofago" value="Y" style="margin-bottom: 0px;" <?php echo $checked1."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Esofago
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="stomaco" value="Y" style="margin-bottom: 0px;" <?php echo $checked2."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Stomaco
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="duodeno" value="Y" style="margin-bottom: 0px;" <?php echo $checked3."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Duodeno
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="piccolo" value="Y" style="margin-bottom: 0px;" <?php echo $checked4."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Piccolo intestino
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="grosso" value="Y" style="margin-bottom: 0px;" <?php echo $checked5."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Grosso intestino
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