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
	require_once("./db/esame_esterno_mf_load.php");
	loadPage();
	require_once("./db/loadtab_autopsiaf.php");
	tab_autopsiaf();

    if(isset($_POST["data_morte"])){
        list($year, $month, $day) = explode("-", $_POST['data_morte']);
        $morte = "$day-$month-$year";
    }
    else {
        $morte = null;
    }

	if(isset($_POST["esame_esterno_num"])){
		$num = $_POST["esame_esterno_num"];
		$class1 = "";
	}
	else {
		$num = null;
		$class1 = "errors";
	}
	if(isset($_POST["esame_esterno_data"])){
        list($year, $month, $day) = explode("-", $_POST['esame_esterno_data']);
        $data = "$day-$month-$year";
		$class2 = "";
	}
	else {
		$data = null;
		$class2 = "errors";
	}
	if(isset($_POST["esame_esterno_medico"])){
		$medico = $_POST["esame_esterno_medico"];
		$class3 = "";
	}
	else {
		$medico = null;
		$class3 = "errors";
	}
	if(isset($_POST["esame_esterno_documentazione"])){
		$doc = $_POST["esame_esterno_documentazione"];
		$class4 = "";
	}
	else {
		$doc = null;
		$class4 = "errors";
	}
	if(isset($_POST["esame_esterno_formato"])){
		$formato = $_POST["esame_esterno_formato"];
		$class5 = "";
	}
	else {
		$formato = null;
		$class5 = "errors";
	}
	if(isset($_POST["esame_esterno_peso"])){
		$peso= $_POST["esame_esterno_peso"];
		$class6 = "";
	}
	else {
		$peso = null;
		$class6 = "errors";
	}
	if(isset($_POST["esame_esterno_lung"])){
		$lung= $_POST["esame_esterno_lung"];
		$class7 = "";
	}
	else {
		$lung = null;
		$class7 = "errors";
	}
    if(isset($_POST["esame_esterno_lungVP"])){
		$lungVP = $_POST["esame_esterno_lungVP"];
		$class8 = "";
	}
	else {
		$lungVP = null;
		$class8 = "errors";
	}
    if(isset($_POST["esame_esterno_circC"])){
		$circC = $_POST["esame_esterno_circC"];
		$class9 = "";
	}
	else {
		$circC = null;
		$class9 = "errors";
	}
    if(isset($_POST["esame_esterno_circT"])){
		$circT = $_POST["esame_esterno_circT"];
		$class10 = "";
	}
	else {
		$circT = null;
		$class10 = "errors";
	}
    if(isset($_POST["esame_esterno_circA"])){
		$circA = $_POST["esame_esterno_circA"];
		$class11 = "";
	}
	else {
		$circA = null;
		$class11 = "errors";
	}
    if(isset($_POST["esame_esterno_lungO"])){
		$lungO = $_POST["esame_esterno_lungO"];
		$class11 = "";
	}
	else {
		$lungO = null;
		$class12 = "errors";
	}
    if(isset($_POST["esame_esterno_lungF"])){
		$lungF = $_POST["esame_esterno_lungF"];
		$class13 = "";
	}
	else {
		$lungF = null;
		$class13 = "errors";
	}
    if(isset($_POST["esame_esterno_lungP"])){
		$lungP = $_POST["esame_esterno_lungP"];
		$class14 = "";
	}
	else {
		$lungP = null;
		$class14 = "errors";
	}
    if(isset($_POST["esame_esterno_lungM"])){
		$lungM = $_POST["esame_esterno_lungM"];
		$class15 = "";
	}
	else {
		$lungM = null;
		$class15 = "errors";
	}
    if(isset($_POST["esame_esterno_percentile"])){
		$percC = $_POST["esame_esterno_percentile"];
		$class16 = "";
	}
	else {
		$percC = null;
		$class16 = "errors";
	}
    if(isset($_POST["esame_esterno_fenotipo"])){
		$fenotipo = $_POST["esame_esterno_fenotipo"];
		$class17 = "";
	}
	else {
		$fenotipo = null;
		$class17 = "errors";
	}
    if(isset($_POST["esame_esterno_nutrizione"])){
		$nutrizione = $_POST["esame_esterno_nutrizione"];
		$class18 = "";
	}
	else {
		$nutrizione = null;
		$class18 = "errors";
	}
    if(isset($_POST["esame_esterno_idrope"])){
		$idrope = $_POST["esame_esterno_idrope"];
		$class19 = "";
	}
	else {
		$idrope = null;
		$class19 = "errors";
	}
    if(isset($_POST["esame_esterno_plica"])){
		$plica = $_POST["esame_esterno_plica"];
		$class20 = "";
	}
	else {
		$plica = null;
		$class20 = "errors";
	}
    if(isset($_POST["esame_esterno_igroma"])){
		$igroma = $_POST["esame_esterno_igroma"];
		$class21 = "";
	}
	else {
		$igroma = null;
		$class21 = "errors";
	}
    if(isset($_POST["esame_esterno_macerazione"])){
		$macerazione = $_POST["esame_esterno_macerazione"];
		$class22 = "";
	}
	else {
		$macerazione = null;
		$class22 = "errors";
	}
    if(isset($_POST["esame_esterno_colorito"])){
		$colorito = $_POST["esame_esterno_colorito"];
		$class23 = "";
	}
	else {
		$colorito = null;
		$class23 = "errors";
	}
    if(isset($_POST["esame_esterno_specS"])){
		$specS = $_POST["esame_esterno_specS"];
		$class24 = "";
	}
	else {
		$specS = null;
		$class24 = "errors";
	}
    if(isset($_POST["esame_esterno_vernice"])){
		$vernice = $_POST["esame_esterno_vernice"];
		$class25 = "";
	}
	else {
		$vernice = null;
		$class25 = "errors";
	}
    if(isset($_POST["esame_esterno_genitali"])){
		$genitali = $_POST["esame_esterno_genitali"];
		$class26 = "";
	}
	else {
		$genitali = null;
		$class26 = "errors";
	}
    if(isset($_POST["esame_esterno_estremita"])){
		$estremita = $_POST["esame_esterno_estremita"];
		$class27 = "";
	}
	else {
		$estremita = null;
		$class27 = "errors";
	}
    if(isset($_POST["esame_esterno_cordone"])){
		$cordone = $_POST["esame_esterno_cordone"];
		$class28 = "";
	}
	else {
		$cordone = null;
		$class28 = "errors";
	}
    if(isset($_POST["esame_esterno_specC"])){
		$specC = $_POST["esame_esterno_specC"];
		$class29 = "";
	}
	else {
		$specC = null;
		$class29 = "errors";
	}
    
