<?php

/*

CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`scheda_feto` (
  `dati_feto_schede_id` INT UNSIGNED NOT NULL ,
  `liquido_amniotico` ENUM('normale','patologico') NULL DEFAULT NULL ,
  `specifica_patologico_liquido_amniotico` TINYTEXT NULL DEFAULT NULL ,
  `RX_scheletro` ENUM('Y','N') NULL DEFAULT NULL COMMENT 'dato mancante se null' ,
  `specifica_RX_scheletro` TINYTEXT NULL DEFAULT NULL ,
  `effettuato_riscontro_diagnostico` ENUM('Y','N') NULL DEFAULT NULL ,
  `riscontro_diagnostico_dove` VARCHAR(45) NULL DEFAULT NULL ,
  `prelievi_secondo_prot_naz` ENUM('Y','N') NULL DEFAULT NULL ,
  `data_riscontro_diagnostico` DATE NULL DEFAULT NULL ,
  `medico_effettuato_riscontro` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`dati_feto_schede_id`) ,
  CONSTRAINT `fk_scheda_feto_dati_feto`
    FOREIGN KEY (`dati_feto_schede_id` )
    REFERENCES `sids_mf_db`.`dati_feto` (`schede_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
	
	*/
	
class scheda_feto extends Database
{  

    
 private  $columns = array('dati_feto_schede_id' => 'int',
				 'liquido_amniotico'  => 'string',
				 'specifica_patologico_liquido_amniotico' => 'string',
				 'RX_scheletro' => 'string',
				 'specifica_RX_scheletro' => 'string',	
				 'prelievi_secondo_prot_naz' => 'string',		 
				 'effettuato_riscontro_diagnostico' => 'string',
				 'riscontro_diagnostico_dove' => 'string',
				 'data_riscontro_diagnostico' => 'date',
				 'medico_effettuato_riscontro' => 'string',
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
	   
	     
		if ($col=='liquido_amniotico' )
		{ if (!in_array($checked_val_cols[$col],$this->tipoRisultatoB)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		} 
        if ($col=='RX_scheletro')
		{ if (!in_array($checked_val_cols[$col],$this->bool_mancante)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
         if ($col=='effettuato_riscontro_diagnostico')
		{ if (!in_array($checked_val_cols[$col],$this->bool_mancante)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
         if ($col=='prelievi_secondo_prot_naz')
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