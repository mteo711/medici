<?php
if(isset($_SESSION["menu_feto_feto"])){
  $m1 = $_SESSION["menu_feto_feto"];
}
else{
  $m1 = 'menu_bt_err';
}

if(isset($_SESSION["menu_madre_feto"])){
  $m2 = $_SESSION["menu_madre_feto"];
}
else{
  $m2 = 'menu_bt_err';
}

if(isset($_SESSION["menu_esami_feto"])){
  $m3 = $_SESSION["menu_esami_feto"];
}
else{
  $m3 = 'menu_bt_err';
}

if(isset($_SESSION["menu_padre_feto"])){
  $m4 = $_SESSION["menu_padre_feto"];
}
else{
  $m4 = 'menu_bt_err';
}

if(isset($_SESSION["menu_consenso_feto"])){
  $m5 = $_SESSION["menu_consenso_feto"];
}
else{
  $m5 = 'menu_bt_err';
}

if(isset($_SESSION["menu_autopsia_feto"])){
  $m6 = $_SESSION["menu_autopsia_feto"];
}
else{
  $m6 = 'menu_bt_err';
}

if(isset($_SESSION["menu_annessi_feto"])){
  $m7 = $_SESSION["menu_annessi_feto"];
}
else{
  $m7 = 'menu_bt_err';
}

