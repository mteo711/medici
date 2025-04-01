
<?php
$p1="disabled";
$p2="disabled";
$p3="disabled";
$p4="disabled";
$p5="disabled";
$p6="disabled";
$p7="disabled";
$p8="disabled";
if(isset($_SESSION["esami_sids_esterno"])){
  $sids_esterno = $_SESSION["esami_sids_esterno"];
  if($sids_esterno == 'tabs')
    $p1 = "disabled";
  else
    $p1 = '';
}
else
  $sids_esterno = 'tabs';
if(isset($_SESSION["esami_sids_encefalo"])){
  $sids_encefalo = $_SESSION["esami_sids_encefalo"];
  if($sids_encefalo == 'tabs')
    $p2 = "disabled";
  else
    $p2 = '';
}
else
  $sids_encefalo = 'tabs';
if(isset($_SESSION["esami_sids_capo"])){
  $sids_capo = $_SESSION["esami_sids_capo"];
  if($sids_capo == 'tabs')
    $p3 = "disabled";
  else
    $p3 = '';
}
else
  $sids_capo = 'tabs';
if(isset($_SESSION["esami_sids_toracica"])){
  $sids_toracica = $_SESSION["esami_sids_toracica"];
  if($sids_toracica == 'tabs')
    $p4 = "disabled";
  else
    $p4 = '';
}
else
  $sids_toracica = 'tabs';  
if(isset($_SESSION["esami_sids_cardiovascolare"])){
  $sids_cardio = $_SESSION["esami_sids_cardiovascolare"];
  if($sids_cardio == 'tabs')
    $p5 = "disabled";
  else
    $p5 = '';
}
else
  $sids_cardio = 'tabs';
if(isset($_SESSION["esami_sids_respiratorio"])){
  $sids_respira = $_SESSION["esami_sids_respiratorio"];
  if($sids_respira == 'tabs')
    $p6 = "disabled";
  else
    $p6 = '';
}
else
  $sids_respira = 'tabs';
if(isset($_SESSION["esami_sids_addominale"])){
  $sids_addomi = $_SESSION["esami_sids_addominale"];
  if($sids_addomi == 'tabs')
    $p7 = "disabled";
  else
    $p7 = '';
}
else
  $sids_addomi = 'tabs';
