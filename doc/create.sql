SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `ManageMyProject` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `ManageMyProject` ;

-- -----------------------------------------------------
-- Table `ManageMyProject`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ManageMyProject`.`user` ;

CREATE  TABLE IF NOT EXISTS `ManageMyProject`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(50) NULL ,
  `password` VARCHAR(45) NULL ,
  `date_inscription` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ManageMyProject`.`customer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ManageMyProject`.`customer` ;

CREATE  TABLE IF NOT EXISTS `ManageMyProject`.`customer` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(50) NULL ,
  `phone` VARCHAR(45) NOT NULL ,
  `street` VARCHAR(75) NOT NULL ,
  `city` VARCHAR(30) NOT NULL ,
  `zipcode` MEDIUMINT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_customer_user1` (`user_id` ASC) ,
  CONSTRAINT `fk_customer_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `ManageMyProject`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ManageMyProject`.`projet`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ManageMyProject`.`projet` ;

CREATE  TABLE IF NOT EXISTS `ManageMyProject`.`projet` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `creation_date` DATETIME NULL ,
  `description` TEXT NULL ,
  `manager` INT NOT NULL ,
  `customer_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `manager` (`manager` ASC) ,
  INDEX `customer` (`customer_id` ASC) ,
  CONSTRAINT `manager`
    FOREIGN KEY (`manager` )
    REFERENCES `ManageMyProject`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `customer`
    FOREIGN KEY (`customer_id` )
    REFERENCES `ManageMyProject`.`customer` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ManageMyProject`.`user_has_projet`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ManageMyProject`.`user_has_projet` ;

CREATE  TABLE IF NOT EXISTS `ManageMyProject`.`user_has_projet` (
  `user_id` INT NOT NULL ,
  `projet_id` INT NOT NULL ,
  PRIMARY KEY (`user_id`, `projet_id`) ,
  INDEX `fk_user_has_projet_projet1` (`projet_id` ASC) ,
  INDEX `fk_user_has_projet_user` (`user_id` ASC) ,
  CONSTRAINT `fk_user_has_projet_user`
    FOREIGN KEY (`user_id` )
    REFERENCES `ManageMyProject`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_projet_projet1`
    FOREIGN KEY (`projet_id` )
    REFERENCES `ManageMyProject`.`projet` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ManageMyProject`.`gantt`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ManageMyProject`.`gantt` ;

CREATE  TABLE IF NOT EXISTS `ManageMyProject`.`gantt` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` TEXT NOT NULL ,
  `date` DATETIME NOT NULL ,
  `project_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_gantt_projet1` (`project_id` ASC) ,
  CONSTRAINT `fk_gantt_projet1`
    FOREIGN KEY (`project_id` )
    REFERENCES `ManageMyProject`.`projet` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ManageMyProject`.`category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ManageMyProject`.`category` ;

CREATE  TABLE IF NOT EXISTS `ManageMyProject`.`category` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `gantt_id` INT NOT NULL ,
  `category_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_category_gantt1` (`gantt_id` ASC) ,
  INDEX `fk_category_category1` (`category_id` ASC) ,
  CONSTRAINT `fk_category_gantt1`
    FOREIGN KEY (`gantt_id` )
    REFERENCES `ManageMyProject`.`gantt` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_category_category1`
    FOREIGN KEY (`category_id` )
    REFERENCES `ManageMyProject`.`category` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ManageMyProject`.`task`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ManageMyProject`.`task` ;

CREATE  TABLE IF NOT EXISTS `ManageMyProject`.`task` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `description` VARCHAR(45) NULL ,
  `duration` INT NULL ,
  `start_date` DATETIME NULL ,
  `end_date` DATETIME NULL ,
  `progression` FLOAT NULL DEFAULT 0.0 ,
  `category_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_task_category1` (`category_id` ASC) ,
  CONSTRAINT `fk_task_category1`
    FOREIGN KEY (`category_id` )
    REFERENCES `ManageMyProject`.`category` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ManageMyProject`.`bill`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ManageMyProject`.`bill` ;

CREATE  TABLE IF NOT EXISTS `ManageMyProject`.`bill` (
  `id` INT NOT NULL ,
  `projet_id` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`, `projet_id`) ,
  INDEX `fk_bill_projet1` (`projet_id` ASC) ,
  CONSTRAINT `fk_bill_projet1`
    FOREIGN KEY (`projet_id` )
    REFERENCES `ManageMyProject`.`projet` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ManageMyProject`.`item`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ManageMyProject`.`item` ;

CREATE  TABLE IF NOT EXISTS `ManageMyProject`.`item` (
  `bill_id` INT NOT NULL ,
  `bill_projet_id` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `description` TEXT NULL ,
  `price` FLOAT NULL ,
  `quantity` INT NULL ,
  PRIMARY KEY (`bill_id`, `bill_projet_id`) ,
  CONSTRAINT `fk_table1_bill1`
    FOREIGN KEY (`bill_id` , `bill_projet_id` )
    REFERENCES `ManageMyProject`.`bill` (`id` , `projet_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ManageMyProject`.`task_has_predecessor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ManageMyProject`.`task_has_predecessor` ;

CREATE  TABLE IF NOT EXISTS `ManageMyProject`.`task_has_predecessor` (
  `task_id` INT NOT NULL ,
  `predecessor` INT NOT NULL ,
  INDEX `fk_task_has_task_task2` (`predecessor` ASC) ,
  INDEX `fk_task_has_task_task1` (`task_id` ASC) ,
  CONSTRAINT `fk_task_has_task_task1`
    FOREIGN KEY (`task_id` )
    REFERENCES `ManageMyProject`.`task` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_task_has_task_task2`
    FOREIGN KEY (`predecessor` )
    REFERENCES `ManageMyProject`.`task` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ManageMyProject`.`news`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ManageMyProject`.`news` ;

CREATE  TABLE IF NOT EXISTS `ManageMyProject`.`news` (
  `id` INT NOT NULL ,
  `message` VARCHAR(200) NULL ,
  `link` VARCHAR(45) NULL ,
  `projet_id` INT NOT NULL ,
  INDEX `fk_notification_projet1` (`projet_id` ASC) ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_notification_projet1`
    FOREIGN KEY (`projet_id` )
    REFERENCES `ManageMyProject`.`projet` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
