<?php

/*

CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`encefalo_sids` (
  `dati_protocollo_sids_schede_id` INT UNSIGNED NOT NULL ,
  `peso_gr` DECIMAL(6,2) NULL ,
  `aspetto_est_emorragie_subaracnoidee` ENUM('Y','N') NULL DEFAULT 'N' ,
  `aspetto_est_iperemia_vasi_meningei` ENUM('Y','N') NULL DEFAULT 'N' ,
  `aspetto_est_edema_appiattimento_circonvoluzioni` ENUM('Y','N') NULL DEFAULT 'N' ,
  `aspetto_est_poligono_Willis` TINYTEXT NULL ,
  `taglio_emisferi_emorragie` ENUM('Y','N') NULL DEFAULT 'N' ,
  `taglio_emisferi_rammollimenti` ENUM('Y','N') NULL DEFAULT 'N' ,
  `tronco_cerebrale_emorragie` ENUM('Y','N') NULL DEFAULT 'N' ,
  `tronco_cerebrale_rammollimenti` ENUM('Y','N') NULL DEFAULT 'N' ,
  PRIMARY KEY (`dati_protocollo_sids_schede_id`) ,
  CONSTRAINT `fk_encefalo_sids_dati_protocollo_sids`
    FOREIGN KEY (`dati_protocollo_sids_schede_id` )
    REFERENCES `sids_mf_db`.`dati_protocollo_sids` (`schede_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
	
	*/
	
class encefalo_sids extends Database
{   
 private  $columns = array('dati_protocollo_sids_schede_id' => 'int',
				'peso_gr'  => 'int',
				'malformazioni'  => 'bool',
				'specifica_malformazioni'  => 'string',				
				'taglio_emisferi'  => 'string',
				'tronco_cerebrale'  => 'string',
				'aspetto_esterno'  => 'string',
				'specifica_poligono_Willis'  => 'string',
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
		if ($col=='taglio_emisferi')
		{ if (!in_array($checked_val_cols[$col],$this->tipoTaglio)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		if ($col=='tronco_cerebrale')
		{ if (!in_array($checked_val_cols[$col],$this->tipoTaglio)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		if ($col=='aspetto_esterno')
		{ if (!in_array($checked_val_cols[$col],$this->tipoAspettoEsterno)) 
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