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
 
 
 <script>
$(function() {
     $( "#centro" ).selectmenu()
     .selectmenu( "menuWidget")
     .addClass( "overflow" );
 });
$(function() {
    $('#tipo').selectmenu();

});
$(function() {
    $('#tipoId').selectmenu();

});
     
$(function() {
      $('#numb').keypad();    
  });
$(function() {
      $('#anno').keypad();    
  });

$(function() {
  $( "#dataI" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-10:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D" //new Date(2015, 10 - 10, 29) //"+0D"
    });
});
$(function() {
  $( "#dataM" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-10:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D" //new Date(2015, 10 - 10, 29) //"+0D"
    });
});
$(function() {
  $( "#dataC" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-10:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0D" //new Date(2015, 10 - 10, 29) //"+0D"
    });
});
</script>
<style>
.overflow {
    height: 200px;
  }
</style>
<div id="dtBox"></div>

<h1 align="center">Ricerca Schede</h1>

<form action="index_naz.php?menu=result" method="post" style="width:60%;">
    <!-- indice -->
    <!-- Case 1 -->
    <div class="col-1">
        <label style="margin-top:5px;">
            ID caso: (il formato deve essere: naz_<span style="color:#7BBEF2;">'numero'</span>/<span style="color:#7BBEF2;">'anno'</span>)
            <input id="idcaso" name="idcaso" tabindex="8" >
        </label>
    </div>
    <div class="col-1">
        <label style="margin-top: 10px;">
            Regione:
            <select  id="centro" tabindex="2" name="centro">
                <option value=""> &nbsp </option>
                <option value=3>Abruzzo</option>
                <option value=4>Basilicata</option>
                <option value=5>Calabria</option>
                <option value=6>Campania</option>
                <option value=7>Emilia-Romagna</option>
                <option value=8>Friuli-Venezia-Giulia</option>
                <option value=9>Lazio</option>
                <option value=10>Liguria</option>
                <option value=1>Lombardia</option>
                <option value=11>Marche</option>
                <option value=12>Molise</option>
                <option value=13>Piemonte</option>
                <option value=14>Puglia</option>
                <option value=15>Sardegna</option>
                <option value=16>Sicilia</option> 
                <option value=17>Toscana</option> 
                <option value=18>Trentino-Alto-Adige</option>
                <option value=19>Umbria</option>
                <option value=20>Valle d'Aosta</option>
                <option value=21>Veneto</option>
                <option value=2>NAZIONALE</option>
            
            </select>
        </label>
    </div>
    <div class="col-1">
        <label style="margin-top: 10px;">
            Tipo:
           <select id="tipo" tabindex="2" name="tipo">
               <option value=""> &nbsp; </option>
               <option value="sids">Scheda "Sindrome della morte improvvisa del lattante" SIDS</option>
               <option value="morte fetale">Scheda "Morte Perinatale" FETALE (dopo la 25a settimana di gestazione)</option>
           </select>
        </label>
    </div>
    <div class="col-1">
        <label>
            Data di creazione:
            <input id="dataC" name="dataC" tabindex="8" readonly> 
        </label>
    </div>
    <div class="col-1">
        <label >
            Data di invio al Centro Nazionale
            <input id="dataI" name="dataI" tabindex="8" readonly> 
        </label>
    </div>
    <div class="col-submit">
        <button type="submit" class="submitbtn">Ricerca schede</button>
    </div>
</form>