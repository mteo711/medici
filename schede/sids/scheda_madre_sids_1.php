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
require_once("./db/dati_pers_loadM.php");
loadPage();
require_once("./db/loadtab_madre.php");
tab_madre();

if(isset($_POST["dati_pers_cognome"])){
    $cognome = $_POST["dati_pers_cognome"];
    $class1 = "";
}
else {
    $cognome = null;
    $class1 = "errors";
}
if(isset($_POST["dati_pers_nome"])){
    $nome = $_POST["dati_pers_nome"];
    $class2 = "";
}
else {
    $nome = null;
    $class2 = "errors";
}
if(isset($_POST["dati_pers_dataN"])){
    list($year, $month, $day) = explode("-", $_POST['dati_pers_dataN']);
    $dataN = "$day-$month-$year";
    $class3 = "";
}
else {
    $dataN = null;
    $class3 = "errors";
}
if(isset($_POST["dati_pers_luogoN"])){
    $luogoN = $_POST["dati_pers_luogoN"];
    $class4 = "";
}
else {
    $luogoN = null;
    $class4 = "errors";
}
if(isset($_POST["dati_pers_eta"])){
    $eta = $_POST["dati_pers_eta"];
    $class5 = "";
}
else {
    $eta = null;
    $class5 = "errors";
}
if(isset($_POST["dati_pers_via"])){
    $via = $_POST["dati_pers_via"];
    $class6 = "";
}
else {
    $via = null;
    $class6 = "errors";
}
if(isset($_POST["dati_pers_cap"])){
    $cap = $_POST["dati_pers_cap"];
    $class7 = "";
}
else {
    $cap = null;
    $class7 = "errors";
}
if(isset($_POST["dati_pers_comune"])){
    $comune = $_POST["dati_pers_comune"];
    $class8 = "";
}
else {
    $comune = null;
    $class8 = "errors";
}
if(isset($_POST["dati_pers_prov"])){
    $prov = $_POST["dati_pers_prov"];
    $class9 = "";
}
else {
    $prov = null;
    $class9 = "errors";
}
if(isset($_POST["dati_pers_etnia"])){
    $etnia = $_POST["dati_pers_etnia"];
    $class10 = "";
}
else {
    $etnia = null;
    $class10 = "errors";
}
if(isset($_POST["dati_pers_specE"])){
    $specE = $_POST["dati_pers_specE"];
    $class11 = "";
}
else {
    $specE = null;
    $class11 = "errors";
}
if(isset($_POST["dati_pers_professione"])){
    $prof = $_POST["dati_pers_professione"];
    $class12 = "";
}
else {
    $prof = null;
    $class12 = "errors";
}
//inserimento Cell e Codfiscale
if(isset($_POST["dati_pers_cell"])){
    $cell = $_POST["dati_pers_cell"];
    $class13 = "";
}
else {
    $cell = null;
    $class13 = "errors";
}

if(isset($_POST["dati_pers_codfiscale"])){
    $codfiscale = $_POST["dati_pers_codfiscale"];
    $class14 = "";
}
else {
    $codfiscale = null;
    $class14 = "errors";
}
//Inserimento Rischi, Titolo di studio, Stato civile, Altezza, Peso

if(isset($_POST["dati_pers_rischi"])){
    $rischi = $_POST["dati_pers_rischi"];
    $class15 = "";
}
else {
    $rischi = null;
    $class15 = "errors";
}

if(isset($_POST["dati_pers_titolodistudio"])){
    $titolodistudio = $_POST["dati_pers_titolodistudio"];
    $class16 = "";
}
else {
    $titolodistudio = null;
    $class16 = "errors";
}

if(isset($_POST["dati_pers_statocivile"])){
    $statocivile = $_POST["dati_pers_statocivile"];
    $class17 = "";
}
else {
    $statocivile = null;
    $class17 = "errors";
}

if(isset($_POST["dati_pers_specM"])){
    list($year, $month, $day) = explode("-", $_POST['dati_pers_specM']);
    $specM = "$day-$month-$year";
    $class20 = "";
}
else {
    $specM = null;
    $class20 = "errors";
}

if(isset($_POST["dati_pers_altezza"])){
    $altezza = $_POST["dati_pers_altezza"];
    $class18 = "";
}
else {
    $altezza = null;
    $class18 = "errors";
}

