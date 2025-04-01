<?php

/*
CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`centri` (
  `id` INT UNSIGNED NOT NULL ,
  `nome` VARCHAR(45) NOT NULL ,
  `regione` VARCHAR(45) NOT NULL COMMENT 'nella regione del centro nazionale ci saranno due centri' ,
  `via` VARCHAR(45) NOT NULL ,
  `citta` VARCHAR(45) NOT NULL ,
  `cap` VARCHAR(5) NOT NULL ,
  `info` TINYTEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
  
*/

class consenso extends Database
{
 private  $columns = array('id_scheda' => 'int',
                'id' => 'int',
				'name'  => 'string',
				'tipo'  => 'string',
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
        // nessun controllo
        if ($col=='tipo' )
		{ if (!in_array($checked_val_cols[$col],$this->tipoConsenso)) 
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