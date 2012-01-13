
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- person
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `person`;

CREATE TABLE `person`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- adress
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `adress`;

CREATE TABLE `adress`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`person_id` INTEGER NOT NULL,
	`city` VARCHAR(128) NOT NULL,
	`post_code` VARCHAR(128) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `adress_FI_1` (`person_id`),
	CONSTRAINT `adress_FK_1`
		FOREIGN KEY (`person_id`)
		REFERENCES `person` (`id`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
