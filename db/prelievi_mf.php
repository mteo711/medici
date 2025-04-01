<?php

/*

CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`prelievi_sids` (
  `dati_protocollo_sids_schede_id` INT UNSIGNED NOT NULL ,
  `encefalo_corteccia_cerebrale` VARCHAR(45) NULL ,
  `encefalo_ippocampo` ENUM('Y','N') NULL ,
  `encefalo_nuclei_della_base` ENUM('Y','N') NULL ,
  `encefalo_cervelletto` ENUM('Y','N') NULL ,
  `enefalo_tronco_encefalico` ENUM('Y','N') NULL ,
  `polmone_dx_ilo` ENUM('Y','N') NULL ,
  `polmone_dx_lobo_superiore` ENUM('Y','N') NULL ,
  `polmone_dx_lobo_medio` ENUM('Y','N') NULL ,
  `polmone_dx_lobo_inferiore` ENUM('Y','N') NULL ,
  `polmone_sx_ilo` ENUM('Y','N') NULL ,
  `polmone_sx_lobo_superiore` ENUM('Y','N') NULL ,
  `polmone_sx_lobo_medio` ENUM('Y','N') NULL ,
  `polmone_sx_lobo_inferiore` ENUM('Y','N') NULL ,
  `app_circolatorio_paragangli_aortico_polmonari` ENUM('Y','N') NULL ,
  `app_circolatorio_aorta` ENUM('Y','N') NULL ,
  `app_circolatorio_tronco_polmonare` ENUM('Y','N') NULL ,
  `app_circolatorio_pericardio` ENUM('Y','N') NULL ,
  `app_circolatorio_parete_atrio_dx` ENUM('Y','N') NULL ,
  `app_circolatorio_parete_atrio_sx` ENUM('Y','N') NULL ,
  `app_circolatorio_setto_interventricolare` ENUM('Y','N') NULL ,
  `app_circolatorio_parete_ventricolo_dx` ENUM('Y','N') NULL ,
  `app_circolatorio_parete_ventricolo_sx` ENUM('Y','N') NULL ,
  `app_circolatorio_coronaria_sx_ramo_disc_ant` ENUM('Y','N') NULL ,
  `app_circolatorio_coronaria_sx_ramo_circ` ENUM('Y','N') NULL ,
  `app_circolatorio_coronaria_dx_ramo_disc_post` ENUM('Y','N') NULL ,
  `app_circolatorio_coronaria_dx_ramo_marg` ENUM('Y','N') NULL ,
  `gangli_simpatici_stellato` ENUM('Y','N') NULL ,
  `gangli_simpatici_cervicale_sup` ENUM('Y','N') NULL ,
  `biforcazione_carotidea_giomo_corpo_carotideo` ENUM('Y','N') NULL ,
  `biforcazione_carotidea_seno_carotideo` ENUM('Y','N') NULL ,
  `timo` ENUM('Y','N') NULL ,
  `tiroide` ENUM('Y','N') NULL ,
  `tratto_gastroenterico_esofago` ENUM('Y','N') NULL ,
  `tratto_gastroenterico_stomaco` ENUM('Y','N') NULL ,
  `tratto_gastroenterico_duodeno` ENUM('Y','N') NULL ,
  `tratto_gastroenterico_piccolo_intestino` ENUM('Y','N') NULL ,
  `tratto_gastroenterico_grosso_intestino` ENUM('Y','N') NULL ,
  `surrene_dx` ENUM('Y','N') NULL ,
  `surrene_sx` ENUM('Y','N') NULL ,
  `rene_dx` ENUM('Y','N') NULL ,
  `rene_sx` ENUM('Y','N') NULL ,
  `milza` ENUM('Y','N') NULL ,
  `fegato` ENUM('Y','N') NULL ,
  `pancreas` ENUM('Y','N') NULL ,
  `principali_reperti_patologici` TEXT NULL ,
  `diagnosi_anatomo_patologica` MEDIUMTEXT NULL ,
  PRIMARY KEY (`dati_protocollo_sids_schede_id`) ,
  CONSTRAINT `fk_prelievi_sids_dati_protocollo_sids`
    FOREIGN KEY (`dati_protocollo_sids_schede_id` )
    REFERENCES `sids_mf_db`.`dati_protocollo_sids` (`schede_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


	*/
	
class prelievi_mf extends Database
{   
 
 private  $columns = array(
			  'dati_protocollo_mf_schede_id' => 'int',
			  'encefalo_corteccia_cerebrale' => 'string',
			  'encefalo_ippocampo' => 'bool',
			  'encefalo_nuclei_della_base' => 'bool',
			  'encefalo_cervelletto' => 'bool',
			  'enefalo_tronco_encefalico' => 'bool',
			  'idpolmone' => 'int',
			  'polmone_dx_ilo' => 'bool',
			  'polmone_dx_lobo_superiore' => 'bool',
			  'polmone_dx_lobo_medio' => 'bool',
			  'polmone_dx_lobo_inferiore' => 'bool',
			  'polmone_sx_ilo' => 'bool',
			  'polmone_sx_lobo_superiore' => 'bool',
			  'polmone_sx_lobo_medio' => 'bool',
			  'polmone_sx_lobo_inferiore' => 'bool',
			  'idcircolatorio' => 'int',
			  'app_circolatorio_paragangli_aortico_polmonari' => 'bool',
			  'app_circolatorio_aorta' => 'bool',
			  'app_circolatorio_tronco_polmonare' => 'bool',
			  'app_circolatorio_pericardio' => 'bool',
			  'app_circolatorio_parete_atrio_dx' => 'bool',
			  'app_circolatorio_parete_atrio_sx' => 'bool',
			  'app_circolatorio_setto_interventricolare' => 'bool',
			  'app_circolatorio_parete_ventricolo_dx' => 'bool',
			  'app_circolatorio_parete_ventricolo_sx' => 'bool',
			  'app_circolatorio_coronaria_sx_ramo_disc_ant' => 'bool',
			  'app_circolatorio_coronaria_sx_ramo_circ' => 'bool',
			  'app_circolatorio_coronaria_dx_ramo_disc_post' => 'bool',
			  'app_circolatorio_coronaria_dx_ramo_marg' => 'bool',
			  'idgastro' => 'int',
			  'tratto_gastroenterico_esofago' => 'bool',
			  'tratto_gastroenterico_stomaco' => 'bool',
			  'tratto_gastroenterico_duodeno' => 'bool',
			  'tratto_gastroenterico_piccolo_intestino' => 'bool',
			  'tratto_gastroenterico_grosso_intestino' => 'bool',
			  'idrene' => 'int',
			  'surrene_dx' => 'bool',
			  'surrene_sx' => 'bool',
			  'rene_dx' => 'bool',
			  'rene_sx' => 'bool',
			  'idaltro' => 'int',
			  'gangli_simpatici_stellato' => 'bool',
			  'gangli_simpatici_cervicale_sup' => 'bool',
			  'biforcazione_carotidea_giomo_corpo_carotideo' => 'bool',
			  'biforcazione_carotidea_seno_carotideo' => 'bool',
			  'timo' => 'bool',
			  'tiroide' => 'bool',
			  'milza' => 'bool',
			  'fegato' => 'bool',
			  'pancreas' => 'bool',
			  'principali_reperti_patologici' => 'string',
			  'diagnosi_anatomo_patologica' => 'string',
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