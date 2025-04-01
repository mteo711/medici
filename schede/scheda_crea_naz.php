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
 <!--[if lt IE 9]>
  <link rel="stylesheet" type="text/css" href="DateTimePicker-ltie9.css" />
  <script type="text/javascript" src="DateTimePicker-ltie9.js"></script>
 <![endif]-->
 
 <script>
 $(function() {
     $( "#regione" ).selectmenu()
     .selectmenu( "menuWidget")
     .addClass( "overflow" );
 });
 $(function() {
     $( "#tipo" ).selectmenu();
 });
 </script>
<style>
.overflow {
    height: 200px;
  }
</style>
<h1 align="center">Crea Scheda</h1>

<form method="POST" action="./db/schede_sendN.php">
    <div class="col-1">
        <label>
        <?php
                if(isset($_GET['error2']))
                    $error2 = $_GET['error2'];
                else
                    $error2 = '';
                require_once("db/utils.php");
                generateCaseNum();
                $caseNum = 'reg_'.$_SESSION['case_id'].'/'.date('Y');
                echo "Id caso * <br/><input name=\"idcaso\" value=".$caseNum." readonly>";
        ?>
        </label>
    </div>
    <div class="col-1">
        <label class="<?php echo $error2;?>">
            Centro Regionale *<br/>
            <select tabindex="2" name="centro" id="regione" style="width:50%;">
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
        <label>
            Altre informazioni utili all'identificazione del caso
            <input name="info" placeholder="(es. nome madre, nome bambino, nome di fantasia, ecc.." tabindex="3">
        </label>
    </div>
    <div class="col-1">
        <label>
            Tipologia<br/>
            <select tabindex="2" name="tipo_scheda" id="tipo" style="width:50%;">
                <option value="sids">Scheda "Sindrome della morte improvvisa del lattante" SIDS</option>
                <option value="morte fetale">Scheda "Morte inaspettata del feto" (dopo la 25a settimana di gestazione)</option>
            </select>
        </label>
    </div>
    <div class="col-submit">
        <button class="menu">Crea</button>
    </div>

</form>