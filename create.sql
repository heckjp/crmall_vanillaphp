CREATE DATABASE `crmall` COLLATE 'latin1_swedish_ci';

use crmall;

CREATE TABLE `clientes` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(200) NOT NULL,
	`sexo` CHAR(1) NOT NULL,
	`data_nascimento` DATE NOT NULL,
	`cep` CHAR(8) NULL DEFAULT NULL,
	`endereco` VARCHAR(300) NULL DEFAULT NULL,
	`numero` INTEGER NULL DEFAULT NULL,
	`complemento` VARCHAR(100) NULL DEFAULT NULL,
	`bairro` VARCHAR(200) NULL DEFAULT NULL,
	`cidade` VARCHAR(300) FLOAT NULL DEFAULT NULL,
	`estado` CHAR(2) NULL DEFAULT NULL,
	
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci';

