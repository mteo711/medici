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
<?php
    if (($_SESSION["stato"] == 'chiusa') || ($_SESSION["stato"] == 'chiusa_usr')){
        $dis = "disabled";
    }
    else {
        $dis = "";
    }
	require_once("./db/dati_protocollo_sids_load.php");
	loadPage();
	require_once("./db/loadtab_autopsia.php");
	tab_autopsia();
	if(isset($_POST["dati_protocollo_referti"])){
		$referti = $_POST["dati_protocollo_referti"];
		$class1 = "";
	}
	else {
		$referti = null;
		$class1 = "errors";
	}
	if(isset($_POST["dati_protocollo_diagnosi"])){
		$diagnosi = $_POST["dati_protocollo_diagnosi"];
		$class2 = "";
	}
	else {
		$diagnosi = null;
		$class2 = "errors";
	}
    if(isset($_POST["dati_protocollo_caso"])){
		$caso = $_POST["dati_protocollo_caso"];
		$class3 = "";
	}
	else {
		$caso = null;
		$class3 = "errors";
	}
?>
<script>
$(function() {
      $( "#slct" ).selectmenu();
      $("#slct").val('<?php echo $caso; ?>')
      $('#slct').selectmenu('refresh', true);
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
<form id="adminform" name="adminform" action="db/dati_protocollo_sids_send.php" method="post">
    <div class="col-1">
        <label style="padding-top: 5px;" <?php echo "class=".$class3; ?>>
            Tipo di caso *<br/>
            <select tabindex="13" id="slct" name="caso" style="width:75%;" <?php echo $dis; ?>>
                <option value="">&nbsp</option>
                <option value="SIDS">SIDS</option>
                <option value="SUID">SUID</option>
                <option value="non classificato">Non classificato</option>
                <option value="incerto">Incerto</option>
            </select>
        </label>
    </div>
	<div class="col-1">
		<label style="font-size: 14px; color: #000;padding-top: 6px;" <?php echo "class=".$class1; ?>>
			Principali referti patologici: *<br/>
			<textarea name="reperti" <?php echo $dis; ?>><?php echo $referti; ?></textarea>
		</label>
	</div>
	<div class="col-1">
		<label style="font-size: 14px; color: #000;padding-top: 6px;" <?php echo "class=".$class2; ?>>
			Diagnosi anatomo-patologica: *<br/>
			<textarea name="diagnosi" <?php echo $dis; ?>><?php echo $diagnosi; ?></textarea>
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