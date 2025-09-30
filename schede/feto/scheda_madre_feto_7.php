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
$checked1 = "";
$checked2 = "";
$checked3 = "";
$checked4 = "";
$checked5 = "";
$checked6 = "";
$checked8 = "";
$checked9 = "";
$checked10 = "";
$checked11 = "";

    if (($_SESSION["stato"] == 'chiusa') || ($_SESSION["stato"] == 'chiusa_usr')){
        $dis = "disabled";
    }
    else {
        $dis = "";
    }
 require_once("./db/info_morte_fetale_load.php");
 loadPage();
 require_once("./db/loadtab_madref.php");
 tab_madref();

 if(isset($_POST["data_nascita"])){
   list($year, $month, $day) = explode("-", $_POST['data_nascita']);
   $nata = "$day-$month-$year";
  }
 else {
   $nata = null;
 }
 if(isset($_POST["data_morte"])){
   list($year, $month, $day) = explode("-", $_POST['data_morte']);
   $morte = "$day-$month-$year";
  }
 else {
   $morte = null;
 }
 if(isset($_POST["morte_fetale_dataU"])){
     list($year, $month, $day) = explode("-", $_POST['morte_fetale_dataU']);
     $dataU = "$day-$month-$year";
     $class1 = "";
 }
 else {
     $dataU = null;
     $class1 = "errors";
 }
 if(isset($_POST["morte_fetale_dataA"])){
     list($year, $month, $day) = explode("-", $_POST['morte_fetale_dataA']);
     $dataA = "$day-$month-$year";
     $class2 = "";
 }
 else {
     $dataA = null;
     $class2 = "errors";
 }
 if(isset($_POST["morte_fetale_dataE"])){
     list($year, $month, $day) = explode("-", $_POST['morte_fetale_dataE']);
     $dataE = "$day-$month-$year";
     $class3 = "";
 }
 else {
     $dataE = null;
     $class3 = "errors";
 }
 if(isset($_POST["morte_fetale_num"])){
     $num = $_POST["morte_fetale_num"];
     $class4 = "";
 }
 else {
     $num = null;
     $class4 = "errors";
 }

 if (isset($_POST["morte_fetale_dataO"])) {
    list($year, $month, $day) = explode("-", $_POST['morte_fetale_dataO']);
    $dataO = "$day-$month-$year";
    $class5 = "";
} else {
    $dataO = null;
    $class5 = "errors";
}


if(isset($_POST["morte_fetale_ginecologo"])){
    $ginecologo = $_POST["morte_fetale_ginecologo"];
    $class6 = "";
}
else {
    $ginecologo = null;
    $class6 = "errors";
}
if(isset($_POST["morte_fetale_ostetrica"])){
    $ostetrica = $_POST["morte_fetale_ostetrica"];
    $class7 = "";
}
else {
    $ostetrica = null;
    $class7 = "errors";
}

if(isset($_POST["morte_fetale_fecondazione"])){
    $fecondazione = $_POST["morte_fetale_fecondazione"];
    $class18 = "";
}
else {
    $fecondazione = null;
    $class18 = "errors";
}

if(isset($_POST["morte_fetale_dataF"])){
    list($year, $month, $day) = explode("-", $_POST['morte_fetale_dataF']);
    $dataF = "$day-$month-$year";
    $class23 = "";
}
else {
    $dataF = null;
    $class23 = "errors";
}


if(isset($_POST["morte_fetale_struttura"])){
    $struttura = $_POST["morte_fetale_struttura"];
    $class9 = "";
}
else {
    $struttura = null;
    $class9 = "errors";
}

if((isset($_POST["morte_fetale_endouterina"]))&&($_POST["morte_fetale_endouterina"] == 'Y')){
    $endouterina = $_POST["morte_fetale_endouterina"];
    $class10 = "";
    $checked1 = "checked";
}
else{ 
    $endouterina = null;
    $class10 = "errors";
    $checked1 = "";
}

