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
	require_once("./db/apparato_respiratorio_mf_load.php");
	loadPage();
	require_once("./db/loadtab_autopsiaf.php");
	tab_autopsiaf();
	if(isset($_POST["respiratorio_laringe"])){
		$laringe = $_POST["respiratorio_laringe"];
		$class1 = "";
	}
	else {
		$laringe = null;
		$class1 = "errors";
	}
	if(isset($_POST["respiratorio_trachea"])){
		$trachea = $_POST["respiratorio_trachea"];
		$class2 = "";
	}
	else {
		$trachea = null;
		$class2 = "errors";
	}
	if(isset($_POST["respiratorio_bronchi"])){
		$bronchi = $_POST["respiratorio_bronchi"];
		$class3 = "";
	}
	else {
		$bronchi = null;
		$class3 = "errors";
	}
	if(isset($_POST["respiratorio_pesoDX"])){
		$pesoDX = $_POST["respiratorio_pesoDX"];
		$class4 = "";
	}
	else {
		$pesoDX = null;
		$class4 = "errors";
	}
	if(isset($_POST["respiratorio_pesoSX"])){
		$pesoSX = $_POST["respiratorio_pesoSX"];
		$class5 = "";
	}
	else {
		$pesoSX = null;
		$class5 = "errors";
	}
	if(isset($_POST["respiratorio_lobiDX"])){
		$lobiDX = $_POST["respiratorio_lobiDX"];
		$class6 = "";
	}
	else {
		$lobiDX = null;
		$class6 = "errors";
	}
	if(isset($_POST["respiratorio_lobiSX"])){
		$lobiSX = $_POST["respiratorio_lobiSX"];
		$class7 = "";
	}
	else {
		$lobiSX = null;
		$class7 = "errors";
	}
	if(isset($_POST["respiratorio_volume"])){
		$volume = $_POST["respiratorio_volume"];
		$class8 = "";
	}
	else {
		$volume = null;
		$class8 = "errors";
	}
	if(isset($_POST["respiratorio_consistenza"])){
		$consistenza = $_POST["respiratorio_consistenza"];
		$class9 = "";
	}
	else {
		$consistenza = null;
		$class9 = "errors";
	}
	if(isset($_POST["respiratorio_colore"])){
		$colore = $_POST["respiratorio_colore"];
		$class10 = "";
	}
	else {
		$colore = null;
		$class10 = "errors";
	}
	if(isset($_POST["respiratorio_superficie"])){
		$superficie = $_POST["respiratorio_superficie"];
		$class11 = "";
	}
	else {
		$superficie = null;
		$class11 = "errors";
	}
	if(isset($_POST["respiratorio_taglio"])){
		$taglio = $_POST["respiratorio_taglio"];
		$class12 = "";
	}
	else {
		$taglio = null;
		$class12 = "errors";
	}

?>
<script>
  $(function() {
      $('#polSX').keypad();    
  });
    
  $(function() {
      $('#polDX').keypad();    
  });
    
  $(function() {
      $('#lobSX').keypad();    
  });
    
  $(function() {
      $('#lobDX').keypad();    
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

<form id="adminform" name="adminform" action="db/apparato_respiratorio_mf_send.php" method="post">
	<div class="col-3">
		<label style="padding-top: 8px;">
			Laringe <br/>
			<textarea name="laringe" style="height:40px;" <?php echo $dis; ?>><?php echo $laringe; ?></textarea>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 8px;">
			Trachea <br/>
			<textarea name="trachea" style="height:40px;" <?php echo $dis; ?>><?php echo $trachea; ?></textarea>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 8px;">
			Bronchi principali <br/>
			<textarea name="bronchi" style="height:40px;" <?php echo $dis; ?>><?php echo $bronchi; ?></textarea>
		</label>
	</div>
	<div class="col-4">
		<label style="padding-top: 8px;" <?php echo "class=".$class4; ?>>
			Polmone SX peso (gr) *<br/>
			<?php
				echo "<input placeholder=\"gr.\" id=\"polSX\" $dis name=\"polSX\" style=\"width: 100%;\" readonly value=\"".$pesoSX."\">";
			?>
		</label>
	</div>
	<div class="col-4">
		<label style="padding-top: 8px;" <?php echo "class=".$class5; ?>>
			Polmone DX peso (gr) *<br/>
			<?php
				echo "<input placeholder=\"gr.\" id=\"polDX\" $dis name=\"polDX\" style=\"width: 100%;\" readonly value=\"".$pesoDX."\">";
			?>
		</label>
	</div>
	<div class="col-4">
		<label style="padding-top: 8px;" <?php echo "class=".$class6; ?>>
			Numero lobi SX *<br/>
			<?php
				echo "<input id=\"lobSX\" name=\"lobSX\" $dis style=\"width: 100%;\" readonly value=\"".$lobiSX."\">";
			?>
		</label>
	</div>
	<div class="col-4">
		<label style="padding-top: 8px;" <?php echo "class=".$class7; ?>>
			Numero lobi DX *<br/>
			<?php
				echo "<input id=\"lobDX\" name=\"lobDX\" $dis style=\"width: 100%;\" readonly value=\"".$lobiDX."\">";
			?>			
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 8px;">
			Volume <br/>
			<textarea name="volume" style="height:40px;" <?php echo $dis; ?>><?php echo $volume; ?></textarea>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 8px;">
			Consistenza <br/>
			<textarea name="consistenza" style="height:40px;" <?php echo $dis; ?>><?php echo $consistenza; ?></textarea>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 8px;">
			Colore <br/>
			<textarea name="colore" style="height:40px;" <?php echo $dis; ?>><?php echo $colore; ?></textarea>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 8px;">
			Superficie esterna <br/>
			<textarea name="superficie" style="height:40px;" <?php echo $dis; ?>><?php echo $superficie; ?></textarea>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 8px;">
			Al taglio <br/>
			<textarea name="taglio" style="height:40px;" <?php echo $dis; ?>><?php echo $taglio; ?></textarea>
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