CREATE SCHEMA IF NOT EXISTS `estacionamento` DEFAULT CHARACTER SET utf8 ;
USE `estacionamento` ;

-- -----------------------------------------------------
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `veiculo` (
	id int auto_increment not null,
    modelo varchar(45) not null,
    placa varchar(10) not null,
    cor varchar(45) not null,

  PRIMARY KEY (id))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `usuario` (
	id int auto_increment not null,
    nome varchar(45) not null,
    email varchar(45) not null,
	senha varchar(45) not null,

  PRIMARY KEY (id))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `cliente` (
	id int auto_increment not null,
    nome varchar(45) not null,
    sobrenome varchar(45) not null,
	email varchar(45) not null,
    senha varchar(45) not null,
    cidade varchar(45) not null,

  PRIMARY KEY (id))
ENGINE = InnoDB;