if((isset($_POST["morte_fetale_vitro"]))&&($_POST["morte_fetale_vitro"] == 'Y')){
    $vitro = $_POST["morte_fetale_vitro"];
    $class11 = "";
    $checked2 = "checked";
}
else{ 
    $vitro = null;
    $class11 = "errors";
    $checked2 = "";
}

if((isset($_POST["morte_fetale_intracitoplasmatica"]))&&($_POST["morte_fetale_intracitoplasmatica"] == 'Y')){
    $intracitoplasmatica = $_POST["morte_fetale_intracitoplasmatica"];
    $class12 = "";
    $checked3 = "checked";
}
else{ 
    $intracitoplasmatica = null;
    $class12 = "errors";
    $checked3 = "";
}

if((isset($_POST["morte_fetale_gameti"]))&&($_POST["morte_fetale_gameti"] == 'Y')){
    $gameti = $_POST["morte_fetale_gameti"];
    $class13 = "";
    $checked4 = "checked";
}
else{ 
    $gameti = null;
    $class13 = "errors";
    $checked4 = "";
}

if (isset($_POST["morte_fetale_ovulazione"]) && $_POST["morte_fetale_ovulazione"] == 'Y') {
    $checked5 = "checked"; 
    $ovulazione = $_POST["morte_fetale_ovulazione"];
} else {
    $ovulazione = null; 
    $class14 = "errors";  
}

if((isset($_POST["morte_fetale_omologa"]))&&($_POST["morte_fetale_omologa"] == 'Y')){
    $omologa = $_POST["morte_fetale_omologa"];
    $class15 = "";
    $checked6 = "checked";
}
else{ 
    $omologa = null;
    $class15 = "errors";
    $checked6 = "";
}

if ((isset($_POST["morte_fetale_eterologa"])) && ($_POST["morte_fetale_eterologa"] == 'maschile' || $_POST["morte_fetale_eterologa"] == 'femminile')) {
    $eterologa = $_POST["morte_fetale_eterologa"];
    $class16 = "";
}
else{ 
    $eterologa = null;
    $class16 = "errors";
}

if((isset($_POST["morte_fetale_embriodonazione"]))&&($_POST["morte_fetale_embriodonazione"] == 'Y')){
    $embriodonazione = $_POST["morte_fetale_embriodonazione"];
    $class17 = "";
    $checked8 = "checked";
}
else{ 
    $embriodonazione = null;
    $class17 = "errors";
    $checked8 = "";
}

if(isset($_POST["morte_fetale_altre"])){
    $altre = $_POST["morte_fetale_altre"];
    $class19 = "";
}
else {
    $altre = null;
    $class19 = "errors";
}


if((isset($_POST["morte_fetale_fresco"]))&&($_POST["morte_fetale_fresco"] == 'Y')){
    $fresco = $_POST["morte_fetale_fresco"];
    $class20 = "";
    $checked9 = "checked";
}
else{ 
    $fresco = null;
    $class20 = "errors";
    $checked9 = "";
}


if((isset($_POST["morte_fetale_crioconservazione"]))&&($_POST["morte_fetale_crioconservazione"] == 'Y')){
    $crioconservazione = $_POST["morte_fetale_crioconservazione"];
    $class21 = "";
    $checked10 = "checked";
}
else{ 
    $crioconservazione = null;
    $class21 = "errors";
    $checked10 = "";
}

if((isset($_POST["morte_fetale_preimpianto"]))&&($_POST["morte_fetale_preimpianto"] == 'Y')){
    $preimpianto = $_POST["morte_fetale_preimpianto"];
    $class22 = "";
    $checked11 = "checked";
}
else{ 
    $preimpianto = null;
    $class22 = "errors";
    $checked11 = "";
}

//numero tentativi
if(isset($_POST["morte_fetale_tentativiFecondazione"])){
    $tentativiFecondazione = $_POST["morte_fetale_tentativiFecondazione"];
    $class23 = "";
}
else {
    $tentativiFecondazione = null;
    $class23 = "errors23";
}

if(isset($_POST["morte_fetale_dataCaso1"])){
    list($year, $month, $day) = explode("-", $_POST['morte_fetale_dataCaso1']);
    $dataCaso1 = "$day-$month-$year";
    $class24 = "";
}
else {
    $dataCaso1 = null;
    $class24 = "errors";
}

