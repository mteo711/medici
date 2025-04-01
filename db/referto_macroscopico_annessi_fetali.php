<?php

/*
CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`referto_macroscopico_annessi_fetali` (
  `schede_id` INT UNSIGNED NULL ,
  `placenta` ENUM('singola','gemellare fusa','gemellare separata') NULL ,
  `placenta_pervenuta` ENUM('fresca','fissata','refrigerata','congelata') NULL ,
  `placenta_stato` ENUM('intera','frammentata','parziale','cotiledoni lacerati','lembi di decidua basale adesi') NULL ,
  `placenta_membrane_punto_rottura` ENUM('precisabile','imprecisabile') NULL ,
  `placenta_distanza_margine_disco_coriale_cm` DECIMAL(6,2) NULL ,
  `placenta_inserzione` ENUM('normale','marginale','extracoriale circumvallata circummarginata') NULL ,
  `placenta_caratteristiche` ENUM('ispessite','sottili','opache','lucenti','colorazione di meconio','edema','emorragie retromembranosa') NULL ,
  `cordone_ombelicale_lunghezza_cm` DECIMAL(6,2) NULL ,
  `cordone_ombelicale_diametro_max_cm` DECIMAL(6,2) NULL ,
  `cordone_ombelicale_diametro_min_cm` DECIMAL(6,2) NULL ,
  `cordone_ombelicale_inserzione` ENUM('centrale','marginale','eccentrica','velamentosa') NULL ,
  `cordone_ombelicale_dist_margine_materno_fetale_cm` DECIMAL(6,2) NULL ,
  `cordone_ombelicale_altro` SET('nodi veri','nodi falsi','torsione','restringimenti','iperspiralizzazione','aneurismi','ematomi','trombosi') NULL ,
  `disco_coriale_peso_gr` DECIMAL(6,2) NULL ,
  `disco_coriale_diametro1_cm` DECIMAL(6,2) NULL ,
  `disco_coriale_diametro2_cm` DECIMAL(6,2) NULL ,
  `disco_coriale_spessore_max_cm` DECIMAL(6,2) NULL ,
  `disco_coriale_spessore_min_cm` DECIMAL(6,2) NULL ,
  `disco_coriale_forma` ENUM('rotonda','ovale','a cuore','a rene','a racchetta','bilobata','trilobata','doppia','tripla','multipla','membranosa','fenestrata','anulare','lobi accessori','lobi aberranti') NULL ,
  `versante_fetale` SET('lucente','opaco','metaplasia squamosa','amnios nodosum','fibrina subcorionica','ematomi subcorionici','ematomi subamniotici') NULL ,
  `versante_materno` SET('cotiledoni prominenti','cavitazioni centrali','aree depresse','lacerazioni','fibrina perivillosa','sclerosi marginale','calcificazioni') NULL ,
  `ematomi_retroplacentari_num` INT(11) NULL ,
  `ematomi_retroplacentari_diametro_max_cm` DECIMAL(6,2) NULL ,
  `ematomi_marginali_num` INT(11) NULL ,
  `ematomi_marginali_diametro_max_cm` DECIMAL(6,2) NULL ,
  `ematomi_intervillosi_num` INT(11) NULL ,
  `ematomi_intervillosi_diametro_max_cm` DECIMAL(6,2) NULL ,
  `infarti_recenti_num` INT(11) NULL ,
  `infarti_recenti_diametro_max_cm` DECIMAL(6,2) NULL ,
  `vasi_coriali_distribuzione` ENUM('magistrale','dispersa') NULL ,
  `vasi_coriali_altro` ENUM('anastomosi vascolari','angiodistopie') NULL ,
  PRIMARY KEY (`schede_id`) ,
  CONSTRAINT `fk_referto_macroscopico_annessi_fetali_schede`
    FOREIGN KEY (`schede_id` )
    REFERENCES `sids_mf_db`.`schede` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

*/

class referto_macroscopico_annessi_fetali extends Database
{   

 private  $columns = array(
				'schede_id' => 'int',
				'placenta' => 'string',
				'placenta_pervenuta' => 'string',
				'placenta_membrane_punto_rottura' => 'string',
				'placenta_distanza_margine_disco_coriale_cm' => 'int',
				'placenta_inserzione' => 'string',
				'placenta_caratteristiche' => 'string',
                'conclusa1' => 'bool',
                'idcordone' => 'int',
				'cordone_ombelicale_lunghezza_cm' => 'int',
				'cordone_ombelicale_diametro_max_cm' => 'int',
				'cordone_ombelicale_diametro_min_cm' => 'int',
				'cordone_ombelicale_inserzione' => 'string',
				'cordone_ombelicale_dist_margine_materno_fetale_cm' => 'int',
				'cordone_ombelicale_altro' => 'string',
                'conclusa2' => 'bool',
                'iddisco' => 'int',
				'disco_coriale_peso_gr' => 'int',
				'disco_coriale_diametro1_cm' => 'int',
				'disco_coriale_diametro2_cm' => 'int',
				'disco_coriale_spessore_max_cm' => 'int',
				'disco_coriale_spessore_min_cm' => 'int',
				'disco_coriale_forma' => 'string',
				'versante_fetale' => 'string',
				'versante_materno' => 'string',
				'ematomi_retroplacentari' => 'bool',
				'ematomi_retroplacentari_diametro_max_cm' => 'int',
				'ematomi_marginali' => 'bool',
				'ematomi_marginali_diametro_max_cm' => 'int',
				'ematomi_intervillosi' => 'bool',
				'ematomi_intervillosi_diametro_max_cm' => 'int',
				'infarti_recenti' => 'bool',
				'infarti_recenti_diametro_max_cm' => 'int',
                'infarti_vecchia_data' => 'bool',
				'infarti_vecchia_diametro_max_cm' => 'int',
				'vasi_coriali_distribuzione' => 'string',
                'conclusa3' => 'bool'
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
	   
	   if ($col=='placenta' )
		{ if (!in_array($checked_val_cols[$col],$this->placenta)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
	  
	   if ($col=='placenta_pervenuta' )
		{ if (!in_array($checked_val_cols[$col],$this->placenta_pervenuta)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		 if ($col=='placenta_membrane_punto_rottura' )
		{ if (!in_array($checked_val_cols[$col],$this->placenta_membrane_punto_rottura)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		 if ($col=='placenta_inserzione' )
		{ if (!in_array($checked_val_cols[$col],$this->placenta_inserzione)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		 if ($col=='placenta_caratteristiche' )
		{ if (!in_array($checked_val_cols[$col],$this->placenta_caratteristiche)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		 if ($col=='cordone_ombelicale_inserzione' )
		{ if (!in_array($checked_val_cols[$col],$this->cordone_ombelicale_inserzione)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		 if ($col=='disco_coriale_forma' )
		{ if (!in_array($checked_val_cols[$col],$this->disco_coriale_forma)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		 if ($col=='vasi_coriali_distribuzione' )
		{ if (!in_array($checked_val_cols[$col],$this->vasi_coriali_distribuzione)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		 
		 // verifico i valori di tipo set
		if ($col=='cordone_ombelicale_altro')
		{ if (!$this->isInSet($value, $this->tipoCordoneOmbelicale)) 
			{ $this->error_status=8;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='versante_fetale')
		{ if (!$this->isInSet($value, $this->tipoVersanteFetale)) 
			{ $this->error_status=8;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='versante_materno')
		{ if (!$this->isInSet($value, $this->tipoVersanteMaterno)) 
			{ $this->error_status=8;
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

