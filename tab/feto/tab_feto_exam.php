
<?php

$p1="disabled";
$p2="disabled";
$p3="disabled";
$p4="disabled";
$p5="disabled";
$p6="disabled";
$p7="disabled";
$p8="disabled";

if(isset($_SESSION["esami_mf_esterno"])){
  $mf_esterno = $_SESSION["esami_mf_esterno"];
  if($mf_esterno == 'tabs')
    $p1 = "disabled";
  else
    $p1 = '';
}
else
  $mf_esterno = 'tabs';

if(isset($_SESSION["esami_mf_encefalo"])){
  $mf_encefalo = $_SESSION["esami_mf_encefalo"];
  if($mf_encefalo == 'tabs')
    $p2 = "disabled";
  else
    $p2 = '';
}
else
  $mf_encefalo = 'tabs';

if(isset($_SESSION["esami_mf_capo"])){
  $mf_capo = $_SESSION["esami_mf_capo"];
  if($mf_capo == 'tabs')
    $p3 = "disabled";
  else
    $p3 = '';
}
else
  $mf_capo = 'tabs';

if(isset($_SESSION["esami_mf_toracica"])){
  $mf_toracica = $_SESSION["esami_mf_toracica"];
  if($mf_toracica == 'tabs')
    $p4 = "disabled";
  else
    $p4 = '';
}
else
  $mf_toracica = 'tabs';

if(isset($_SESSION["esami_mf_cardiovascolare"])){
  $mf_cardio = $_SESSION["esami_mf_cardiovascolare"];
  if($mf_cardio == 'tabs')
    $p5 = "disabled";
  else
    $p5 = '';
}
else
  $mf_cardio = 'tabs';

if(isset($_SESSION["esami_mf_respiratorio"])){
  $mf_respira = $_SESSION["esami_mf_respiratorio"];
  if($mf_respira == 'tabs')
    $p6 = "disabled";
  else
    $p6 = '';
}
else
  $mf_respira = 'tabs';

if(isset($_SESSION["esami_mf_addominale"])){
  $mf_addomi = $_SESSION["esami_mf_addominale"];
  if($mf_addomi == 'tabs')
    $p7 = "disabled";
  else
    $p7 = '';
}
else
  $mf_addomi = 'tabs';

