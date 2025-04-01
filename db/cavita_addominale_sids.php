<?php

/*

CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`cavita_addominale_sids` (
  `dati_protocollo_sids_schede_id` INT UNSIGNED NOT NULL ,
  `tratto_gastroenterico_malformazioni` ENUM('Y','N') NULL ,
  `specifica_tratto_gastroenterico_malformazioni` TINYTEXT NULL ,
  `tratto_gastroenterico_emorragie` ENUM('Y','N') NULL ,
  `tratto_gastroenterico_altro` TINYTEXT NULL ,
  `surreni_peso_gr` DECIMAL(6,2) NULL ,
  `surreni_emorragie` ENUM('Y','N') NULL ,
  `surreni_ispessimenti` ENUM('diffusi','nodulari') NULL ,
  `reni_peso_gr` DECIMAL(6,2) NULL ,
  `reni_malformazioni` ENUM('Y','N') NULL ,
  `specifica_reni_malformazioni` TINYTEXT NULL ,
  `ischemia_corticale_congestione_midollare` ENUM('Y','N') NULL ,
  `microlitiasi_ascessualizzazioni` ENUM('Y','N') NULL ,
  `milza_peso_gr` DECIMAL(6,2) NULL ,
  `assenza` ENUM('Y','N') NULL ,
  `colore_al_taglio` VARCHAR(45) NULL ,
  PRIMARY KEY (`dati_protocollo_sids_schede_id`) ,
  CONSTRAINT `fk_cavita_addominale_sids_dati_protocollo_sids`
    FOREIGN KEY (`dati_protocollo_sids_schede_id` )
    REFERENCES `sids_mf_db`.`dati_protocollo_sids` (`schede_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
	*/
	
class cavita_addominale_sids extends Database
{   
   
 private  $columns = array('dati_protocollo_sids_schede_id' => 'int',
 				'eterotassia_viscerale'  => 'bool',
				'tratto_gastroenterico_malformazioni'  => 'bool',
				'specifica_tratto_gastroenterico_malformazioni'  => 'string',
				'tratto_gastroenterico_emorragie'  => 'bool',
				'tratto_gastroenterico_altro'  => 'string',
				'surreni_peso_gr'  => 'int',
				'surreni_emorragie'  => 'bool',
				'surreni_ispessimenti'  => 'string',
				'reni_peso_gr'  => 'int',
				'reni_malformazioni'  => 'bool',
				'ischemia_corticale_congestione_midollare'  => 'bool',
				'microlitiasi_ascessualizzazioni'  => 'bool',
				'milza_peso_gr'  => 'int',
				'tipo'  => 'string',
				'fegato_peso_gr'  => 'int',
				'fegato_colore'  => 'string',
				'pancreas_peso_gr'  => 'int',
				'pancreas_colore'  => 'string',
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

		
		  if ($col=='surreni_ispessimenti' )
			{ if (!in_array($checked_val_cols[$col],$this->tipoIspessimenti)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		 }
		 if ($col=='tipo' )
		  	{ if (!in_array($checked_val_cols[$col],$this->tipoMilza)) 
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