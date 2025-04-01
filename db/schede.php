<?php

/*
CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`schede` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `idcaso` VARCHAR(45) NULL DEFAULT NULL ,
  `idcaso_provv` VARCHAR(45) NULL DEFAULT NULL ,
  `utenti_centri_id` INT UNSIGNED NOT NULL ,
  `tipologia` ENUM('sids','morte fetale') NOT NULL COMMENT 'usato per discriminare la tipologia di schede' ,
  `info` TINYTEXT NULL DEFAULT NULL ,
  `data_creazione` DATE NOT NULL ,
  `data_invio` DATE NULL DEFAULT NULL ,
  `data_ultima_modifica` DATE NULL DEFAULT NULL ,
  `bloccata` ENUM('Y','N') NOT NULL DEFAULT 'N' ,
  `completa` ENUM('Y','N') NOT NULL DEFAULT 'N' ,
  `consenso_diag` ENUM('Y','N') NOT NULL DEFAULT 'N' ,
  `consenso_analisi_gen` ENUM('Y','N') NOT NULL DEFAULT 'N' ,
  `consenso_analisi_toss` ENUM('Y','N') NOT NULL DEFAULT 'N' ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_schede_utenti` (`utenti_centri_id` ASC) ,
  CONSTRAINT `fk_schede_utenti`
    FOREIGN KEY (`utenti_centri_id` )
    REFERENCES `sids_mf_db`.`utenti` (`centri_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
	
*/


class schede extends Database
{
		
 private  $columns = array(
 				'id' => 'int',
				'idcaso'  => 'string',
				'idcaso_provv'  => 'string',
				'utenti_centri_id' => 'int',
				'tipologia'  => 'string',
				'info'  => 'string',
				'data_creazione' => 'date',
				'data_invio' => 'date',
				'data_ultima_modifica' => 'date',	
				'bloccata'  => 'bool',
				'completa'  => 'bool',
				'consenso_diag'  => 'bool',
				'consenso_analisi_gen'  => 'bool',
				'consenso_analisi_toss'  => 'bool',
                'nazionale' => 'bool',
                'cancellata' => 'bool'
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
       
		
		
		// verifico che il  valore dell'attributo 'tipologia' Ë contenuto nell'ENUM
		if ($col=='tipologia')
		{ if (!in_array($checked_val_cols[$col],$this->tipoScheda)) 
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