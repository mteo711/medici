
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
require_once("./db/fratelli_load.php");
loadPage();
require_once("./db/loadtab_madre.php");
tab_madre();


if(isset($_POST["fratelli_dataU"])){
    list($year, $month, $day) = explode("-", $_POST['fratelli_dataU']);
    $dataU = "$day-$month-$year";
    $class = "";
} else {
    $dataU = null;
    $class = "errors";
}

if(isset($_POST["fratelli_sorelle"])){
    $morti = $_POST["fratelli_sorelle"];
    $class2 = "";
} else {
    $morti = null;
    $class2 = "errors";
}

if(isset($_POST["fratelli_dataN1"])){
    list($year, $month, $day) = explode("-", $_POST['fratelli_dataN1']);
    $dataN1 = "$day-$month-$year";
    $class3 = "";
} else {
    $dataN1 = null;
    $class3 = "errors";
}

if(isset($_POST["fratelli_mesiM1"])){
    $mesiM1 = $_POST["fratelli_mesiM1"];
    $class4 = "";
} else {
    $mesiM1 = null;
    $class4 = "errors";
}

if(isset($_POST["fratelli_anniM1"])){
    $anniM1 = $_POST["fratelli_anniM1"];
    $class5 = "";
} else {
    $anniM1 = null;
    $class5 = "errors";
}

if(isset($_POST["fratelli_causaM1"])){
    $causaM1 = $_POST["fratelli_causaM1"];
    $class6 = "";
} else {
    $causaM1 = null;
    $class6 = "errors";
}

if(isset($_POST["fratelli_dataN2"])){
    list($year, $month, $day) = explode("-", $_POST['fratelli_dataN2']);
    $dataN2 = "$day-$month-$year";
    $class7 = "";
} else {
    $dataN2 = null;
    $class7 = "errors";
}

if(isset($_POST["fratelli_mesiM2"])){
    $mesiM2 = $_POST["fratelli_mesiM2"];
    $class8 = "";
} else {
    $mesiM2 = null;
    $class8 = "errors";
}

if(isset($_POST["fratelli_anniM2"])){
    $anniM2 = $_POST["fratelli_anniM2"];
    $class9 = "";
} else {
    $anniM2 = null;
    $class9 = "errors";
}

if(isset($_POST["fratelli_causaM2"])){
    $causaM2 = $_POST["fratelli_causaM2"];
    $class10 = "";
} else {
    $causaM2 = null;
    $class10 = "errors";
}

if(isset($_POST["fratelli_dataN3"])){
    list($year, $month, $day) = explode("-", $_POST['fratelli_dataN3']);
    $dataN3 = "$day-$month-$year";
    $class11 = "";
} else {
    $dataN3 = null;
    $class11 = "errors";
}

if(isset($_POST["fratelli_mesiM3"])){
    $mesiM3 = $_POST["fratelli_mesiM3"];
    $class12 = "";
} else {
    $mesiM3 = null;
    $class12 = "errors";
}

if(isset($_POST["fratelli_anniM3"])){
    $anniM3 = $_POST["fratelli_anniM3"];
    $class13 = "";
} else {
    $anniM3 = null;
    $class13 = "errors";
}

if(isset($_POST["fratelli_causaM3"])){
    $causaM3 = $_POST["fratelli_causaM3"];
    $class14 = "";
} else {
    $causaM3 = null;
    $class14 = "errors";
}

if(isset($_POST["fratelli_dataN4"])){
    list($year, $month, $day) = explode("-", $_POST['fratelli_dataN4']);
    $dataN4 = "$day-$month-$year";
    $class15 = "";
} else {
    $dataN4 = null;
    $class15 = "errors";
}

if(isset($_POST["fratelli_mesiM4"])){
    $mesiM4 = $_POST["fratelli_mesiM4"];
    $class16 = "";
} else {
    $mesiM4 = null;
    $class16 = "errors";
}

