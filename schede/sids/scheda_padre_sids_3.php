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
<!-- <script type="text/javascript" src="js/DateTimePicker.js"></script>
<link type="text/css" href="css/jquery.keypad.css" rel="stylesheet"> -->
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
    require_once("./db/padre_load.php");
    loadPage();
    require_once("./db/loadtab_padre.php");
    tab_padre();
    if(isset($_POST["fumo_padre_fumo"])){
        $fumo = $_POST["fumo_padre_fumo"];
        $class1 = "";
    }
    else {
        $fumo = null;
        $class1 = "errors";
    }
    if(isset($_POST["fumo_padre_num"])){
        $num = $_POST["fumo_padre_num"];
        $class2 = "";
    }
    else {
        $num = null;
        $class2 = "errors";
    }
?>
<script>
$( document ).ready(function() {
    if ('<?php echo $fumo; ?>' == 'Y'){
    document.getElementById('spec').style.visibility = 'visible';
    }
});

  $(function() {
      $('#numSig').keypad();    
  });

  $(function() {
      $( "#slct" ).selectmenu({
           change: function(event, ui){
               var select = document.getElementById('slct');
                  var value = select.value;
                  if (value == 'Y') {
                     document.getElementById('spec').style.visibility='visible'; return;
                  }
                     document.getElementById('spec').style.visibility='hidden'; return;
           }
      });
      $("#slct").val('<?php echo $fumo; ?>')
      $('#slct').selectmenu('refresh', true);

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
<form id="adminform" name="adminform" action="db/padre_send.php" method="post">
    <div class="col-2">
        <label style="padding-top: 5px;" <?php echo "class=".$class1; ?>>
            Fuma? *<br/>
            <select tabindex="13" id="slct" name="fumo" style="width:75%;" <?php echo $dis; ?>>
                <option value="">&nbsp</option>
                <option value="mancante">Dato Mancante</option>
                <option value="Y">Si (specificare)</option>
                <option value="N">No</option>
            </select>
        </label>
    </div>
    <div class="col-2">
        <label id="spec" style="visibility: hidden;padding-top: 3px;" <?php echo "class=".$class2; ?>>
            Numero sigarette/giorno *<br/>
            <?php
                echo "<input id=\"numSig\" $dis name=\"numSig\" style=\"width: 100%;\" readonly value=\"".$num."\">";
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