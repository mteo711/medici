<?php
	if ($tab == 1){
echo <<<STAMP
	<button class="tabs_att" id="t1" onclick="location.href='scheda_naz.php?scheda=referto&tab=1&tipo=feto'">Placenta/Membrane</button>
	<button class="tabs" id="t3" onclick="location.href='scheda_naz.php?scheda=referto&tab=2&tipo=feto'">Cordone Ombelicale</button>
	<button class="tabs" id="t4" onclick="location.href='scheda_naz.php?scheda=referto&tab=3&tipo=feto'">Disco Coriale</button>
STAMP;
	}
	if ($tab == 2){
echo <<<STAMP
	<button class="tabs" id="t1" onclick="location.href='scheda_naz.php?scheda=referto&tab=1&tipo=feto'">Placenta/Membrane</button>
	<button class="tabs_att" id="t3" onclick="location.href='scheda_naz.php?scheda=referto&tab=2&tipo=feto'">Cordone Ombelicale</button>
	<button class="tabs" id="t4" onclick="location.href='scheda_naz.php?scheda=referto&tab=3&tipo=feto'">Disco Coriale</button>
STAMP;
	}
	if ($tab == 3){
echo <<<STAMP
	<button class="tabs" id="t1" onclick="location.href='scheda_naz.php?scheda=referto&tab=1&tipo=feto'">Placenta/Membrane</button>
	<button class="tabs" id="t3" onclick="location.href='scheda_naz.php?scheda=referto&tab=2&tipo=feto'">Cordone Ombelicale</button>
	<button class="tabs_att" id="t4" onclick="location.href='scheda_naz.php?scheda=referto&tab=3&tipo=feto'">Disco Coriale</button>
STAMP;
	}
?>