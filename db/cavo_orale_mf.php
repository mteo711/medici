<?php

/*

CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`cavo_orale_mf` (
  `dati_protocollo_mf_schede_id` INT UNSIGNED NOT NULL ,
  `tiroide_peso_gr` DECIMAL(6,2) NULL ,
  `tiroide_stato` ENUM('normale','malformata') NULL ,
  `specifica_tiroide_stato_malformata` TINYTEXT NULL ,
  `timo_peso_gr` DECIMAL(6,2) NULL ,
  `timo_stato` ENUM('presente','assente','petecchie emorragiche') NULL ,
  `laringe_stato` ENUM('normale','malformata') NULL ,
  `specifica_laringe_stato_malformata` TINYTEXT NULL ,
  PRIMARY KEY (`dati_protocollo_mf_schede_id`) ,
  CONSTRAINT `fk_cavo_orale_mf_dati_protocollo_mf`
    FOREIGN KEY (`dati_protocollo_mf_schede_id` )
    REFERENCES `sids_mf_db`.`dati_protocollo_mf` (`schede_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

	*/
	
class cavo_orale_mf extends Database
{   
  
 private  $columns = array(
			  'dati_protocollo_mf_schede_id' => 'int',
			  'tiroide_peso_gr' => 'int',
			  'tiroide_stato' => 'string',
			  'specifica_tiroide_stato_malformata' => 'string',
			  'timo_peso_gr' => 'int',
			  'timo_stato' => 'string',
              'linfonodi' => 'string',
			  'laringe_stato' => 'string',
			  'specifica_laringe_stato_malformata' => 'string',
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

		if ($col=='tiroide_stato' || $col == 'laringe_stato' )
		{ if (!in_array($checked_val_cols[$col],$this->tipoTiroideLaringe)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='timo_stato' )
		{ if (!in_array($checked_val_cols[$col],$this->tipoTimo)) 
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
