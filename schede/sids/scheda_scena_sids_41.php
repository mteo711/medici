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
  require_once("./db/ritrovamento_load2.php");
  loadPage();
  require_once("./db/loadtab_scheda.php");
  tab_scheda();
    $checked1 = "";
    $checked2 = "";
    $checked3 = "";
    $checked4 = "";
    $checked5 = "";
    $checked6 = "";
    $checked7 = "";
    $checked8 = "";
    $checked9 = "";
    $checked10 = "";
    $checked11 = "";
    $checked12 = "";
    $checked13 = "";
    $checked14 = "";
    $selected1 = "";
    $selected2 = "";
    $selected3 = "";
    $selected4 = "";
    $selected5 = "";
    $selected6 = "";
  if(isset($_POST["ritrovamento_organicoB"])){
      $orgB = $_POST["ritrovamento_organicoB"];
      $class1 = "";
      ($orgB == "Y") ? $selected1 = "selected" : $selected2 = "";
      ($orgB == "N") ? $selected2 = "selected" : $selected1 = "";
  }
  else{ 
      $orgB = null;
      $class1 = "errors";
  }
  if(isset($_POST["ritrovamento_tipoB"])){
      $tipoB = $_POST["ritrovamento_tipoB"];
      $class2 = "";
  }
  else{ 
      $tipoB = null;
      $class2 = "errors";
  }
  if(isset($_POST["ritrovamento_organicoN"])){
      $orgN = $_POST["ritrovamento_organicoN"];
      $class3 = "";
      ($orgN == "Y") ? $selected3 = "selected" : $selected4 = "";
      ($orgN == "N") ? $selected4 = "selected" : $selected3 = "";
  }
  else{ 
      $orgN = null;
      $class3 = "errors";
  }
  if(isset($_POST["ritrovamento_tipoN"])){
      $tipoN = $_POST["ritrovamento_tipoN"];
      $class4 = "";
  }
  else{ 
      $tipoN = null;
      $class4 = "errors";
  }
  if(isset($_POST["ritrovamento_organicoP"])){
      $orgP = $_POST["ritrovamento_organicoP"];
      $class5 = "";
      ($orgP == "Y") ? $selected5 = "selected" : $selected6 = "";
      ($orgP == "N") ? $selected6 = "selected" : $selected5 = "";
  }
  else{ 
      $orgP = null;
      $class5 = "errors";
  }
  if(isset($_POST["ritrovamento_tipoP"])){
      $tipoP = $_POST["ritrovamento_tipoP"];
      $class6 = "";
  }
  else{ 
      $tipoP = null;
      $class6 = "errors";
  }
  if(isset($_POST["ritrovamento_aspetto"])){
      $aspet = $_POST["ritrovamento_aspetto"];
      $class7 = "";
      $check = explode(",", $aspet);
      (in_array("decolorazione attorno al volto o bocca", $check)) ? $checked1 = "checked" : $checked1 = "";
      (in_array("sudato", $check)) ? $checked2 = "checked" : $checked2 = "";
      (in_array("secrezioni", $check)) ? $checked3 = "checked" : $checked3 = "";
      (in_array("flaccido", $check)) ? $checked4 = "checked" : $checked4 = "";
      (in_array("decolorazione cutanea", $check)) ? $checked5 = "checked" : $checked5 = "";
      (in_array("caldo", $check)) ? $checked6 = "checked" : $checked6 = "";
      (in_array("freddo", $check)) ? $checked7 = "checked" : $checked7 = "";
      (in_array("segni da pressione", $check)) ? $checked8 = "checked" : $checked8 = "";
      (in_array("rash o petecchie", $check)) ? $checked11 = "checked" : $checked11 = "";
      (in_array("rigido", $check)) ? $checked12 = "checked" : $checked12 = "";
      (in_array("impronte sul corpo", $check)) ? $checked13 = "checked" : $checked13 = "";
      (in_array("non valutato", $check)) ? $checked14 = "checked" : $checked14 = "";
  }
  else{ 
      $aspet = null;
      $class7 = "errors";
  }
  if(isset($_POST["ritrovamento_specAspetto"])){
      $specA = $_POST["ritrovamento_specAspetto"];
      $class8 = "";
  }
  else{ 
      $specA = null;
      $class8 = "errors";
  }
  if(($class7 == "errors")&&($class8 == "errors")){
      $class10 = "errors";
  }
  else{
      $class10 = "";
  }
  if(isset($_POST["ritrovamento_note"])){
      $note = $_POST["ritrovamento_note"];
  }
  else{ 
      $note = null;
  }
