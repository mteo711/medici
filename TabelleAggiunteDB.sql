-- tabella dati_pers
ALTER TABLE `dati_pers`
  ADD COLUMN `cell` VARCHAR(15) DEFAULT NULL AFTER `professione`,
  ADD COLUMN `codice_fiscale` CHAR(16) DEFAULT NULL AFTER `cell`,
  ADD COLUMN `rischi` TEXT DEFAULT NULL AFTER `codice_fiscale`,
  ADD COLUMN `titolo_studio` VARCHAR(16) DEFAULT NULL AFTER `rischi`,
  ADD COLUMN `stato_civile` ENUM('mancante','nubile','separato', 'divorziato', 'vedovo', 'coniugato','convivente','separata', 'divorziata', 'vedova', 'madre single', 'coniugata') DEFAULT NULL AFTER `titolo_studio`,
  ADD COLUMN `altezza` VARCHAR(30) DEFAULT NULL AFTER `stato_civile`,
  ADD COLUMN `peso` VARCHAR(30) DEFAULT NULL AFTER `altezza`,
  ADD COLUMN `specifica_matrimonio` DATE DEFAULT NULL AFTER `stato_civile`,
  ADD COLUMN `morte_feto` TINYTEXT DEFAULT NULL AFTER `peso`,
  ADD COLUMN `ultimo_avvistamento` TINYTEXT DEFAULT NULL AFTER `morte_feto`,
  ADD COLUMN `fecondazione` VARCHAR(50) DEFAULT NULL AFTER `ultimo_avvistamento`,
  ADD COLUMN `dataF` DATE DEFAULT NULL AFTER `fecondazione`,
  ADD COLUMN `struttura` VARCHAR(50) DEFAULT NULL AFTER `dataF`,
  ADD COLUMN `inseminazione_endouterina` ENUM('Y','N') DEFAULT NULL AFTER `struttura`,
  ADD COLUMN `fecondazione_in_vitro` ENUM('Y','N') DEFAULT NULL AFTER `inseminazione_endouterina`,
  ADD COLUMN `intracitoplasmatica` ENUM('Y','N') DEFAULT NULL AFTER `fecondazione_in_vitro`,
  ADD COLUMN `gameti` ENUM('Y','N') DEFAULT NULL AFTER `intracitoplasmatica`,
  ADD COLUMN `ovulazione_indotta` ENUM('Y','N') DEFAULT NULL AFTER `gameti`,
  ADD COLUMN `omologa` ENUM('Y','N') DEFAULT NULL AFTER `ovulazione_indotta`,
  ADD COLUMN `eterologa` VARCHAR(50) DEFAULT NULL AFTER `omologa`,
  ADD COLUMN `embriodonazione` ENUM('Y','N') DEFAULT NULL AFTER `eterologa`,
  ADD COLUMN `a_fresco` ENUM('Y','N') DEFAULT NULL AFTER `embriodonazione`,
  ADD COLUMN `crioconservazione` ENUM('Y','N') DEFAULT NULL AFTER `a_fresco`,
  ADD COLUMN `test_preimpianto` ENUM('Y','N') DEFAULT NULL AFTER `crioconservazione`,
  ADD COLUMN `specifica_altre` VARCHAR(50) DEFAULT NULL AFTER `test_preimpianto`,
  ADD COLUMN `num_visite` INT UNSIGNED DEFAULT NULL AFTER `specifica_altre`,
  ADD COLUMN `anni_nonnamaterna` INT DEFAULT NULL AFTER `num_visite`,
  ADD COLUMN `anni_nonnomaterno` INT DEFAULT NULL AFTER `anni_nonnamaterna`,
  ADD COLUMN `patologie_nonnamaterna` VARCHAR(255) DEFAULT NULL AFTER `anni_nonnomaterno`,
  ADD COLUMN `patologie_nonnomaterno` VARCHAR(255) DEFAULT NULL AFTER `patologie_nonnamaterna`,
  ADD COLUMN `fratelli_sorelle` VARCHAR(255) DEFAULT NULL AFTER `patologie_nonnomaterno`,
  ADD COLUMN `patologie_famiglia` VARCHAR(255) DEFAULT NULL AFTER `fratelli_sorelle`,
  ADD COLUMN `altricasi` VARCHAR(255) DEFAULT NULL AFTER `patologie_famiglia`,
  ADD COLUMN `altri_casi` VARCHAR(255) DEFAULT NULL AFTER `altricasi`,
  ADD COLUMN `nonnaviva` VARCHAR(255) DEFAULT NULL AFTER `altri_casi`,
  ADD COLUMN `nonnovivo` VARCHAR(255) DEFAULT NULL AFTER `nonnaviva`,
  ADD COLUMN `morte_nonnamaterna` VARCHAR(255) DEFAULT NULL AFTER `nonnovivo`,
  ADD COLUMN `morte_nonnomaterno` VARCHAR(255) DEFAULT NULL AFTER `morte_nonnamaterna`,
  ADD COLUMN `tentativiFecondazione` VARCHAR(255) AFTER `morte_nonnomaterno`,
  ADD COLUMN `dataCaso1` DATE AFTER `tentativiFecondazione`,
  ADD COLUMN `dataCaso2` DATE AFTER `dataCaso1`,
  ADD COLUMN `dataCaso3` DATE AFTER `dataCaso2`,
  ADD COLUMN `dataCaso4` DATE AFTER `dataCaso3`,
  ADD COLUMN `dataCaso5` DATE AFTER `dataCaso4`,
  ADD COLUMN `descriviCaso1` VARCHAR(255) AFTER `dataCaso5`,
  ADD COLUMN `descriviCaso2` VARCHAR(255) AFTER `descriviCaso1`,
  ADD COLUMN `descriviCaso3` VARCHAR(255) AFTER `descriviCaso2`,
  ADD COLUMN `descriviCaso4` VARCHAR(255) AFTER `descriviCaso3`,
  ADD COLUMN `descriviCaso5` VARCHAR(255) AFTER `descriviCaso4`;


