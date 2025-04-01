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
	require_once("./db/esame_esterno_sids_load.php");
	loadPage();
	require_once("./db/loadtab_autopsia.php");
	tab_autopsia();

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
	if(isset($_POST["esame_esterno_segni"])){
		$segni= $_POST["esame_esterno_segni"];
		$class8 = "";
	}
	else {
		$segni = null;
		$class8 = "errors";
	}
	if(isset($_POST["esame_esterno_naso"])){
		$naso= $_POST["esame_esterno_naso"];
		$class9 = "";
	}
	else {
		$naso = null;
		$class9 = "errors";
	}
	if(isset($_POST["esame_esterno_bocca"])){
		$bocca = $_POST["esame_esterno_bocca"];
		$class10 = "";
	}
	else {
		$bocca = null;
		$class10 = "errors";
	}
	if(isset($_POST["esame_esterno_urine"])){
		$urine = $_POST["esame_esterno_urine"];
		$class11 = "";
	}
	else {
		$urine = null;
		$class11 = "errors";
	}
	if(isset($_POST["esame_esterno_specU"])){
		$specU = $_POST["esame_esterno_specU"];
		$class12 = "";
	}
	else {
		$specU = null;
		$class12 = "errors";
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
    if ('<?php echo $urine; ?>' == 'Y'){
    document.getElementById('sel').style.visibility = 'visible';
    }
  });
  
  $(function() {
      $('#peso').keypad();    
  });
  
  $(function() {
      $('#lung').keypad();    
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
   		 	   if (value == 'Y') {
   		 		  document.getElementById('sel').style.visibility='visible'; return;
   		 	   }
   		 		  document.getElementById('sel').style.visibility='hidden'; return;
   		 }
   	});
    $("#slct2").val('<?php echo $urine; ?>')
    $('#slct2').selectmenu('refresh', true);
   });
   $(function() {
   	$( "#segni" ).selectmenu();
   	$('#segni').val('<?php echo $segni; ?>');
   	$('#segni').selectmenu('refresh', true);
   });
   $(function() {
   	$( "#sangueB" ).selectmenu();
	$('#sangueB').val('<?php echo $bocca; ?>');
	$('#sangueB').selectmenu('refresh', true);
   });
   $(function() {
   	$( "#sangueN" ).selectmenu();
   	$('#sangueN').val('<?php echo $naso; ?>');
   	$('#sangueN').selectmenu('refresh', true);
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
<script>
function popupCenter(url, title, w, h) {
var left = (screen.width/2)-(w/2);
var top = (screen.height/2)-(h/2);
return window.open(url, title, 'directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no, width='+w+', height='+h+', top='+top+', left='+left);
} 
</script> 
<div id="dtBox"></div>
<br/<br/><br/>
<form enctype="multipart/form-data" id="adminform" name="adminform" action="db/esame_esterno_sids_send.php" method="post">
	<div id="error" class="col-1">
		<label style="font-size: 10px; color: #e80d0d;" align="justify" class="cart">
		 <img src="img/info.png" style="width: 30px; height: 30px; vertical-align:middle;" onclick="popupCenter('comuni/popup1.php', 'Avviso!',510,200);" href="javascript:void(0);"/>
		</label>
	</div>

	<div class="col-3">
		<label style="padding-top: 6px;" <?php echo "class=".$class1; ?>>
			Autopsia n. *<br/>
			<?php
				echo "<input id=\"numAuto\" $dis name=\"numAuto\" tabindex=\"39\" value=\"".$num."\">";
			?>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 2px;" <?php echo "class=".$class2; ?>>
			Data * <sup>1</sup><br/>
			<?php
				echo "<input id=\"dataA\" $dis name=\"dataA\" tabindex=\"40\" readonly value=\"".$data."\">";
			?>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 6px;" <?php echo "class=".$class3; ?>>
			Medico Settore *<br/>
			<?php
				echo "<input placeholder=\"Dr.\" $dis id=\"dr\" name=\"dr\" tabindex=\"41\" value=\"".$medico."\">";
			?>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 8px;" <?php echo "class=".$class4; ?>>
			Documentazione fotografica/videoregistrazione *<br/>
			<select id="slct1" name="documenti" style="width:50%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="Y">Si (allegare)</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label id="all" style="visibility: hidden;padding-top: 6px;" <?php echo "class=".$class5; ?>>
			Allegare (Fomati compressi | Dim. max 5MB) *<br/>
            <input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
			<input tabindex="43" <?php echo $dis; ?> name="allegati" type="file" <?php echo $dis; ?>>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 6px;" <?php echo "class=".$class6; ?>>
			Peso (gr) *<br/>
			<?php
				echo "<input placeholder=\"gr.\" $dis id=\"peso\" name=\"peso\" style=\"width: 100%;\" tabindex=\"44\" readonly value=\"".$peso."\">";
			?>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 6px;" <?php echo "class=".$class7; ?>>
			Lunghezza (cm) *<br/>
			<?php
				echo "<input placeholder=\"cm.\" $dis id=\"lung\" name=\"lung\" style=\"width: 100%;\" tabindex=\"45\" readonly value=\"".$lung."\">";
			?>
		</label>
	</div>
	<div class="col-3">
		<label style="padding-top: 8px;" <?php echo "class=".$class8; ?>>
			Segni Tanatologici *<br/>
			<select tabindex="46" id="segni" name="segni" style="width:75%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="ipostasi">Ipostasi</option>
				<option value="rigidita">Rigidità</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 6px;" <?php echo "class=".$class9; ?>>
			Presenza di sangue al naso *<br/>
			<select tabindex="47" id="sangueN" name="sangueN" style="width:75%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="Y">Si</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 6px;" <?php echo "class=".$class10; ?>>
			Presenza di sangue alla bocca *<br/>
			<select tabindex="48" id="sangueB" name="sangueB" style="width:75%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="Y">Si</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label style="padding-top: 14px;" <?php echo "class=".$class11; ?>>
			Presenza di urine, sangue o feci in corrisp. degli orifizi o sul corpo *<br/>
			<select tabindex="49" id="slct2" name="sangueF" style="width:75%;" <?php echo $dis; ?>>
				<option value=""> &nbsp </option>
				<option value="Y">Si (specificare)</option>
				<option value="N">No</option>
			</select>
		</label>
	</div>
	<div class="col-2">
		<label id="sel" style="visibility:hidden;padding-top: 6px;" <?php echo "class=".$class12; ?>>
			Specificare *<br/>
			<textarea name="specF" style="height:24px;" tabindex="50"  <?php echo $dis; ?>><?php echo $specU; ?></textarea>
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