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
	require_once("./db/prelievi_sids_load5.php");
	loadPage();
	require_once("./db/loadtab_prelievi.php");
	tab_prelievi();
	if(isset($_POST["prelievi_sids_sd"])&&($_POST["prelievi_sids_sd"]=='Y')){
		$checked1 = "checked";
	}
	else {
		$checked1 = "";
	}
	if(isset($_POST["prelievi_sids_ss"])&&($_POST["prelievi_sids_ss"]=='Y')){
		$checked2 = "checked";
	}
	else {
		$checked2 = "";
	}
	if(isset($_POST["prelievi_sids_rd"])&&($_POST["prelievi_sids_rd"]=='Y')){
		$checked3 = "checked";
	}
	else {
		$checked3 = "";
	}
	if(isset($_POST["prelievi_sids_rs"])&&($_POST["prelievi_sids_rs"]=='Y')){
		$checked4 = "checked";
	}
	else {
		$checked4 = "";
	}
?>
<form id="adminform" name="adminform" action="db/prelievi_sids_send5.php" method="post">
	<div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Surrene
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="surreneDX" value="Y" style="margin-bottom: 0px;" <?php echo $checked1."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Destro
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="surreneSX" value="Y" style="margin-bottom: 0px;" <?php echo $checked2."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Sinistro
		</label>
	</div>
	<div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Rene
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="reneDX" value="Y" style="margin-bottom: 0px;" <?php echo $checked3."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Destro
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="reneSX" value="Y" style="margin-bottom: 0px;" <?php echo $checked4."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Sinistro
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