if(isset($_POST["morte_fetale_dataCaso2"])){
    list($year, $month, $day) = explode("-", $_POST['morte_fetale_dataCaso2']);
    $dataCaso2 = "$day-$month-$year";
    $class25 = "";
}
else {
    $dataCaso2 = null;
    $class25= "errors";
}

if(isset($_POST["morte_fetale_dataCaso3"])){
    list($year, $month, $day) = explode("-", $_POST['morte_fetale_dataCaso3']);
    $dataCaso3 = "$day-$month-$year";
    $class26 = "";
}
else {
    $dataCaso3 = null;
    $class26 = "errors";
}

if(isset($_POST["morte_fetale_dataCaso4"])){
    list($year, $month, $day) = explode("-", $_POST['morte_fetale_dataCaso4']);
    $dataCaso4 = "$day-$month-$year";
    $class27 = "";
}
else {
    $dataCaso4 = null;
    $class28 = "errors";
}

if(isset($_POST["morte_fetale_dataCaso5"])){
    list($year, $month, $day) = explode("-", $_POST['morte_fetale_dataCaso5']);
    $dataCaso5 = "$day-$month-$year";
    $class29= "";
}
else {
    $dataCaso4 = null;
    $class29= "errors";
}



if(isset($_POST["morte_fetale_descriviCaso1"])){
    $descriviCaso1 = $_POST["morte_fetale_descriviCaso1"];
    $class30 = "";
}
else {
    $descriviCaso1 = null;
    $class30 = "errors26";
}

if(isset($_POST["morte_fetale_descriviCaso2"])){
    $descriviCaso2 = $_POST["morte_fetale_descriviCaso2"];
    $class31 = "";
}
else {
    $descriviCaso2 = null;
    $class32 = "errors26";
}

if(isset($_POST["morte_fetale_descriviCaso3"])){
    $descriviCaso3 = $_POST["morte_fetale_descriviCaso3"];
    $class33 = "";
}
else {
    $descriviCaso3 = null;
    $class33 = "errors33";
}

if(isset($_POST["morte_fetale_descriviCaso4"])){
    $descriviCaso4 = $_POST["morte_fetale_descriviCaso4"];
    $class34 = "";
}
else {
    $descriviCaso4 = null;
    $class34 = "errors34";
}

if(isset($_POST["morte_fetale_descriviCaso5"])){
    $descriviCaso5 = $_POST["morte_fetale_descriviCaso5"];
    $class35 = "";
}
else {
    $descriviCaso5 = null;
    $class35 = "errors35";
}




?>
<script>
   $( document ).ready(function() {
    if (('<?php echo $nata; ?>' == '') || ('<?php echo $morte; ?>' == '') || ('<?php echo $_SESSION["stato"]; ?>' == 'chiusa') || ('<?php echo $_SESSION["stato"]; ?>' == 'chiusa_usr')){
        document.getElementById("dataU").disabled = true;
        document.getElementById("dataA").disabled = true;
        document.getElementById("dataE").disabled = true;
    }
    else {
        document.getElementById("dataU").disabled = false;
        document.getElementById("dataA").disabled = false;
        document.getElementById("dataE").disabled = false;
    }
   });

   $( document ).ready(function() {
    if (('<?php echo $tentativiFecondazione; ?>' == 'mancante') || ('<?php echo $tentativiFecondazione; ?>' == 'nessuno') || ('<?php echo $tentativiFecondazione; ?>' == '')){
    }
    else{
        i=(<?php echo $tentativiFecondazione; ?>+0)*3;
        for (j=1; j<=i; j++)
        document.getElementById('a'+j).style.display='inline-block';return;
    }
});
     
   $(function() {
      $('#numVisite').keypad();    
   });
  
$(function() {
   $( "#dataU" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-70:+0",
        changeMonth: true,
        changeYear: true, 
        minDate: "<?php echo $nata; ?>",
        maxDate: "<?php echo $morte; ?>" //new Date(2015, 10 - 10, 29) //"+0D"
    });
 });
