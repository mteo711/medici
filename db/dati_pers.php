<?php

/*
CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`dati_pers` (
  `schede_id` INT UNSIGNED NOT NULL ,
  `tipo` ENUM('MADRE','PADRE') NOT NULL COMMENT 'data una scheda abbiamo due dati pers: uno per il padre e uno per la madre' ,
  `cognome` VARCHAR(45) NOT NULL ,
  `nome` VARCHAR(45) NOT NULL ,
  `data_nascita` DATE NOT NULL ,
  `luogo_nascita` VARCHAR(45) NOT NULL ,
  `eta` INT NOT NULL COMMENT 'calcolato automaticamente' ,
  `via` VARCHAR(45) NOT NULL ,
  `numero` INT NOT NULL ,
  `cap` VARCHAR(5) NOT NULL ,
  `comune` VARCHAR(45) NOT NULL ,
  `provincia` VARCHAR(45) NOT NULL ,
  `etnia` ENUM('caucasica', 'ispanica','medio orientale','indiana','asiatica','nera','meticcia','magrebina','altra') NULL DEFAULT NULL ,
  `professione` VARCHAR(45) NULL DEFAULT NULL ,
  `HIV_positivo` ENUM('Y','N') NULL DEFAULT 'N' ,
  PRIMARY KEY (`schede_id`, `tipo`) ,
  INDEX `fk_dati_pers_schede` (`schede_id` ASC) ,
  CONSTRAINT `fk_dati_pers_schede`
    FOREIGN KEY (`schede_id` )
    REFERENCES `sids_mf_db`.`schede` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

*/

class dati_pers extends Database
{
 private  $columns = array('schede_id' => 'int',
 				'tipo'  => 'string',
				'cognome'  => 'string',
				'nome'  => 'string',
				'data_nascita' => 'date',
				'luogo_nascita'  => 'string',
				'eta' => 'int',			
				'via'  => 'string',
				'cap'  => 'string',
				'comune'  => 'string',
				'provincia'  => 'string',
				'etnia'  => 'string',
				'specifica_etnia'  => 'string',
				'professione'  => 'string',
				'cell' => 'string',
				'codice_fiscale' => 'string',
				'rischi' => 'string',
				'titolo_studio' => 'string',
				'stato_civile' => 'string',
				'specifica_matrimonio' => 'date',
				'altezza' => 'string',
				'peso' => 'string',
				'num_visite' => 'int',
				'morte_feto' => 'string',
				'ultimo_avvistamento' => 'string',
				

				'fecondazione' => 'string',
				'dataF' => 'date',
				'struttura' => 'string',
				'inseminazione_endouterina' => 'bool',
				'fecondazione_in_vitro' => 'bool',
				'intracitoplasmatica' => 'bool',
				'gameti' => 'bool',
				'specifica_altre' => 'string',
				'ovulazione_indotta' => 'bool',
				'omologa' => 'bool',
				'eterologa' => 'string',
				'embriodonazione' => 'bool',
				'a_fresco' => 'bool',
				'crioconservazione' => 'bool',
				'test_preimpianto' => 'bool',

				  'anni_nonnamaterna' => 'int',
    'anni_nonnomaterno' => 'int',
    'patologie_nonnamaterna' => 'string',
    'patologie_nonnomaterno' => 'string',
    'fratelli_sorelle' => 'string',
    'patologie_famiglia' => 'string',
    'altricasi' => 'string',
    'altri_casi' => 'string',
    'nonnaviva' => 'string',
    'nonnovivo' => 'string',
    'morte_nonnamaterna' => 'string',
    'morte_nonnomaterno' => 'string',

				

'conclusa' => 'bool',

				);
				

private function checkInput(array $val_cols){	
	
  $checked_val_cols=array();
  $error=0;
  
  foreach ($val_cols as $col => $value)
  {
     // echo "col " . $col . "<br/>";
     if (array_key_exists($col,  $this->columns))
	 { // il nome di campo Ë previsto nella tabella
	   
	    $checked_val_cols[$col]=$this->check($this->columns[$col], $value);
	    if ($checked_val_cols[$col]==null) 
			{// il controllo di tipo del valore ha restituito un errore
			 $this->error_status=6;
			 $error=1;
			 break;
			}
		// seguono altri controlli specifici per le colonne di queta tabella
		
		if ($col=='etnia')
		{ if (!in_array($checked_val_cols[$col],$this->tipoEtnia)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}

		
		if ($col=='tipo')
		{ if (!in_array($checked_val_cols[$col],$this->tipoGenitore)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}

		//inserire controllo per tipoStatocivile
		
	
		
		
	 }
	 else
	 {
	   $error=1; 
	   $this->error_status=5;
	   break;
	 }
  
  }
  if ($error) return 0;
  else return $checked_val_cols;
  
}

  
// $val_cols si aspetta un array indicizzato sui nome delle colonne della tabella che non abbia valore nullo
public function insert(array $val_cols){
	var_dump($val_cols);  
  $checked_val_cols=$this->checkInput($val_cols);
  // se non Ë un array si Ë verificato un errore e restituisco il numero di errore
  
  echo 'nome classe  ' . get_class($this);
  if ($checked_val_cols==0) return $checked_val_cols;
  // atrimenti proseguo per l'inserimento
  return parent::insert($checked_val_cols); 
}


public function update(array $set_val_cols, array $cod_val_cols)
{
  $checked_set_val_cols=$this->checkInput($set_val_cols);
  // se non Ë un array si Ë verificato un errore e restituisco il numero di errore
//  echo 'aa<br>';
//  print_r($checked_set_val_cols);
//  echo 'bb<br>';
  if (!is_array($checked_set_val_cols)) return $checked_set_val_cols;
  // atrimenti proseguo con la modifica
  return parent::update($checked_set_val_cols, $cod_val_cols);
}
	 
}


?>