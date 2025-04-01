<?php

/*
CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`scheda_sids` (
  `dati_sids_schede_id` INT UNSIGNED NOT NULL ,
  `posizione_sonno` ENUM('supino', 'prono', 'fianco') NULL DEFAULT NULL ,
  `succhiotto_sonno` ENUM('Y','N') NULL DEFAULT NULL ,
  `data_ultimo_controllo_pediatrico` DATE NULL DEFAULT NULL ,
  `patologie_in_atto` ENUM('Y','N') NULL DEFAULT NULL ,
  `tipologie_patologie_in_atto` SET('raffreddore', 'tosse', 'febbre', 'diarrea', 'vomito/rigurgito', 'esantema/eczema', 'altro') NULL DEFAULT NULL ,
  `specifica_tipologie_patologie_in_atto` TINYTEXT NULL DEFAULT NULL ,
  `disturbi_respiratori` ENUM('Y','N') NULL DEFAULT NULL ,
  `tipologie_disturbi_respiratori` SET('apnee notturne', 'altro') NULL DEFAULT NULL ,
  `specifica_tipologie_disturbi_respiratori` TINYTEXT NULL DEFAULT NULL ,
  `vaccinazioni_ultimo_mese` ENUM('Y','N') NULL DEFAULT NULL ,
  `tipologie_vaccinazioni_ultimo_mese` TINYTEXT NULL DEFAULT NULL ,
  `effettuato_riscontro_diagnostico` ENUM('Y','N') NULL DEFAULT NULL ,
  `riscontro_diagnostico_dove` VARCHAR(45) NULL DEFAULT NULL ,
  `prelievi_secondo_prot_naz` ENUM('Y','N') NULL DEFAULT NULL ,
  `data_riscontro_diagnostico` DATE NULL DEFAULT NULL ,
  `medico_effettuato_riscontro` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`dati_sids_schede_id`) ,
  INDEX `fk_scheda_sids_schede_idx` (`dati_sids_schede_id` ASC) ,
  CONSTRAINT `fk_scheda_sids_schede`
    FOREIGN KEY (`dati_sids_schede_id` )
    REFERENCES `sids_mf_db`.`dati_sids` (`schede_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
*/


class scheda_sids extends Database
{

		
 private  $columns = array('dati_sids_schede_id' => 'int',
				'posizione_sonno'  => 'string',
				'succhiotto_sonno'  => 'string',
                'conclusa1' => 'bool',
				'idmedici' => 'int',			
                'data_ultimo_controllo_pediatrico'  => 'date',
				'patologie_in_atto'  => 'bool',
				'tipologie_patologie_in_atto'  => 'set',
				'specifica_tipologie_patologie_in_atto' => 'string',
				'disturbi_respiratori'  => 'bool',				
				'tipologie_disturbi_respiratori'  => 'set',
				'specifica_tipologie_disturbi_respiratori'  => 'string',
				'vaccinazioni_ultimo_mese'  => 'string',
				'tipologie_vaccinazioni_ultimo_mese'  => 'string',
				'effettuato_riscontro_diagnostico'  => 'string',				
				'riscontro_diagnostico_dove'  => 'string',				
				'prelievi_secondo_prot_naz'  => 'string',				
				'data_riscontro_diagnostico'  => 'date',				
				'medico_effettuato_riscontro'  => 'string',
                'conclusa2' => 'bool',
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
  
		
		if ($col=='posizione_sonno')
		{ if (!in_array($checked_val_cols[$col],$this->tipoSonno)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='succhiotto_sonno')
		{ if (!in_array($checked_val_cols[$col],$this->bool_mancante)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='vaccinazioni_ultimo_mese')
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
		
		 // verifico i valori di tipo set
		if ($col=='tipologie_patologie_in_atto')
		{ if (!$this->isInSet($value, $this->tipoTipologiePatologie)) 
			{ $this->error_status=8;
			  $error=1;
			  break;
			}
		}
		
		// verifico i valori di tipo set
		if ($col=='tipologie_disturbi_respiratori')
		{ if (!$this->isInSet($value, $this->tipoTipologieDisturbi)) 
			{ $this->error_status=8;
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