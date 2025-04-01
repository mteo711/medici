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
<script>
<?php
    if (($_SESSION["stato"] == 'chiusa') || ($_SESSION["stato"] == 'chiusa_usr')){
        $dis = "disabled";
    }
    else {
        $dis = "";
    }
    
	require_once("./db/cavo_orale_sids_load.php");
	loadPage();
	require_once("./db/loadtab_autopsia.php");
	tab_autopsia();
	if(isset($_POST["cavo_orale_tiroide"])){
		$tiroide = $_POST["cavo_orale_tiroide"];
		$class1 = "";
	}
	else {
		$tiroide = null;
		$class1 = "errors";
	}
	if(isset($_POST["cavo_orale_timo"])){
		$timo = $_POST["cavo_orale_timo"];
		$class2 = "";
	}
	else {
		$timo = null;
		$class2 = "errors";
	}
	if(isset($_POST["cavo_orale_paratiroidi"])){
		$para = $_POST["cavo_orale_paratiroidi"];
		$class3 = "";
	}
	else {
		$para = null;
		$class3 = "errors";
	}
	if(isset($_POST["cavo_orale_linfonodi"])){
		$linfonodi = $_POST["cavo_orale_linfonodi"];
		$class4 = "";
	}
	else {
		$linfonodi = null;
		$class4 = "errors";
	}
	if(isset($_POST["cavo_orale_lingua"])){
		$lingua = $_POST["cavo_orale_lingua"];
		$class5 = "";
	}
	else {
		$lingua = null;
		$class5 = "errors";
	}
	if(isset($_POST["cavo_orale_ghiandole"])){
		$ghiandole = $_POST["cavo_orale_ghiandole"];
		$class6 = "";
	}
	else {
		$ghiandole = null;
		$class6 = "errors";
	}
?>
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
<form id="adminform" name="adminform" action="db/cavo_orale_sids_send.php" method="post">
	<div class="col-2">
		<label style="padding-top: 6px;" <?php echo "class=".$class1; ?>>
			Tiroide <br/>
			<textarea name="tiroide" style="height:40px;" <?php echo $dis; ?>><?php echo $tiroide; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 6px;" <?php echo "class=".$class2; ?>>
			Timo<br/>
			<textarea name="timo" style="height:40px;" <?php echo $dis; ?>><?php echo $timo; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 6px;" <?php echo "class=".$class3; ?>>
			Paratiroidi <br/>
			<textarea name="paratiroidi" style="height:40px;" <?php echo $dis; ?>><?php echo $para; ?></textarea>
		</label>
	</div>
	
	<div class="col-2">
		<label style="padding-top: 6px;" <?php echo "class=".$class4; ?>>
			Linfonodi <br/>
			<textarea name="linfonodi" style="height:40px;" <?php echo $dis; ?>><?php echo $linfonodi; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 6px;" <?php echo "class=".$class5; ?>>
			Blocco lingua-ipofaringe <br/>
			<textarea name="lingua" style="height:40px;" <?php echo $dis; ?>><?php echo $lingua; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 6px;" <?php echo "class=".$class6; ?>>
			Ghiandole salivari paralinguali <br/>
			<textarea name="ghiandole" style="height:40px;" <?php echo $dis; ?>><?php echo $ghiandole; ?></textarea>
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