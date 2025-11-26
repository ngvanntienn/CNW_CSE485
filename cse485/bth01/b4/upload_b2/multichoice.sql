CREATE TABLE IF NOT EXISTS `multichoice` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `question` TEXT NOT NULL,
  `choice_a` VARCHAR(255) NOT NULL,
  `choice_b` VARCHAR(255) NOT NULL,
  `choice_c` VARCHAR(255) NOT NULL,
  `choice_d` VARCHAR(255) NOT NULL,
  `answer` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