$(function() {
   $( "#dataA" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-70:+0",
        changeMonth: true,
        changeYear: true,
        minDate: "<?php echo $nata; ?>", //manca
        maxDate: "<?php echo $morte; ?>" //new Date(2015, 10 - 10, 29) //"+0D"
    });
 });
$(function() {
   $( "#dataE" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-70:+0",
        changeMonth: true,
        changeYear: true,
        minDate: "<?php echo $nata; ?>", //manca
        maxDate: "<?php echo $morte; ?>" //new Date(2015, 10 - 10, 29) //"+0D"
    });
 });
 $(function() {
    $( "#dataO" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-70:+0",
        changeMonth: true,
        changeYear: true,
        // Se ci sono restrizioni di date, applicale qui, altrimenti omettilo
    });
});



 $(function() {
   $( "#dataF" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-60:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D", //new Date(2015, 10 - 10, 29) //"+0D"
        onSelect: function(selectedDate) {
            console.log(selectedDate);
            var dd = selectedDate.split('-');
            var daN = dd[2] + '-' + dd[1] + '-' + dd[0];
            console.log(daN);
            
        }
    });
});

$(function() {
  $( "#dataCaso1" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-30:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D" //new Date(2015, 10 - 10, 29) //"+0D"
    });
});
$(function() {
  $( "#dataCaso2" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-30:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D" //new Date(2015, 10 - 10, 29) //"+0D"
    });
});
$(function() {
  $( "#dataCaso3" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-30:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D" //new Date(2015, 10 - 10, 29) //"+0D"
    });
});
$(function() {
  $( "#dataCaso4" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-30:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D" //new Date(2015, 10 - 10, 29) //"+0D"
    });
});
$(function() {
  $( "#dataCaso5" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-30:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D" //new Date(2015, 10 - 10, 29) //"+0D"
    });
});

$(function() {
    $( "#slct1" ).selectmenu({
         change: function(event, ui){
             var select = document.getElementById('slct1');
                var value = select.value;
                if ((value == 'mancante') || (value == 'nessuno')) {
                    for (i=1; i<=15; i++){
                        document.getElementById("a"+i).style.display = 'none';
                        
                    }
                }
                else {
                    for (x=1; x<=15; x++){
                        document.getElementById("a"+x).style.display = 'none'; 
                    }
                    i=value*3;
                    for (j=1; j<=i; j++)
                    document.getElementById('a'+j).style.display='inline-block';
                       return;
    
                }
         }
    });
    $("#slct1").val('<?php echo $tentativiFecondazione; ?>')
    $('#slct1').selectmenu('refresh', true);
});
 


