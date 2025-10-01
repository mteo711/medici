<?php 

class Database{
	//Declare connection string
public $connection;

// contiene la presenza di un errore 
private $error_status=1;
// contiene il messaggio di errore associato allo stato di errore
private $error_message;

private $host="localhost";
private $user="sids";
private $pass="anacleto2024";
//private $pass="lucaf";
private $db="sids";
# mysqldump -p -u root sids_mf_db1 > sids_dump.sql

// contiene il numero di righe che sono state modificate dall'ultimo comando eseguito
private $num_rows=0;

public $msg= array(0=>'Problemi di connessione al server MySQL',
			   1=>'ok',
               2=>'Il record che vuoi cancellare non esiste',
			   3=>'Il record che vuoi modificare non esiste',
			   4=>'Il record che vuoi recuperare non esiste',
			   5=>'Una delle colonne specificate non appartengono alla tabella',
			   6=>'Specificato valore nullo per un attributo',
			   7=>'Specificato valore non congruo per una lista',
			   8=>'Valore non valido per un tipo SET'
			   );

			   // valori una per campi di tipo ENUM
public $sex=array('maschio','femmina');			   
public $bool=array('Y','N');
public $bool_mancante=array('Y', 'N', 'mancante');			   
public $tipoScheda=array('sids','morte fetale');			   
public $tipoEtnia=array('caucasica', 'ispanica','medio orientale','indiana','asiatica','nera','meticcia','magrebina','altra', 'mancante');
public $tipoGenitore=array('MADRE','PADRE'); 
public $tipoAlterazione_emoglobina =array('talassemia','metemoglobinemia','altro');
public $tipoRisultato =array('normale','non effettuata','patologico'); 
public $tipoRisultatoA =array('normale','non effettuata','patologico','mancante'); 
public $tipoRisultatoB =array('normale','patologico','mancante'); 

public $tipoMalformazioni =array('cardiache','SNC','parete addominale','tratto gastroenterico','arteria ombelicale unica','apparato muscolo scheletrico');
public $tipoPlacenta =array('distacco intempestivo','previa','vasi previ','infarto','accreta-percreta');

public $tipoSonno =array('supino', 'prono', 'fianco', 'mancante', 'mai stessa posizione');
public $tipoPatologia =array('raffreddore', 'tosse', 'febbre', 'diarrea', 'vomito/rigurgito', 'esantema/eczema', 'altro');
public $tipoDisturboRespiratorio =array('apnee notturne', 'altro');
public $tipoRianimazione =array('genitore', 'medico 118', 'altro 118', 'testimone medico', 'testimone non medico', 'mancante');

public $tipoLuogo =array('ospedale', 'casa', 'fuori casa');
public $tipoPosizione =array('supina', 'prona', 'sul fianco', 'altra');
public $tipoAspetto =array('decolorazione attorno al volto o bocca', 'sudato', 'secrezioni', 'flaccido', 'decolorazione cutanea', 'caldo', 'freddo', 'segni da pressione', 'rash o petecchie', 'rigido', 'impronte sul corpo', 'non valutato', 'altro');
public $tipoRilevamento =array('medico di famiglia', 'medico 118', 'pediatra', 'altro') ;
public $tipoAborto =array('feto','aborto','ivg') ;
    
 
public $tipoLuogoEst =array('nel passeggino', 'nel seggiolino in automobile','in braccio','abitazione altrui','altro');
public $tipoLuogoInt =array('in culla/lettino in camera coi genitori', 'in culla/lettino in camera separata', 'in altro luogo', 'a letto coi genitori', 'a letto con altre persone', 'nel seggiolone', 'in braccio', 'nel passeggino', 'nell infan-seat');

public $segniTanatologici= array('ipostasi','rigidita');  
public $tipoFenotipo =array('armonico','asimmetrico','dismorfico/malformato','papiraceo');
public $tipoNutrizione =array('adeguata','inadeguata');
public $tipoIdrope =array('diffusa','segmentaria');
public $tipoMacerazioneo =array('I','II','III');
public $tipoColorito =array('pallido','rosso vivo','violaceo-mattone','grigio-verdastro','sub itterico','itterico','marezzature petecchie','sede');
public $tipoGenitali =array('maschili','femminili','ambigui','ipotrofici','ipertrofici','endematosi');
public $tipoCordone =array('normale','marcato assottigliamento','discromie','cisti del cordone','ematoma','numero vasi');
public $tipoEstremita =array('normali','incomplete','anomalie posturali');
  
public $tipoIspessimenti =array('diffusi','nodulari');
public $tipoMilza =array('assenza','milze multiple');
public $tipoTaglio =array('emorragie','rammollimenti');
public $tipoAspettoEsterno =array('emorragie','ipermia','edema','poligono di willis');


public $tipoFontanella= array('normotesa','estroflessa','introflessa');
public $tipoDuramadre= array('integra','liscia','madreperlacea');
public $tipoSenovenoso= array('pervio','congesto','trombizzato');
public $tipoEmorragie= array('intradurale','sub aracnoidee','iperemia dei vasi meningei');
public $tipoLeptomeningi= array('ben svolgibili','opache','congeste','verde-grigiastre');
public $tipoSolchi= array('normali','allargati','ridotti con circonvoluzioni appiattite');
public $tipoSetto= array('normale','assente','assottigliato');
public $tipoVentricoli= array('normali','dilatati','stenotici');
public $tipoPlessi= array('normali','edematosi');

public $tipoTiroideLaringe= array('normale','malformata');
public $tipoTimo= array('presente','assente','petecchie emorragiche');

public $tipoVieAeree= array('pervie','corpi estranei','ab ingestis','edema glottide');

    
public $tipoLaringe= array('normali','malformati','pervie');
public $tipoEsofago= array('normale','fistole','malformazioni');
public $tipoSaccoP= array('integro','lacerato','incompleto');

public $tipoSterno= array('normali','malformati');
public $tipoColonna= array('normale','in asse','scoliosi','cifosi','lordosi');
public $tipoDiaframma= array('normoconformato','agenesia/fessurazione','eventratio');
    
public $tipoConsenso=array('riscontro','genetiche','tossicologiche');	


public $stato_viscerale= array('proprio','situs viscerum inversus');
public $arterie_vena_ombelicale_stato= array('normali','agenesia','ipoplasia');
public $dotto_Aranzio= array('pervio','stenotico','assente');
public $vene_sovraepatiche_vena_cava_inf= array('normali','trombizzate','malformate');
public $stomaco= array('normale','normodotato','ipoplasico','sovradisteso');
public $piccolo_grosso_intestino= array('normosito e normoconformato','emorragie gastrointestinali','malformazioni');
public $fegato_volume= array('normale','aumentato','ridotto');
public $fegato_consistenza= array('propria','ridotta','aumentata');
public $fegato_superficie= array('liscia lucente','granulare','mammellonata');
public $fegato_parenchima_al_taglio= array('normale','congesto','pallido','giallastro','verdastro');
public $colecisti= array('normale','ipoplasia','sovradistesa');
public $vie_biliarie_extraepatiche= array('normali e pervie','ipoplasiche','assenti');
public $pancreas= array('normale','ridotto','malformato');
public $milza= array('normale','a destra','assente','milza accessoria');
public $surreni= array('normali','malformati');
public $surreni_ispessimenti= array('diffusi','nodulari');
public $rene_dx_stato= array('normale','malformato');
public $ureteri= array('normali','malformati');
public $vescica_urinaria= array('normale','malformata');
public $vescica_urinaria_contenuto= array('vuota','urina','sangue e coaguli ematici');
public $uraco= array('normale','assente','cistico');
public $testicoli= array('in addome','canale inguinale','scroto','assenti');
public $utero_tube_ovaie= array('senza anomalie macroscopiche e di dimensione nella norma','cisti ovariche','malformazioni');
public $grandi_vasi= array('normali','trombizzati','malformati');

public $placenta= array('singola','gemellare fusa','gemellare separata');
public $placenta_pervenuta= array('fresca','fissata','refrigerata','congelata','intera','frammentata','parziale','cotiledoni lacerati','lembi di decidua basale adesi');
public $placenta_membrane_punto_rottura= array('precisabile','imprecisabile');
public $placenta_inserzione= array('normale','marginale','extracoriale');
public $placenta_caratteristiche= array('ispessite','sottili','opache','lucenti','colorazione di meconio','edema','emorragie retromembranosa');
public $cordone_ombelicale_inserzione= array('centrale','marginale','eccentrica','velamentosa');
public $disco_coriale_forma= array('rotonda','ovale','a cuore','a rene','a racchetta','bilobata','trilobata','doppia','tripla','multipla','membranosa','fenestrata','anulare','lobi accessori','lobi aberranti');
public $vasi_coriali_distribuzione= array('magistrale','dispersa','anastomosi vascolari','angiodistopie');
public $tipoCasoSIDS=array('SIDS','SUID','non classificato','incerto');

// valori usati per campi di tipo SET

public $tipoPeriodo =array('gestazionale','pregestazionale');
public $tipoInfezione =array('hiv','hbv','hcv','lue','toxo','cmv','rubeo', 'hmv','altro');
public $tipoPatologie =array('disturbi tiroide','cardiopatia','patologie renali','colestasi gravidica','parodontopatie','altro');

public $tipoAlimenti =array('materno', 'polvere', 'mucca', 'acqua', 'liquidi', 'omogeneizzati', 'altro');

public $tipoCordoneOmbelicale=array('nodi veri','nodi falsi','torsione','restringimenti','iperspiralizzazione','aneurismi','ematomi','trombosi');
public $tipoVersanteFetale=array('lucente','opaco','metaplasia squamosa','amnios nodosum','fibrina subcorionica','ematomi subcorionici','ematomi subamniotici');
public $tipoVersanteMaterno=array('cotiledoni prominenti','cavitazioni centrali','aree depresse','lacerazioni','fibrina perivillosa','sclerosi marginale','calcificazioni');

public $tipoAspetto2 =array('decolorazione attorno al volto o bocca', 'sudato', 'secrezioni', 'flaccido', 'decolorazione cutanea', 'caldo', 'freddo', 'segni da pressione', 'rash o petecchie', 'rigido', 'impronte sul corpo', 'non valutato', 'altro');
	
public $tipoTipologiePatologie=array('raffreddore', 'tosse', 'febbre', 'diarrea', 'vomito/rigurgito', 'esantema/eczema', 'altro');
public $tipoTipologieDisturbi=array('apnee notturne', 'altro');
    
 
public function error()
{
 
 if ($this->error_status != 1) {
    //  per verificare la presenza di errori decommentare la seguente riga
    die("Si Ë verificato il seguente errore " . $this->msg[$this->error_status]); 
    return true;
 }
 else return false;
}
			   
public function __construct(){
    $this->connection = new mysqli($this->host,$this->user,$this->pass,$this->db);

    //Check Connection
    if($this->connection->connect_errno){
	    $this->error_status=0;
		die("Connection Fail ");//.$this->connection->connect_error);
		return 0;         
    }
    else{
        //echo 'connesso <br/>';
		$this->error_status=1;
		return 1;
		
    }
 
}

public function __destruct() {
   // Close the connection
   $this->connection->close();
   $this->error_status=0;
}

//Function to Create Table
//public function CreateTable($sql){
//Definition of function CreateTable
//}

public function fetchNumRows()
{
  return $this->num_rows;
}


public function fetchRecord(array $val_cols){
	
	$i=0;
	$table= get_class($this);

	// Build the SQL query dynamically based on the provided columns
	$conditions = [];
	$params = [];
	$types = '';

	foreach ($val_cols as $key => $value) {
		$conditions[] = "$key = ?";
		$params[] = $value;
		$types .= 's'; // Assuming all values are strings. Adjust as needed for different types.
	}
	$sql = "SELECT * FROM $table WHERE " . implode(" AND ", $conditions);
	// Prepare the statement
	if ($stmt = $this->connection->prepare($sql)) {
		// Bind parameters
		$stmt->bind_param($types, ...$params);

		// Execute the statement
		$stmt->execute();

		// Get the result
		$result = $stmt->get_result();
		if ($this->connection->errno) {
			$this->error_status = 4;
			die("Fail Select " . $this->connection->error);
			return 4;
		}

		// Set the number of rows
		$this->num_rows = $result->num_rows;

		// Return a single array as required columns result
		return $result->fetch_assoc();
	} else {
		// Handle errors for statement preparation
		$this->error_status = 4;
		die("Fail Prepare " . $this->connection->error);
		return 4;
	}
}


//Fetch data by accepting table name, columns(1 dimentional array) name, and a condition
public function fetch(array $columns, array $val_cols){
	
        $i=0;
		$table= get_class($this);
		$conditions = [];
		$params = [];
		$types = '';
	
		foreach ($val_cols as $key => $value) {
			$conditions[] = "$key = ?";
			$params[] = $value;
			$types .= 's'; // Assuming all values are strings. Adjust as needed for different types.
		}
		$sql = "SELECT * FROM $table WHERE " . implode(" AND ", $conditions);

	// Prepare the statement
	if ($stmt = $this->connection->prepare($sql)) {
		// Bind parameters
		$stmt->bind_param($types, ...$params);

		// Execute the statement
		$stmt->execute();

		// Get the result
		$result = $stmt->get_result();

		if ($this->connection->errno) {
			$this->error_status = 4;
			die("Fail Select " . $this->connection->error);
			return 4;
		}

		// Set the number of rows
		$this->num_rows = $result->num_rows;
        for ($res = array(); $tmp = $result->fetch_assoc();) $res[] = $tmp;
        return $res;

	} else {
		// Handle errors for statement preparation
		$this->error_status = 4;
		die("Fail Prepare " . $this->connection->error);
		return 4;
	}

}
    
//Fetch data by accepting table name, columns(1 dimentional array) name, and a condition
public function fetch2(array $columns){
        $i=0;
		$table= get_class($this);
    
		$columns=implode(",",$columns);
		//echo "SELECT $columns FROM $table WHERE $Stexp <br/>";
		$result=$this->connection->query("SELECT $columns FROM $table");
	
		if($this->connection->errno){
		    $this->error_status=4;
			die("Fail Select ".$this->connection->error);
			return 4;
		}
		// metto il numero di tuple restituite dall'interrogazione in un attributo della classe 
        $this->num_rows= $result->num_rows; 
        for ($res = array(); $tmp = $result->fetch_assoc();) $res[] = $tmp;
        return $res;

		//return two dimentional array as required columns result
		//return $result->fetch_all(MYSQLI_ASSOC);
}


// Insert Data within table by accepting TableName and Table column
public function insert(array $val_cols) {
    $tblname = get_class($this);
    
    $keysString = implode(", ", array_keys($val_cols));
    $placeholders = implode(", ", array_fill(0, count($val_cols), '?')); // Create placeholders
    
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error() . "<br/>";
        $this->error_status = 0;
        return 0;
    }

