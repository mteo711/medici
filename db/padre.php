<?php

/*
CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`padre` (
  `schede_id` INT UNSIGNED NOT NULL ,
  `fumo` ENUM('Y','N') NULL DEFAULT NULL ,
  `num_sigarette_per_giorno` INT UNSIGNED NULL DEFAULT NULL ,
  `alcool` ENUM('Y','N') NULL DEFAULT NULL ,
  `alcool_quali_quantita` TINYTEXT NULL DEFAULT NULL ,
  `stupefacenti` ENUM('Y','N') NULL DEFAULT NULL ,
  `stupefacenti_quali_quantita` TINYTEXT NULL DEFAULT NULL ,
  `farmaci` ENUM('Y','N') NULL DEFAULT NULL ,
  `farmaci_quali_quantita` TINYTEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`schede_id`) ,
  CONSTRAINT `fk_padre_schede`
    FOREIGN KEY (`schede_id` )
    REFERENCES `sids_mf_db`.`schede` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
	
*/


class padre extends Database
{
 		
 private  $columns = array('schede_id' => 'int',
                'noto'  => 'bool',           
 				'idfumo'  => 'int',
				'fumo'  => 'string',
				'num_sigarette_per_giorno' => 'string',
                'conclusa1' => 'bool',
				'idalcol'  => 'int',
				'alcool'  => 'string',
				'alcool_quali_quantita' => 'string',
				'stupefacenti' => 'string',
				'stupefacenti_quali_quantita' => 'string',
                'conclusa2' => 'bool',
				'idfarmaci'  => 'int',
				'farmaci'  => 'string',
				'farmaci_quali_quantita'  => 'string',
				'HIV_positivo'  => 'string',
                'conclusa3' => 'bool'
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
		if ($col=='HIV_positivo')
		{ if (!in_array($checked_val_cols[$col],$this->bool_mancante)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		if ($col=='alcool')
		{ if (!in_array($checked_val_cols[$col],$this->bool_mancante)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		if ($col=='stupefacenti')
		{ if (!in_array($checked_val_cols[$col],$this->bool_mancante)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		if ($col=='farmaci')
		{ if (!in_array($checked_val_cols[$col],$this->bool_mancante)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		if ($col=='fumo')
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
  
  if (!is_array($checked_set_val_cols)) return $checked_set_val_cols;
  // atrimenti proseguo con la modifica
  return parent::update($checked_set_val_cols, $cod_val_cols);
}
	 
}


?>