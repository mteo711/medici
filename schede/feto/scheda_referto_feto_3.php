<!--
 * User: lucaferrari
 * Date: 12/06/15
 */
 -->
<script src="js/scripts.js"></script>
<link rel="stylesheet" href="js/jquery/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
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
require_once("./db/referto_macroscopico_annessi_fetali_load3.php");
loadPage();
require_once("./db/loadtab_annessif.php");
tab_annessif();

$checked1 = "";
$checked2 = "";
$checked3 = "";
$checked4 = "";
$checked5 = "";
if(isset($_POST["annessi_peso"])){
    $peso = $_POST["annessi_peso"];
    $class1 = "";
}
else {
    $peso = null;
    $class1 = "errors";
}
if(isset($_POST["annessi_diam1"])){
    $diam1 = $_POST["annessi_diam1"];
    $class2 = "";
}
else {
    $diam1 = null;
    $class2 = "errors";
}
if(isset($_POST["annessi_diam2"])){
    $diam2 = $_POST["annessi_diam2"];
    $class3 = "";
}
else {
    $diam2 = null;
    $class3 = "errors";
}
if(isset($_POST["annessi_spess1"])){
    $spess1 = $_POST["annessi_spess1"];
    $class4 = "";
}
else {
    $spess1 = null;
    $class4 = "errors";
}
if(isset($_POST["annessi_spess2"])){
    $spess2= $_POST["annessi_spess2"];
    $class5 = "";
}
else {
    $spess2 = null;
    $class5 = "errors";
}
if(isset($_POST["annessi_forma"])){
    $forma = $_POST["annessi_forma"];
    $class6 = "";
}
else {
    $forma = null;
    $class6 = "errors";
}
if(isset($_POST["annessi_vfetale"])){
    $vfetale = $_POST["annessi_vfetale"];
    $class7 = "";
}
else {
    $vfetale = null;
    $class7 = "errors";
}
if(isset($_POST["annessi_vmaterno"])){
    $vmaterno= $_POST["annessi_vmaterno"];
    $class8 = "";
}
else {
    $vmaterno = null;
    $class8 = "errors";
}
if(isset($_POST["annessi_emaR"])&&($_POST["annessi_emaR"]=='Y')){
    $emaR = 'Y';
    $checked1 = "checked";
}
else {
    $emaR = '';
    $checked1 = "";
}
if(isset($_POST["annessi_emaRV"])){
    $emaRV= $_POST["annessi_emaRV"];
    $class9 = "";
}
else {
    $emaRV = null;
    $class9 = "errors";
}
if(isset($_POST["annessi_emaM"])&&($_POST["annessi_emaM"]=='Y')){
    $emaM = 'Y';
    $checked2 = "checked";
}
else {
    $emaM = '';
    $checked2 = "";
}
if(isset($_POST["annessi_emaMV"])){
    $emaMV= $_POST["annessi_emaMV"];
    $class10 = "";
}
else {
    $emaMV = null;
    $class10 = "errors";
}
if(isset($_POST["annessi_emaI"])&&($_POST["annessi_emaI"]=='Y')){
    $emaI = 'Y';
    $checked3 = "checked";
}
else {
    $emaI = '';
    $checked3 = "";
}
if(isset($_POST["annessi_emaIV"])){
    $emaIV= $_POST["annessi_emaIV"];
    $class11 = "";
}
else {
    $emaIV = null;
    $class11 = "errors";
}
if(isset($_POST["annessi_infR"])&&($_POST["annessi_infR"]=='Y')){
    $infR = 'Y';
    $checked4 = "checked";
}
else {
    $infR = '';
    $checked4 = "";
}
if(isset($_POST["annessi_infRV"])){
    $infRV= $_POST["annessi_infRV"];
    $class12 = "";
}
else {
    $infRV = null;
    $class12 = "errors";
}
if(isset($_POST["annessi_infV"])&&($_POST["annessi_infV"]=='Y')){
    $infV = 'Y';
    $checked5 = "checked";
}
else {
    $infV = '';
    $checked5 = "";
}
if(isset($_POST["annessi_infVV"])){
    $infVV= $_POST["annessi_infVV"];
    $class13 = "";
}
else {
    $infVV = null;
    $class13 = "errors";
}
if(isset($_POST["annessi_distribuzione"])){
    $distribuzione = $_POST["annessi_distribuzione"];
    $class14 = "";
}
else {
    $distribuzione = null;
    $class14 = "errors";
}
?>
<script>
  
  $( document ).ready(function() {
      
    if ('<?php echo $emaR; ?>' == 'Y'){
    document.getElementById('ndiam1').style.visibility = 'visible';
    document.getElementById('lab1').style.visibility = 'visible';
    }
    if ('<?php echo $emaM; ?>' == 'Y'){
    document.getElementById('ndiam2').style.visibility = 'visible';
    document.getElementById('lab2').style.visibility = 'visible';
    }
    if ('<?php echo $emaI; ?>' == 'Y'){
    document.getElementById('ndiam3').style.visibility = 'visible';
    document.getElementById('lab3').style.visibility = 'visible';
    }
    if ('<?php echo $infR; ?>' == 'Y'){
    document.getElementById('ndiam4').style.visibility = 'visible';
    document.getElementById('lab4').style.visibility = 'visible';
    }
    if ('<?php echo $infV; ?>' == 'Y'){
    document.getElementById('ndiam5').style.visibility = 'visible';
    document.getElementById('lab5').style.visibility = 'visible';
    }
      
  });
    
  $(function() {
      $('#peso').keypad();    
  });
    
  $(function() {
      $('#diam1').keypad();    
  });
    
  $(function() {
      $('#diam2').keypad();    
  });
    
  $(function() {
      $('#spesM').keypad();    
  });
    
  $(function() {
      $('#spesm').keypad();    
  });
    
  $(function() {
      $('#diamm').keypad();    
  });
    
  $(function() {
      $('#ndiam1').keypad();    
  });
    
  $(function() {
      $('#ndiam2').keypad();    
  });
    
  $(function() {
      $('#ndiam3').keypad();    
  });
    
  $(function() {
      $('#ndiam4').keypad();    
  })
   
   $(function() {
      $('#ndiam5').keypad();    
  })
 
  $(function() {
  	$( "#forma" ).selectmenu()
  	.selectmenu( "menuWidget")
  	.addClass( "overflow" );
    $("#forma").val('<?php echo $forma; ?>')
    $('#forma').selectmenu('refresh', true);
  });
  $(function() {
  	$( "#vfetale" ).selectmenu()
  	.selectmenu( "menuWidget")
  	.addClass( "overflow" );
    $("#vfetale").val('<?php echo $vfetale; ?>')
    $('#vfetale').selectmenu('refresh', true);
  });
  $(function() {
  	$( "#vmaterno" ).selectmenu()
  	.selectmenu( "menuWidget")
  	.addClass( "overflow" );
    $("#vmaterno").val('<?php echo $vmaterno; ?>')
    $('#vmaterno').selectmenu('refresh', true);
  });
  $(function() {
  	$( "#vasi" ).selectmenu();
    $("#vasi").val('<?php echo $distribuzione; ?>')
    $('#vasi').selectmenu('refresh', true);
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
<style>
.overflow {
	height: 253px;
  }
</style>
<br/<br/><br/>
<form id="adminform" name="adminform" action="db/referto_macroscopico_annessi_fetali_sendf3.php" method="post">
	<div class="col-3">
		<label <?php echo "class=".$class1; ?>>
			Peso (gr) *<br/>
			<input placeholder="gr" id="peso" name="peso" tabindex="39" style="width: 100%;" readonly value="<?php echo $peso; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-3">
		<label <?php echo "class=".$class2; ?>>
			Diametro Massimo (cm) *<br/>
			<input placeholder="cm" id="diam1" name="diam" tabindex="39" style="width: 100%;" readonly value="<?php echo $diam1; ?>" <?php echo $dis; ?>>
		</label>
	</div>
    <div class="col-3">
		<label <?php echo "class=".$class3; ?>>
			Diametro Minimo (cm) *<br/>
			<input placeholder="cm" id="diamm" name="diammm" tabindex="39" style="width: 100%;" readonly value="<?php echo $diam2; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class4; ?>>
			Spessore Massimo (cm) *<br/>
			<input placeholder="cm" id="spesM" name="spessm" tabindex="39" style="width: 100%;" readonly value="<?php echo $spess1; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class5; ?>>
			Spessore Minimo (cm) *<br/>
			<input placeholder="cm" id="spesm" name="spessmm" tabindex="39" style="width: 100%;" readonly value="<?php echo $spess2; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-3">
		<label <?php echo "class=".$class6; ?>>
			Forma *<br/>
			<select tabindex="38" id="forma" style="width:75%;" name="forma" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="rotonda">Rotonda</option>
				<option value="ovale">Ovale</option>
				<option value="a cuore">A cuore</option>
				<option value="a rene">A rene</option>
				<option value="a racchetta">A racchetta</option>
				<option value="bilobata">Bilobata</option>
				<option value="trilobata">Trilobata</option>
				<option value="doppia">Doppia</option>
				<option value="tripla">Tripla</option>
				<option value="multipla">Multipla</option>
				<option value="membranosa">Membranosa</option>
				<option value="fenestrata">Fenestrata</option>
				<option value="anulare">Anulare</option>
				<option value="lobi accessori">Lobi accessori</option>
				<option value="lobi aberranti">Lobi aberranti</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label <?php echo "class=".$class7; ?>>
			Versante Fetale *<br/>
			<select tabindex="38" id="vfetale" style="width:75%;" name="vfetale" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="lucente">Lucente</option>
				<option value="opaco">Opaco</option>
				<option value="metaplasia squamosa">Metaplasia squamosa</option>
				<option value="amnios nodosum">Amnios nodosum</option>
				<option value="fibrina subcorionica">Fibrina subcorionica</option>
				<option value="ematomi subcorionici">Ematomi subcorionici</option>
				<option value="ematomi subamniotici">Ematomi subamniotici</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label <?php echo "class=".$class8; ?>>
			Versante Materno *<br/>
			<select tabindex="38" id="vmaterno" style="width:75%;" name="vmaterno" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="cotiledoni prominenti">Cotiledoni prominenti</option>
				<option value="cavitazioni centrali">Cavitazioni centrali</option>
				<option value="aree depresse">Aree depresse</option>
				<option value="lacerazioni">Lacerazioni</option>
				<option value="fibrina perivillosa">Fibrina perivillosa</option>
				<option value="sclerosi marginale">Sclerosi marginale</option>
				<option value="calcificazioni">Calcificazioni</option>
			</select>
		</label>
	</div>
	<div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Ematomi <br/>
		</label>
	</div>
	<div class="col-12" id="p1"  >
		<label>
			<input type="checkbox" id="cb1" style="margin-bottom: 0px;" name="emaR" value="Y" onclick="logo('cb1', 'ndiam1', 'lab1');" <?php echo $checked1."  ".$dis;?>>
		</label>
	</div>
	<div class="col-14" id="p2"  >
		<label>
			Retroplacentari
		</label>
	</div>
	<div class="col-2">
		<label style="visibility:hidden;" id="lab1" <?php echo "class=".$class9; ?>>
			N° diam. Massimo (cm) <br/>
			<input placeholder="cm" id="ndiam1" name="emaRV" tabindex="39" style="width: 100%;visibility:hidden;" readonly value="<?php echo $emaRV; ?>" <?php echo $dis; ?>>
		</label>
	</div>

	<div class="col-12" id="p3"  >
		<label>
			<input type="checkbox" id="cb2" style="margin-bottom: 0px;" name="emaM" value="Y" onclick="logo('cb2', 'ndiam2', 'lab2');" <?php echo $checked2."  ".$dis;?>>
		</label>
	</div>
	<div class="col-14" id="p4"  >
		<label>
			Marginali
		</label>
	</div>
	<div class="col-2">
		<label style="visibility:hidden;" id="lab2" <?php echo "class=".$class10; ?>>
			N° diam. Massimo (cm) <br/>
			<input placeholder="cm" id="ndiam2" name="emaMV" tabindex="39" style="width: 100%;visibility:hidden;" readonly value="<?php echo $emaMV; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-12" id="p5"  >
		<label>
			<input type="checkbox" style="margin-bottom: 0px;" name="emaI" value="Y" id="cb3" onclick="logo('cb3', 'ndiam3', 'lab3');" <?php echo $checked3."  ".$dis;?>>
		</label>
	</div>
	<div class="col-14" id="p6"  >
		<label>
			Intervillosi
		</label>
	</div>
	<div class="col-2">
		<label style="visibility:hidden;" id="lab3"  <?php echo "class=".$class11; ?>>
			N° diam. Massimo (cm) <br/>
			<input placeholder="cm" id="ndiam3" name="emaIV" tabindex="39" style="width: 100%;visibility:hidden;" readonly value="<?php echo $emaIV; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-1">
		<label style="font-size: 20px; color: #000;">
			Infarti <br/>
		</label>
	</div>
	<div class="col-12" id="p7"  >
		<label>
			<input type="checkbox" style="margin-bottom: 0px;" name="infR" value="Y" id="cb4" onclick="logo('cb4', 'ndiam4', 'lab4');" <?php echo $checked4."  ".$dis;?>>
		</label>
	</div>
	<div class="col-14" id="p8"  >
		<label>
			Recenti
		</label>
	</div>
	<div class="col-2">
		<label style="visibility:hidden;" id="lab4"  <?php echo "class=".$class12; ?>>
			N° diam. Massimo (cm) <br/>
			<input placeholder="cm" id="ndiam4" name="infRV" tabindex="39" style="width: 100%;visibility:hidden;" readonly value="<?php echo $infRV; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	
	<div class="col-12" id="p9"  >
		<label>
			<input type="checkbox" style="margin-bottom: 0px;" name="infV" value="Y" id="cb5" onclick="logo('cb5', 'ndiam5', 'lab5');" <?php echo $checked5."  ".$dis;?>>
		</label>
	</div>
	<div class="col-14" id="p10"  >
		<label>
			Di vecchia data
		</label>
	</div>
	<div class="col-2">
		<label style="visibility:hidden;" id="lab5"  <?php echo "class=".$class13; ?>>
			N° diam. Massimo (cm) <br/>
			<input placeholder="cm" id="ndiam5" name="infVV" tabindex="39" style="width: 100%;visibility:hidden;" readonly value="<?php echo $infVV; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-2">
		<label <?php echo "class=".$class14; ?>>
			Distribuzione Vasi coriali <br/>
			<select tabindex="38" id="vasi" style="width:75%;" name="distribuzione" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="magistrale">Magistrale</option>
				<option value="dispersa">Dispersa</option>
				<option value="anastomosi vascolari">Anastomosi vascolari</option>
				<option value="angiodistopie">Angiodistopie</option>
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