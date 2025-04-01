<?php
$p1="disabled";
$p2="disabled";
$p3="disabled";
$p4="disabled";
$p5="disabled";
$p6="disabled";
$p7="disabled";
$p8="disabled";
if(isset($_SESSION["perso_madre"])){
  $persm = $_SESSION["perso_madre"];
  if($persm == 'tabs')
    $p1 = "disabled";
  else
    $p1 = '';
}
else
  $persm = 'tabs';
  
if(isset($_SESSION["part_prec"])){
  $partm = $_SESSION["part_prec"];
  if($partm == 'tabs')
    $p2 = "disabled";
  else
    $p2 = '';
}
else
  $partm = 'tabs';
  
if(isset($_SESSION["fumo_att"])){
  $fatt = $_SESSION["fumo_att"];
  if($fatt == 'tabs')
    $p3 = "disabled";
  else
    $p3 = '';
}
else
  $fatt = 'tabs';
  
if(isset($_SESSION["fumo_pass"])){
  $fpass = $_SESSION["fumo_pass"];
  if($fpass == 'tabs')
    $p4 = "disabled";
  else
    $p4 = '';
}
else
  $fpass = 'tabs';
if(isset($_SESSION["alcol_m"])){
  $alcm = $_SESSION["alcol_m"];
  if($alcm == 'tabs')
  	$p5 = "disabled";
  else
  	$p5 = '';
}
else
  $alcm = 'tabs';

if(isset($_SESSION["farma_m"])){
  $farmm = $_SESSION["farma_m"];
  if($farmm == 'tabs')
  	$p6 = "disabled";
  else
  	$p6 = '';
}
else
  $farmm = 'tabs';

if(isset($_SESSION["pato_m"])){
  $patom = $_SESSION["pato_m"];
  if($patom == 'tabs')
  	$p7 = "disabled";
  else
  	$p7 = '';
}
else
  $patom = 'tabs';