if(isset($_SESSION["menu_prelievi_feto"])){
  $m8 = $_SESSION["menu_prelievi_feto"];
}
else{
  $m8 = 'menu_bt_err';
}
	if ($scheda == 'scheda'){
echo <<<STAMP

		<button class="menu_att" onclick="location.href='scheda_reg.php?scheda=scheda&tipo=feto'">Feto</button>
		<button class="$m2" onclick="location.href='scheda_reg.php?scheda=madre&tipo=feto'">Madre</button>
		<button class="$m3" onclick="location.href='scheda_reg.php?scheda=esami&tipo=feto&tab=10'">Esami Madre</button>
		<button class="$m4" onclick="location.href='scheda_reg.php?scheda=padre&tipo=feto&tab=0'">Padre</button>
		<button class="$m5" onclick="location.href='scheda_reg.php?scheda=consenso&tipo=feto&tab=40'">Consenso Informato</button>
		<button class="$m6" id="autopsia" onclick="location.href='scheda_reg.php?scheda=exam&tipo=feto&tab=0'">Autopsia</button>
		<button class="$m7" id="autopsia" onclick="location.href='scheda_reg.php?scheda=referto&tipo=feto&tab=1'">Annessi Fetali</button>
		<button class="$m8" id="prelievi" onclick="location.href='scheda_reg.php?scheda=prelievi&tipo=feto&tab=22'">Prelievi Autoptici</button>
STAMP;
	}
	if ($scheda == 'madre'){
		echo <<<STAMP
		
		<button class="$m1" onclick="location.href='scheda_reg.php?scheda=scheda&tipo=feto'">Feto</button>
		<button class="menu_att" onclick="location.href='scheda_reg.php?scheda=madre&tipo=feto'">Madre</button>
		<button class="$m3" onclick="location.href='scheda_reg.php?scheda=esami&tipo=feto&tab=10'">Esami Madre</button>
		<button class="$m4" onclick="location.href='scheda_reg.php?scheda=padre&tipo=feto&tab=0'">Padre</button>
		<button class="$m5" onclick="location.href='scheda_reg.php?scheda=consenso&tipo=feto&tab=40'">Consenso Informato</button>
		<button class="$m6" id="autopsia" onclick="location.href='scheda_reg.php?scheda=exam&tipo=feto&tab=0'">Autopsia</button>
		<button class="$m7" id="autopsia" onclick="location.href='scheda_reg.php?scheda=referto&tipo=feto&tab=1'">Annessi Fetali</button>
		<button class="$m8" id="prelievi" onclick="location.href='scheda_reg.php?scheda=prelievi&tipo=feto&tab=22'">Prelievi Autoptici</button>
STAMP;
	}

	if ($scheda == 'esami'){
echo <<<STAMP

		<button class="$m1" onclick="location.href='scheda_reg.php?scheda=scheda&tipo=feto'">Feto</button>
		<button class="$m2" onclick="location.href='scheda_reg.php?scheda=madre&tipo=feto'">Madre</button>
		<button class="menu_att" onclick="location.href='scheda_reg.php?scheda=esami&tipo=feto&tab=10'">Esami Madre</button>
		<button class="$m4" onclick="location.href='scheda_reg.php?scheda=padre&tipo=feto&tab=0'">Padre</button>
		<button class="$m5" onclick="location.href='scheda_reg.php?scheda=consenso&tipo=feto&tab=40'">Consenso Informato</button>
		<button class="$m6" id="autopsia" onclick="location.href='scheda_reg.php?scheda=exam&tipo=feto&tab=0'">Autopsia</button>
		<button class="$m7" id="autopsia" onclick="location.href='scheda_reg.php?scheda=referto&tipo=feto&tab=1'">Annessi Fetali</button>
		<button class="$m8" id="prelievi" onclick="location.href='scheda_reg.php?scheda=prelievi&tipo=feto&tab=22'">Prelievi Autoptici</button>
STAMP;
	}
	if ($scheda == 'padre'){
echo <<<STAMP
		<button class="$m1" onclick="location.href='scheda_reg.php?scheda=scheda&tipo=feto'">Feto</button>
		<button class="$m2" onclick="location.href='scheda_reg.php?scheda=madre&tipo=feto'">Madre</button>
		<button class="$m3" onclick="location.href='scheda_reg.php?scheda=esami&tipo=feto&tab=10'">Esami Madre</button>
		<button class="menu_att" onclick="location.href='scheda_reg.php?scheda=padre&tipo=feto&tab=0'">Padre</button>
		<button class="$m5" onclick="location.href='scheda_reg.php?scheda=consenso&tipo=feto&tab=40'">Consenso Informato</button>
		<button class="$m6" id="autopsia" onclick="location.href='scheda_reg.php?scheda=exam&tipo=feto&tab=0'">Autopsia</button>
		<button class="$m7" id="autopsia" onclick="location.href='scheda_reg.php?scheda=referto&tipo=feto&tab=1'">Annessi Fetali</button>
		<button class="$m8" id="prelievi" onclick="location.href='scheda_reg.php?scheda=prelievi&tipo=feto&tab=22'">Prelievi Autoptici</button>
STAMP;
	}
	if ($scheda == 'consenso'){
echo <<<STAMP

		<button class="$m1" onclick="location.href='scheda_reg.php?scheda=scheda&tipo=feto'">Feto</button>
		<button class="$m2" onclick="location.href='scheda_reg.php?scheda=madre&tipo=feto'">Madre</button>
		<button class="$m3" onclick="location.href='scheda_reg.php?scheda=esami&tipo=feto&tab=10'">Esami Madre</button>
		<button class="$m4" onclick="location.href='scheda_reg.php?scheda=padre&tipo=feto&tab=0'">Padre</button>
		<button class="menu_att" onclick="location.href='scheda_reg.php?scheda=consenso&tipo=feto&tab=40'">Consenso Informato</button>
		<button class="$m6" id="autopsia" onclick="location.href='scheda_reg.php?scheda=exam&tipo=feto&tab=0'">Autopsia</button>
		<button class="$m7" id="autopsia" onclick="location.href='scheda_reg.php?scheda=referto&tipo=feto&tab=1'">Annessi Fetali</button>
		<button class="$m8" id="prelievi" onclick="location.href='scheda_reg.php?scheda=prelievi&tipo=feto&tab=22'">Prelievi Autoptici</button>
STAMP;
	}
	if ($scheda == 'exam'){
echo <<<STAMP

		<button class="$m1" onclick="location.href='scheda_reg.php?scheda=scheda&tipo=feto'">Feto</button>
		<button class="$m2" onclick="location.href='scheda_reg.php?scheda=madre&tipo=feto'">Madre</button>
		<button class="$m3" onclick="location.href='scheda_reg.php?scheda=esami&tipo=feto&tab=10'">Esami Madre</button>
		<button class="$m4" onclick="location.href='scheda_reg.php?scheda=padre&tipo=feto&tab=0'">Padre</button>
		<button class="$m5" onclick="location.href='scheda_reg.php?scheda=consenso&tipo=feto&tab=40'">Consenso Informato</button>
		<button class="menu_att" id="autopsia" onclick="location.href='scheda_reg.php?scheda=exam&tipo=feto&tab=0'">Autopsia</button>
		<button class="$m7" id="autopsia" onclick="location.href='scheda_reg.php?scheda=referto&tipo=feto&tab=1'">Annessi Fetali</button>
		<button class="$m8" id="prelievi" onclick="location.href='scheda_reg.php?scheda=prelievi&tipo=feto&tab=22'">Prelievi Autoptici</button>
STAMP;
	}
	if ($scheda == 'referto'){
echo <<<STAMP

		<button class="$m1" onclick="location.href='scheda_reg.php?scheda=scheda&tipo=feto'">Feto</button>
		<button class="$m2" onclick="location.href='scheda_reg.php?scheda=madre&tipo=feto'">Madre</button>
		<button class="$m3" onclick="location.href='scheda_reg.php?scheda=esami&tipo=feto&tab=10'">Esami Madre</button>
		<button class="$m4" onclick="location.href='scheda_reg.php?scheda=padre&tipo=feto&tab=0'">Padre</button>
		<button class="$m5" onclick="location.href='scheda_reg.php?scheda=consenso&tipo=feto&tab=40'">Consenso Informato</button>
		<button class="$m6" id="autopsia" onclick="location.href='scheda_reg.php?scheda=exam&tipo=feto&tab=0'">Autopsia</button>
		<button class="menu_att" id="autopsia" onclick="location.href='scheda_reg.php?scheda=referto&tipo=feto&tab=1'">Annessi Fetali</button>
		<button class="$m8" id="prelievi" onclick="location.href='scheda_reg.php?scheda=prelievi&tipo=feto&tab=22'">Prelievi Autoptici</button>
STAMP;
	}
	if ($scheda == 'prelievi'){
echo <<<STAMP

		<button class="$m1" onclick="location.href='scheda_reg.php?scheda=scheda&tipo=feto'">Feto</button>
		<button class="$m2" onclick="location.href='scheda_reg.php?scheda=madre&tipo=feto'">Madre</button>
		<button class="$m3" onclick="location.href='scheda_reg.php?scheda=esami&tipo=feto&tab=10'">Esami Madre</button>
		<button class="$m4" onclick="location.href='scheda_reg.php?scheda=padre&tipo=feto&tab=0'">Padre</button>
		<button class="$m5" onclick="location.href='scheda_reg.php?scheda=consenso&tipo=feto&tab=40'">Consenso Informato</button>
		<button class="$m6" id="autopsia" onclick="location.href='scheda_reg.php?scheda=exam&tipo=feto&tab=0'">Autopsia</button>
		<button class="$m7" id="autopsia" onclick="location.href='scheda_reg.php?scheda=referto&tipo=feto&tab=1'">Annessi Fetali</button>
		<button class="menu_att" id="prelievi" onclick="location.href='scheda_reg.php?scheda=prelievi&tipo=feto&tab=22'">Prelievi Autoptici</button>
STAMP;
	}
?>

