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
<script type="text/javascript" src="js/number/jquery.keypad.js"></script>
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
  require_once("./db/ritrovamento_load.php");
  loadPage();
  require_once("./db/loadtab_scheda.php");
  tab_scheda();
  
  if(isset($_POST["ritrovamento_luogo_morte"])){
      $luogoM = $_POST["ritrovamento_luogo_morte"];
      $class3 = "";
  }
  else{ 
      $luogoM = null;
      $class3 = "errors";
  }
  if(isset($_POST["ritrovamento_posizione_sdraiato"])){
      $posiz = $_POST["ritrovamento_posizione_sdraiato"];
      $class4 = "";
  }
  else{ 
      $posiz = null;
      $class4 = "errors";
  }
  if(isset($_POST["ritrovamento_spec_sdraiato"])){
      $specSdra = $_POST["ritrovamento_spec_sdraiato"];
      $class5 = "";
  }
  else{ 
      $specSdra = null;
      $class5 = "errors";
  }
  if(isset($_POST["ritrovamento_abbigliamento"])){
      $abbigliam = $_POST["ritrovamento_abbigliamento"];
  }
  else{ 
      $abbigliam = null;
  }
  if(isset($_POST["ritrovamento_cuscino"])){
      $cusc = $_POST["ritrovamento_cuscino"];
      $class8 = "";
  }
  else{ 
      $cusc = null;
      $class8 = "errors";
  }
  if(isset($_POST["ritrovamento_succhiotto"])){
      $succh = $_POST["ritrovamento_succhiotto"];
      $class9 = "";
  }
  else{ 
      $succh = null;
      $class9 = "errors";
  }
  if(isset($_POST["ritrovamento_catenine"])){
      $catene = $_POST["ritrovamento_catenine"];
      $class10 = "";
  }
  else{ 
      $catene = null;
      $class10 = "errors";
  }
  if(isset($_POST["ritrovamento_giochi"])){
      $giochi = $_POST["ritrovamento_giochi"];
      $class11 = "";
  }
  else{ 
      $giochi = null;
      $class11 = "errors";
  }
  if(isset($_POST["ritrovamento_materasso"])){
      $matera = $_POST["ritrovamento_materasso"];
      $class12 = "";
  }
  else{ 
      $matera = null;
      $class12 = "errors";
  }
  if(isset($_POST["ritrovamento_rianimazione"])){
      $rianima = $_POST["ritrovamento_rianimazione"];
      $class13 = "";
  }
  else{ 
      $rianima = null;
      $class13 = "errors";
  }
  if(isset($_POST["ritrovamento_specRiani"])){
      $specRiani = $_POST["ritrovamento_specRiani"];
      $class24 = "";
  }
  else{ 
      $specRiani = null;
      $class24 = "errors";
  }
  
  //ospedale
  if(isset($_POST["ritrovamento_nome_ospedale"])){
      $nomeO = $_POST["ritrovamento_nome_ospedale"];
      $class14 = "";
  }
  else{ 
      $nomeO = null;
      $class14 = "errors";
  }
  
  //casa
  if(isset($_POST["ritrovamento_luogo_casa"])){
      $luogoC = $_POST["ritrovamento_luogo_casa"];
      $class15 = "";
  }
  else{ 
      $luogoC = null;
      $class15 = "errors";
  }
  if(isset($_POST["ritrovamento_specAC"])){
      $specAC = $_POST["ritrovamento_specAC"];
      $class16 = "";
  }
  else{ 
      $specAC = null;
      $class16 = "errors";
  }
  if(isset($_POST["ritrovamento_tempS"])){
      $tempS = $_POST["ritrovamento_tempS"];
      $class17 = "";
  }
  else{ 
      $tempS = null;
      $class17 = "errors";
  }
  if(isset($_POST["ritrovamento_tempB"])){
      $tempB = $_POST["ritrovamento_tempB"];
      $class18 = "";
  }
  else{ 
      $tempB = null;
      $class18 = "errors";
  }
  
  //fuori casa
if(isset($_POST["ritrovamento_luogo_spec"]) && !empty(trim($_POST["ritrovamento_luogo_spec"]))) {
    $luogoFC = trim($_POST["ritrovamento_luogo_spec"]);
    $class21 = "";
} else {
    $luogoFC = null;
    $class21 = "errors";
}