if(isset($_SESSION["esami_sids_note"])){
  $sids_note = $_SESSION["esami_sids_note"];
  if($sids_note == 'tabs')
    $p8 = "disabled";
  else
    $p8 = '';
}
else
  $sids_note = 'tabs';  
	if ($tab == 15){
echo <<<STAMP
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=exam&tab=15&tipo=sids'" $p1>Esame Esterno</button>
	<button class="$sids_encefalo" onclick="location.href='scheda_reg.php?scheda=exam&tab=16&tipo=sids'" $p2>Encefalo</button>
	<button class="$sids_capo" onclick="location.href='scheda_reg.php?scheda=exam&tab=17&tipo=sids'" $p3>Capo-Collo/Cavo Orale</button>
	<button class="$sids_toracica" onclick="location.href='scheda_reg.php?scheda=exam&tab=18&tipo=sids'" $p4>Cav. Toracica</button>
	<button class="$sids_cardio" onclick="location.href='scheda_reg.php?scheda=exam&tab=19&tipo=sids'" $p5>App. Cardiov.</button>
	<button class="$sids_respira" onclick="location.href='scheda_reg.php?scheda=exam&tab=20&tipo=sids'" $p6>App. Respiratorio</button>
	<button class="$sids_addomi" onclick="location.href='scheda_reg.php?scheda=exam&tab=21&tipo=sids'" $p7>Cav. Addominale</button>
	<button class="$sids_note" onclick="location.href='scheda_reg.php?scheda=exam&tab=23&tipo=sids'" $p8>Conclusioni</button>
STAMP;
	}
	if ($tab == 16){
echo <<<STAMP
	<button class="$sids_esterno" onclick="location.href='scheda_reg.php?scheda=exam&tab=15&tipo=sids'" $p1>Esame Esterno</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=exam&tab=16&tipo=sids'" $p2>Encefalo</button>
	<button class="$sids_capo" onclick="location.href='scheda_reg.php?scheda=exam&tab=17&tipo=sids'" $p3>Capo-Collo/Cavo Orale</button>
	<button class="$sids_toracica" onclick="location.href='scheda_reg.php?scheda=exam&tab=18&tipo=sids'" $p4>Cav. Toracica</button>
	<button class="$sids_cardio" onclick="location.href='scheda_reg.php?scheda=exam&tab=19&tipo=sids'" $p5>App. Cardiov.</button>
	<button class="$sids_respira" onclick="location.href='scheda_reg.php?scheda=exam&tab=20&tipo=sids'" $p6>App. Respiratorio</button>
	<button class="$sids_addomi" onclick="location.href='scheda_reg.php?scheda=exam&tab=21&tipo=sids'" $p7>Cav. Addominale</button>
	<button class="$sids_note" onclick="location.href='scheda_reg.php?scheda=exam&tab=23&tipo=sids'" $p8>Conclusioni</button>
STAMP;
	}
	if ($tab == 17){
echo <<<STAMP
	<button class="$sids_esterno" onclick="location.href='scheda_reg.php?scheda=exam&tab=15&tipo=sids'" $p1>Esame Esterno</button>
	<button class="$sids_encefalo" onclick="location.href='scheda_reg.php?scheda=exam&tab=16&tipo=sids'" $p2>Encefalo</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=exam&tab=17&tipo=sids'" $p3>Capo-Collo/Cavo Orale</button>
	<button class="$sids_toracica" onclick="location.href='scheda_reg.php?scheda=exam&tab=18&tipo=sids'" $p4>Cav. Toracica</button>
	<button class="$sids_cardio" onclick="location.href='scheda_reg.php?scheda=exam&tab=19&tipo=sids'" $p5>App. Cardiov.</button>
	<button class="$sids_respira" onclick="location.href='scheda_reg.php?scheda=exam&tab=20&tipo=sids'" $p6>App. Respiratorio</button>
	<button class="$sids_addomi" onclick="location.href='scheda_reg.php?scheda=exam&tab=21&tipo=sids'" $p7>Cav. Addominale</button>
	<button class="$sids_note" onclick="location.href='scheda_reg.php?scheda=exam&tab=23&tipo=sids'" $p8>Conclusioni</button>
STAMP;
	}
	if ($tab == 18){
echo <<<STAMP
	<button class="$sids_esterno" onclick="location.href='scheda_reg.php?scheda=exam&tab=15&tipo=sids'" $p1>Esame Esterno</button>
	<button class="$sids_encefalo" onclick="location.href='scheda_reg.php?scheda=exam&tab=16&tipo=sids'" $p2>Encefalo</button>
	<button class="$sids_capo" onclick="location.href='scheda_reg.php?scheda=exam&tab=17&tipo=sids'" $p3>Capo-Collo/Cavo Orale</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=exam&tab=18&tipo=sids'" $p4>Cav. Toracica</button>
	<button class="$sids_cardio" onclick="location.href='scheda_reg.php?scheda=exam&tab=19&tipo=sids'" $p5>App. Cardiov.</button>
	<button class="$sids_respira" onclick="location.href='scheda_reg.php?scheda=exam&tab=20&tipo=sids'" $p6>App. Respiratorio</button>
	<button class="$sids_addomi" onclick="location.href='scheda_reg.php?scheda=exam&tab=21&tipo=sids'" $p7>Cav. Addominale</button>
	<button class="$sids_note" onclick="location.href='scheda_reg.php?scheda=exam&tab=23&tipo=sids'" $p8>Conclusioni</button>
STAMP;
	}
	if ($tab == 19){
echo <<<STAMP
	<button class="$sids_esterno" onclick="location.href='scheda_reg.php?scheda=exam&tab=15&tipo=sids'" $p1>Esame Esterno</button>
	<button class="$sids_encefalo" onclick="location.href='scheda_reg.php?scheda=exam&tab=16&tipo=sids'" $p2>Encefalo</button>
	<button class="$sids_capo" onclick="location.href='scheda_reg.php?scheda=exam&tab=17&tipo=sids'" $p3>Capo-Collo/Cavo Orale</button>
	<button class="$sids_toracica" onclick="location.href='scheda_reg.php?scheda=exam&tab=18&tipo=sids'" $p4>Cav. Toracica</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=exam&tab=19&tipo=sids'" $p5>App. Cardiov.</button>
	<button class="$sids_respira" onclick="location.href='scheda_reg.php?scheda=exam&tab=20&tipo=sids'" $p6>App. Respiratorio</button>
	<button class="$sids_addomi" onclick="location.href='scheda_reg.php?scheda=exam&tab=21&tipo=sids'" $p7>Cav. Addominale</button>
	<button class="$sids_note" onclick="location.href='scheda_reg.php?scheda=exam&tab=23&tipo=sids'" $p8>Conclusioni</button>
STAMP;
	}
	if ($tab == 20){
echo <<<STAMP
	<button class="$sids_esterno" onclick="location.href='scheda_reg.php?scheda=exam&tab=15&tipo=sids'" $p1>Esame Esterno</button>
	<button class="$sids_encefalo" onclick="location.href='scheda_reg.php?scheda=exam&tab=16&tipo=sids'" $p2>Encefalo</button>
	<button class="$sids_capo" onclick="location.href='scheda_reg.php?scheda=exam&tab=17&tipo=sids'" $p3>Capo-Collo/Cavo Orale</button>
	<button class="$sids_toracica" onclick="location.href='scheda_reg.php?scheda=exam&tab=18&tipo=sids'" $p4>Cav. Toracica</button>
	<button class="$sids_cardio" onclick="location.href='scheda_reg.php?scheda=exam&tab=19&tipo=sids'" $p5>App. Cardiov.</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=exam&tab=20&tipo=sids'" $p6>App. Respiratorio</button>
	<button class="$sids_addomi" onclick="location.href='scheda_reg.php?scheda=exam&tab=21&tipo=sids'" $p7>Cav. Addominale</button>
	<button class="$sids_note" onclick="location.href='scheda_reg.php?scheda=exam&tab=23&tipo=sids'" $p8>Conclusioni</button>
STAMP;
	}
	if ($tab == 21){
echo <<<STAMP
	<button class="$sids_esterno" onclick="location.href='scheda_reg.php?scheda=exam&tab=15&tipo=sids'" $p1>Esame Esterno</button>
	<button class="$sids_encefalo" onclick="location.href='scheda_reg.php?scheda=exam&tab=16&tipo=sids'" $p2>Encefalo</button>
	<button class="$sids_capo" onclick="location.href='scheda_reg.php?scheda=exam&tab=17&tipo=sids'" $p3>Capo-Collo/Cavo Orale</button>
	<button class="$sids_toracica" onclick="location.href='scheda_reg.php?scheda=exam&tab=18&tipo=sids'" $p4>Cav. Toracica</button>
	<button class="$sids_cardio" onclick="location.href='scheda_reg.php?scheda=exam&tab=19&tipo=sids'" $p5>App. Cardiov.</button>
	<button class="$sids_respira" onclick="location.href='scheda_reg.php?scheda=exam&tab=20&tipo=sids'" $p6>App. Respiratorio</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=exam&tab=21&tipo=sids'" $p7>Cav. Addominale</button>
	<button class="$sids_note" onclick="location.href='scheda_reg.php?scheda=exam&tab=23&tipo=sids'" $p8>Conclusioni</button>
STAMP;
	}
	
	if ($tab == 23){
echo <<<STAMP
	<button class="$sids_esterno" onclick="location.href='scheda_reg.php?scheda=exam&tab=15&tipo=sids'" $p1>Esame Esterno</button>
	<button class="$sids_encefalo" onclick="location.href='scheda_reg.php?scheda=exam&tab=16&tipo=sids'" $p2>Encefalo</button>
	<button class="$sids_capo" onclick="location.href='scheda_reg.php?scheda=exam&tab=17&tipo=sids'" $p3>Capo-Collo/Cavo Orale</button>
	<button class="$sids_toracica" onclick="location.href='scheda_reg.php?scheda=exam&tab=18&tipo=sids'" $p4>Cav. Toracica</button>
	<button class="$sids_cardio" onclick="location.href='scheda_reg.php?scheda=exam&tab=19&tipo=sids'" $p5>App. Cardiov.</button>
	<button class="$sids_respira" onclick="location.href='scheda_reg.php?scheda=exam&tab=20&tipo=sids'" $p6>App. Respiratorio</button>
	<button class="$sids_addomi" onclick="location.href='scheda_reg.php?scheda=exam&tab=21&tipo=sids'" $p7>Cav. Addominale</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=exam&tab=23&tipo=sids'" $p8>Conclusioni</button>	
STAMP;
	}
?>
