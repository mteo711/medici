<?php

/*CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`allattamento` (
  `scheda_sids_schede_id` INT UNSIGNED NOT NULL ,
  `id` INT UNSIGNED NOT NULL ,
  `tipo_allattamento` ENUM('materno', 'formula', 'misto', 'svezzato') NULL DEFAULT NULL ,
  `allattamento_da` INT UNSIGNED NULL DEFAULT NULL ,
  `allattamento_a` INT UNSIGNED NULL DEFAULT NULL ,
  PRIMARY KEY (`scheda_sids_schede_id`, `id`) ,
  INDEX `fk_allattamento_scheda_sids` (`scheda_sids_schede_id` ASC) ,
  CONSTRAINT `fk_allattamento_scheda_sids`
    FOREIGN KEY (`scheda_sids_schede_id` )
    REFERENCES `sids_mf_db`.`scheda_sids` (`dati_sids_schede_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
	
	*/
	
class allattamento extends Database
{  
 private  $columns = array('scheda_sids_schede_id' => 'int',
				 'allattamento_materno' => 'string',
				 'allattamento_materno_nascita' => 'bool',
                 'allattamento_materno_settD' => 'int',
				 'allattamento_materno_settA' => 'int',
				 'allattamento_artificiale' => 'string',
				 'allattamento_artificiale_nascita' => 'bool',
                 'allattamento_artificiale_settD' => 'int',
				 'allattamento_artificiale_settA' => 'int',
                 'allattamento_misto' => 'string',
				 'allattamento_misto_nascita' => 'bool',
                 'allattamento_misto_settD' => 'int',
				 'allattamento_misto_settA' => 'int',
                 'allattamento_svezzato' => 'string',
				 'allattamento_svezzato_nascita' => 'bool',
                 'allattamento_svezzato_settD' => 'int',
				 'allattamento_svezzato_settA' => 'int',
                 'conclusa' => 'bool'
				 );

private function checkInput(array $val_cols)
{	
  $checked_val_cols=array();
  $error=0;
  
  foreach ($val_cols as $col => $value)
  {
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
	   

	     
		if ($col=='allattamento_materno')
		{ if (!in_array($checked_val_cols[$col],$this->bool_mancante)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='allattamento_artificiale')
		{ if (!in_array($checked_val_cols[$col],$this->bool_mancante)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='allattamento_misto')
		{ if (!in_array($checked_val_cols[$col],$this->bool_mancante)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='allattamento_svezzato')
		{ if (!in_array($checked_val_cols[$col],$this->bool_mancante)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
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
  $checked_val_cols=$this->checkInput($val_cols);
  // se non Ë un array si Ë verificato un errore e restituisco il numero di errore
  if ($checked_val_cols==0) return $checked_val_cols;
  // atrimenti proseguo per l'inserimento
  return parent::insert($checked_val_cols); 
}


public function update(array $set_val_cols, array $cod_val_cols)
{
  $checked_set_val_cols=$this->checkInput($set_val_cols);
  // se non Ë un array si Ë verificato un errore e restituisco il numero di errore
  //echo 'aa<br>';
  //print_r($checked_set_val_cols);
  //echo 'bb<br>';
  if (!is_array($checked_set_val_cols)) return $checked_set_val_cols;
  // atrimenti proseguo con la modifica
  return parent::update($checked_set_val_cols, $cod_val_cols);
}
	 
}



?>