if(isset($_POST["dati_pers_peso"])){
    $peso = $_POST["dati_pers_peso"];
    $class19 = "";
}
else {
    $peso = null;
    $class19 = "errors";
}

if(isset($_POST["dati_pers_numVisite"])){
    $numVisite = $_POST["dati_pers_numVisite"];
    $class21 = "";
}
else {
    $numVisite = null;
    $class21 = "errors";
}

//dati fecondazione 
if(isset($_POST["dati_pers_fecondazione"])){
    $fecondazione = $_POST["dati_pers_fecondazione"];
    $class18 = "";
}
else {
    $fecondazione = null;
    $class18 = "errors";
}

if(isset($_POST["dati_pers_dataF"])){
    list($year, $month, $day) = explode("-", $_POST['dati_pers_dataF']);
    $dataF = "$day-$month-$year";
    $class23 = "";
}
else {
    $dataF = null;
    $class23 = "errors";
}


if(isset($_POST["dati_pers_struttura"])){
    $struttura = $_POST["dati_pers_struttura"];
}
else {
    $struttura = null;
}

if((isset($_POST["dati_pers_endouterina"]))&&($_POST["dati_pers_endouterina"] == 'Y')){
    $endouterina = $_POST["dati_pers_endouterina"];
    $checked1 = "checked";
}
else{ 
    $endouterina = null;
    $checked1 = "";
}

if((isset($_POST["dati_pers_vitro"]))&&($_POST["dati_pers_vitro"] == 'Y')){
    $vitro = $_POST["dati_pers_vitro"];
    $class11 = "";
    $checked2 = "checked";
}
else{ 
    $vitro = null;
    $class11 = "errors";
    $checked2 = "";
}

if((isset($_POST["dati_pers_intracitoplasmatica"]))&&($_POST["dati_pers_intracitoplasmatica"] == 'Y')){
    $intracitoplasmatica = $_POST["dati_pers_intracitoplasmatica"];
    $checked3 = "checked";
}
else{ 
    $intracitoplasmatica = null;
    $checked3 = "";
}

if((isset($_POST["dati_pers_gameti"]))&&($_POST["dati_pers_gameti"] == 'Y')){
    $gameti = $_POST["dati_pers_gameti"];
    $class13 = "";
    $checked4 = "checked";
}
else{ 
    $gameti = null;
    $class13 = "errors";
    $checked4 = "";
}

if (isset($_POST["dati_pers_ovulazione"]) && $_POST["dati_pers_ovulazione"] == 'Y') {
    $checked5 = "checked";  // Se il checkbox è selezionato, aggiungi l'attributo checked
    $ovulazione = $_POST["dati_pers_ovulazione"];
} else {
    $ovulazione = null;  // Se non è selezionato, lascia il valore come null
    $class14 = "errors";  // Aggiungi eventuale classe di errore
}

if((isset($_POST["dati_pers_omologa"]))&&($_POST["dati_pers_omologa"] == 'Y')){
    $omologa = $_POST["dati_pers_omologa"];
    $class15 = "";
    $checked6 = "checked";
}
else{ 
    $omologa = null;
    $class15 = "errors";
    $checked6 = "";
}

if ((isset($_POST["dati_pers_eterologa"])) && ($_POST["dati_pers_eterologa"] == 'maschile' || $_POST["dati_pers_eterologa"] == 'femminile')) {
    $eterologa = $_POST["dati_pers_eterologa"];
    $class16 = "";
}
else{ 
    $eterologa = null;
    $class16 = "errors";
}

if((isset($_POST["dati_pers_embriodonazione"]))&&($_POST["dati_pers_embriodonazione"] == 'Y')){
    $embriodonazione = $_POST["dati_pers_embriodonazione"];
    $class17 = "";
    $checked8 = "checked";
}
else{ 
    $embriodonazione = null;
    $class17 = "errors";
    $checked8 = "";
}

if(isset($_POST["dati_pers_altre"])){
    $altre = $_POST["dati_pers_altre"];
    $class19 = "";
}
else {
    $altre = null;
    $class19 = "errors";
}


if((isset($_POST["dati_pers_fresco"]))&&($_POST["dati_pers_fresco"] == 'Y')){
    $fresco = $_POST["dati_pers_fresco"];
    $class20 = "";
    $checked9 = "checked";
}
else{ 
    $fresco = null;
    $class20 = "errors";
    $checked9 = "";
}