if(isset($_SESSION["esami_mf_reni"])){
  $mf_reni = $_SESSION["esami_mf_reni"];
  if($mf_reni == 'tabs')
    $p8 = "disabled";
  else
    $p8 = '';
}
else
  $mf_reni = 'tabs';


	if ($tab == 15){
echo <<<STAMP
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=exam&tab=15&tipo=feto'" $p1>Esame Esterno</button>
	<button class="$mf_encefalo" onclick="location.href='scheda_reg.php?scheda=exam&tab=16&tipo=feto'" $p2>Esame Interno</button>
	<button class="$mf_capo" onclick="location.href='scheda_reg.php?scheda=exam&tab=17&tipo=feto'" $p3>Capo-Collo/Cavo Orale</button>
	<button class="$mf_toracica" onclick="location.href='scheda_reg.php?scheda=exam&tab=18&tipo=feto'" $p4>Cav. Toracica</button>
	<button class="$mf_cardio" onclick="location.href='scheda_reg.php?scheda=exam&tab=19&tipo=feto'" $p5>App. Cardiov.</button>
	<button class="$mf_respira" onclick="location.href='scheda_reg.php?scheda=exam&tab=20&tipo=feto'" $p6>App. Respiratorio</button>
	<button class="$mf_addomi" onclick="location.href='scheda_reg.php?scheda=exam&tab=21&tipo=feto'" $p7>Cav. Addominale</button>
	<button class="$mf_reni" onclick="location.href='scheda_reg.php?scheda=exam&tab=22&tipo=feto'" $p8>Surreni/Reni</button>
STAMP;
	}
	if ($tab == 16){
echo <<<STAMP
	<button class="$mf_esterno" onclick="location.href='scheda_reg.php?scheda=exam&tab=15&tipo=feto'" $p1>Esame Esterno</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=exam&tab=16&tipo=feto'" $p2>Esame Interno</button>
	<button class="$mf_capo" onclick="location.href='scheda_reg.php?scheda=exam&tab=17&tipo=feto'" $p3>Capo-Collo/Cavo Orale</button>
	<button class="$mf_toracica" onclick="location.href='scheda_reg.php?scheda=exam&tab=18&tipo=feto'" $p4>Cav. Toracica</button>
	<button class="$mf_cardio" onclick="location.href='scheda_reg.php?scheda=exam&tab=19&tipo=feto'" $p5>App. Cardiov.</button>
	<button class="$mf_respira" onclick="location.href='scheda_reg.php?scheda=exam&tab=20&tipo=feto'" $p6>App. Respiratorio</button>
	<button class="$mf_addomi" onclick="location.href='scheda_reg.php?scheda=exam&tab=21&tipo=feto'" $p7>Cav. Addominale</button>
	<button class="$mf_reni" onclick="location.href='scheda_reg.php?scheda=exam&tab=22&tipo=feto'" $p8>Surreni/Reni</button>
STAMP;
	}
	if ($tab == 17){
echo <<<STAMP
	<button class="$mf_esterno" onclick="location.href='scheda_reg.php?scheda=exam&tab=15&tipo=feto'" $p1>Esame Esterno</button>
	<button class="$mf_encefalo" onclick="location.href='scheda_reg.php?scheda=exam&tab=16&tipo=feto'" $p2>Esame Interno</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=exam&tab=17&tipo=feto'" $p3>Capo-Collo/Cavo Orale</button>
	<button class="$mf_toracica" onclick="location.href='scheda_reg.php?scheda=exam&tab=18&tipo=feto'" $p4>Cav. Toracica</button>
	<button class="$mf_cardio" onclick="location.href='scheda_reg.php?scheda=exam&tab=19&tipo=feto'" $p5>App. Cardiov.</button>
	<button class="$mf_respira" onclick="location.href='scheda_reg.php?scheda=exam&tab=20&tipo=feto'" $p6>App. Respiratorio</button>
	<button class="$mf_addomi" onclick="location.href='scheda_reg.php?scheda=exam&tab=21&tipo=feto'" $p7>Cav. Addominale</button>
	<button class="$mf_reni" onclick="location.href='scheda_reg.php?scheda=exam&tab=22&tipo=feto'" $p8>Surreni/Reni</button>
STAMP;
	}
	if ($tab == 18){
echo <<<STAMP
	<button class="$mf_esterno" onclick="location.href='scheda_reg.php?scheda=exam&tab=15&tipo=feto'" $p1>Esame Esterno</button>
	<button class="$mf_encefalo" onclick="location.href='scheda_reg.php?scheda=exam&tab=16&tipo=feto'" $p2>Esame Interno</button>
	<button class="$mf_capo" onclick="location.href='scheda_reg.php?scheda=exam&tab=17&tipo=feto'" $p3>Capo-Collo/Cavo Orale</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=exam&tab=18&tipo=feto'" $p4>Cav. Toracica</button>
	<button class="$mf_cardio" onclick="location.href='scheda_reg.php?scheda=exam&tab=19&tipo=feto'" $p5>App. Cardiov.</button>
	<button class="$mf_respira" onclick="location.href='scheda_reg.php?scheda=exam&tab=20&tipo=feto'" $p6>App. Respiratorio</button>
	<button class="$mf_addomi" onclick="location.href='scheda_reg.php?scheda=exam&tab=21&tipo=feto'" $p7>Cav. Addominale</button>
	<button class="$mf_reni" onclick="location.href='scheda_reg.php?scheda=exam&tab=22&tipo=feto'" $p8>Surreni/Reni</button>
STAMP;
	}
	if ($tab == 19){
echo <<<STAMP
	<button class="$mf_esterno" onclick="location.href='scheda_reg.php?scheda=exam&tab=15&tipo=feto'" $p1>Esame Esterno</button>
	<button class="$mf_encefalo" onclick="location.href='scheda_reg.php?scheda=exam&tab=16&tipo=feto'" $p2>Esame Interno</button>
	<button class="$mf_capo" onclick="location.href='scheda_reg.php?scheda=exam&tab=17&tipo=feto'" $p3>Capo-Collo/Cavo Orale</button>
	<button class="$mf_toracica" onclick="location.href='scheda_reg.php?scheda=exam&tab=18&tipo=feto'" $p4>Cav. Toracica</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=exam&tab=19&tipo=feto'" $p5>App. Cardiov.</button>
	<button class="$mf_respira" onclick="location.href='scheda_reg.php?scheda=exam&tab=20&tipo=feto'" $p6>App. Respiratorio</button>
	<button class="$mf_addomi" onclick="location.href='scheda_reg.php?scheda=exam&tab=21&tipo=feto'" $p7>Cav. Addominale</button>
	<button class="$mf_reni" onclick="location.href='scheda_reg.php?scheda=exam&tab=22&tipo=feto'" $p8>Surreni/Reni</button>
STAMP;
	}
	if ($tab == 20){
echo <<<STAMP
	<button class="$mf_esterno" onclick="location.href='scheda_reg.php?scheda=exam&tab=15&tipo=feto'" $p1>Esame Esterno</button>
	<button class="$mf_encefalo" onclick="location.href='scheda_reg.php?scheda=exam&tab=16&tipo=feto'" $p2>Esame Interno</button>
	<button class="$mf_capo" onclick="location.href='scheda_reg.php?scheda=exam&tab=17&tipo=feto'" $p3>Capo-Collo/Cavo Orale</button>
	<button class="$mf_toracica" onclick="location.href='scheda_reg.php?scheda=exam&tab=18&tipo=feto'" $p4>Cav. Toracica</button>
	<button class="$mf_cardio" onclick="location.href='scheda_reg.php?scheda=exam&tab=19&tipo=feto'" $p5>App. Cardiov.</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=exam&tab=20&tipo=feto'" $p6>App. Respiratorio</button>
	<button class="$mf_addomi" onclick="location.href='scheda_reg.php?scheda=exam&tab=21&tipo=feto'" $p7>Cav. Addominale</button>
	<button class="$mf_reni" onclick="location.href='scheda_reg.php?scheda=exam&tab=22&tipo=feto'" $p8>Surreni/Reni</button>
STAMP;
	}
	if ($tab == 21){
echo <<<STAMP
	<button class="$mf_esterno" onclick="location.href='scheda_reg.php?scheda=exam&tab=15&tipo=feto'" $p1>Esame Esterno</button>
	<button class="$mf_encefalo" onclick="location.href='scheda_reg.php?scheda=exam&tab=16&tipo=feto'" $p2>Esame Interno</button>
	<button class="$mf_capo" onclick="location.href='scheda_reg.php?scheda=exam&tab=17&tipo=feto'" $p3>Capo-Collo/Cavo Orale</button>
	<button class="$mf_toracica" onclick="location.href='scheda_reg.php?scheda=exam&tab=18&tipo=feto'" $p4>Cav. Toracica</button>
	<button class="$mf_cardio" onclick="location.href='scheda_reg.php?scheda=exam&tab=19&tipo=feto'" $p5>App. Cardiov.</button>
	<button class="$mf_respira" onclick="location.href='scheda_reg.php?scheda=exam&tab=20&tipo=feto'" $p6>App. Respiratorio</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=exam&tab=21&tipo=feto'" $p7>Cav. Addominale</button>
	<button class="$mf_reni" onclick="location.href='scheda_reg.php?scheda=exam&tab=22&tipo=feto'" $p8>Surreni/Reni</button>
STAMP;
	}
	if ($tab == 22){
echo <<<STAMP
	<button class="$mf_esterno" onclick="location.href='scheda_reg.php?scheda=exam&tab=15&tipo=feto'" $p1>Esame Esterno</button>
	<button class="$mf_encefalo" onclick="location.href='scheda_reg.php?scheda=exam&tab=16&tipo=feto'" $p2>Esame Interno</button>
	<button class="$mf_capo" onclick="location.href='scheda_reg.php?scheda=exam&tab=17&tipo=feto'" $p3>Capo-Collo/Cavo Orale</button>
	<button class="$mf_toracica" onclick="location.href='scheda_reg.php?scheda=exam&tab=18&tipo=feto'" $p4>Cav. Toracica</button>
	<button class="$mf_cardio" onclick="location.href='scheda_reg.php?scheda=exam&tab=19&tipo=feto'" $p5>App. Cardiov.</button>
	<button class="$mf_respira" onclick="location.href='scheda_reg.php?scheda=exam&tab=20&tipo=feto'" $p6>App. Respiratorio</button>
	<button class="$mf_addomi" onclick="location.href='scheda_reg.php?scheda=exam&tab=21&tipo=feto'" $p7>Cav. Addominale</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=exam&tab=22&tipo=feto'" $p8>Surreni/Reni</button>
STAMP;
	}

	if ($tab == 23){
echo <<<STAMP
	<button class="$mf_esterno" onclick="location.href='scheda_reg.php?scheda=exam&tab=15&tipo=feto'" $p1>Esame Esterno</button>
	<button class="$mf_encefalo" onclick="location.href='scheda_reg.php?scheda=exam&tab=16&tipo=feto'" $p2>Esame Interno</button>
	<button class="$mf_capo" onclick="location.href='scheda_reg.php?scheda=exam&tab=17&tipo=feto'" $p3>Capo-Collo/Cavo Orale</button>
	<button class="$mf_toracica" onclick="location.href='scheda_reg.php?scheda=exam&tab=18&tipo=feto'" $p4>Cav. Toracica</button>
	<button class="$mf_cardio" onclick="location.href='scheda_reg.php?scheda=exam&tab=19&tipo=feto'" $p5>App. Cardiov.</button>
	<button class="$mf_respira" onclick="location.href='scheda_reg.php?scheda=exam&tab=20&tipo=feto'" $p6>App. Respiratorio</button>
	<button class="$mf_addomi" onclick="location.href='scheda_reg.php?scheda=exam&tab=21&tipo=feto'" $p7>Cav. Addominale</button>
	<button class="$mf_reni" onclick="location.href='scheda_reg.php?scheda=exam&tab=22&tipo=feto'" $p8>Surreni/Reni</button>	
STAMP;
	}
?>