    // Prepare the SQL statement
    $stmt = $this->connection->prepare("INSERT INTO $tblname ($keysString) VALUES ($placeholders)");

    if ($stmt === false) {
        $this->error_status = 0;
        echo "Prepare failed: " . $this->connection->error . "<br/>";
        return 0;
    }

    // Bind parameters dynamically
    $types = str_repeat('s', count($val_cols)); // Assuming all values are strings; adjust types as necessary
    $stmt->bind_param($types, ...array_values($val_cols)); // Use the spread operator
	echo "INSERT INTO $tblname ($keysString) VALUES ($placeholders)";
    // Execute the statement
    if ($stmt->execute()) {
        $this->num_rows = $stmt->affected_rows;
        $this->error_status = 1;
        return 1;
    } else {
        $this->error_status = 0;
		
        echo "Error: " . $stmt->error . "INSERT INTO $tblname ($keysString) VALUES ($placeholders)". "<br/>";
        return 0;
    }
}

//Delete data form table; Accepting Table Name and Keys=>Values as associative array
public function delete(array $val_cols){
		
		$tblname= get_class($this);
		$i=0;
		foreach($val_cols as $key=>$value) {
			$exp[$i] = $key." = '".$value."'";
		    $i++;
		}

		$Stexp = implode(" AND ",$exp);

		//Perform Delete operation
		if($this->connection->query("DELETE FROM $tblname WHERE $Stexp") === TRUE){
		    // metto il numero di tuple restituite dall'interrogazione in un attributo della classe 
		    $this->num_rows= mysqli_affected_rows($this->connection);  
			if(mysqli_affected_rows($this->connection)){
				echo "Record has been deleted successfully";
				$this->error_status=1;
				return 1;
			}
			else{
				echo "The Record you want to delete is no loger exists";
				$this->error_status=2;
				return 2;
			}
		}
		else{
			echo "Error to delete".$this->connection->error . "<br/>";
			$this->error_status=0;
			return 0;
		}
		
}

