
--tabella dati_pers

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
    ADD COLUMN `ultimo_avvistamento` TINYTEXT DEFAULT NULL AFTER `morte_feto`;
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
ADD COLUMN `specifica_altre` VARCHAR(50) DEFAULT NULL AFTER `test_preimpianto`;
ADD COLUMN  `num_visite` int unsigned DEFAULT NULL AFTER `specifica_altre`



--tabella info_morte_fetale

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
ADD COLUMN `specifica_altre` VARCHAR(50) DEFAULT NULL AFTER `test_preimpianto`;

--tabella dati_pers