-- tabella info_morte_fetale
ALTER TABLE `info_morte_fetale`
  ADD COLUMN `ultima_visita_ostetrica` DATE DEFAULT NULL AFTER `num_visite_controllo_in_gravidanza`,
  ADD COLUMN `ginecologo_curante` VARCHAR(50) DEFAULT NULL AFTER `ultima_visita_ostetrica`,
  ADD COLUMN `ostetrica` VARCHAR(50) DEFAULT NULL AFTER `ginecologo_curante`,
  ADD COLUMN `fecondazione` VARCHAR(50) DEFAULT NULL AFTER `ostetrica`,
  ADD COLUMN `dataF` DATE DEFAULT NULL AFTER `fecondazione`,
  ADD COLUMN `struttura` VARCHAR(50) DEFAULT NULL AFTER `dataF`,
  ADD COLUMN `inseminazione_endouterina` ENUM('Y','N') DEFAULT NULL AFTER `struttura`,
  ADD COLUMN `fecondazione_in_vitro` ENUM('Y','N') DEFAULT NULL AFTER `inseminazione_endouterina`,
  ADD COLUMN `intracitoplasmatica` ENUM('Y','N') DEFAULT NULL AFTER `fecondazione_in_vitro`,
  ADD COLUMN `gameti` ENUM('Y','N') DEFAULT NULL AFTER `intracitoplasmatica`,
  ADD COLUMN `ovulazione_indotta` ENUM('Y','N') DEFAULT NULL AFTER `gameti`,
  ADD COLUMN `omologa` ENUM('Y','N') DEFAULT NULL AFTER `ovulazione_indotta`,
  ADD COLUMN `eterologa` VARCHAR(50) DEFAULT NULL AFTER `omologa`,
  ADD COLUMN `embriodonazione` ENUM('Y','N') DEFAULT NULL AFTER `eterologa`,
  ADD COLUMN `a_fresco` ENUM('Y','N') DEFAULT NULL AFTER `embriodonazione`,
  ADD COLUMN `crioconservazione` ENUM('Y','N') DEFAULT NULL AFTER `a_fresco`,
  ADD COLUMN `test_preimpianto` ENUM('Y','N') DEFAULT NULL AFTER `crioconservazione`,
  ADD COLUMN `specifica_altre` VARCHAR(50) DEFAULT NULL AFTER `test_preimpianto`,
  ADD COLUMN `tentativiFecondazione` VARCHAR(255) AFTER `specifica_altre`,
  ADD COLUMN `dataCaso1` DATE AFTER `tentativiFecondazione`,
  ADD COLUMN `dataCaso2` DATE AFTER `dataCaso1`,
  ADD COLUMN `dataCaso3` DATE AFTER `dataCaso2`,
  ADD COLUMN `dataCaso4` DATE AFTER `dataCaso3`,
  ADD COLUMN `dataCaso5` DATE AFTER `dataCaso4`,
  ADD COLUMN `descriviCaso1` VARCHAR(255) AFTER `dataCaso5`,
  ADD COLUMN `descriviCaso2` VARCHAR(255) AFTER `descriviCaso1`,
  ADD COLUMN `descriviCaso3` VARCHAR(255) AFTER `descriviCaso2`,
  ADD COLUMN `descriviCaso4` VARCHAR(255) AFTER `descriviCaso3`,
  ADD COLUMN `descriviCaso5` VARCHAR(255) AFTER `descriviCaso4`;



-- tabella patologie_gest
ALTER TABLE `patologie_gest`
  ADD COLUMN `screening` ENUM('Y','N','mancante') DEFAULT NULL AFTER `altre_patologie`,
  ADD COLUMN `tipo_screening` SET('NT_Patologico','NT_nonPatologico','cromosopatie_Patologico','cromosopatie_nonPatologico','triplotest_Patologico','riplotest_nonPatologico') DEFAULT NULL AFTER `screening`,
  ADD COLUMN `sangue_materno` ENUM('Y','N','mancante') DEFAULT NULL AFTER `tipo_screening`,
  ADD COLUMN `dataDNA` DATE DEFAULT NULL AFTER `sangue_materno`,
  ADD COLUMN `risultato` VARCHAR(50) DEFAULT NULL AFTER `dataDNA`,
  ADD COLUMN `altri_test` VARCHAR(50) DEFAULT NULL AFTER `risultato`;

