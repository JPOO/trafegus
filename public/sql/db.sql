CREATE DATABASE trefegus;

CREATE TABLE `trafegus`.`veiculo` (
      `idveiculo` INT NOT NULL AUTO_INCREMENT,
      `placa` VARCHAR(7) NOT NULL,
      `renavam` VARCHAR(30) NULL,
      `modelo` VARCHAR(20) NOT NULL,
      `marca` VARCHAR(20) NOT NULL,
      `ano` INT NOT NULL,
      `cor` VARCHAR(20) NOT NULL,
      PRIMARY KEY (`idveiculo`));

CREATE TABLE `trafegus`.`motorista` (
    `idmotorista` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(200) NOT NULL,
    `rg` VARCHAR(20) NOT NULL,
    `cpf` VARCHAR(11) NOT NULL,
    `telefone` VARCHAR(20) NULL,
    `veiculo` INT NOT NULL,
    PRIMARY KEY (`idmotorista`),
    CONSTRAINT `veiculo_fk`
        FOREIGN KEY (`idveiculo`)
            REFERENCES `trafegus`.`veiculo` (`idveiculo`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION);



