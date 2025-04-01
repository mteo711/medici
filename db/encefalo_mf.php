<?php

/*

CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`encefalo_mf` (
  `dati_protocollo_mf_schede_id` INT UNSIGNED NOT NULL ,
  `peso_gr` DECIMAL(6,2) NULL ,
  `fontanella_anteriore` ENUM('normotesa','estroflessa','introflessa') NULL ,
  `fontanella_posteriore` ENUM('normotesa','estroflessa','introflessa') NULL ,
  `dura_madre` ENUM('integra','liscia','madreperlacea') NULL ,
  `seno_venoso` ENUM('pervio','congesto','trombizzato') NULL ,
  `emorragie` ENUM('intradurale','sub aracnoidee','iperemia dei vasi meningei') NULL ,
  `leptomeningi` ENUM('ben svolgibili','opache','congeste','verde-grigiastre') NULL ,
  `poligono_Willis` TINYTEXT NULl ,
  `solchi` ENUM('normali','allargati','ridotti con circonvoluzioni appiattite') NULL ,
  `taglio_emisferi_emorragie` ENUM('Y','N') NULL ,
  `taglio_emisferi_rammollimenti` ENUM('Y','N') NULL ,
  `tronco_cerebrale_emorragie` ENUM('Y','N') NULL DEFAULT 'N' ,
  `tronco_cerebrale_rammollimenti` ENUM('Y','N') NULL DEFAULT 'N' ,
  `plessi_corioidei_normali` ENUM('Y','N') NULL ,
  `plessi_corioidei_edematosi` ENUM('Y','N') NULL ,
  `setto_pellucido` ENUM('normale','assente','assottigliato') NULL ,
  `corpo_calloso` ENUM('normale','assente','assottigliato') NULL ,
  `ventricoli` ENUM('normali','dilatati','stenotici') NULL ,
  PRIMARY KEY (`dati_protocollo_mf_schede_id`) ,
  CONSTRAINT `fk_encefalo_mf_dati_protocollo_mf`
    FOREIGN KEY (`dati_protocollo_mf_schede_id` )
    REFERENCES `sids_mf_db`.`dati_protocollo_mf` (`schede_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

	
	*/
	
class encefalo_mf extends Database
{   
   
 private  $columns = array('dati_protocollo_mf_schede_id' => 'int',
				'peso_gr'  => 'int',
				'fontanella_anteriore'  => 'string',
				'fontanella_posteriore'  => 'string',
				'dura_madre'  => 'string',
				'seno_venoso'  => 'string',
				'emorragie'  => 'string',
				'leptomeningi'  => 'string',
				'poligono_Willis'  => 'string',
				'solchi'  => 'string',
				'taglio_emisferi'  => 'string',
				'tronco_cerebrale'  => 'string',
				'plessi_corioidei'  => 'string',
				'setto_pellucido'  => 'string',
				'corpo_calloso'  => 'string',
				'ventricoli'  => 'string',
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

		if ($col=='fontanella_anteriore'  || $col == 'fontanella_posteriore')
		{ if (!in_array($checked_val_cols[$col],$this->tipoFontanella)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		} 	
		
		if ($col=='dura_madre')
		{ if (!in_array($checked_val_cols[$col],$this->tipoDuramadre)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		} 	
		
		if ($col=='seno_venoso')
		{ if (!in_array($checked_val_cols[$col],$this->tipoSenovenoso)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='emorragie')
		{ if (!in_array($checked_val_cols[$col],$this->tipoEmorragie)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='leptomeningi')
		{ if (!in_array($checked_val_cols[$col],$this->tipoLeptomeningi)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='solchi')
		{ if (!in_array($checked_val_cols[$col],$this->tipoSolchi)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='setto_pellucido' || $col == 'corpo_calloso')
		{ if (!in_array($checked_val_cols[$col],$this->tipoSetto)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		if ($col=='ventricoli')
		{ if (!in_array($checked_val_cols[$col],$this->tipoVentricoli)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
        
        if ($col=='taglio_emisferi' || $col=='tronco_cerebrale')
		{ if (!in_array($checked_val_cols[$col],$this->tipoTaglio)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
         
		if ($col=='plessi_corioidei')
		{ if (!in_array($checked_val_cols[$col],$this->tipoPlessi)) 
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
				
				
