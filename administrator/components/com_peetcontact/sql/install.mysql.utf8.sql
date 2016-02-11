DROP TABLE IF EXISTS `#__peetcontact`;
DROP TABLE IF EXISTS `#__peet_messages`;

CREATE TABLE `#__peetcontact`
(
`id` INT(1) UNSIGNED NOT NULL DEFAULT '1' PRIMARY KEY,
`name` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`last-name` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
`tel_01` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
`tel_02` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
`fax` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
`email` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
`social01` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
`social02` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
`params` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`created` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE `#__peet_messages`
(
`message_id` INT(255) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
`first_name` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`last_name` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`email` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`phone` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`message` TEXT NOT NULL DEFAULT '',
`created` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `#__peet_messages`(`message_id`, `first_name`, `last_name`, `email`, `phone`, `message`, `created`)
VALUES(NULL, 'Аноним', 'Pupkin', 'somebody@mail.ru', '555-98-69', 'Is there anyone on the Mars', '2012-01-01 09:00:00');