<?php

/*

CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`esame_esterno_mf` (
  `dati_protocollo_mf_schede_id` INT UNSIGNED NOT NULL ,
  `documentazione_foto_video` ENUM('Y','N') NULL DEFAULT 'N' ,
  `formato_documentazione` TINYTEXT NULL ,
  `peso_gr` DECIMAL(6,2) NULL ,
  `lunghezza_tot_cm` DECIMAL(6,2) NULL ,
  `lunghezza_vertice_podice_cm` DECIMAL(6,2) NULL ,
  `circ_cranica_cm` DECIMAL(6,2) NULL ,
  `circ_toracica_cm` DECIMAL(6,2) NULL ,
  `circ_addom_cm` DECIMAL(6,2) NULL ,
  `lunghezza_omero_cm` DECIMAL(6,2) NULL ,
  `lunghezza_femore_cm` DECIMAL(6,2) NULL ,
  `lunghezza_piede` DECIMAL(6,2) NULL ,
  `moncone_ombelicale_cm` DECIMAL(6,2) NULL ,
  `percentile_crescita` INT(11) NULL ,
  `descrizione_fenotipo` ENUM('armonico','asimmetrico','dismorfico/malformato','papiraceo') NULL ,
  `nutrizione` ENUM('adeguata','inadeguata') NULL ,
  `idrope_cutanea` ENUM('diffusa','segmentaria') NULL ,
  `plica_nucale_diametro_trasverso_mm` DECIMAL(6,2) NULL ,
  `igroma_cistico_collo` TINYTEXT NULL ,
  `macerazione_grado` ENUM('I','II','III') NULL ,
  `colorito` ENUM('pallido','rosso vivo','violaceo-mattone','grigio-verdastro','sub itterico','itterico','marezzature petecchie') NULL ,
  `specifica_sede_marezzature_petecchie` TINYTEXT NULL ,
  `vernice_caseosa_sede_quantita` TINYTEXT NULL ,
  `caratteristiche_genitali` ENUM('maschili','femminili','ambigui','ipotrofici','ipertrofici','endematosi') NULL ,
  `moncone_cordone_ombelicale` ENUM('normale','marcato assottigliamento','discromie','cisti del cordone','ematoma') NULL ,
  `moncone_cordone_ombelicale_num_vasi` INT(11) NULL ,
  `estremita` ENUM('normali','incomplete','anomalie posturali') NULL ,
  PRIMARY KEY (`dati_protocollo_mf_schede_id`) ,
  CONSTRAINT `fk_esame_esterno_mf_dati_protocollo_mf`
    FOREIGN KEY (`dati_protocollo_mf_schede_id` )
    REFERENCES `sids_mf_db`.`dati_protocollo_mf` (`schede_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
	
	*/
	
class esame_esterno_mf extends Database
{  
  

  
 private  $columns = array('dati_protocollo_mf_schede_id' => 'int',
				'documentazione_foto_video'  => 'bool',
				'documentazione'  => 'string',
				'peso_gr'  => 'int',
				'lunghezza_tot_cm'  => 'int',
				'lunghezza_vertice_podice_cm'  => 'int',
				'circ_cranica_cm'  => 'int',
				'circ_toracica_cm'  => 'int',
				'circ_addom_cm'  => 'int',
				'lunghezza_omero_cm'  => 'int',
				'lunghezza_femore_cm'  => 'int',
				'lunghezza_piede'  => 'int',
				'moncone_ombelicale_cm'  => 'int',
				'percentile_crescita'  => 'int',
				'descrizione_fenotipo'  => 'string',
				'nutrizione'  => 'string',
				'idrope_cutanea'  => 'string',
				'plica_nucale_diametro_trasverso_mm'  => 'int',
				'igroma_cistico_collo'  => 'string',
				'macerazione_grado'  => 'string',
				'colorito'  => 'string',
				'specifica_sede_marezzature_petecchie'  => 'string',
				'vernice_caseosa_sede_quantita'  => 'string',
				'caratteristiche_genitali'  => 'string',
                'estremita'  => 'string',
				'moncone_cordone_ombelicale'  => 'string',
				'moncone_cordone_ombelicale_num_vasi'  => 'int',
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
	   
	   if ($col=='descrizione_fenotipo' )
		{ if (!in_array($checked_val_cols[$col],$this->tipoFenotipo)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		} 	
	   
	     if ($col=='nutrizione' )
		{ if (!in_array($checked_val_cols[$col],$this->tipoNutrizione)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		} 	
		
		  if ($col=='idrope_cutanea' )
		{ if (!in_array($checked_val_cols[$col],$this->tipoIdrope)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		} 	
		
		
		  if ($col=='macerazione_grado' )
		{ if (!in_array($checked_val_cols[$col],$this->tipoMacerazioneo)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		} 	
		
		
		  if ($col=='colorito' )
		{ if (!in_array($checked_val_cols[$col],$this->tipoColorito)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		} 	
		
		
		  if ($col=='caratteristiche_genitali' )
		{ if (!in_array($checked_val_cols[$col],$this->tipoGenitali)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		} 	
		
		
		  if ($col=='moncone_cordone_ombelicale' )
		{ if (!in_array($checked_val_cols[$col],$this->tipoCordone)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		} 	
		
		
		  if ($col=='estremita' )
		{ if (!in_array($checked_val_cols[$col],$this->tipoEstremita)) 
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