if((isset($_POST["dati_pers_crioconservazione"]))&&($_POST["dati_pers_crioconservazione"] == 'Y')){
    $crioconservazione = $_POST["dati_pers_crioconservazione"];
    $class21 = "";
    $checked10 = "checked";
}
else{ 
    $crioconservazione = null;
    $class21 = "errors";
    $checked10 = "";
}

if((isset($_POST["dati_pers_preimpianto"]))&&($_POST["dati_pers_preimpianto"] == 'Y')){
    $preimpianto = $_POST["dati_pers_preimpianto"];
    $class22 = "";
    $checked11 = "checked";
}
else{ 
    $preimpianto = null;
    $class22 = "errors";
    $checked11 = "";
}


//TENTATIVI 
if(isset($_POST["dati_pers_tentativiFecondazione"])){
    $tentativiFecondazione = $_POST["dati_pers_tentativiFecondazione"];
    $class23 = "";
}
else {
    $tentativiFecondazione = null;
    $class23 = "errors23";
}

if(isset($_POST["dati_pers_dataCaso1"])){
    list($year, $month, $day) = explode("-", $_POST['dati_pers_dataCaso1']);
    $dataCaso1 = "$day-$month-$year";
    $class24 = "";
}
else {
    $dataCaso1 = null;
    $class24 = "errors";
}

if(isset($_POST["dati_pers_dataCaso2"])){
    list($year, $month, $day) = explode("-", $_POST['dati_pers_dataCaso2']);
    $dataCaso2 = "$day-$month-$year";
    $class25 = "";
}
else {
    $dataCaso2 = null;
    $class25= "errors";
}

if(isset($_POST["dati_pers_dataCaso3"])){
    list($year, $month, $day) = explode("-", $_POST['dati_pers_dataCaso3']);
    $dataCaso3 = "$day-$month-$year";
    $class26 = "";
}
else {
    $dataCaso3 = null;
    $class26 = "errors";
}

if(isset($_POST["dati_pers_dataCaso4"])){
    list($year, $month, $day) = explode("-", $_POST['dati_pers_dataCaso4']);
    $dataCaso4 = "$day-$month-$year";
    $class27 = "";
}
else {
    $dataCaso4 = null;
    $class28 = "errors";
}

if(isset($_POST["dati_pers_dataCaso5"])){
    list($year, $month, $day) = explode("-", $_POST['dati_pers_dataCaso5']);
    $dataCaso5 = "$day-$month-$year";
    $class29= "";
}
else {
    $dataCaso4 = null;
    $class29= "errors";
}



if(isset($_POST["dati_pers_descriviCaso1"])){
    $descriviCaso1 = $_POST["dati_pers_descriviCaso1"];
    $class30 = "";
}
else {
    $descriviCaso1 = null;
    $class30 = "errors26";
}

if(isset($_POST["dati_pers_descriviCaso2"])){
    $descriviCaso2 = $_POST["dati_pers_descriviCaso2"];
    $class31 = "";
}
else {
    $descriviCaso2 = null;
    $class32 = "errors26";
}

if(isset($_POST["dati_pers_descriviCaso3"])){
    $descriviCaso3 = $_POST["dati_pers_descriviCaso3"];
    $class33 = "";
}
else {
    $descriviCaso3 = null;
    $class33 = "errors33";
}

if(isset($_POST["dati_pers_descriviCaso4"])){
    $descriviCaso4 = $_POST["dati_pers_descriviCaso4"];
    $class34 = "";
}
else {
    $descriviCaso4 = null;
    $class34 = "errors34";
}

if(isset($_POST["dati_pers_descriviCaso5"])){
    $descriviCaso5 = $_POST["dati_pers_descriviCaso5"];
    $class35 = "";
}
else {
    $descriviCaso5 = null;
    $class35 = "errors35";
}

//ANAMNESI FAMILIARE

if(isset($_POST["dati_pers_anni_nonnamaterna"])){
    $anni_nonnamaterna = $_POST["dati_pers_anni_nonnamaterna"];
    $class23 = "";
}
else {
    $anni_nonnamaterna = null;
    $class23 = "errors23";
}

if(isset($_POST["dati_pers_anni_nonnomaterno"])){
    $anni_nonnomaterno = $_POST["dati_pers_anni_nonnomaterno"];
    $class24 = "";
}
else {
    $anni_nonnomaterno = null;
    $class24 = "errors24";
}

