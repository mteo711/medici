
<?php
$p1="disabled";
$p2="disabled";
$p3="disabled";
$p4="disabled";
$p5="disabled";
$p6="disabled";
if(isset($_SESSION["prelievi_sids_encefalo"])){
  $sids_encef = $_SESSION["prelievi_sids_encefalo"];
  if($sids_encef == 'tabs')
    $p1 = "disabled";
  else
    $p1 = '';
}
else
  $sids_encef = 'tabs';
if(isset($_SESSION["prelievi_sids_polmoni"])){
  $sids_polmoni = $_SESSION["prelievi_sids_polmoni"];
  if($sids_polmoni == 'tabs')
    $p2 = "disabled";
  else
    $p2 = '';
}
else
  $sids_polmoni = 'tabs';
if(isset($_SESSION["prelievi_sids_circolatorio"])){
  $sids_circola = $_SESSION["prelievi_sids_circolatorio"];
  if($sids_circola == 'tabs')
    $p3 = "disabled";
  else
    $p3 = '';
}
else
  $sids_circola = 'tabs';
if(isset($_SESSION["prelievi_sids_gastro"])){
  $sids_gas = $_SESSION["prelievi_sids_gastro"];
  if($sids_gas == 'tabs')
    $p4 = "disabled";
  else
    $p4 = '';
}
else
  $sids_gas = 'tabs';
if(isset($_SESSION["prelievi_sids_surrene"])){
  $sids_surr = $_SESSION["prelievi_sids_surrene"];
  if($sids_surr == 'tabs')
    $p5 = "disabled";
  else
    $p5 = '';
}
else
  $sids_surr = 'tabs';
if(isset($_SESSION["prelievi_sids_altro"])){
  $sids_alt = $_SESSION["prelievi_sids_altro"];
  if($sids_alt == 'tabs')
    $p6 = "disabled";
  else
    $p6 = '';
}
else
  $sids_alt = 'tabs';
	if ($tab == 22){
echo <<<STAMP
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=22&tipo=sids'" $p1>Encefalo</button>
	<button class="$sids_polmoni" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=24&tipo=sids'" $p2>Polmoni</button>
	<button class="$sids_circola" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=25&tipo=sids'" $p3>App. Circolat.</button>
	<button class="$sids_gas" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=26&tipo=sids'" $p4>Tratto Gastro-Enterico</button>
	<button class="$sids_surr" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=27&tipo=sids'" $p5>Surrene/Rene</button>
	<button class="$sids_alt" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=28&tipo=sids'" $p6>Altro</button>
	 
	 
STAMP;
	}
	if ($tab == 24){
echo <<<STAMP
	<button class="$sids_encef" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=22&tipo=sids'" $p1>Encefalo</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=24&tipo=sids'" $p2>Polmoni</button>
	<button class="$sids_circola" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=25&tipo=sids'" $p3>App. Circolat.</button>
	<button class="$sids_gas" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=26&tipo=sids'" $p4>Tratto Gastro-Enterico</button>
	<button class="$sids_surr" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=27&tipo=sids'" $p5>Surrene/Rene</button>
	<button class="$sids_alt" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=28&tipo=sids'" $p6>Altro</button>
	 
	 
STAMP;
	}
	if ($tab == 25){
echo <<<STAMP
	<button class="$sids_encef" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=22&tipo=sids'" $p1>Encefalo</button> 
	<button class="$sids_polmoni" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=24&tipo=sids'" $p2>Polmoni</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=25&tipo=sids'" $p3>App. Circolat.</button>
	<button class="$sids_gas" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=26&tipo=sids'" $p4>Tratto Gastro-Enterico</button>
	<button class="$sids_surr" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=27&tipo=sids'" $p5>Surrene/Rene</button>
	<button class="$sids_alt" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=28&tipo=sids'" $p6>Altro</button>
	 
	 
STAMP;
	}
	if ($tab == 26){
echo <<<STAMP
	<button class="$sids_encef" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=22&tipo=sids'" $p1>Encefalo</button>
	<button class="$sids_polmoni" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=24&tipo=sids'" $p2>Polmoni</button>
	<button class="$sids_circola" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=25&tipo=sids'" $p3>App. Circolat.</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=26&tipo=sids'" $p4>Tratto Gastro-Enterico</button>
	<button class="$sids_surr" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=27&tipo=sids'" $p5>Surrene/Rene</button>
	<button class="$sids_alt" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=28&tipo=sids'" $p6>Altro</button>
	 
	 
STAMP;
	}
	if ($tab == 27){
echo <<<STAMP
	<button class="$sids_encef" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=22&tipo=sids'" $p1>Encefalo</button>
	<button class="$sids_polmoni" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=24&tipo=sids'" $p2>Polmoni</button>
	<button class="$sids_circola" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=25&tipo=sids'" $p3>App. Circolat.</button>
	<button class="$sids_gas" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=26&tipo=sids'" $p4>Tratto Gastro-Enterico</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=27&tipo=sids'" $p5>Surrene/Rene</button>
	<button class="$sids_alt" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=28&tipo=sids'" $p6>Altro</button>
	 
	 
STAMP;
	}
	if ($tab == 28){
echo <<<STAMP
	<button class="$sids_encef" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=22&tipo=sids'" $p1>Encefalo</button>
	<button class="$sids_polmoni" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=24&tipo=sids'" $p2>Polmoni</button>
	<button class="$sids_circola" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=25&tipo=sids'" $p3>App. Circolat.</button>
	<button class="$sids_gas" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=26&tipo=sids'" $p4>Tratto Gastro-Enterico</button>
	<button class="$sids_surr" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=27&tipo=sids'" $p5>Surrene/Rene</button>
	<button class="tabs_att" onclick="location.href='scheda_reg.php?scheda=prelievi&tab=28&tipo=sids'" $p6>Altro</button>
	 
	 
STAMP;
	}
?>
