-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema manage_exer
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema manage_exer
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `manage_exer` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `manage_exer` ;

-- -----------------------------------------------------
-- Table `manage_exer`.`exer_log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `manage_exer`.`exer_log` (
  `exer_day` DATE NOT NULL,
  `log` VARCHAR(300) NULL DEFAULT NULL,
  `title` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`exer_day`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `manage_exer`.`person`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `manage_exer`.`person` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `age` INT NULL DEFAULT NULL,
  `join_year` INT NULL DEFAULT NULL,
  `pname` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `manage_exer`.`exer_mem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `manage_exer`.`exer_mem` (
  `p_id` INT NULL DEFAULT NULL,
  `exer_day` DATE NULL DEFAULT NULL,
  INDEX `p_id` (`p_id` ASC) VISIBLE,
  INDEX `exer_day` (`exer_day` ASC) VISIBLE,
  CONSTRAINT `exer_mem_ibfk_1`
    FOREIGN KEY (`p_id`)
    REFERENCES `manage_exer`.`person` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `exer_mem_ibfk_2`
    FOREIGN KEY (`exer_day`)
    REFERENCES `manage_exer`.`exer_log` (`exer_day`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
