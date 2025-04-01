<?php

/*
CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`fratelli` (
  `patologie_gest_madre_schede_id` INT UNSIGNED NOT NULL ,
  `id` INT UNSIGNED NOT NULL ,
  `data_nascita` DATE NULL DEFAULT NULL ,
  `deceduto` ENUM('Y','N') NULL DEFAULT 'N' ,
  `anni` INT UNSIGNED NULL DEFAULT NULL ,
  `mesi` INT UNSIGNED NULL DEFAULT NULL ,
  `morto_per_SIDS` ENUM('Y','N') NULL DEFAULT NULL ,
  `patologie_gest_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`patologie_gest_madre_schede_id`, `id`) ,
  INDEX `fk_fratelli_patologie_gest` (`patologie_gest_madre_schede_id` ASC) ,
  CONSTRAINT `fk_fratelli_patologie_gest`
    FOREIGN KEY (`patologie_gest_madre_schede_id` )
    REFERENCES `sids_mf_db`.`patologie_gest` (`madre_schede_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
	
*/


class fratelli extends Database
{
 		
 private  $columns = array('patologie_gest_madre_schede_id' => 'int',
				'num_figli_in_vita'  => 'string',
				'data_ultimo_parto_precedente'  => 'date',			
                'num_figli_morti'  => 'string',
                'dataN1' => 'date',
				'mesiM1'  => 'int',
				'anniM1'  => 'int',
				'causaM1' => 'string',
                'dataN2' => 'date',
				'mesiM2'  => 'int',
				'anniM2'  => 'int',
				'causaM2' => 'string',
                'dataN3' => 'date',
				'mesiM3'  => 'int',
				'anniM3'  => 'int',
				'causaM3' => 'string',
                'dataN4' => 'date',
				'mesiM4'  => 'int',
				'anniM4'  => 'int',
				'causaM4' => 'string',
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