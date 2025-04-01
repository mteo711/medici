<!DOCTYPE html>
<html >
<?php
  session_start();
  if(isset($_GET['caseNumb']))
    $caseNumb = $_GET['caseNumb'];
  else
    $caseNumb = 'none';
  if(isset($_GET['scheda']))
    $scheda = $_GET['scheda'];
  else
    $scheda = 'exam';
  if(isset($_GET['tab']))
    $tab = $_GET['tab'];
  else
    $tab = '15';
  if(isset($_GET['tipo']))
    $tipo = $_GET['tipo'];
  else
    $tipo = 'prot';
?>
  <head>
    <meta charset="UTF-8">
    <title>Schede ***</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>

  <body>
  <div class="tab">
    <?php
      include_once ('tab/'.$tipo.'/tab_'.$tipo.'_'.$scheda.'.php');
    ?>
   </div>  
   <nav>
    <div class="scheda">
      <button class="home" onclick="location.href='index_reg.php'">Home</button>
      <button class="logout" onclick="location.href='index.php'">Logout</button>
      <p><?php echo 'ID: '. $caseNumb; ?></p>
      <p>Ospedale Maggiore</p>
      <p>16/06/2015</p>
    </div>
    
    <div>
      <?php
        include_once ('menu/menu_prot.php');
      ?>
    </div>
    
  </nav>

  <section>
    <?php
      include_once ('schede/'.$tipo.'/protocollo_'.$scheda.'_'.$tipo.'_'.$tab.'.php');
    ?>
  </section>
    
    
    
  </body>
</html>
