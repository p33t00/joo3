DROP TABLE IF EXISTS `#__paf_messages`;

CREATE TABLE `#__paf_messages`
(
`id` INT(255) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
`first_name` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`last_name` VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
`email` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
`phone` VARCHAR(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
`created` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `#__paf_messages`(`id`, `first_name`, `last_name`, `email`, `phone`, `created`)
VALUES(NULL, 'Аноним', 'Pupkin', 'somebody@mail.ru', '555-98-69', 'CURRENT_TIMESTAMP');