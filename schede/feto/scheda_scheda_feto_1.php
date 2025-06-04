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
    require_once("./db/dati_feto_load.php");
    loadPage();
    require_once("./db/loadtab_feto.php");
    tab_feto();
    if(isset($_POST["dati_feto_cognome"])){
        $cognome = $_POST["dati_feto_cognome"];
        $class1 = "";
    }
    else {
        $cognome = null;
        $class1 = "errors";
    }
    if(isset($_POST["dati_feto_nome"])){
        $nome = $_POST["dati_feto_nome"];
        $class2 = "";
    }
    else {
        $nome = null;
        $class2 = "errors";
    }
    if(isset($_POST["dati_feto_via"])){
        $via = $_POST["dati_feto_via"];
        $class3 = "";
    }
    else {
        $via = null;
        $class3 = "errors";
    }
    if(isset($_POST["dati_feto_cap"])){
        $cap = $_POST["dati_feto_cap"];
        $class4 = "";
    }
    else {
        $cap = null;
        $class4 = "errors";
    }
    if(isset($_POST["dati_feto_comune"])){
        $comune = $_POST["dati_feto_comune"];
        $class5 = "";
    }
    else {
        $comune = null;
        $class5 = "errors";
    }
    if(isset($_POST["dati_feto_prov"])){
        $prov = $_POST["dati_feto_prov"];
        $class6 = "";
    }
    else {
        $prov = null;
        $class6 = "errors";
    }
    if(isset($_POST["dati_feto_dataU"])){
        list($year, $month, $day) = explode("-", $_POST['dati_feto_dataU']);
        $dataU = "$day-$month-$year";
        $class7 = "";
    }
    else {
        $dataU = null;
        $class7 = "errors";
    }
    if(isset($_POST["dati_feto_dataM"])) {
        list($year, $month, $day) = explode("-", $_POST['dati_feto_dataM']);
        $dataM = "$day-$month-$year";
        $class8 = "";
    }
    else {
        $dataM = null;
        $class8 = "errors";
    }
    if(isset($_POST["dati_feto_eta"])) {
        $eta = $_POST["dati_feto_eta"];
        $class9 = "";
    }
    else {
        $eta = null;
        $class9 = "errors";
    }
    if(isset($_POST["dati_feto_sex"])){
        $sex = $_POST["dati_feto_sex"];
        $class10 = "";
    }
    else {
        $sex = null;
        $class10 = "errors";
    }
    /*nuovi inserimenti*/

     if(isset($_POST["dati_feto_mortecome"])){
        $mortecome = $_POST["dati_feto_mortecome"];
        $class12 = "";
    }
    else {
        $mortecome = null;
        $class12 = "errors";
    }

     if(isset($_POST["dati_feto_mortedove"])){
        $mortedove = $_POST["dati_feto_mortedove"];
        $class13 = "";
    }
    else {
        $mortedove = null;
        $class13 = "errors";
    }

    if(isset($_POST["dati_feto_mortequando"])){
    list($year, $month, $day) = explode("-", $_POST['dati_feto_mortequando']);
    $mortequando = "$day-$month-$year";
    $class11 = "";
}
else {
    $mortequando = null;
    $class11 = "errors";
}


    
 