//Update data within table; Accepting Table Name and Keys=>Values as associative array
public function update(array $set_val_cols, array $cond_val_cols){
		//append set_val_cols associative array elements 
		$tblname= get_class($this);
		$i=0;
		foreach($set_val_cols as $key=>$value) {
			$set[$i] = $key." = '".$value."'";
		    $i++;
		}

		$Stset = implode(", ",$set);

		//append cond_val_cols associative array elements
		$i=0;
		foreach($cond_val_cols as $key=>$value) {
		
		$cod[$i] = $key." = '".$value."'";
		    $i++;
		}

		$Stcod = implode(" AND ",$cod);
        //echo "UPDATE $tblname SET $Stset WHERE $Stcod";
		//Update operation
		if($this->connection->query("UPDATE $tblname SET $Stset WHERE $Stcod") != TRUE)
		{/* ho tolto questo controllo perchÈ ci sono dei casi in cui non modifico nulla
			if(mysqli_affected_rows($this->connection)){
				echo "Record updated successfully" . "<br/>";
				$this->error_status=1;
				return 1;
			}
			else{
				echo "The Record you want to updated is no longer exists" . "<br/>";
				$this->error_status=3;
				return 3;
			}
		}else{*/
			echo "Error to update".$this->connection->error . "<br/>";
			$this->error_status=0;
		    return 0;
		}
		$this->num_rows= mysqli_affected_rows($this->connection); 
}
    