if(isset($_POST["ritrovamento_specA"]) && !empty(trim($_POST["ritrovamento_specA"]))) {
    $specFc = trim($_POST["ritrovamento_specA"]);
    $class22 = "";
} else {
    $specFc = null;
    $class22 = "errors";
}
?>
<script>
  $( document ).ready(function() {
    if ('<?php echo $luogoM; ?>' == 'ospedale'){
      document.getElementById('linea').style.display='none';
      document.getElementById('nomeOs').style.display='inline-block';
      document.getElementById('doveCasa').style.display='none';
      document.getElementById('specDove').style.display='none';
      document.getElementById('tempCasa').style.display='none';
      document.getElementById('tempBam').style.display='none';
      document.getElementById('doveFuori').style.display='none';
      document.getElementById('selDove').style.display='none';
    }
    if ('<?php echo $luogoM; ?>' == 'casa'){
      document.getElementById('linea').style.display='none';
      document.getElementById('nomeOs').style.display='none';
      document.getElementById('doveCasa').style.display='inline-block';
      document.getElementById('specDove').style.display='inline-block';
      document.getElementById('tempCasa').style.display='inline-block';
      document.getElementById('tempBam').style.display='inline-block';
      document.getElementById('doveFuori').style.display='none';
      document.getElementById('selDove').style.display='none';
    }
    if ('<?php echo $luogoM; ?>' == 'fuori casa'){
      document.getElementById('linea').style.display='none';
      document.getElementById('nomeOs').style.display='none';
      document.getElementById('doveCasa').style.display='none';
      document.getElementById('specDove').style.display='none';
      document.getElementById('tempCasa').style.display='none';
      document.getElementById('tempBam').style.display='none';
      document.getElementById('doveFuori').style.display='inline-block';
      document.getElementById('selDove').style.display='inline-block';
    }
    if (('<?php echo $luogoC; ?>' == 'in altro luogo') || ('<?php echo $luogoC; ?>' == 'a letto con altre persone')){
        document.getElementById('specDo').style.visibility = 'visible';
    }
    if ('<?php echo $luogoFC; ?>' == 'altro'){
        document.getElementById('sel').style.visibility = 'visible';
    }
    
    if ('<?php echo $posiz; ?>' == 'altra'){
        document.getElementById('selSd').style.visibility = 'visible';
    }
    
    if ('<?php echo $rianima; ?>' == 'Y'){
        document.getElementById('tenta').style.visibility = 'visible';
    }
      
  });
  $(function() {
      $('#tempStanza').keypad();    
  });
   
  $(function() {
      $('#tempBamb').keypad();    
  });
  
  $(function() {
      $( "#slctLuogo" ).selectmenu({
           change: function(event, ui){
                  var select = document.getElementById('slctLuogo');
                  var value = select.value;
                  if (value == 'ospedale') {
                      document.getElementById('linea').style.display='none';
                      document.getElementById('nomeOs').style.display='inline-block';
                      document.getElementById('doveCasa').style.display='none';
                      document.getElementById('specDove').style.display='none';
                      document.getElementById('tempCasa').style.display='none';
                      document.getElementById('tempBam').style.display='none';
                      document.getElementById('doveFuori').style.display='none';
                      document.getElementById('selDove').style.display='none';
                      return;
                  }
                  if (value == 'casa') {
                      document.getElementById('linea').style.display='none';
                      document.getElementById('nomeOs').style.display='none';
                      document.getElementById('doveCasa').style.display='inline-block';
                      document.getElementById('specDove').style.display='inline-block';
                      document.getElementById('tempCasa').style.display='inline-block';
                      document.getElementById('tempBam').style.display='inline-block';
                      document.getElementById('doveFuori').style.display='none';
                      document.getElementById('selDove').style.display='none';
                      return;
                  }
                  if (value == 'fuori casa') {
                    document.getElementById('linea').style.display='none';
                    document.getElementById('nomeOs').style.display='none';
                    document.getElementById('doveCasa').style.display='none';
                    document.getElementById('specDove').style.display='none';
                    document.getElementById('tempCasa').style.display='none';
                    document.getElementById('tempBam').style.display='none';
                    document.getElementById('doveFuori').style.display='inline-block';
                    document.getElementById('selDove').style.display='inline-block';
                   return;
                     }
                  else {
                      document.getElementById('linea').style.display='inline-block';
                      document.getElementById('nomeOs').style.display='none';
                      document.getElementById('doveCasa').style.display='none';
                      document.getElementById('specDove').style.display='none';
                      document.getElementById('tempCasa').style.display='none';
                      document.getElementById('tempBam').style.display='none';
                      document.getElementById('doveFuori').style.display='none';
                      document.getElementById('selDove').style.display='none';
                      return;  
                  }
              }
      });
      $("#slctLuogo").val('<?php echo $luogoM; ?>')
      $('#slctLuogo').selectmenu('refresh', true);
  });
  
  
  $(function() {
      $( "#slct" ).selectmenu({
           change: function(event, ui){
               var select = document.getElementById('slct');
                  var value = select.value;
                  if (value == 'altro') {
                     document.getElementById('sel').style.visibility = 'visible'; return;
                  }
                     document.getElementById('sel').style.visibility = 'hidden'; return;
           }
      });
      $("#slct").val('<?php echo $luogoFC; ?>')
      $('#slct').selectmenu('refresh', true);
  });
  
    
  $(function() {
      $( "#slctDo" ).selectmenu({
          change: function(event, ui){
          var select = document.getElementById('slctDo');
          var value = select.value;
          if (value == 'in altro luogo' || value == 'a letto con altre persone') {
             document.getElementById('specDo').style.visibility='visible';
          
          }
          else {
             document.getElementById('specDo').style.visibility='hidden';
          }
      }
      });
      $("#slctDo").val('<?php echo $luogoC; ?>')
      $('#slctDo').selectmenu('refresh', true);
  });
  
    
  $(function() {
      $( "#slctSd" ).selectmenu({
           change: function(event, ui){
               var select = document.getElementById('slctSd');
                  var value = select.value;
                  if (value == 'altra') {
                     document.getElementById('selSd').style.visibility = 'visible'; return;
                  }
                     document.getElementById('selSd').style.visibility = 'hidden'; return;
           }
      });
      $("#slctSd").val('<?php echo $posiz; ?>')
      $('#slctSd').selectmenu('refresh', true);
  });
  
  $(function() {
      $( "#riani" ).selectmenu({
           change: function(event, ui){
               var select = document.getElementById('riani');
                  var value = select.value;
                  if (value == 'Y') {
                     document.getElementById('tenta').style.visibility = 'visible'; return;
                  }
                     document.getElementById('tenta').style.visibility = 'hidden'; return;
           }
      });
      $('#riani').val('<?php echo $rianima; ?>');
      $('#riani').selectmenu('refresh', true);
  });
    
  $(function() {
      $( "#cuscino" ).selectmenu();
      $('#cuscino').val('<?php echo $cusc; ?>');
      $('#cuscino').selectmenu('refresh', true);
  });
  $(function() {
      $( "#succhiotto" ).selectmenu();
      $('#succhiotto').val('<?php echo $succh; ?>');
      $('#succhiotto').selectmenu('refresh', true);
  });
  $(function() {
      $( "#catenine" ).selectmenu();
      $('#catenine').val('<?php echo $catene; ?>');
      $('#catenine').selectmenu('refresh', true);
  });
  $(function() {
      $( "#oggetti" ).selectmenu();
      $('#oggetti').val('<?php echo $giochi; ?>');
      $('#oggetti').selectmenu('refresh', true);
  });
  $(function() {
      $( "#consist" ).selectmenu();
      $('#consist').val('<?php echo $matera; ?>');
      $('#consist').selectmenu('refresh', true);
  });
  $(function() {
      $( "#specriani" ).selectmenu();
      $('#specriani').val('<?php echo $specRiani; ?>');
      $('#specriani').selectmenu('refresh', true);
  });
