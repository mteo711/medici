<?php

/*
CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`dati_feto` (
  `schede_id` INT UNSIGNED NOT NULL COMMENT 'solo se tipologia schede = morte fetale' ,
  `cognome` VARCHAR(45) NOT NULL ,
  `nome` VARCHAR(45) NOT NULL ,
  `via` VARCHAR(45) NOT NULL ,
  `numero` INT NOT NULL ,
  `cap` VARCHAR(5) NOT NULL ,
  `comune` VARCHAR(45) NOT NULL ,
  `provincia` VARCHAR(45) NOT NULL ,
  `sesso` ENUM('maschio','femmina') NOT NULL ,
  `data_morte` DATE NOT NULL ,
  `eta_settimana_gestazione` INT UNSIGNED NULL DEFAULT NULL COMMENT 'compresa tra 24 e 42' ,
  `data_ultimo_controllo` DATE NULL DEFAULT NULL ,
  PRIMARY KEY (`schede_id`) ,
  INDEX `fk_dati_feto_schede` (`schede_id` ASC) ,
  CONSTRAINT `fk_dati_feto_schede`
    FOREIGN KEY (`schede_id` )
    REFERENCES `sids_mf_db`.`schede` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
*/

class dati_feto extends Database
{
 private  $columns = array('schede_id' => 'int',
				'cognome'  => 'string',
				'nome'  => 'string',
				'via'  => 'string',
				'cap'  => 'string',
				'comune'  => 'string',
				'provincia'  => 'string',
				'sesso'   => 'string',
				'data_morte' => 'date',
                'data_ultimo_controllo' => 'date',
				'eta_settimana_gestazione'  => 'int',
        'morte_quando' => 'date',
        'morte_dove' => 'string',
        'morte_come' => 'string',
      
        

                'conclusa' => 'bool', 
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
		
		// verifico nel caso che l'attributo sia 'sesso' che il suo valore Ë contenuto nell'ENUM
		if ($col=='sesso')
		{ if (!in_array($checked_val_cols[$col],$this->sex)) 
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