if(isset($_SESSION["frat_m"])){
  $frat = $_SESSION["frat_m"];
  if($frat == 'tabs')
  	$p8 = "disabled";
  else
  	$p8 = '';
}
else
  $frat = 'tabs';
  
  
	if ($tab == 1){
echo <<<STAMP
	<button class="tabs_att" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=1&tipo=sids'" $p1>Dati Personali</button>
	<button class="$partm" id="t2" onclick="location.href='scheda_naz.php?scheda=madre&tab=2&tipo=sids'" $p2>Aborti Precedenti</button>
    <button class="$frat" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=7&tipo=sids'" $p8>Altri Figli</button>
<button class="$fatt" id="t3" onclick="location.href='scheda_naz.php?scheda=madre&tab=3&tipo=sids'" $p3>Fumo Attivo</button>
<button class="$fpass" id="t30" onclick="location.href='scheda_naz.php?scheda=madre&tab=30&tipo=sids'" $p4>Fumo Passivo</button>
	<button class="$alcm" id="t4" onclick="location.href='scheda_naz.php?scheda=madre&tab=4&tipo=sids'" $p5>Alcol/Stupefacenti</button>
	<button class="$farmm" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=5&tipo=sids'" $p6>Farmaci</button>
	<button class="$patom" id="t6" onclick="location.href='scheda_naz.php?scheda=madre&tab=6&tipo=sids'" $p7>Patologie gestante</button>
STAMP;
	}
	if ($tab == 2){
	echo <<<STAMP
	<button class="$persm" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=1&tipo=sids'" $p1>Dati Personali</button>
	<button class="tabs_att" id="t2" onclick="location.href='scheda_naz.php?scheda=madre&tab=2&tipo=sids'" $p2>Aborti Precedenti</button>
    <button class="$frat" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=7&tipo=sids'" $p8>Altri Figli</button>
	<button class="$fatt" id="t3" onclick="location.href='scheda_naz.php?scheda=madre&tab=3&tipo=sids'" $p3>Fumo Attivo</button>
	<button class="$fpass" id="t30" onclick="location.href='scheda_naz.php?scheda=madre&tab=30&tipo=sids'" $p4>Fumo Passivo</button>
	<button class="$alcm" id="t4" onclick="location.href='scheda_naz.php?scheda=madre&tab=4&tipo=sids'" $p5>Alcol/Stupefacenti</button>
	<button class="$farmm" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=5&tipo=sids'" $p6>Farmaci</button>
	<button class="$patom" id="t6" onclick="location.href='scheda_naz.php?scheda=madre&tab=6&tipo=sids'" $p7>Patologie gestante</button>
STAMP;
	}
	if ($tab == 3){
echo <<<STAMP
	<button class="$persm" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=1&tipo=sids'" $p1>Dati Personali</button>
	<button class="$partm" id="t2" onclick="location.href='scheda_naz.php?scheda=madre&tab=2&tipo=sids'" $p2>Aborti Precedenti</button>
    <button class="$frat" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=7&tipo=sids'" $p8>Altri Figli</button>
	<button class="tabs_att" id="t3" onclick="location.href='scheda_naz.php?scheda=madre&tab=3&tipo=sids'" $p3>Fumo Attivo</button>
	<button class="$fpass" id="t30" onclick="location.href='scheda_naz.php?scheda=madre&tab=30&tipo=sids'" $p4>Fumo Passivo</button>
	<button class="$alcm" id="t4" onclick="location.href='scheda_naz.php?scheda=madre&tab=4&tipo=sids'" $p5>Alcol/Stupefacenti</button>
	<button class="$farmm" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=5&tipo=sids'" $p6>Farmaci</button>
	<button class="$patom" id="t6" onclick="location.href='scheda_naz.php?scheda=madre&tab=6&tipo=sids'" $p7>Patologie gestante</button>
STAMP;
	}
	if ($tab == 30){
echo <<<STAMP
	<button class="$persm" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=1&tipo=sids'" $p1>Dati Personali</button>
	<button class="$partm" id="t2" onclick="location.href='scheda_naz.php?scheda=madre&tab=2&tipo=sids'" $p2>Aborti Precedenti</button>
    <button class="$frat" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=7&tipo=sids'" $p8>Altri Figli</button>
	<button class="$fatt" id="t3" onclick="location.href='scheda_naz.php?scheda=madre&tab=3&tipo=sids'" $p3>Fumo Attivo</button>
	<button class="tabs_att" id="t30" onclick="location.href='scheda_naz.php?scheda=madre&tab=30&tipo=sids'" $p4>Fumo Passivo</button>
	<button class="$alcm" id="t4" onclick="location.href='scheda_naz.php?scheda=madre&tab=4&tipo=sids'" $p5>Alcol/Stupefacenti</button>
	<button class="$farmm" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=5&tipo=sids'" $p6>Farmaci</button>
	<button class="$patom" id="t6" onclick="location.href='scheda_naz.php?scheda=madre&tab=6&tipo=sids'" $p7>Patologie gestante</button>
STAMP;
	}
	if ($tab == 4){
echo <<<STAMP
	<button class="$persm" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=1&tipo=sids'" $p1>Dati Personali</button>
	<button class="$partm" id="t2" onclick="location.href='scheda_naz.php?scheda=madre&tab=2&tipo=sids'" $p2>Aborti Precedenti</button>
    <button class="$frat" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=7&tipo=sids'" $p8>Altri Figli</button>
	<button class="$fatt" id="t3" onclick="location.href='scheda_naz.php?scheda=madre&tab=3&tipo=sids'" $p3>Fumo Attivo</button>
	<button class="$fpass" id="t30" onclick="location.href='scheda_naz.php?scheda=madre&tab=30&tipo=sids'" $p4>Fumo Passivo</button>
	<button class="tabs_att" id="t4" onclick="location.href='scheda_naz.php?scheda=madre&tab=4&tipo=sids'" $p5>Alcol/Stupefacenti</button>
	<button class="$farmm" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=5&tipo=sids'" $p6>Farmaci</button>
	<button class="$patom" id="t6" onclick="location.href='scheda_naz.php?scheda=madre&tab=6&tipo=sids'" $p7>Patologie gestante</button>
STAMP;
	}
	if ($tab == 5){
echo <<<STAMP
	<button class="$persm" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=1&tipo=sids'" $p1>Dati Personali</button>
	<button class="$partm" id="t2" onclick="location.href='scheda_naz.php?scheda=madre&tab=2&tipo=sids'" $p2>Aborti Precedenti</button>
    <button class="$frat" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=7&tipo=sids'" $p8>Altri Figli</button>
	<button class="$fatt" id="t3" onclick="location.href='scheda_naz.php?scheda=madre&tab=3&tipo=sids'" $p3>Fumo Attivo</button>
	<button class="$fpass" id="t30" onclick="location.href='scheda_naz.php?scheda=madre&tab=30&tipo=sids'" $p4>Fumo Passivo</button>
	<button class="$alcm" id="t4" onclick="location.href='scheda_naz.php?scheda=madre&tab=4&tipo=sids'" $p5>Alcol/Stupefacenti</button>
	<button class="tabs_att" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=5&tipo=sids'" $p6>Farmaci</button>
	<button class="$patom" id="t6" onclick="location.href='scheda_naz.php?scheda=madre&tab=6&tipo=sids'" $p7>Patologie gestante</button>
STAMP;
	}
	if ($tab == 6){
echo <<<STAMP
	<button class="$persm" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=1&tipo=sids'" $p1>Dati Personali</button>
	<button class="$partm" id="t2" onclick="location.href='scheda_naz.php?scheda=madre&tab=2&tipo=sids'" $p2>Aborti Precedenti</button>
    <button class="$frat" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=7&tipo=sids'" $p8>Altri Figli</button>
	<button class="$fatt" id="t3" onclick="location.href='scheda_naz.php?scheda=madre&tab=3&tipo=sids'" $p3>Fumo Attivo</button>
	<button class="$fpass" id="t30" onclick="location.href='scheda_naz.php?scheda=madre&tab=30&tipo=sids'" $p4>Fumo Passivo</button>
	<button class="$alcm" id="t4" onclick="location.href='scheda_naz.php?scheda=madre&tab=4&tipo=sids'" $p5>Alcol/Stupefacenti</button>
	<button class="$farmm" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=5&tipo=sids'" $p6>Farmaci</button>
	<button class="tabs_att" id="t6" onclick="location.href='scheda_naz.php?scheda=madre&tab=6&tipo=sids'" $p7>Patologie gestante</button>
STAMP;
	}
	if ($tab == 7){
echo <<<STAMP
	<button class="$persm" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=1&tipo=sids'" $p1>Dati Personali</button>
	<button class="$partm" id="t2" onclick="location.href='scheda_naz.php?scheda=madre&tab=2&tipo=sids'" $p2>Aborti Precedenti</button>
    <button class="tabs_att" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=7&tipo=sids'" $p8>Altri Figli</button>
	<button class="$fatt" id="t3" onclick="location.href='scheda_naz.php?scheda=madre&tab=3&tipo=sids'" $p3>Fumo Attivo</button>
	<button class="$fpass" id="t30" onclick="location.href='scheda_naz.php?scheda=madre&tab=30&tipo=sids'" $p4>Fumo Passivo</button>
	<button class="$alcm" id="t4" onclick="location.href='scheda_naz.php?scheda=madre&tab=4&tipo=sids'" $p5>Alcol/Stupefacenti</button>
	<button class="$farmm" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=5&tipo=sids'" $p6>Farmaci</button>
	<button class="$patom" id="t6" onclick="location.href='scheda_naz.php?scheda=madre&tab=6&tipo=sids'" $p7>Patologie gestante</button>
STAMP;
	}
?>