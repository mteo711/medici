<?php
  $menu1 = "";
  $menu2 = "";
  $menu3 = "";
  //tipo scheda
  if ($tipo=='sids') {
	$menu1 = 'Scheda Sindrome della morte improvvisa del lattante SIDS';
  }
  elseif ($tipo=='feto') {
	$menu1 = 'Scheda Morte perinatale FETALE';
  }
  elseif ($tipo=='neo') {
	$menu1 = 'Scheda Morte perinatale NEONATALE';
  }
  else {
	$menu1 = "";
  }
  //menu laterale
  if ($scheda == 'madre') {
	$menu2 = ' > Anagrafica Madre';
  }
  elseif ($scheda == 'padre') {
	$menu2 = ' > Anagrafica Padre';
  }
  elseif ($scheda == 'scena') {
	$menu2 = ' > Scena del ritrovamento';
  }
  elseif ($scheda == 'sids') {
	$menu2 = ' > Scheda SIDS';
  }
  elseif ($scheda == 'consenso') {
	$menu2 = ' > Consenso Informato';
  }
  elseif ($scheda == 'esami') {
	$menu2 = ' > Esami Madre';
  }
  elseif ($scheda == 'scheda') {
	$menu2 = ' > Scheda Feto';
  }
  elseif ($scheda == 'schedaN') {
	$menu2 = ' > Scheda Neonato';
  }
  elseif ($scheda == 'exam') {
  	$menu2 = ' > Esami';
    }
  else {
	$menu2 = "";
  }
  //tab
  if ($tab == '1') {
	$menu3 = ' > Dati personali';
  }
  elseif ($tab == '2') {
	$menu3 = ' > Parti precedenti';
  }
  elseif ($tab == '3') {
	$menu3 = ' > Informazioni su fumo';
  }
  elseif ($tab == '4') {
	$menu3 = ' > Informazioni su alcol e stupefacenti';
  }
  elseif ($tab == '5') {
	$menu3 = ' > Informazioni su uso farmaci';
  }
  elseif ($tab == '6') {
	$menu3 = ' > Patologie gestante';
  }
  elseif ($tab == '7') {
	$menu3 = ' > Informazioni sulla gravidanza';
  }
  elseif ($tab == '8') {
	$menu3 = ' > Scheda SIDS';
  }
  elseif ($tab == '9') {
	$menu3 = ' > Screening per cromosopatie';
  }
  elseif ($tab == '10') {
	$menu3 = ' > Indagini prenatali invasive';
  }
  elseif ($tab == '11') {
	$menu3 = ' > Ecografia';
  }
  elseif ($tab == '12') {
	$menu3 = ' > Ricovero durante la gravidanza';
  }
  elseif ($tab == '13') {
	$menu3 = ' > Scheda Neonato';
  }
  elseif ($tab == '14') {
	$menu3 = ' > Scheda Feto';
  }
  elseif ($tab == '15') {
  	$menu3 = ' > Esame Esterno';
    }
  elseif ($tab == '16') {
    $menu3 = ' > Encefalo';
  }
  elseif ($tab == '17') {
    $menu3 = ' > Cavo Orale ed Organi del Collo';
  }
  elseif ($tab == '18') {
    $menu3 = ' > Cavità Toracica';
  }
  elseif ($tab == '19') {
    $menu3 = ' > Apparato Cardiovascolare';
  }
  elseif ($tab == '20') {
    $menu3 = ' > Apparato Respiratorio';
  }
  elseif ($tab == '21') {
    $menu3 = ' > Cavità Addominale';
  }
  elseif ($tab == '22') {
    $menu3 = ' > Prelievi per gli Esami Istologici';
  }
  else {
	$menu3 = "";
  }
  echo $menu1.$menu2.$menu3;
?>