?>

 <script>
   $( document ).ready(function() {
    if (('<?php echo $dataM; ?>' == '') || ('<?php echo $_SESSION["stato"]; ?>' == 'chiusa') || ('<?php echo $_SESSION["stato"]; ?>' == 'chiusa_usr')){
        document.getElementById("dataU").disabled = true;
    }
    else {
        document.getElementById("dataU").disabled = false;
    }
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
       $( "#sex" ).selectmenu();
       $('#sex').val('<?php echo $sex; ?>');
      $('#sex').selectmenu('refresh', true);
   });
     
   $(function() {
    $( "#dataM" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-10:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0",//new Date(2015, 10 - 10, 29) //"+0D"
        onSelect: function(selectedDate) {
            $("#dataU").datepicker("option", "maxDate", selectedDate);
            $( "#dataU" ).datepicker( "option", "disabled", false );
       }
    });
   });
     
   $(function() {
    $( "#dataU" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-10:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: '<?php echo $dataM; ?>'  
    });
   });
     
   $(function() {
      $('#eta').keypad();    
  });

  $(function() {
    $( "#mortequando" ).datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: "-10:+0",
        changeMonth: true,
        changeYear: true,
        maxDate: "+0",//new Date(2015, 10 - 10, 29) //"+0D"
        
    });
   });
 console.log()
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
<br/><br/>
<form id="adminform" name="adminform" action="db/dati_feto_send.php" method="post">
    <div class="col-2">
        <label  <?php echo "class=".$class1; ?> >
            Cognome * <br/>
            <?php
                echo "<input id=\"cognome\" name=\"cognome\" $dis tabindex=\"1\" value=\"".$cognome."\">";
            ?>
        </label>
    </div>
    <div class="col-2">
        <label   <?php echo "class=".$class2; ?> >
            Nome * <br/>
            <?php
                echo "<input id=\"nome\" name=\"nome\" $dis tabindex=\"2\" value=\"".$nome."\">";
            ?>
        </label>
    </div>
    <div class="col-2b">
        <label>
            Via e numero<br/>
            <?php
                echo "<input id=\"via\" name=\"via\" $dis tabindex=\"3\" value=\"".$via."\">";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label >
            CAP<br/>
            <?php
                echo "<input id=\"cap\" name=\"cap\" $dis tabindex=\"4\" value=\"".$cap."\">";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label  <?php echo "class=".$class5; ?> >
            Comune *<br/>
            <?php
                echo "<input id=\"comune\" name=\"comune\" $dis tabindex=\"5\" value=\"".$comune."\">";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label  <?php echo "class=".$class6; ?> >
            Provincia *<br/>
            <?php
                echo "<input id=\"prov\" name=\"prov\" $dis tabindex=\"6\" value=\"".$prov."\">";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label style="padding-top: 8px;" <?php echo "class=".$class10; ?>  >
            Sesso *<br/>
            <select id="sex" style="width:75%;" tabindex="7" name="sex" <?php echo $dis; ?>>
                <option value=""> &nbsp </option>
                <option value="maschio">Maschio</option>
                <option value="femmina">Femmina</option>
            </select>
        </label>
    </div>
   <div class="col-3">
        <label style="padding-top:9px;" <?php echo "class=".$class8; ?>>
            Data della morte *<br/>
            <?php
                echo "<input type=\"text\" $dis id=\"dataM\" name=\"dataM\"  value=\"".$dataM."\" readonly>";
            ?>
        </label>
    </div> 
    <div class="col-3">
        <label <?php echo "class=".$class7; ?>>
            Data ultimo controllo * <sup>1</sup><br/>
            <?php
                echo "<input type=\"text\" $dis id=\"dataU\" name=\"dataU\"  value=\"".$dataU."\" readonly>";
            ?>
        </label>
    </div>
    <div class="col-3">
        <label style="padding-top:10px;" <?php echo "class=".$class9; ?>>
            Età (in settimane) *<br/>
            <?php
                echo "<input id=\"eta\" name=\"eta\" $dis value=\"".$eta."\" readonly>";
            ?>
        </label>
    </div>  
    <!-- nuovi div-->
    <div class="col-1">
        <label style="padding-top: 6px;" <?php echo "class=".$class3; ?>>
            Quando è stata riscontrata la morte? *<br/>
            <?php
                echo "<input type=\"text\" id=\"mortequando\" $dis name=\"mortequando\" value=\"".$mortequando."\" readonly>";
            ?>
        </label>
    </div>
    
     <div class="col-2">
		<label style="padding-top: 8px;" >
			Come è stata riscontrata la morte? <br/>
            <?php
			echo "<textarea name=\"mortecome\" style=\"height:40px;\" $dis tabindex=\"22\"> $mortecome</textarea>";
            ?>
		</label>
	</div>

     <div class="col-2">
		<label style="padding-top: 8px;" >
			Dove è stata riscontrata la morte? <br/>
            <?php
			echo "<textarea name=\"mortedove\" style=\"height:40px;\" $dis tabindex=\"22\"> $mortedove</textarea>";
            ?>
		</label>
	</div>

  
    
    


    <div class="col-9">
        <label style="font-size: 10px; color: #e80d0d;">
               * Campi obbligatori. <br/>
               <sup>1</sup> Inserire prima la data di morte.
        </label>
    </div> 
    <div class="col-7" style="visibility:hidden;">
        <label style="font-size: 15px; color: #000;">
                <?php
                     echo "<button class='guide' onclick='myFunction()'>Prec</button>";
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