<?php

$p1="disabled";
$p2="disabled";
$p3="disabled";
$p4="disabled";
if(isset($_SESSION["ref_placenta"])){
  $refp = $_SESSION["ref_placenta"];
  if($refp == 'tabs')
    $p1 = "disabled";
  else
    $p1 = '';
}
else
  $refp = 'tabs';
if(isset($_SESSION["ref_cordone"])){
  $refc = $_SESSION["ref_cordone"];
  if($refc == 'tabs')
    $p2 = "disabled";
  else
    $p2 = '';
}
else
  $refc = 'tabs';
if(isset($_SESSION["ref_disco"])){
  $refd = $_SESSION["ref_disco"];
  if($refd == 'tabs')
    $p3 = "disabled";
  else
    $p3 = '';
}
else
  $refd = 'tabs';

if(isset($_SESSION["ref_mf_note"])){
  $mf_note = $_SESSION["ref_mf_note"];
  if($mf_note == 'tabs')
    $p4 = "disabled";
  else
    $p4 = '';
}
else
  $mf_note = 'tabs';

	if ($tab == 1){
echo <<<STAMP
	<button class="tabs_att" id="t1" onclick="location.href='scheda_naz.php?scheda=referto&tab=1&tipo=feto'" $p1>Placenta/Membrane</button>
	<button class="$refc" id="t3" onclick="location.href='scheda_naz.php?scheda=referto&tab=2&tipo=feto'" $p2>Cordone Ombelicale</button>
	<button class="$refd" id="t4" onclick="location.href='scheda_naz.php?scheda=referto&tab=3&tipo=feto'" $p3>Disco Coriale</button>
    <button class="$mf_note" onclick="location.href='scheda_naz.php?scheda=referto&tab=4&tipo=feto'" $p4>Note</button>
STAMP;
	}
	if ($tab == 2){
echo <<<STAMP
	<button class="$refp" id="t1" onclick="location.href='scheda_naz.php?scheda=referto&tab=1&tipo=feto'" $p1>Placenta/Membrane</button>
	<button class="tabs_att" id="t3" onclick="location.href='scheda_naz.php?scheda=referto&tab=2&tipo=feto'" $p2>Cordone Ombelicale</button>
	<button class="$refd" id="t4" onclick="location.href='scheda_naz.php?scheda=referto&tab=3&tipo=feto'" $p3>Disco Coriale</button>
    <button class="$mf_note" onclick="location.href='scheda_naz.php?scheda=referto&tab=4&tipo=feto'" $p4>Note</button>
STAMP;
	}
	if ($tab == 3){
echo <<<STAMP
	<button class="$refp" id="t1" onclick="location.href='scheda_naz.php?scheda=referto&tab=1&tipo=feto'" $p1>Placenta/Membrane</button>
	<button class="$refc" id="t3" onclick="location.href='scheda_naz.php?scheda=referto&tab=2&tipo=feto'" $p2>Cordone Ombelicale</button>
	<button class="tabs_att" id="t4" onclick="location.href='scheda_naz.php?scheda=referto&tab=3&tipo=feto'" $p3>Disco Coriale</button>
    <button class="$mf_note" onclick="location.href='scheda_naz.php?scheda=referto&tab=4&tipo=feto'" $p4>Note</button>
STAMP;
	}
   if ($tab == 4){
echo <<<STAMP
	<button class="$refp" id="t1" onclick="location.href='scheda_naz.php?scheda=referto&tab=1&tipo=feto'" $p1>Placenta/Membrane</button>
	<button class="$refc" id="t3" onclick="location.href='scheda_naz.php?scheda=referto&tab=2&tipo=feto'" $p2>Cordone Ombelicale</button>
	<button class="$refd" id="t4" onclick="location.href='scheda_naz.php?scheda=referto&tab=3&tipo=feto'" $p3>Disco Coriale</button>
    <button class="tabs_att" onclick="location.href='scheda_naz.php?scheda=referto&tab=4&tipo=feto'" $p4>Note</button>
STAMP;
	}
?>