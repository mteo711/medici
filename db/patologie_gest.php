<?php

/*
CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`patologie_gest` (
  `madre_schede_id` INT UNSIGNED NOT NULL ,
  `presenza_ipertensione` ENUM('Y','N') NULL DEFAULT NULL COMMENT 'sÏ, no -> 1, 0\ndato mancante -> valore null' ,
  `periodo_ipertensione` SET('gestazionale','pregestazionale') NULL DEFAULT NULL ,
  `presenza_diabete` ENUM('Y','N') NULL DEFAULT NULL ,
  `periodo_diabete` SET('gestazionale','pregestazionale') NULL DEFAULT NULL ,
  `presenza_alterazione_emoglobina` ENUM('Y','N') NULL DEFAULT NULL ,
  `tipologie_alterazione_emoglobina` ENUM('talassemia','metemoglobinemia','altro') NULL DEFAULT NULL ,
  `specifica_tipologie_alterazione_emoglobina` TINYTEXT NULL DEFAULT NULL ,
  `presenza_alterazione_coagulazione` ENUM('Y','N') NULL DEFAULT NULL ,
  `presenza_malattie_autoimmuni` ENUM('Y','N') NULL DEFAULT NULL ,
  `tipologie_infezioni_materne_preconcezionale` SET('talassemia','metemoglobinemia','altro') NULL DEFAULT NULL ,
  `specifica_tipologie_infezioni_materne_preconcezionale` TINYTEXT NULL DEFAULT NULL ,
  `tipologie_infezioni_materne_peri_postconcezionale` SET('talassemia','metemoglobinemia','altro') NULL DEFAULT NULL ,
  `specifica_tipologie_infezioni_materne_peri_postconcezionale` TINYTEXT NULL DEFAULT NULL ,
  `altre_patologie` SET('disturbi tiroide','cardiopatia','patologie renali','colestasi gravidica','parodontopatie','altro') NULL DEFAULT NULL ,
  `specifica_altre_patologie` TINYTEXT NULL DEFAULT NULL ,
  `fratelli` ENUM('Y','N') NULL DEFAULT 'N' COMMENT 'potrebbe non esserci - verificando il valore si evitano join inutili' ,
  PRIMARY KEY (`madre_schede_id`) ,
  INDEX `fk_patologie_gest_madre` (`madre_schede_id` ASC) ,
  CONSTRAINT `fk_patologie_gest_madre`
    FOREIGN KEY (`madre_schede_id` )
    REFERENCES `sids_mf_db`.`madre` (`schede_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

INSERT INTO `sids_mf_db`.`patologie_gest` (`madre_schede_id`, `presenza_ipertensione`, `periodo_ipertensione`, 
`presenza_diabete`, `periodo_diabete`, `presenza_alterazione_emoglobina`, `tipologie_alterazione_emoglobina`, 
`specifica_tipologie_alterazione_emoglobina`, `presenza_alterazione_coagulazione`, `presenza_malattie_autoimmuni`, 
`tipologie_infezioni_materne_preconcezionale`, `specifica_tipologie_infezioni_materne_preconcezionale`, 
`tipologie_infezioni_materne_peri_postconcezionale`, `specifica_tipologie_infezioni_materne_peri_postconcezionale`, 
`altre_patologie`, `specifica_altre_patologie`, `fratelli`) 
VALUES ('1', 'Y', 'gestazionale,pregestazionale', 'N', 'gestazionale', 'N', 'metemoglobinemia', 'non so', 'N', 'N', 
'talassemia,metemoglobinemia,altro', 'vedrÚ', NULL, 'no', 'cardiopatia,patologie renali,colestasi gravidica', 
'chichi', 'N');	
*/


class patologie_gest extends Database
{
				
 private  $columns = array('madre_schede_id' => 'int',
				'presenza_ipertensione'  => 'string',
				 'periodo_ipertensione' => 'set',
				 'presenza_diabete' => 'string',
				 'periodo_diabete' => 'set',
				 'presenza_alterazione_emoglobina' => 'string',
				 'tipologie_alterazione_emoglobina' => 'set',
				 'specifica_tipologie_alterazione_emoglobina' => 'string',
				 'presenza_alterazione_coagulazione' => 'string',
				 'presenza_malattie_autoimmuni' => 'string',
				 'presenza_infezioni_materne' => 'string',
				 'tipologie_infezioni_materne_preconcezionale' => 'set',
				 'specifica_tipologie_infezioni_materne_preconcezionale' => 'string',
				 'tipologie_infezioni_materne_peri_postconcezionale' => 'set',
				 'specifica_tipologie_infezioni_materne_peri_postconcezionale' => 'string',
				 'altre_patologie' => 'string',
				 'tipo_altre_patologie' => 'set',
				 'specifica_altre_patologie' => 'string',
                 'conclusa' => 'bool'
				 );

private function checkInput(array $val_cols)
{	
  $checked_val_cols=array();
  $error=0;
  
  foreach ($val_cols as $col => $value)
  {
    
	 //echo "col " . $col . "<br/>"; 
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
        // verifico che il  valore dell'attributo Ë contenuto nell'ENUM
        if ($col=='presenza_ipertensione')
        { if (!in_array($checked_val_cols[$col],$this->bool_mancante)) 
        	{ $this->error_status=7;
        	  $error=1;
        	  break;
        	}
        }
        if ($col=='presenza_diabete')
        { if (!in_array($checked_val_cols[$col],$this->bool_mancante)) 
        	{ $this->error_status=7;
        	  $error=1;
        	  break;
        	}
        }
        if ($col=='presenza_alterazione_emoglobina')
        { if (!in_array($checked_val_cols[$col],$this->bool_mancante)) 
        	{ $this->error_status=7;
        	  $error=1;
        	  break;
        	}
        }
        if ($col=='presenza_alterazione_coagulazione')
        { if (!in_array($checked_val_cols[$col],$this->bool_mancante)) 
        	{ $this->error_status=7;
        	  $error=1;
        	  break;
        	}
        }
        if ($col=='presenza_malattie_autoimmuni')
        { if (!in_array($checked_val_cols[$col],$this->bool_mancante)) 
        	{ $this->error_status=7;
        	  $error=1;
        	  break;
        	}
        } 
        if ($col=='presenza_infezioni_materne')
               { if (!in_array($checked_val_cols[$col],$this->bool_mancante)) 
               	{ $this->error_status=7;
               	  $error=1;
               	  break;
               	}
        }   
        if ($col=='altre_patologie')
             { if (!in_array($checked_val_cols[$col],$this->bool_mancante)) 
             	{ $this->error_status=7;
             	  $error=1;
             	  break;
             	}
             }      
		
		if ($col=='tipologie_alterazione_emoglobina' )
		{ if (!in_array($checked_val_cols[$col],$this->tipoAlterazione_emoglobina)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		} 
        // verifico i valori di tipo set
		if ($col=='periodo_ipertensione' || $col=='periodo_diabete')
		{ if (!$this->isInSet($value, $this->tipoPeriodo)) 
			{ $this->error_status=8;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='tipologie_infezioni_materne_preconcezionale' || $col=='tipologie_infezioni_materne_peri_postconcezionale')
		{ if (!$this->isInSet($value, $this->tipoInfezione)) 
			{ $this->error_status=8;
			  $error=1;
			  break;
			}
		}
	
		if ($col=='tipo_altre_patologie')
		{ if (!$this->isInSet($value, $this->tipoPatologie)) 
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
  // print_r($checked_val_cols);
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