if(isset($_POST["fratelli_anniM4"])){
    $anniM4 = $_POST["fratelli_anniM4"];
    $class17 = "";
} else {
    $anniM4 = null;
    $class17 = "errors";
}

if(isset($_POST["fratelli_causaM4"])){
    $causaM4 = $_POST["fratelli_causaM4"];
    $class18 = "";
} else {
    $causaM4 = null;
    $class18 = "errors";
}

// Nuovi dati

if(isset($_POST["fratelli_dataN5"])){
    list($year, $month, $day) = explode("-", $_POST['fratelli_dataN5']);
    $dataN5 = "$day-$month-$year";
    $class19 = "";
} else {
    $dataN5 = null;
    $class19 = "errors";
}

if(isset($_POST["fratelli_vivo1"])){
    $vivo1 = $_POST["fratelli_vivo1"];
    $class20 = "";
} else {
    $vivo1 = null;
    $class20 = "errors";
}

if(isset($_POST["fratelli_vivo2"])){
    $vivo2 = $_POST["fratelli_vivo2"];
    $class21 = "";
} else {
    $vivo2 = null;
    $class21 = "errors";
}

if(isset($_POST["fratelli_vivo3"])){
    $vivo3 = $_POST["fratelli_vivo3"];
    $class22 = "";
} else {
    $vivo3 = null;
    $class22 = "errors";
}

if(isset($_POST["fratelli_vivo4"])){
    $vivo4 = $_POST["fratelli_vivo4"];
    $class23 = "";
} else {
    $vivo4 = null;
    $class23 = "errors";
}

if(isset($_POST["fratelli_vivo5"])){
    $vivo5 = $_POST["fratelli_vivo5"];
    $class24 = "";
} else {
    $vivo5 = null;
    $class24 = "errors";
}

if(isset($_POST["fratelli_mesiM5"])){
    $mesiM5 = $_POST["fratelli_mesiM5"];
    $class25 = "";
} else {
    $mesiM5 = null;
    $class25 = "errors";
}

if(isset($_POST["fratelli_anniM5"])){
    $anniM5 = $_POST["fratelli_anniM5"];
    $class26 = "";
} else {
    $anniM5 = null;
    $class26 = "errors";
}

if(isset($_POST["fratelli_causaM5"])){
    $causaM5 = $_POST["fratelli_causaM5"];
    $class27 = "";
} else {
    $causaM5 = null;
    $class27 = "errors";
}

// Malattie ereditarie

if(isset($_POST["fratelli_ereditarieM1"])){
    $ereditarieM1 = $_POST["fratelli_ereditarieM1"];
    $class28 = "";
} else {
    $ereditarieM1 = null;
    $class28 = "errors";
}

if(isset($_POST["fratelli_ereditarieM2"])){
    $ereditarieM2 = $_POST["fratelli_ereditarieM2"];
    $class29 = "";
} else {
    $ereditarieM2 = null;
    $class29 = "errors";
}

if(isset($_POST["fratelli_ereditarieM3"])){
    $ereditarieM3 = $_POST["fratelli_ereditarieM3"];
    $class30 = "";
} else {
    $ereditarieM3 = null;
    $class30 = "errors";
}

if(isset($_POST["fratelli_ereditarieM4"])){
    $ereditarieM4 = $_POST["fratelli_ereditarieM4"];
    $class31 = "";
} else {
    $ereditarieM4 = null;
    $class31 = "errors";
}

if(isset($_POST["fratelli_ereditarieM5"])){
    $ereditarieM5 = $_POST["fratelli_ereditarieM5"];
    $class32 = "";
} else {
    $ereditarieM5 = null;
    $class32 = "errors";
}

// Malattie genetiche

if(isset($_POST["fratelli_geneticheM1"])){
    $geneticheM1 = $_POST["fratelli_geneticheM1"];
    $class33 = "";
} else {
    $geneticheM1 = null;
    $class33 = "errors";
}

