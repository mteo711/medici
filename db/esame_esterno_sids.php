<?php

/*

CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`esame_esterno_sids` (
  `dati_protocollo_sids_schede_id` INT UNSIGNED NOT NULL ,
  `documentazione_foto_video` ENUM('Y','N') NULL DEFAULT 'N' ,
  `formato_documentazione` TINYTEXT NULL ,
  `peso_gr` DECIMAL(6,2) NULL ,
  `lunghezza_tot_cm` DECIMAL(6,2) NULL ,
  `ipostasi` ENUM('Y','N') NULL DEFAULT 'N' ,
  `rigidita` ENUM('Y','N') NULL DEFAULT 'N' ,
  `temperatura_rettale` DECIMAL(6,2) NULL ,
  `presenza_sangue_naso` ENUM('Y','N') NULL DEFAULT 'N' ,
  `presenza_sangue_bocca` ENUM('Y','N') NULL DEFAULT 'N' ,
  `presenza_urine_sangue_feci_orifizi` ENUM('Y','N') NULL DEFAULT 'N' ,
  `specifica_presenza_urine_sangue_feci_orifizi` TINYTEXT NULL ,
  `presenza_urine_sangue_feci_corpo` ENUM('Y','N') NULL DEFAULT 'N' ,
  `specifica_presenza_urine_sangue_feci_corpo` TINYTEXT NULL ,
  `presenza_petecchie_marezzature_emorragiche_congiuntive` ENUM('Y','N') NULL DEFAULT 'N' ,
  `presenza_petecchie_marezzature_emorragiche_mucosa_orale` ENUM('Y','N') NULL DEFAULT 'N' ,
  `presenza_petecchie_marezzature_emorragiche_cute` ENUM('Y','N') NULL DEFAULT 'N' ,
  PRIMARY KEY (`dati_protocollo_sids_schede_id`) ,
  CONSTRAINT `fk_esame_esterno_sids_dati_protocollo_sids`
    FOREIGN KEY (`dati_protocollo_sids_schede_id` )
    REFERENCES `sids_mf_db`.`dati_protocollo_sids` (`schede_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

	
	*/
	
class esame_esterno_sids extends Database
{  
 
 private  $columns = array('dati_protocollo_sids_schede_id' => 'int',
				'documentazione_foto_video'  => 'bool',
                'documentazione'  => 'string',
				'peso_gr'  => 'int',
				'lunghezza_tot_cm'  => 'int',
				'segni_tanatologici'  => 'string',
				'presenza_sangue_naso'  => 'bool',
				'presenza_sangue_bocca'  => 'bool',
				'presenza_urine_sangue_feci_orifizi'  => 'bool',
				'specifica_presenza_urine_sangue_feci_orifizi'  => 'string',
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
		if ($col=='segni_tanatologici')
		{ if (!in_array($checked_val_cols[$col],$this->segniTanatologici)) 
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