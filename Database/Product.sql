DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
`id` INT AUTO_INCREMENT PRIMARY KEY,
`title` VARCHAR(255) NOT NULL,
`publisher` VARCHAR(255) NOT NULL,
`type` VARCHAR(255),
`price` FLOAT NOT NULL,
`platform` VARCHAR(100) NOT NULL,
`release_year` INT(4),
`score` FLOAT NOT NULL,
`review_count` INT NOT NULL,
`description` TEXT NULL,
`cover` TEXT NOT NULL,
`del` TINYINT(1),
`adpic` TEXT,
`stored` INT 
);