if(isset($_POST["fratelli_geneticheM2"])){
    $geneticheM2 = $_POST["fratelli_geneticheM2"];
    $class34 = "";
} else {
    $geneticheM2 = null;
    $class34 = "errors";
}

if(isset($_POST["fratelli_geneticheM3"])){
    $geneticheM3 = $_POST["fratelli_geneticheM3"];
    $class35 = "";
} else {
    $geneticheM3 = null;
    $class35 = "errors";
}

if(isset($_POST["fratelli_geneticheM4"])){
    $geneticheM4 = $_POST["fratelli_geneticheM4"];
    $class36 = "";
} else {
    $geneticheM4 = null;
    $class36 = "errors";
}

if(isset($_POST["fratelli_geneticheM5"])){
    $geneticheM5 = $_POST["fratelli_geneticheM5"];
    $class37 = "";
} else {
    $geneticheM5 = null;
    $class37 = "errors";
}

// Malattie dismetaboliche

if(isset($_POST["fratelli_dismetabolicheM1"])){
    $dismetabolicheM1 = $_POST["fratelli_dismetabolicheM1"];
    $class38 = "";
} else {
    $dismetabolicheM1 = null;
    $class38 = "errors";
}

if(isset($_POST["fratelli_dismetabolicheM2"])){
    $dismetabolicheM2 = $_POST["fratelli_dismetabolicheM2"];
    $class39 = "";
} else {
    $dismetabolicheM2 = null;
    $class39 = "errors";
}

if(isset($_POST["fratelli_dismetabolicheM3"])){
    $dismetabolicheM3 = $_POST["fratelli_dismetabolicheM3"];
    $class40 = "";
} else {
    $dismetabolicheM3 = null;
    $class40 = "errors";
}

if(isset($_POST["fratelli_dismetabolicheM4"])){
    $dismetabolicheM4 = $_POST["fratelli_dismetabolicheM4"];
    $class41 = "";
} else {
    $dismetabolicheM4 = null;
    $class41 = "errors";
}

if(isset($_POST["fratelli_dismetabolicheM5"])){
    $dismetabolicheM5 = $_POST["fratelli_dismetabolicheM5"];
    $class42 = "";
} else {
    $dismetabolicheM5 = null;
    $class42 = "errors";
}

// Altro

if(isset($_POST["fratelli_altroM1"])){
    $altroM1 = $_POST["fratelli_altroM1"];
    $class43 = "";
} else {
    $altroM1 = null;
    $class43 = "errors";
}

if(isset($_POST["fratelli_altroM2"])){
    $altroM2 = $_POST["fratelli_altroM2"];
    $class44 = "";
} else {
    $altroM2 = null;
    $class44 = "errors";
}

if(isset($_POST["fratelli_altroM3"])){
    $altroM3 = $_POST["fratelli_altroM3"];
    $class45 = "";
} else {
    $altroM3 = null;
    $class45 = "errors";
}

if(isset($_POST["fratelli_altroM4"])){
    $altroM4 = $_POST["fratelli_altroM4"];
    $class46 = "";
} else {
    $altroM4 = null;
    $class46 = "errors";
}

if(isset($_POST["fratelli_altroM5"])){
    $altroM5 = $_POST["fratelli_altroM5"];
    $class47 = "";
} else {
    $altroM5 = null;
    $class47 = "errors";
}

