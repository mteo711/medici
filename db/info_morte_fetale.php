<?php

/*
CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`info_morte_fetale` (
  `madre_schede_id` INT UNSIGNED NOT NULL ,
  `data_ultima_mestruazione` DATE NULL DEFAULT NULL ,
  `data_presunta_parto_anamnestico` DATE NULL DEFAULT NULL ,
  `data_presunta_parto_ecografico` DATE NULL DEFAULT NULL ,
  `num_visite_controllo_in_gravidanza` INT UNSIGNED NULL DEFAULT NULL ,
  `ricovero_durante_gravidanza` ENUM('Y','N') NULL DEFAULT NULL ,
  `diagnosi_dimissione` TEXT NULL DEFAULT NULL ,
  `biopsia_villocoriale` ENUM('normale','non effettuata','patologico') NULL DEFAULT NULL COMMENT 'dato mancante se null' ,
  `specifica_patologico_biopsia_villocoriale` TINYTEXT NULL DEFAULT NULL ,
  `amniocentesi` ENUM('normale','non effettuata','patologico') NULL DEFAULT NULL COMMENT 'dato mancante se null' ,
  `specifica_patologico_amniocentesi` TINYTEXT NULL DEFAULT NULL ,
  `funicolocentesi` ENUM('normale','non effettuata','patologico') NULL DEFAULT NULL COMMENT 'dato mancante se null' ,
  `specifica_patologico_funicolocentesi` TINYTEXT NULL DEFAULT NULL ,
  `fetoscopia` ENUM('normale','non effettuata','patologico') NULL DEFAULT NULL COMMENT 'dato mancante se null' ,
  `specifica_patologico_fetoscopia` TINYTEXT NULL DEFAULT NULL ,
  `ecografia` ENUM('normale','non effettuata','patologico') NULL DEFAULT NULL COMMENT 'dato mancante se null' ,
  `malformazioni_fetali` ENUM('cardiache','SNC','parete addominale','tratto gastroenterico','arteria ombelicale unica','apparato muscolo scheletrico') NULL DEFAULT NULL COMMENT 'dato mancante se null' ,
  `placenta` ENUM('distacco intempestivo','previa','vasi previ','infarto','accreta-percreta') NULL DEFAULT NULL COMMENT 'dato mancante se null' ,
  `malformazioni_utero` ENUM('Y','N') NULL DEFAULT NULL ,
  `specifica_malformazioni_utero` TINYTEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`madre_schede_id`) ,
  INDEX `fk_info_morte_fetale_madre` (`madre_schede_id` ASC) ,
  CONSTRAINT `fk_info_morte_fetale_madre`
    FOREIGN KEY (`madre_schede_id` )
    REFERENCES `sids_mf_db`.`madre` (`schede_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

	*/

	
class info_morte_fetale extends Database
{
		
  
 private  $columns = array('madre_schede_id' => 'int',
				 'data_ultima_mestruazione'  => 'date',
				 'data_presunta_parto_anamnestico' => 'date',
				 'data_presunta_parto_ecografico' => 'date',
				 'num_visite_controllo_in_gravidanza' => 'int',
                 'conclusa1' => 'bool',
                 'idindagini' => 'int',
                 'biopsia_villocoriale' => 'string',
				 'specifica_patologico_biopsia_villocoriale' => 'string',
				 'amniocentesi' => 'string',
				 'specifica_patologico_amniocentesi' => 'string',
				 'funicolocentesi' => 'string',
				 'specifica_patologico_funicolocentesi' => 'string',
                 'fetoscopia' => 'string',
				 'specifica_patologico_fetoscopia' => 'string',
                 'conclusa2' => 'bool',
				 'idecografia' => 'int',
				 'ecografia' => 'string',
				 'malformazioni_fetali' => 'string',
				 'placenta' => 'string',
				 'malformazioni_utero' => 'bool',
				 'specifica_malformazioni_utero' => 'string',
                 'conclusa3' => 'bool',
                 'idricovero' => 'int',
                 'ricovero_durante_gravidanza' => 'string',
				 'diagnosi_dimissione' => 'string',
                 'conclusa4' => 'bool'
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
	
		if ($col=='biopsia_villocoriale' || $col=='amniocentesi' || $col=='funicolocentesi' || $col=='fetoscopia' || $col=='ecografia')
		{ if (!in_array($checked_val_cols[$col],$this->tipoRisultatoA)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}   
		
		
		if ($col=='malformazioni_fetali' )
		{ if (!in_array($checked_val_cols[$col],$this->tipoMalformazioni)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		} 
		
		if ($col=='placenta' )
		{ if (!in_array($checked_val_cols[$col],$this->tipoPlacenta)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		} 
        
        if ($col=='ricovero_durante_gravidanza')
		{ if (!in_array($checked_val_cols[$col],$this->bool_mancante)) 
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