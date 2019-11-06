DROP TABLE `products`;
CREATE TABLE `products` (
`id` INT AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(255) NOT NULL,
`publisher` VARCHAR(255) NOT NULL,
`type` VARCHAR(255),
`price` FLOAT NOT NULL,
`platform` VARCHAR(100) NOT NULL,
`release_year` INT(4),
`description` TEXT NULL,
`del` TINYINT(1)
);