if(isset($_POST["dati_pers_patologie_nonnamaterna"])){
    $patologie_nonnamaterna = $_POST["dati_pers_patologie_nonnamaterna"];
    $class25 = "";
}
else {
    $patologie_nonnamaterna = null;
    $class25 = "errors25";
}

if(isset($_POST["dati_pers_patologie_nonnomaterno"])){
    $patologie_nonnomaterno = $_POST["dati_pers_patologie_nonnomaterno"];
    $class26 = "";
}
else {
    $patologie_nonnomaterno = null;
    $class26 = "errors26";
}

if(isset($_POST["dati_pers_fratelli_sorelle"])){
    $fratelli_sorelle = $_POST["dati_pers_fratelli_sorelle"];
    $class27 = "";
}
else {
    $fratelli_sorelle = null;
    $class27 = "errors27";
}

if(isset($_POST["dati_pers_patologie_famiglia"])){
    $patologie_famiglia = $_POST["dati_pers_patologie_famiglia"];
    $class28 = "";
}
else {
    $patologie_famiglia = null;
    $class28 = "errors28";
}

if(isset($_POST["dati_pers_altricasi"])){
    $altricasi = $_POST["dati_pers_altricasi"];
    $class29 = "";
}
else {
    $altricasi = null;
    $class29 = "errors29";
}

if(isset($_POST["dati_pers_altri_casi"])){
    $altri_casi = $_POST["dati_pers_altri_casi"];
    $class30 = "";
}
else {
    $altri_casi = null;
    $class30 = "errors30";
}

if(isset($_POST["dati_pers_nonnaviva"])){
    $nonnaviva = $_POST["dati_pers_nonnaviva"];
    $class31 = "";
}
else {
    $nonnaviva = null;
    $class31 = "errors31";
}

if(isset($_POST["dati_pers_nonnovivo"])){
    $nonnovivo = $_POST["dati_pers_nonnovivo"];
    $class32 = "";
}
else {
    $nonnovivo = null;
    $class32 = "errors32";
}

if (isset($_POST["dati_pers_morte_nonnamaterna"])) {
    $mortenonnamaterna = $_POST["dati_pers_morte_nonnamaterna"];
    $class33 = "";
} else {
    $mortenonnamaterna = null;
    $class33 = "errors33";
}


if(isset($_POST["dati_pers_morte_nonnomaterno"])){
    $morte_nonnomaterno = $_POST["dati_pers_morte_nonnomaterno"];
    $class34 = "";
}
else {
    $morte_nonnomaterno = null;
    $class34 = "errors34";
}



?>
<script>
$( document ).ready(function() {
    if ('<?php echo $etnia; ?>' == 'altra'){
    document.getElementById('spec').style.visibility = 'visible';
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
   $( "#dataN" ).datepicker({
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
            dob = new Date(daN);
            var today = new Date();
            var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
            $("#eta").val(age);
       }
    });
 });

