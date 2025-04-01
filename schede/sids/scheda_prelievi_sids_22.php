<!--
 * User: lucaferrari
 * Date: 12/06/15
 */
 -->
 <script src="js/scripts.js"></script>
 <link rel="stylesheet" href="js/jquery/jquery-ui.css">
 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
 <script src="js/jquery/jquery-ui.js"></script>
 <!-- <link rel="stylesheet" type="text/css" href="css/DateTimePicker.css" />
 <script type="text/javascript" src="js/DateTimePicker.js"></script>-->
<br/<br/><br/>
<script>
function popupCenter(url, title, w, h) {
var left = (screen.width/2)-(w/2);
var top = (screen.height/2)-(h/2);
return window.open(url, title, 'directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no, width='+w+', height='+h+', top='+top+', left='+left);
} 

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
	require_once("./db/prelievi_sids_load1.php");
	loadPage();
	require_once("./db/loadtab_prelievi.php");
	tab_prelievi();
	if(isset($_POST["prelievi_sids_corteccia"])&&($_POST["prelievi_sids_corteccia"]=='Y')){
		$checked1 = "checked";
	}
	else {
		$checked1 = "";
	}
	if(isset($_POST["prelievi_sids_ippocampo"])&&($_POST["prelievi_sids_ippocampo"]=='Y')){
		$checked2 = "checked";
	}
	else {
		$checked2 = "";
	}
	if(isset($_POST["prelievi_sids_nuclei"])&&($_POST["prelievi_sids_nuclei"]=='Y')){
		$checked3 = "checked";
	}
	else {
		$checked3 = "";
	}
	if(isset($_POST["prelievi_sids_tronco"])&&($_POST["prelievi_sids_tronco"]=='Y')){
		$checked4 = "checked";
	}
	else {
		$checked4 = "";
	}
?>
<form id="adminform" name="adminform" action="db/prelievi_sids_send1.php" method="post">
	<div class="col-12">
		<label>
			<input type="checkbox" name="corteccia" value="Y" style="margin-bottom: 0px;" <?php echo $checked1."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Corteccia cerebrale: due prelievi di corteccia frontale (destra e sinistra).
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="ippocampo" value="Y" style="margin-bottom: 0px;" <?php echo $checked2."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Ippocampo: prelievi bilaterali.
		</label>
	</div>	
	<div class="col-12">
		<label>
			<input type="checkbox" name="nuclei" value="Y" style="margin-bottom: 0px;" <?php echo $checked3."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Nuclei della base: prelievi per ciascun emisfero.
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="tronco" value="Y" style="margin-bottom: 0px;" <?php echo $checked4."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label align="justify" class="cart">
			Tronco encefalico <img src="img/info.png" style="width: 30px; height: 30px; vertical-align:middle;" onclick="popupCenter('comuni/popup3.php', 'Avviso!',510,300);" href="javascript:void(0);"/>
		</label>
	</div>
	<div class="col-9">
		<label>
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