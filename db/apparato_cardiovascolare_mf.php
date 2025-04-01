<?php

/*

CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`apparato_cardiovascolare_mf` (
  `dati_protocollo_mf_schede_id` INT UNSIGNED NOT NULL ,
  `cuore_peso_gr` DECIMAL(6,2) NULL ,
  `cuore_forma` TINYTEXT NULL ,
  `cuore_volume` TINYTEXT NULL ,
  `cuore_consistenza` TINYTEXT NULL ,
  `epicardio` TINYTEXT NULL ,
  `diametro_trasverso_mm` DECIMAL(6,2) NULL ,
  `diametro_longitudinale_mm` DECIMAL(6,2) NULL ,
  `diametro_antero_posteriore_mm` DECIMAL(6,2) NULL ,
  `spessore_ventricolo_dx_mm` DECIMAL(6,2) NULL ,
  `spessore_ventricolo_sx_mm` DECIMAL(6,2) NULL ,
  `spessore_setto_interventricolare_mm` DECIMAL(6,2) NULL ,
  `forame_ovale` TINYTEXT NULL ,
  `dotto_arterioso` TINYTEXT NULL ,
  `endocardio_parietale_valvolare` TINYTEXT NULL ,
  `miocardio` TINYTEXT NULL ,
  `osti_coronarici_seno_coronarico` TINYTEXT NULL ,
  `coronarie` TINYTEXT NULL ,
  `aorta_asc_arco_aortico` TINYTEXT NULL ,
  `tronco_polmonare_rami_principali` TINYTEXT NULL ,
  `grossi_tronchi_arteriosi_arco` TINYTEXT NULL ,
  `aorta_toracica_addominale` TINYTEXT NULL ,
  `vene_cave_tronchi_venosi` TINYTEXT NULL ,
  PRIMARY KEY (`dati_protocollo_mf_schede_id`) ,
  CONSTRAINT `fk_apparato_cardiovascolare_mf_dati_protocollo_mf`
    FOREIGN KEY (`dati_protocollo_mf_schede_id` )
    REFERENCES `sids_mf_db`.`dati_protocollo_mf` (`schede_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)


	*/
	
class apparato_cardiovascolare_mf extends Database
{   
 
 private  $columns = array(
			 'dati_protocollo_mf_schede_id' => 'int',
			  'versamenti'  => 'bool',
				'altro'  => 'string',
				'cuore_forma'  => 'string',
				'cuore_volume'  => 'string',
				'cuore_consistenza'  => 'string',
				'epicardio'  => 'string',
				'cuore_peso_gr'  => 'int',
				'diametro_trasverso_mm'  => 'int',
				'diametro_longitudinale_mm'  => 'int',
				'diametro_antero_posteriore_mm'  => 'int',
				'spessore_ventricolo_dx_mm'  => 'int',
				'spessore_ventricolo_sx_mm'  => 'int',
				'spessore_setto_interventricolare_mm'  => 'int',
				'forame_ovale'  => 'string',
				'dotto_arterioso'  => 'string',
				'endocardio_parietale_valvolare'  => 'string',
				'miocardio'  => 'string',
				'osti_coronarici_seno_coronarico'  => 'string',
				'coronarie'  => 'string',
				'aorta_asc_arco_aortico'  => 'string',
				'tronco_polmonare_rami_principali'  => 'string',
				'grossi_tronchi_arteriosi_arco'  => 'string',
				'aorta_toracica_addominale'  => 'string',
				'vene_cave_tronchi_venosi'  => 'string',
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