//Delete 1 row from a tabel with some condition
public function cancelRow(array $cond_val_cols){ 
		$tblname= get_class($this);

		//append cond_val_cols associative array elements
		$i=0;
		foreach($cond_val_cols as $key=>$value) {
		
		$cod[$i] = $key." = '".$value."'";
		    $i++;
		}

		$Stcod = implode(" AND ",$cod);
        //echo "DELETE FROM $tblname WHERE $Stcod";
		//Delete operation
		if($this->connection->query("DELETE FROM $tblname WHERE $Stcod") != TRUE)
		{
			echo "Error to update".$this->connection->error . "<br/>";
			$this->error_status=0;
		    return 0;
		}
		$this->num_rows= mysqli_affected_rows($this->connection); 
}

// the following functions are used to check the values in input depending on their types

private function test_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  $value = mysqli_real_escape_string($this->connection, $value);
  return $value;
 }

private function isValidDateTimeString($str_dt, $str_dateformat) {
  $date = DateTime::createFromFormat($str_dateformat, $str_dt);
  return ($date && DateTime::getLastErrors()["warning_count"] == 0 && DateTime::getLastErrors()["error_count"] == 0);
}

private function checkDate($value){
    $safe_value = $this->test_input($value);
    if (empty($safe_value)) return null;
    if (!$this->isValidDateTimeString($safe_value, 'Y-m-d')) return null;

   return $safe_value;  
   }
 
 
