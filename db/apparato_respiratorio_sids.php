<?php

/*

CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`apparato_respiratorio_sids` (
  `dati_protocollo_sids_schede_id` INT UNSIGNED NOT NULL ,
  `laringe` VARCHAR(45) NULL ,
  `trachea` TINYTEXT NULL ,
  `bronchi_principali` TINYTEXT NULL ,
  `polmone_dx_peso_gr` DECIMAL(6,2) NULL ,
  `polmone_sx_peso_gr` DECIMAL(6,2) NULL ,
  `num_lobi_dx` INT(11) NULL ,
  `num_lobi_sx` INT(11) NULL ,
  `volume` TINYTEXT NULL ,
  `consistenza` TINYTEXT NULL ,
  `colore` TINYTEXT NULL ,
  `sup_esterna` TINYTEXT NULL ,
  `al_taglio` TINYTEXT NULL ,
  `formazioni_vascolo_bronchiali_ilo` TINYTEXT NULL ,
  PRIMARY KEY (`dati_protocollo_sids_schede_id`) ,
  CONSTRAINT `fk_apparato_respiratorio_sids_dati_protocollo_sids`
    FOREIGN KEY (`dati_protocollo_sids_schede_id` )
    REFERENCES `sids_mf_db`.`dati_protocollo_sids` (`schede_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;	
	*/
	
class apparato_respiratorio_sids extends Database
{   
 
 private  $columns = array('dati_protocollo_sids_schede_id' => 'int',
				'laringe'  => 'string',
				'trachea'  => 'string',
				'bronchi_principali'  => 'string',
				'polmone_dx_peso_gr'  => 'int',
				'polmone_sx_peso_gr'  => 'int',
				'num_lobi_dx'  => 'int',
				'num_lobi_sx'  => 'int',
				'volume'  => 'string',
				'consistenza'  => 'string',
				'colore'  => 'string',
				'sup_esterna'  => 'string',
				'al_taglio'  => 'string',
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