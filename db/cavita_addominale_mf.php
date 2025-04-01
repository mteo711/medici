<?php

/*

CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`cavita_addominale_mf` (
  `dati_protocollo_mf_schede_id` INT UNSIGNED NOT NULL ,
  `stato_viscerale` ENUM('proprio','situs viscerum inversus') NULL ,
  `arterie_vena_ombelicale_stato` ENUM('normali','agenesia','ipoplasia') NULL ,
  `num_arterie_vena_ombelicale_normali` INT(11) NULL ,
  `dotto_Aranzio` ENUM('pervio','stenotico','assente') NULL ,
  `vene_sovraepatiche_vena_cava_inf` ENUM('normali','trombizzate','malformate') NULL ,
  `specifica_vene_sovraepatiche_vena_cava_inf_malformate` TINYTEXT NULL ,
  `stomaco` ENUM('normale','normodotato','ipoplasico','sovradisteso') NULL ,
  `piccolo_grosso_intestino` ENUM('normosito e normoconformato','emorragie gastrointestinali','malformazioni') NULL ,
  `specifica_piccolo_grosso_intestino_malformazioni` TINYTEXT NULL ,
  `appendice_ciecale_sita_in` TINYTEXT NULL ,
  `fegato_peso_gr` DECIMAL(6,2) NULL ,
  `fegato_volume` ENUM('normale','aumentato','ridotto') NULL ,
  `fegato_isomerismo` ENUM('Y','N') NULL ,
  `specifica_fegato_isomerismo` TINYTEXT NULL ,
  `fegato_consistenza` ENUM('propria','ridotta','aumentata') NULL ,
  `fegato_superficie` ENUM('liscia lucente','granulare','mammellonata') NULL ,
  `fegato_parenchima_al_taglio` ENUM('normale','congesto','pallido','giallastro','verdastro') NULL ,
  `colecisti` ENUM('normale','ipoplasia','sovradistesa') NULL ,
  `vie_biliarie_extraepatiche` ENUM('normali e pervie','ipoplasiche','assenti') NULL ,
  `pancreas` ENUM('normale','ridotto','malformato') NULL ,
  `specifica_pancreas_malformato` TINYTEXT NULL ,
  `milza` ENUM('normale','a destra','assente','milza accessoria') NULL ,
  `milza_num` INT(11) NULL ,
  `surreni` ENUM('normali','malformati') NULL ,
  `specifica_surreni_malformati` TINYTEXT NULL ,
  `surreni_emorragie` ENUM('Y','N') NULL ,
  `surreni_ispessimenti` ENUM('diffusi','nodulari') NULL ,
  `rene_dx_peso_gr` DECIMAL(6,2) NULL ,
  `rene_dx_stato` ENUM('normale','malformato') NULL ,
  `specifica_rene_dx_malformazione` TINYTEXT NULL ,
  `rene_dx_ischemia_corticale_congestione_midollare` ENUM('Y','N') NULL ,
  `rene_dx_microlisi_ascessualizzazioni` ENUM('Y','N') NULL ,
  `rene_sx_peso_gr` DECIMAL(6,2) NULL ,
  `specifica_rene_sx_malformazione` TINYTEXT NULL ,
  `rene_sx_ischemia_corticale_congestione_midollare` ENUM('Y','N') NULL ,
  `rene_sx_microlisi_ascessualizzazioni` ENUM('Y','N') NULL ,
  `ureteri` ENUM('normali','malformati') NULL ,
  `specifica_ureteri_malformazioni` TINYTEXT NULL ,
  `vescica_urinaria` ENUM('normale','malformata') NULL ,
  `specifica_vescica_urinaria_malformazione` TINYTEXT NULL ,
  `vescica_urinaria_contenuto` ENUM('vuota','urina','sangue e coaguli ematici') NULL ,
  `uraco` ENUM('normale','assente','cistico') NULL ,
  `testicoli` ENUM('in addome','canale inguinale','scroto','assenti') NULL ,
  `utero_tube_ovaie` ENUM('senza anomalie macroscopiche e di dimensione nella norma','cisti ovariche','malformazioni') NULL ,
  `specifica_utero_tube_ovaie_malformazioni` TINYTEXT NULL ,
  PRIMARY KEY (`dati_protocollo_mf_schede_id`) ,
  CONSTRAINT `fk_cavita_addominale_mf_dati_protocollo_mf`
    FOREIGN KEY (`dati_protocollo_mf_schede_id` )
    REFERENCES `sids_mf_db`.`dati_protocollo_mf` (`schede_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)



	*/
	
class cavita_addominale_mf extends Database
{   

