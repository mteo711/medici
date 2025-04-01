<?php
	//colore tab
	$p1="disabled";
	$p2="disabled";
	$p3="disabled";
	$p4="disabled";
	if(isset($_SESSION["personali"])){
	  $perso = $_SESSION["personali"];
	  if($perso == 'tabs')
	    $p1 = "disabled";
	  else
	    $p1 = '';
	}
	else
	  $perso = 'tabs';
	  
	if(isset($_SESSION["allattamento"])){
	  $alla = $_SESSION["allattamento"];
	  if($alla == 'tabs')
	    $p2 = "disabled";
	  else
	    $p2 = '';
	}
	else
	  $alla = 'tabs';
	  
	if(isset($_SESSION["sonno"])){
	  $son = $_SESSION["sonno"];
	  if($son == 'tabs')
	    $p3 = "disabled";
	  else
	    $p3 = '';
  	}
	else
	  $son = 'tabs';
	  
	if(isset($_SESSION["medici"])){
	  $medi = $_SESSION["medici"];
	  if($medi == 'tabs')
	    $p4 = "disabled";
	  else
	    $p4 = '';
	}
	else
	  $medi = 'tabs';
	  
	if ($tab == 1){
echo <<<STAMP
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=sids&tab=1&tipo=sids'" $p1>Dati Personali</button>
	<button class="$alla" onclick="location.href='scheda_reg.php?scheda=sids&tab=8&tipo=sids'" $p2>Allattamento</button>
	<button class="$son" onclick="location.href='scheda_reg.php?scheda=sids&tab=9&tipo=sids'" $p3>Sonno</button>
	<button class="$medi" onclick="location.href='scheda_reg.php?scheda=sids&tab=10&tipo=sids'" $p4>Dati Medici</button>
STAMP;
	}
	if ($tab == 8){
echo <<<STAMP
	<button class="$perso" onclick="location.href='scheda_reg.php?scheda=sids&tab=1&tipo=sids'" $p1>Dati Personali</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=sids&tab=8&tipo=sids'" $p2>Allattamento</button>
	<button class="$son" onclick="location.href='scheda_reg.php?scheda=sids&tab=9&tipo=sids'" $p3>Sonno</button>
	<button class="$medi" onclick="location.href='scheda_reg.php?scheda=sids&tab=10&tipo=sids'" $p4>Dati Medici</button>
STAMP;
	}
	if ($tab == 9){
echo <<<STAMP
	<button class="$perso" onclick="location.href='scheda_reg.php?scheda=sids&tab=1&tipo=sids'" $p1>Dati Personali</button>
	<button class="$alla" onclick="location.href='scheda_reg.php?scheda=sids&tab=8&tipo=sids'" $p2>Allattamento</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=sids&tab=9&tipo=sids'" $p3>Sonno</button>
	<button class="$medi" onclick="location.href='scheda_reg.php?scheda=sids&tab=10&tipo=sids'" $p4>Dati Medici</button>
STAMP;
	}
	if ($tab == 10){
echo <<<STAMP
	<button class="$perso" onclick="location.href='scheda_reg.php?scheda=sids&tab=1&tipo=sids'" $p1>Dati Personali</button>
	<button class="$alla" onclick="location.href='scheda_reg.php?scheda=sids&tab=8&tipo=sids'" $p2>Allattamento</button>
	<button class="$son" onclick="location.href='scheda_reg.php?scheda=sids&tab=9&tipo=sids'" $p3>Sonno</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=sids&tab=10&tipo=sids'" $p4>Dati Medici</button>
STAMP;
	}
	
?>
