<?php
$p1="disabled";
$p2="disabled";
$p3="disabled";
$p4="disabled";
if(isset($_SESSION["perso_padre"])){
  $persp = $_SESSION["perso_padre"];
  if($persp == 'tabs')
    $p1 = "disabled";
  else
    $p1 = '';
}
else
  $persp = 'tabs';
if(isset($_SESSION["fumo_p"])){
  $fumop = $_SESSION["fumo_p"];
  if($fumop == 'tabs')
    $p2 = "disabled";
  else
    $p2 = '';
}
else
  $fumop = 'tabs';
if(isset($_SESSION["alcol_p"])){
  $alcp = $_SESSION["alcol_p"];
  if($alcp == 'tabs')
    $p3 = "disabled";
  else
    $p3 = '';
}
else
  $alcp = 'tabs';

if(isset($_SESSION["farma_p"])){
  $farmp = $_SESSION["farma_p"];
  if($farmp == 'tabs')
    $p4 = "disabled";
  else
    $p4 = '';
}
else
  $farmp = 'tabs';
  
  
	if ($tab == 1){
echo <<<STAMP
	<button class="tabs_att" id="t1" onclick="location.href='scheda_reg.php?scheda=padre&tab=1&tipo=sids'" $p1>Dati Personali</button>
	<button class="$fumop" id="t3" onclick="location.href='scheda_reg.php?scheda=padre&tab=3&tipo=sids'" $p2>Fumo</button>
	<button class="$alcp" id="t4" onclick="location.href='scheda_reg.php?scheda=padre&tab=4&tipo=sids'" $p3>Alcol/Stupefacenti</button>
	<button class="$farmp" id="t5" onclick="location.href='scheda_reg.php?scheda=padre&tab=5&tipo=sids'" $p4>Farmaci</button>
STAMP;
	}
	if ($tab == 3){
echo <<<STAMP
	<button class="$persp" id="t1" onclick="location.href='scheda_reg.php?scheda=padre&tab=1&tipo=sids'" $p1>Dati Personali</button>
	<button class="tabs_att" id="t3" onclick="location.href='scheda_reg.php?scheda=padre&tab=3&tipo=sids'" $p2>Fumo</button>
	<button class="$alcp" id="t4" onclick="location.href='scheda_reg.php?scheda=padre&tab=4&tipo=sids'" $p3>Alcol/Stupefacenti</button>
	<button class="$farmp" id="t5" onclick="location.href='scheda_reg.php?scheda=padre&tab=5&tipo=sids'" $p4>Farmaci</button>
STAMP;
	}
	if ($tab == 4){
echo <<<STAMP
	<button class="$persp" id="t1" onclick="location.href='scheda_reg.php?scheda=padre&tab=1&tipo=sids'" $p1>Dati Personali</button>
	<button class="$fumop" id="t3" onclick="location.href='scheda_reg.php?scheda=padre&tab=3&tipo=sids'" $p2>Fumo</button>
	<button class="tabs_att" id="t4" onclick="location.href='scheda_reg.php?scheda=padre&tab=4&tipo=sids'" $p3>Alcol/Stupefacenti</button>
	<button class="$farmp" id="t5" onclick="location.href='scheda_reg.php?scheda=padre&tab=5&tipo=sids'" $p4>Farmaci</button>
STAMP;
	}
	if ($tab == 5){
echo <<<STAMP
	<button class="$persp" id="t1" onclick="location.href='scheda_reg.php?scheda=padre&tab=1&tipo=sids'" $p1>Dati Personali</button>
	<button class="$fumop" id="t3" onclick="location.href='scheda_reg.php?scheda=padre&tab=3&tipo=sids'" $p2>Fumo</button>
	<button class="$alcp" id="t4" onclick="location.href='scheda_reg.php?scheda=padre&tab=4&tipo=sids'" $p3>Alcol/Stupefacenti</button>
	<button class="tabs_att" id="t5" onclick="location.href='scheda_reg.php?scheda=padre&tab=5&tipo=sids'" $p4>Farmaci</button>
STAMP;
	}
?>