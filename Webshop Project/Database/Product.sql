CREATE TABLE `products` (
`id` INT AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(255) NOT NULL,
`publisher` INT NOT NULL,
`price` FLOAT NOT NULL,
`platform` VARCHAR(100) NOT NULL,
`description` TEXT NULL,
`del` TINYINT(1)
);