<?php
	if ($scheda == 'scheda'){
echo <<<STAMP

		<button class="menu_att" onclick="location.href='scheda_naz.php?scheda=scheda&tipo=feto'">Feto</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=madre&tipo=feto'">Madre</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=esami&tipo=feto&tab=10'">Esami Madre</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=padre&tipo=feto&tab=0'">Padre</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=consenso&tipo=feto&tab=40'">Consenso Informato</button>
		<button class="menu" id="autopsia" onclick="location.href='scheda_naz.php?scheda=exam&tipo=feto&tab=0'">Autopsia</button>
		<button class="menu" id="autopsia" onclick="location.href='scheda_naz.php?scheda=referto&tipo=feto&tab=1'">Annessi Fetali</button>
		<button class="menu" id="prelievi" onclick="location.href='scheda_naz.php?scheda=prelievi&tipo=feto&tab=22'">Prelievi Autoptici</button>
STAMP;
	}
	if ($scheda == 'madre'){
		echo <<<STAMP
		
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=scheda&tipo=feto'">Feto</button>
		<button class="menu_att" onclick="location.href='scheda_naz.php?scheda=madre&tipo=feto'">Madre</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=esami&tipo=feto&tab=10'">Esami Madre</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=padre&tipo=feto&tab=0'">Padre</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=consenso&tipo=feto&tab=40'">Consenso Informato</button>
		<button class="menu" id="autopsia" onclick="location.href='scheda_naz.php?scheda=exam&tipo=feto&tab=0'">Autopsia</button>
		<button class="menu" id="autopsia" onclick="location.href='scheda_naz.php?scheda=referto&tipo=feto&tab=1'">Annessi Fetali</button>
		<button class="menu" id="prelievi" onclick="location.href='scheda_naz.php?scheda=prelievi&tipo=feto&tab=22'">Prelievi Autoptici</button>
STAMP;
	}

	if ($scheda == 'esami'){
echo <<<STAMP

		<button class="menu" onclick="location.href='scheda_naz.php?scheda=scheda&tipo=feto'">Feto</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=madre&tipo=feto'">Madre</button>
		<button class="menu_att" onclick="location.href='scheda_naz.php?scheda=esami&tipo=feto&tab=10'">Esami Madre</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=padre&tipo=feto&tab=0'">Padre</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=consenso&tipo=feto&tab=40'">Consenso Informato</button>
		<button class="menu" id="autopsia" onclick="location.href='scheda_naz.php?scheda=exam&tipo=feto&tab=0'">Autopsia</button>
		<button class="menu" id="autopsia" onclick="location.href='scheda_naz.php?scheda=referto&tipo=feto&tab=1'">Annessi Fetali</button>
		<button class="menu" id="prelievi" onclick="location.href='scheda_naz.php?scheda=prelievi&tipo=feto&tab=22'">Prelievi Autoptici</button>
STAMP;
	}
	if ($scheda == 'padre'){
echo <<<STAMP
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=scheda&tipo=feto'">Feto</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=madre&tipo=feto'">Madre</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=esami&tipo=feto&tab=10'">Esami Madre</button>
		<button class="menu_att" onclick="location.href='scheda_naz.php?scheda=padre&tipo=feto&tab=0'">Padre</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=consenso&tipo=feto&tab=40'">Consenso Informato</button>
		<button class="menu" id="autopsia" onclick="location.href='scheda_naz.php?scheda=exam&tipo=feto&tab=0'">Autopsia</button>
		<button class="menu" id="autopsia" onclick="location.href='scheda_naz.php?scheda=referto&tipo=feto&tab=1'">Annessi Fetali</button>
		<button class="menu" id="prelievi" onclick="location.href='scheda_naz.php?scheda=prelievi&tipo=feto&tab=22'">Prelievi Autoptici</button>
STAMP;
	}
	if ($scheda == 'consenso'){
echo <<<STAMP

		<button class="menu" onclick="location.href='scheda_naz.php?scheda=scheda&tipo=feto'">Feto</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=madre&tipo=feto'">Madre</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=esami&tipo=feto&tab=10'">Esami Madre</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=padre&tipo=feto&tab=0'">Padre</button>
		<button class="menu_att" onclick="location.href='scheda_naz.php?scheda=consenso&tipo=feto&tab=40'">Consenso Informato</button>
		<button class="menu" id="autopsia" onclick="location.href='scheda_naz.php?scheda=exam&tipo=feto&tab=0'">Autopsia</button>
		<button class="menu" id="autopsia" onclick="location.href='scheda_naz.php?scheda=referto&tipo=feto&tab=1'">Annessi Fetali</button>
		<button class="menu" id="prelievi" onclick="location.href='scheda_naz.php?scheda=prelievi&tipo=feto&tab=22'">Prelievi Autoptici</button>
STAMP;
	}
	if ($scheda == 'exam'){
echo <<<STAMP

		<button class="menu" onclick="location.href='scheda_naz.php?scheda=scheda&tipo=feto'">Feto</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=madre&tipo=feto'">Madre</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=esami&tipo=feto&tab=10'">Esami Madre</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=padre&tipo=feto&tab=0'">Padre</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=consenso&tipo=feto&tab=40'">Consenso Informato</button>
		<button class="menu_att" id="autopsia" onclick="location.href='scheda_naz.php?scheda=exam&tipo=feto&tab=0'">Autopsia</button>
		<button class="menu" id="autopsia" onclick="location.href='scheda_naz.php?scheda=referto&tipo=feto&tab=1'">Annessi Fetali</button>
		<button class="menu" id="prelievi" onclick="location.href='scheda_naz.php?scheda=prelievi&tipo=feto&tab=22'">Prelievi Autoptici</button>
STAMP;
	}
	if ($scheda == 'referto'){
echo <<<STAMP

		<button class="menu" onclick="location.href='scheda_naz.php?scheda=scheda&tipo=feto'">Feto</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=madre&tipo=feto'">Madre</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=esami&tipo=feto&tab=10'">Esami Madre</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=padre&tipo=feto&tab=0'">Padre</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=consenso&tipo=feto&tab=40'">Consenso Informato</button>
		<button class="menu" id="autopsia" onclick="location.href='scheda_naz.php?scheda=exam&tipo=feto&tab=0'">Autopsia</button>
		<button class="menu_att" id="autopsia" onclick="location.href='scheda_naz.php?scheda=referto&tipo=feto&tab=1'">Annessi Fetali</button>
		<button class="menu" id="prelievi" onclick="location.href='scheda_naz.php?scheda=prelievi&tipo=feto&tab=22'">Prelievi Autoptici</button>
STAMP;
	}
	if ($scheda == 'prelievi'){
echo <<<STAMP

		<button class="menu" onclick="location.href='scheda_naz.php?scheda=scheda&tipo=feto'">Feto</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=madre&tipo=feto'">Madre</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=esami&tipo=feto&tab=10'">Esami Madre</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=padre&tipo=feto&tab=0'">Padre</button>
		<button class="menu" onclick="location.href='scheda_naz.php?scheda=consenso&tipo=feto&tab=40'">Consenso Informato</button>
		<button class="menu" id="autopsia" onclick="location.href='scheda_naz.php?scheda=exam&tipo=feto&tab=0'">Autopsia</button>
		<button class="menu" id="autopsia" onclick="location.href='scheda_naz.php?scheda=referto&tipo=feto&tab=1'">Annessi Fetali</button>
		<button class="menu_att" id="prelievi" onclick="location.href='scheda_naz.php?scheda=prelievi&tipo=feto&tab=22'">Prelievi Autoptici</button>
STAMP;
	}
?>

