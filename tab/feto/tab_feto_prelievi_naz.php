
<?php
$p1="disabled";
$p2="disabled";
$p3="disabled";
$p4="disabled";
$p5="disabled";
$p6="disabled";
if(isset($_SESSION["prelievi_feto_encefaloF"])){
  $sids_enceff = $_SESSION["prelievi_feto_encefaloF"];
  if($sids_enceff == 'tabs')
    $p1 = "disabled";
  else
    $p1 = '';
}
else
  $sids_enceff = 'tabs';

if(isset($_SESSION["prelievi_feto_polmoniF"])){
  $sids_polmonif = $_SESSION["prelievi_feto_polmoniF"];
  if($sids_polmonif == 'tabs')
    $p2 = "disabled";
  else
    $p2 = '';
}
else
  $sids_polmonif = 'tabs';

if(isset($_SESSION["prelievi_feto_circolatorioF"])){
  $sids_circolaf = $_SESSION["prelievi_feto_circolatorioF"];
  if($sids_circolaf == 'tabs')
    $p3 = "disabled";
  else
    $p3 = '';
}
else
  $sids_circolaf = 'tabs';

if(isset($_SESSION["prelievi_feto_gastroF"])){
  $sids_gasf = $_SESSION["prelievi_feto_gastroF"];
  if($sids_gasf == 'tabs')
    $p4 = "disabled";
  else
    $p4 = '';
}
else
  $sids_gasf = 'tabs';

if(isset($_SESSION["prelievi_feto_surreneF"])){
  $sids_surrf = $_SESSION["prelievi_feto_surreneF"];
  if($sids_surrf == 'tabs')
    $p5 = "disabled";
  else
    $p5 = '';
}
else
  $sids_surrf = 'tabs';

if(isset($_SESSION["prelievi_feto_altroF"])){
  $sids_altf = $_SESSION["prelievi_feto_altroF"];
  if($sids_altf == 'tabs')
    $p6 = "disabled";
  else
    $p6 = '';
}
else
  $sids_altf = 'tabs';

	if ($tab == 22){
echo <<<STAMP
	<button class="tabs_att" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=22&tipo=feto'" $p1>Encefalo</button>
	<button class="$sids_polmonif" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=24&tipo=feto'" $p2>Polmoni</button>
	<button class="$sids_circolaf" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=25&tipo=feto'" $p3>App. Circolat.</button>
	<button class="$sids_gasf" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=26&tipo=feto'" $p4>Tratto Gastro-Enterico</button>
	<button class="$sids_surrf" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=27&tipo=feto'" $p5>Surrene/Rene</button>
	<button class="$sids_altf" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=28&tipo=feto'" $p6>Altro</button>
	 
	 
STAMP;
	}
	if ($tab == 24){
echo <<<STAMP
	<button class="$sids_enceff" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=22&tipo=feto'" $p1>Encefalo</button>
	<button class="tabs_att" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=24&tipo=feto'" $p2>Polmoni</button>
	<button class="$sids_circolaf" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=25&tipo=feto'" $p3>App. Circolat.</button>
	<button class="$sids_gasf" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=26&tipo=feto'" $p4>Tratto Gastro-Enterico</button>
	<button class="$sids_surrf" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=27&tipo=feto'" $p5>Surrene/Rene</button>
	<button class="$sids_altf" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=28&tipo=feto'" $p6>Altro</button>
	 
	 
STAMP;
	}
	if ($tab == 25){
echo <<<STAMP
	<button class="$sids_enceff" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=22&tipo=feto'" $p1>Encefalo</button> 
	<button class="$sids_polmonif" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=24&tipo=feto'" $p2>Polmoni</button>
	<button class="tabs_att" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=25&tipo=feto'" $p3>App. Circolat.</button>
	<button class="$sids_gasf" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=26&tipo=feto'" $p4>Tratto Gastro-Enterico</button>
	<button class="$sids_surrf" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=27&tipo=feto'" $p5>Surrene/Rene</button>
	<button class="$sids_altf" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=28&tipo=feto'" $p6>Altro</button>
	 
	 
STAMP;
	}
	if ($tab == 26){
echo <<<STAMP
	<button class="$sids_enceff" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=22&tipo=feto'" $p1>Encefalo</button>
	<button class="$sids_polmonif" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=24&tipo=feto'" $p2>Polmoni</button>
	<button class="$sids_circolaf" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=25&tipo=feto'" $p3>App. Circolat.</button>
	<button class="tabs_att" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=26&tipo=feto'" $p4>Tratto Gastro-Enterico</button>
	<button class="$sids_surrf" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=27&tipo=feto'" $p5>Surrene/Rene</button>
	<button class="$sids_altf" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=28&tipo=feto'" $p6>Altro</button>
	 
	 
STAMP;
	}
	if ($tab == 27){
echo <<<STAMP
	<button class="$sids_enceff" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=22&tipo=feto'" $p1>Encefalo</button>
	<button class="$sids_polmonif" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=24&tipo=feto'" $p2>Polmoni</button>
	<button class="$sids_circolaf" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=25&tipo=feto'" $p3>App. Circolat.</button>
	<button class="$sids_gasf" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=26&tipo=feto'" $p4>Tratto Gastro-Enterico</button>
	<button class="tabs_att" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=27&tipo=feto'" $p5>Surrene/Rene</button>
	<button class="$sids_altf" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=28&tipo=feto'" $p6>Altro</button>
	 
	 
STAMP;
	}
	if ($tab == 28){
echo <<<STAMP
	<button class="$sids_enceff" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=22&tipo=feto'" $p1>Encefalo</button>
	<button class="$sids_polmonif" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=24&tipo=feto'" $p2>Polmoni</button>
	<button class="$sids_circolaf" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=25&tipo=feto'" $p3>App. Circolat.</button>
	<button class="$sids_gasf" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=26&tipo=feto'" $p4>Tratto Gastro-Enterico</button>
	<button class="$sids_surrf" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=27&tipo=feto'" $p5>Surrene/Rene</button>
	<button class="tabs_att" onclick="location.href='scheda_naz.php?scheda=prelievi&tab=28&tipo=feto'" $p6>Altro</button>
	 
	 
STAMP;
	}
?>
