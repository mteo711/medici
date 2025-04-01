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
require_once("./db/referto_macroscopico_annessi_fetali_load.php");
loadPage();
require_once("./db/loadtab_annessif.php");
tab_annessif();
if(isset($_POST["annessi_placenta"])){
    $placenta = $_POST["annessi_placenta"];
    $class1 = "";
}
else {
    $placenta = null;
    $class1 = "errors";
}
if(isset($_POST["annessi_pervenuta"])){
    $pervenuta = $_POST["annessi_pervenuta"];
    $class2 = "";
}
else {
    $pervenuta = null;
    $class2 = "errors";
}
if(isset($_POST["annessi_punto"])){
    $punto = $_POST["annessi_punto"];
    $class3 = "";
}
else {
    $punto = null;
    $class3 = "errors";
}
if(isset($_POST["annessi_distanza"])){
    $distanza = $_POST["annessi_distanza"];
    $class4 = "";
}
else {
    $distanza = null;
    $class4 = "errors";
}
if(isset($_POST["annessi_intersezione"])){
    $intersezione = $_POST["annessi_intersezione"];
    $class5 = "";
}
else {
    $intersezione = null;
    $class5 = "errors";
}
if(isset($_POST["annessi_caratteristiche"])){
    $caratteristiche = $_POST["annessi_caratteristiche"];
    $class6 = "";
}
else {
    $caratteristiche = null;
    $class6 = "errors";
}
?>
<script>
    
  $(function() {
      $('#distDC').keypad();    
  });
    
  $(function() {
  	$( "#placenta" ).selectmenu();
    $("#placenta").val('<?php echo $placenta; ?>')
    $('#placenta').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#punto" ).selectmenu();
    $("#punto").val('<?php echo $punto; ?>')
    $('#punto').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#pervenuta" ).selectmenu();
    $("#pervenuta").val('<?php echo $pervenuta; ?>')
    $('#pervenuta').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#inserzione" ).selectmenu();
    $("#inserzione").val('<?php echo $intersezione; ?>')
    $('#inserzione').selectmenu('refresh', true);
  });
    
  $(function() {
  	$( "#caratt" ).selectmenu();
    $("#caratt").val('<?php echo $caratteristiche; ?>')
    $('#caratt').selectmenu('refresh', true);
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

<div id="dtBox"></div>
<br/<br/><br/>
<form id="adminform" name="adminform" action="db/referto_macroscopico_annessi_fetali_sendf.php" method="post">
	<div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Placenta <br/>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class1; ?>>
			Placenta *<br/>
			<select tabindex="38" id="placenta" style="width:75%;" name="placenta" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="singola">Singola</option>
				<option value="gemellare fusa">Gemellare Fusa</option>
				<option value="gemellare separata">Gemellare Separata</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class2; ?>>
			Pervenuta *<br/>
			<select tabindex="38" id="pervenuta" style="width:75%;" name="pervenuta" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="fresca">Fresca</option>
				<option value="fissata">Fissata</option>
				<option value="refrigerata">Refrigerata</option>
				<option value="congelata">Congelata</option>
				<option value="intera">Intera</option>
				<option value="frammentata">Frammentata</option>
				<option value="parziale">Parziale</option>
				<option value="cotiledoni lacerati">Cotiledoni Lacerati</option>
				<option value="lembi di decidua basale adesi">Lembi di decidua basale adesi</option>
			</select>
		</label>
	</div>
	<div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Membrane<br/>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 7px;" <?php echo "class=".$class3; ?>>
			Punto di rottura *<br/>
			<select tabindex="38" id="punto" style="width:75%;" name="punto" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="precisabile">Precisabile</option>
				<option value="imprecisabile">Imprecisabile</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label  <?php echo "class=".$class4; ?>>
			Distanza dal margine del disco coriale (cm) *<br/>
			<input placeholder="cm" id="distDC" name="distanza" tabindex="39" style="width: 100%;" readonly value="<?php echo $distanza; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class5; ?>>
			Inserzione *<br/>
			<select tabindex="38" id="inserzione" style="width:75%;" name="intersezione" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="normale">Normale</option>
				<option value="marginale">Marginale</option>
				<option value="extracoriale">Extra Coriale</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class6; ?>>
			Caratteristiche *<br/>
			<select tabindex="38" id="caratt" style="width:75%;" name="caratteristiche" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="ispessite">Ispessite</option>
				<option value="sottili">Sottili</option>
				<option value="opache">Opache</option>
				<option value="lucenti">Lucenti</option>
				<option value="colorazione di meconio">Colorazione di Meconio</option>
				<option value="edema">Edema</option>
				<option value="emorragie retromembranosa">Emorragia retromembranosa</option>
			</select>
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