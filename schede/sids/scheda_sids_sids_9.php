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
<?php
    if (($_SESSION["stato"] == 'chiusa') || ($_SESSION["stato"] == 'chiusa_usr')){
        $dis = "disabled";
    }
    else {
        $dis = "";
    }
require_once("./db/scheda_sids_load.php");
loadPage();
//require_once("./comuni/loadtab_latt.php");
require_once("./db/loadtab_latt.php");
tab_lattante();
if(isset($_POST["scheda_sids_posizione"])){
    $posiz = $_POST["scheda_sids_posizione"];
    $class1 = "";
}
else{ 
    $posiz = null;
    $class1 = "errors";
}
if(isset($_POST["scheda_sids_succhiotto"])){
    $succh = $_POST["scheda_sids_succhiotto"];
    $class2 = "";
}
else {
    $succh = null;
    $class2 = "errors";
}
?>
<script>
  $(function() {
      $( "#come" ).selectmenu();
      $('#come').val('<?php echo $posiz; ?>');
      $('#come').selectmenu('refresh', true);
  });
  $(function() {
      $( "#succhi" ).selectmenu();
      $('#succhi').val('<?php echo $succh; ?>');
      $('#succhi').selectmenu('refresh', true);
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
<form id="adminform" name="adminform" action="db/scheda_sids_send.php" method="post">
    <div class="col-2">
        <label style="padding-top: 6px;" <?php echo "class=".$class1; ?>>
            Come dormiva di solito? *<br/>
            <select tabindex="19" id="come" name="dormire" style="width:75%;" <?php echo $dis; ?>>
            <option value=''> &nbsp </option>
            <option value='mancante'>Dato Mancante</option>
            <option value='supino'>Supino</option>
            <option value='prono'>Prono</option>
            <option value='fianco'>Sul fianco</option>
            <option value='mai stessa posizione'>Non restava mai nella stessa posizione</option>
        </select>
    </label>
    </div>
    <div class="col-2">
        <label style="padding-top: 6px;" <?php echo "class=".$class2; ?>>
            Con il succhiotto? *<br/>
            <select tabindex="20" id="succhi" name="succhi" style="width:75%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="mancante">Dato Mancante</option>
                <option value="Y">Si</option>
                <option value="N">No</option>
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