?>
<script>

    
$(function() {
    // mesiM1 ... mesiM5 senza limiti
    for (let i = 1; i <= 5; i++) {
        $('#mesiM' + i).keypad();
    }

    // anniM1 ... anniM5 senza limiti
    for (let i = 1; i <= 5; i++) {
        $('#anniM' + i).keypad();
    }
});


    
$(function () {
    const maxElements = 60;

    // Prima select: numero fratelli
    $("#slct2").selectmenu({
        change: function (event, ui) {
            const value = ui.item.value;

            // Nasconde tutto
            for (let i = 1; i <= maxElements; i++) {
                $('#d' + i).hide();
            }

            if (value === 'mancante' || value === 'nessuno') return;

            const limite = parseInt(value) * 7;
            for (let i = 1; i <= limite; i++) {
                $('#d' + i).css('display', 'inline-block');
            }

            // Dopo il cambio del numero, nascondo eventuali campi cX fuori soglia
            aggiornaCampiCondizionali(parseInt(value));
        }
    });

    const valoreMorti = '<?php echo $morti; ?>';
    $("#slct2").val(valoreMorti).selectmenu('refresh');

    // Nasconde tutti all'avvio
    for (let i = 1; i <= maxElements; i++) {
        $('#d' + i).hide();
    }

    if (valoreMorti !== 'mancante' && valoreMorti !== 'nessuno') {
        const limite = parseInt(valoreMorti) * 7;
        for (let i = 1; i <= limite; i++) {
            $('#d' + i).css('display', 'inline-block');
        }
    }

    // Seconda parte: gestione slct3
    $('.slct3').each(function () {
        const $select = $(this);
        const id = $select.attr('id');
        const index = parseInt(id.split('_')[1]);

        const start = (index - 1) * 3 + 1;
        const end = start + 2;

        $select.selectmenu({
            change: function (event, ui) {
                const value = ui.item.value;

                for (let i = start; i <= end; i++) {
                    $('#c' + i).hide();
                }

                if (value === 'no') {
                    for (let i = start; i <= end; i++) {
                        $('#c' + i).show();
                    }
                }
            }
        });

        // Logica iniziale
        for (let i = start; i <= end; i++) {
            $('#c' + i).hide();
        }

        const selectedValue = $select.val();
        if (selectedValue === 'no') {
            for (let i = start; i <= end; i++) {
                $('#c' + i).show();
            }
        }
    });

    // Nasconde eventuali cX al caricamento in base al valore selezionato
    aggiornaCampiCondizionali(parseInt(valoreMorti));

    function aggiornaCampiCondizionali(numeroFratelli) {
        const fratelliVisibili = numeroFratelli || 0;

        $('.slct3').each(function () {
            const $select = $(this);
            const id = $select.attr('id');
            const index = parseInt(id.split('_')[1]);

            const start = (index - 1) * 3 + 1;
            const end = start + 2;

            // Nasconde se questo fratello non dovrebbe essere visibile
            if (index > fratelliVisibili) {
                for (let i = start; i <= end; i++) {
                    $('#c' + i).hide();
                }
            }
        });
    }
});








 

    

    
$(function() {
  $( "#dataU" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-30:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D" //new Date(2015, 10 - 10, 29) //"+0D"
    });
});
    
$(function() {
  $( "#dataN1" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-30:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D" //new Date(2015, 10 - 10, 29) //"+0D"
    });
});
    
$(function() {
  $( "#dataN2" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-30:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D" //new Date(2015, 10 - 10, 29) //"+0D"
    });
});
    

$(function() {
  $( "#dataN3" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-30:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D" //new Date(2015, 10 - 10, 29) //"+0D"
    });
});
    
 
$(function() {
  $( "#dataN4" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-30:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D" //new Date(2015, 10 - 10, 29) //"+0D"
    });
});
    