private function checkString($value){
  $safe_value = $this->test_input($value);
  if (!empty($safe_value))
	return $safe_value;
  else 
	return null;
}

private function checkInt($value){
  $safe_value = $this->test_input($value);
  if (empty($safe_value)) return null;
  if (!is_numeric($safe_value)) return null;
  
  return $safe_value;
}

private function checkDecimal($value){
  $safe_value = $this->test_input($value);
  if (empty($safe_value)) return null;
  if (!is_float($safe_value)) return null;
  
  return $safe_value;
}

private function checkBool($value){
  $safe_value = $this->test_input($value);
  if (empty($safe_value)) return null;
  if ($value!='Y' && $value!='N') return null;
  
  return $safe_value;
}



// questa funzione prende in input un array e prepara il valore di tipo set
private function checkSet($value){
  $safe_value = $this->test_input($value);
  if (empty($safe_value)) return null;
  return $safe_value;
}


private function checkTime($value){
$safe_value = $this->test_input($value);
    if (empty($safe_value)) return null;
    if (!$this->isValidDateTimeString($safe_value, 'H:i')) return null;

   return $safe_value;
}

// questa funzione prende in input una stringa (eventualmente vuota), la scompone in termini e poi verifica
// che ogni termine sia contenuto in un array. Questa funzione serve a verificare se i valori specificati per un tipo
// set sono corretti

public function isInSet($v,array $vset)
{
	if ($v == null) return 1;
	$values = explode(",",$v);
	
	//echo 'prima <br/>';
	//print_r($values);
	//print_r($vset);
	//echo 'dopo <br/>';
	
	foreach($values as $v1)
	{
		$v1= trim($v1);
		if (!in_array($v1,$vset)) return 0;
	}
	return 1;
}


public function check($type,$value)
{
  switch ($type) { 
	case 'int': 
		return $this->checkInt($value);
		break; 
	case 'string': 
		return $this->checkString($value);
		break; 
	case 'date': 
		return $this->checkDate($value);
		break; 
	case 'time': 
		return $this->checkTime($value);
		break;
	case 'decimal': 
		return $this->checkDecimal($value);
		break;		
	case 'bool': 
		return $this->checkBool($value);
		break;
	case 'set': 
		return $this->checkSet($value);
		break; 
		
	default: 
		echo 'funzione non presente' . "<br/>";	
}
return null;
}

}//End of class Database

?>