 private  $columns = array(
				'dati_protocollo_mf_schede_id' => 'int',
				'stato_viscerale' => 'string',
				'arterie_vena_ombelicale_stato' => 'string',
				'num_arterie_vena_ombelicale_normali' => 'int',
				'dotto_Aranzio' => 'string',
				'vene_sovraepatiche_vena_cava_inf' => 'string',
				'specifica_vene_sovraepatiche_vena_cava_inf_malformate' => 'string',
				'stomaco' => 'string',
				'piccolo_grosso_intestino' => 'string',
				'specifica_piccolo_grosso_intestino_malformazioni' => 'string',
				'appendice_ciecale_sita_in' => 'string',
				'fegato_peso_gr' => 'int',
				'fegato_volume' => 'string',
				'fegato_isomerismo' => 'bool',
				'specifica_fegato_isomerismo' => 'string',
				'fegato_consistenza' => 'string',
				'fegato_superficie' => 'string',
				'fegato_parenchima_al_taglio' => 'string',
				'colecisti' => 'string',
				'vie_biliarie_extraepatiche' => 'string',
				'pancreas' => 'string',
				'specifica_pancreas_malformato' => 'string',
				'milza' => 'string',
				'milza_num' => 'int',
                'conclusa1' => 'bool',
                'idreni' => 'int',
				'surreni' => 'string',
				'specifica_surreni_malformati' => 'string',
				'surreni_emorragie' => 'bool',
				'surreni_ispessimenti' => 'string',
				'rene_dx_peso_gr' => 'int',
				'rene_dx_stato' => 'bool',
				'specifica_rene_dx_malformazione' => 'string',
				'rene_dx_ischemia_corticale_congestione_midollare' => 'bool',
				'rene_dx_microlisi_ascessualizzazioni' => 'bool',
				'rene_sx_peso_gr' => 'int',
                'rene_sx_stato' => 'bool',
				'specifica_rene_sx_malformazione' => 'string',
				'rene_sx_ischemia_corticale_congestione_midollare' => 'bool',
				'rene_sx_microlisi_ascessualizzazioni' => 'bool',
				'ureteri' => 'string',
				'specifica_ureteri_malformazioni' => 'string',
				'vescica_urinaria' => 'string',
				'specifica_vescica_urinaria_malformazione' => 'string',
				'vescica_urinaria_contenuto' => 'string',
				'uraco' => 'string',
				'testicoli' => 'string',
				'utero_tube_ovaie' => 'string',
				'specifica_utero_tube_ovaie_malformazioni' => 'string',
                'grandi_vasi' => 'string',
				'specifica_grandi_vasi_malformazione' => 'string',
                'conclusa2' => 'bool'
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

		if ($col=='stato_viscerale' )
		{ if (!in_array($checked_val_cols[$col],$this->stato_viscerale)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='arterie_vena_ombelicale_stato' )
		{ if (!in_array($checked_val_cols[$col],$this->arterie_vena_ombelicale_stato)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='dotto_Aranzio' )
		{ if (!in_array($checked_val_cols[$col],$this->dotto_Aranzio)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='vene_sovraepatiche_vena_cava_inf' )
		{ if (!in_array($checked_val_cols[$col],$this->vene_sovraepatiche_vena_cava_inf)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='stomaco' )
		{ if (!in_array($checked_val_cols[$col],$this->stomaco)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		if ($col=='piccolo_grosso_intestino' )
		{ if (!in_array($checked_val_cols[$col],$this->piccolo_grosso_intestino)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}

		if ($col=='fegato_volume' )
		{ if (!in_array($checked_val_cols[$col],$this->fegato_volume)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		if ($col=='fegato_consistenza' )
		{ if (!in_array($checked_val_cols[$col],$this->fegato_consistenza)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		if ($col=='fegato_superficie' )
		{ if (!in_array($checked_val_cols[$col],$this->fegato_superficie)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='fegato_parenchima_al_taglio' )
		{ if (!in_array($checked_val_cols[$col],$this->fegato_parenchima_al_taglio)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='colecisti' )
		{ if (!in_array($checked_val_cols[$col],$this->colecisti)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='vie_biliarie_extraepatiche' )
		{ if (!in_array($checked_val_cols[$col],$this->vie_biliarie_extraepatiche)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}

		if ($col=='pancreas' )
		{ if (!in_array($checked_val_cols[$col],$this->pancreas)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='milza' )
		{ if (!in_array($checked_val_cols[$col],$this->milza)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='surreni' )
		{ if (!in_array($checked_val_cols[$col],$this->surreni)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='surreni_ispessimenti' )
		{ if (!in_array($checked_val_cols[$col],$this->surreni_ispessimenti)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='ureteri' )
		{ if (!in_array($checked_val_cols[$col],$this->ureteri)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
				
		if ($col=='vescica_urinaria' )
		{ if (!in_array($checked_val_cols[$col],$this->vescica_urinaria)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='vescica_urinaria_contenuto' )
		{ if (!in_array($checked_val_cols[$col],$this->vescica_urinaria_contenuto)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='uraco' )
		{ if (!in_array($checked_val_cols[$col],$this->uraco)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='testicoli' )
		{ if (!in_array($checked_val_cols[$col],$this->testicoli)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
		
		if ($col=='utero_tube_ovaie' )
		{ if (!in_array($checked_val_cols[$col],$this->utero_tube_ovaie)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
        
        if ($col=='grandi_vasi' )
		{ if (!in_array($checked_val_cols[$col],$this->grandi_vasi)) 
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