<?php
$p1="disabled";
$p2="disabled";
$p3="disabled";
if(isset($_SESSION["indaginiF"])){
  $inda = $_SESSION["indaginiF"];
  if($inda == 'tabs')
    $p1 = "disabled";
  else
    $p1 = '';
}
else
  $inda = 'tabs';

if(isset($_SESSION["ecografiaF"])){
  $ecog = $_SESSION["ecografiaF"];
  if($ecog == 'tabs')
    $p2 = "disabled";
  else
    $p2 = '';
}
else
  $ecog = 'tabs';

if(isset($_SESSION["ricoveroF"])){
  $rico = $_SESSION["ricoveroF"];
  if($rico == 'tabs')
    $p3 = "disabled";
  else
    $p3 = '';
}
else
  $rico = 'tabs';

	if ($tab == 10){
echo <<<STAMP
	<button class="tabs_att" onclick="location.href='scheda_naz.php?scheda=esami&tab=10&tipo=feto'" $p1>Indagini prenatali invasive</button>
	<button class="$ecog" onclick="location.href='scheda_naz.php?scheda=esami&tab=11&tipo=feto'" $p2>Ecografia</button>
	<button class="$rico" onclick="location.href='scheda_naz.php?scheda=esami&tab=12&tipo=feto'" $p3>Ricovero durante gravidanza</button>
STAMP;
	}
	if ($tab == 11){
echo <<<STAMP
	<button class="$inda" onclick="location.href='scheda_naz.php?scheda=esami&tab=10&tipo=feto'" $p1>Indagini prenatali invasive</button>
	<button class="tabs_att" onclick="location.href='scheda_naz.php?scheda=esami&tab=11&tipo=feto'" $p2>Ecografia</button>
	<button class="$rico" onclick="location.href='scheda_naz.php?scheda=esami&tab=12&tipo=feto'" $p3>Ricovero durante gravidanza</button>
STAMP;
	}
	if ($tab == 12){
echo <<<STAMP
	<button class="$inda" onclick="location.href='scheda_naz.php?scheda=esami&tab=10&tipo=feto'" $p1>Indagini prenatali invasive</button>
	<button class="$ecog" onclick="location.href='scheda_naz.php?scheda=esami&tab=11&tipo=feto'" $p2>Ecografia</button>
	<button class="tabs_att" onclick="location.href='scheda_naz.php?scheda=esami&tab=12&tipo=feto'" $p3>Ricovero durante gravidanza</button>
STAMP;
	}
?>