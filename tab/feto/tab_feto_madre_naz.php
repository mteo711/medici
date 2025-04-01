<?php
$p1="disabled";
$p2="disabled";
$p3="disabled";
$p4="disabled";
$p5="disabled";
$p6="disabled";
$p7="disabled";
$p8="disabled";
$p9="disabled";
if(isset($_SESSION["perso_madreF"])){
  $persmf = $_SESSION["perso_madreF"];
  if($persmf == 'tabs')
    $p1 = "disabled";
  else
    $p1 = '';
}
else
  $persmf = 'tabs';
  
if(isset($_SESSION["part_precF"])){
  $partmf = $_SESSION["part_precF"];
  if($partmf == 'tabs')
    $p2 = "disabled";
  else
    $p2 = '';
}
else
  $partmf = 'tabs';
  
if(isset($_SESSION["fumo_attF"])){
  $fattf = $_SESSION["fumo_attF"];
  if($fattf == 'tabs')
    $p3 = "disabled";
  else
    $p3 = '';
}
else
  $fattf = 'tabs';
  
if(isset($_SESSION["fumo_passF"])){
  $fpassf = $_SESSION["fumo_passF"];
  if($fpassf == 'tabs')
    $p4 = "disabled";
  else
    $p4 = '';
}
else
  $fpassf = 'tabs';

if(isset($_SESSION["alcol_mF"])){
  $alcmf = $_SESSION["alcol_mF"];
  if($alcmf == 'tabs')
  	$p5 = "disabled";
  else
  	$p5 = '';
}
else
  $alcmf = 'tabs';

if(isset($_SESSION["farma_mF"])){
  $farmmf = $_SESSION["farma_mF"];
  if($farmmf == 'tabs')
  	$p6 = "disabled";
  else
  	$p6 = '';
}
else
  $farmmf = 'tabs';

if(isset($_SESSION["pato_mF"])){
  $patomf = $_SESSION["pato_mF"];
  if($patomf == 'tabs')
  	$p7 = "disabled";
  else
  	$p7 = '';
}
else
  $patomf = 'tabs';

if(isset($_SESSION["mestruoF"])){
  $mestruof = $_SESSION["mestruoF"];
  if($mestruof == 'tabs')
  	$p8 = "disabled";
  else
  	$p8 = '';
}
else
  $mestruof = 'tabs';