$(document).ready(function()
  {

    $("#dtBox").DateTimePicker();

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
<form id="adminform" name="adminform" action="db/ritrovamento_send.php" method="post">  
    <div class="col-1">
        <label style="padding-top: 8px;" <?php echo "class=".$class3; ?>>
            Luogo di morte *<br/>
            <select tabindex="4" id="slctLuogo" name="luogoM" style="width:75%;" <?php echo $dis; ?>>
                <option value=""> &nbsp</option>
                <option value="ospedale">Ospedale</option>
                <option value="casa">Casa</option>
                <option value="fuori casa">Fuori casa</option>
            </select>
        </label>
    </div>
    <!--Inizio Ospedale-->
    <div class="col-1" id="linea">
        <label style="visibility:hidden;" >
            Nome ospedale *<br/>
            <input placeholder="" tabindex="1">
        </label>
    </div>
    <div class="col-1" id="nomeOs" style="display: none;">
        <label style="padding-top: 8px;" <?php echo "class=".$class14; ?>>
            Nome ospedale *<br/>
            <?php
              echo "<input id=\"nomeOsp\" $dis name=\"nomeOsp\" value=\"".$nomeO."\">";
            ?>
        </label>
    </div>
    <!--Fine Ospedale-->
    <!--Inizio Casa-->
    <div class="col-4" id="doveCasa" style="display: none;">
        <label style="padding-top: 6px;" <?php echo "class=".$class15; ?>>
            Dove? *<br/>
            <select tabindex="5" id="slctDo" style="width:100%;" name="selDoveCasa" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="in culla/lettino in camera coi genitori">In culla/lettino in camera coi genitori</option>
                <option value="in culla/lettino in camera separata">in culla/lettino in camera separata</option>
                <option value="in altro luogo">In altro luogo (specificare)</option>
                <option value="a letto coi genitori">A letto coi genitori</option>
                <option value="a letto con altre persone">A letto con altre persone (specificare)</option>
                <option value="nel seggiolone">Nel seggiolone</option>
                <option value="in braccio">In braccio</option>
                <option value="nel passeggino">Nel passeggino</option>
                <option value="nell infan-seat">Nell'infant-seat</option>
            </select>
        </label>
    </div>
    <div class="col-4" id="specDove" style="display: none;">
        <label id="specDo" style="visibility:hidden;" <?php echo "class=".$class16; ?>>
            Specificare *<br/>
            <?php
              echo "<input type=\"text\" id=\"spectx\" $dis name=\"specDv\" tabindex=\"6\" value=\"".$specAC."\">";
            ?>
        </label>
    </div>
    <div class="col-4" id="tempCasa" style="display: none; ">
        <label <?php echo "class=".$class17; ?>>
            Temperatura nella stanza (°C)*<br/>
            <?php
              echo "<input id=\"tempStanza\" $dis name=\"tempStanza\" tabindex=\"6\" style=\"width: 100%;\" readonly value=\"".$tempS."\">";
            ?>
        </label>
    </div>
    <div class="col-4" id="tempBam" style="display: none;">
        <label <?php echo "class=".$class18; ?>>
            Temperatura del bambino (°C)*<br/>
            <?php
              echo "<input id=\"tempBamb\" $dis name=\"tempBamb\" tabindex=\"6\" style=\"width: 100%;\" readonly value=\"".$tempB."\">";
            ?>
        </label>
    </div>
    <!--Fine Casa-->
    <!--Inizio Fuori Casa-->
    <div class="col-3" id="doveFuori" style="display: none;">
        <label style="padding-top: 9px;" <?php echo "class=".$class21; ?>>
            Dove? *<br/>
            <select tabindex="8" id="slct" style="width:100%;" name="doveFuo" <?php echo $dis; ?>>
                <option value=""> &nbsp</option>
                <option value="nel passeggino">Nel passeggino</option>
                <option value="nel seggiolino in automobile">Nel seggiolino in automobile</option>
                <option value="in braccio">In braccio</option>
                <option value="abitazione altrui">Abitazione altrui</option>
                <option value="altro">Altro (specificare)</option>
            </select>
        </label>
    </div>
    <div class="col-2b" id="selDove" style="display: none;">
        <label id="sel" style="visibility:hidden;padding-top:8px;" <?php echo "class=".$class22; ?>>
            Specificare *<br/>
            <?php
              echo "<input id=\"dove\" $dis name=\"specDoveFuo\" value=\"".$specFc."\">";
            ?>
        </label>
    </div>
    <!--Fine Fuori Casa-->
    <div class="col-3" >
        <label style="padding-top: 13px;">
            Abbigliamento indossato <br/>
            <?php
            echo "<input id=\"abbi\" $dis name=\"abbigliamento\" value=\"".$abbigliam."\">";
            ?>
        </label>
    </div>  
        
    <div class="col-3">
            <label style="padding-top: 16px;">
                SE SDRAIATO, la posizione era<br/>
                <select tabindex="9" id="slctSd" name="sdraiato" style="width:75%;" <?php echo $dis; ?>>
                    <option value=""> &nbsp </option>
                    <option value="supina">Supina</option>
                    <option value="prona">Prona</option>
                    <option value="sul fianco">Sul fianco</option>
                    <option value="altra">In altra posizione (specificare)</option>
                </select>
            </label>
        </div>
        <div class="col-3" >
            <label id="selSd" style="visibility:hidden;padding-top: 8px;" <?php echo "class=".$class5; ?>>
                Specificare *<br/>
                <?php
                echo "<textarea style=\"height:24px;\" $dis name=\"specPS\">".$specSdra."</textarea>";
                ?>
            </label>
        </div>
        <div class="col-4" style="width:20%">
            <label style="padding-top: 16px;" <?php echo "class=".$class8; ?>>
                Cuscino *<br/>
                <select tabindex="12" id="cuscino" style="width:75%;" name="cuscino" <?php echo $dis; ?>>
                    <option value=""> &nbsp </option>
                    <option value="Y">Si</option>
                    <option value="N">No</option>
                </select>
            </label>
        </div>
        <div class="col-4" style="width:23%">
            <label style="padding-top: 16px;" <?php echo "class=".$class9; ?>>
                Succhiotto in bocca *<br/>
                <select tabindex="13" id="succhiotto" style="width:75%;" name="succhiotto" <?php echo $dis; ?>>
                    <option value=""> &nbsp </option>
                    <option value="Y">Si</option>
                    <option value="N">No</option>
                </select>
            </label>
        </div>
        <div class="col-4" style="width:28.5%">
            <label style="padding-top: 16px;" <?php echo "class=".$class10; ?>>
                Catenine o nastri al collo *<br/>
                <select tabindex="14" id="catenine" style="width:75%;" name="catenine" <?php echo $dis; ?>>
                    <option value=""> &nbsp </option>
                    <option value="Y">Si</option>
                    <option value="N">No</option>
                </select>
            </label>
    </div>
        <div class="col-4" style="width:28.5%">
            <label style="padding-top: 16px;" <?php echo "class=".$class11; ?>>
                Oggetti/giocattoli nel lettino *<br/>
                <select tabindex="15" id="oggetti" style="width:75%;" name="giochi" <?php echo $dis; ?>>
                    <option value=""> &nbsp </option>
                    <option value="Y">Si</option>
                    <option value="N">No</option>
                </select>
            </label>
        </div>
        <div class="col-3">
            <label style="padding-top: 16px;" <?php echo "class=".$class12; ?>>
                Consistenza materasso *<br/>
                <select tabindex="15" id="consist" style="width:75%;" name="materasso" <?php echo $dis; ?>>
                    <option value=""> &nbsp </option>
                    <option value="morbido">Morbido</option>
                    <option value="semi rigido">Semi-rigido</option>
                    <option value="rigido">Rigido</option>
                </select>
            </label>
        </div>
        <div class="col-3">
            <label style="padding-top: 16px;" <?php echo "class=".$class13; ?>>
                Tentativo di rianimazione *<br/>
                <select tabindex="17" id="riani" style="width:75%;" name="rianimazione" <?php echo $dis; ?>>
                    <option value=""> &nbsp </option>
                    <option value="Y">Si (specifica)</option>
                    <option value="N">No</option>
                </select>
            </label>
        </div>
        <div class="col-3">
            <label id="tenta" style="padding-top: 16px; visibility: hidden;" <?php echo "class=".$class24; ?>>
                Tentativo eseguito da *<br/>
                <select tabindex="17" id="specriani" style="width:75%;" name="specRiani" <?php echo $dis; ?>>
                    <option value=""> &nbsp </option>
                    <option value="Genitore">Genitore</option>
                    <option value="medico 118">Medico 118</option>
                    <option value="altro 118">Personale 118 non medico</option>
                    <option value="testimone medico">Testimone con competenze mediche</option>
                    <option value="testimone non medico">Testimone senza competenze mediche</option>
                    <option value="mancante">Dato mancante</option>
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