<?php

/*
CREATE  TABLE IF NOT EXISTS `sids_mf_db`.`parti_prec` (
  `madre_schede_id` INT UNSIGNED NOT NULL ,
  `prec_concepimenti` ENUM('Y','N') NULL DEFAULT NULL ,
  `num_parti_prec` INT UNSIGNED NULL DEFAULT NULL ,
  `num_nati_vivi` INT UNSIGNED NULL DEFAULT NULL ,
  `num_feti_morti` INT UNSIGNED NULL DEFAULT NULL ,
  `num_aborti_spontanei` INT UNSIGNED NULL DEFAULT NULL ,
  `settimane_per_aborto` INT UNSIGNED NULL DEFAULT NULL ,
  `num_IVG` INT UNSIGNED NULL DEFAULT NULL ,
  `data_ultimo_parto` DATE NULL DEFAULT NULL ,
  PRIMARY KEY (`madre_schede_id`) ,
  INDEX `fk_parti_prec_madre` (`madre_schede_id` ASC) ,
  CONSTRAINT `fk_parti_prec_madre`
    FOREIGN KEY (`madre_schede_id` )
    REFERENCES `sids_mf_db`.`madre` (`schede_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

*/

class parti_prec extends Database
{
 private  $columns = array('madre_schede_id' => 'int',
                 'aborti_precedenti' => 'string',
				 'tipo1'  => 'string',
				 'settimana1' => 'int',
				 'tipo2'  => 'string',
				 'settimana2' => 'int',
                 'tipo3'  => 'string',
				 'settimana3' => 'int',
                 'tipo4'  => 'string',
				 'settimana4' => 'int',
                 'tipo5'  => 'string',
				 'settimana5' => 'int',
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
		
		if ($col=='tipo1')
		{ if (!in_array($checked_val_cols[$col],$this->tipoAborto)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
         
        if ($col=='tipo2')
		{ if (!in_array($checked_val_cols[$col],$this->tipoAborto)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
        
        if ($col=='tipo3')
		{ if (!in_array($checked_val_cols[$col],$this->tipoAborto)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
         
        if ($col=='tipo4')
		{ if (!in_array($checked_val_cols[$col],$this->tipoAborto)) 
			{ $this->error_status=7;
			  $error=1;
			  break;
			}
		}
        
        if ($col=='tipo5')
		{ if (!in_array($checked_val_cols[$col],$this->tipoAborto)) 
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