<?php
$p1="disabled";
$p2="disabled";
$p3="disabled";
$p4="disabled";
if(isset($_SESSION["perso_padreF"])){
  $perspf = $_SESSION["perso_padreF"];
  if($perspf == 'tabs')
    $p1 = "disabled";
  else
    $p1 = '';
}
else
  $perspf = 'tabs';
if(isset($_SESSION["fumo_pF"])){
  $fumopf = $_SESSION["fumo_pF"];
  if($fumopf == 'tabs')
    $p2 = "disabled";
  else
    $p2 = '';
}
else
  $fumopf = 'tabs';
if(isset($_SESSION["alcol_pF"])){
  $alcpf = $_SESSION["alcol_pF"];
  if($alcpf == 'tabs')
    $p3 = "disabled";
  else
    $p3 = '';
}
else
  $alcpf = 'tabs';

if(isset($_SESSION["farma_pF"])){
  $farmpf = $_SESSION["farma_pF"];
  if($farmpf == 'tabs')
    $p4 = "disabled";
  else
    $p4 = '';
}
else
  $farmpf = 'tabs';
  
  
	if ($tab == 1){
echo <<<STAMP
	<button class="tabs_att" id="t1" onclick="location.href='scheda_naz.php?scheda=padre&tab=1&tipo=feto'" $p1>Dati Personali</button>
	<button class="$fumopf" id="t3" onclick="location.href='scheda_naz.php?scheda=padre&tab=3&tipo=feto'" $p2>Fumo</button>
	<button class="$alcpf" id="t4" onclick="location.href='scheda_naz.php?scheda=padre&tab=4&tipo=feto'" $p3>Alcol/Stupefacenti</button>
	<button class="$farmpf" id="t5" onclick="location.href='scheda_naz.php?scheda=padre&tab=5&tipo=feto'" $p4>Farmaci</button>
STAMP;
	}
	if ($tab == 3){
echo <<<STAMP
	<button class="$perspf" id="t1" onclick="location.href='scheda_naz.php?scheda=padre&tab=1&tipo=feto'" $p1>Dati Personali</button>
	<button class="tabs_att" id="t3" onclick="location.href='scheda_naz.php?scheda=padre&tab=3&tipo=feto'" $p2>Fumo</button>
	<button class="$alcpf" id="t4" onclick="location.href='scheda_naz.php?scheda=padre&tab=4&tipo=feto'" $p3>Alcol/Stupefacenti</button>
	<button class="$farmpf" id="t5" onclick="location.href='scheda_naz.php?scheda=padre&tab=5&tipo=feto'" $p4>Farmaci</button>
STAMP;
	}
	if ($tab == 4){
echo <<<STAMP
	<button class="$perspf" id="t1" onclick="location.href='scheda_naz.php?scheda=padre&tab=1&tipo=feto'" $p1>Dati Personali</button>
	<button class="$fumopf" id="t3" onclick="location.href='scheda_naz.php?scheda=padre&tab=3&tipo=feto'" $p2>Fumo</button>
	<button class="tabs_att" id="t4" onclick="location.href='scheda_naz.php?scheda=padre&tab=4&tipo=feto'" $p3>Alcol/Stupefacenti</button>
	<button class="$farmpf" id="t5" onclick="location.href='scheda_naz.php?scheda=padre&tab=5&tipo=feto'" $p4>Farmaci</button>
STAMP;
	}
	if ($tab == 5){
echo <<<STAMP
	<button class="$perspf" id="t1" onclick="location.href='scheda_naz.php?scheda=padre&tab=1&tipo=feto'" $p1>Dati Personali</button>
	<button class="$fumopf" id="t3" onclick="location.href='scheda_naz.php?scheda=padre&tab=3&tipo=feto'" $p2>Fumo</button>
	<button class="$alcpf" id="t4" onclick="location.href='scheda_naz.php?scheda=padre&tab=4&tipo=feto'" $p3>Alcol/Stupefacenti</button>
	<button class="tabs_att" id="t5" onclick="location.href='scheda_naz.php?scheda=padre&tab=5&tipo=feto'" $p4>Farmaci</button>
STAMP;
	}
?>