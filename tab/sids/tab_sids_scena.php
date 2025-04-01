<?php
$p1="disabled";
$p2="disabled";
$p3="disabled";
if(isset($_SESSION["luogo"])){
  $luogo = $_SESSION["luogo"];
  if($luogo == 'tabs')
    $p1 = "disabled";
  else
    $p1 = '';
}
else
  $luogo = 'tabs';
  
if(isset($_SESSION["situazione"])){
  $situa = $_SESSION["situazione"];
  if($situa == 'tabs')
    $p2 = "disabled";
  else
    $p2 = '';
}
else
  $situa = 'tabs';
  
if(isset($_SESSION["pasti"])){
  $pasti = $_SESSION["pasti"];
  if($pasti == 'tabs')
    $p3 = "disabled";
  else
    $p3 = '';
}
else
  $pasti = 'tabs';

	if ($tab == 40){
echo <<<STAMP
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=scena&tab=40&tipo=sids'" $p1>Luogo di ritrovamento</button>
	<button class="$situa" onclick="location.href='scheda_reg.php?scheda=scena&tab=41&tipo=sids'" $p2>Situazione di ritrovamento</button>
	<button class="$pasti" onclick="location.href='scheda_reg.php?scheda=scena&tab=42&tipo=sids'" $p3>Ultimi pasti</button>
STAMP;
	}
	if ($tab == 41){
echo <<<STAMP
	<button class="$luogo" onclick="location.href='scheda_reg.php?scheda=scena&tab=40&tipo=sids'" $p1>Luogo di ritrovamento</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=scena&tab=41&tipo=sids'" $p2>Situazione di ritrovamento</button>
	<button class="$pasti" onclick="location.href='scheda_reg.php?scheda=scena&tab=42&tipo=sids'" $p3>Ultimi pasti</button>
STAMP;
	}
	if ($tab == 42){
echo <<<STAMP
	<button class="$luogo" onclick="location.href='scheda_reg.php?scheda=scena&tab=40&tipo=sids'" $p1>Luogo di ritrovamento</button>
	<button class="$situa" onclick="location.href='scheda_reg.php?scheda=scena&tab=41&tipo=sids'" $p2>Situazione di ritrovamento</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=scena&tab=42&tipo=sids'" $p3>Ultimi pasti</button>
STAMP;
	}

?>