?>
<script>
    
  $( document ).ready(function() {
    if ('<?php echo $orgB; ?>' == 'Y'){
    document.getElementById('specMatB').style.visibility = 'visible';
    }
    if ('<?php echo $orgN; ?>' == 'Y'){
    document.getElementById('specMatN').style.visibility = 'visible';
    }
    if ('<?php echo $orgP; ?>' == 'Y'){
    document.getElementById('specMatP').style.visibility = 'visible';
    }
  });
  $(function() {
      $( "#slctMatB" ).selectmenu({
           change: function(event, ui){
               var select = document.getElementById('slctMatB');
                  var value = select.value;
                  if (value == 'Y') {
                     document.getElementById('specMatB').style.visibility = 'visible'; return;
                  }
                     document.getElementById('specMatB').style.visibility = 'hidden'; return;
           }
      });
      $("#slctMatB").val('<?php echo $orgB; ?>')
      $('#slctMatB').selectmenu('refresh', true);

  });
  $(function() {
      $( "#slctMatN" ).selectmenu({
           change: function(event, ui){
               var select = document.getElementById('slctMatN');
                  var value = select.value;
                  if (value == 'Y') {
                     document.getElementById('specMatN').style.visibility = 'visible'; return;
                  }
                     document.getElementById('specMatN').style.visibility = 'hidden'; return;
           }
      });
      $("#slctMatN").val('<?php echo $orgN; ?>')
      $('#slctMatN').selectmenu('refresh', true);
  
  });
  $(function() {
      $( "#slctMatP" ).selectmenu({
           change: function(event, ui){
               var select = document.getElementById('slctMatP');
                  var value = select.value;
                  if (value == 'Y') {
                     document.getElementById('specMatP').style.visibility = 'visible'; return;
                  }
                     document.getElementById('specMatP').style.visibility = 'hidden'; return;
           }
      });
      $("#slctMatP").val('<?php echo $orgP; ?>')
      $('#slctMatP').selectmenu('refresh', true);
  
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

<br/<br/><br/>
<form id="adminform" name="adminform" action="db/ritrovamento_send.php" method="post">
    <div class="col-2">
        <label style="padding-top: 8px;"  <?php echo "class=".$class1; ?>>
            Materiale organico in bocca *<br/>
            <select tabindex="18" id="slctMatB" style="width:50%;" name="organicoB" <?php echo $dis; ?>>
                <option value="" > &nbsp </option>
                <option value="Y" <?php echo $selected1; ?>>Si (specificare)</option>
                <option value="N" <?php echo $selected2; ?>>No</option>
            </select>
        </label>
    </div>
    <div class="col-2">
        <label id="specMatB" style="visibility:hidden;padding-top: 6px;"  <?php echo "class=".$class2; ?>>
            Specificare *<br/>
            <?php
            echo "<input id=\"matBocca\" $dis name=\"matBocca\" tabindex=\"19\" value=\"".$tipoB."\">";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 9px;"  <?php echo "class=".$class3; ?>>
            Materiale organico nel naso *<br/>
            <select tabindex="20" id="slctMatN" style="width:50%;" name="organicoN" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="Y" <?php echo $selected3; ?>>Si (specificare)</option>
                <option value="N" <?php echo $selected4; ?>>No</option>
            </select>
        </label>
    </div>
    <div class="col-2">
        <label id="specMatN" style="visibility:hidden;padding-top: 6px;"  <?php echo "class=".$class4; ?>>
            Specificare *<br/>
            <?php
            echo "<input id=\"matNaso\" $dis name=\"matNaso\" tabindex=\"21\" value=\"".$tipoN."\">";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 9px;"  <?php echo "class=".$class5; ?>>
            Materiale organico nel pannolino *<br/>
            <select tabindex="22" id="slctMatP" style="width:50%;" name="organicoP" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="Y" <?php echo $selected5; ?>>Si (specificare)</option>
                <option value="N" <?php echo $selected6; ?>>No</option>
            </select>
        </label>
    </div>
    <div class="col-2">
        <label id="specMatP" style="visibility:hidden;padding-top: 6px;"  <?php echo "class=".$class6; ?>>
            Specificare *<br/>
            <?php
            echo "<input id=\"matPanno\" $dis name=\"matPanno\" tabindex=\"23\" value=\"".$tipoP."\">";
            ?>
        </label>
    </div>
    <div class="col-1">
        <label style="font-size: 13px; color: #000;">
            Aspetto del bambino quando è stato trovato morto (selezionare anche più di una scelta) *<br/>
        </label>
    </div>
    <div class="col-12">
        <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
            <input type="checkbox" name="aspetto[]" value="decolorazione attorno al volto o bocca" style="margin-bottom: 0px;" <?php echo $checked1."  ".$dis;?>>
        </label>
    </div>
    <div class="col-14">
        <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
            Decolorazione attorno al volto/bocca
        </label>
    </div>	
    <div class="col-12">
        <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
            <input type="checkbox" name="aspetto[]" value="sudato" style="margin-bottom: 0px;" <?php echo $checked2."  ".$dis;?>>
        </label>
    </div>
    <div class="col-14">
        <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
            Sudato
        </label>
    </div>
    <div class="col-12">
    	    <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
    	        <input type="checkbox" name="aspetto[]" value="secrezioni" style="margin-bottom: 0px;" <?php echo $checked3."  ".$dis;?>>
    	    </label>
    	</div>
    	<div class="col-14">
    	    <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
    	        Secrezioni (schiuma/bava)
    	    </label>
    	</div>		
    <div class="col-12">
        <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
            <input type="checkbox" name="aspetto[]" value="flaccido" style="margin-bottom: 0px;" <?php echo $checked4."  ".$dis;?>>
        </label>
    </div>
    <div class="col-14">
        <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
            Flaccido
        </label>
    </div>
    <div class="col-12">
        <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
            <input type="checkbox" name="aspetto[]" value="decolorazione cutanea" style="margin-bottom: 0px;" <?php echo $checked5."  ".$dis;?>>
        </label>
    </div>
    <div class="col-14">
        <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
            Decolorazione cutanea (livor mortis)
        </label>
    </div>
    <div class="col-12">
        <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
            <input type="checkbox" name="aspetto[]" value="caldo" style="margin-bottom: 0px;" <?php echo $checked6."  ".$dis;?>>
        </label>
    </div>
    <div class="col-14">
        <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
            Caldo
        </label>
    </div>
   <div class="col-12">
       <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
           <input type="checkbox" name="aspetto[]" value="freddo" style="margin-bottom: 0px;" <?php echo $checked7."  ".$dis;?>>
       </label>
   </div>
   <div class="col-14">
       <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
           Freddo
       </label>
   </div>
   <div class="col-12">
       <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
           <input type="checkbox" name="aspetto[]" value="segni da pressione" style="margin-bottom: 0px;" <?php echo $checked8."  ".$dis;?>>
       </label>
   </div>
   <div class="col-14">
       <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
           Segni da pressione (aree pallide, decolorazioni)
       </label>
   </div>
   <div class="col-12">
       <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
           <input type="checkbox" name="aspetto[]" value="rash o petecchie" style="margin-bottom: 0px;" <?php echo $checked11."  ".$dis;?>>
       </label>
   </div>
   <div class="col-14">
       <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
           Rash o petecchie (piccole macchie rosse)
       </label>
   </div>
   <div class="col-12">
       <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
           <input type="checkbox" name="aspetto[]" value="rigido" style="margin-bottom: 0px;" <?php echo $checked12."  ".$dis;?>>
       </label>
   </div>
   <div class="col-14">
       <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
           Rigido
       </label>
   </div>
    <div class="col-12">
           <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
               <input type="checkbox" name="aspetto[]" value="impronte sul corpo" style="margin-bottom: 0px;" <?php echo $checked13."  ".$dis;?>>
           </label>
       </div>
       <div class="col-14">
           <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
               Impronte sul corpo (graffi o lividi) 
           </label>
       </div>   
    <div class="col-12">
        <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
            <input type="checkbox" name="aspetto[]" value="non valutato" style="margin-bottom: 0px;" <?php echo $checked14."  ".$dis;?>>
        </label>
    </div>
    <div class="col-14">
        <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
            Non valutato            
        </label>
    </div>   
    <div class="col-2">
        <label style="padding-top: 6px;"  <?php echo "class=".$class10; ?>>
            Altro (specificare) 
            <?php
            echo "<textarea name=\"altriCheck\" $dis style=\"height:20px; margin-bottom:-10px;\">".$specA."</textarea>";
            ?>
        </label>   
    </div>
    <div class="col-2">
        <label style="padding-top: 6px;">
            Note aspetto 
            <?php
            echo "<textarea name=\"note\" $dis style=\"height:20px; margin-bottom:-10px;\">".$note."</textarea>";
            ?>
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
                     echo "<button class='guide' onclick=\"performSubmit('succ_c')\">< Prec</button>";
                ?>
        
            </label>
        </div>
    <div class="col-7">
        <label style="font-size: 15px; color: #000;">
            <?php
                 echo "<button class='guide' onclick=\"performSubmit('succ_u')\">Succ ></button>";
            ?>            
            <input type="hidden" id="action" name="action"  value="" />    
        </label>
    </div>
</form>