$(function() {
  $( "#dataN5" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-30:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D" //new Date(2015, 10 - 10, 29) //"+0D"
    });
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
<br><br/>
<form id="adminform" name="adminform" action="db/fratelli_send.php" method="post">
    
    <div class="col-3" style="width:35%;">
        <label>
            Data ultimo parto precedente<br/>
            <?php
                echo "<input type=\"text\" $dis id=\"dataU\" name=\"dataU\" value=\"".$dataU."\" readonly>";
            ?>
        </label>
    </div>
    <div class="col-3" style="width:40%;">
        <label style="padding-top:7px;" <?php echo "class=".$class2 ?>>
            FRATELLI/SORELLE (del neonato/lattante deceduto) <br/>
            <select tabindex="13" id="slct2" name="fratelli_sorelle" style="width:60%;" <?php echo $dis; ?>>
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
    <div class="col-1" id="d1" style="display:none;">
    <label>
        Caso #1
    </label>
    </div>
    <div class="col-3" id="d2" style="display:none;" >
        <label <?php echo "class=".$class3 ?>>
            Nato il *<br/>
            <?php
                echo "<input type=\"text\" $dis id=\"dataN1\" name=\"dataN1\" value=\"".$dataN1."\" readonly>";
            ?>
        </label>
    </div>
     <div class="col-3" id="d3">
        <label <?php echo "class=".$class3 ?>>
            Vivo? <br/>
     <select tabindex="13" id="slct3_1" class="slct3" name="vivo1" style="width:50%;" <?php echo $class18; ?>>
    <option value=""> &nbsp; </option> 
    <option value="mancante" <?php if($vivo1 === "mancante") echo "selected"; ?>>Dato Mancante</option>
    <option value="si" <?php if($vivo1 === "si") echo "selected"; ?>>Si</option>
    <option value="no" <?php if($vivo1 === "no") echo "selected"; ?>>No</option>
</select>


        </label>
    </div>
    <br>
    <div class="col-3" id="c1" style="display:none;">
          <label>
        Morto all'età di:
    </label>
        <label <?php echo "class=".$class4 ?>>
            Età in Mesi *<br/>
            <?php
                echo "<input id=\"mesiM1\" $dis name=\"mesiM1\" tabindex=\"8\" value=\"".$mesiM1."\">";
            ?>
        </label>
    </div>
    <div class="col-3" id="c2" style="display">
    <label >
            Età in Anni<br/>
            <?php
                echo "<input id=\"anniM1\" $dis name=\"anniM1\" tabindex=\"8\" value=\"".$anniM1."\">";
            ?>
        </label>
    </div>
    <div class="col-3" id="c3" style="display:none;">
    <label <?php echo "class=".$class6 ?>>
        Causa *
        <textarea name="causaM1" style="height:60px;" <?php echo $dis; ?>><?php echo $causaM1; ?></textarea>
    </label>
    </div>
     <br>
    <div class="col-4" id="d4" style="display:none;">
          <label>
        MALATTIE
    </label>
        <label>
        Ereditarie
        <textarea name="ereditarieM1" style="height:40px;" <?php echo $dis; ?>><?php echo $causaM1; ?></textarea>
    </label>
    </div>
   <div class="col-4" id="d5" style="display:none;">
    <label >
        Genetiche
        <textarea name="geneticheM1" style="height:40px;" <?php echo $dis; ?>><?php echo $causaM1; ?></textarea>
    </label>
    </div>
     <div class="col-4" id="d6" style="display:none;">
    <label >
        Dismetaboliche
        <textarea name="dismetabolicheM1" style="height:40px;" <?php echo $dis; ?>><?php echo $causaM1; ?></textarea>
    </label>
    </div>
    <div class="col-4" id="d7" style="display:none;">
    <label>
        Altro
        <textarea name="altroM1" style="height:40px;" <?php echo $dis; ?>><?php echo $causaM1; ?></textarea>
    </label>
    </div>
      <div class="col-1" id="d8" style="display:none;">
    <label>
        Caso #2
    </label>
    </div>
    <div class="col-3" id="d9" style="display:none;">
        <label <?php echo "class=".$class7 ?>>
            Nato il *<br/>
            <?php
                echo "<input type=\"text\" $dis id=\"dataN2\" name=\"dataN2\" value=\"".$dataN2."\" readonly>";
            ?>
        </label>
    </div>
     <div class="col-3" id="d10">
         <label <?php echo "class=".$class21 ?>>
            Vivo? <br/>
            <select tabindex="14" id="slct3_2" class="slct3" name="vivo2" style="width:50%;" <?php echo $class21; ?>>
    <option value=""> &nbsp; </option> 
    <option value="mancante" <?php if($vivo2 === "mancante") echo "selected"; ?>>Dato Mancante</option>
    <option value="si" <?php if($vivo2 === "si") echo "selected"; ?>>Si</option>
    <option value="no" <?php if($vivo2 === "no") echo "selected"; ?>>No</option>
</select>
        </label>
    </div>
    <br>
    <div class="col-3" id="c4" style="display:none;">
          <label>
        Morto all'età di:
    </label>
        <label <?php echo "class=".$class8 ?>>
            Età in Mesi *<br/>
            <?php
                echo "<input id=\"mesiM2\" $dis name=\"mesiM2\" tabindex=\"8\" value=\"".$mesiM2."\">";
            ?>
        </label>
    </div>
    <div class="col-3" id="c5" style="display:none;">
        <label >
            Età in Anni<br/>
            <?php
                echo "<input id=\"anniM2\" $dis name=\"anniM2\" tabindex=\"8\" value=\"".$anniM2."\">";
            ?>
        </label>
    </div>
    <div class="col-3" id="c6" style="display:none;">
    <label <?php echo "class=".$class10 ?>>
        Causa *
        <textarea name="causaM2" style="height:60px;" <?php echo $dis; ?>><?php echo $causaM2; ?></textarea>
    </label>
    </div>
     <br>
    <div class="col-4" id="d11" style="display:none;">
          <label>
        MALATTIE
    </label>
        <label>
        Ereditarie
        <textarea name="ereditarieM2" style="height:40px;" <?php echo $dis; ?>><?php echo $ereditarieM2; ?></textarea>
    </label>
    </div>
   <div class="col-4" id="d12" style="display:none;">
    <label>
        Genetiche
        <textarea name="geneticheM2" style="height:40px;" <?php echo $dis; ?>><?php echo $geneticheM2; ?></textarea>
    </label>
    </div>
     <div class="col-4" id="d13" style="display:none;">
    <label>
        Dismetaboliche
        <textarea name="dismetabolicheM2" style="height:40px;" <?php echo $dis; ?>><?php echo $dismetabolicheM2; ?></textarea>
    </label>
    </div>
    <div class="col-4" id="d14" style="display:none;">
    <label>
        Altro
        <textarea name="altroM2" style="height:40px;" <?php echo $dis; ?>><?php echo $altroM2; ?></textarea>
    </label>
    </div>
    
   </div>

 <div class="col-1" id="d15" style="display:none;">
    <label>
        Caso #3
    </label>
    </div>
    <div class="col-3" id="d16" style="display:none;">
        <label <?php echo "class=".$class11 ?>>
            Nato il *<br/>
            <?php
                echo "<input type=\"text\" $dis id=\"dataN3\" name=\"dataN3\" value=\"".$dataN3."\" readonly>";
            ?>
        </label>
    </div>
     <div class="col-3" id="d17">
        <label <?php echo "class=".$class22 ?>>
            Vivo? <br/>
          <select tabindex="15" id="slct3_3" class="slct3" name="vivo3" style="width:50%;" <?php echo $class22; ?>>
    <option value=""> &nbsp; </option> 
    <option value="mancante" <?php if($vivo3 === "mancante") echo "selected"; ?>>Dato Mancante</option>
    <option value="si" <?php if($vivo3 === "si") echo "selected"; ?>>Si</option>
    <option value="no" <?php if($vivo3 === "no") echo "selected"; ?>>No</option>
</select>
        </label>
    </div>
    <br>
    <div class="col-3" id="c7" style="display:none;">
          <label>
        Morto all'età di:
    </label>
        <label <?php echo "class=".$class12 ?>>
            Età in Mesi *<br/>
            <?php
                echo "<input id=\"mesiM3\" $dis name=\"mesiM3\" tabindex=\"8\" value=\"".$mesiM3."\">";
            ?>
        </label>
    </div>
    <div class="col-3" id="c8" style="display:none;">
        <label>
            Età in Anni<br/>
            <?php
                echo "<input id=\"anniM3\" $dis name=\"anniM3\" tabindex=\"8\" value=\"".$anniM3."\">";
            ?>
        </label>
    </div>
    <div class="col-3" id="c9" style="display:none;">
    <label <?php echo "class=".$class14 ?>>
        Causa *
        <textarea name="causaM3" style="height:60px;" <?php echo $dis; ?>><?php echo $causaM3; ?></textarea>
    </label>
    </div>
     <br>
    <div class="col-4" id="d18" style="display:none;">
          <label>
        MALATTIE
    </label>
        <label>
        Ereditarie
        <textarea name="ereditarieM3" style="height:40px;" <?php echo $dis; ?>><?php echo $ereditarieM3; ?></textarea>
    </label>
    </div>
   <div class="col-4" id="d19" style="display:none;">
    <label>
        Genetiche
        <textarea name="geneticheM3" style="height:40px;" <?php echo $dis; ?>><?php echo $geneticheM3; ?></textarea>
    </label>
    </div>
     <div class="col-4" id="d20" style="display:none;">
    <label>
        Dismetaboliche
        <textarea name="dismetabolicheM3" style="height:40px;" <?php echo $dis; ?>><?php echo $dismetabolicheM3; ?></textarea>
    </label>
    </div>
    <div class="col-4" id="d21" style="display:none;">
    <label>
        Altro
        <textarea name="altroM3" style="height:40px;" <?php echo $dis; ?>><?php echo $altroM3; ?></textarea>
    </label>
    </div>

    <div class="col-1" id="d22" style="display:none;">
    <label>
        Caso #4
    </label>
    </div>
    <div class="col-3" id="d23" style="display:none;">
        <label <?php echo "class=".$class15 ?>>
            Nato il *<br/>
            <?php
                echo "<input type=\"text\" $dis id=\"dataN4\" name=\"dataN4\" value=\"".$dataN4."\" readonly>";
            ?>
        </label>
    </div>
     <div class="col-3" id="d24">
        <label <?php echo "class=".$class23 ?>>
            Vivo? <br/>
           <select tabindex="16" id="slct3_4" class="slct3" name="vivo4" style="width:50%;" <?php echo $class23; ?>>
    <option value=""> &nbsp; </option> 
    <option value="mancante" <?php if($vivo4 === "mancante") echo "selected"; ?>>Dato Mancante</option>
    <option value="si" <?php if($vivo4 === "si") echo "selected"; ?>>Si</option>
    <option value="no" <?php if($vivo4 === "no") echo "selected"; ?>>No</option>
</select>
        </label>
    </div>
    <br>
    <div class="col-3" id="c10" style="display:none;">
          <label>
        Morto all'età di:
    </label>
        <label <?php echo "class=".$class16 ?>>
            Età in Mesi *<br/>
            <?php
                echo "<input id=\"mesiM4\" $dis name=\"mesiM4\" tabindex=\"8\" value=\"".$mesiM4."\">";
            ?>
        </label>
    </div>
    <div class="col-3" id="c11" style="display:none;">
        <label>
            Età in Anni<br/>
            <?php
                echo "<input id=\"anniM4\" $dis name=\"anniM4\" tabindex=\"8\" value=\"".$anniM4."\">";
            ?>
        </label>
    </div>
    <div class="col-3" id="c12" style="display:none;">
    <label <?php echo "class=".$class18 ?>>
        Causa *
        <textarea name="causaM4" style="height:60px;" <?php echo $dis; ?>><?php echo $causaM4; ?></textarea>
    </label>
    </div>
     <br>
    <div class="col-4" id="d25" style="display:none;">
          <label>
        MALATTIE
    </label>
        <label>
        Ereditarie
        <textarea name="ereditarieM4" style="height:40px;" <?php echo $dis; ?>><?php echo $ereditarieM4; ?></textarea>
    </label>
    </div>
   <div class="col-4" id="d26" style="display:none;">
    <label>
        Genetiche
        <textarea name="geneticheM4" style="height:40px;" <?php echo $dis; ?>><?php echo $geneticheM4; ?></textarea>
    </label>
    </div>
     <div class="col-4" id="d27" style="display:none;">
    <label>
        Dismetaboliche
        <textarea name="dismetabolicheM4" style="height:40px;" <?php echo $dis; ?>><?php echo $dismetabolicheM4; ?></textarea>
    </label>
    </div>
    <div class="col-4" id="d28" style="display:none;">
    <label>
        Altro
        <textarea name="altroM4" style="height:40px;" <?php echo $dis; ?>><?php echo $altroM4; ?></textarea>
    </label>
    </div>

    <div class="col-1" id="d29" style="display:none;">
    <label>
        Caso #5
    </label>
    </div>
    <div class="col-3" id="d30" style="display:none;">
        <label <?php echo "class=".$class19 ?>>
            Nato il *<br/>
            <?php
                echo "<input type=\"text\" $dis id=\"dataN5\" name=\"dataN5\" value=\"".$dataN5."\" readonly>";
            ?>
        </label>
    </div>
     <div class="col-3" id="d31">
        <label <?php echo "class=".$class24 ?>>
            Vivo? <br/>
           <select tabindex="17" id="slct3_5" class="slct3" name="vivo5" style="width:50%;" <?php echo $class24; ?>>
    <option value=""> &nbsp; </option> 
    <option value="mancante" <?php if($vivo5 === "mancante") echo "selected"; ?>>Dato Mancante</option>
    <option value="si" <?php if($vivo5 === "si") echo "selected"; ?>>Si</option>
    <option value="no" <?php if($vivo5 === "no") echo "selected"; ?>>No</option>
</select>
        </label>
    </div>
    <br>
    <div class="col-3" id="c13" style="display:none;">
          <label>
        Morto all'età di:
    </label>
        <label <?php echo "class=".$class25 ?>>
            Età in Mesi *<br/>
            <?php
                echo "<input id=\"mesiM5\" $dis name=\"mesiM5\" tabindex=\"8\" value=\"".$mesiM5."\">";
            ?>
        </label>
    </div>
    <div class="col-3" id="c14" style="display:none;">
        <label>
            Età in Anni<br/>
            <?php
                echo "<input id=\"anniM5\" $dis name=\"anniM5\" tabindex=\"8\" value=\"".$anniM5."\">";
            ?>
        </label>
    </div>
    <div class="col-3" id="c15" style="display:none;">
    <label <?php echo "class=".$class27 ?>>
        Causa *
        <textarea name="causaM5" style="height:60px;" <?php echo $dis; ?>><?php echo $causaM5; ?></textarea>
    </label>
    </div>
     <br>
    <div class="col-4" id="d32" style="display:none;">
          <label>
        MALATTIE
    </label>
        <label>
        Ereditarie
        <textarea name="ereditarieM5" style="height:40px;" <?php echo $dis; ?>><?php echo $ereditarieM5; ?></textarea>
    </label>
    </div>
   <div class="col-4" id="d33" style="display:none;">
    <label>
        Genetiche
        <textarea name="geneticheM5" style="height:40px;" <?php echo $dis; ?>><?php echo $geneticheM5; ?></textarea>
    </label>
    </div>
     <div class="col-4" id="d34" style="display:none;">
    <label>
        Dismetaboliche
        <textarea name="dismetabolicheM5" style="height:40px;" <?php echo $dis; ?>><?php echo $dismetabolicheM5; ?></textarea>
    </label>
    </div>
    <div class="col-4" id="d35" style="display:none;">
    <label>
        Altro
        <textarea name="altroM5" style="height:40px;" <?php echo $dis; ?>><?php echo $altroM5; ?></textarea>
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
    </form>