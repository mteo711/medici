<?php

/*

CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`cavita_toracica_sids` (
  `dati_protocollo_sids_schede_id` INT UNSIGNED NOT NULL ,
  `versamenti_cavi_pleurici` ENUM('Y','N') NULL DEFAULT 'N' ,
  `pneumotorace` ENUM('Y','N') NULL DEFAULT 'N' ,
  `altro_cavi_pleurici` TINYTEXT NULL ,
  `asimmetria_viscerale` ENUM('Y','N') NULL DEFAULT 'N' ,
  `specifica_asimmetria_viscerale` TINYTEXT NULL ,
  `vie_aeree_pervie` ENUM('Y','N') NULL DEFAULT 'N' ,
  `viee_aeree_corpi_estranei` ENUM('Y','N') NULL DEFAULT 'N' ,
  `viee_aeree_ab_ingestis` ENUM('Y','N') NULL DEFAULT 'N' ,
  `viee_aeree_edema_glottide` ENUM('Y','N') NULL DEFAULT 'N' ,
  `sacco_pericardico_versamenti` ENUM('Y','N') NULL ,
  `altro_sacco_pericardico` TINYTEXT NULL ,
  PRIMARY KEY (`dati_protocollo_sids_schede_id`) ,
  CONSTRAINT `fk_cavita_toracica_sids_dati_protocollo_sids`
    FOREIGN KEY (`dati_protocollo_sids_schede_id` )
    REFERENCES `sids_mf_db`.`dati_protocollo_sids` (`schede_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

	
	*/
	
class cavita_toracica_sids extends Database
{   
 
  
 private  $columns = array('dati_protocollo_sids_schede_id' => 'int',
 				'vie_aeree'  => 'string',
				'versamenti'  => 'bool',
				'pneumotorace'  => 'bool',
				'altro_cavi_pleurici'  => 'string',
				'asimmetria_viscerale'  => 'bool',
				'specifica_asimmetria_viscerale'  => 'string',
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
		if ($col=='vie_aeree')
		{ if (!in_array($checked_val_cols[$col],$this->tipoVieAeree)) 
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