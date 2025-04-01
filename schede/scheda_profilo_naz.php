<!--
 * User: lucaferrari
 * Date: 12/06/15
 */
 -->
<?php
require_once("./db/centri_load.php");
loadPage();
if(isset($_POST["centri_nome"])){
    $nome = $_POST["centri_nome"];
}
else {
    $nome = null;
}
if(isset($_POST["centri_via"])){
    $via = $_POST["centri_via"];
}
else {
    $via = null;
}
if(isset($_POST["centri_cap"])){
    $cap = $_POST["centri_cap"];
}
else {
    $cap = null;
}
if(isset($_POST["centri_citta"])){
    $citta = $_POST["centri_citta"];
}
else {
    $citta = null;
}
if(isset($_POST["centri_telefono"])){
    $telefono = $_POST["centri_telefono"];
}
else {
    $telefono = null;
}
if(isset($_POST["centri_email"])){
    $email = $_POST["centri_email"];
}
else {
    $email = null;
}
if(isset($_POST["centri_info"])){
    $info = $_POST["centri_info"];
}
else {
    $info = null;
}
if(isset($_POST["centri_direttore"])){
    $direttore = $_POST["centri_direttore"];
}
else {
    $direttore = null;
}
if(isset($_POST["centri_responsabile"])){
    $responsabile = $_POST["centri_responsabile"];
}
else {
    $responsabile = null;
}
?>
<h1 align="center">Profilo Centro Nazionale</h1>

<form class="profilo" metho="GET" action="scheda_reg.php">
	<div class="col-1">
	    <label style="font-size: 15px; color: #000;">
	        Direttore
	        <p style="font-size: 12px; color: #000; text-transform:none;"><?php echo $direttore; ?></p>
	    </label>
	</div>
	<div class="col-1">
	    <label style="font-size: 15px; color: #000;">
	        Responsabile inserimento schede
	        <p style="font-size: 12px; color: #000; text-transform:none;"><?php echo $responsabile; ?></p>
	    </label>
	</div>
	<div class="col-1">
	    <label style="font-size: 15px; color: #000;">
	        Sede
	        <p style="font-size: 12px; color: #000; text-transform:none;"><?php echo $via." - ".$cap." ".$citta ; ?></p>
	    </label>
	</div>
	<div class="col-1">
	    <label style="font-size: 15px; color: #000;">
	        Telefono
	        <p style="font-size: 12px; color: #000; text-transform:none;"><?php echo $telefono; ?></p>
	    </label>
	</div>
    <div class="col-1">
        <label style="font-size: 15px; color: #000;">
            Email
            <p style="font-size: 12px; color: #000; text-transform:none;"><?php echo $email; ?></p>
        </label>
    </div>
    <div class="col-1">
        <label style="font-size: 15px; color: #000;">
            Presentazione centro
            <p style="font-size: 12px; color: #000; text-transform:none;"><?php echo $info; ?></p>
        </label>
    </div>
</form>

