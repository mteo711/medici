<?php

/*
CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`fumo_attivo` (
  `madre_schede_id` INT UNSIGNED NOT NULL ,
  `prima_del_concepimento` ENUM('Y','N') NULL DEFAULT NULL ,
  `da_anni` INT UNSIGNED NULL DEFAULT NULL ,
  `num_sigarette_per_giornoA` INT UNSIGNED NULL DEFAULT NULL ,
  `durante_gravidanza` ENUM('Y','N') NULL DEFAULT NULL ,
  `fino_a_settimana` INT UNSIGNED NULL DEFAULT NULL ,
  `num_sigarette_per_giornoB` INT UNSIGNED NULL DEFAULT NULL ,
  `post_parto` ENUM('Y','N') NULL DEFAULT NULL ,
  `fino_a_eta_bambini_in_giorni` INT UNSIGNED NULL DEFAULT NULL ,
  `num_sigarette_per_giornoC` INT UNSIGNED NULL DEFAULT NULL ,
  PRIMARY KEY (`madre_schede_id`) ,
  INDEX `fk_fumo_attivo_madre` (`madre_schede_id` ASC) ,
  CONSTRAINT `fk_fumo_attivo_madre`
    FOREIGN KEY (`madre_schede_id` )
    REFERENCES `sids_mf_db`.`madre` (`schede_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

*/

class fumo_attivo extends Database
{

  
 private  $columns = array('madre_schede_id' => 'int',
 				'prima_del_concepimento'  => 'bool',
				'da_anni'  => 'int',
				'num_sigarette_per_giornoA'  => 'int',
				'durante_gravidanza' => 'bool',
				'fino_a_settimana' => 'int',			
				'num_sigarette_per_giornoB'  => 'int',
				'post_parto'  => 'bool',
				'fino_a_eta_bambini_in_giorni'  => 'int',
				'num_sigarette_per_giornoC'  => 'int',
				'sigaretta_elettronica' => 'string',
				'spec_sigaretta_elettronica' => 'string',
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
		if ($col=='sigaretta_elettronica')
		{ if (!in_array($checked_val_cols[$col],$this->bool_mancante)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		// verifico  che il  valore Ë contenuto nell'ENUM
		
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