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
	require_once("./db/prelievi_mf_load6.php");
	loadPage();
	require_once("./db/loadtab_prelievif.php");
	tab_prelievif();
	if(isset($_POST["prelievi_mf_stellato"])&&($_POST["prelievi_mf_stellato"]=='Y')){
		$checked1 = "checked";
	}
	else {
		$checked1 = "";
	}
	if(isset($_POST["prelievi_mf_cervicale"])&&($_POST["prelievi_mf_cervicale"]=='Y')){
		$checked2 = "checked";
	}
	else {
		$checked2 = "";
	}
	if(isset($_POST["prelievi_mf_corpo"])&&($_POST["prelievi_mf_corpo"]=='Y')){
		$checked3 = "checked";
	}
	else {
		$checked3 = "";
	}
	if(isset($_POST["prelievi_mf_seno"])&&($_POST["prelievi_mf_seno"]=='Y')){
		$checked4 = "checked";
	}
	else {
		$checked4 = "";
	}
	if(isset($_POST["prelievi_mf_timo"])&&($_POST["prelievi_mf_timo"]=='Y')){
		$checked5 = "checked";
	}
	else {
		$checked5 = "";
	}
	if(isset($_POST["prelievi_mf_tiroide"])&&($_POST["prelievi_mf_tiroide"]=='Y')){
		$checked6 = "checked";
	}
	else {
		$checked6 = "";
	}
	if(isset($_POST["prelievi_mf_milza"])&&($_POST["prelievi_mf_milza"]=='Y')){
		$checked7 = "checked";
	}
	else {
		$checked7 = "";
	}
	if(isset($_POST["prelievi_mf_fegato"])&&($_POST["prelievi_mf_fegato"]=='Y')){
		$checked8 = "checked";
	}
	else {
		$checked8 = "";
	}
	if(isset($_POST["prelievi_mf_pancreas"])&&($_POST["prelievi_mf_pancreas"]=='Y')){
		$checked9 = "checked";
	}
	else {
		$checked9 = "";
	}
?>
<form id="adminform" name="adminform" action="db/prelievi_mf_send6.php" method="post">
	<div id="error" class="col-1">
		<label style="font-size: 10px; color: #e80d0d;" align="justify" class="cart">
		 <img src="img/info.png" style="width: 30px; height: 30px; vertical-align:middle;" onclick="popupCenter('comuni/popup4.php', 'Avviso!',510,250);" href="javascript:void(0);"/>
		</label>
	</div>
	<div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Gangli simpatici
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="stellato" value="Y" style="margin-bottom: 0px;" <?php echo $checked1."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Ganglio stellato
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="cervicale" value="Y" style="margin-bottom: 0px;" <?php echo $checked2."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Ganglio cervicale superiore
		</label>
	</div>
	<div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Biforcazione carotidea
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="glomo" value="Y" style="margin-bottom: 0px;" <?php echo $checked3."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Glomo o corpo carotideo
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="seno" value="Y" style="margin-bottom: 0px;" <?php echo $checked4."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Seno carotideo
		</label>
	</div>
	<div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Apparato endocrino
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="timo" value="Y" style="margin-bottom: 0px;" <?php echo $checked5."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Timo
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="tiroide" value="Y" style="margin-bottom: 0px;" <?php echo $checked6."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Tiroide
		</label>
	</div>
	<div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Altro
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="milza" value="Y" style="margin-bottom: 0px;" <?php echo $checked7."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Milza
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="fegato" value="Y" style="margin-bottom: 0px;" <?php echo $checked8."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Fegato
		</label>
	</div>
	<div class="col-12">
		<label>
			<input type="checkbox" name="pancreas" value="Y" style="margin-bottom: 0px;" <?php echo $checked9."  ".$dis;?>>
		</label>
	</div>
	<div class="col-13">
		<label>
			Pancreas
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
				 echo "<button class='save' onclick=\"performSubmit('succ')\">Fine</button>";
			?>            
			<input type="hidden" id="action" name="action"  value="" />   
		</label>
	</div>
</form>