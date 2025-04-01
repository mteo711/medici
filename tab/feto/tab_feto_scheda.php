<?php
//colore tab
	$p1="disabled";
	$p2="disabled";
	if(isset($_SESSION["personaliF"])){
	  $persoF = $_SESSION["personaliF"];
	  if($persoF == 'tabs')
	    $p1 = "disabled";
	  else
	    $p1 = '';
	}
	else
	  $perso = 'tabs';
	  
	if(isset($_SESSION["schedaF"])){
	  $scheF = $_SESSION["schedaF"];
	  if($scheF == 'tabs')
	    $p2 = "disabled";
	  else
	    $p2 = '';
	}
	else
	  $scheF = 'tabs';
	if ($tab == 1){
echo <<<STAMP
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=scheda&tab=1&tipo=feto'" $p1>Dati Personali</button>
	<button class="$scheF" onclick="location.href='scheda_reg.php?scheda=scheda&tab=14&tipo=feto'" $p2>Scheda</button>
STAMP;
	}
	if ($tab == 14){
echo <<<STAMP
	<button class="$persoF" onclick="location.href='scheda_reg.php?scheda=scheda&tab=1&tipo=feto'" $p1>Dati Personali</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=scheda&tab=14&tipo=feto'" $p2>Scheda</button>
STAMP;
	}
?>