$(function() {
  $( "#dataF" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-30:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D" //new Date(2015, 10 - 10, 29) //"+0D"
    });
});
$(function() {
   $( "#specM" ).datepicker({
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
        maxDate: "+0D" 
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
      $('#cap').keypad({
          onClose: function(value, inst) { 
            if(value.toString().length != 5){
                alert('Attenzione! Cap sbagliato.'); 
            }
      }
      });   
  }); 

 $(function() {
    // Applica keypad all'input anni_nonnamaterna
    $('#anni_nonnamaterna').keypad();

    // Applica keypad a anni_nonnomaterno solo se esiste nell'HTML
    $('#anni_nonnomaterno').keypad();
});
  
  


  $(function() {
      $( "#slct" ).selectmenu({
           change: function(event, ui){
               var select = document.getElementById('slct');
                  var value = select.value;
                  if (value == 'altra') {
                     document.getElementById('spec').style.visibility='visible'; return;
                  }
                     document.getElementById('spec').style.visibility='hidden'; return;
           }
      })
      .selectmenu( "menuWidget")
      .addClass( "overflow" );;
      $("#slct").val('<?php echo $etnia; ?>')
      $('#slct').selectmenu('refresh', true);

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

  $(function() {
      $('#numVisite').keypad();    
   });

   
   
  

  $(function() {
    $("#slct2").selectmenu({
        change: function(event, ui) {
            gestisciSpec2(ui.item.value);
        }
    }).selectmenu("menuWidget").addClass("overflow");

    var statoIniziale = '<?php echo $statocivile; ?>';
    $("#slct2").val(statoIniziale);
    $('#slct2').selectmenu('refresh');

    gestisciSpec2(statoIniziale);

    function gestisciSpec2(valore) {
        if (valore === 'coniugata') {
            $('#spec2').css('visibility', 'visible');
        } else {
            $('#spec2').css('visibility', 'hidden');
        }
    }
});





$(function () {
    $('.slct4').each(function () {
        const $select = $(this);
        const targetSelector = $select.data('target');

        $(targetSelector).hide();

        if ($select.val() === 'no') {
            $(targetSelector).show();
        }

        $select.selectmenu({
            change: function (event, ui) {
                const value = ui.item.value;

                if (value === 'no') {
                    $(targetSelector).show();
                } else {
                    $(targetSelector).hide();
                }
            }
        });
    });
});

$(function () {
    $('.slct5').each(function () {
        const $select = $(this);
        const targetSelector = $select.data('target');

        $(targetSelector).hide();

        if ($select.val() === 'si') {
            $(targetSelector).show();
        }

        $select.selectmenu({
            change: function (event, ui) {
                const value = ui.item.value;

                if (value === 'si') {
                    $(targetSelector).show();
                } else {
                    $(targetSelector).hide();
                }
            }
        });
    });
});

$(function () {
    $('.slct6').each(function () {
        const $select = $(this);
        const targetSelector = $select.data('target');

        $(targetSelector).hide();

        if ($select.val() === 'no') {
            $(targetSelector).show();
        }

        $select.selectmenu({
            change: function (event, ui) {
                const value = ui.item.value;

                if (value === 'no') {
                    $(targetSelector).show();
                } else {
                    $(targetSelector).hide();
                }
            }
        });
    });
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
<style>
.overflow {
    height: 150px;
  }
</style>
<div id="dtBox"></div>
<br/<br/><br/>
<form id="adminform" name="adminform" action="db/dati_pers_send.php" method="post">
    <div class="col-2">
        <label style="padding-top: 6px;" <?php echo "class=".$class1; ?>>
            Cognome *<br/>
            <?php
                echo "<input id=\"cognome\" $dis name=\"cognome\" tabindex=\"1\" value=\"".$cognome."\">";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 6px;" <?php echo "class=".$class2; ?>>
            Nome *<br/>
            <?php
                echo "<input id=\"nome\" $dis name=\"nome\" tabindex=\"2\" value=\"".$nome."\">";
            ?>
        </label>
    </div>

    <div class="col-3">
        <label style="padding-top: 6px;" <?php echo "class=".$class3; ?>>
            Data di Nascita *<br/>
            <?php
                echo "<input type=\"text\" $dis id=\"dataN\" name=\"dataN\" value=\"".$dataN."\" readonly>";
            ?>
        </label>
    </div>
    
    <div class="col-3">
        <label style="padding-top: 6px;" <?php echo "class=".$class4; ?>>
            Luogo di Nascita *<br/>
            <?php
                echo "<input id=\"luogoN\" $dis name=\"luogoN\" tabindex=\"4\" value=\"".$luogoN."\">";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label style="padding-bottom: -12px;" <?php echo "class=".$class5; ?>>
            Età *<br/>
            <?php
                echo "<input id=\"eta\" $dis name=\"eta\" value=\"".$eta."\" readonly>";
            ?>
        </label>
    </div>
    <div class="col-2b">
        <label style="padding-top: 6px;">
            Via e numero<br/>
            <?php
                echo "<input id=\"indirizzo\" $dis name=\"indirizzo\" tabindex=\"6\" value=\"".$via."\">";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label style="padding-top: 6px;">
            CAP<br/>
            <?php
                echo "<input id=\"cap\" $dis name=\"cap\" tabindex=\"8\" value=\"".$cap."\">";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 6px;" <?php echo "class=".$class8; ?>>
            Comune *<br/>
            <?php
                echo "<input id=\"comune\" $dis name=\"comune\" tabindex=\"9\" value=\"".$comune."\">";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 6px;" <?php echo "class=".$class9; ?>>
            Provincia *<br/>
            <?php
                echo "<input id=\"prov\" $dis name=\"prov\" tabindex=\"10\" value=\"".$prov."\">";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 6px;">
            Cell <br/>
            <?php
                echo "<input id=\"cell\" $dis name=\"cell\" tabindex=\"13\" value=\"".$cell."\">";
            ?>
        </label>
    </div>

    <div class="col-2">
        <label style="padding-top: 6px;">
            Codice Fiscale <br/>
            <?php
                echo "<input id=\"codfiscale\" $dis name=\"codfiscale\" tabindex=\"14\" value=\"".$codfiscale."\">";
            ?>
        </label>
    </div>
    <div class="col-4">
        <label style="padding-top: 9px;" <?php echo "class=".$class10; ?>>
            Etnia *<br/>
            <select tabindex="11" id="slct" name="etnia" style="width:75%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>    
                <option value="caucasica">Caucasica</option>
                <option value="ispanica">Ispanica</option>
                <option value="medio orientale">Medio Orientale</option>
                <option value="indiana">Indiana (subcontinentale)</option>
                <option value="asiatica">Asiatica</option>
                <option value="nera">Nera</option>
                <option value="meticcia">Meticcia</option>
                <option value="magrebina">Magrebina</option>
                <option value="altra">Altra (specificare)</option>
            </select>
        </label>
    </div>
    <div class="col-4">
        <label  id="spec" style="visibility: hidden;padding-top: 6px;" <?php echo "class=".$class11; ?>>
            Specificare *<br/>
            <?php
                echo "<input name=\"specEtnia\" $dis tabindex=\"10\" value=\"".$specE."\">";
            ?>
        </label>    
    </div>
    <div class="col-2">
        <label style="padding-top: 6px;" <?php echo "class=".$class12; ?>>
            Professione *<br/>
            <?php
                echo "<input name=\"prof\" $dis tabindex=\"12\" value=\"".$prof."\">";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 6px; ">
            Riconosciuti rischi nell’ambiente di lavoro <br/>
            <?php
                echo "<input name=\"rischi\" $dis tabindex=\"15\" value=\"".$rischi."\">";               
            ?>
        </label>
    </div>

    <div class="col-2">
        <label style="padding-top: 6px;">
            Titolo di Studio <br/>
            <?php
                echo "<input name=\"titolodistudio\" $dis tabindex=\"16\" value=\"".$titolodistudio."\">";
            ?>
        </label>
    </div>

    <div class="col-4">
        <label style="padding-top: 9px;">
            Stato Civile *<br/>
            <select tabindex="17" id="slct2" name="statocivile" style="width:75%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option> 
                <option value="nubile">Nubile</option>    
                <option value="convivente">convivente</option>
                <option value="separata">separata</option>
                <option value="divorziata">divorziata</option>
                <option value="vedova">vedova</option>
                <option value="madre single">madre single</option>   
                <option value="coniugata">coniugata</option>              
            </select>          
        </label>
    </div>

    <div class="col-4">
        <label  id="spec2" style="visibility: hidden;padding-top: 6px;">
            Data Matrimonio <br/>
            <?php
                echo "<input type=\"text\" id=\"specM\" $dis name=\"specM\" value=\"".$specM."\" readonly>";
            ?>
        </label>    
    </div>

    <div class="col-4">
        <label style="padding-top: 6px;">
            Altezza <br/>
            <?php
                echo "<input name=\"altezza\" $dis tabindex=\"18\" value=\"".$altezza."\">";
            ?>
        </label>
    </div>
    
    <div class="col-4">
        <label style="padding-top: 6px;" >
            Peso <br/>
            <?php
                echo "<input name=\"peso\" $dis tabindex=\"19\" value=\"".$peso."\">";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 9px;" <?php echo "class=".$class4; ?>>
            N° visite di controllo in gravidanza * <br/>
            <input placeholder="" id="numVisite" name="numVisite" tabindex="12" style="width: 100%;" readonly value="<?php echo $numVisite; ?>" <?php echo $dis; ?>>
        </label>
    </div>
<br>
<div class="col-3" style="width:40%;">
    <label style="padding-top:7px;">
        La Fecondazione è stata medicalmente assistita?  <br/>
        <select tabindex="15" id="slct3" name="fecondazione" style="width:50%;" <?php echo $dis; ?>>
            <option value=""></option>
            <option value="mancante">Dato Mancante</option>
            <option value="si">Si</option>
            <option value="no">No</option>
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
           $checked = ($intracitoplasmatica == 'Y') ? 'checked' : '';
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
    <br>

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
    <br>

<div class="col-2">
        <label>
            Nonna materno del lattante deceduto di anni<br/>
            <?php
                echo "<input id=\"anni_nonnamaterna\" $dis name=\"dati_pers_anni_nonnamaterna\" tabindex=\"8\" value=\"".$anni_nonnamaterna."\">";
            ?>
        </label>
    </div>

     <div class="col-2">
    <label>
        Patologie della nonna
        <textarea name="dati_pers_patologie_nonnamaterna" style="height:40px;" <?php echo $dis; ?>><?php echo $patologie_nonnamaterna; ?></textarea>
    </label>
</div>
    

<div class="col-3">
    <label class="<?php echo $class31; ?>">
        Vivente <br/>
        <select tabindex="17"
                name="dati_pers_nonnaviva"
                class="slct4"
                data-target="#nonnamaterna"
                style="width:50%;"
                <?php echo $class22; ?>>
            <option value=""> &nbsp; </option> 
            <option value="mancante" <?php if($nonnaviva === "mancante") echo "selected"; ?>>Dato Mancante</option>
            <option value="si" <?php if($nonnaviva === "si") echo "selected"; ?>>Si</option>
            <option value="no" <?php if($nonnaviva === "no") echo "selected"; ?>>No</option>
        </select>
    </label>
</div>


<div class="col-3" id="nonnamaterna">
    <label>
        Causa di morte
        <textarea name="dati_pers_morte_nonnamaterna" style="height:40px;" <?php echo $dis; ?>><?php echo $mortenonnamaterna; ?></textarea>

    </label>
</div>
<br>

<div class="col-2">
        <label>
           Nonno materno del lattante deceduto di anni<br/>
            <?php
                echo "<input id=\"anni_nonnomaterno\" $dis name=\"dati_pers_anni_nonnomaterno\" tabindex=\"8\" value=\"".$anni_nonnomaterno."\">";
            ?>
        </label>
    </div>

     <div class="col-2">
    <label>
        Patologie del nonno
        <textarea name="dati_pers_patologie_nonnomaterno" style="height:40px;" <?php echo $dis; ?>><?php echo $patologie_nonnomaterno; ?></textarea>
    </label>
</div>

    

<div class="col-3">
    <label >
        Vivente <br/>
        <select tabindex="17"
                name="dati_pers_nonnovivo"
                class="slct6"
                data-target="#nonnomaterno"
                style="width:50%;"
               >
            <option value=""> &nbsp; </option> 
            <option value="mancante" <?php if($nonnovivo === "mancante") echo "selected"; ?>>Dato Mancante</option>
            <option value="si" <?php if($nonnovivo === "si") echo "selected"; ?>>Si</option>
            <option value="no" <?php if($nonnovivo === "no") echo "selected"; ?>>No</option>
        </select>
    </label>
</div>



<div class="col-3" id="nonnomaterno">
    <label>
       Causa di morte
        <textarea name="dati_pers_morte_nonnomaterno" style="height:40px;" <?php echo $dis; ?>><?php echo $morte_nonnomaterno; ?></textarea>
    </label>
</div>
<br>

 <div class="col-2">
    <label>
        Fratelli/Sorelle: Età e stato di salute
        <textarea name="dati_pers_fratelli_sorelle" style="height:40px;" <?php echo $dis; ?>><?php echo $fratelli_sorelle; ?></textarea>
    </label>
</div>

 <div class="col-2">
    <label>
        Altre patologie nella famiglia
        <textarea name="dati_pers_patologie_famiglia" style="height:40px;" <?php echo $dis; ?>><?php echo $patologie_famiglia; ?></textarea>
    </label>
</div>

<div class="col-3">
    <label>
        Ci sono stati altri casi di morte improvvisa in famiglia? <br/>
        <select tabindex="17"
                name="dati_pers_altricasi"
                class="slct5"
                data-target="#altri_casi"
                style="width:50%;"
               >
            <option value=""> &nbsp; </option> 
            <option value="mancante" <?php if($altricasi === "mancante") echo "selected"; ?>>Dato Mancante</option>
            <option value="si" <?php if($altricasi === "si") echo "selected"; ?>>Si</option>
            <option value="no" <?php if($altricasi === "no") echo "selected"; ?>>No</option>
        </select>
    </label>
</div>

<div class="col-3" id="altri_casi">
    <label>
       Se sì, specificare
        <textarea name="dati_pers_altri_casi" style="height:40px;" <?php echo $dis; ?>><?php echo $altri_casi; ?></textarea>
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
            <input type="hidden" id="tipo" name="tipo"  value="MADRE" />    
        </label>
    </div>
    
</form>