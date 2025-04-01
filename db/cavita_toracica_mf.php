<?php

/*

CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`cavita_toracica_mf` (
  `dati_protocollo_mf_schede_id` INT UNSIGNED NOT NULL ,
  `stato_viscerale` ENUM('situs solitus','situs inversus') NULL ,
  `versamenti_cavi_pleurici` ENUM('Y','N') NULL DEFAULT 'N' ,
  `pneumotorace` ENUM('Y','N') NULL DEFAULT 'N' ,
  `asimmetria_viscerale` ENUM('Y','N') NULL DEFAULT 'N' ,
  `specifica_asimmetria_viscerale` TINYTEXT NULL ,
  `laringe_trachea_bronchi` ENUM('normali','malformati','pervie') NULL ,
  `specifica_laringe_trachea_bronchi_malformata` TINYTEXT NULL ,
  `esofago` ENUM('normale','fistole','malformazioni') NULL ,
  `specifica_esofago_malformazioni` TINYTEXT NULL ,
  `sacco_pericardico` ENUM('integro','lacerato','incompleto') NULL ,
  `altro_sacco_pericardico` TINYTEXT NULL ,
  PRIMARY KEY (`dati_protocollo_mf_schede_id`) ,
  CONSTRAINT `fk_cavita_toracica_mf_dati_protocollo_mf`
    FOREIGN KEY (`dati_protocollo_mf_schede_id` )
    REFERENCES `sids_mf_db`.`dati_protocollo_mf` (`schede_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

	*/
	
class cavita_toracica_mf extends Database
{    
  
 private  $columns = array(
			  'dati_protocollo_mf_schede_id' => 'int',
			  'stato_viscerale' => 'string',
			  'versamenti_cavi_pleurici' => 'bool',
			  'pneumotorace' => 'bool',
			  'asimmetria_viscerale' => 'bool',
			  'specifica_asimmetria_viscerale' => 'string',
			  'laringe_trachea_bronchi' => 'string',
			  'specifica_laringe_trachea_bronchi_malformata' => 'string',
			  'esofago' => 'string',
			  'specifica_esofago_malformazioni' => 'string',
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
		
		if ($col=='esofago' )
		{ if (!in_array($checked_val_cols[$col],$this->tipoEsofago)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='sacco_pericardico' )
		{ if (!in_array($checked_val_cols[$col],$this->tipoSaccoP)) 
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