?>
<script>
     $( document ).ready(function() {
         
    if (('<?php echo $morte; ?>' == '') || ('<?php echo $_SESSION["stato"]; ?>' == 'chiusa') || ('<?php echo $_SESSION["stato"]; ?>' == 'chiusa_usr')){
        document.getElementById("dataA").disabled = true;
    }
    else {
        document.getElementById("dataA").disabled = false;
    }
         
    if ('<?php echo $doc; ?>' == 'Y'){
    document.getElementById('all').style.visibility = 'visible';
    }
    if ('<?php echo $colorito; ?>' == 'sede'){
    document.getElementById('sel').style.visibility = 'visible';
    }
    if ('<?php echo $cordone; ?>' == 'numero vasi'){
    document.getElementById('sel3').style.visibility = 'visible';
    }
    });
    
    $(function() {
      $('#peso').keypad();    
    });
    
    $(function() {
      $('#lungTot').keypad();    
    });
    
    $(function() {
      $('#lungVP').keypad();    
    });
    
    $(function() {
      $('#circC').keypad();    
    });
    
    $(function() {
      $('#circT').keypad();    
    });
    
    $(function() {
      $('#circA').keypad();    
    });
    
    $(function() {
      $('#lungO').keypad();    
    });
    
    $(function() {
      $('#lungF').keypad();    
    });
    
    $(function() {
      $('#lungP').keypad();    
    });
    
    $(function() {
      $('#monc').keypad();    
    });
    
    $(function() {
      $('#percC').keypad();    
    });
    
    $(function() {
      $('#plica').keypad();    
    });
    
    $(function() {
      $('#nvasi').keypad();    
    });

	$(function() {
		$( "#slct1" ).selectmenu({
			 change: function(event, ui){
			 	var select = document.getElementById('slct1');
			 	   var value = select.value;
			 	   if (value == 'Y') {
			 		  document.getElementById('all').style.visibility='visible'; return;
			 	   }
			 		  document.getElementById('all').style.visibility='hidden'; return;
			 }
		});
        $("#slct1").val('<?php echo $doc; ?>')
        $('#slct1').selectmenu('refresh', true);
	});
    
	$(function() {
		$( "#slct2" ).selectmenu({
			 change: function(event, ui){
			 	var select = document.getElementById('slct2');
			 	   var value = select.value;
			 	   if (value == 'sede') {
			 		  document.getElementById('sel').style.visibility='visible'; return;
			 	   }
			 		  document.getElementById('sel').style.visibility='hidden'; return;
			 }
		})
		.selectmenu( "menuWidget")
		.addClass( "overflow" ); 
        $("#slct2").val('<?php echo $colorito; ?>')
        $('#slct2').selectmenu('refresh', true);
		
	});
    
	$(function() {
		$( "#slct3" ).selectmenu({
			 change: function(event, ui){
			 	var select = document.getElementById('slct3');
			 	   var value = select.value;
			 	   if (value == 'numero vasi') {
			 		  document.getElementById('sel3').style.visibility='visible'; return;
			 	   }
			 		  document.getElementById('sel3').style.visibility='hidden'; return;
			 }
		})
		.selectmenu( "menuWidget")
		.addClass( "overflow" );
        $("#slct3").val('<?php echo $cordone; ?>')
        $('#slct3').selectmenu('refresh', true);
		
	});
	$(function() {
		$( "#fenotipo" ).selectmenu();
        $("#fenotipo").val('<?php echo $fenotipo; ?>')
        $('#fenotipo').selectmenu('refresh', true);
	});
    
	$(function() {
		$( "#macerazione" ).selectmenu();
        $("#macerazione").val('<?php echo $macerazione; ?>')
        $('#macerazione').selectmenu('refresh', true);
	});
    
	$(function() {
		$( "#idrope" ).selectmenu();
        $("#idrope").val('<?php echo $idrope; ?>')
        $('#idrope').selectmenu('refresh', true);
	});
    
	$(function() {
		$( "#nutrizione" ).selectmenu();
        $("#nutrizione").val('<?php echo $nutrizione; ?>')
        $('#nutrizione').selectmenu('refresh', true);
	});
    
	$(function() {
		$( "#genitali" ).selectmenu()
		.selectmenu( "menuWidget")
		.addClass( "overflow" );
        $("#genitali").val('<?php echo $genitali; ?>')
        $('#genitali').selectmenu('refresh', true);
	});
    
	$(function() {
		$( "#estremi" ).selectmenu()
		.selectmenu( "menuWidget")
		.addClass( "overflow" );
        $("#estremi").val('<?php echo $estremita; ?>')
        $('#estremi').selectmenu('refresh', true);
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

    
$(function() {
  $( "#dataA" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-10:+0",
        changeMonth: true,
        changeYear: true,
        minDate: "<?php echo $morte; ?>" ,
        maxDate: "+0D" //new Date(2015, 10 - 10, 29) //"+0D"
    });
});
    
</script>
<style>
.overflow {
	height: 150px;
  }
</style>
<script>
function popupCenter(url, title, w, h) {
var left = (screen.width/2)-(w/2);
var top = (screen.height/2)-(h/2);
return window.open(url, title, 'directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no, width='+w+', height='+h+', top='+top+', left='+left);
} 
</script>
<div id="dtBox"></div>
<br/<br/><br/>
<form enctype="multipart/form-data" id="adminform" name="adminform" action="db/esame_esterno_mf_send.php" method="post">
	<div id="error" class="col-1">
		<label style="font-size: 10px; color: #e80d0d;" align="justify" class="cart">
		 <img src="img/info.png" style="width: 30px; height: 30px; vertical-align:middle;" onclick="popupCenter('comuni/popup1.php', 'Avviso!',510,200);" href="javascript:void(0);"/>
		</label>
	</div>

	<div class="col-3">
		<label style="padding-top: 6px;margin-bottom:-1px;" <?php echo "class=".$class1; ?>>
			Autopsia n. *<br/>
			<?php
				echo "<input id=\"numAuto\" name=\"numAuto\" $dis tabindex=\"39\" value=\"".$num."\">";
			?>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 2px;" <?php echo "class=".$class2; ?>>
			Data * <sup>1</sup><br/>
			<?php
				echo "<input id=\"dataA\" name=\"dataA\" $dis tabindex=\"40\" readonly value=\"".$data."\">";
			?>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 6px;" <?php echo "class=".$class3; ?>>
			Medico Settore *<br/>
			<?php
				echo "<input placeholder=\"Dr.\" id=\"dr\" $dis name=\"dr\" tabindex=\"41\" value=\"".$medico."\">";
			?>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 8px;" <?php echo "class=".$class4; ?>>
			Documentazione fotografica/videoregistrazione *<br/>
			<select tabindex="42" id="slct1" name="documenti" style="width:50%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="Y">Si (allegare)</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label id="all" style="visibility: hidden;padding-top: 6px;" <?php echo "class=".$class5; ?>>
			Allegare (Solo formati compressi - .zip, .rar) *<br/>
			<input name="allegati" type="file" accept="application/zip" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 9px;">
			Peso (gr) <br/>
			<?php
				echo "<input placeholder=\"gr.\" id=\"peso\" $dis name=\"peso\" style=\"width: 100%;\" readonly value=\"".$peso."\">";
			?>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 9px;">
			Lunghezza Totale (cm) <br/>
			<?php
				echo "<input placeholder=\"cm.\" id=\"lungTot\" $dis name=\"lung\" style=\"width: 100%;\" readonly value=\"".$lung."\">";
			?>
		</label>
	</div>
	<div class="col-3">
		<label>
			Lunghezza vertice-podice (cm) <br/>
			<input placeholder="cm." id="lungVP" name="lungVP" min="0" tabindex="39" style="width: 100%;" readonly value="<?php echo $lungVP; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-3">
		<label>
			Circonferenza cranica (cm) <br/>
			<input placeholder="cm." id="circC" name="circC" min="0" tabindex="39" style="width: 100%;" readonly value="<?php echo $circC; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-3">
		<label>
			Circonferenza toracica (cm) <br/>
			<input placeholder="cm." id="circT" name="circT" min="0" tabindex="39" style="width: 100%;" readonly value="<?php echo $circT; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-3">
		<label>
			Circonferenza addominale (cm) <br/>
			<input placeholder="cm." id="circA" name="circA" min="0" tabindex="39" style="width: 100%;" readonly value="<?php echo $circA; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-3">
		<label>
			Lunghezza omero (cm) <br/>
			<input placeholder="cm." id="lungO" name="lungO" min="0" tabindex="39" style="width: 100%;" readonly value="<?php echo $lungO; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-3">
		<label>
			Lunghezza femore (cm) <br/>
			<input placeholder="cm." id="lungF" name="lungF" min="0" tabindex="39" style="width: 100%;" readonly value="<?php echo $lungF; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-3">
		<label>
			Lunghezza piede (cm) <br/>
			<input placeholder="cm." id="lungP" name="lungP" min="0" tabindex="39" style="width: 100%;" readonly value="<?php echo $lungP; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-3">
		<label>
			Moncone ombelicale (cm) <br/>
			<input placeholder="cm." id="monc" name="monc" min="0" tabindex="39" style="width: 100%;" readonly value="<?php echo $lungM; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-3">
		<label>
			Percentile di crescita (%) <br/>
			<input placeholder="%" id="percC" name="percC" min="0" tabindex="39" style="width: 100%;" readonly value="<?php echo $percC; ?>" <?php echo $dis; ?>>
		</label>
	</div>
    <div class="col-3">
		<label style="height: 56px;">
			Plica nucale (mm) <br/>
			<input placeholder="Diametro traverso mm." id="plica" name="plica" min="0" tabindex="39" style="width: 100%;" readonly value="<?php echo $plica; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-3">
		<label style="height: 61px;">
			Descrizione Fenotipo <br/>
			<select id="fenotipo" tabindex="38" style="width:75%;" name="fenotipo" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="armonico">Armonico</option>
				<option value="asimmetrico">Asimmetrico</option>
				<option value="dismorfico/malformato">Dismorfico/malformato</option>
				<option value="papiraceo">Papiraceo</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label>
			Nutrizione <br/>
			<select id="nutrizione" tabindex="38" style="width:75%;" name="nutrizione" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="adeguata">Adeguata per età gestionale</option>
				<option value="inadeguata">Inadeguata</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label>
			Idrope cutanea <br/>
			<select tabindex="38" id="idrope" style="width:75%;" name="idrope" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="diffusa">Diffusa</option>
				<option value="segmentaria">Segmentaria</option>
			</select>
		</label>
	</div>
	<div class="col-2b">
		<label>
			Igroma cistico del collo <br/>
			<textarea name="igroma" style="height:24px;" <?php echo $dis; ?>><?php echo $igroma; ?></textarea>			
		</label>
	</div>
	<div class="col-3">
		<label>
			Macerazione <br/>
			<select tabindex="38" id="macerazione" style="width:75%;" name="macerazione" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="I">I grado</option>
				<option value="II">II grado</option>
				<option value="III">III grado</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label>
			Colorito roseo <br/>
			<select tabindex="38" id="slct2" style="width:75%;" name="colorito" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="pallido">Pallido</option>
				<option value="rosso vivo">Rosso vivo</option>
				<option value="violaceo-mattone">Violaceo-Mattone</option>
				<option value="grigio-verdastro">Grigio-Verdastro</option>
				<option value="sub itterico">Sub Itterico</option>
				<option value="itterico">Itterico</option>
				<option value="marezzature petecchie">Marezzature petecchie</option>
				<option value="sede">Sede (specificare)</option>
			</select>
		</label>
	</div>
	<div class="col-2b">
		<label id="sel" style="visibility: hidden">
			Specificare
			<textarea name="specS" style="height:24px;" <?php echo $dis; ?>><?php echo $specS; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label>
			Vernice caseosa <br/>
			<textarea name="vernice" style="height:24px;" <?php echo $dis; ?>><?php echo $vernice; ?></textarea>
		</label>
	</div>
	<div class="col-2">
		<label>
			Caratteristiche genitali <br/>
			<select tabindex="38" id="genitali" style="width:75%;" name="genitali" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="maschili">Maschili</option>
				<option value="femminili">Femminili</option>
				<option value="ambigui">Ambigui</option>
				<option value="ipotrofici">Ipotrofici</option>
				<option value="ipertrofici">Ipertrofici</option>
				<option value="edematosi">Edematosi</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label>
			Estremità <br/>
			<select tabindex="38" id="estremi" style="width:75%;" name="estremita" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="normali">Normali</option>
				<option value="incomplete">Incomplete</option>
				<option value="anomalie posturali">Anomalie posturali</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label>
			Moncone cordone ombelicale <br/>
			<select tabindex="38" id="slct3" style="width:75%;" name="cordone" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="normale">Normale per colore, diametro, spiralizzazione</option>
				<option value="numero vasi">Numero Vasi (specificare)</option>
				<option value="marcato assottigliamento">Marcato assottigliamento</option>
				<option value="discromie">Discromie</option>
				<option value="cisti del cordone">Cisti del cordone</option>
				<option value="ematoma">Ematoma</option>
			</select>
		</label>
	</div>
	<div class="col-3">
		<label id="sel3" style="visibility: hidden; height:56px;">
			Numero <br/>
			<input name="nvasi" id="nvasi" min="0" style="width: 100%;" readonly value="<?php echo $specC; ?>" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-9">
		<label style="font-size: 10px; color: #e80d0d;">
			   * Campi obbligatori. <br/>
               <sup>1</sup> Inserire prima la data di morte nella scheda Lattante > Dati Personali. 
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