-- tabella dati_feto
ALTER TABLE `dati_feto`
  ADD COLUMN `morte_come` VARCHAR(100) DEFAULT NULL AFTER `eta_settimana_gestazione`,
  ADD COLUMN `morte_dove` VARCHAR(100) DEFAULT NULL AFTER `morte_come`,
  ADD COLUMN `morte_quando` DATE DEFAULT NULL AFTER `morte_dove`;

-- tabella fratelli
DROP TABLE IF EXISTS `fratelli`;

CREATE TABLE `fratelli` (
  `patologie_gest_madre_schede_id` INT UNSIGNED NOT NULL,
  `data_ultimo_parto_precedente` DATE DEFAULT NULL,
  `fratelli_sorelle` VARCHAR(255) DEFAULT NULL,

  -- Fratello 1
  `dataN1` DATE DEFAULT NULL,
  `mesiM1` INT DEFAULT NULL,
  `anniM1` INT DEFAULT NULL,
  `causaM1` TINYTEXT DEFAULT NULL,
  `vivo1` VARCHAR(10) DEFAULT NULL,
  `ereditarieM1` TINYTEXT DEFAULT NULL,
  `geneticheM1` TINYTEXT DEFAULT NULL,
  `dismetabolicheM1` TINYTEXT DEFAULT NULL,
  `altroM1` TINYTEXT DEFAULT NULL,

  -- Fratello 2
  `dataN2` DATE DEFAULT NULL,
  `mesiM2` INT DEFAULT NULL,
  `anniM2` INT DEFAULT NULL,
  `causaM2` TINYTEXT DEFAULT NULL,
  `vivo2` VARCHAR(10) DEFAULT NULL,
  `ereditarieM2` TINYTEXT DEFAULT NULL,
  `geneticheM2` TINYTEXT DEFAULT NULL,
  `dismetabolicheM2` TINYTEXT DEFAULT NULL,
  `altroM2` TINYTEXT DEFAULT NULL,

  -- Fratello 3
  `dataN3` DATE DEFAULT NULL,
  `mesiM3` INT DEFAULT NULL,
  `anniM3` INT DEFAULT NULL,
  `causaM3` TINYTEXT DEFAULT NULL,
  `vivo3` VARCHAR(10) DEFAULT NULL,
  `ereditarieM3` TINYTEXT DEFAULT NULL,
  `geneticheM3` TINYTEXT DEFAULT NULL,
  `dismetabolicheM3` TINYTEXT DEFAULT NULL,
  `altroM3` TINYTEXT DEFAULT NULL,

  -- Fratello 4
  `dataN4` DATE DEFAULT NULL,
  `mesiM4` INT DEFAULT NULL,
  `anniM4` INT DEFAULT NULL,
  `causaM4` TINYTEXT DEFAULT NULL,
  `vivo4` VARCHAR(10) DEFAULT NULL,
  `ereditarieM4` TINYTEXT DEFAULT NULL,
  `geneticheM4` TINYTEXT DEFAULT NULL,
  `dismetabolicheM4` TINYTEXT DEFAULT NULL,
  `altroM4` TINYTEXT DEFAULT NULL,

  -- Fratello 5
  `dataN5` DATE DEFAULT NULL,
  `mesiM5` INT DEFAULT NULL,
  `anniM5` INT DEFAULT NULL,
  `causaM5` TINYTEXT DEFAULT NULL,
  `vivo5` VARCHAR(10) DEFAULT NULL,
  `ereditarieM5` TINYTEXT DEFAULT NULL,
  `geneticheM5` TINYTEXT DEFAULT NULL,
  `dismetabolicheM5` TINYTEXT DEFAULT NULL,
  `altroM5` TINYTEXT DEFAULT NULL,

  `conclusa` ENUM('Y','N') DEFAULT 'N',

  PRIMARY KEY (`patologie_gest_madre_schede_id`),
  KEY `fk_fratelli_patologie_gest` (`patologie_gest_madre_schede_id`),
  CONSTRAINT `fk_fratelli_patologie_gest`
    FOREIGN KEY (`patologie_gest_madre_schede_id`)
    REFERENCES `madre` (`schede_id`)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- dati_sids
ALTER TABLE `dati_sids`  
  ADD COLUMN `skin` VARCHAR(255) DEFAULT NULL AFTER `ora_ultimo_controllo_parentale`;

-- patologie_gest: modifica colonna tipologie_infezioni_materne_preconcezionale
ALTER TABLE `patologie_gest`
  MODIFY COLUMN `tipologie_infezioni_materne_preconcezionale` 
  SET('hiv','hbv','hcv','lue','toxo','cmv','rubeo','hmv','altro') DEFAULT NULL;

-- patologie_gest: modifica colonna tipologie_infezioni_materne_peri_postconcezionale
ALTER TABLE `patologie_gest`
  MODIFY COLUMN `tipologie_infezioni_materne_peri_postconcezionale` 
  SET('hiv','hbv','hcv','lue','toxo','cmv','rubeo','hmv','altro') DEFAULT NULL;
