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
    $( "#tipo" ).selectmenu();
});
</script>
<h1 align="center">Crea Scheda</h1>

<form method="POST" action="./db/schede_send.php">
    <div id="error" class="col-1">
        <label style="font-size: 10px; color: #e80d0d;">
            *Campi obbligatori.
        </label>
    </div>
    <div class="col-1">
        <label>
            <?php
                require_once("./db/utils.php");
                generateCaseNum();
                $caseNum = 'reg_'.$_SESSION['case_id'].'/'.date('Y');
                echo "Id caso * <br/> <input name=\"idcaso\" value=".$caseNum." readonly>" 
            ?>
        </label>
    </div>
    <div class="col-1">
        <label>
            Altre informazioni utili all'identificazione del caso
            <input name="info" placeholder="(es. nome di fantasia, nome madre, nome bambino, ecc..">
        </label>
    </div>"
    <div class="col-1">
        <label>
            Tipologia *<br/>
            <select tabindex="2" name="tipo_scheda" id="tipo" style="width:75%;">
                <option value="sids">Scheda "Morte improvvisa infantile" (entro il 1° anno di vita) - SUID/SIDS</option>
                <option value="morte fetale">Scheda "Morte inaspettata del feto" (dopo la 25a settimana di gestazione)</option>
             
            </select>
        </label>
    </div>
    <div class="col-submit">
        <button class="menu">Crea</button>
    </div>

</form>