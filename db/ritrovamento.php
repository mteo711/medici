<?php

/*
CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`ritrovamento` (
  `schede_id` INT UNSIGNED NOT NULL ,
  `nome_bambino` VARCHAR(45) NULL DEFAULT NULL ,
  `data_morte` DATE NULL DEFAULT NULL ,
  `ora_morte` TIME NULL DEFAULT NULL ,
  `luogo_morte` ENUM('ospedale', 'casa', 'fuori casa') NULL DEFAULT NULL ,
  `posizione_se_sdraiato` ENUM('supina', 'prona', 'sul fianco', 'altra') NULL DEFAULT NULL ,
  `specifica_posizione_se_sdraiato` TINYTEXT NULL DEFAULT NULL ,
  `abbigliamento_indossato` TINYTEXT NULL DEFAULT NULL ,
  `cuscino` ENUM('Y','N') NULL DEFAULT NULL ,
  `succhiotto` ENUM('Y','N') NULL DEFAULT NULL ,
  `catenine_al_collo` ENUM('Y','N') NULL DEFAULT NULL ,
  `oggetti_nel_lettino` ENUM('Y','N') NULL DEFAULT NULL ,
  `consistenza_materasso` TINYTEXT NULL DEFAULT NULL ,
  `mat_organico_bocca` ENUM('Y','N') NULL DEFAULT NULL ,
  `specifica_mat_organico_bocca` TINYTEXT NULL DEFAULT NULL ,
  `mat_organico_naso` ENUM('Y','N') NULL DEFAULT NULL ,
  `specifica_mat_organico_naso` TINYTEXT NULL DEFAULT NULL ,
  `mat_organico_pannolino` ENUM('Y','N') NULL DEFAULT NULL ,
  `specifica_mat_organico_pannolino` TINYTEXT NULL DEFAULT NULL ,
  `aspetto_bambino` SET('decolorazione attorno al volto o bocca', 'sudato', 'secrezioni', 'flaccido', 'decolorazione cutanea', 'caldo', 'freddo', 'segni da pressione', 'rash o petecchie', 'rigido', 'impronte sul corpo', 'non valutato', 'altro') NULL DEFAULT NULL ,
  `specifica_aspetto_bambino` TINYTEXT NULL DEFAULT NULL ,
  `data_ultimo_pasto` DATE NULL DEFAULT NULL ,
  `ora_ultimo_pasto` TIME NULL DEFAULT NULL ,
  `ultimo_pasto_somministrato_da` VARCHAR(45) NULL DEFAULT NULL ,
  `nuovi_alimenti_ultime_24_ore` ENUM('Y','N') NULL DEFAULT NULL ,
  `specifica_nuovi_alimenti_ultime_24_ore` TINYTEXT NULL DEFAULT NULL ,
  `morte_rilevata_da` ENUM('medico', 'padre', 'madre', 'altro') NULL DEFAULT NULL ,
  `specifica_morte_rilevata_da` TINYTEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`schede_id`) ,
  CONSTRAINT `fk_ritrovamento_schede`
    FOREIGN KEY (`schede_id` )
    REFERENCES `sids_mf_db`.`scheda_sids` (`dati_sids_schede_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

*/
			
class ritrovamento extends Database
{  
 private  $columns = array('schede_id' => 'int',
				'luogo_morte'  => 'string',
				'posizione_se_sdraiato'  => 'string',
				'specifica_posizione_se_sdraiato' => 'string',
				'abbigliamento_indossato'  => 'string',
				'cuscino'  => 'bool',
				'succhiotto'  => 'bool',
				'catenine_al_collo'  => 'bool',
				'oggetti_nel_lettino'  => 'bool',
				'consistenza_materasso'  => 'string',				
				'mat_organico_bocca'  => 'bool',
				'tentativo_di_rianimazione' => 'bool',	
                'specifica_tentativo_di_rianimazione' => 'string',
                'conclusa1' => 'bool',
				'idsituazione' => 'int',			
				'specifica_mat_organico_bocca'  => 'string',				
				'mat_organico_naso'  => 'bool',				
				'specifica_mat_organico_naso'  => 'string',
				'mat_organico_pannolino'  => 'bool',				
				'specifica_mat_organico_pannolino'  => 'string',
				'aspetto_bambino'  => 'set',
				'specifica_aspetto_bambino'  => 'string',
                'specifica_note_aspetto'  => 'string',
                'conclusa2' => 'bool',
				'idpasti' => 'int',
				'data_ultimo_pasto'  => 'date',
				'ora_ultimo_pasto'  => 'time',
				'ultimo_pasto_somministrato_da'  => 'string',
				'alimenti_24_ore'  => 'set',
				'specifica_altro_alimenti'  => 'string',
				'latte' => 'int',
				'polvere' => 'int',
				'mucca' => 'int',
				'acqua' => 'int',
				'liquidi' => 'string',
				'omogeneizzati' => 'int',
				'nuovi_alimenti_ultime_24_ore'  => 'bool',
				'specifica_nuovi_alimenti_ultime_24_ore'  => 'string',
				'morte_rilevata_da'  => 'string',
				'specifica_morte_rilevata_da'  => 'string',
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
 
		

		if ($col=='luogo_morte' )
		{ if (!in_array($checked_val_cols[$col],$this->tipoLuogo)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='posizione_se_sdraiato' )
		{ if (!in_array($checked_val_cols[$col],$this->tipoPosizione)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
	
		if ($col=='morte_rilevata_da' )
		{ if (!in_array($checked_val_cols[$col],$this->tipoRilevamento)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
         
        if ($col=='specifica_tentativo_di_rianimazione' )
		{ if (!in_array($checked_val_cols[$col],$this->tipoRianimazione)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		
		 // verifico i valori di tipo set
		if ($col=='aspetto_bambino')
		{ if (!$this->isInSet($value, $this->tipoAspetto)) 
			{ $this->error_status=8;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='alimenti_24_ore')
		{ if (!$this->isInSet($value, $this->tipoAlimenti)) 
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