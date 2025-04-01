<?php
if(isset($_SESSION["menu_lattante_sids"])){
  $m1 = $_SESSION["menu_lattante_sids"];
}
else{
  $m1 = 'menu_bt_err';
}

if(isset($_SESSION["menu_ritrovamento_sids"])){
  $m2 = $_SESSION["menu_ritrovamento_sids"];
}
else{
  $m2 = 'menu_bt_err';
}

if(isset($_SESSION["menu_madre_sids"])){
  $m3 = $_SESSION["menu_madre_sids"];
}
else{
  $m3 = 'menu_bt_err';
}

if(isset($_SESSION["menu_padre_sids"])){
  $m4 = $_SESSION["menu_padre_sids"];
}
else{
  $m4 = 'menu_bt_err';
}

if(isset($_SESSION["menu_consenso_sids"])){
  $m5 = $_SESSION["menu_consenso_sids"];
}
else{
  $m5 = 'menu_bt_err';
}

if(isset($_SESSION["menu_autopsia_sids"])){
  $m6 = $_SESSION["menu_autopsia_sids"];
}
else{
  $m6 = 'menu_bt_err';
}

if(isset($_SESSION["menu_prelievi_sids"])){
  $m7 = $_SESSION["menu_prelievi_sids"];
}
else{
  $m7 = 'menu_bt_err';
}




    if ($scheda == 'sids'){
echo <<<STAMP
		
		<button class="menu_att" id="scheda" onclick="location.href='scheda_reg.php?scheda=sids&tipo=sids'">Lattante</button>
		<button class="$m2" id="scena" onclick="location.href='scheda_reg.php?scheda=scena&tipo=sids&tab=40'">Scena del Ritrovamento</button>
		<button class="$m3" id="madre" onclick="location.href='scheda_reg.php?scheda=madre&tipo=sids'">Madre</button>
		<button class="$m4" id="padre" onclick="location.href='scheda_reg.php?scheda=padre&tipo=sids&tab=0'">Padre</button>
		<button class="$m5" id="consenso" onclick="location.href='scheda_reg.php?scheda=consenso&tipo=sids&tab=40'">Consenso Informato</button>
		<button class="$m6" id="autopsia" onclick="location.href='scheda_reg.php?scheda=exam&tipo=sids&tab=0'">Autopsia</button>
		<button class="$m7" id="prelievi" onclick="location.href='scheda_reg.php?scheda=prelievi&tipo=sids&tab=22'">Prelievi Autoptici</button>
STAMP;
	}
	if ($scheda == 'scena'){
		echo <<<STAMP
		
		<button class="$m1" id="scheda" onclick="location.href='scheda_reg.php?scheda=sids&tipo=sids'">Lattante</button>
		<button class="menu_att" id="scena" onclick="location.href='scheda_reg.php?scheda=scena&tipo=sids&tab=40'">Scena del Ritrovamento</button>
		<button class="$m3" id="madre" onclick="location.href='scheda_reg.php?scheda=madre&tipo=sids'">Madre</button>
		<button class="$m4" id="padre" onclick="location.href='scheda_reg.php?scheda=padre&tipo=sids&tab=0'">Padre</button>		
		<button class="$m5" id="consenso" onclick="location.href='scheda_reg.php?scheda=consenso&tipo=sids&tab=40'">Consenso Informato</button>
		
		<button class="$m6" id="autopsia" onclick="location.href='scheda_reg.php?scheda=exam&tipo=sids&tab=0'">Autopsia</button>
		<button class="$m7" id="prelievi" onclick="location.href='scheda_reg.php?scheda=prelievi&tipo=sids&tab=22'">Prelievi Autoptici</button>
STAMP;
	}
	
	if ($scheda == 'madre'){
echo <<<STAMP

		<button class="$m1" id="scheda" onclick="location.href='scheda_reg.php?scheda=sids&tipo=sids'">Lattante</button>
		<button class="$m2" id="scena" onclick="location.href='scheda_reg.php?scheda=scena&tipo=sids&tab=40'">Scena del Ritrovamento</button>
		<button class="menu_att" id="madre" onclick="location.href='scheda_reg.php?scheda=madre&tipo=sids'">Madre</button>
		<button class="$m4" id="padre" onclick="location.href='scheda_reg.php?scheda=padre&tipo=sids&tab=0'">Padre</button><
		<button class="$m5" id="consenso" onclick="location.href='scheda_reg.php?scheda=consenso&tipo=sids&tab=40'">Consenso Informato</button>
<button class="$m6" id="autopsia" onclick="location.href='scheda_reg.php?scheda=exam&tipo=sids&tab=0'">Autopsia</button>
<button class="$m7" id="prelievi" onclick="location.href='scheda_reg.php?scheda=prelievi&tipo=sids&tab=22'">Prelievi Autoptici</button>
STAMP;
	}
	if ($scheda == 'padre'){
echo <<<STAMP

		<button class="$m1" id="scheda" onclick="location.href='scheda_reg.php?scheda=sids&tipo=sids'">Lattante</button>
		<button class="$m2" id="scena" onclick="location.href='scheda_reg.php?scheda=scena&tipo=sids&tab=40'">Scena del Ritrovamento</button>
		<button class="$m3" id="madre" onclick="location.href='scheda_reg.php?scheda=madre&tipo=sids'">Madre</button>
		<button class="menu_att" id="padre" onclick="location.href='scheda_reg.php?scheda=padre&tipo=sids&tab=0'">Padre</button>
		<button class="$m5" id="consenso" onclick="location.href='scheda_reg.php?scheda=consenso&tipo=sids&tab=40'">Consenso Informato</button>
<button class="$m6" id="autopsia" onclick="location.href='scheda_reg.php?scheda=exam&tipo=sids&tab=0'">Autopsia</button>
<button class="$m7" id="prelievi" onclick="location.href='scheda_reg.php?scheda=prelievi&tipo=sids&tab=22'">Prelievi Autoptici</button>
STAMP;
	}
	if ($scheda == 'consenso'){
echo <<<STAMP

		<button class="$m1" id="scheda" onclick="location.href='scheda_reg.php?scheda=sids&tipo=sids'">Lattante</button>
		<button class="$m2" id="scena" onclick="location.href='scheda_reg.php?scheda=scena&tipo=sids&tab=40'">Scena del Ritrovamento</button>
		<button class="$m3" id="madre" onclick="location.href='scheda_reg.php?scheda=madre&tipo=sids'">Madre</button>
		<button class="$m4" id="padre" onclick="location.href='scheda_reg.php?scheda=padre&tipo=sids&tab=0'">Padre</button>
		<button class="menu_att" id="consenso" onclick="location.href='scheda_reg.php?scheda=consenso&tipo=sids&tab=40'">Consenso Informato</button>
<button class="$m6" id="autopsia" onclick="location.href='scheda_reg.php?scheda=exam&tipo=sids&tab=0'">Autopsia</button>
<button class="$m7" id="prelievi" onclick="location.href='scheda_reg.php?scheda=prelievi&tipo=sids&tab=22'">Prelievi Autoptici</button>
STAMP;
    }
    if ($scheda == 'exam'){
echo <<<STAMP

    	<button class="$m1" id="scheda" onclick="location.href='scheda_reg.php?scheda=sids&tipo=sids'">Lattante</button>
    	<button class="$m2" id="scena" onclick="location.href='scheda_reg.php?scheda=scena&tipo=sids&tab=40'">Scena del Ritrovamento</button>
    	<button class="$m3" id="madre" onclick="location.href='scheda_reg.php?scheda=madre&tipo=sids'">Madre</button>
    	<button class="$m4" id="padre" onclick="location.href='scheda_reg.php?scheda=padre&tipo=sids&tab=0'">Padre</button>
    	<button class="$m5" id="consenso" onclick="location.href='scheda_reg.php?scheda=consenso&tipo=sids&tab=40'">Consenso Informato</button>
<button class="menu_att" id="autopsia" onclick="location.href='scheda_reg.php?scheda=exam&tipo=sids&tab=0'">Autopsia</button>
<button class="$m7" id="prelievi" onclick="location.href='scheda_reg.php?scheda=prelievi&tipo=sids&tab=22'">Prelievi Autoptici</button>
STAMP;
    }
    if ($scheda == 'prelievi'){
echo <<<STAMP

    	<button class="$m1" id="scheda" onclick="location.href='scheda_reg.php?scheda=sids&tipo=sids'">Lattante</button>
    	<button class="$m2" id="scena" onclick="location.href='scheda_reg.php?scheda=scena&tipo=sids&tab=40'">Scena del Ritrovamento</button>
    	<button class="$m3" id="madre" onclick="location.href='scheda_reg.php?scheda=madre&tipo=sids'">Madre</button>
    	<button class="$m4" id="padre" onclick="location.href='scheda_reg.php?scheda=padre&tipo=sids&tab=0'">Padre</button>
    	<button class="$m5" id="consenso" onclick="location.href='scheda_reg.php?scheda=consenso&tipo=sids&tab=40'">Consenso Informato</button>
<button class="$m6" id="autopsia" onclick="location.href='scheda_reg.php?scheda=exam&tipo=sids&tab=0'">Autopsia</button>
<button class="menu_att" id="prelievi" onclick="location.href='scheda_reg.php?scheda=prelievi&tipo=sids&tab=22'">Prelievi Autoptici</button>
STAMP;
    }
?>

