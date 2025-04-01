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
require_once("./db/autopsia_load.php");
loadPage();
require_once("./db/loadtab_autopsia.php");
tab_autopsia();
if(isset($_POST["autopsia"])){
    $autopsia = $_POST["autopsia"];
    $class1 = "";
}
else {
    $autopsia = null;
    $class1 = "errors";
}

?>
<script>
 $(function() {
    $( "#autop" ).selectmenu();
    $('#autop').val('<?php echo $autopsia; ?>');
    $('#autop').selectmenu('refresh', true);
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
<script>
function popupCenter(url, title, w, h) {
var left = (screen.width/2)-(w/2);
var top = (screen.height/2)-(h/2);
return window.open(url, title, 'directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no, width='+w+', height='+h+', top='+top+', left='+left);
} 
</script>
<div id="dtBox"></div>
<br/<br/><br/>
<form id="adminform" name="adminform" action="db/autopsia_send.php" method="post">
    <div id="error" class="col-1">
		<label style="font-size: 10px; color: #e80d0d;" align="justify" class="cart">
		 <img src="img/info.png" style="width: 30px; height: 30px; vertical-align:middle;" onclick="popupCenter('comuni/popup6.php', 'Avviso!',510,200);" href="javascript:void(0);"/>
		</label>
	</div>
    <div class="col-1">
        <label style="padding-top: 9px;" <?php echo "class=".$class1; ?>>
            Autopsia effettuata? *<br/>
            <select tabindex="11" id="autop" name="autopsia" style="width:75%;" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
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