$(document).ready(function() {
    // Imposta il valore del select al valore PHP
    $("#slct3").val('<?php echo $fecondazione; ?>');

    // Gestisci il cambiamento del valore
    $("#slct3").selectmenu({
        change: function(event, ui){
            var select = document.getElementById('slct3');
            var value = select.value;
            if (value !== 'si') {  // Controlla se il valore è diverso da 'si'
                for (i = 1; i <= 20; i++) {
                    document.getElementById('d' + i).style.display = 'none';
                }
                return;
            } else {
                for (j = 1; j <= 20; j++) {
                    document.getElementById('d' + j).style.display = 'inline-block';
                    document.getElementById('d' + j).style.verticalAlign = 'top';
                }
                return;
            }
        }
    });

    // Esegui una verifica iniziale per mostrare o nascondere i div in base al valore
    var initialValue = $("#slct3").val();
    if (initialValue !== 'si') {  // Se il valore è diverso da 'si' (incluso 'mancante')
        for (i = 1; i <= 20; i++) {
            document.getElementById('d' + i).style.display = 'none';
        }
    } else {
        for (j = 1; j <= 20; j++) {
            document.getElementById('d' + j).style.display = 'inline-block';
            document.getElementById('d' + j).style.verticalAlign = 'top';
        }
    }
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


<br/><br/>
<form id="adminform" name="adminform" action="db/info_morte_fetale_sendf.php" method="post">
    <div class="col-2">
        <label <?php echo "class=".$class1; ?>>
            Data ultima mestruazione * <sup>1</sup><br/>
            <input id="dataU" name="dataU" tabindex="12" value="<?php echo $dataU; ?>" <?php echo $dis; ?>>
         
        </label>
    </div>
    <div class="col-2">
        <label <?php echo "class=".$class2; ?>>
            Data presunta parto anamnestico * <sup>1</sup><br/>
            <input id="dataA" name="dataA" tabindex="12" value="<?php echo $dataA; ?>" <?php echo $dis; ?>>
        </label>
    </div>
    <div class="col-2">
        <label <?php echo "class=".$class3; ?>>
            Data presunta parto ecografico * <sup>1</sup><br/>
            <input id="dataE" name="dataE" tabindex="12" value="<?php echo $dataE; ?>" <?php echo $dis; ?>>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 9px;" <?php echo "class=".$class4; ?>>
            N° visite di controllo in gravidanza * <br/>
            <input placeholder="" id="numVisite" name="numVisite" tabindex="12" style="width: 100%;" readonly value="<?php echo $num; ?>" <?php echo $dis; ?>>
        </label>
    </div>
    <div class="col-2">
    <label>
        Data ultima visita ostetrica <br/>
        <input id="dataO" name="dataO" tabindex="12" value="<?php echo $dataO; ?>" <?php echo $dis; ?>>
    </label>
</div>

    <div class="col-2">
        <label style="padding-top: 6px;">
            Nome e indirizzo del ginecologo/a curante <br/>
            <?php
                echo "<input name=\"ginecologo\" $dis tabindex=\"13\" value=\"".$ginecologo."\">";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 6px;">
        Nome e indirizzo dell'ostetrica di riferimento <br/>
            <?php
                echo "<input name=\"ostetrica\" $dis tabindex=\"14\" value=\"".$ostetrica."\">";
            ?>
        </label>
    </div>
    <br>
    <div class="col-3" style="width:40%;">
        <label style="padding-top:7px;" >
            La Fecondazione è stata medicalmente assistita? <br/>
            <select tabindex="15" id="slct3" name="fecondazione" style="width:50%;" <?php echo $dis ; ?>>
            <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>
                <option value=si>Si</option>
                <option value=no>No</option>
            </select>
        </label>
    </div>
    <div class="col-4" id="d1" style="display:none;">
    <label>
        Eseguito in data:
        <?php
                echo "<input type=\"text\" id=\"dataF\" $dis name=\"dataF\" value=\"".$dataF."\" readonly>";
            ?>
    </label>
    </div>
    <div class="col-3" id="d2" style="display:none;">
        <label <?php echo "class=".$class4 ?>>
            Presso quale struttura? *<br/>
            <?php
                echo "<input type=\"text\" $dis id=\"struttura\" name=\"struttura\" value=\"".$struttura."\"";
            ?>
        </label>
    </div> 
    
    <div class="col-3" id="d3" style="display:none;">
    <label>
    Inseminazione endouterina (IUI)
        <?php
           $endouterina = !empty($endouterina) ? $endouterina : 'N';
           $checked = ($endouterina == 'Y') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"endouterina\" $dis name=\"endouterina\" value=\"Y\" $checked>";
        ?>
    </label>
</div>
    <div class="col-3" id="d4" style="display:none;">
        <label 
        >
            Fecondazione in vitro con transfer embrionale (FIVET)
            <?php
           $vitro = !empty($vitro) ? $vitro : 'N';
           $checked = ($vitro == 'Y') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"vitro\" $dis name=\"vitro\" value=\"Y\" $checked>";
        ?>
        </label>
        </div>
    <div class="col-3" id="d5" style="display:none;">
        <label 
        >
            Iniezione Intracitoplasmatica dello Spermatozoo (ICSI)
            <?php
           $intracitoplasmatica = !empty($intracitoplasmatica) ? $intracitoplasmatica : 'N';
           $checked = ($endouterina == 'Y') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"intracitoplasmatica\" $dis name=\"intracitoplasmatica\" value=\"Y\" $checked>";
        ?>
        </label>
        </div>
    <div class="col-3" id="d6" style="display:none;">
        <label 
        >
            Trasferimento Intrafallopiano di Gameti (GIFT)
            <?php
           $gameti = !empty($gameti) ? $gameti : 'N';
           $checked = ($gameti == 'Y') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"gameti\" $dis name=\"gameti\" value=\"Y\" $checked>";
        ?>
        </label>
        </div>
    
    <div class="col-3" id="d8" style="display:none;">
    <label>
        Ovulazione indotta
        <?php
           $ovulazione = !empty($ovulazione) ? $ovulazione : 'N';
           $checked = ($ovulazione == 'Y') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"ovulazione\" $dis name=\"ovulazione\" value=\"Y\" $checked>";
        ?>
    </label>
</div>
<div class="col-3" id="d9" style="display:none;">
    <label>
        Omologa
        <?php
           $omologa = !empty($omologa) ? $omologa : 'N';
           $checked = ($omologa == 'Y') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"omologa\" $dis name=\"omologa\" value=\"Y\" $checked>";
        ?>
    </label>
</div>



     <div class="col-3" id="d10" style="display:none;">
        <label>
            Eterologa Maschile
            <?php
           $eterologa = !empty($eterologa) ? $eterologa : 'N';
           $checked = ($eterologa == 'maschile') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"eterologa\" $dis name=\"eterologa\" value=\"maschile\" $checked>";           
           
        ?>
        </label>
    </div>
         <div class="col-3" id="d11" style="display:none;">
        <label>
         Eterologa Femminile
            <?php
           $eterologa = !empty($eterologa) ? $eterologa : 'N';
           $checked = ($eterologa == 'femminile') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"eterologa\" $dis name=\"eterologa\" value=\"femminile\" $checked>";
        ?>
        </label>    
</div>
<div class="col-3" id="d12" style="display:none;">
    <label>
        Embriodonazione
        <?php
           $omologa = !empty($embriodonazione) ? $embriodonazione : 'N';
           $checked = ($embriodonazione == 'Y') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"embriodonazione\" $dis name=\"embriodonazione\" value=\"Y\" $checked>";
        ?>
    </label>
</div>
<div class="col-3" id="d13" style="display:none;">
    <label>
        A Fresco
        <?php
           $omologa = !empty($fresco) ? $fresco : 'N';
           $checked = ($fresco == 'Y') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"fresco\" $dis name=\"fresco\" value=\"Y\" $checked>";
        ?>
    </label>
</div>
<div class="col-3" id="d14" style="display:none;">
    <label>
        Crioconservazione
        <?php
           $crioconservazione = !empty($crioconservazione) ? $crioconservazione : 'N';
           $checked = ($crioconservazione == 'Y') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"crioconservazione\" $dis name=\"crioconservazione\" value=\"Y\" $checked>";
        ?>
    </label>
</div>
<div class="col-3" id="d15" style="display:none;">
    <label>
        Test Preimpianto
        <?php
           $preimpianto = !empty($preimpianto) ? $preimpianto : 'N';
           $checked = ($preimpianto == 'Y') ? 'checked' : '';
           echo "<input type=\"checkbox\" id=\"preimpianto\" $dis name=\"preimpianto\" value=\"Y\" $checked>";
        ?>
    </label>
</div>
<div class="col-1" id="d7" style="display:none;">
        <label style="padding-top: 6px;">
            Altre <br/>
            <?php
                echo "<input name=\"altre\" $dis tabindex=\"13\" value=\"".$altre."\">";
            ?>
        </label>
    </div>

     <div class="col-1">
        <label <?php echo "class=".$class1 ?>>
            Numero Tentativi di fecondazione assistita <br/>
            <select tabindex="13" id="slct1" name="tentativiFecondazione" style="width:50%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option> 
                <option value="mancante">Dato Mancante</option>
                <option value="nessuno">Nessuno</option>
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
            </select>
        </label>
    </div>
    <div class="col-3" id="a1" style="display:none;">
    <label>
        &nbsp; &nbsp; Tentativo #1
    </label>
    </div>
    <div class="col-3" id="a2" style="display:none;">          
    <label style="padding-top: 6px;" <?php echo "class=".$class30; ?>>
            Data<br/>
            <?php
                echo "<input type=\"text\" id=\"dataCaso1\" $dis name=\"dataCaso1\" value=\"".$dataCaso1."\" readonly>";
            ?>
        </label>

    </div>
    <div class="col-3" id="a3" style="display:none;">
         <label>
        Descrivere
        <textarea name="descriviCaso1" style="height:40px;" <?php echo $dis; ?>><?php echo $descriviCaso1; ?></textarea>
    </label>
        
    </div>
    
    <div class="col-3" id="a4" style="display:none;">
    <label>
        &nbsp; &nbsp; Tentativo #2
    </label>
    </div>
    <div class="col-3" id="a5" style="display:none;">
         <label style="padding-top: 6px;" <?php echo "class=".$class3; ?>>
            Data<br/>
            <?php
                echo "<input type=\"text\" id=\"dataCaso2\" $dis name=\"dataCaso2\" value=\"".$dataCaso2."\" readonly>";
            ?>
        </label>
      
    </div>
    <div class="col-3" id="a6" style="display:none;">
           <label>
        Descrivere
        <textarea name="descriviCaso2" style="height:40px;" <?php echo $dis; ?>><?php echo $descriviCaso2; ?></textarea>
    </label>
        
    </div>
    
    <div class="col-3" id="a7" style="display:none;">
    <label>
        &nbsp; &nbsp; Tentativo #3
    </label>
    </div>
    <div class="col-3" id="a8" style="display:none;">
        <label style="padding-top: 6px;" <?php echo "class=".$class3; ?>>
            Data<br/>
            <?php
                echo "<input type=\"text\" id=\"dataCaso3\" $dis name=\"dataCaso3\" value=\"".$dataCaso3."\" readonly>";
            ?>
        </label>
      
    </div>
    <div class="col-3" id="a9" style="display:none;">
          <label>
        Descrivere
        <textarea name="descriviCaso3" style="height:40px;" <?php echo $dis; ?>><?php echo $descriviCaso3; ?></textarea>
    </label>
      
    </div>
    
    <div class="col-3" id="a10" style="display:none;">
    <label>
        &nbsp; &nbsp; Tentativo #4
    </label>
    </div>
    <div class="col-3" id="a11" style="display:none;">
        <label style="padding-top: 6px;" <?php echo "class=".$class3; ?>>
            Data<br/>
            <?php
                echo "<input type=\"text\" id=\"dataCaso4\" $dis name=\"dataCaso4\" value=\"".$dataCaso4."\" readonly>";
            ?>
        </label>
      
    </div>
    <div class="col-3" id="a12" style="display:none;">
          <label>
        Descrivere
        <textarea name="descriviCaso4" style="height:40px;" <?php echo $dis; ?>><?php echo $descriviCaso4; ?></textarea>
    </label>
       
    </div>
    
    <div class="col-3" id="a13" style="display:none;">
        
    <label>
        &nbsp; &nbsp; Tentativo #5
    </label>
    </div>
    <div class="col-3" id="a14" style="display:none;">
        <label style="padding-top: 6px;" <?php echo "class=".$class3; ?>>
            Data<br/>
            <?php
                echo "<input type=\"text\" id=\"dataCaso5\" $dis name=\"dataCaso5\" value=\"".$dataCaso5."\" readonly>";
            ?>
        </label>
     
    </div>
    <div class="col-3" id="a15" style="display:none;">
          <label>
        Descrivere
        <textarea name="descriviCaso5" style="height:40px;" <?php echo $dis; ?>><?php echo $descriviCaso5; ?></textarea>
    </label>
       
    </div>





    <div class="col-9">
        <label style="font-size: 10px; color: #e80d0d;">
               * Campi obbligatori. <br/>
               <sup>1</sup> Inserire prima la data di nascita in Madre > Dati personali. 
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
    </div></form>