if(isset($_SESSION["frat_mF"])){
  $fratf = $_SESSION["frat_mF"];
  if($fratf == 'tabs')
  	$p9 = "disabled";
  else
  	$p9 = '';
}
else
  $fratf = 'tabs';

	if ($tab == 1){
echo <<<STAMP
	<button class="tabs_att" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=1&tipo=feto'" $p1>Dati Personali</button>
	<button class="$partmf" id="t2" onclick="location.href='scheda_naz.php?scheda=madre&tab=2&tipo=feto'" $p2>Aborti Precedenti</button>
    <button class="$fratf" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=8&tipo=feto'" $p9>Altri Figli</button>
<button class="$fattf" id="t3" onclick="location.href='scheda_naz.php?scheda=madre&tab=3&tipo=feto'" $p3>Fumo Attivo</button>
<button class="$fpassf" id="t30" onclick="location.href='scheda_naz.php?scheda=madre&tab=30&tipo=feto'" $p4>Fumo Passivo</button>
	<button class="$alcmf" id="t4" onclick="location.href='scheda_naz.php?scheda=madre&tab=4&tipo=feto'" $p5>Alcol/Stupefacenti</button>
	<button class="$farmmf" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=5&tipo=feto'" $p6>Farmaci</button>
	<button class="$patomf" id="t6" onclick="location.href='scheda_naz.php?scheda=madre&tab=6&tipo=feto'" $p7>Patologie gestante</button>
	<button class="$mestruof" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=7&tipo=feto'" $p8>Mestruazioni</button> 
STAMP;
	}
	if ($tab == 2){
	echo <<<STAMP
	<button class="$persmf" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=1&tipo=feto'" $p1>Dati Personali</button>
	<button class="tabs_att" id="t2" onclick="location.href='scheda_naz.php?scheda=madre&tab=2&tipo=feto'" $p2>Aborti Precedenti</button>
    <button class="$fratf" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=8&tipo=feto'" $p9>Altri Figli</button>
	<button class="$fattf" id="t3" onclick="location.href='scheda_naz.php?scheda=madre&tab=3&tipo=feto'" $p3>Fumo Attivo</button>
	<button class="$fpassf" id="t30" onclick="location.href='scheda_naz.php?scheda=madre&tab=30&tipo=feto'" $p4>Fumo Passivo</button>
	<button class="$alcmf" id="t4" onclick="location.href='scheda_naz.php?scheda=madre&tab=4&tipo=feto'" $p5>Alcol/Stupefacenti</button>
	<button class="$farmmf" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=5&tipo=feto'" $p6>Farmaci</button>
	<button class="$patomf" id="t6" onclick="location.href='scheda_naz.php?scheda=madre&tab=6&tipo=feto'" $p7>Patologie gestante</button>
	<button class="$mestruof" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=7&tipo=feto'" $p8>Mestruazioni</button> 
STAMP;
	}
	if ($tab == 3){
echo <<<STAMP
	<button class="$persmf" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=1&tipo=feto'" $p1>Dati Personali</button>
	<button class="$partmf" id="t2" onclick="location.href='scheda_naz.php?scheda=madre&tab=2&tipo=feto'" $p2>Aborti Precedenti</button>
    <button class="$fratf" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=8&tipo=feto'" $p9>Altri Figli</button>
	<button class="tabs_att" id="t3" onclick="location.href='scheda_naz.php?scheda=madre&tab=3&tipo=feto'" $p3>Fumo Attivo</button>
	<button class="$fpassf" id="t30" onclick="location.href='scheda_naz.php?scheda=madre&tab=30&tipo=feto'" $p4>Fumo Passivo</button>
	<button class="$alcmf" id="t4" onclick="location.href='scheda_naz.php?scheda=madre&tab=4&tipo=feto'" $p5>Alcol/Stupefacenti</button>
	<button class="$farmmf" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=5&tipo=feto'" $p6>Farmaci</button>
	<button class="$patomf" id="t6" onclick="location.href='scheda_naz.php?scheda=madre&tab=6&tipo=feto'" $p7>Patologie gestante</button>
	<button class="$mestruof" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=7&tipo=feto'" $p8>Mestruazioni</button>
STAMP;
	}
	if ($tab == 30){
echo <<<STAMP
	<button class="$persmf" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=1&tipo=feto'" $p1>Dati Personali</button>
	<button class="$partmf" id="t2" onclick="location.href='scheda_naz.php?scheda=madre&tab=2&tipo=feto'" $p2>Aborti Precedenti</button>
    <button class="$fratf" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=8&tipo=feto'" $p9>Altri Figli</button>
	<button class="$fattf" id="t3" onclick="location.href='scheda_naz.php?scheda=madre&tab=3&tipo=feto'" $p3>Fumo Attivo</button>
	<button class="tabs_att" id="t30" onclick="location.href='scheda_naz.php?scheda=madre&tab=30&tipo=feto'" $p4>Fumo Passivo</button>
	<button class="$alcmf" id="t4" onclick="location.href='scheda_naz.php?scheda=madre&tab=4&tipo=feto'" $p5>Alcol/Stupefacenti</button>
	<button class="$farmmf" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=5&tipo=feto'" $p6>Farmaci</button>
	<button class="$patomf" id="t6" onclick="location.href='scheda_naz.php?scheda=madre&tab=6&tipo=feto'" $p7>Patologie gestante</button>
	<button class="$mestruof" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=7&tipo=feto'" $p8>Mestruazioni</button>
STAMP;
	}
	if ($tab == 4){
echo <<<STAMP
	<button class="$persmf" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=1&tipo=feto'" $p1>Dati Personali</button>
	<button class="$partmf" id="t2" onclick="location.href='scheda_naz.php?scheda=madre&tab=2&tipo=feto'" $p2>Aborti Precedenti</button>
    <button class="$fratf" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=8&tipo=feto'" $p9>Altri Figli</button>
	<button class="$fattf" id="t3" onclick="location.href='scheda_naz.php?scheda=madre&tab=3&tipo=feto'" $p3>Fumo Attivo</button>
	<button class="$fpassf" id="t30" onclick="location.href='scheda_naz.php?scheda=madre&tab=30&tipo=feto'" $p4>Fumo Passivo</button>
	<button class="tabs_att" id="t4" onclick="location.href='scheda_naz.php?scheda=madre&tab=4&tipo=feto'" $p5>Alcol/Stupefacenti</button>
	<button class="$farmmf" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=5&tipo=feto'" $p6>Farmaci</button>
	<button class="$patomf" id="t6" onclick="location.href='scheda_naz.php?scheda=madre&tab=6&tipo=feto'" $p7>Patologie gestante</button>
	<button class="$mestruof" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=7&tipo=feto'" $p8>Mestruazioni</button>
STAMP;
	}
	if ($tab == 5){
echo <<<STAMP
	<button class="$persmf" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=1&tipo=feto'" $p1>Dati Personali</button>
	<button class="$partmf" id="t2" onclick="location.href='scheda_naz.php?scheda=madre&tab=2&tipo=feto'" $p2>Aborti Precedenti</button>
    <button class="$fratf" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=8&tipo=feto'" $p9>Altri Figli</button>
	<button class="$fattf" id="t3" onclick="location.href='scheda_naz.php?scheda=madre&tab=3&tipo=feto'" $p3>Fumo Attivo</button>
	<button class="$fpassf" id="t30" onclick="location.href='scheda_naz.php?scheda=madre&tab=30&tipo=feto'" $p4>Fumo Passivo</button>
	<button class="$alcmf" id="t4" onclick="location.href='scheda_naz.php?scheda=madre&tab=4&tipo=feto'" $p5>Alcol/Stupefacenti</button>
	<button class="tabs_att" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=5&tipo=feto'" $p6>Farmaci</button>
	<button class="$patomf" id="t6" onclick="location.href='scheda_naz.php?scheda=madre&tab=6&tipo=feto'" $p7>Patologie gestante</button>
	<button class="$mestruof" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=7&tipo=feto'" $p8>Mestruazioni</button>
STAMP;
	}
	if ($tab == 6){
echo <<<STAMP
	<button class="$persmf" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=1&tipo=feto'" $p1>Dati Personali</button>
	<button class="$partmf" id="t2" onclick="location.href='scheda_naz.php?scheda=madre&tab=2&tipo=feto'" $p2>Aborti Precedenti</button>
    <button class="$fratf" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=8&tipo=feto'" $p9>Altri Figli</button>
	<button class="$fattf" id="t3" onclick="location.href='scheda_naz.php?scheda=madre&tab=3&tipo=feto'" $p3>Fumo Attivo</button>
	<button class="$fpassf" id="t30" onclick="location.href='scheda_naz.php?scheda=madre&tab=30&tipo=feto'" $p4>Fumo Passivo</button>
	<button class="$alcmf" id="t4" onclick="location.href='scheda_naz.php?scheda=madre&tab=4&tipo=feto'" $p5>Alcol/Stupefacenti</button>
	<button class="$farmmf" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=5&tipo=feto'" $p6>Farmaci</button>
	<button class="tabs_att" id="t6" onclick="location.href='scheda_naz.php?scheda=madre&tab=6&tipo=feto'" $p7>Patologie gestante</button>
	<button class="$mestruof" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=7&tipo=feto'" $p8>Mestruazioni</button>
STAMP;
	}
	if ($tab == 7){
echo <<<STAMP
	<button class="$persmf" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=1&tipo=feto'" $p1>Dati Personali</button>
	<button class="$partmf" id="t2" onclick="location.href='scheda_naz.php?scheda=madre&tab=2&tipo=feto'" $p2>Aborti Precedenti</button>
    <button class="$fratf" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=8&tipo=feto'" $p9>Altri Figli</button>
	<button class="$fattf" id="t3" onclick="location.href='scheda_naz.php?scheda=madre&tab=3&tipo=feto'" $p3>Fumo Attivo</button>
	<button class="$fpassf" id="t30" onclick="location.href='scheda_naz.php?scheda=madre&tab=30&tipo=feto'" $p4>Fumo Passivo</button>
	<button class="$alcmf" id="t4" onclick="location.href='scheda_naz.php?scheda=madre&tab=4&tipo=feto'" $p5>Alcol/Stupefacenti</button>
	<button class="$farmmf" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=5&tipo=feto'" $p6>Farmaci</button>
	<button class="$patomf" id="t6" onclick="location.href='scheda_naz.php?scheda=madre&tab=6&tipo=feto'" $p7>Patologie gestante</button>
	<button class="tabs_att" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=7&tipo=feto'" $p8>Mestruazioni</button> 
STAMP;
	}
	if ($tab == 8){
echo <<<STAMP
	<button class="$persmf" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=1&tipo=feto'" $p1>Dati Personali</button>
	<button class="$partmf" id="t2" onclick="location.href='scheda_naz.php?scheda=madre&tab=2&tipo=feto'" $p2>Aborti Precedenti</button>
    <button class="tabs_att" id="t1" onclick="location.href='scheda_naz.php?scheda=madre&tab=8&tipo=feto'" $p9>Altri Figli</button>
	<button class="$fattf" id="t3" onclick="location.href='scheda_naz.php?scheda=madre&tab=3&tipo=feto'" $p3>Fumo Attivo</button>
	<button class="$fpassf" id="t30" onclick="location.href='scheda_naz.php?scheda=madre&tab=30&tipo=feto'" $p4>Fumo Passivo</button>
	<button class="$alcmf" id="t4" onclick="location.href='scheda_naz.php?scheda=madre&tab=4&tipo=feto'" $p5>Alcol/Stupefacenti</button>
	<button class="$farmmf" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=5&tipo=feto'" $p6>Farmaci</button>
	<button class="$patomf" id="t6" onclick="location.href='scheda_naz.php?scheda=madre&tab=6&tipo=feto'" $p7>Patologie gestante</button>
	<button class="$mestruof" id="t5" onclick="location.href='scheda_naz.php?scheda=madre&tab=7&tipo=feto'" $p8>Mestruazioni</button>
STAMP;
	}
?>